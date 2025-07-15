@extends('layouts.app-dashboard', ['activePage' => 'dashboard', 'activeSection' => 'dashboard'])

@section('content')
    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
            <div class="col-12">
                <div class="card your-booking-details-card">
                    <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center your-booking-details-card-header">
                        <h5 class="your-booking-details-card-title mb-0">Your Bookings</h5>
                    </div>
                    <div class="card-body your-booking-details-card-body px-4 py-4">

                        <h5 class="your-booking-details-card-section-title mb-4">
                            Upcoming
                        </h5>

                        <div class="card your-booking-details-card mb-4">
                            <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center your-booking-details-card-header">
                                <h5 class="your-booking-details-card-title mb-0">#465436</h5>
                                <a href="{{ route('booking.create', 1) }}" class="your-booking-details-card-view-btn">View <i class="fas fa-arrow-right your-booking-details-card-view-btn-arrow ms-2"></i></a>
                            </div>
                            <div class="card-body px-0 py-0">
                                <div class="row g-0">
                                    <div class="col border-end py-4 px-4">
                                        <div class="your-booking-details-card-label mb-1">Date</div>
                                        <div class="your-booking-details-card-value">June 31 2025</div>
                                    </div>
                                    <div class="col border-end py-4 px-4">
                                        <div class="your-booking-details-card-label mb-1">Package</div>
                                        <div class="your-booking-details-card-value">Wildlife Retreat</div>
                                    </div>
                                    <div class="col border-end py-4 px-4">
                                        <div class="your-booking-details-card-label mb-1">People</div>
                                        <div class="your-booking-details-card-value">2</div>
                                    </div>
                                    <div class="col border-end py-4 px-4">
                                        <div class="your-booking-details-card-label mb-1">Price</div>
                                        <div class="your-booking-details-card-value">24000LKR</div>
                                    </div>
                                    <div class="col py-4 px-4">
                                        <div class="your-booking-details-card-label mb-1">Status</div>
                                        <div class="your-booking-details-card-value">Ongoing</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h5 class="your-booking-details-card-section-title mt-4 mb-4">
                            Old Bookings
                        </h5>

                        <div class="card your-booking-details-card mb-4">
                            <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center your-booking-details-card-header">
                                <h5 class="your-booking-details-card-title mb-0">#465436</h5>
                                <a href="{{ route('booking.create', 1) }}" class="your-booking-details-card-view-btn">View <i class="fas fa-arrow-right your-booking-details-card-view-btn-arrow ms-2"></i></a>
                            </div>
                            <div class="card-body px-0 py-0">
                                <div class="row g-0">
                                    <div class="col border-end py-4 px-4">
                                        <div class="your-booking-details-card-label mb-1">Date</div>
                                        <div class="your-booking-details-card-value">June 31 2025</div>
                                    </div>
                                    <div class="col border-end py-4 px-4">
                                        <div class="your-booking-details-card-label mb-1">Package</div>
                                        <div class="your-booking-details-card-value">Wildlife Retreat</div>
                                    </div>
                                    <div class="col border-end py-4 px-4">
                                        <div class="your-booking-details-card-label mb-1">People</div>
                                        <div class="your-booking-details-card-value">2</div>
                                    </div>
                                    <div class="col border-end py-4 px-4">
                                        <div class="your-booking-details-card-label mb-1">Price</div>
                                        <div class="your-booking-details-card-value">24000LKR</div>
                                    </div>
                                    <div class="col py-4 px-4">
                                        <div class="your-booking-details-card-label mb-1">Status</div>
                                        <div class="your-booking-details-card-value">Complete</div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card your-booking-details-card mb-4">
                            <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center your-booking-details-card-header">
                                <h5 class="your-booking-details-card-title mb-0">#465436</h5>
                                <a href="{{ route('booking.create', 1) }}" class="your-booking-details-card-view-btn">View <i class="fas fa-arrow-right your-booking-details-card-view-btn-arrow ms-2"></i></a>
                            </div>
                            <div class="card-body px-0 py-0">
                                <div class="row g-0">
                                    <div class="col border-end py-4 px-4">
                                        <div class="your-booking-details-card-label mb-1">Date</div>
                                        <div class="your-booking-details-card-value">June 31 2025</div>
                                    </div>
                                    <div class="col border-end py-4 px-4">
                                        <div class="your-booking-details-card-label mb-1">Package</div>
                                        <div class="your-booking-details-card-value">Wildlife Retreat</div>
                                    </div>
                                    <div class="col border-end py-4 px-4">
                                        <div class="your-booking-details-card-label mb-1">People</div>
                                        <div class="your-booking-details-card-value">2</div>
                                    </div>
                                    <div class="col border-end py-4 px-4">
                                        <div class="your-booking-details-card-label mb-1">Price</div>
                                        <div class="your-booking-details-card-value">24000LKR</div>
                                    </div>
                                    <div class="col py-4 px-4">
                                        <div class="your-booking-details-card-label mb-1">Status</div>
                                        <div class="your-booking-details-card-value">Complete</div>
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
