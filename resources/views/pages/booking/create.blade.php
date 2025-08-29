@extends('layouts.app', ['activePage' => 'dashboard', 'activeSection' => 'dashboard'])

@section('content')
    <div class="container-fluid booking-bg py-5">
        <div class="row justify-content-center mb-5">
            <div class="col-12 col-md-8">
                <div class="card booking-package-details-card">
                    <div class="card-header px-4 py-3 d-flex justify-content-between align-items-center booking-package-details-card-header">
                        <h5 class="booking-package-details-card-title mb-0">Selected Package Details</h5>
                        <a href="{{ route('packages.show', $package->id) }}" class="booking-package-details-card-back-btn">Go back to package details</a>
                    </div>
                    <div class="card-body px-0 py-0">
                        <div class="row g-0">
                            <div class="col border-end py-4 px-4">
                                <div class="booking-package-details-card-label mb-1">Name</div>
                                <div class="booking-package-details-card-value">{{$package->title}}</div>
                            </div>
                            <div class="col border-end py-4 px-4">
                                <div class="booking-package-details-card-label mb-1">Package</div>
                                <div class="booking-package-details-card-value">{{$package->type_name}}</div>
                            </div>
                            <div class="col border-end py-4 px-4">
                                <div class="booking-package-details-card-label mb-1">Type</div>
                                <div class="booking-package-details-card-value">{{ $package->safari_type ?? '-' }}</div>
                            </div>
                            <div class="col border-end py-4 px-4">
                                <div class="booking-package-details-card-label mb-1">Time</div>
                                <div class="booking-package-details-card-value">-</div>
                            </div>
                            <div class="col py-4 px-4">
                                <div class="booking-package-details-card-label mb-1">Price</div>
                                <div class="booking-package-details-card-value-price">12000LKR pp</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-12 col-md-8">
                <div class="card booking-details-card">
                    <div class="card-header px-4 py-4 booking-details-card-header">
                        <h4 class="booking-details-card-title mb-0">Confirm your booking</h4>
                    </div>
                    <div class="card-body px-4 py-4">

                        <form action="{{ route('booking.temp.store') }}" method="POST" id="booking-temp-form" enctype="multipart/form-data">
                        @csrf

                        @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


                            <input type="hidden" name="package_id" id="package_id" value="{{$package->id}}">
                            <input type="hidden" name="package_type" id="package_type" value="{{$package->type}}">
                            @if ($package->type != 2)
                                @if ($package->safari_type == 'Half Day')
                                    <input type="hidden" name="is_full_day" id="is_full_day" value="0">
                                    <input type="hidden" name="package_safari_type" id="package_safari_type" value="half">
                                @else
                                    <input type="hidden" name="is_full_day" id="is_full_day" value="1">
                                    <input type="hidden" name="package_safari_type" id="package_safari_type" value="full">
                                @endif
                            @endif
                            @if ($package->type != 1)
                                <input type="hidden" name="room_type_id" id="room_type_id" value="{{$package->room_type_id}}">
                            @endif

                            @if ($package->type != 2)
                                <div class="booking-details-card-safari-section mb-5">
                                    <h5 class="booking-details-card-section-title mt-2">Safari</h5>
                                    <p class="booking-details-card-section-description mb-4">Select your preferred date for the safari</p>

                                    <div class="booking-create-page-location-sections-box mt-3 p-3">
                                        <span class="booking-create-page-location-title">Pick up location</span>
                                        <div class="row mt-3">
                                            <div class="col-sm-12">
                                                <div class="form-group">
                                                    <input id="searchInput" class="input-controls booking-create-page-location-search-input" type="text" placeholder="Enter a location">
                                                    <div class="map booking-create-page-location-map" id="map">
                                                    </div>
                                                    <div class="row g-3 mt-2">
                                                        <div class="col-12 col-md-6">
                                                            <div class="row input-group booking-create-page-card-input-row">
                                                                <div class="col-8 input-group-prepend booking-create-page-card-input-label">
                                                                    <span class="input-group-text booking-create-page-card-input-label-text">Latitude</span>
                                                                </div>
                                                                <input type="text" class="col-4 form-control booking-create-page-card-input-value" aria-label="location_lat" id="location_lat" name="location_lat">
                                                            </div>
                                                            @error('location_lat')
                                                                <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                                                    </svg>
                                                                    <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="row input-group booking-create-page-card-input-row">
                                                                <div class="col-8 input-group-prepend booking-create-page-card-input-label">
                                                                    <span class="input-group-text booking-create-page-card-input-label-text">Longitude</span>
                                                                </div>
                                                                <input type="text" class="col-4 form-control booking-create-page-card-input-value" aria-label="location_lng" id="location_lng" name="location_lng">
                                                            </div>
                                                            @error('location_lng')
                                                                <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                        <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                                                    </svg>
                                                                    <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row g-3 mt-1">
                                        @if ($package->safari_type = 'Half Day')
                                            <div class="col-12 col-md-6">
                                                <div class="row input-group booking-create-page-card-input-row">
                                                    <div class="col-8 input-group-prepend booking-create-page-card-input-label">
                                                        <span class="input-group-text booking-create-page-card-input-label-text-select-2">Which half of the day</span>
                                                    </div>
                                                    <div class="col-4 m-0 p-0">
                                                        <select id="safari_time" class="form-select booking-create-page-card-input-value" name="safari_time">
                                                            <option value="">Select half</option>
                                                            <option value="Morning">Morning</option>
                                                            <option value="Afternoon">Afternoon</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                @error('safari_time')
                                                    <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                                        <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                            <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                                        </svg>
                                                        <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                                    </div>
                                                @enderror
                                            </div>
                                        @endif
                                        <div class="col-12 col-md-6">
                                            <div class="row input-group booking-create-page-card-input-row">
                                                <div class="col-8 input-group-prepend booking-create-page-card-input-label">
                                                    <span class="input-group-text booking-create-page-card-input-label-text">Safari Date</span>
                                                </div>
                                                <input type="date" class="col-4 form-control booking-create-page-card-input-value" aria-label="safari_date" id="safari_date" name="safari_date" placeholder="Enter date">
                                            </div>
                                            @error('safari_date')
                                                <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                                    </svg>
                                                    <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="row g-3 mt-1">
                                        <div class="col-12 col-md-6">
                                            <div class="row input-group booking-create-page-card-input-row">
                                                <div class="col-8 input-group-prepend booking-create-page-card-input-label">
                                                    <span class="input-group-text booking-create-page-card-input-label-text">Passengers with residence visa</span>
                                                </div>
                                                <input type="number" class="col-4 form-control booking-create-page-card-input-value" aria-label="residence_visa" id="residence_visa" name="residence_visa" placeholder="Enter count"  min="0" max="{{ $package->safari_max_people_count }}">
                                            </div>
                                            @error('residence_visa')
                                                <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                                    </svg>
                                                    <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="row input-group booking-create-page-card-input-row">
                                                <div class="col-8 input-group-prepend booking-create-page-card-input-label">
                                                    <span class="input-group-text booking-create-page-card-input-label-text">Passengers with travel visa</span>
                                                </div>
                                                <input type="number" class="col-4 form-control booking-create-page-card-input-value" aria-label="travel_visa" id="travel_visa" name="travel_visa" placeholder="Enter count"  min="0" max="{{ $package->safari_max_people_count }}">
                                            </div>
                                            @error('travel_visa')
                                                <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                                    </svg>
                                                    <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif

                            @if ($package->type != 1)
                                <div class="booking-details-card-accommodation-section mb-5">
                                    <h5 class="booking-details-card-section-title mt-2">Accommodation</h5>
                                    <p class="booking-details-card-section-description mb-4">Select your preferred date for the safari</p>

                                    <div class="row g-3">
                                        <div class="col-12 col-md-6">
                                            <div class="row input-group booking-create-page-card-input-row">
                                                <div class="col-8 input-group-prepend booking-create-page-card-input-label">
                                                    <span class="input-group-text booking-create-page-card-input-label-text-select-2">Number of rooms</span>
                                                </div>
                                                <div class="col-4 m-0 p-0">
                                                    <select id="number_of_rooms" class="form-select booking-create-page-card-input-value" name="number_of_rooms">
                                                        <option value="">Select rooms</option>
                                                        @for ($i = 1; $i <= $roomCountForType; $i++)
                                                            <option value="{{ $i }}">{{ $i }}</option>
                                                        @endfor
                                                    </select>
                                                </div>
                                            </div>
                                            @error('number_of_rooms')
                                                <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                                    </svg>
                                                    <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="row input-group booking-create-page-card-input-row">
                                                <div class="col-8 input-group-prepend booking-create-page-card-input-label">
                                                    <span class="input-group-text booking-create-page-card-input-label-text">Check In and Out</span>
                                                </div>
                                                <input type="date" class="col-4 form-control booking-create-page-card-input-value" aria-label="check_in_out" id="check_in_out" name="check_in_out" placeholder="Enter dates">
                                            </div>
                                            @error('check_in_out')
                                                <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                                    <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                                    </svg>
                                                    <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                                </div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            @endif

                            <div class="booking-details-card-contact-information-section mb-5">
                                <h5 class="booking-details-card-section-title mt-2">Contact Information</h5>
                                <p class="booking-details-card-section-description mb-4">Select your preferred date for the safari</p>

                                <div class="row g-3">
                                    <div class="col-12 col-md-6">
                                        <div class="row input-group booking-create-page-card-input-row">
                                            <div class="col-8 input-group-prepend booking-create-page-card-input-label">
                                                <span class="input-group-text booking-create-page-card-input-label-text">Customer Name</span>
                                            </div>
                                            <input type="text" class="col-4 form-control booking-create-page-card-input-value" aria-label="customer_name" id="customer_name" name="customer_name" placeholder="Enter name">
                                        </div>
                                        @error('customer_name')
                                            <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                                </svg>
                                                <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="col-12 col-md-6">
                                        <div class="row input-group booking-create-page-card-input-row">
                                            <div class="col-8 input-group-prepend booking-create-page-card-input-label">
                                                <span class="input-group-text booking-create-page-card-input-label-text">Contact Number</span>
                                            </div>
                                            <input type="text" class="col-4 form-control booking-create-page-card-input-value" aria-label="contact_no" id="contact_no" name="contact_no" placeholder="Enter number">
                                        </div>
                                        @error('contact_no')
                                            <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                                                <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                    <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                                                </svg>
                                                <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row align-items-center booking-details-card-continue-section">
                                <div class="col-8">
                                    <p class="booking-details-card-continue-section-description pe-5">
                                        By booking and sharing your details you agree to our terms and conditions.
                                        We will contact you in any case of questions or confirmation of this booking.
                                        Thank you.
                                    </p>
                                </div>
                                <div class="col-4 text-end">
                                    <button type="submit" class="booking-details-card-btn">Continue</button>
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
        $('#number_of_rooms').select2({
            placeholder: 'Select rooms',
            width: '100%',
            minimumResultsForSearch: -1,
        });
        $('#safari_time').select2({
            placeholder: 'Select time',
            width: '100%',
            minimumResultsForSearch: -1,
        });
    </script>
    <script
        src="https://maps.googleapis.com/maps/api/js?key={{ config('google-api-token.GOOGLE_MAPS_API_KEY') }}&callback=initAutocomplete&libraries=places&v=weekly"
        async></script>
    <script>
        function initAutocomplete() {
            var latlng = new google.maps.LatLng({{ '6.5736313' }},
                {{ '81.6621829' }});

            $('input[name=location_lat]').val('6.5736313');
            $('input[name=location_lng]').val('81.6621829');

            var map = new google.maps.Map(document.getElementById('map'), {
                center: latlng,
                zoom: 13
            });
            var marker = new google.maps.Marker({
                map: map,
                position: latlng,
                draggable: true,
                anchorPoint: new google.maps.Point(0, -29)
            });
            var input = document.getElementById('searchInput');
            map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
            var geocoder = new google.maps.Geocoder();
            var autocomplete = new google.maps.places.Autocomplete(input);
            autocomplete.bindTo('bounds', map);
            var infowindow = new google.maps.InfoWindow();
            autocomplete.addListener('place_changed', function() {

                infowindow.close();
                marker.setVisible(false);
                var place = autocomplete.getPlace();
                if (!place.geometry) {
                    window.alert("Autocomplete's returned place contains no geometry");
                    return;
                }

                // If the place has a geometry, then present it on a map.
                if (place.geometry.viewport) {
                    map.fitBounds(place.geometry.viewport);
                } else {
                    map.setCenter(place.geometry.location);
                    map.setZoom(17);
                }

                marker.setPosition(place.geometry.location);
                marker.setVisible(true);

                bindDataToForm(place.formatted_address, place.geometry.location.lat(), place.geometry.location
                    .lng());
                infowindow.setContent(place.formatted_address);
                infowindow.open(map, marker);

            });
            // this function will work on marker move event into map
            google.maps.event.addListener(marker, 'dragend', function() {
                geocoder.geocode({
                    'latLng': marker.getPosition()
                }, function(results, status) {
                    if (status == google.maps.GeocoderStatus.OK) {
                        if (results[0]) {
                            bindDataToForm(results[0].formatted_address, marker.getPosition().lat(), marker
                                .getPosition().lng());
                            infowindow.setContent(results[0].formatted_address);
                            infowindow.open(map, marker);

                            // $('input[name=address]').val(results[0].formatted_address);
                            // $('input[name=city]').val(results[0].name);
                        }
                    }
                });
            });
        }

        function bindDataToForm(address, lat, lng) {
            document.getElementById('location_lat').value = lat;
            document.getElementById('location_lng').value = lng;
        }
    </script>
@endpush
