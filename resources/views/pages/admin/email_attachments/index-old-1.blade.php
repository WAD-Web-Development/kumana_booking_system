@extends('layouts.app', ['activePage' => 'dashboard', 'activeSection' => 'dashboard'])

@section('content')
    <div class="container-fluid admin-container d-flex justify-content-center">
        <div class="card admin-card w-100 shadow-lg">
            <div class="card-header bg-white border-0 p-4">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 admin-title">Email Attachments Management</h5>
                    @if (!$attachment)
                        <a href="{{ route('email-attachment.create') }}" class="btn admin-btn btn-sm mb-0 px-4">+&nbsp; Add New</a>
                    @endif
                </div>
            </div>

            <div class="card-body p-4">

                <div class="table-responsive table-wrapper">
                    <table class="table table-bordered table-hover table-responsive" id="email-attachment-list">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th width="6%">Action</th>
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
                }
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

        // $('body').on('focusout', '#table_search', function() {
        //     if ($(this).val() != $(this).attr('data-pre-search')) {
        //         serachTable();
        //     }
        // });

        // $('body').on('keypress', '#table_search', function(e) {
        //     if (e.which == 13) {
        //         if ($(this).val() != $(this).attr('data-pre-search')) {
        //             serachTable();
        //         }
        //     }
        // });

        // function serachTable() {
        //     var sr = $('#table_search').val();
        //     var params = {
        //         'sr': sr
        //     };
        //     var new_url = '{{ route('email-attachment.index') }}?' + jQuery.param(params);
        //     window.location.href = new_url;
        // }
    </script>
@endpush
