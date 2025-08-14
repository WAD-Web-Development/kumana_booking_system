@extends('layouts.app-dashboard', ['activePage' => 'safari_booking_price', 'activeSection' => 'safari_booking_price'])

@section('content')
    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
            <div class="col-12">
                <div class="card admin-management-page-card">
                    <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center admin-management-page-card-header">
                        <h5 class="admin-management-page-card-title mb-0">Safari Booking Price</h5>
                    </div>
                    <div class="card-body admin-management-page-card-body px-4 py-4">
                        <div class="table-responsive table-wrapper">
                            <table class="table table-bordered table-hover table-responsive admin-management-table" id="safari-booking-price-list">
                                <thead>
                                    <tr>
                                        <th>Visa Type</th>
                                        <th>Group Type</th>
                                        <th>Person Count</th>
                                        <th>Half Day Price</th>
                                        <th>Full Day Price</th>
                                        <th width="4%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($prices as $price)
                                        <tr id="row{{ $price->id }}">
                                            <td> {{ $price->visa_type }} </td>
                                            <td> {{ $price->group_type }} </td>
                                            <td> {{ $price->person_count }} </td>
                                            <td> {{ $price->half_day_price }} </td>
                                            <td> {{ $price->full_day_price }} </td>
                                            <td class="text-sm">

                                                <a href="{{ route('safari-booking-price.edit', $price->id) }}" class="me-3"
                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No Data Available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $prices->withQueryString()->links('components.paginations') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_scripts')
    <script>
    </script>
@endpush
