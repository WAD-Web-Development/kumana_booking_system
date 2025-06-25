<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use domain\Facades\FileFacade;
use App\Http\Controllers\Controller;
use domain\Facades\EmailAttachmentFacade;
use App\Http\Controllers\ParentController;
use App\Http\Requests\StoreEmailAttachmentRequest;
use App\Http\Requests\UpdateEmailAttachmentRequest;

class EmailAttachmentController extends ParentController
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            $attachment = EmailAttachmentFacade::first();

            return view('pages.admin.email_attachments.index', compact('attachment'));
        } catch (Throwable $th) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $attachment = EmailAttachmentFacade::first();
        if (!$attachment) {
            return view('pages.admin.email_attachments.create');
        }else {
            return redirect()->back()->with('error', 'An attachment already exists. You cannot add another one.');
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEmailAttachmentRequest $request)
    {
        try {

            if ($request->file) {
                $filePath = FileFacade::store($request->file, 'email_attachment');

                $request->merge(['file_path' => $filePath]);
            }

            EmailAttachmentFacade::store($request->all());

            return redirect()->route('email-attachment.index')->with('success', 'Attachment Added Successfully');
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

            $attachment = EmailAttachmentFacade::get($id);

            return view('pages.admin.email_attachments.edit', compact('attachment'));
        } catch (Throwable $th) {

            return redirect()->back()->with('error', 'Something went wrong');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEmailAttachmentRequest $request, string $id)
    {
        try {

            if ($request->file) {

                $dataRow = EmailAttachmentFacade::get($id);
                FileFacade::delete($dataRow->file_path);

                $filePath = FileFacade::store($request->file, 'email_attachment');

                $request->merge(['file_path' => $filePath]);
            }

            EmailAttachmentFacade::update($id, $request->all());

            return redirect()->route('email-attachment.index')->with('success', 'Attachments Updated Successfully');
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

            EmailAttachmentFacade::destroy($id);

            return json_encode(array('response' => 'success', 'message' => 'Attachment Deleted Successfully!'));
        } catch (Exception $e) {
            return redirect()->back()->withError($e->getMessage());
        }
    }
}
