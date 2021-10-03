<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class IndexController extends Controller
{
    public function index()
    {

        return view('frontend.index');
    }
    public function userLogout()
    {
        Auth::logout();

        return redirect()->route('login');
    }
    public function userProfile()
    {
        $id = Auth::user()->id;

        $user = User::find($id);

        return view('frontend.profile.user_profile', compact('user'));
    }
    public function userProfileStore(Request $request)
    {
        $data = User::find(Auth::user()->id);

        $data->name = $request->name;

        $data->email = $request->email;

        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')) {

            $file = $request->file('profile_photo_path');

            unlink(public_path('upload/user_images/' . $data->profile_photo_path));

            $fileName = date('YmdHi') . $file->getClientOriginalName();

            $fileDestination = 'upload/user_images';

            $file->move($fileDestination, $fileName);

            $data['profile_photo_path'] = $fileName;
        }
        $data->save();

        $notification = array(
            'message' => 'Profile updated successfully !',
            'alert-type' => 'success'
        );

        return redirect()->route('user.profile')->with($notification);
    }
}
