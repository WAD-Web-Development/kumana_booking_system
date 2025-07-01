<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function create($id)
    {
        try {
            // $package = Package::findOrFail($id);

            // return view('packages.show', compact('package'));
            return view('pages.booking.create');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
