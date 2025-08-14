@extends('layouts.app', ['activePage' => 'dashboard', 'activeSection' => 'dashboard'])

@section('content')

<div class="container-fluid admin-container d-flex justify-content-center">
    <!-- Adjust the width of the card -->
    <div class="card admin-card shadow-lg col-md-6 mb-5">
        <div class="card-header bg-white border-0 p-4 pb-1">
            <div class="d-lg-flex">
                <div>
                    <h5 class="mb-0 admin-title">Edit Email Attachment</h5>
                </div>
            </div>
        </div>
        <div class="card-body mt-2 p-4 pt-1">
            <form action="{{ route('email-attachment.update', $attachment->id) }}" method="POST" id="email-attachment-edit-form" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group col-md-12 mt-2">
                    <label for="title" class="form-label">Title <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $attachment->title }}" required>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="description" class="form-label mt-2">Description <span
                        style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <textarea id="description" name="description" class="form-control description" rows="5">{{ $attachment->description }}</textarea>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="file" class="form-label mt-2">Attachment File <span style="color: red">*</span></label>

                    @if ($attachment->file_path)
                        <div class="mb-3 d-flex items-center">
                            <span class="mr-3 me-3">Current File:</span>
                            <div class="flex items-center p-2 file-card shadow-sm max-w-sm">
                                <div class="d-flex items-center mr-2">
                                    <i class="fas fa-file m-1 me-3"></i>
                                    <a href="{{ asset('storage/' . $attachment->file_path) }}" target="_blank" class="hover:text-blue-800 text-sm font-medium">
                                        {{ basename($attachment->file_path) }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endif

                    <input type="file" class="form-control" id="file" name="file" required>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ url()->previous() }}" class="btn btn-light admin-btn-cancel text-white m-0">Cancel</a>
                    <button type="submit" class="btn admin-btn m-0 ms-2">Update Email Attachment</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('custom_scripts')
{!! JsValidator::formRequest('App\Http\Requests\UpdateEmailAttachmentRequest', '#email-attachment-edit-form') !!}
@endpush
