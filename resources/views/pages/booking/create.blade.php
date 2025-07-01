@extends('layouts.app', ['activePage' => 'dashboard', 'activeSection' => 'dashboard'])

@section('content')
    <div class="container-fluid booking-bg py-5">
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-md-8">
                <div class="card booking-package-details-card">
                    <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center booking-package-details-card-header">
                        <h5 class="booking-package-details-card-title mb-0">Selected Package Details</h5>
                        <a href="{{ route('package.index') }}" class="booking-package-details-card-back-btn">Go back to package details</a>
                    </div>
                    <div class="card-body px-4 py-0">
                        <div class="row g-0">
                            <div class="col border-end py-4">
                                <div class="booking-package-details-card-label mb-1">Name</div>
                                <div class="booking-package-details-card-value">Sunset Experience</div>
                            </div>
                            <div class="col border-end py-4 px-4">
                                <div class="booking-package-details-card-label mb-1">Package</div>
                                <div class="booking-package-details-card-value">Stay + Safari</div>
                            </div>
                            <div class="col border-end py-4 px-4">
                                <div class="booking-package-details-card-label mb-1">Type</div>
                                <div class="booking-package-details-card-value">Full Day</div>
                            </div>
                            <div class="col border-end py-4 px-4">
                                <div class="booking-package-details-card-label mb-1">Time</div>
                                <div class="booking-package-details-card-value">-</div>
                            </div>
                            <div class="col py-4 px-4">
                                <div class="booking-package-details-card-label mb-1">Price</div>
                                <div class="booking-package-details-card-value-price">12000LKR pp</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card booking-details-card">
                    <div class="card-header px-4 py-4 booking-details-card-header">
                        <h4 class="booking-details-card-title mb-0">Confirm your booking</h4>
                    </div>
                    <div class="card-body px-4 py-0">
                        <div class="py-4">
                            <h5 class="mb-1">Safari</h5>
                            <div class="text-muted mb-4" style="font-size: 1rem;">Select your preferred date for the safari</div>
                            <div class="row g-3">
                                <div class="col-md-6 col-lg-4">
                                    <label class="form-label">Pick up location</label>
                                    <select class="form-select">
                                        <option>Entrance 1</option>
                                        <option>Entrance 2</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <label class="form-label">Safari Date</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-calendar"></i></span>
                                        <input type="date" class="form-control" value="2024-06-18">
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <label class="form-label">Passenger visa type</label>
                                    <select class="form-select">
                                        <option>Travel Visa</option>
                                        <option>Resident Visa</option>
                                    </select>
                                </div>
                                <div class="col-md-6 col-lg-4">
                                    <label class="form-label">Number of Passengers</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="bi bi-people"></i></span>
                                        <input type="number" class="form-control" value="2" min="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_scripts')
@endpush
