<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Throwable;
use domain\Facades\PackageFacade;

class PackageController extends Controller
{
    public function index()
    {
        return view('pages.package.index');
    }

    public function show($id)
    {
        try {

            $package = PackageFacade::get($id);

            return view('pages.package.show', compact('package'));
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
