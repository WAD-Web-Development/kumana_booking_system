<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use domain\Facades\CloseDateFacade;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreCloseDateRequest;

class CloseDateController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            $closeDates = CloseDateFacade::allWithParamAndPaginate($request->all());

            return view('pages.admin.close_dates.index', compact('closeDates'));
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.close_dates.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCloseDateRequest $request)
    {
        try {

            CloseDateFacade::store($request->all());

            return redirect()->route('close-date.index')->with('success', 'Close Date Added Successfully');
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

            $closeDate = CloseDateFacade::get($id);

            return view('pages.admin.close_dates.edit', compact('closeDate'));
        } catch (Throwable $th) {

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreCloseDateRequest $request, string $id)
    {
        try {

            CloseDateFacade::update($id, $request->all());

            return redirect()->route('close-date.index')->with('success', 'Close Date Updated Successfully');
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

            CloseDateFacade::destroy($id);

            return json_encode(array('response' => 'success', 'message' => 'Close Date Deleted Successfully!'));
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
