<?php

namespace App\Http\Controllers;

use App\Friend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FriendController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $friendId)
    {
        $friend = new Friend();
        $friend->user_id = Auth::user()->id;
        $friend->friend_id = $friendId;
        $friend->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $friend = Friend::find($id);
        $friend->delete();

        return redirect()->back();
    }

    public function accept($id)
    {
        $friend = Friend::findOrFail($id);
        $friend->approval_status = 1;
        $friend->save();

        return redirect()->back();
    }
}
