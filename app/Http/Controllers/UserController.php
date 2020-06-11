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
        $user=Auth::user();
        if (!$request->hasFile('file')){
            $user->avatar=$request->file;
        }else{
            $file=$request->file('file');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = $request->file;
            $newFileName = "$fileName.$fileExtension";
            $request->file('file')->storeAs('public/images', $newFileName);
            $user->avatar=$newFileName;
            $user->save();
        }
        return redirect()->back();
    }
}
