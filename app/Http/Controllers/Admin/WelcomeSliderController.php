<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use domain\Facades\ImageFacade;
use App\Http\Controllers\ParentController;
use domain\Facades\WelcomeSliderFacade;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreWelcomeSliderRequest;

class WelcomeSliderController extends ParentController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            $welcomeSliders = WelcomeSliderFacade::allWithParamAndPaginate($request->all());

            return view('pages.admin.welcome_sliders.index', compact('welcomeSliders'));
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.welcome_sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreWelcomeSliderRequest $request)
    {
        try {

            if ($request->image) {
                $imagePath = ImageFacade::store($request->image, 'welcome_slider');

                $request->merge(['image_path' => $imagePath]);
            }

            WelcomeSliderFacade::store($request->all());

            return redirect()->route('welcome-slider.index')->with('success', 'Welcome Sliders Added Successfully');
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

            $welcomeSlider = WelcomeSliderFacade::get($id);

            return view('pages.admin.welcome_sliders.edit', compact('welcomeSlider'));
        } catch (Throwable $th) {

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(StoreWelcomeSliderRequest $request, string $id)
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

                $dataRow = WelcomeSliderFacade::get($id);
                ImageFacade::delete($dataRow->image_path);
                $request->merge(['image_path' => null]);
            }

            if ($request->image) {

                if ($request->has('is_image_removed') && $request->input('is_image_removed') != 1) {
                    $dataRow = WelcomeSliderFacade::get($id);
                    ImageFacade::delete($dataRow->image_path);
                }

                $imagePath = ImageFacade::store($request->image, 'welcome_slider');

                $request->merge(['image_path' => $imagePath]);
            }

            WelcomeSliderFacade::update($id, $request->all());

            return redirect()->route('welcome-slider.index')->with('success', 'Welcome Slider Updated Successfully');
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

            WelcomeSliderFacade::destroy($id);

            return json_encode(array('response' => 'success', 'message' => 'Welcome Slider Deleted Successfully!'));
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }

    public function updateWelcomeSliderStatus(Request $request)
    {
        WelcomeSliderFacade::updateWelcomeSliderStatus($request->all());

        return response()->json([
            'status' => 'success',
            'message' =>  '',
        ]);
    }
}
