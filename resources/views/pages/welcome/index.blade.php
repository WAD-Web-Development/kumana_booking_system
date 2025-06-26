@extends('layouts.app', ['activePage' => 'dashboard', 'activeSection' => 'dashboard'])

@section('content')
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Left: Image Slider -->
            <div class="col-md-4 min-vh-100 d-flex align-items-center justify-content-center p-0 welcome-slider-overflow">
                <div id="welcomeCarousel" class="carousel slide w-100 h-100" data-bs-ride="carousel">
                    <div class="carousel-inner h-100">
                        <div class="carousel-item active h-100 position-relative">
                            <img src="{{ asset('assets/img/logo.jpg') }}" class="d-block w-100 h-100 object-fit-cover" alt="Slide 1">
                            <!-- Overlay content -->
                            <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-start align-items-start p-4 welcome-overlay">
                                <div class="mt-4">
                                    <span class="d-block text-white fw-bold fs-5 welcome-slide-label">01 <span style="opacity:0.5;">──────</span> 04</span>
                                </div>
                                <div class="mt-auto mb-5">
                                    <h1 class="display-5 fw-bold text-white" style="line-height: 1.1;">Book Your<br>Kumana Park Experience</h1>
                                    <p class="text-white fs-5 welcome-slide-desc">
                                        Kumana National Park in Sri Lanka is renowned for its avifauna, particularly its large flocks of migratory waterfowl and wading birds. The park is 391 kilometres southeast of Colombo on Sri Lanka's southeastern coast. Kumana is contiguous with Yala National Park
                                    </p>
                                </div>
                            </div>
                            <div class="position-absolute top-0 start-0 w-100 h-100 welcome-overlay-bg"></div>
                        </div>
                        <div class="carousel-item h-100">
                            <img src="{{ asset('assets/img/logo.jpg') }}" class="d-block w-100 h-100 object-fit-cover" alt="Slide 2">
                        </div>
                        <!-- Add more images as needed -->
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#welcomeCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#welcomeCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <!-- Right: Content -->
            <div class="col-md-8 ps-3 pe-3">
                <div class="my-4 welcome-typebar-title">View by type</div>
                <div class="row welcome-typebar-group flex-wrap gx-1 gy-1">
                    <div class="col-12 col-md-6 col-lg-3">
                        <button class="welcome-typebar-btn active w-100">
                            View all
                        </button>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <button class="welcome-typebar-btn w-100">
                            <span>
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="12" width="8" height="8" rx="2"/><rect x="14" y="4" width="8" height="16" rx="2"/></svg>
                            </span>
                            Stay + Safari Packages
                        </button>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <button class="welcome-typebar-btn w-100">
                            <span>
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M8 16v2M16 16v2"/></svg>
                            </span>
                            Safari Only
                        </button>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <button class="welcome-typebar-btn w-100">
                            <span>
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="3" y="11" width="18" height="10" rx="2"/><path d="M7 11V7a5 5 0 0 1 10 0v4"/></svg>
                            </span>
                            Stay only
                        </button>
                    </div>
                </div>
                <!-- Card Grid Section -->
                <div class="row g-3 mt-2 mb-4">
                    <!-- Card 1 -->
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="welcome-card position-relative">
                            <div class="position-relative">
                                <img src="{{ asset('assets/img/logo.jpg') }}" class="welcome-card-img" alt="...">
                                <span class="welcome-card-badge position-absolute top-0 start-0 m-2">Stay</span>
                                <span class="welcome-card-title position-absolute bottom-0 start-0 mx-2 mb-3">Night with Nature</span>
                            </div>
                            <div class="welcome-card-body m-0 p-0">
                                <p class="welcome-card-text px-2 py-3">Sri Lankan elephants in Kumana National Park are a majestic and important part of the park's ecosystem. These elephants are a subspecies of the Asian elephant. known for their smaller</p>
                            </div>
                            <div class="welcome-card-footer px-2 py-3">
                                <span class="welcome-card-footer-label">Starting at</span>
                                <span class="welcome-card-footer-price">12000LKR pp</span>
                            </div>
                            <button class="welcome-card-btn-float">View Package <span>&rarr;</span></button>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="welcome-card position-relative">
                            <div class="position-relative">
                                <img src="{{ asset('assets/img/logo.jpg') }}" class="welcome-card-img" alt="...">
                                <span class="welcome-card-badge position-absolute top-0 start-0 m-2">Safari</span>
                                <span class="welcome-card-badge-light position-absolute top-0 end-0 m-2">Half Day</span>
                                <span class="welcome-card-title position-absolute bottom-0 start-0 mx-2 mb-3">Night with Nature</span>
                            </div>
                            <div class="welcome-card-body m-0 p-0">
                                <p class="welcome-card-text px-2 py-3">Sri Lankan elephants in Kumana National Park are a majestic and important part of the park's ecosystem. These elephants are a subspecies of the Asian elephant. known for their smaller</p>
                            </div>
                            <div class="welcome-card-footer px-2 py-3">
                                <span class="welcome-card-footer-label">Starting at</span>
                                <span class="welcome-card-footer-price">12000LKR pp</span>
                            </div>
                            <button class="welcome-card-btn-float">View Package <span>&rarr;</span></button>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="welcome-card position-relative">
                            <div class="position-relative">
                                <img src="{{ asset('assets/img/logo.jpg') }}" class="welcome-card-img" alt="...">
                                <span class="welcome-card-badge position-absolute top-0 start-0 m-2">Safari</span>
                                <span class="welcome-card-badge-light position-absolute top-0 end-0 m-2">Half Day</span>
                                <span class="welcome-card-title position-absolute bottom-0 start-0 mx-2 mb-3">Night with Nature</span>
                            </div>
                            <div class="welcome-card-body m-0 p-0">
                                <p class="welcome-card-text px-2 py-3">Sri Lankan elephants in Kumana National Park are a majestic and important part of the park's ecosystem. These elephants are a subspecies of the Asian elephant. known for their smaller</p>
                            </div>
                            <div class="welcome-card-footer px-2 py-3">
                                <span class="welcome-card-footer-label">Starting at</span>
                                <span class="welcome-card-footer-price">12000LKR pp</span>
                            </div>
                            <button class="welcome-card-btn-float">View Package <span>&rarr;</span></button>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="welcome-card position-relative">
                            <div class="position-relative">
                                <img src="{{ asset('assets/img/logo.jpg') }}" class="welcome-card-img" alt="...">
                                <span class="welcome-card-badge position-absolute top-0 start-0 m-2">Safari</span>
                                <span class="welcome-card-badge-light position-absolute top-0 end-0 m-2">Half Day</span>
                                <span class="welcome-card-title position-absolute bottom-0 start-0 mx-2 mb-3">Night with Nature</span>
                            </div>
                            <div class="welcome-card-body m-0 p-0">
                                <p class="welcome-card-text px-2 py-3">Sri Lankan elephants in Kumana National Park are a majestic and important part of the park's ecosystem. These elephants are a subspecies of the Asian elephant. known for their smaller</p>
                            </div>
                            <div class="welcome-card-footer px-2 py-3">
                                <span class="welcome-card-footer-label">Starting at</span>
                                <span class="welcome-card-footer-price">12000LKR pp</span>
                            </div>
                            <button class="welcome-card-btn-float">View Package <span>&rarr;</span></button>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="welcome-card position-relative">
                            <div class="position-relative">
                                <img src="{{ asset('assets/img/logo.jpg') }}" class="welcome-card-img" alt="...">
                                <span class="welcome-card-badge position-absolute top-0 start-0 m-2">Safari</span>
                                <span class="welcome-card-badge-light position-absolute top-0 end-0 m-2">Half Day</span>
                                <span class="welcome-card-title position-absolute bottom-0 start-0 mx-2 mb-3">Night with Nature</span>
                            </div>
                            <div class="welcome-card-body m-0 p-0">
                                <p class="welcome-card-text px-2 py-3">Sri Lankan elephants in Kumana National Park are a majestic and important part of the park's ecosystem. These elephants are a subspecies of the Asian elephant. known for their smaller</p>
                            </div>
                            <div class="welcome-card-footer px-2 py-3">
                                <span class="welcome-card-footer-label">Starting at</span>
                                <span class="welcome-card-footer-price">12000LKR pp</span>
                            </div>
                            <button class="welcome-card-btn-float">View Package <span>&rarr;</span></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
