@extends('layouts.app-dashboard', ['activePage' => 'dashboard', 'activeSection' => 'dashboard'])

@section('content')
    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
            <div class="col-12">
                <div class="card your-booking-details-card">
                    <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center your-booking-details-card-header">
                        <h5 class="your-booking-details-card-title mb-0">Dashboard</h5>
                    </div>
                    <div class="card-body your-booking-details-card-body px-4 py-4">

                        <h5 class="your-booking-details-card-section-title mb-4">
                            Dashboard
                        </h5>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_scripts')
@endpush
