@extends('layouts.app', ['activePage' => 'dashboard', 'activeSection' => 'dashboard'])

@section('content')

<div class="container-fluid admin-container d-flex justify-content-center">
    <!-- Adjust the width of the card -->
    <div class="card admin-card shadow-lg col-md-6 mb-5">
        <div class="card-header bg-white border-0 p-4 pb-1">
            <div class="d-lg-flex">
                <div>
                    <h5 class="mb-0 admin-title">New Special Date</h5>
                </div>
            </div>
        </div>
        <div class="card-body mt-2 p-4 pt-1">
            <form action="{{ route('special-date.store') }}" method="POST" id="special-date-form" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-12 mt-2">
                    <label for="title" class="form-label">Title <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="date" class="form-label mt-2">Start Date <span style="color: red">*</span></label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="date" class="form-label mt-2">End Date <span style="color: red">*</span></label>
                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="description" class="form-label mt-2">Description <span
                        style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <textarea id="description" name="description" class="form-control description" rows="5"></textarea>
                </div>

                <div class="form-group row col-md-12 mt-4 mx-1">
                    <div class="form-check col-md-6">
                        <input type="checkbox" class="form-check-input" id="is_full_day" name="is_full_day" value="1">
                        <label class="form-check-label" for="is_full_day">Is Full Day</label>
                    </div>

                    <div class="form-check col-md-6">
                        <input type="checkbox" class="form-check-input" id="is_closed" name="is_closed" value="1">
                        <label class="form-check-label" for="is_closed">Is Closed</label>
                    </div>
                </div>

                <div class="form-group col-md-12 mt-3">
                    <label class="form-label" for="day_time">Day Time <span
                            style="color: red">*</span></label>
                    <select id="day_time" class="form-control form-control-alternative" name="day_time">
                        <option value="">Select Day Time</option>
                        <option value="Morning">Morning</option>
                        <option value="Afternoon">Afternoon</option>
                    </select>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="image" class="form-label mt-2">Image <span
                        style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <input type="file" name="image" class="form-control image">
                </div>

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ url()->previous() }}" class="btn btn-light admin-btn-cancel text-white m-0">Cancel</a>
                    <button type="submit" class="btn admin-btn m-0 ms-2">Create Special Date</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection

@push('custom_scripts')
    <script>
        $(document).ready(function() {
            $('.image').dropify();
        });

        $('#day_time').select2({
            placeholder: 'Select Day Time',
            minimumResultsForSearch: -1,
        });
    </script>

{!! JsValidator::formRequest('App\Http\Requests\StoreSpecialDateRequest', '#special-date-form') !!}
@endpush
