@if (count($packages) > 0)
    @foreach ($packages as $package)
        <div class="col-12 col-md-6 col-lg-3">
            <div class="welcome-card position-relative">
                <div class="position-relative">
                    <img src="{{ asset('assets/img/logo.jpg') }}" class="welcome-card-img" alt="...">
                    <span class="welcome-card-badge position-absolute top-0 start-0 m-2">Stay</span>
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
                <a href="{{ route('packages.show', 1) }}" class="welcome-card-btn-float">
                    View Package <span>&rarr;</span>
                </a>
            </div>
        </div>
    @endforeach
@else
    no data
@endif
