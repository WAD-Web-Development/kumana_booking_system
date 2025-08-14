@extends('layouts.app', ['activePage' => 'dashboard', 'activeSection' => 'dashboard'])

@section('content')
    <div class="container-fluid admin-container d-flex justify-content-center">
        <div class="card admin-card w-100 shadow-lg">
            <div class="card-header bg-white border-0 p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 admin-title">Safari Booking Price Management</h5>
                </div>
            </div>

            <div class="card-body p-4">
                <div class="justify-content-end row mb-3">
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <input type="text" class="form-control admin-search-bar" name="table_search" id="table_search"
                            value="{{ request()->get('sr') ?? '' }}" data-pre-search="{{ request()->get('sr') }}"
                            placeholder="Search...">
                    </div>
                </div>

                <div class="table-responsive table-wrapper">
                    <table class="table table-bordered table-hover table-responsive" id="safari-booking-price-list">
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
@endsection

@push('custom_scripts')
    <script>

        $('body').on('focusout', '#table_search', function() {
            if ($(this).val() != $(this).attr('data-pre-search')) {
                serachTable();
            }
        });

        $('body').on('keypress', '#table_search', function(e) {
            if (e.which == 13) {
                if ($(this).val() != $(this).attr('data-pre-search')) {
                    serachTable();
                }
            }
        });

        function serachTable() {
            var sr = $('#table_search').val();
            var params = {
                'sr': sr
            };
            var new_url = '{{ route('safari-booking-price.index') }}?' + jQuery.param(params);
            window.location.href = new_url;
        }
    </script>
@endpush
