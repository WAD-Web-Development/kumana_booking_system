@extends('layouts.app-dashboard', ['activePage' => 'profile', 'activeSection' => 'profile'])

@section('content')
    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
            <div class="col-12">
                <div class="card profile-details-card">
                    <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center profile-details-card-header">
                        <h5 class="profile-details-card-title mb-0">Profile</h5>
                        <a href="{{ route('booking.create', 1) }}" class="profile-details-card-back-btn">Edit Details</a>
                    </div>
                    <div class="card-body profile-details-card-body px-4 py-4">

                        <h5 class="profile-details-card-section-title mb-4">
                            General Details
                        </h5>

                        <div class="row g-2 mb-4">
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="profile-details-card-item p-2">
                                    <div class="d-flex flex-column">
                                        <span class="profile-details-card-item-label">Your Email</span>
                                        <span class="profile-details-card-item-value">{{ $user->email }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="profile-details-card-item p-2">
                                    <div class="d-flex flex-column">
                                        <span class="profile-details-card-item-label">Your Name</span>
                                        <span class="profile-details-card-item-value">{{ $user->name ?? 'Not provided' }}</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-sm-6 col-md-4">
                                <div class="profile-details-card-item p-2">
                                    <div class="d-flex flex-column">
                                        <span class="profile-details-card-item-label">Phone Number</span>
                                        <span class="profile-details-card-item-value">{{ $user->contact_no ?? 'Not provided' }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <h5 class="profile-details-card-section-title mt-4 mb-4">
                            Security
                        </h5>

                        <div class="row mx-0 mb-4 d-flex align-items-center profile-details-card-security-item p-0">
                            <div class="col-9 d-flex justify-content-between align-items-center p-3">
                                <span class="profile-details-card-security-item-label">Your Password</span>
                                <span class="profile-details-card-security-item-value">**********</span>
                            </div>
                            <div class="col-3 d-flex justify-content-center align-items-center border-start p-3">
                                <a href="{{ route('booking.create', 1) }}" class="profile-details-card-change-password-btn">Change Password</a>
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
