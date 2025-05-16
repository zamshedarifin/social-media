<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Gift;
use App\Models\Post;
use Illuminate\Http\Request;

class PostInteractionController extends Controller
{
    public function addComment(Request $request, $postId)
    {
        $request->validate([
            'comment' => 'required|string|max:1000',
        ]);

        $post = Post::findOrFail($postId);

        $comment = Comment::create([
            'post_id' => $post->id,
            'vlogger_id' => auth('vlogger')->id(),
            'comment' => $request->comment,
        ]);

        return response()->json(['message' => 'Comment added', 'comment' => $comment]);
    }

    public function sendGift(Request $request, $postId)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:100',
        ]);

        $post = Post::findOrFail($postId);
        $vloggerId = auth('vlogger')->id();

        $gift = Gift::firstOrNew([
            'post_id' => $post->id,
            'vlogger_id' => $vloggerId,
        ]);

        $gift->quantity = ($gift->exists ? $gift->quantity + $request->quantity : $request->quantity);
        $gift->save();

        return response()->json(['message' => 'Gift(s) sent', 'gift' => $gift]);
    }
}
