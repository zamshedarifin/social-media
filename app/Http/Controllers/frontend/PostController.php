<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function storePost(Request $request)
    {
        // Validate the request
        $validated = $request->validate([
            'content_type' => 'required|in:photo,video,reel',
            'content_file' => 'required|file',
            'caption' => 'nullable|string',
        ]);

        // Get the authenticated vlogger user
        $authUser = auth('vlogger')->user();

        // Store file in public disk under "vlogs" directory
        $path = $request->file('content_file')->store('vlogs', 'public');

        // Save post in database
        $vlog = Post::create([
            'vlogger_id'   => $authUser->id,
            'content_type' => $validated['content_type'],
            'content_file' => $path,
            'caption'      => $validated['caption'],
        ]);

        // Return response with public file URL
        return response()->json([
            'message' => 'Vlog created successfully!',
            'vlog' => $vlog,
            'file_url' => Storage::url($path), // Generates: /storage/vlogs/filename.ext
        ]);
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
