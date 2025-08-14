@extends('layouts.app-dashboard', ['activePage' => 'special_date', 'activeSection' => 'special_date'])

@section('content')
    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
            <div class="col-12">
                <div class="card admin-management-page-card">
                    <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center admin-management-page-card-header">
                        <h5 class="admin-management-page-card-title mb-0">Create Special Date</h5>
                    </div>
                    <div class="card-body admin-management-page-card-body px-4 py-4">
                        <form action="{{ route('special-date.store') }}" method="POST" id="special-date-form" enctype="multipart/form-data">
                        @csrf
                            <div class="row g-3">
                                <div class="col-12 d-flex align-items-stretch">
                                    <div class="row input-group mb-3 admin-management-page-card-input-row">
                                        <div class="col-8 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">Title</span>
                                        </div>
                                        <input type="text" class="col-4 form-control admin-management-page-card-input-value" aria-label="title" id="title" name="title" placeholder="Enter title">
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-12 col-md-6 d-flex align-items-stretch">
                                    <div class="row input-group mb-3 admin-management-page-card-input-row">
                                        <div class="col-8 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">Start Date</span>
                                        </div>
                                        <input type="date" class="col-4 form-control admin-management-page-card-input-value" aria-label="start_date" id="start_date" name="start_date" placeholder="Enter start date">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 d-flex align-items-stretch">
                                    <div class="row input-group mb-3 admin-management-page-card-input-row">
                                        <div class="col-8 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">End Date</span>
                                        </div>
                                        <input type="date" class="col-4 form-control admin-management-page-card-input-value" aria-label="end_date" id="end_date" name="end_date" placeholder="Enter end date">
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3">
                                <div class="col-12 col-md-6 d-flex align-items-stretch">
                                    <div class="row input-group mb-3 admin-management-page-card-input-row">
                                        <div class="col-8 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">Is Half Day</span>
                                        </div>
                                        <div class="col-4 d-flex align-items-center justify-content-center admin-management-page-card-check-input-col">
                                            <input type="checkbox" class="form-check-input admin-management-page-card-check-input" aria-label="is_half_day" id="is_half_day" name="is_half_day" value="1">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 d-flex align-items-stretch">
                                    <div class="row input-group mb-3 admin-management-page-card-input-row">
                                        <div class="col-8 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">Is Closed</span>
                                        </div>
                                        <div class="col-4 d-flex align-items-center justify-content-center admin-management-page-card-check-input-col">
                                            <input type="checkbox" class="form-check-input admin-management-page-card-check-input" aria-label="is_closed" id="is_closed" name="is_closed" value="1">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-3 day-time-section hidden-input-section">
                                <div class="col-12 col-md-6 d-flex align-items-stretch">
                                    <div class="row input-group mb-3 admin-management-page-card-input-row">
                                        <div class="col-8 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">Which half of the day</span>
                                        </div>
                                        <select id="day_time" class="col-4 form-select admin-management-page-card-input-value" name="day_time">
                                            <option value="">Select day time</option>
                                            <option value="Morning">Morning</option>
                                            <option value="Afternoon">Afternoon</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <textarea id="description" name="description" class="form-control admin-management-page-card-description px-4 py-3" rows="8" placeholder="Enter description"></textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <input type="file" name="image" class="form-control image">
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="admin-management-page-card-submit-btn px-3">Create Special Date</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_scripts')
    <script>
        $(document).ready(function() {

            $('.image').dropify();

            function toggleDayTime() {
                if ($('#is_half_day').prop('checked')) {
                    $('.day-time-section').removeClass('hidden-input-section');
                } else {
                    $('.day-time-section').addClass('hidden-input-section');
                }
            }

            toggleDayTime(); // run on page load

            $('#is_half_day').change(function() {
                toggleDayTime();
            });
        });
        // $('#day_time').select2({
        //     placeholder: 'Select Day Time',
        //     minimumResultsForSearch: -1,
        // });
    </script>
@endpush
