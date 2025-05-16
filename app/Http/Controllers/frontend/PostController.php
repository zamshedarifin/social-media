<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostMedia;
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
            'content_files' => 'required|array',
            'content_files.*' => 'file|mimes:jpeg,png,jpg,mp4,mkv,mp3',
        ]);

        $authUser = auth('vlogger')->user();

        // Create the post (without content_file, since multiple files)
        $post = Post::create([
            'vlogger_id' => $authUser->id,
            'content_type' => $request->content_type,
            'caption' => $request->caption,
        ]);

        // Loop through each uploaded file and store
        foreach ($request->file('content_files') as $file) {
            $path = $file->store('vlogs', 'public');

            // Save each media file in PostMedia (you need to create this model & migration)
            PostMedia::create([
                'post_id' => $post->id,
                'file_path' => $path,
                'media_type' => $request->content_type,
            ]);
        }

        if(isset($request->tagged_users))
        {
            foreach ($request->tagged_users as $userId) {
                TaggedUser::create([
                    'post_id' => $post->id,
                    'user_id' => $userId,
                    'approved' => false,
                ]);
                $taggedUser = Vlogger::find($userId);
                $taggedUser->notify(new TaggedInPostNotification($post, $authUser));
            }
        }

        return response()->json([
            'message' => 'Post created and users tagged successfully!',
        ], 200);
    }

    // Fetch notifications for authenticated user
    public function notifications()
    {
        $user = auth('vlogger')->user();
        $notifications = $user->notifications()->latest()->get();

        return response()->json($notifications);
    }

    // Approve or reject tag
    public function approveTag(Request $request, $postId)
    {
        $tagged = TaggedUser::where('post_id', $postId)
            ->where('user_id', auth('vlogger')->id())
            ->firstOrFail();

        $request->validate([
            'status' => 'required|in:approved,rejected',
        ]);

        $tagged->status = $request->status;
        $tagged->save();

        return response()->json(['message' => 'Tag status updated']);
    }

    public function postsFromFollowings()
    {
        $authUser = auth('vlogger')->user();

        $followingIds = $authUser->followings()->pluck('vloggers.id');

        // Get posts with their author and media files
        $posts = Post::with(['vlogger', 'media','comments','comments.vlogger'])
            ->whereIn('vlogger_id', $followingIds)
            ->latest()
            ->get();

        return response()->json($posts);
    }
}
