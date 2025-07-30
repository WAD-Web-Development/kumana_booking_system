<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content login-modal-content">
        <div class="modal-body login-modal-body px-3 pt-3 pb-4">

            <h5 class="modal-title login-modal-title mb-3" id="loginModalLabel">Sign in</h5>

            <p class="login-modal-description mb-4">
                Sign in or create your account to place bookings and receive notifications and updates
            </p>

            <form method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-floating login-modal-form-floating mb-3">
                  <input type="email" class="form-control login-modal-form-floating-input" id="email" name="email" placeholder="Email address" required>
                  <label class="login-modal-form-floating-label" for="email">Email address</label>
                </div>

                <div class="form-floating login-modal-form-floating mb-3">
                  <input type="password" class="form-control login-modal-form-floating-input" id="password" name="password" placeholder="Password" required>
                  <label class="login-modal-form-floating-label" for="password">Password</label>
                </div>

                <button type="submit" class="login-modal-btn px-3 py-3 d-flex justify-content-between align-items-center">
                    <span>Login</span>
                    <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.74319 5.86088L5.83468 1.95235L6.86514 0.921875L12.5328 6.58953L6.86514 12.2571L5.83468 11.2266L9.74319 7.31819H0.874268V5.86088H9.74319Z" fill="white"/>
                    </svg>
                </button>
            </form>

        </div>
        <div class="modal-footer login-modal-footer px-3 pt-3 pb-4">
            <div class="d-flex flex-column align-items-start">
                <span class="login-modal-footer-label">Don't have an account yet ?</span>
                <span class="login-modal-footer-label-link d-flex align-items-center gap-2">Sign up here <svg width="10" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M7.0718 4.11771L4.21199 1.25789L4.96596 0.503906L9.11291 4.65086L4.96596 8.79774L4.21199 8.04377L7.0718 5.18401H0.58252V4.11771H7.0718Z" fill="white"/>
                    </svg>
                </span>
            </div>
        </div>

      </div>
    </div>
  </div>
