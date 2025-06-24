@extends('layouts.app', ['activePage' => 'dashboard', 'activeSection' => 'dashboard'])

@section('content')

<div class="container-fluid admin-container d-flex justify-content-center">
    <!-- Adjust the width of the card -->
    <div class="card admin-card shadow-lg col-md-6 mb-5">
        <div class="card-header bg-white border-0 p-4 pb-1">
            <div class="d-lg-flex">
                <div>
                    <h5 class="mb-0 admin-title">New Package</h5>
                </div>
            </div>
        </div>
        <div class="card-body mt-2 p-4 pt-1">
            <form action="{{ route('package.store') }}" method="POST" id="package-form" enctype="multipart/form-data">
                @csrf
                <div class="form-group col-md-12 mt-2">
                    <label for="title" class="form-label">Title <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" required>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="description" class="form-label mt-2">Description <span
                        style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <textarea id="description" name="description" class="form-control description" rows="5"></textarea>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="note" class="form-label mt-2">Note <span
                        style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <textarea id="note" name="note" class="form-control note" rows="5"></textarea>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label class="form-label" for="type">Type <span
                            style="color: red">*</span></label>
                    <select id="type" class="form-control form-control-alternative" name="type">
                        <option value="1">Safari</option>
                        <option value="2">Room</option>
                        <option value="3">Safari & Room</option>
                    </select>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="image" class="form-label mt-2">Cover Image <span
                        style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <input type="file" name="image" class="form-control image">
                </div>

                <div class="form-group col-md-12 mt-4">
                    <input type="checkbox" class="form-check-input" id="is_special" name="is_special" value="1">
                    <label class="form-check-label" for="is_special">Is Special</label>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="date" class="form-label mt-2">Start Date <span
                        style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <input type="date" class="form-control" id="start_date" name="start_date" required>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="date" class="form-label mt-2">End Date <span
                        style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <input type="date" class="form-control" id="end_date" name="end_date" required>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label class="form-label" for="safari_type">Safari Type <span
                        style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <select id="safari_type" class="form-control form-control-alternative" name="safari_type">
                        <option value="">Select Safari Type</option>
                        <option value="Half Day">Half Day</option>
                        <option value="Full Day">Full Day</option>
                    </select>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="safari_max_people_count" class="form-label">Safari Max People Count <span
                        style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <input type="number" class="form-control" id="safari_max_people_count" name="safari_max_people_count" min="1" required>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label class="form-label" for="room_type_id">Room Type <span
                        style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <select id="room_type_id" class="form-control form-control-alternative" name="room_type_id">
                        <option></option>
                        @foreach ($roomTypes as $type)
                            <option value="{{ $type->id }}">{{ $type->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row mt-2">
                    <div class="col">
                        <div class="form-group">
                            <label class="form-control-label" for="input-banner_img">{{ __('Images') }} <span
                                style="color: rgb(163, 163, 163)">(optional)</span></label>
                            <div class="input-images"></div>
                        </div>
                    </div>
                </div>
                @foreach ($errors->get('package_images.*') as $imageErrors)
                    @foreach ($imageErrors as $error)
                        <div class="text-danger">{{ $error }}</div>
                    @endforeach
                @endforeach

                <div class="d-flex justify-content-end mt-4">
                    <a href="{{ url()->previous() }}" class="btn btn-light admin-btn-cancel text-white m-0">Cancel</a>
                    <button type="submit" class="btn admin-btn m-0 ms-2">Create Package</button>
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

        $('#type').select2({
            placeholder: 'Select type',
            minimumResultsForSearch: -1,
        });

        $('#safari_type').select2({
            placeholder: 'Select safari type',
            minimumResultsForSearch: -1,
        });

        $('#room_type_id').select2({
            placeholder: 'Select room type',
            minimumResultsForSearch: -1,
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
                    ['src']: value.value
                };

                image_url_obj_arr.push(images);

            });

        }

        $('.input-images').imageUploader({
            preloaded: image_url_obj_arr,
            imagesInputName: 'package_images',
            preloadedInputName: 'available_images'
        });
    </script>
{!! JsValidator::formRequest('App\Http\Requests\StorePackageRequest', '#package-form') !!}
@endpush
