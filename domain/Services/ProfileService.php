<?php

namespace domain\Services;

use App\Models\User;
use domain\Services\ImageService;
use Illuminate\Support\Facades\Auth;

class ProfileService
{
    protected $user;
    protected $authUser;
    protected $imageService;

    public function __construct()
    {
        $this->user = new User();
        $this->authUser = Auth::user();
        $this->imageService = new ImageService();
    }

    /**
     * all
     *
     * @return void
     */

    public function authUser()
    {
        return $this->authUser;
    }

    public function update($data)
    {
        $this->authUser->update([
            'name' => $data['name'],
            'email' => $data['email'],
            'nationality' => $data['nationality'],
            'contact_no' => $data['contact_no'],
            'profile_photo_path' => $data['profile_photo_path'] ?? $this->authUser->profile_photo_path,
        ]);
    }
}
