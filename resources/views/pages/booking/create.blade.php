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
                    <div class="card-body px-0 py-0">
                        <div class="row g-0">
                            <div class="col border-end py-4 px-4">
                                <div class="booking-package-details-card-label mb-1">Name</div>
                                <div class="booking-package-details-card-value">{{$package->title}}</div>
                            </div>
                            <div class="col border-end py-4 px-4">
                                <div class="booking-package-details-card-label mb-1">Package</div>
                                <div class="booking-package-details-card-value">{{$package->type_name}}</div>
                            </div>
                            <div class="col border-end py-4 px-4">
                                <div class="booking-package-details-card-label mb-1">Type</div>
                                <div class="booking-package-details-card-value">{{ $package->safari_type ?? '-' }}</div>
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
                            <h5 class="booking-details-card-section-title mt-2">Safari</h5>
                            <p class="booking-details-card-section-description mb-4">Select your preferred date for the safari</p>

                            <div class="row input-group mb-3 booking-details-card-input-row">
                                <div class="col-8 input-group-prepend booking-details-card-input-label">
                                    <span class="input-group-text booking-details-card-input-label-text" id="basic-addon1">Pick up location</span>
                                </div>
                                <select class="col-4 form-select booking-details-card-input-value" aria-label="Pick up location">
                                    <option selected>Entrance 1</option>
                                    <option value="2">Entrance 2</option>
                                    <option value="3">North Side G2</option>
                                </select>
                            </div>

                            <div class="row g-3">
                                <div class="col-12 col-md-6 d-flex align-items-stretch">
                                    <div class="row input-group mb-3 booking-details-card-input-row">
                                        <div class="col-8 input-group-prepend booking-details-card-input-label">
                                            <span class="input-group-text booking-details-card-input-label-text" id="basic-addon1">Which half of the day</span>
                                        </div>
                                        <select class="col-4 form-select booking-details-card-input-value" aria-label="Pick up location">
                                            <option selected>Morning</option>
                                            <option value="2">Afternoon</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 d-flex align-items-stretch">
                                    <div class="row input-group mb-3 booking-details-card-input-row">
                                        <div class="col-8 input-group-prepend booking-details-card-input-label">
                                            <span class="input-group-text booking-details-card-input-label-text" id="basic-addon1">Safari Date</span>
                                        </div>
                                        <input
                                            type="date"
                                            class="col-4 form-control booking-details-card-input-value"
                                            aria-label="Safari Date">
                                    </div>
                                </div>
                            </div>

                            <div class="row g-3">
                                <div class="col-12 col-md-6 d-flex align-items-stretch">
                                    <div class="row input-group mb-3 booking-details-card-input-row">
                                        <div class="col-8 input-group-prepend booking-details-card-input-label">
                                            <span class="input-group-text booking-details-card-input-label-text" id="basic-addon1">Passengers with residence visa</span>
                                        </div>
                                        <select class="col-4 form-select booking-details-card-input-value" aria-label="Pick up location">
                                            <option selected> 1</option>
                                            <option value="2"> 2</option>
                                            <option value="3"> 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 d-flex align-items-stretch">
                                    <div class="row input-group mb-3 booking-details-card-input-row">
                                        <div class="col-8 input-group-prepend booking-details-card-input-label">
                                            <span class="input-group-text booking-details-card-input-label-text" id="basic-addon1">Passengers with travel visa</span>
                                        </div>
                                        <select class="col-4 form-select booking-details-card-input-value" aria-label="Pick up location">
                                            <option selected> 1</option>
                                            <option value="2">  2</option>
                                            <option value="3"> 3</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="booking-details-card-accommodation-section mb-5">
                            <h5 class="booking-details-card-section-title mt-2">Accommodation</h5>
                            <p class="booking-details-card-section-description mb-4">Select your preferred date for the safari</p>

                            <div class="row g-3">
                                <div class="col-12 col-md-6 d-flex align-items-stretch">
                                    <div class="row input-group mb-3 booking-details-card-input-row">
                                        <div class="col-8 input-group-prepend booking-details-card-input-label">
                                            <span class="input-group-text booking-details-card-input-label-text" id="basic-addon1">Number of rooms</span>
                                        </div>
                                        <select class="col-4 form-select booking-details-card-input-value" aria-label="Pick up location">
                                            <option selected> 1</option>
                                            <option value="2"> 2</option>
                                            <option value="3"> 3</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 d-flex align-items-stretch">
                                    <div class="row input-group mb-3 booking-details-card-input-row">
                                        <div class="col-8 input-group-prepend booking-details-card-input-label">
                                            <span class="input-group-text booking-details-card-input-label-text" id="basic-addon1">Check in and out</span>
                                        </div>
                                        <input
                                            type="date"
                                            class="col-4 form-control booking-details-card-input-value"
                                            aria-label="Safari Date">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="booking-details-card-contact-information-section mb-5">
                            <h5 class="booking-details-card-section-title mt-2">Contact Information</h5>
                            <p class="booking-details-card-section-description mb-4">Select your preferred date for the safari</p>

                            <div class="row g-3">
                                <div class="col-12 col-md-6 d-flex align-items-stretch">
                                    <div class="row input-group mb-3 booking-details-card-input-row">
                                        <div class="col-8 input-group-prepend booking-details-card-input-label">
                                            <span class="input-group-text booking-details-card-input-label-text" id="basic-addon1">Customer Name</span>
                                        </div>
                                        <input
                                            type="text"
                                            class="col-4 form-control booking-details-card-input-value"
                                            aria-label="Customer Name"
                                            placeholder="Enter name">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 d-flex align-items-stretch">
                                    <div class="row input-group mb-3 booking-details-card-input-row">
                                        <div class="col-8 input-group-prepend booking-details-card-input-label">
                                            <span class="input-group-text booking-details-card-input-label-text" id="basic-addon1">Contact Number</span>
                                        </div>
                                        <input
                                            type="tel"
                                            class="col-4 form-control booking-details-card-input-value"
                                            aria-label="Contact Number"
                                            placeholder="Enter contact number">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center booking-details-card-continue-section">
                            <div class="col-8">
                                <p class="booking-details-card-continue-section-description pe-5">
                                    By booking and sharing your details you agree to our terms and conditions.
                                    We will contact you in any case of questions or confirmation of this booking.
                                    Thank you.
                                </p>
                            </div>
                            <div class="col-4 text-end">
                                <a href="{{ route('booking.summary', 1) }}" class="booking-details-card-btn">Continue</a>
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
