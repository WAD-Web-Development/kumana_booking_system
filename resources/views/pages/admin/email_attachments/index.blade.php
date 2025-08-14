@extends('layouts.app-dashboard', ['activePage' => 'email_attachment', 'activeSection' => 'email_attachment'])

@section('content')
    <div class="container-fluid m-0 p-0">
        <div class="row m-0 p-0">
            <div class="col-12">
                <div class="card admin-management-page-card">
                    <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center admin-management-page-card-header">
                        <h5 class="admin-management-page-card-title mb-0">Email Attachments</h5>
                        @if (!$attachment)
                            <a href="{{ route('email-attachment.create') }}" class="admin-management-page-card-new-btn">Add New</a>
                        @endif
                    </div>
                    <div class="card-body admin-management-page-card-body px-4 py-4">

                        <div class="table-responsive table-wrapper">
                            <table class="table table-bordered table-hover table-responsive admin-management-table" id="email-attachment-list">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th width="10%">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($attachment)
                                        <tr id="row{{ $attachment->id }}">
                                            <td> {{ $attachment->title }} </td>
                                            <td class="text-sm">

                                                <a href="{{ route('email-attachment.edit', $attachment->id) }}" class="me-3"
                                                    data-bs-toggle="tooltip" data-bs-original-title="Edit">
                                                    <i class="fas fa-user-edit text-secondary"></i>
                                                </a>

                                                <a class="delete" data-id="{{ $attachment->id }}" href="#">
                                                    <i class="fas fa-trash text-secondary"></i>
                                                </a>

                                            </td>
                                        </tr>
                                    @else
                                        <tr>
                                            <td colspan="5" class="text-center">No Data Available</td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
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
            var url = '{{ route('email-attachment.destroy', ':id') }}';
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
    </script>
@endpush
