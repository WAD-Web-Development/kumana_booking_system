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
                        <div class="table-responsive table-wrapper">
                            <table class="table table-bordered table-hover table-responsive admin-management-table" id="close-date-list">
                                <thead>
                                    <tr>
                                        <th>Start Date</th>
                                        <th>End Date</th>
                                        <th>Title</th>
                                        <th>Is Active</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($specialDates as $specialDate)
                                        <tr id="row{{ $specialDate->id }}">
                                            <td> {{ $specialDate->start_date }} </td>
                                            <td> {{ $specialDate->end_date }} </td>
                                            <td> {{ $specialDate->title }} </td>
                                            <td>
                                                @if ($specialDate->is_active)
                                                    Active
                                                @else
                                                    Deactive
                                                @endif
                                            </td>
                                            <td class="text-sm">

                                                <a href="{{ route('special-date.edit', $specialDate->id) }}" class="me-3"
                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </a>

                                                <a class="delete" data-id="{{ $specialDate->id }}" href="#">
                                                    <i class="fas fa-trash text-secondary"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center">No Data Available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        {{ $specialDates->withQueryString()->links('components.paginations') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_scripts')
@endpush
