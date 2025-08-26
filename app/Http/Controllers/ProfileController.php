<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use domain\Facades\ImageFacade;
use domain\Facades\ProfileFacade;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use domain\Facades\NationalityFacade;
use App\Http\Controllers\ParentController;
use App\Http\Requests\UpdateProfileRequest;
use App\Http\Requests\UpdatePasswordRequest;

class ProfileController extends ParentController
{
    public function index()
    {
        $user = ProfileFacade::authUser();

        return view('pages.profile.index', compact('user'));
    }

    public function edit()
    {
        $user = ProfileFacade::authUser();
        $nationalities = NationalityFacade::all();

        return view('pages.profile.edit', compact('user','nationalities'));
    }

    public function update(UpdateProfileRequest $request)
    {
        try {

            $user = ProfileFacade::authUser();

            if ($request->profile_image) {

                if ($user->profile_photo_path) {
                    ImageFacade::delete($user->profile_photo_path);
                }

                $imagePath = ImageFacade::store($request->profile_image, 'profile');

                $request->merge(['profile_photo_path' => $imagePath]);
            }

            ProfileFacade::update($request->all());

            return redirect()->route('profile.index')->with('success', 'Profile Updated Successfully');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function changePassword()
    {
        return view('pages.profile.change-password');
    }

    public function updatePassword(UpdatePasswordRequest $request)
    {
        try {

            $user = ProfileFacade::authUser();

            if (!Hash::check($request->current_password, $user->password)) {
                return back()->withErrors(['current_password' => 'Current password is incorrect']);
            }

            ProfileFacade::updatePassword($request->all());

            Auth::logout();

            // Invalidate session
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            return redirect()->route('welcome')->with('success', 'Password updated successfully. Please login again.');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
