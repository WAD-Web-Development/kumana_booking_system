<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use domain\Facades\NationalityFacade;
use domain\Facades\PackageFacade;

class WelcomeController extends Controller
{
    public function index()
    {
        $nationalities = NationalityFacade::all();
        $packages = PackageFacade::activeAll();

        return view('pages.welcome.index', compact('nationalities','packages'));
    }

    public function searchPackages(Request $request)
    {
        $query = $request->input('query');

        $packages = PackageFacade::activeAll();

        $html = view('pages.welcome.partials.package-cards', compact('packages'))->render();

        return response()->json([
            'html' => $html,
        ]);
    }

}
