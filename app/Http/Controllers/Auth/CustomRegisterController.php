<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use domain\Facades\NationalityFacade;

class CustomRegisterController extends Controller
{
    public function show()
    {
        $nationalities = NationalityFacade::all();

        return view('auth.register', compact('nationalities'));
    }
}
