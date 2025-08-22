<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use domain\Facades\ImageFacade;
use App\Http\Controllers\ParentController;
use domain\Facades\IncludedFacade;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreIncludedRequest;
use App\Http\Requests\UpdateIncludedRequest;

class IncludedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            $includes = IncludedFacade::allWithParamAndPaginate($request->all());

            return view('pages.admin.includes.index', compact('includes'));
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.includes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIncludedRequest $request)
    {
        try {

            if ($request->image) {
                $imagePath = ImageFacade::store($request->image, 'include');

                $request->merge(['image_path' => $imagePath]);
            }

            IncludedFacade::store($request->all());

            return redirect()->route('include.index')->with('success', 'Include Added Successfully');
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

            $include = IncludedFacade::get($id);

            return view('pages.admin.includes.edit', compact('include'));
        } catch (Throwable $th) {

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateIncludedRequest $request, string $id)
    {
        try {

            if ($request->has('is_image_removed') && $request->input('is_image_removed') == 1) {

                $validator = Validator::make($request->all(), [
                    'image' => 'required|mimes:jpeg,png,jpg,gif|max:10240',
                ]);

                if ($validator->fails()) {
                    return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
                }

                $dataRow = IncludedFacade::get($id);
                ImageFacade::delete($dataRow->image_path);
                $request->merge(['image_path' => null]);
            }

            if ($request->image) {

                if ($request->has('is_image_removed') && $request->input('is_image_removed') != 1) {
                    $dataRow = IncludedFacade::get($id);
                    ImageFacade::delete($dataRow->image_path);
                }

                $imagePath = ImageFacade::store($request->image, 'include');

                $request->merge(['image_path' => $imagePath]);
            }

            IncludedFacade::update($id, $request->all());

            return redirect()->route('include.index')->with('success', 'Include Updated Successfully');
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

            IncludedFacade::destroy($id);

            return json_encode(array('response' => 'success', 'message' => 'Include Deleted Successfully!'));
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
