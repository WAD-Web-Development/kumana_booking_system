@extends('layouts.app-dashboard', ['activePage' => 'special_date', 'activeSection' => 'special_date'])

@section('content')
    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
            <div class="col-12">
                <div class="card admin-management-page-card">
                    <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center admin-management-page-card-header">
                        <h5 class="admin-management-page-card-title mb-0">Update Special Date</h5>
                    </div>
                    <div class="card-body admin-management-page-card-body px-4 py-4">
                        <form action="{{ route('special-date.update', $specialDate->id) }}" method="POST" id="special-date-edit-form" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                            <div class="row g-3">
                                <div class="col-12">
                                    <div class="row input-group admin-management-page-card-input-row">
                                        <div class="col-8 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">Title</span>
                                        </div>
                                        <input type="text" class="col-4 form-control admin-management-page-card-input-value" aria-label="title" id="title" name="title" placeholder="Enter title" value="{{ $specialDate->title }}">
                                    </div>
                                    @error('title')
                                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                            </svg>
                                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row gx-3 mt-3">
                                <div class="col-12 col-md-6">
                                    <div class="row input-group admin-management-page-card-input-row">
                                        <div class="col-8 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">Start Date</span>
                                        </div>
                                        <input type="date" class="col-4 form-control admin-management-page-card-input-value" aria-label="start_date" id="start_date" name="start_date" placeholder="Enter start date" value="{{ $specialDate->start_date }}">
                                    </div>
                                    @error('start_date')
                                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                            </svg>
                                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="row input-group admin-management-page-card-input-row">
                                        <div class="col-8 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">End Date</span>
                                        </div>
                                        <input type="date" class="col-4 form-control admin-management-page-card-input-value" aria-label="end_date" id="end_date" name="end_date" placeholder="Enter end date" value="{{ $specialDate->end_date }}">
                                    </div>
                                    @error('end_date')
                                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                            </svg>
                                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row gx-3 mt-3">
                                <div class="col-12 col-md-6">
                                    <div class="row input-group admin-management-page-card-input-row">
                                        <div class="col-8 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">Is Half Day</span>
                                        </div>
                                        <div class="col-4 d-flex align-items-center justify-content-center admin-management-page-card-check-input-col">
                                            <input type="checkbox" class="form-check-input admin-management-page-card-check-input" aria-label="is_half_day" id="is_half_day" name="is_half_day" value="1" {{ $specialDate->is_full_day ? '' : 'checked' }}>
                                        </div>
                                    </div>
                                    @error('is_half_day')
                                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                            </svg>
                                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6">
                                    <div class="row input-group admin-management-page-card-input-row">
                                        <div class="col-8 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">Is Closed</span>
                                        </div>
                                        <div class="col-4 d-flex align-items-center justify-content-center admin-management-page-card-check-input-col">
                                            <input type="checkbox" class="form-check-input admin-management-page-card-check-input" aria-label="is_closed" id="is_closed" name="is_closed" value="1" {{ $specialDate->is_closed ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    @error('is_closed')
                                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                            </svg>
                                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row gx-3 mt-3 day-time-section {{ $specialDate->is_full_day ? 'hidden-input-section' : '' }}">
                                <div class="col-12 col-md-6">
                                    <div class="row input-group admin-management-page-card-input-row">
                                        <div class="col-8 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">Which half of the day</span>
                                        </div>
                                        <select id="day_time" class="col-4 form-select admin-management-page-card-input-value" name="day_time">
                                            <option value="">Select day time</option>
                                            <option value="Morning" {{ $specialDate->day_time == 'Morning' ? 'selected' : '' }}>Morning</option>
                                            <option value="Afternoon" {{ $specialDate->day_time == 'Afternoon' ? 'selected' : '' }}>Afternoon</option>
                                        </select>
                                    </div>
                                    @error('day_time')
                                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                            </svg>
                                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <textarea id="description" name="description" class="form-control admin-management-page-card-description px-4 py-3" rows="8" placeholder="Enter description">{{ $specialDate->description }}</textarea>
                                    @error('description')
                                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                            </svg>
                                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-12">
                                    <input type="file" name="image" class="form-control image" data-default-file="{{ $specialDate->image_url ?? '' }}">
                                    @error('image')
                                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                            </svg>
                                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                        </div>
                                    @enderror
                                    <input type="hidden" name="is_image_removed" id="is_image_removed" value="0">
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

            $('.image').on('dropify.afterClear', function(event, element) {
                $('#is_image_removed').val(1);
            });

            $('.image').on('change', function() {
                if ($(this).val() != '') {
                    $('#is_image_removed').val(0);
                }
            });

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
