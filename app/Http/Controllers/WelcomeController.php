<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use domain\Facades\NationalityFacade;
use domain\Facades\PackageFacade;
use domain\Facades\WelcomeSliderFacade;
use domain\Facades\IncludedFacade;

class WelcomeController extends Controller
{
    public function index()
    {
        $nationalities = NationalityFacade::all();
        $includes = IncludedFacade::all();
        $packages = PackageFacade::activeAll();
        $welcomeSliders = WelcomeSliderFacade::activeAll();

        return view('pages.welcome.index', compact('nationalities','packages','welcomeSliders','includes'));
    }

    public function searchPackages(Request $request)
    {
        $type = $request->input('type', 'all');
        $includes = $request->input('includes', []);

        $packages = PackageFacade::filterPackages($type, $includes);

        $html = view('pages.welcome.partials.package-cards', compact('packages'))->render();

        return response()->json([
            'html' => $html,
        ]);
    }

}
