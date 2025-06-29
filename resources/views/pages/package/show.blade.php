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
            <div class="col-md-8 package-show-custom-padding">
                <div class="card px-4 py-4">
                    <div class="card-body">
                        <h4 class="package-title">Package Description</h4>
                        <p class="package-description-text mt-3">
                            Sri Lankan elephants in Kumana National Park are a majestic and important part of the park's ecosystem. These elephants are a subspecies of the Asian elephant, known for their smaller Sri Lankan elephants in Kumana National Park are a majestic and important part of the park's ecosystem. These elephants are a subspecies of the Asian elephant, known for their smaller Sri Lankan elephants in Kumana National Park are a majestic and important part of the park's ecosystem. These elephants are a subspecies of the Asian elephant, known for their smaller Sri Lankan elephants in Kumana National Park are a majestic and important part of the park's ecosystem. These elephants are a subspecies of the Asian elephant, known for their smaller
                        </p>

                        <h4 class="package-title mt-5">Included</h4>

                        <div class="row mt-4 g-3">
                            <!-- Item 1: With Meals -->
                            <div class="col-sm-6 col-lg-4">
                                <div class="package-include-item">
                                    <i class="fas fa-utensils package-include-icon me-3"></i>
                                    <span class="package-include-text">With Meals</span>
                                </div>
                            </div>
                            <!-- Item 2: Pickup and Drop off -->
                            <div class="col-sm-6 col-lg-4">
                                <div class="package-include-item">
                                    <i class="fas fa-car package-include-icon me-3"></i>
                                    <span class="package-include-text">Pickup and Drop off</span>
                                </div>
                            </div>
                            <!-- Item 3: Accomodation -->
                            <div class="col-sm-6 col-lg-4">
                                <div class="package-include-item">
                                    <i class="fas fa-home package-include-icon me-3"></i>
                                    <span class="package-include-text">Accomodation</span>
                                </div>
                            </div>
                            <!-- Item 4: Personal Guide -->
                            <div class="col-sm-6 col-lg-4">
                                <div class="package-include-item">
                                    <i class="fas fa-user package-include-icon me-3"></i>
                                    <span class="package-include-text">Personal Guide</span>
                                </div>
                            </div>
                            <!-- Item 5: Safari -->
                            <div class="col-sm-6 col-lg-4">
                                <div class="package-include-item">
                                    <i class="fas fa-car-side package-include-icon me-3"></i>
                                    <span class="package-include-text">Safari</span>
                                </div>
                            </div>
                            <!-- Item 6: Sightseeing and History -->
                            <div class="col-sm-6 col-lg-4">
                                <div class="package-include-item">
                                    <i class="fas fa-binoculars package-include-icon me-3"></i>
                                    <span class="package-include-text">Sightseeing and History</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_scripts')

@endpush
