<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Services\UserService;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class UserController extends Controller
{
    public function uploadAvatar(Request $request)
    {
        $user = Auth::user();
        if (!$request->hasFile('file')) {
            $user->avatar = $request->file;
        } else {
            $file = $request->file('file');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = $request->file;
            $newFileName = "$fileName.$fileExtension";
            $request->file('file')->storeAs('public/images', $newFileName);
            $user->avatar = $newFileName;
            $user->save();

        }
        return redirect()->back();
    }

    function uploadCoverPhoto(Request $request)
    {
        $user = User::find(Auth::id());
        if ($request->hasFile('cover')) {
            $cover = $request->file('cover');
            $newFileName = time() . "_" . rand(0, 9999999) . "_" . md5(rand(0, 9999999)) . "." . $cover->getClientOriginalExtension();
            $cover->storeAs('public/images', $newFileName);
            $user->cover = $newFileName;
            $user->save();
        }
        return redirect()->back();
    }

    public function updateProfile(Request $request)
    {
        $user = Auth::user();
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->dob = $request->dob;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->about_me = $request->about_me;
        $user->gender = $request->gender;
        $user->school = $request->school;
        $user->save();

        alert('Profile Update', 'Successfully', 'success')->autoClose(1500);
        return redirect()->route('timeline.profile', ['id' => Auth::id()]);
    }
}
