@extends('layouts.app-dashboard', ['activePage' => 'my_bookings', 'activeSection' => 'my_bookings'])

@section('content')
    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
            <div class="col-12">
                <div class="card your-booking-details-card">
                    {{-- <div class="card-header px-4 py-3 d-flex align-items-center your-booking-details-card-header">
                        <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M3.457 7.04928L7.36552 10.9578L6.33505 11.9883L0.66741 6.32062L6.33505 0.653053L7.36552 1.68352L3.457 5.59197L12.3259 5.59197L12.3259 7.04928L3.457 7.04928Z" fill="#0D4B2D"/>
                        </svg>
                        <h5 class="your-booking-details-card-title mb-0">Back</h5>
                    </div> --}}
                    <div class="card-header px-4 py-3 d-flex align-items-center justify-content-between position-relative your-booking-details-card-header">
                        <!-- Back button -->
                        <div class="d-flex align-items-center your-booking-details-card-back-btn">
                            <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M3.457 7.04928L7.36552 10.9578L6.33505 11.9883L0.66741 6.32062L6.33505 0.653053L7.36552 1.68352L3.457 5.59197L12.3259 5.59197L12.3259 7.04928L3.457 7.04928Z" fill="#0D4B2D"/>
                            </svg>
                            <h5 class="mb-0 ms-3 your-booking-details-card-back-btn-title">Back</h5>
                        </div>

                        <!-- Centered Booking ID -->
                        <div class="position-absolute start-50 translate-middle-x text-center your-booking-details-card-booking-id-section">
                            <h5 class="mb-0 your-booking-details-card-booking-id">#465436</h5>
                        </div>
                    </div>

                    <div class="card-body your-booking-details-card-body px-4 py-4">

                        <div class="card your-booking-summary-details-card">
                            <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center your-booking-summary-details-card-header">
                                <h5 class="your-booking-summary-details-card-title mb-0">Your Booking Summary</h5>
                            </div>
                            <div class="card-body your-booking-summary-details-card-body px-0 py-0">

                                <div class="row g-0">
                                    <div class="col-12 px-4 py-3">
                                        <h5 class="your-booking-summary-details-card-section-title">
                                            Package
                                        </h5>
                                    </div>
                                </div>

                                <div class="row your-booking-summary-details-card-row g-0  border-bottom border-top">
                                    <div class="col border-end py-4 px-4">
                                        <div class="your-booking-summary-details-card-label mb-1">Name</div>
                                        <div class="your-booking-summary-details-card-value">Sunset Experience</div>
                                    </div>
                                    <div class="col border-end py-4 px-4">
                                        <div class="your-booking-summary-details-card-label mb-1">Package</div>
                                        <div class="your-booking-summary-details-card-value">Stay + Safari</div>
                                    </div>
                                    <div class="col border-end py-4 px-4">
                                        <div class="your-booking-summary-details-card-label mb-1">Type</div>
                                        <div class="your-booking-summary-details-card-value">Full Day</div>
                                    </div>
                                    <div class="col py-4 px-4">
                                        <div class="your-booking-summary-details-card-label mb-1">Safari Type</div>
                                        <div class="your-booking-summary-details-card-value">Morning</div>
                                    </div>
                                </div>

                                <div class="row g-0">
                                    <div class="col-12 px-4 py-3">
                                        <h5 class="your-booking-summary-details-card-section-title">
                                            Other Details
                                        </h5>
                                    </div>
                                </div>

                                <div class="row your-booking-summary-details-card-row g-0  border-bottom border-top">
                                    <div class="col border-end py-4 px-4">
                                        <div class="your-booking-summary-details-card-label mb-1">Safari Date</div>
                                        <div class="your-booking-summary-details-card-value">June 23 2025</div>
                                    </div>
                                    <div class="col border-end py-4 px-4">
                                        <div class="your-booking-summary-details-card-label mb-1">Visa Type</div>
                                        <div class="your-booking-summary-details-card-value">Travel Visa</div>
                                    </div>
                                    <div class="col border-end py-4 px-4">
                                        <div class="your-booking-summary-details-card-label mb-1">No Passengers</div>
                                        <div class="your-booking-summary-details-card-value">2</div>
                                    </div>
                                    <div class="col py-4 px-4">
                                        <div class="your-booking-summary-details-card-label mb-1">No Rooms</div>
                                        <div class="your-booking-summary-details-card-value">1</div>
                                    </div>
                                </div>

                                <div class="row your-booking-summary-details-card-row g-0  border-bottom">
                                    <div class="col border-end py-4 px-4">
                                        <div class="your-booking-summary-details-card-label mb-1">Vheck in and out</div>
                                        <div class="your-booking-summary-details-card-value">June 23 - June 28</div>
                                    </div>
                                    <div class="col border-end py-4 px-4">
                                        <div class="your-booking-summary-details-card-label mb-1">Customer Name</div>
                                        <div class="your-booking-summary-details-card-value">Janani Silava</div>
                                    </div>
                                    <div class="col border-end py-4 px-4">
                                        <div class="your-booking-summary-details-card-label mb-1">Customer Number</div>
                                        <div class="your-booking-summary-details-card-value">+94 77 123 4567</div>
                                    </div>
                                    <div class="col your-booking-summary-details-card-total-price-section py-4 px-4">
                                        <div class="your-booking-summary-details-card-label-price mb-1">Total</div>
                                        <div class="your-booking-summary-details-card-value-price">24000LKR</div>
                                    </div>
                                </div>

                                <div class="row px-4 py-2 mt-4 mb-3">
                                    <div class="col-12">
                                        <textarea id="booking-notes" name="notes" class="form-control your-booking-summary-details-card-notes px-4 py-3" rows="8"> - </textarea>
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
