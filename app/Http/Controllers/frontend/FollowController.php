<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Vlogger;
use Illuminate\Http\Request;

class FollowController extends Controller
{
    public function follow($id)
    {
        $authUser = auth('vlogger')->user();

        if ($authUser->id === $id || $authUser->isFollowing($id)) {
            return response()->json(['message' => 'Invalid operation.'], 400);
        }

        $authUser->followings()->attach($id);
        return response()->json(['message' => 'Followed successfully.']);
    }

    public function unfollow($id)
    {
        auth('vlogger')->user()->followings()->detach($id);
        return response()->json(['message' => 'Unfollowed successfully.']);
    }

    public function suggested()
    {

        $authUser = auth('vlogger')->user();

        $alreadyFollowing = $authUser->followings()->pluck('vloggers.id')->toArray();
        $alreadyFollowing[] = $authUser->id;

        $suggested = Vlogger::whereNotIn('id', $alreadyFollowing)
            ->inRandomOrder()
            ->limit(10)
            ->get();

        return response()->json($suggested);
    }

    public function myFollowing()
    {
        $authUser = auth('vlogger')->user();

        // Get the full list of followed users with selected fields
        $followings = $authUser->followings()
            ->select('vloggers.id', 'vloggers.name', 'vloggers.profile_picture')
            ->get();

        return response()->json($followings);
    }

}
