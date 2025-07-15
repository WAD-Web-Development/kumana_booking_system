@extends('layouts.app', ['activePage' => 'dashboard', 'activeSection' => 'dashboard'])

@section('content')
    <div class="container">
        <h2>Dashboard</h2>


        <div class="row my-5">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Packages</h5>

                        <a href="{{ route('package.index') }}" class="btn btn-primary mt-5">Manage Packages</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Special Dates</h5>

                        <a href="{{ route('special-date.index') }}" class="btn btn-primary mt-5">Manage Dates</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Room Types</h5>

                        <a href="{{ route('room-type.index') }}" class="btn btn-primary mt-5">Manage Room Types</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Email Attachments</h5>

                        <a href="{{ route('email-attachment.index') }}" class="btn btn-primary mt-5">Manage Email Attachments</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 mt-4">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Safari Booking Prices</h5>

                        <a href="{{ route('safari-booking-price.index') }}" class="btn btn-primary mt-5">Manage Safari Booking Prices</a>
                    </div>
                </div>
            </div>
        </div>
@endsection
