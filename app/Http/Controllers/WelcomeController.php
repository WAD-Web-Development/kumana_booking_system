<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use domain\Facades\NationalityFacade;

class WelcomeController extends Controller
{
    public function index()
    {
        $nationalities = NationalityFacade::all();

        return view('pages.welcome.index', compact('nationalities'));
    }
}
