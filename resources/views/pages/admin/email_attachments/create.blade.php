@extends('layouts.app-dashboard', ['activePage' => 'email_attachment', 'activeSection' => 'email_attachment'])

@section('content')
    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
            <div class="col-12">
                <div class="card admin-management-page-card">
                    <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center admin-management-page-card-header">
                        <h5 class="admin-management-page-card-title mb-0">Create Email Attachment</h5>
                    </div>
                    <div class="card-body admin-management-page-card-body px-4 py-4">
                        <form action="{{ route('email-attachment.store') }}" method="POST" id="email-attachment-form" enctype="multipart/form-data">
                        @csrf
                            <div class="row gx-3">
                                <div class="col-12">
                                    <div class="row input-group admin-management-page-card-input-row">
                                        <div class="col-4 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">Title</span>
                                        </div>
                                        <input type="text" class="col-8 form-control admin-management-page-card-input-value" aria-label="title" id="title" name="title" placeholder="Enter title">
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
                            <div class="row mt-3">
                                <div class="col-12">
                                    <textarea id="description" name="description" class="form-control admin-management-page-card-description px-4 py-3" rows="8" placeholder="Enter description"></textarea>
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
                            <div class="row gx-3 mt-3">
                                <div class="col-12">
                                    <div class="row input-group admin-management-page-card-input-row align-items-center">
                                        <div class="col-4 input-group-prepend admin-management-page-card-input-label">
                                            <span class="input-group-text admin-management-page-card-input-label-text">
                                                Attachment File
                                            </span>
                                        </div>
                                        <div class="col-8">
                                            <input type="file"
                                                class="form-control admin-management-page-card-input-value w-100"
                                                aria-label="file"
                                                id="file"
                                                name="file"
                                                placeholder="Enter file">
                                        </div>
                                    </div>
                                    @error('file')
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
                                    <button type="submit" class="admin-management-page-card-submit-btn px-3">Create Email Attachment</button>
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
