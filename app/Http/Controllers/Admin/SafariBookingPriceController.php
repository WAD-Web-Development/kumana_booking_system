<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ParentController;
use domain\Facades\SafariBookingPriceFacade;
use App\Http\Requests\UpdateSafariBookingPriceRequest;

class SafariBookingPriceController extends ParentController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            $prices = SafariBookingPriceFacade::allWithParamAndPaginate($request->all());

            return view('pages.admin.safari_booking_price.index', compact('prices'));
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {

            $price = SafariBookingPriceFacade::get($id);

            return view('pages.admin.safari_booking_price.edit', compact('price'));
        } catch (Throwable $th) {

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSafariBookingPriceRequest $request, string $id)
    {
        try {

            SafariBookingPriceFacade::update($id, $request->all());

            return redirect()->route('safari-booking-price.index')->with('success', 'Booking Price Updated Successfully');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
