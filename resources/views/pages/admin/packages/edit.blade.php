@extends('layouts.app-dashboard', ['activePage' => 'package', 'activeSection' => 'package'])

@section('content')
    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
            <div class="col-12">
                <div class="card admin-management-page-card">
                    <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center admin-management-page-card-header">
                        <h5 class="admin-management-page-card-title mb-0">Update Package</h5>
                    </div>
                    <div class="card-body admin-management-page-card-body px-4 py-4">
                        <form action="{{ route('package.update', $package->id) }}" method="POST" id="package-edit-form" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                            <div class="row gx-3">
                                <div class="col-12">
                                    <div class="row input-group admin-management-page-card-input-row">
                                        <div class="col-4 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">Title</span>
                                        </div>
                                        <input type="text" class="col-8 form-control admin-management-page-card-input-value" aria-label="title" id="title" name="title" placeholder="Enter title" value="{{ $package->title }}">
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
                                        <div class="col-4 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text-select-2">Type</span>
                                        </div>
                                        <div class="col-8 m-0 p-0">
                                            <select id="type" class="form-select admin-management-page-card-input-value" name="type">
                                                <option value="">Select type</option>
                                                <option value="1" {{ $package->type == '1' ? 'selected' : '' }}>Safari</option>
                                                <option value="2" {{ $package->type == '2' ? 'selected' : '' }}>Room</option>
                                                <option value="3" {{ $package->type == '3' ? 'selected' : '' }}>Safari & Room</option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('type')
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
                                        <div class="col-4 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">Is Special</span>
                                        </div>
                                        <div class="col-8 d-flex align-items-center justify-content-center admin-management-page-card-check-input-col">
                                            <input type="checkbox" class="form-check-input admin-management-page-card-check-input" aria-label="is_special" id="is_special" name="is_special" value="1" {{ $package->is_special ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    @error('is_special')
                                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                            </svg>
                                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row gx-3 mt-3 date-section hidden-input-section">
                                <div class="col-12 col-md-6">
                                    <div class="row input-group admin-management-page-card-input-row">
                                        <div class="col-4 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">Start Date</span>
                                        </div>
                                        <input type="date" class="col-8 form-control admin-management-page-card-input-value" aria-label="start_date" id="start_date" name="start_date" placeholder="Enter start date" value="{{ $package->start_date }}">
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
                                        <div class="col-4 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">End Date</span>
                                        </div>
                                        <input type="date" class="col-8 form-control admin-management-page-card-input-value" aria-label="end_date" id="end_date" name="end_date" placeholder="Enter end date" value="{{ $package->end_date }}">
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
                                <div class="col-12">
                                    <div class="row input-group admin-management-page-card-input-row">
                                        <div class="col-4 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text-select-2">Included</span>
                                        </div>
                                        <div class="col-8 m-0 p-0">
                                            <select id="included"
                                                    class="form-select admin-management-page-card-input-value"
                                                    name="included[]"
                                                    multiple="multiple"
                                                    style="width: 100%;">
                                                <option value="">Select Included</option>
                                                @foreach ($includes as $included)
                                                    <option value="{{ $included->id }}" @if(in_array($included->id, $packageIncludeArray)) selected @endif>{{ $included->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('included')
                                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                            </svg>
                                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row gx-3 mt-3 safari-section hidden-input-section">
                                <div class="col-12 col-md-6">
                                    <div class="row input-group admin-management-page-card-input-row">
                                        <div class="col-4 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text-select-2">Safari Type</span>
                                        </div>
                                        <div class="col-8 m-0 p-0">
                                            <select id="safari_type" class="form-select admin-management-page-card-input-value" name="safari_type">
                                                <option value="">Select Type</option>
                                                <option value="Half Day" {{ $package->safari_type == 'Half Day' ? 'selected' : '' }}>Half Day</option>
                                                <option value="Full Day" {{ $package->safari_type == 'Full Day' ? 'selected' : '' }}>Full Day</option>
                                            </select>
                                        </div>
                                    </div>
                                    @error('safari_type')
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
                                        <div class="col-4 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">Safari Max People Count</span>
                                        </div>
                                        <input type="number" class="col-8 form-control admin-management-page-card-input-value" aria-label="safari_max_people_count" id="safari_max_people_count" name="safari_max_people_count" placeholder="Enter count" value="{{ $package->safari_max_people_count }}">
                                    </div>
                                    @error('safari_max_people_count')
                                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                            </svg>
                                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row gx-3 mt-3 safari-other-section-1 hidden-input-section">
                                <div class="col-12 col-md-6">
                                    <div class="row input-group admin-management-page-card-input-row">
                                        <div class="col-4 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">Entrance</span>
                                        </div>
                                        <input type="text" class="col-8 form-control admin-management-page-card-input-value" aria-label="entrance" id="entrance" name="entrance" placeholder="Enter entrance" value="{{ $package->entrance }}">
                                    </div>
                                    @error('entrance')
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
                                        <div class="col-4 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text-select-2">Safari Duration</span>
                                        </div>
                                        <div class="col-8 m-0 p-0">
                                            <select id="safari_duration" class="form-select admin-management-page-card-input-value" name="safari_duration">
                                                <option value="">Select duration</option>
                                                @foreach ($durations as $duration)
                                                    <option value="{{ $duration }}"  @if ($duration == $package->safari_duration) selected @endif>{{ $duration }} hours</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('safari_duration')
                                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                            </svg>
                                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row gx-3 mt-3 safari-other-section-2 hidden-input-section">
                                <div class="col-12">
                                    <div class="row input-group admin-management-page-card-input-row">
                                        <div class="col-4 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text-select-2">Animal Sighting</span>
                                        </div>
                                        <div class="col-8 m-0 p-0">
                                            <select id="animal_sighting"
                                                    class="form-select admin-management-page-card-input-value"
                                                    name="animal_sighting[]"
                                                    multiple="multiple"
                                                    style="width: 100%;">
                                                <option value="">Select Sighting</option>
                                                @foreach ($sightings as $sighting)
                                                    <option value="{{ $sighting->name }}" @if (in_array($sighting->name, $existingSightings)) selected @endif>{{ $sighting->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('animal_sighting')
                                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                            </svg>
                                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row gx-3 mt-3 room-section hidden-input-section">
                                <div class="col-12 col-md-6">
                                    <div class="row input-group admin-management-page-card-input-row">
                                        <div class="col-4 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text-select-2">Room Type</span>
                                        </div>
                                        <div class="col-8 m-0 p-0">
                                            <select id="room_type_id" class="form-select admin-management-page-card-input-value" name="room_type_id">
                                                <option value="">Select Type</option>
                                                @foreach ($roomTypes as $type)
                                                    <option value="{{ $type->id }}" @if ($type->id == $package->room_type_id) selected @endif>{{ $type->title }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    @error('room_type_id')
                                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                            </svg>
                                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                                <div class="col-12 col-md-6 room-other-section hidden-input-section">
                                    <div class="row input-group admin-management-page-card-input-row">
                                        <div class="col-4 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">Hotel Distance</span>
                                        </div>
                                        <input type="number" step="any" class="col-8 form-control admin-management-page-card-input-value" aria-label="hotel_distance" id="hotel_distance" name="hotel_distance" placeholder="Enter distance" value="{{ $package->hotel_distance }}">
                                    </div>
                                    @error('hotel_distance')
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
                                    <textarea id="description" name="description" class="form-control admin-management-page-card-description px-4 py-3" rows="8" placeholder="Enter description">{{ $package->description }}</textarea>
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
                                    <textarea id="note" name="note" class="form-control admin-management-page-card-description px-4 py-3" rows="8" placeholder="Enter note">{{ $package->note }}</textarea>
                                    @error('note')
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
                                    <input type="file" name="image" class="form-control image" data-default-file="{{ $package->image_url ?? '' }}">
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
                            <div class="row mt-3">
                                <div class="col-12">
                                    <div class="input-images"></div>
                                    @foreach ($errors->get('package_images.*') as $imageErrors)
                                        @foreach ($imageErrors as $error)
                                            <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                                </svg>
                                                <span class="invalid-feedback-text mx-2">{{ $error }}</span>
                                            </div>
                                        @endforeach
                                    @endforeach
                                </div>
                            </div>
                            <div class="admin-management-page-itinerary-sections-box mt-3 p-3">
                                <span class="admin-management-page-itinerary-title">Itineraries</span>

                                <div id="itinerary-sections">
                                    @foreach($package->itineraries as $index => $itinerary)
                                        <div class="row gx-3 mt-3 itinerary-item">
                                            <div class="col-10">
                                                <div class="row input-group admin-management-page-card-input-row">
                                                    <div class="col-4 input-group-prepend admin-management-page-card-input-label">
                                                        <span class="input-group-text admin-management-page-card-input-label-text">Title</span>
                                                    </div>
                                                    <input type="text"
                                                        class="col-8 form-control admin-management-page-card-input-value"
                                                        name="itinerary[{{ $index }}][title]"
                                                        value="{{ old('itinerary.'.$index.'.title', $itinerary->title) }}"
                                                        placeholder="Enter title">
                                                </div>
                                            </div>
                                            <div class="col-2 text-end">
                                                <button type="button" class="btn btn-danger remove-itinerary">Remove</button>
                                            </div>

                                            <div class="col-12 col-md-6 mt-3">
                                                <div class="row input-group admin-management-page-card-input-row">
                                                    <div class="col-4 input-group-prepend admin-management-page-card-input-label">
                                                        <span class="input-group-text admin-management-page-card-input-label-text">Start Time</span>
                                                    </div>
                                                    <input type="time"
                                                        class="col-8 form-control admin-management-page-card-input-value"
                                                        name="itinerary[{{ $index }}][start]"
                                                        value="{{ old('itinerary.'.$index.'.start', $itinerary->start_time) }}"
                                                        placeholder="Enter time">
                                                </div>
                                            </div>

                                            <div class="col-12 col-md-6 mt-3">
                                                <div class="row input-group admin-management-page-card-input-row">
                                                    <div class="col-4 input-group-prepend admin-management-page-card-input-label">
                                                        <span class="input-group-text admin-management-page-card-input-label-text">End Time</span>
                                                    </div>
                                                    <input type="time"
                                                        class="col-8 form-control admin-management-page-card-input-value"
                                                        name="itinerary[{{ $index }}][end]"
                                                        value="{{ old('itinerary.'.$index.'.end', $itinerary->end_time) }}"
                                                        placeholder="Enter time">
                                                </div>
                                            </div>

                                            {{-- hidden field for existing itinerary id --}}
                                            {{-- <input type="hidden" name="itinerary[{{ $index }}][id]" value="{{ $itinerary->id }}"> --}}
                                        </div>
                                    @endforeach
                                </div>

                                <div class="mt-3">
                                    <button type="button" id="add-itinerary" class="btn btn-primary">+ Add More</button>
                                </div>
                            </div>

                            <div class="row mt-4">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="admin-management-page-card-submit-btn px-3">Update Package</button>
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

            function toggleSpecial() {
                if ($('#is_special').prop('checked')) {
                    $('.date-section').removeClass('hidden-input-section');
                } else {
                    $('.date-section').addClass('hidden-input-section');
                }
            }

            function toggleSections() {
                let type = document.getElementById("type").value;

                $('.safari-section').addClass('hidden-input-section');
                $('.safari-other-section-1').addClass('hidden-input-section');
                $('.safari-other-section-2').addClass('hidden-input-section');
                $('.room-section').addClass('hidden-input-section');
                $('.room-other-section').addClass('hidden-input-section');

                if (type == "1") {
                    $('.safari-section').removeClass('hidden-input-section');
                    $('.safari-other-section-1').removeClass('hidden-input-section');
                    $('.safari-other-section-2').removeClass('hidden-input-section');
                } else if (type == "2") {
                    $('.room-section').removeClass('hidden-input-section');
                } else if (type == "3") {
                    $('.safari-section').removeClass('hidden-input-section');
                    $('.safari-other-section-1').removeClass('hidden-input-section');
                    $('.safari-other-section-2').removeClass('hidden-input-section');
                    $('.room-section').removeClass('hidden-input-section');
                    $('.room-other-section').removeClass('hidden-input-section');
                }
            }

            toggleSpecial();
            toggleSections();

            $('#is_special').change(function() {
                toggleSpecial();
            });
            $('#type').change(function() {
                toggleSections();
            });
        });
    </script>
    <script>
        var images_set = {!! json_encode($imagesArray) !!};

        if (images_set != '') {

            var image_url_obj_arr = [];

            var images = {};

            $.each(images_set, function(index, value) {

                images = {
                    ['id']: value.id,
                    ['src']: value.image_url
                };

                image_url_obj_arr.push(images);

            });

        }

        $('.input-images').imageUploader({
            preloaded: image_url_obj_arr,
            imagesInputName: 'package_images',
            preloadedInputName: 'available_images'
        });

        $('#type').select2({
            placeholder: 'Select type',
            width: '100%',
            minimumResultsForSearch: -1,
        });
        $('#safari_type').select2({
            placeholder: 'Select safari type',
            width: '100%',
            minimumResultsForSearch: -1,
        });
        $('#safari_duration').select2({
            placeholder: 'Select duration',
            width: '100%',
            minimumResultsForSearch: -1,
        });
        $('#room_type_id').select2({
            placeholder: 'Select room type',
            width: '100%',
            minimumResultsForSearch: -1,
        });

        // $('#animal_sighting').select2({
        //     tags: true,
        //     tokenSeparators: [','],
        //     placeholder: 'Add keywords',
        // }).on('select2:select select2:unselect', adjustSelect2Height);

        // $(document).ready(adjustSelect2Height);

        // function adjustSelect2Height() {
        //     setTimeout(() => {
        //         let count = $('#animal_sighting').next('.select2-container').find('.select2-selection__choice').length;
        //         let newHeight = 40 + count * 8; // Base height + increase per keyword
        //         $('#animal_sighting').next('.select2-container').find('.select2-selection--multiple').css('min-height', newHeight + 'px');
        //     }, 10);
        // }

        $('#animal_sighting').select2({
            placeholder: 'Select sighting',
            tags: true,
            tokenSeparators: [','],
            width: '100%'
        });

        $('#included').select2({
            placeholder: 'Select includes',
            multiple: true,
            width: '100%'
        });
    </script>

    <script>
        let itineraryIndex = document.querySelectorAll('#itinerary-sections .itinerary-item').length;

        function toggleRemoveButtons() {
            const items = document.querySelectorAll('#itinerary-sections .itinerary-item');
            const removeButtons = document.querySelectorAll('#itinerary-sections .remove-itinerary');

            // If only 1 itinerary, disable/hide remove button
            if (items.length === 1) {
                removeButtons.forEach(btn => btn.setAttribute('disabled', true));
            } else {
                removeButtons.forEach(btn => btn.removeAttribute('disabled'));
            }
        }

        document.getElementById('add-itinerary').addEventListener('click', function () {
            let container = document.getElementById('itinerary-sections');
            let newItem = document.querySelector('.itinerary-item').cloneNode(true);

            // Update input names for new index
            newItem.querySelectorAll('input').forEach(input => {
                let name = input.getAttribute('name');
                input.setAttribute('name', name.replace(/\[\d+\]/, `[${itineraryIndex}]`));
                input.value = ''; // clear values
            });

            container.appendChild(newItem);
            itineraryIndex++;

            toggleRemoveButtons(); // update remove button state
        });

        // Delegate click event for remove buttons
        document.getElementById('itinerary-sections').addEventListener('click', function (e) {
            if (e.target.classList.contains('remove-itinerary')) {
                e.target.closest('.itinerary-item').remove();
                toggleRemoveButtons(); // update remove button state
            }
        });

        // Initial check
        toggleRemoveButtons();
    </script>
@endpush
