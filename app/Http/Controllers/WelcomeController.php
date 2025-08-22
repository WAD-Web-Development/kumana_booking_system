<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use domain\Facades\NationalityFacade;
use domain\Facades\PackageFacade;
use domain\Facades\WelcomeSliderFacade;

class WelcomeController extends Controller
{
    public function index()
    {
        $nationalities = NationalityFacade::all();
        $packages = PackageFacade::activeAll();
        $welcomeSliders = WelcomeSliderFacade::activeAll();

        return view('pages.welcome.index', compact('nationalities','packages','welcomeSliders'));
    }

    public function searchPackages(Request $request)
    {
        $type = $request->input('type', 'all');

        $query = PackageFacade::activeAll();

        if ($type !== 'all') {
            $query = $query->where('type', $type);
        }

        $packages = $query;

        $html = view('pages.welcome.partials.package-cards', compact('packages'))->render();

        return response()->json([
            'html' => $html,
        ]);
    }

}
