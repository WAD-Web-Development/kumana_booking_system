@extends('layouts.app', ['activePage' => 'dashboard', 'activeSection' => 'dashboard'])

@section('content')
    <div class="container-fluid p-0">
        <div class="row g-0">
            <!-- Left: Image Slider -->
            <div class="col-md-4 custom-bg">
                <div class="package-back-btn-container">
                    <a href="{{ route('package.index') }}" class="package-back-btn">
                        <span class="package-back-btn-icon">
                            <i class="fas fa-arrow-left"></i>
                        </span>
                        <span class="package-back-btn-text">Back to Packages</span>
                    </a>
                </div>

                <div class="card package-image-card">
                    <img src="{{ asset('assets/img/image1.jpg') }}" class="package-image-card-img" alt="image">
                    <div class="package-image-card-body p-3">
                        <h5 class="package-image-card-title mb-5">Sunset Experience</h5>
                        <div class="package-image-card-info-row-border">
                            <span class="package-image-card-label">Package Type</span>
                            <span class="package-image-card-value">Stay + Safari</span>
                        </div>
                        <div class="package-image-card-info-row-border">
                            <span class="package-image-card-label">Safari Time</span>
                            <span class="package-image-card-value">
                                <i class="fas fa-sun"></i> Daytime
                            </span>
                        </div>
                        <div class="package-image-card-info-row">
                            <span class="package-image-card-label">Day Type</span>
                            <span class="package-image-card-value">Fullday</span>
                        </div>
                    </div>
                    <div class="card-footer package-image-card-footer mt-4 p-2">
                        <div class="package-image-card-price-row mt-2">
                            <span class="package-image-card-label ps-3">Starting at</span>
                            <span class="package-image-card-price pe-3">12000LKR pp</span>
                        </div>
                        <a href="#" class="package-image-card-btn mt-3">Book Package <i class="fas fa-arrow-right package-image-card-btn-arrow"></i></a>
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

                        <div class="row mt-4 g-4">
                            <!-- Item 1: With Meals -->
                            <div class="col-12 col-md-12 col-lg-6 col-xl-4">
                                <div class="package-include-item">
                                    <i class="fas fa-utensils package-include-icon me-3"></i>
                                    <span class="package-include-text">With Meals</span>
                                </div>
                            </div>
                            <!-- Item 2: Pickup and Drop off -->
                            <div class="col-12 col-md-12 col-lg-6 col-xl-4">
                                <div class="package-include-item">
                                    <i class="fas fa-car package-include-icon me-3"></i>
                                    <span class="package-include-text">Pickup and Drop off</span>
                                </div>
                            </div>
                            <!-- Item 3: Accomodation -->
                            <div class="col-12 col-md-12 col-lg-6 col-xl-4">
                                <div class="package-include-item">
                                    <i class="fas fa-home package-include-icon me-3"></i>
                                    <span class="package-include-text">Accomodation</span>
                                </div>
                            </div>
                            <!-- Item 4: Personal Guide -->
                            <div class="col-12 col-md-12 col-lg-6 col-xl-4">
                                <div class="package-include-item">
                                    <i class="fas fa-user package-include-icon me-3"></i>
                                    <span class="package-include-text">Personal Guide</span>
                                </div>
                            </div>
                            <!-- Item 5: Safari -->
                            <div class="col-12 col-md-12 col-lg-6 col-xl-4">
                                <div class="package-include-item">
                                    <i class="fas fa-car-side package-include-icon me-3"></i>
                                    <span class="package-include-text">Safari</span>
                                </div>
                            </div>
                            <!-- Item 6: Sightseeing and History -->
                            <div class="col-12 col-md-12 col-lg-6 col-xl-4">
                                <div class="package-include-item">
                                    <i class="fas fa-binoculars package-include-icon me-3"></i>
                                    <span class="package-include-text">Sightseeing and History</span>
                                </div>
                            </div>
                        </div>

                        <h4 class="package-title mt-5">Accommodation</h4>

                        <div class="row mt-4">
                            <div class="col-12">
                                <div class="d-flex align-items-center p-2 package-accommodation-card">
                                    <img src="{{ asset('assets/img/image1.jpg') }}" alt="image" class="package-accommodation-image">
                                    <div class="ms-4">
                                        <h5 class="package-accommodation-title">Villa North Green</h5>
                                        <p class="package-accommodation-description">
                                            Stay close to nature, experience the wild like never before Stay close to nature, experience
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-4">
                            <div class="col-12 col-md-6">
                                <div class="d-flex justify-content-between package-other-information-row">
                                  <span class="package-other-information-label">Master Bedroom</span>
                                  <span class="package-other-information-value">x2</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="d-flex justify-content-between package-other-information-row">
                                    <span class="package-other-information-label">Normal Room</span>
                                    <span class="package-other-information-value">x3</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="d-flex justify-content-between package-other-information-row mt-3">
                                    <span class="package-other-information-label">Bathroom</span>
                                    <span class="package-other-information-value">x1 Attached x2 Private</span>
                                </div>
                            </div>
                        </div>

                        <h4 class="package-title mt-5">Other Information</h4>

                        <div class="row mt-4">
                            <div class="col-12 col-md-6">
                                <div class="d-flex justify-content-between package-other-information-row">
                                  <span class="package-other-information-label">Entrance</span>
                                  <span class="package-other-information-value">North West</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="d-flex justify-content-between package-other-information-row">
                                    <span class="package-other-information-label">Hotel Distance</span>
                                    <span class="package-other-information-value">5 Km from North Entrance</span>
                                </div>
                            </div>
                            <div class="col-12 col-md-6">
                                <div class="d-flex justify-content-between package-other-information-row mt-3">
                                    <span class="package-other-information-label">Safari Duration</span>
                                    <span class="package-other-information-value">3-4 Hours</span>
                                </div>
                            </div>
                        </div>

                        <h4 class="package-title mt-5">Possible leopard sightings</h4>

                        <div class="row mt-4 g-3">
                            <!-- Sighting Card 1 -->
                            <div class="col-lg-4 col-md-6">
                                <div class="card package-sighting-card ">
                                    <img src="{{ asset('assets/img/image1.jpg') }}" class="card-img-top" alt="...">
                                    <div class="card-img-overlay px-4 py-3">
                                        <h4 class="package-sighting-card-name-tag mb-1">Leopard 11</h4>
                                        <h5 class="package-sighting-card-name">Samantha Bruh</h5>
                                      </div>
                                    <div class="card-body package-sighting-card-body px-4 py-3">
                                        <h6 class="package-sighting-card-location">Location</h6>
                                        <h5 class="package-sighting-card-location-name">North West Kumana Park</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card package-sighting-card ">
                                    <img src="{{ asset('assets/img/image2.jpg') }}" class="card-img-top" alt="...">
                                    <div class="card-img-overlay px-4 py-3">
                                        <h4 class="package-sighting-card-name-tag mb-1">Leopard 11</h4>
                                        <h5 class="package-sighting-card-name">Samantha Bruh</h5>
                                      </div>
                                    <div class="card-body package-sighting-card-body px-4 py-3">
                                        <h6 class="package-sighting-card-location">Location</h6>
                                        <h5 class="package-sighting-card-location-name">North West Kumana Park</h5>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="card package-sighting-card ">
                                    <img src="{{ asset('assets/img/logo.jpg') }}" class="card-img-top" alt="...">
                                    <div class="card-img-overlay px-4 py-3">
                                        <h4 class="package-sighting-card-name-tag mb-1">Leopard 11</h4>
                                        <h5 class="package-sighting-card-name">Samantha Bruh</h5>
                                      </div>
                                    <div class="card-body package-sighting-card-body px-4 py-3">
                                        <h6 class="package-sighting-card-location">Location</h6>
                                        <h5 class="package-sighting-card-location-name">North West Kumana Park</h5>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <h4 class="package-title mt-5">Itinerary</h4>

                        <ul class="list-unstyled mt-4">
                            <li class="d-flex justify-content-between align-items-center package-itinerary-row">
                              <div class="d-flex align-items-center">
                                <span class="package-itinerary-number me-4">01</span>
                                <span class="package-itinerary-text">Check in to the Hotel</span>
                              </div>
                              <div class="package-itinerary-time">
                                {{-- <span>9:00am</span> --}}
                                <span class="ms-3">6:20am</span>
                              </div>
                            </li>
                            <li class="d-flex justify-content-between align-items-center package-itinerary-row">
                              <div class="d-flex align-items-center">
                                <span class="package-itinerary-number me-4">04</span>
                                <span class="package-itinerary-text">Breakfast</span>
                              </div>
                              <div class="package-itinerary-time">
                                {{-- <span>9:00am</span> --}}
                                <span class="ms-3">7:10am</span>
                              </div>
                            </li>
                            <li class="d-flex justify-content-between align-items-center package-itinerary-row">
                              <div class="d-flex align-items-center">
                                <span class="package-itinerary-number me-4">03</span>
                                <span class="package-itinerary-text">Break</span>
                              </div>
                              <div class="package-itinerary-time">
                                <span>9:00am</span>
                                <span class="ms-3">10:10am</span>
                              </div>
                            </li>
                        </ul>

                        <h4 class="package-title mt-5">Photos and Gallery</h4>

                        <div class="d-flex flex-nowrap mt-4 package-carousel-container">
                            <div class="package-carousel-item me-3">
                                <img src="{{ asset('assets/img/image1.jpg') }}" class="package-carousel-image" alt="...">
                            </div>
                            <div class="package-carousel-item me-3">
                                <img src="{{ asset('assets/img/image2.jpg') }}" class="package-carousel-image" alt="...">
                            </div>
                            <div class="package-carousel-item me-3">
                                <img src="{{ asset('assets/img/logo.jpg') }}" class="package-carousel-image" alt="...">
                            </div>
                        </div>


                        <div class="package-contact-banner p-3 p-md-4 d-flex align-items-center">
                            <div class="me-3 me-md-4 flex-shrink-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="#E59880" class="bi bi-telephone-fill" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M1.885.511a1.745 1.745 0 0 1 2.61.163L6.29 2.98c.329.423.445.974.28 1.465l-2.13 2.13a1.08 1.08 0 0 0-.11 1.258c.277.492.64 1.002 1.095 1.457.454.454 1.055.87 1.457 1.095.492.277 1.002.64 1.258.11l2.13-2.13a1.08 1.08 0 0 0 1.465.28l2.308 1.799a1.745 1.745 0 0 1 .163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.363-1.03-.038-2.137.703-2.877z"/>
                                </svg>
                            </div>

                            <div>
                                <h6 class="package-contact-banner-title mb-1">
                                    <a href="#" class="package-contact-banner-title-link">Got questions ? get in touch now <i class="fas fa-arrow-right package-get-in-touch-arrow"></i>
                                </h6>
                                <p class="package-contact-banner-subtext mb-0">
                                    We will get back to you within 24hours, Please do give us all the details necessary to get back with the right answers
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('custom_scripts')

<script>
    const container = document.querySelector('.package-carousel-container');
    let isDown = false;
    let startX;
    let scrollLeft;

    container.addEventListener('mousedown', (e) => {
      isDown = true;
      startX = e.pageX - container.offsetLeft;
      scrollLeft = container.scrollLeft;
      container.classList.add('active');
    });

    container.addEventListener('mouseleave', () => {
      isDown = false;
      container.classList.remove('active');
    });

    container.addEventListener('mouseup', () => {
      isDown = false;
      container.classList.remove('active');
    });

    container.addEventListener('mousemove', (e) => {
      if (!isDown) return;
      e.preventDefault();
      const x = e.pageX - container.offsetLeft;
      const walk = (x - startX) * 1.2; // Adjust multiplier for speed
      container.scrollLeft = scrollLeft - walk;
    });

    document.querySelectorAll('.package-carousel-image').forEach(img => {
        img.addEventListener('dragstart', e => e.preventDefault());
    });
</script>


@endpush
