<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use domain\Facades\ImageFacade;
use domain\Facades\ProfileFacade;
use domain\Facades\NationalityFacade;
use App\Http\Requests\UpdateProfileRequest;

class ProfileController extends Controller
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
}
