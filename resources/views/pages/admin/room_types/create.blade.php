@extends('layouts.app', ['activePage' => 'dashboard', 'activeSection' => 'dashboard'])

@section('content')

<div class="container-fluid admin-container d-flex justify-content-center">
    <!-- Adjust the width of the card -->
    <div class="card admin-card shadow-lg col-md-6 mb-5">
        <div class="card-header bg-white border-0 p-4 pb-1">
            <div class="d-lg-flex">
                <div>
                    <h5 class="mb-0 admin-title">New Room Type</h5>
                </div>
            </div>
        </div>
        <div class="card-body mt-2 p-4 pt-1">
            <form action="{{ route('room-type.store') }}" method="POST" id="room-type-form" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-12 mt-2">
                    <label for="title" class="form-label">Title <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="room_count" class="form-label">Room Count <span style="color: red">*</span></label>
                    <input type="number" class="form-control" id="room_count" name="room_count" min="1" required>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="max_people_count" class="form-label">Max People Count <span style="color: red">*</span></label>
                    <input type="number" class="form-control" id="max_people_count" name="max_people_count" min="1" required>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="price" class="form-label">Price (LKR) <span style="color: red">*</span></label>
                    <input type="number" step="0.01" class="form-control" id="price" name="price" min="0" required>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="description" class="form-label mt-2">Description <span
                        style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <textarea id="description" name="description" class="form-control description" rows="5"></textarea>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ url()->previous() }}" class="btn btn-light admin-btn-cancel text-white m-0">Cancel</a>
                    <button type="submit" class="btn admin-btn m-0 ms-2">Create Room Type</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('custom_scripts')
{!! JsValidator::formRequest('App\Http\Requests\StoreRoomTypeRequest', '#room-type-form') !!}
@endpush
