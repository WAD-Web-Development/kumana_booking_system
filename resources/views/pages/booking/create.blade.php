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
                    <div class="card-body px-4 py-4">
                        <div class="booking-details-card-safari-section mb-5">
                            <h5 class="booking-details-card-safari-section-title mt-2">Safari</h5>
                            <p class="booking-details-card-safari-section-description mb-4">Select your preferred date for the safari</p>

                            <div class="row m-0 p-0 input-group mb-3">
                                <div class="col-8 p-0 input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1">Pick up location</span>
                                </div>
                                <input type="text" class="col-4 p-0 form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
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
