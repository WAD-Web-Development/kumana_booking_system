<?php

namespace App\Http\Controllers;

use Throwable;
use Illuminate\Http\Request;
use domain\Facades\PackageFacade;

class BookingController extends Controller
{
    public function create($id)
    {
        try {

            $package = PackageFacade::get($id);

            return view('pages.booking.create', compact('package'));
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function summary($id)
    {
        try {
            // $package = Package::findOrFail($id);

            // return view('packages.show', compact('package'));
            return view('pages.booking.summary');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function confirmation($id)
    {
        try {
            // $package = Package::findOrFail($id);

            // return view('packages.show', compact('package'));
            return view('pages.booking.confirmation');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function myBookings()
    {
        try {
            return view('pages.booking.my_bookings');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    public function myBookingDetails($id)
    {
        try {
            // $package = Package::findOrFail($id);

            // return view('packages.show', compact('package'));
            return view('pages.booking.details');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
