<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use domain\Facades\SafariBookingPriceFacade;
use App\Http\Controllers\ParentController;

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
