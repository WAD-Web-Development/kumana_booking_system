@extends('layouts.app', ['activePage' => 'dashboard', 'activeSection' => 'dashboard'])

@section('content')
    <div class="container-fluid booking-bg py-5">
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-md-2">
                <div class="booking-summary-details-card-back-btn-container px-4">
                    <a href="{{ route('welcome') }}" class="package-back-btn">
                        <span class="package-back-btn-icon">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="package-back-btn-text">Back to Packages</span>
                    </a>
                </div>
            </div>
            <div class="col-12 col-md-8">
                <div class="card booking-summary-details-card">
                    <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center booking-summary-details-card-header">
                        <h5 class="booking-summary-details-card-title mb-0">Your Booking Summary</h5>
                        <a href="{{ route('booking.create', 1) }}" class="booking-summary-details-card-back-btn">Edit Details</a>
                    </div>
                    <div class="card-body booking-summary-details-card-body px-0 py-0">

                        <div class="row g-0">
                            <div class="col-12 px-4 py-3">
                                <h5 class="booking-summary-details-card-section-title">
                                    Package
                                </h5>
                            </div>
                        </div>

                        <div class="row booking-summary-details-card-row g-0  border-bottom border-top">
                            <div class="col border-end py-4 px-4">
                                <div class="booking-summary-details-card-label mb-1">Name</div>
                                <div class="booking-summary-details-card-value">{{$package->title}}</div>
                            </div>
                            <div class="col border-end py-4 px-4">
                                <div class="booking-summary-details-card-label mb-1">Package</div>
                                <div class="booking-summary-details-card-value">{{$package->type_name}}</div>
                            </div>
                            <div class="col border-end py-4 px-4">
                                <div class="booking-summary-details-card-label mb-1">Type</div>
                                <div class="booking-summary-details-card-value">{{ $package->safari_type ?? '-' }}</div>
                            </div>
                            <div class="col py-4 px-4">
                                <div class="booking-summary-details-card-label mb-1">Safari Type</div>
                                <div class="booking-summary-details-card-value">Morning</div>
                            </div>
                        </div>

                        <div class="row g-0">
                            <div class="col-12 px-4 py-3">
                                <h5 class="booking-summary-details-card-section-title">
                                    Other Details
                                </h5>
                            </div>
                        </div>

                        <div class="row booking-summary-details-card-row g-0  border-bottom border-top">
                            <div class="col border-end py-4 px-4">
                                <div class="booking-summary-details-card-label mb-1">Safari Date</div>
                                <div class="booking-summary-details-card-value">{{ \Carbon\Carbon::parse($tempBooking->safari_date)->format('F d Y') }}</div>
                            </div>
                            <div class="col border-end py-4 px-4">
                                <div class="booking-summary-details-card-label mb-1">Visa Type</div>
                                <div class="booking-summary-details-card-value">Travel Visa</div>
                            </div>
                            <div class="col border-end py-4 px-4">
                                <div class="booking-summary-details-card-label mb-1">No Passengers</div>
                                <div class="booking-summary-details-card-value">{{$tempBooking->number_of_customers}}</div>
                            </div>
                            <div class="col py-4 px-4">
                                <div class="booking-summary-details-card-label mb-1">No Rooms</div>
                                <div class="booking-summary-details-card-value">{{$tempBooking->number_of_rooms}}</div>
                            </div>
                        </div>

                        <div class="row booking-summary-details-card-row g-0  border-bottom">
                            <div class="col border-end py-4 px-4">
                                <div class="booking-summary-details-card-label mb-1">Check in and out</div>
                                <div class="booking-summary-details-card-value">
                                    {{ \Carbon\Carbon::parse($tempBooking->room_check_in_date)->format('F d') }} -
                                    {{ \Carbon\Carbon::parse($tempBooking->room_check_out_date)->format('F d') }}
                                </div>
                            </div>
                            <div class="col border-end py-4 px-4">
                                <div class="booking-summary-details-card-label mb-1">Customer Name</div>
                                <div class="booking-summary-details-card-value">{{$tempBooking->customer_name}}</div>
                            </div>
                            <div class="col border-end py-4 px-4">
                                <div class="booking-summary-details-card-label mb-1">Customer Number</div>
                                <div class="booking-summary-details-card-value">{{$tempBooking->contact_no}}</div>
                            </div>
                            <div class="col booking-summary-details-card-total-price-section py-4 px-4">
                                <div class="booking-summary-details-card-label-price mb-1">Total</div>
                                <div class="booking-summary-details-card-value-price">
                                    {{ floor($tempBooking->price) == $tempBooking->price ? (int)$tempBooking->price : $tempBooking->price }}{{ $tempBooking->currency }}
                                </div>
                            </div>
                        </div>

                        <form action="{{ route('booking.store') }}" method="POST" id="booking-form" enctype="multipart/form-data">
                        @csrf

                            <input type="hidden" name="temp_booking_id" id="temp_booking_id" value="{{$tempBooking->id}}">

                            <div class="row px-4 py-2 mt-4">
                                <div class="col-12">
                                    <textarea id="booking-notes" name="note" class="form-control booking-summary-details-card-notes px-4 py-3" rows="8" placeholder="Add any notes you would like to inform us about"></textarea>
                                </div>
                            </div>

                            <div class="row align-items-center booking-summary-details-card-confirm-section px-4 py-4 mt-4">
                                <div class="col-8">
                                    <p class="booking-summary-details-card-confirm-section-description pe-5">
                                        By booking and sharing your details you agree to our terms and conditions.
                                        We will contact you in any case of questions or confirmation of this booking.
                                        Thank you.
                                    </p>
                                </div>
                                <div class="col-4 text-end">
                                    <button type="submit" class="booking-summary-details-card-btn">Confirm Booking <i class="fas fa-arrow-right booking-summary-details-card-btn-arrow"></i></button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-2"></div>
        </div>
    </div>
@endsection

@push('custom_scripts')
@endpush
