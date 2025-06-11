@extends('layouts.app', ['activePage' => 'dashboard', 'activeSection' => 'dashboard'])

@section('content')

<div class="container-fluid admin-container d-flex justify-content-center">
    <!-- Adjust the width of the card -->
    <div class="card admin-card shadow-lg col-md-6">
        <div class="card-header bg-white border-0 p-4 pb-1">
            <div class="d-lg-flex">
                <div>
                    <h5 class="mb-0 admin-title">New Special Date</h5>
                </div>
            </div>
        </div>
        <div class="card-body mt-2 p-4 pt-1">
            <form action="{{ route('special-date.store') }}" method="POST" id="special-date-form" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-12 mt-2">
                    <label for="title" class="form-label">Title <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="date" class="form-label mt-2">Date <span style="color: red">*</span></label>
                    <input type="date" class="form-control" id="date" name="date" required>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="description" class="form-label mt-2">Description <span
                        style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <textarea id="description" name="description" class="form-control description" rows="5"></textarea>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ url()->previous() }}" class="btn btn-light admin-btn-cancel text-white m-0">Cancel</a>
                    <button type="submit" class="btn admin-btn m-0 ms-2">Create Special Date</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('custom_scripts')
{!! JsValidator::formRequest('App\Http\Requests\StoreSpecialDateRequest', '#special-date-form') !!}
@endpush
