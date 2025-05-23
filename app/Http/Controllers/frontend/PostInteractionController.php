<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Gift;
use App\Models\Post;
use App\Models\VloggerGiftPurchase;
use App\Notifications\NewCommentNotification;
use App\Notifications\PostLiked;
use App\Notifications\GiftSent;
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

        // Notify the post owner if they are not the commenter
        if ($post->vlogger_id !== auth('vlogger')->id()) {
            $post->vlogger->notify(new NewCommentNotification($comment));
        }

        return response()->json(['message' => 'Comment added', 'comment' => $comment]);
    }

    public function getAllPurchases() {
        $purchases = VloggerGiftPurchase::where('vlogger_id', auth('vlogger')->id())
            ->with('giftCatalog:id,name,icon')
            ->get();

        return response()->json($purchases);
    }

    public function sendGift(Request $request, $postId)
    {
        $request->validate([
            'gift_catalog_id' => 'required|integer|exists:gift_catalog,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $vloggerId = auth('vlogger')->id();

        $purchase = VloggerGiftPurchase::where('vlogger_id', $vloggerId)
            ->where('gift_catalog_id', $request->gift_catalog_id)
            ->first();

        if (!$purchase || $purchase->total_quantity < $request->quantity) {
            return response()->json([
                'message' => 'Not enough gifts available to send.'
            ], 400);
        }

        $gift = Gift::firstOrNew([
            'post_id' => $postId,
            'vlogger_id' => $vloggerId,
        ]);

        $gift->gift_catalog_id = $request->gift_catalog_id;
        $gift->quantity = $gift->exists ? $gift->quantity + $request->quantity : $request->quantity;
        $gift->save();

        $purchase->total_quantity -= $request->quantity;
        $purchase->save();

        // Notify the post owner if sender is not the post owner
        $post = Post::find($postId);
        if ($post && $post->vlogger_id !== $vloggerId) {
            $post->vlogger->notify(new GiftSent($gift, auth('vlogger')->user()));
        }

        return response()->json([
            'message' => 'Gift has been sent successfully.',
            'gift' => $gift
        ], 201);
    }


    public function toggleLike(Post $post)
    {
        $user = auth('vlogger')->user();

        $alreadyLiked = $post->likes()->where('user_id', $user->id)->exists();

        if ($alreadyLiked) {
            $post->likes()->where('user_id', $user->id)->delete();
        } else {
            $post->likes()->create(['user_id' => $user->id]);

            // Don't notify if the liker is the post owner
            if ($post->vlogger_id !== $user->id) {
                $post->vlogger->notify(new PostLiked($post, $user));
            }
        }

        return response()->json([
            'liked' => !$alreadyLiked,
            'likes_count' => $post->likes()->count(),
        ]);
    }


}
