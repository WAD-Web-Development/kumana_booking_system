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
                    {{-- <button class="carousel-control-prev" type="button" data-bs-target="#welcomeCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#welcomeCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button> --}}
                </div>
            </div>

            <!-- Right: Content -->
            <div class="col-md-8 ps-3 pe-3">
                <div class="my-4 welcome-typebar-title">View by type</div>
                <div class="row welcome-typebar-group flex-wrap gx-1 gy-1 mb-4">
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
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="12" width="8" height="8" rx="2"/><rect x="14" y="4" width="8" height="16" rx="2"/></svg>
                            </span>
                            Safari Only
                        </button>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <button class="welcome-typebar-btn w-100">
                            <span>
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="12" width="8" height="8" rx="2"/><rect x="14" y="4" width="8" height="16" rx="2"/></svg>
                            </span>
                            Stay only
                        </button>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center pb-2 welcome-header-container">
                    <h2 class="welcome-header-title">Packages</h2>
                    <div>
                        <button
                            id="filter-open-btn"
                            class="btn btn-link text-decoration-none welcome-filter-button"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#filterPanel"
                            aria-expanded="false"
                            aria-controls="filterPanel">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-filter" viewBox="0 0 16 16"><path d="M6 10.5a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 0 1h-3a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7a.5.5 0 0 1-.5-.5m-2-3a.5.5 0 0 1 .5-.5h11a.5.5 0 0 1 0 1h-11a.5.5 0 0 1-.5-.5"/></svg>
                            <span>Filter by</span>
                        </button>

                        <button
                            id="filter-close-btn"
                            class="btn btn-link text-decoration-none welcome-filter-button d-none"
                            type="button"
                            data-bs-toggle="collapse"
                            data-bs-target="#filterPanel"
                            aria-expanded="false"
                            aria-controls="filterPanel">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16"><path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8z"/></svg>
                            <span>Close</span>
                        </button>
                    </div>
                </div>

                <div class="collapse" id="filterPanel">
                    <div class="d-flex justify-content-between align-items-center mt-3">
                        <div class="d-flex align-items-center gap-2">
                            <button class="welcome-filter-pill">Daytime</button>
                            <button class="welcome-filter-pill">Night Safari</button>
                            <button class="welcome-filter-pill active">Full-Day</button>
                            <button class="welcome-filter-pill">No-Meals</button>
                        </div>
                        <div>
                            <button class="welcome-apply-filters-btn">Filter Results</button>
                        </div>
                    </div>
                </div>

                <!-- Card Grid Section -->
                <div class="row g-3 mt-2 mb-4">
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
                                <span class="welcome-card-footer-price">12000LKR/night</span>
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

@push('custom_scripts')
    <script>
        // Wait for the document to be fully loaded
        document.addEventListener('DOMContentLoaded', function () {
            const filterPanel = document.getElementById('filterPanel');
            const openButton = document.getElementById('filter-open-btn');
            const closeButton = document.getElementById('filter-close-btn');

            // When the panel is about to be shown...
            filterPanel.addEventListener('show.bs.collapse', function () {
                openButton.classList.add('d-none');    // Hide the 'Filter by' button
                closeButton.classList.remove('d-none'); // Show the 'Close' button
            });

            // When the panel is about to be hidden...
            filterPanel.addEventListener('hide.bs.collapse', function () {
                closeButton.classList.add('d-none');   // Hide the 'Close' button
                openButton.classList.remove('d-none'); // Show the 'Filter by' button
            });
        });
    </script>
@endpush
