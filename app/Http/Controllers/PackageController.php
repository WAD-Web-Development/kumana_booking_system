<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackageController extends Controller
{
    public function index()
    {
        return view('pages.package.index');
    }

    public function show($id)
    {
        try {

            // $package = Package::findOrFail($id);

            // return view('packages.show', compact('package'));
            return view('pages.package.show');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
