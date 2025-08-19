@extends('layouts.app', ['activePage' => 'dashboard', 'activeSection' => 'dashboard'])

@section('content')

<div class="container-fluid admin-container d-flex justify-content-center">
    <!-- Adjust the width of the card -->
    <div class="card admin-card shadow-lg col-md-6 mb-5">
        <div class="card-header bg-white border-0 p-4 pb-1">
            <div class="d-lg-flex">
                <div>
                    <h5 class="mb-0 admin-title">Edit Package</h5>
                </div>
            </div>
        </div>
        <div class="card-body mt-2 p-4 pt-1">
            <form action="{{ route('package.update', $package->id) }}" method="POST" id="package-edit-form" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="form-group col-md-12 mt-2">
                    <label for="title" class="form-label">Title <span style="color: red">*</span></label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ $package->title }}" required>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="description" class="form-label mt-2">Description <span
                        style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <textarea id="description" name="description" class="form-control description" rows="5">{{ $package->description }}</textarea>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="note" class="form-label mt-2">Note <span
                        style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <textarea id="note" name="note" class="form-control note" rows="5">{{ $package->note }}</textarea>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label class="form-label" for="type">Type <span
                            style="color: red">*</span></label>
                    <select id="type" class="form-control form-control-alternative" name="type">
                        <option value="1" {{ $package->type == '1' ? 'selected' : '' }}>Safari</option>
                        <option value="2" {{ $package->type == '2' ? 'selected' : '' }}>Room</option>
                        <option value="3" {{ $package->type == '3' ? 'selected' : '' }}>Safari & Room</option>
                    </select>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="image" class="form-label mt-2">Cover Image <span
                        style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <input type="file" name="image" class="form-control image" data-default-file="{{ $package->image_url ?? '' }}">

                    <input type="hidden" name="is_image_removed" id="is_image_removed" value="0">
                    @if ($errors->has('image'))
                        <span class="text-danger">{{ $errors->first('image') }}</span>
                    @endif
                </div>

                <div class="form-group col-md-12 mt-4">
                    <input type="checkbox" class="form-check-input" id="is_special" name="is_special" value="1" {{ $package->is_special ? 'checked' : '' }}>
                    <label class="form-check-label" for="is_special">Is Special</label>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="start_date" class="form-label mt-2">Start Date <span
                        style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <input type="date" class="form-control" id="start_date" name="start_date"
                        value="{{ $package->start_date }}" required>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="end_date" class="form-label mt-2">End Date <span
                        style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <input type="date" class="form-control" id="end_date" name="end_date"
                        value="{{ $package->end_date }}" required>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label class="form-label" for="safari_type">Safari Type <span
                        style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <select id="safari_type" class="form-control form-control-alternative" name="safari_type">
                        <option value="">Select Safari Type</option>
                        <option value="Half Day" {{ $package->safari_type == 'Half Day' ? 'selected' : '' }}>Half Day</option>
                        <option value="Full Day" {{ $package->safari_type == 'Full Day' ? 'selected' : '' }}>Full Day</option>
                    </select>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label for="safari_max_people_count" class="form-label">Safari Max People Count <span
                        style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <input type="number" class="form-control" id="safari_max_people_count" name="safari_max_people_count" min="1" value="{{ $package->safari_max_people_count }}" required>
                </div>

                <div class="form-group col-md-12 mt-2">
                    <label class="form-label" for="room_type_id">Room Type <span
                        style="color: rgb(163, 163, 163)">(optional)</span></label>
                    <select id="room_type_id" class="form-control form-control-alternative" name="room_type_id">
                        <option></option>
                        @foreach ($roomTypes as $type)
                            <option value="{{ $type->id }}" @if ($type->id == $package->room_type_id) selected @endif>{{ $type->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row mt-2">
                    <div class="col">
                        <div class="form-group">
                            <label class="form-control-label" for="input-banner_img">{{ __('Images') }}</label>
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
                    <button type="submit" class="btn admin-btn m-0 ms-2">Update Package</button>
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

            $('.image').on('dropify.afterClear', function(event, element) {
                $('#is_image_removed').val(1);
            });

            $('.image').on('change', function() {
                if ($(this).val() != '') {
                    $('#is_image_removed').val(0);
                }
            });
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
    </script>
{!! JsValidator::formRequest('App\Http\Requests\UpdatePackageRequest', '#package-edit-form') !!}
@endpush
