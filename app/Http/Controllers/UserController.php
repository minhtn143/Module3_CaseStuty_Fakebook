<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Image;

class UserController extends Controller
{

    public function uploadAvatar(Request $request)
    {
        if ($request->hasFile('file')){
            $avatar=$request->file('avatar');
            dd($avatar);
            $fileName=time().'.'.$avatar->getClientOriginalExtension();
            Image::make($avatar)->resize(250,250)->save(public_path('/uploads/avatars/'));
            $user=Auth::user();
            $user->avatar=$fileName;
            $user->save();
        }
        return view('timeline.master',array('user'=>Auth::user()));
    }
}
