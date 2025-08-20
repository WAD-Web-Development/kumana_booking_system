@if (count($packages) > 0)
    @foreach ($packages as $package)
        <div class="col-12 col-md-6 col-lg-3">
            <div class="welcome-card position-relative">
                <div class="position-relative">
                    <img src="{{ $package->image_url }}" class="welcome-card-img" alt="...">
                    <span class="welcome-card-badge position-absolute top-0 start-0 m-2">
                        {{$package->type_name}}
                    </span>
                    @if ($package->safari_type)
                       <span class="welcome-card-badge-light position-absolute top-0 end-0 m-2">{{$package->safari_type}}</span>
                    @endif
                    <span class="welcome-card-title position-absolute bottom-0 start-0 mx-2 mb-3">{{$package->title}}</span>
                </div>
                <div class="welcome-card-body m-0 p-0">
                    <p class="welcome-card-text px-2 py-3">
                        {{ Str::limit($package->description, 200) }}
                    </p>
                </div>
                <div class="welcome-card-footer px-2 py-3">
                    <span class="welcome-card-footer-label">Starting at</span>
                    <span class="welcome-card-footer-price">12000LKR pp</span>
                </div>
                <a href="{{ route('packages.show', $package->id) }}" class="welcome-card-btn-float">
                    View Package <span>&rarr;</span>
                </a>
            </div>
        </div>
    @endforeach
@else
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center">
                <p class="card-text">No Data</p>
            </div>
        </div>
    </div>
@endif
