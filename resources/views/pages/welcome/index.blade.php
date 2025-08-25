@extends('layouts.app', ['activePage' => 'dashboard', 'activeSection' => 'dashboard'])

@section('content')
    <div class="container-fluid p-0 page-content-wrapper">
        <div class="row g-0">
            <!-- Left: Image Slider -->

            @php
                $totalSlides = count($welcomeSliders);
            @endphp

            <div class="col-md-4 min-vh-100 d-flex align-items-center justify-content-center p-0 welcome-slider-overflow">
                <div id="welcomeCarousel" class="carousel slide w-100 h-100" data-bs-ride="carousel">
                    <div class="carousel-inner h-100">
                        @foreach ($welcomeSliders as $index => $welcomeSlider)
                            <div class="carousel-item {{ $index == 0 ? 'active' : '' }} h-100 position-relative">
                                <img src="{{ $welcomeSlider->image_url }}" class="d-block w-100 h-100 object-fit-cover welcome-slider-img" alt="Slide {{ $index + 1 }}">

                                <div class="position-absolute top-0 start-0 w-100 h-100 d-flex flex-column justify-content-start align-items-start p-4 welcome-overlay">
                                    <div class="mt-auto mx-3 d-flex align-items-center welcome-slide-label-container">
                                        <span class="welcome-slide-label">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}</span>
                                        <div class="line-divider"></div>
                                        <span class="welcome-slide-label">{{ str_pad($totalSlides, 2, '0', STR_PAD_LEFT) }}</span>
                                    </div>

                                    <div class="mx-3">
                                        <h1 class="welcome-slide-title">
                                            {{$welcomeSlider->title}}
                                        </h1>
                                        <p class="welcome-slide-desc">
                                            @if(!empty($welcomeSlider->description))
                                                {{ Str::limit($welcomeSlider->description, 300) }}
                                            @endif
                                        </p>
                                    </div>
                                </div>

                                <div class="position-absolute top-0 start-0 w-100 h-100 welcome-overlay-bg"></div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <!-- Right: Content -->
            <div class="col-md-8 ps-3 pe-3">
                <div class="my-4 welcome-typebar-title">View by type</div>
                <div class="row welcome-typebar-group flex-wrap gx-1 gy-1 mb-4">
                    <div class="col-12 col-md-6 col-lg-3">
                        <button class="welcome-typebar-btn active w-100" data-type="all">
                            View all
                        </button>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <button class="welcome-typebar-btn w-100" data-type="3">
                            <span>
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="12" width="8" height="8" rx="2"/><rect x="14" y="4" width="8" height="16" rx="2"/></svg>
                            </span>
                            Stay + Safari Packages
                        </button>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <button class="welcome-typebar-btn w-100" data-type="1">
                            <span>
                                <svg fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"><rect x="2" y="12" width="8" height="8" rx="2"/><rect x="14" y="4" width="8" height="16" rx="2"/></svg>
                            </span>
                            Safari Only
                        </button>
                    </div>
                    <div class="col-12 col-md-6 col-lg-3">
                        <button class="welcome-typebar-btn w-100" data-type="2">
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
                            @foreach($includes as $include)
                                <button class="welcome-filter-pill"
                                        data-include="{{ $include->title }}">
                                    {{ $include->title }}
                                </button>
                            @endforeach
                        </div>
                        <div>
                            <button class="welcome-apply-filters-btn">Filter Results</button>
                        </div>
                    </div>
                </div>

                <div class="row g-3 mt-2 mb-4" id="packageContainer">
                </div>
            </div>
        </div>
        <div class="blur-overlay"></div>
    </div>
    @include('components.login-registration-modal')
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

    <script>
        const loginModal = document.getElementById('loginModal');
        const blurOverlay = document.querySelector('.blur-overlay');

        loginModal.addEventListener('show.bs.modal', () => {
            blurOverlay.style.display = 'block';
        });

        loginModal.addEventListener('hidden.bs.modal', () => {
            blurOverlay.style.display = 'none';
        });
    </script>

    <script>
        $(document).ready(function() {
            searchPackages();

            $(document).on('click', '.welcome-typebar-btn', function() {

                $('.welcome-typebar-btn').removeClass('active');
                $(this).addClass('active');

                let type = $(this).data('type');
                let includes = getSelectedIncludes();
                searchPackages(type, includes);
            });

            $(document).on('click', '.welcome-filter-pill', function() {
                $(this).toggleClass('active');
            });

            $(document).on('click', '.welcome-apply-filters-btn', function() {
                let includes = getSelectedIncludes();
                let type = $('.welcome-typebar-btn.active').data('type') || 'all';
                searchPackages(type, includes);
            });

            function getSelectedIncludes() {
                let includes = [];
                $('.welcome-filter-pill.active').each(function() {
                    includes.push($(this).data('include'));
                });
                return includes;
            }

            document.getElementById("filter-close-btn").addEventListener("click", function () {
                document.querySelectorAll(".welcome-filter-pill.active").forEach(el =>
                    el.classList.remove("active")
                );

                let type = $('.welcome-typebar-btn.active').data('type') || 'all';
                searchPackages(type, []);
            });

        });

        function searchPackages(type = 'all', includes = []) {
            $.ajax({
                url: '{{ route('packages.search') }}',
                method: 'GET',
                data: {
                    type: type,
                    includes: includes
                },
                success: function(response) {
                    $('#packageContainer').html(response.html);
                },
                error: function(xhr, status, error) {
                    console.error("AJAX error:", status, error);
                }
            });
        }
    </script>

@endpush
