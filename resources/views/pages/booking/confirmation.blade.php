@extends('layouts.app', ['activePage' => 'dashboard', 'activeSection' => 'dashboard'])

@section('content')
    <div class="container-fluid booking-bg py-5">
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-md-4">
                <div class="card booking-confirmation-card">
                    <img src="{{ asset('assets/img/image1.jpg') }}" class="booking-confirmation-card-img" alt="image">
                    <div class="card-body booking-confirmation-card-body text-center">
                        <h2 class="booking-confirmation-card-title mb-5">
                            Hello! Your booking has been confirmed,<br>
                            we will get in touch with you for further<br>
                            instructions. Thank you!
                        </h2>
                        <div class="mb-1 booking-confirmation-card-reference-id">
                            Booking Reference ID
                        </div>
                        <div class="mb-4 booking-confirmation-card-reference-id-value">
                            33542#
                        </div>
                        <div class="mb-5 booking-confirmation-card-description">
                            We have emailed a confirmation email to your<br>
                            registered email address. Please do reach out to us if<br>
                            you have any issues.
                        </div>
                        <a href="{{ route('booking.create', 1) }}" class="booking-confirmation-card-btn mt-3">Get in touch <i class="fas fa-arrow-right booking-confirmation-card-btn-arrow"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_scripts')
@endpush
