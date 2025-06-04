@extends('layouts.app', ['activePage' => 'dashboard', 'activeSection' => 'dashboard'])

@section('content')
    <div class="container">
        <h1>Dashboard</h1>


        <div class="row my-5">
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Packages</h5>
                        <p class="card-text">Manage and organize tour packages including safari, room, or combined options. Add details like duration, special offers, and availability.</p>
                        <a href="#" class="btn btn-primary">Packages</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Close Date</h5>
                        <p class="card-text">Set specific dates as unavailable on the calendar. Useful for holidays, maintenance, or any planned service blackout.</p>
                        <a href="#" class="btn btn-primary">Close Date</a>
                    </div>
                </div>
            </div>
        </div>
@endsection
