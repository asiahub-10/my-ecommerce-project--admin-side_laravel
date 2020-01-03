<?php

namespace App\Http\Controllers;

use App\UserProfile;
use Illuminate\Http\Request;
use Auth;
use App\User;
use File;
use Session;
use Intervention\Image\Facades\Image;

class UserProfileController extends Controller
{
    public function profile() {
       $user = Auth::user();
       return view('admin.profile.profile', [
           'user'   =>  $user
       ]);
    }

    public function updateImage() {
        return view('admin.profile.image');
    }

    protected function uploadUserImage($request) {
        $user = User::find(Auth::user()->id);

        $this->validate($request, [
            'image' =>  'required|image|mimes:jpeg,jpg,gif|max:1024'
        ]);

        // Handle the user upload of avatar
        if ($request->hasFile('image')) {
            $userImage = $request->file('image');
            $imageName = 'profile'.'_'.Auth::user()->id.'.'.$userImage->getClientOriginalExtension();

            // Delete current image before uploading new image
            if ($user->image !== 'bg_user.jpg') {
                // $file = public_path('uploads/avatars/' . $user->avatar);
                $directory = 'user-images/';
                $imageUrl = $directory.$imageName;
//                $file = 'uploads/avatars/' . $user->avatar;
                //$destinationPath = 'uploads/' . $id . '/';

                if (file_exists($user->image)) {
                    unlink($user->image);
                }
            }
            // Image::make($avatar)>resize(300, 300)>save(public_path('uploads/avatars/' . $filename));
            Image::make($userImage)->resize(300, 300)->save($imageUrl);
            $user = Auth::user();
            $user->image = $imageUrl;
            $user->save();
        }
    }

    public function imageUpload(Request $request) {
        $imageUrl = $this->uploadUserImage($request);
        return redirect('/profile');
    }

    public function changeProfileInfo() {
        return view('admin.profile.info');
    }

    public function updateProfileInfo(Request $request) {
        $user = User::find(Auth::user()->id);
        $user->name         =   $request->name;
        $user->designation  =   $request->designation;
        //$user->email        =   $request->email;
        $user->phone        =   $request->phone;
        $user->save();
        return redirect('/profile');
    }

    public function uploadProfileImage() {
        return view('admin.login.image');
    }

    public function saveProfilePicture(Request $request) {
        $imageUrl = $this->uploadUserImage($request);
        Session::flush();
        return view('admin.login.registration-complete');
    }

    protected function completeRegistration() {
        Session::flush();
        return view('admin.login.registration-complete');
    }

    public function userList()
    {
        return view('admin.user.manage-user', [
            'users'  => User::all()
        ]);
    }

    public function viewUser($id)
    {
        return view('admin.user.view-user', [
            'user'  => User::find($id)
        ]);
    }

    public function profileSetting()
    {
        return view('admin.profile.profile-setting');
    }

    public function changeEmail()
    {
        return view('admin.profile.change-email');
    }

    public function updateEmail(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if (!$user)
        {
            UserProfile::emailValidation($request);
            UserProfile::changeUserEmail($request);
            return redirect('/profile-setting')->with('message', 'Email address has been changed successfully.');
        }
        else
        {
            return redirect('/change-email')->with('error', 'Sorry this email exists. Please use another one.');
        }
    }

    public function changePassword()
    {
        return view('admin.profile.change-password');
    }

    public function passwordReset(Request $request)
    {
        if (!password_verify($request->old_password, Auth::user()->password))
        {
            return redirect('/reset-password')
                ->with('error', 'Password did not matched. Please use valid password.')
                ->with('oldPassword', $request->old_password)
                ->with('newPassword', $request->new_password)
                ->with('confirmPassword', $request->confirm_password);
        }
        else
        {
            if (password_verify($request->new_password, Auth::user()->password))
            {
                return redirect('/reset-password')
                    ->with('error', 'Old and new passwords are same. Please use another password.')
                    ->with('oldPassword', $request->old_password)
                    ->with('newPassword', $request->new_password)
                    ->with('confirmPassword', $request->confirm_password);
            }
            else
            {
                if (strlen($request->new_password) < 6)
                {
                    return redirect('/reset-password')
                        ->with('error', 'New password is less than 6 characters.')
                        ->with('oldPassword', $request->old_password)
                        ->with('newPassword', $request->new_password)
                        ->with('confirmPassword', $request->confirm_password);
                }
                else
                {
                    if ($request->new_password != $request->confirm_password)
                    {
                        return redirect('/reset-password')
                            ->with('error', 'Confirm password did not matched with new password.')
                            ->with('oldPassword', $request->old_password)
                            ->with('newPassword', $request->new_password)
                            ->with('confirmPassword', $request->confirm_password);
                    }
                    else
                    {
                        UserProfile::changeUserPassword($request);
                        return redirect('/profile-setting')
                            ->with('message', 'Password has been changed successfully.');
                    }
                }
            }
        }
    }

    public function deleteAccount()
    {
        return view('admin.profile.delete-account');
    }

    public function removeAccount(Request $request)
    {
        if (!password_verify($request->password, Auth::user()->password))
        {
            return redirect('/delete-account')->with('error', 'Password did not matched.');
        }
        else
        {
            UserProfile::deleteUserAccount($request);
            return redirect('/');
        }
    }




}











