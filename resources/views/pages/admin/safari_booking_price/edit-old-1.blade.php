@extends('layouts.app', ['activePage' => 'dashboard', 'activeSection' => 'dashboard'])

@section('content')

<div class="container-fluid admin-container d-flex justify-content-center">
    <!-- Adjust the width of the card -->
    <div class="card admin-card shadow-lg col-md-6 mb-5">
        <div class="card-header bg-white border-0 p-4 pb-1">
            <div class="d-lg-flex">
                <div>
                    <h5 class="mb-0 admin-title">Edit Safari Booking Price</h5>
                </div>
            </div>
        </div>
        <div class="card-body mt-2 p-4 pt-1">
            <form action="{{ route('safari-booking-price.update', $price->id) }}" method="POST" id="safari-booking-price-edit-form" enctype="multipart/form-data">
                @method('PUT')
                @csrf

                <div class="form-group col-md-12 mt-2">
                    <label for="visa_type" class="form-label">Visa Type</label>
                    <input type="text" class="form-control" id="visa_type" name="visa_type" value="{{ $price->visa_type }}" disabled>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="group_type" class="form-label">Group Type</label>
                    <input type="text" class="form-control" id="group_type" name="group_type" value="{{ $price->group_type }}" disabled>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="person_count" class="form-label">Person Count</label>
                    <input type="number" class="form-control" id="person_count" name="person_count" value="{{ $price->person_count }}" disabled>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="half_day_price" class="form-label">Half Day Price (LKR) <span style="color: red">*</span></label>
                    <input type="number" step="0.01" class="form-control" id="half_day_price" name="half_day_price" min="0" value="{{ $price->half_day_price }}" required>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="full_day_price" class="form-label">Full Day Price (LKR) <span style="color: red">*</span></label>
                    <input type="number" step="0.01" class="form-control" id="full_day_price" name="full_day_price" min="0" value="{{ $price->full_day_price }}" required>
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ url()->previous() }}" class="btn btn-light admin-btn-cancel text-white m-0">Cancel</a>
                    <button type="submit" class="btn admin-btn m-0 ms-2">Update Safari Booking Price</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('custom_scripts')
{!! JsValidator::formRequest('App\Http\Requests\UpdateSafariBookingPriceRequest', '#safari-booking-price-edit-form') !!}
@endpush
