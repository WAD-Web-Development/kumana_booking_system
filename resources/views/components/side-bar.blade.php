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
            <a href="{{ route('profile.index') }}" class="d-flex align-items-center px-4 py-3 side-bar-link @if ($activePage == 'profile') active @endif">
                <svg width="19" height="18" viewBox="0 0 19 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="side-bar-link-icon me-3">
                    <path d="M9.42764 12.5312C12.1741 12.5312 14.5764 13.6469 15.8829 15.3115L14.5014 15.9284C13.4379 14.7384 11.5629 13.9479 9.42764 13.9479C7.29239 13.9479 5.41739 14.7384 4.35389 15.9284L2.97314 15.3107C4.27964 13.6462 6.68114 12.5312 9.42764 12.5312ZM9.42764 1.90625C10.4222 1.90625 11.376 2.27939 12.0793 2.94358C12.7826 3.60777 13.1776 4.50861 13.1776 5.44792V7.57292C13.1776 8.48558 12.8045 9.36299 12.1362 10.0222C11.4678 10.6814 10.5558 11.0714 9.59039 11.111L9.42764 11.1146C8.43308 11.1146 7.47926 10.7414 6.77599 10.0773C6.07273 9.41306 5.67764 8.51222 5.67764 7.57292V5.44792C5.6777 4.53526 6.0508 3.65784 6.71914 2.99866C7.38748 2.33947 8.29946 1.9494 9.26489 1.90979L9.42764 1.90625ZM9.42764 3.32292C8.85374 3.32289 8.30151 3.52998 7.88395 3.90183C7.46639 4.27367 7.21506 4.78216 7.18139 5.32325L7.17764 5.44792V7.57292C7.17708 8.12606 7.40491 8.65761 7.81272 9.05462C8.22054 9.45163 8.77619 9.68282 9.36162 9.69905C9.94704 9.71528 10.5161 9.51528 10.9479 9.14155C11.3796 8.76781 11.6401 8.2498 11.6739 7.69758L11.6776 7.57292V5.44792C11.6776 4.88433 11.4406 4.34383 11.0186 3.94531C10.5967 3.5468 10.0244 3.32292 9.42764 3.32292Z" fill="currentColor"/>
                </svg>
                <span class="side-bar-link-text">Profile</span>
            </a>
            <a href="{{ route('booking.myBookings') }}" class="d-flex align-items-center px-4 py-3 side-bar-link @if ($activePage == 'my_bookings') active @endif">
                <svg width="18" height="18" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="side-bar-link-icon me-3">
                    <path d="M15.3027 13.4701H4.67773C4.28654 13.4701 3.9694 13.7872 3.9694 14.1784C3.9694 14.5696 4.28654 14.8867 4.67773 14.8867H15.3027V16.3034H4.67773C3.50413 16.3034 2.55273 15.352 2.55273 14.1784V3.55339C2.55273 2.77098 3.187 2.13672 3.9694 2.13672H15.3027V13.4701ZM3.9694 12.0888C4.08384 12.0656 4.20228 12.0534 4.32357 12.0534H13.8861V3.55339H3.9694V12.0888ZM11.7611 7.09505H6.0944V5.67839H11.7611V7.09505Z" fill="currentColor"/>
                </svg>
                <span class="side-bar-link-text">My Bookings</span>
            </a>
        </div>
        <div class="mt-auto">
            <a href="{{ route('booking.create', 1) }}" class="side-bar-new-booking-btn my-4 mx-4">New Booking <i class="fas fa-arrow-right side-bar-new-booking-btn-arrow"></i></a>
        </div>
    </div>
    <div class="card-footer side-bar-card-footer border-1 px-0 py-0">
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="d-flex align-items-center px-4 py-3 side-bar-logout-link" style="border: none; background: none; width: 100%; text-align: left;">
                <svg width="17" height="18" viewBox="0 0 17 18" fill="none" xmlns="http://www.w3.org/2000/svg" class="side-bar-link-logout-icon me-3">
                    <path d="M2.83325 13.4427H4.24992V14.8594H12.7499V3.52604H4.24992V4.94271H2.83325V2.81771C2.83325 2.42651 3.15039 2.10938 3.54159 2.10938H13.4583C13.8495 2.10938 14.1666 2.42651 14.1666 2.81771V15.5677C14.1666 15.9589 13.8495 16.276 13.4583 16.276H3.54159C3.15039 16.276 2.83325 15.9589 2.83325 15.5677V13.4427ZM4.24992 8.48438H9.20825V9.90104H4.24992V12.026L0.708252 9.19271L4.24992 6.35938V8.48438Z" fill="#E65555"/>
                </svg>
                <span class="side-bar-link-logout-text">Log Out</span>
            </button>
        </form>
    </div>
</div>
