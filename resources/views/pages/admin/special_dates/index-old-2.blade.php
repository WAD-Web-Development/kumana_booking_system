@extends('layouts.app-dashboard', ['activePage' => 'special_date', 'activeSection' => 'special_date'])

@section('content')
    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
            <div class="col-12">
                <div class="card admin-management-page-card">
                    <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center admin-management-page-card-header">
                        <h5 class="admin-management-page-card-title mb-0">Special Dates</h5>
                    </div>
                    <div class="card-body admin-management-page-card-body px-4 py-4">

                        @forelse ($specialDates as $specialDate)
                            <div class="card admin-management-card mb-4">
                                <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center admin-management-card-header">
                                    <h5 class="admin-management-card-title mb-0">#465436</h5>
                                    <a href="{{ route('booking.myBookingDetails', 1) }}" class="admin-management-card-view-btn">View <i class="fas fa-arrow-right admin-management-card-view-btn-arrow ms-2"></i></a>
                                </div>
                                <div class="card-body px-0 py-0">
                                    <div class="row g-0">
                                        <div class="col border-end py-4 px-4">
                                            <div class="admin-management-card-label mb-1">Start Date</div>
                                            <div class="admin-management-card-value">{{ $specialDate->start_date }}</div>
                                        </div>
                                        <div class="col border-end py-4 px-4">
                                            <div class="admin-management-card-label mb-1">End Date</div>
                                            <div class="admin-management-card-value">{{ $specialDate->end_date }}</div>
                                        </div>
                                        <div class="col border-end py-4 px-4">
                                            <div class="admin-management-card-label mb-1">Is active</div>
                                            <div class="admin-management-card-value">
                                                @if ($specialDate->is_active)
                                                    Active
                                                @else
                                                    Deactive
                                                @endif
                                            </div>
                                        </div>
                                        <div class="col border-end py-4 px-4">
                                            <div class="admin-management-card-label mb-1">Price</div>
                                            <div class="admin-management-card-value">24000LKR</div>
                                        </div>
                                        <div class="col py-4 px-4">
                                            <div class="admin-management-card-label mb-1">Status</div>
                                            <div class="admin-management-card-value">Ongoing</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <div class="text-center">
                                <p>No special dates found</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_scripts')
@endpush
