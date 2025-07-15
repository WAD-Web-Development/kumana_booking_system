<div class="card side-bar-card">
    <div class="card-header px-3 py-4 border-0">
        <div class="d-flex align-items-center">
            <div class="rounded-circle d-flex align-items-center justify-content-center me-4 side-bar-card-user-icon">
                {{ strtoupper(substr(Auth::user()->name, 0, 2)) }}
            </div>
            <div>
                <div class="side-bar-card-user-name">{{ Auth::user()->name }}</div>
                <div class="side-bar-card-user-since">Since {{ date('Y', strtotime(Auth::user()->created_at)) }}</div>
            </div>
        </div>
    </div>
    <div class="card-body px-0 py-0 side-bar-card-body d-flex flex-column h-100">
        <div>
            <a href="#" class="d-flex align-items-center px-4 py-3 side-bar-link">
                <i class="fa fa-user-o side-bar-link-icon me-3"></i>
                <span class="side-bar-link-text">Profile</span>
            </a>
            <a href="#" class="d-flex align-items-center px-4 py-3 side-bar-link">
                <i class="fa fa-address-book-o side-bar-link-icon me-3"></i>
                <span class="side-bar-link-text">My Bookings</span>
            </a>
        </div>
        <div class="mt-auto">
            <a href="{{ route('booking.create', 1) }}" class="side-bar-new-booking-btn my-4 mx-4">New Booking <i class="fas fa-arrow-right side-bar-new-booking-btn-arrow"></i></a>
        </div>
    </div>
    <div class="card-footer side-bar-card-footer border-1 px-0 py-0">
        <a href="#" class="d-flex align-items-center px-4 py-3 side-bar-logout-link">
            <i class="fa fa-address-book-o side-bar-link-logout-icon me-3"></i>
            <span class="side-bar-link-logout-text">Log Out</span>
        </a>
    </div>
</div>
