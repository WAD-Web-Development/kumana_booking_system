@extends('layouts.app-dashboard', ['activePage' => 'package', 'activeSection' => 'package'])

@section('content')
    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
            <div class="col-12">
                <div class="card admin-management-page-card">
                    <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center admin-management-page-card-header">
                        <h5 class="admin-management-page-card-title mb-0">Packages</h5>
                        <a href="{{ route('package.create') }}" class="admin-management-page-card-new-btn">Add New</a>
                    </div>
                    <div class="card-body admin-management-page-card-body px-4 py-4">
                        <div class="table-responsive table-wrapper">
                            <table class="table table-bordered table-hover table-responsive admin-management-table" id="package-list">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Type</th>
                                        <th>Safari Type</th>
                                        <th>Is Active</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $types = [
                                            1 => 'Safari',
                                            2 => 'Room',
                                            3 => 'Safari & Room',
                                        ];
                                    @endphp
                                    @forelse ($packages as $package)
                                        <tr id="row{{ $package->id }}">
                                            <td> {{ $package->title }} </td>
                                            <td>{{ $types[$package->type] ?? 'N/A' }}</td>
                                            <td> {{ $package->safari_type }} </td>
                                            <td>
                                                <div class="form-check form-switch">
                                                    <input class="form-check-input admin-management-page-checkbox" type="checkbox"
                                                        id="isActiveStatus_{{ $package->id }}"
                                                        name="isActiveStatus_{{ $package->id }}"
                                                        onclick="changeActiveStatus({{ $package->id }})"
                                                        @if ($package->is_active == 1) checked @endif>
                                                </div>
                                            </td>
                                            <td class="text-sm">

                                                <a href="{{ route('package.edit', $package->id) }}" class="me-3"
                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </a>

                                                <a class="delete" data-id="{{ $package->id }}" href="#">
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
                        {{ $packages->withQueryString()->links('components.paginations') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_scripts')
    <script>
        $('body').on('click', '.delete', function() {
            var id = $(this).attr('data-id')
            var atr = $(this);
            var url = '{{ route('package.destroy', ':id') }}';
            Swal.fire({
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'No, cancel!',
                reverseButtons: true,
                title: 'Are You Sure!',
                text: "You won't be able to revert this!",
                customClass: {
                    popup: 'custom-swal-popup',
                },
                confirmButtonColor: '#0D4B2D',
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: url.replace(':id', id),
                        method: "DELETE",
                        dataType: "json",
                        data: {
                            id: id,
                            '_token': '{{ csrf_token() }}'
                        },
                        beforeSend: function() {
                            Swal.showLoading();
                        },
                        success: function(data) {
                            if (data.response == "success") {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: data.message,
                                    timer: 3000,
                                    showConfirmButton: false,
                                    customClass: {
                                        popup: 'custom-swal-popup',
                                    }
                                });
                                $("#row" + id).remove();
                            } else if (data.response == "error") {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: data.message,
                                    timer: 3000,
                                    showConfirmButton: false
                                });
                            }
                        }
                    })
                }
            });
        });

        function changeActiveStatus(id) {

            var status = 0;

            if ($('#isActiveStatus_' + id).is(":checked")) {
                status = 1;
            } else {
                status = 0;
            }

            $.ajax({
                type: "POST",
                url: "{{ route('update.package.status') }}",
                data: {
                    "_token": "{{ csrf_token() }}",
                    id: id,
                    status: status,
                },
                success: function(response) {
                    if (response.status == 'success') {
                        Swal.hideLoading();
                        Swal.fire({
                            toast: true,
                            position: 'bottom-end',
                            title: "Success!",
                            icon: "success",
                            allowEscapeKey: false,
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    } else {
                        Swal.hideLoading();
                        Swal.fire({
                            toast: true,
                            position: 'bottom-end',
                            title: "Error!",
                            icon: "error",
                            html: "Something went wrong!",
                            allowEscapeKey: false,
                            allowOutsideClick: false,
                            showConfirmButton: false,
                            timer: 1500,
                        });
                    }
                },
                error: function(request, status, error) {
                    Swal.hideLoading();
                    Swal.fire({
                        toast: true,
                        position: 'bottom-end',
                        title: "Success!",
                        icon: "Error",
                        html: "Something went wrong!",
                        allowEscapeKey: false,
                        allowOutsideClick: false,
                        showConfirmButton: false,
                        timer: 1500,
                    });

                },
            });
        }
    </script>
@endpush
