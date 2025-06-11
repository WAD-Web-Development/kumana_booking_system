<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use domain\Facades\SpecialDateFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpecialDateRequest;

class SpecialDateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            $specialDates = SpecialDateFacade::allWithParamAndPaginate($request->all());

            return view('pages.admin.special_dates.index', compact('specialDates'));
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.special_dates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSpecialDateRequest $request)
    {
        try {

            SpecialDateFacade::store($request->all());

            return redirect()->route('special-date.index')->with('success', 'Close Date Added Successfully');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
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

            $specialDate = SpecialDateFacade::get($id);

            return view('pages.admin.special_dates.edit', compact('specialDate'));
        } catch (Throwable $th) {

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreSpecialDateRequest $request, string $id)
    {
        try {

            SpecialDateFacade::update($id, $request->all());

            return redirect()->route('special-date.index')->with('success', 'Close Date Updated Successfully');
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            SpecialDateFacade::destroy($id);

            return json_encode(array('response' => 'success', 'message' => 'Close Date Deleted Successfully!'));
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
