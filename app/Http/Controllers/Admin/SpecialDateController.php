<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use domain\Facades\ImageFacade;
use App\Http\Controllers\Controller;
use domain\Facades\SpecialDateFacade;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ParentController;
use App\Http\Requests\StoreSpecialDateRequest;

class SpecialDateController extends ParentController
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

            $is_full_day = isset($request->is_half_day) ? 0 : 1;
            $request->merge(['is_full_day' => $is_full_day]);

            $is_closed = isset($request->is_closed) ? 1 : 0;
            $request->merge(['is_closed' => $is_closed]);

            if ($request->image) {
                $imagePath = ImageFacade::store($request->image, 'special_date');

                $request->merge(['image_path' => $imagePath]);
            }

            SpecialDateFacade::store($request->all());

            return redirect()->route('special-date.index')->with('success', 'Special Date Added Successfully');
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

            if ($request->has('is_image_removed') && $request->input('is_image_removed') == 1) {

                $validator = Validator::make($request->all(), [
                    'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:10240',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }

                $dataRow = SpecialDateFacade::get($id);
                ImageFacade::delete($dataRow->image_path);
                $request->merge(['image_path' => null]);
            }

            $is_full_day = isset($request->is_half_day) ? 0 : 1;
            $request->merge(['is_full_day' => $is_full_day]);

            $is_closed = isset($request->is_closed) ? 1 : 0;
            $request->merge(['is_closed' => $is_closed]);

            if ($request->image) {

                if ($request->has('is_image_removed') && $request->input('is_image_removed') != 1) {
                    $dataRow = SpecialDateFacade::get($id);
                    ImageFacade::delete($dataRow->image_path);
                }

                $imagePath = ImageFacade::store($request->image, 'special_date');

                $request->merge(['image_path' => $imagePath]);
            }

            SpecialDateFacade::update($id, $request->all());

            return redirect()->route('special-date.index')->with('success', 'Special Date Updated Successfully');
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

            return json_encode(array('response' => 'success', 'message' => 'Special Date Deleted Successfully!'));
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function updateSpecialDateStatus(Request $request)
    {

        SpecialDateFacade::updateSpecialDateStatus($request->all());

        return response()->json([
            'status' => 'success',
            'message' =>  '',
        ]);
    }
}
