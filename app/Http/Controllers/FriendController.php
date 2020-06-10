<?php

namespace App\Http\Controllers;

use App\User;
use Auth;

class FriendController extends Controller
{
    public function getIndex()
    {
        $friends = Auth::user()->friends();
        $requests = Auth::user()->friendRequests();
        return view('friends.index')
            ->with('friends', $friends)
            ->with('requests', $requests);
    }

    public function getAdd($id)
    {
        $user = User::where('id', $id)->first();

        if (Auth::user()->id === $user->id) {
            return redirect()->route('home')->with('info', 'Not smart to add yourself to your friends list.');
        }

        if (!$user) {
            return redirect()
                ->route('home')
                ->with('info', 'That use could not be found');
        }

        if (Auth::user()->hasFriendRequestPending($user) || $user->hasFriendRequestPending(Auth::user())) {
            return redirect()
                ->route('profile.index', ['id' => $user->id])
                ->with('info', 'Friend request already pending.');
        }

        if (Auth::user()->isFriendsWith($user)) {
            return redirect()
                ->route('profile.index', ['id' => $user->id])
                ->with('info', 'Dude, you are already friends with this guy. Why are you trying to add him again?');
        }

        Auth::user()->addFriend($id);
        return redirect()
            ->route('profile.index', ['id' => $id])
            ->with('info', 'Your friend request has been sent.');
    }
    /**
     * Accept a friend a request
     */
    public function getAccept($id)
    {
        $user = User::where('username', $id)->first();

        if (!$user) {
            return redirect()
                ->route('home')
                ->with('info', 'That user could not be found');
        }

        if (!Auth::user()->hasFriendRequestReceived($user)) {
            return redirect()
                ->route('home')
                ->with('info', 'Are you trying to be dodgy?');
        }

        Auth::user()->acceptFriendRequest($user);

        return redirect()
            ->route('profile.index', ['id' => $id])
            ->with('info', 'Friend request has been successfully accepted, congrats you have a new friend now yay.');
    }

    /**
     * Delete a friend
     */
    public function postDelete($id)
    {
        $user = User::where('id', $id)->first();

        if (!Auth::user()->isFriendsWith($user)) {
            return redirect()->back();
        }

        Auth::user()->deleteFriend($user);

        return redirect()->back()->with('info', 'Friend deleted successfully.');
    }

}
