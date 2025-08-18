<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\ParentController;
use App\Http\Requests\StoreRoomTypeRequest;
use domain\Facades\RoomTypeFacade;

class RoomTypeController extends ParentController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            $roomTypes= RoomTypeFacade::allWithParamAndPaginate($request->all());

            return view('pages.admin.room_types.index', compact('roomTypes'));
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.room_types.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoomTypeRequest $request)
    {
        try {

            RoomTypeFacade::store($request->all());

            return redirect()->route('room-type.index')->with('success', 'Room Type Added Successfully');
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

            $roomType = RoomTypeFacade::get($id);

            return view('pages.admin.room_types.edit', compact('roomType'));
        } catch (Throwable $th) {

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreRoomTypeRequest $request, string $id)
    {
        try {

            RoomTypeFacade::update($id, $request->all());

            return redirect()->route('room-type.index')->with('success', 'Room Type Updated Successfully');
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

            RoomTypeFacade::destroy($id);

            return json_encode(array('response' => 'success', 'message' => 'Room Type Deleted Successfully!'));
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function updateRoomTypeStatus(Request $request)
    {

        RoomTypeFacade::updateRoomTypeStatus($request->all());

        return response()->json([
            'status' => 'success',
            'message' =>  '',
        ]);
    }
}
