<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\TaggedUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Vlogger;
use App\Notifications\TaggedInPostNotification;
use Illuminate\Support\Facades\Notification;

class PostController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'caption' => 'required|string|max:255',
            'content_type' => 'required|in:photo,video,reel',
            'content_file' => 'required|file|mimes:jpeg,png,jpg,mp4,mkv,mp3',
            'tagged_users' => 'required|array', // Array of user IDs to be tagged
            'tagged_users.*' => 'exists:vloggers,id', // Ensure tagged users exist
        ]);

        $authUser = auth('vlogger')->user();

        // Store file in public disk under "vlogs" directory
        $path = $request->file('content_file')->store('vlogs', 'public');

        // Create the post
        $post = Post::create([
            'vlogger_id'   => $authUser->id,
            'content_type' => $request->content_type,
            'content_file' => $path,
            'caption'      =>$request->caption,
        ]);

        // Tag users
        foreach ($request->tagged_users as $userId) {
            TaggedUser::create([
                'post_id' => $post->id,
                'user_id' => $userId,
                'approved' => false, // Initially not approved
            ]);
        }

        // Send notifications to tagged users using Pusher
        $taggedUsers = Vlogger::whereIn('id', $request->tagged_users)->get();
        foreach ($taggedUsers as $user) {
            $user->notify(new TaggedInPostNotification($post));
        }

        return response()->json([
            'message' => 'Post created and users tagged successfully!',
        ], 200);
    }

    // Push notification logic
    private function sendPushNotification($userId, $post)
    {
        $user = Vlogger::find($userId);
        if ($user) {
            // Send the notification (you may integrate a package like Pusher or Firebase)
            // For simplicity, we'll just simulate sending a notification
            $message = "You were tagged in a post: {$post->caption}";

            // This could be a push notification, email, etc.
            // Example: $user->notify(new TaggedInPostNotification($message));
        }
    }



    public function postsFromFollowings()
    {
        $authUser = auth('vlogger')->user();

        $followingIds = $authUser->followings()->pluck('vloggers.id');

        $posts = Post::with('vlogger') // eager load author info
        ->whereIn('vlogger_id', $followingIds)
            ->latest()
            ->get();

        return response()->json($posts);
    }
}
