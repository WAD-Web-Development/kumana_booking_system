@extends('layouts.app', ['activePage' => 'dashboard', 'activeSection' => 'dashboard'])

@section('content')
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Left: Image Slider -->
            <div class="col-md-4 min-vh-100 d-flex align-items-center justify-content-center p-0 welcome-slider-overflow">
                <div id="welcomeCarousel" class="carousel slide w-100 h-100" data-bs-ride="carousel">
                    <div class="carousel-inner h-100">
                        <div class="carousel-item active h-100 position-relative">
                            <img src="{{ asset('assets/img/image1.jpg') }}" class="d-block w-100 h-100 object-fit-cover" alt="Slide 1">

                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-start align-items-start p-4 welcome-overlay">
                                <div class="mt-auto mx-3 d-flex align-items-center welcome-slide-label-container">
                                    <span class="welcome-slide-label">01</span>
                                    <div class="line-divider"></div>
                                    <span class="welcome-slide-label">04</span>
                                  </div>

                                <div class="mx-3">
                                    <h1 class="welcome-slide-title">
                                        Book Your<br>Kumana Park Experience
                                    </h1>
                                    <p class="welcome-slide-desc">
                                        Kumana National Park in Sri Lanka is renowned for its avifauna, particularly its large flocks of migratory waterfowl and wading birds. The park is 391 kilometres southeast of Colombo on Sri Lanka's southeastern coast. Kumana is contiguous with Yala National Park
                                    </p>
                                </div>
                            </div>

                            <div class="position-absolute top-0 start-0 w-100 h-100 welcome-overlay-bg"></div>
                        </div>

                        <div class="carousel-item h-100 position-relative">
                            <img src="{{ asset('assets/img/image2.jpg') }}" class="d-block w-100 h-100 object-fit-cover" alt="Slide 2">

                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-start align-items-start p-4 welcome-overlay">
                                <div class="mt-auto mx-3 d-flex align-items-center welcome-slide-label-container">
                                    <span class="welcome-slide-label">02</span>
                                    <div class="line-divider"></div>
                                    <span class="welcome-slide-label">04</span>
                                  </div>

                                <div class="mx-3">
                                    <h1 class="welcome-slide-title">
                                        Book Your<br>Kumana Park Experience
                                    </h1>
                                    <p class="welcome-slide-desc">
                                        Kumana National Park in Sri Lanka is renowned for its avifauna, particularly its large flocks of migratory waterfowl and wading birds. The park is 391 kilometres southeast of Colombo on Sri Lanka's southeastern coast. Kumana is contiguous with Yala National Park
                                    </p>
                                </div>
                            </div>

                            <div class="position-absolute top-0 start-0 w-100 h-100 welcome-overlay-bg"></div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right: Content -->
            <div class="col-md-8 px-5 py-4">

            </div>
        </div>
    </div>
@endsection

@push('custom_scripts')

@endpush
