<nav class="navbar navbar-expand-lg navbar-light bg-white px-0 py-0 min-vh-20">
    <div class="d-flex w-100 justify-content-between align-items-center m-0 p-0">
      <div class="d-flex align-items-center ps-4">
        <span class="kumana-brand">Kumana Insights</span>
        <span class="ms-2 text-secondary sri-lanka-label">Sri Lanka</span>
        <span class="vertical-divider mx-3"></span>
        <a href="/" class="text-dark text-decoration-none homepage-link">Go to homepage</a>
      </div>

      @auth
        <div class="kumana-user-box d-flex flex-row align-items-stretch justify-content-between me-0 pe-0">
          <div class="kumana-user-text d-flex flex-column justify-content-center">
            <span class="welcome-back">Welcome Back,</span>
            <span class="user-name">{{ Auth::user()->name }}</span>
          </div>
          <div class="kumana-user-icon d-flex align-items-center justify-content-end ms-3">
            <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2" class="user-icon">
              <path stroke-linecap="round" stroke-linejoin="round" d="M5.121 17.804A9 9 0 1112 21a8.963 8.963 0 01-6.879-3.196z" />
              <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
            </svg>
          </div>
        </div>
      @endauth
    </div>
  </nav>

  <style>
    /* Custom vertical divider for the navbar */
    .navbar .vertical-divider {
      border-left: 2px solid #e0bfae;
      height: 28px;
      margin: 0 1rem;
    }
  </style>