<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function adminProfile()
    {

        $adminData = Admin::find(1);

        return view('admin.admin_profile_view', compact('adminData'));
    }

    public function adminProfileEdit()
    {

        $editData = Admin::find(1);

        return view('admin.admin_profile_edit', compact('editData'));
    }

    public function adminProfileUpdate(Request $request)
    {

        $data = Admin::find(1);

        $data->name = $request->name;

        $data->email = $request->email;

        if ($request->file('profile_photo_path')) {

            $file = $request->file('profile_photo_path');

            unlink(public_path('upload/admin_images/' . $data->profile_photo_path));

            $fileName = date('YmdHi') . $file->getClientOriginalName();

            $fileDestination = 'upload/admin_images';

            $file->move($fileDestination, $fileName);

            $data['profile_photo_path'] = $fileName;
        }
        $data->save();

        $notification = array(
            'message' => 'Profile updated successfully !',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notification);
    }
    public function changePassword()
    {

        return view('admin.adminPasswordChange');
    }
    public function updatePassword(Request $request)
    {
        $validateData = $request->validate([

            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $admin = Admin::find(1);

        if (Hash::check($request->current_password, $admin->password)) {

            $admin->password = bcrypt($request->password);

            $admin->save();

            Auth::logout();

            return redirect()->route('admin.logout');
        } else {
            return redirect()->back();
        }
    }
}
