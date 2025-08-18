<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use domain\Facades\ImageFacade;
use domain\Facades\PackageFacade;
use domain\Facades\RoomTypeFacade;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\ParentController;
use App\Http\Requests\StorePackageRequest;
use App\Http\Requests\UpdatePackageRequest;

class PackageController extends ParentController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            $packages = PackageFacade::allWithParamAndPaginate($request->all());

            return view('pages.admin.packages.index', compact('packages'));
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        try {

            $roomTypes = RoomTypeFacade::allActive();
            $imagesArray = [];

            return view('pages.admin.packages.create', compact('roomTypes','imagesArray'));
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePackageRequest $request)
    {
        try {

            $is_special = isset($request->is_special) ? 1 : 0;
            $request->merge(['is_special' => $is_special]);

            if ($request->image) {
                $imagePath = ImageFacade::store($request->image, 'package');

                $request->merge(['image_path' => $imagePath]);
            }

            if ($request->package_images) {
                $imagePaths = [];

                foreach ($request->package_images as $image) {
                    $packageImagePath = ImageFacade::store($image, 'package');
                    $imagePaths[] = $packageImagePath;
                }

                $request->merge(['image_paths' => $imagePaths]);
            }

            PackageFacade::store($request->all());

            return redirect()->route('package.index')->with('success', 'Package Added Successfully');
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

            $package = PackageFacade::get($id);
            $roomTypes = RoomTypeFacade::allActive();
            $imagesArray = $package->images->toArray();

            return view('pages.admin.packages.edit', compact('package', 'roomTypes', 'imagesArray'));
        } catch (Throwable $th) {

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePackageRequest $request, string $id)
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
            }

            $is_special = isset($request->is_special) ? 1 : 0;
            $request->merge(['is_special' => $is_special]);

            if ($request->image) {

                $dataRow = PackageFacade::get($id);
                ImageFacade::delete($dataRow->image_path);

                $imagePath = ImageFacade::store($request->image, 'package');

                $request->merge(['image_path' => $imagePath]);
            }

            if ($request->package_images) {
                $imagePaths = [];

                foreach ($request->package_images as $image) {
                    $packageImagePath = ImageFacade::store($image, 'package');
                    $imagePaths[] = $packageImagePath;
                }

                $request->merge(['image_paths' => $imagePaths]);
            }

            PackageFacade::update($id, $request->all());

            return redirect()->route('package.index')->with('success', 'Package Updated Successfully');
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

            PackageFacade::destroy($id);

            return json_encode(array('response' => 'success', 'message' => 'Package Deleted Successfully!'));
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function updatePackageStatus(Request $request)
    {

        PackageFacade::updatePackageStatus($request->all());

        return response()->json([
            'status' => 'success',
            'message' =>  '',
        ]);
    }
}
