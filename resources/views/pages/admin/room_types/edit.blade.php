@extends('layouts.app-dashboard', ['activePage' => 'room_type', 'activeSection' => 'room_type'])

@section('content')
    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
            <div class="col-12">
                <div class="card admin-management-page-card">
                    <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center admin-management-page-card-header">
                        <h5 class="admin-management-page-card-title mb-0">Create Room Type</h5>
                    </div>
                    <div class="card-body admin-management-page-card-body px-4 py-4">
                        <form action="{{ route('room-type.update', $roomType->id) }}" method="POST" id="room-type-edit-form" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                            <div class="row g-3">
                                <div class="col-12 col-md-6">
                                    <div class="row input-group admin-management-page-card-input-row">
                                        <div class="col-4 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">Title</span>
                                        </div>
                                        <input type="text" class="col-8 form-control admin-management-page-card-input-value" aria-label="title" id="title" name="title" placeholder="Enter title" value="{{ $roomType->title }}">
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
                                <div class="col-12 col-md-6">
                                    <div class="row input-group admin-management-page-card-input-row">
                                        <div class="col-4 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">Room Count</span>
                                        </div>
                                        <input type="number" class="col-8 form-control admin-management-page-card-input-value" aria-label="room_count" id="room_count" name="room_count"  min="1" placeholder="Enter count" value="{{ $roomType->room_count }}">
                                    </div>
                                    @error('room_count')
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
                                            <span class="input-group-text admin-management-page-card-input-label-text">Max People Count</span>
                                        </div>
                                        <input type="number" class="col-8 form-control admin-management-page-card-input-value" aria-label="max_people_count" id="max_people_count" name="max_people_count" min="1" placeholder="Enter count" value="{{ $roomType->max_people_count }}">
                                    </div>
                                    @error('max_people_count')
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
                                            <span class="input-group-text admin-management-page-card-input-label-text">Price (LKR)</span>
                                        </div>
                                        <input type="number" class="col-8 form-control admin-management-page-card-input-value" aria-label="price" id="price" name="price" step="0.01" min="0" placeholder="Enter price" value="{{ $roomType->price }}">
                                    </div>
                                    @error('price')
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
                                    <textarea id="description" name="description" class="form-control admin-management-page-card-description px-4 py-3" rows="8" placeholder="Enter description">{{ $roomType->description }}</textarea>
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
                            <div class="row mt-4">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="admin-management-page-card-submit-btn px-3">Update Room Type</button>
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
    </script>
@endpush
