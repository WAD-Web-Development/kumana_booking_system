<nav class="d-flex justify-content-between align-items-center px-0 py-0 custom-navbar">
    <!-- Left Section -->
    <div class="d-flex align-items-center gap-3">
        <a href="/" class="text-decoration-none d-flex align-items-baseline">
            <h4 class="navbar-kumana-title ms-4">Kumana Insights</h4>
            <span class="navbar-kumana-subtitle ms-2">Sri Lanka</span>
        </a>

        <div class="vr mx-3 vertical-divider"></div>

        <a href="/" class="navbar-home-link">Go to homepage</a>
    </div>

    <!-- Right Section -->
    @auth
        <div class="navbar-user-box d-flex justify-content-between align-items-center p-2">
            <div class="mx-2">
                <div class="navbar-user-welcome">Welcome Back,</div>
                <div class="navbar-user-name">{{ Auth::user()->name }}</div>
            </div>
            <i class="far fa-user navbar-user-icon mx-2"></i>
        </div>
    @else
        <div class="navbar-user-box d-flex justify-content-between align-items-center p-2">
            <div class="mx-2">
                <div class="navbar-login-btn" data-bs-toggle="modal" data-bs-target="#loginModal">Login</div>
            </div>
            <i class="far fa-user navbar-user-icon mx-2"></i>
        </div>
    @endauth
</nav>
