<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content login-modal-content">

        <div id="login-section">
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
                <div class="d-flex flex-column align-items-start login-modal-footer-link">
                    <span class="login-modal-footer-label">Don't have an account yet ?</span>
                    <span class="login-modal-footer-label-link d-flex align-items-center gap-2" id="show-register">Sign up here <svg width="10" height="9" viewBox="0 0 10 9" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M7.0718 4.11771L4.21199 1.25789L4.96596 0.503906L9.11291 4.65086L4.96596 8.79774L4.21199 8.04377L7.0718 5.18401H0.58252V4.11771H7.0718Z" fill="white"/>
                        </svg>
                    </span>
                </div>
            </div>
        </div>
        <div id="register-section" style="display: none;">
            <div class="modal-body register-modal-body px-3 pt-3 pb-4">

                <h5 class="modal-title register-modal-title mb-3" id="registerModalLabel">Create an account</h5>

                <p class="register-modal-description mb-4">
                    Sign in or create your account to place bookings and receive notifications and updates
                </p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <div class="form-floating register-modal-form-floating mb-3">
                        <input type="email" class="form-control register-modal-form-floating-input" id="email" name="email" placeholder="Email address" required>
                        <label class="register-modal-form-floating-label" for="email">Email address</label>
                    </div>

                    <div class="form-floating register-modal-form-floating mb-3">
                        <input type="text" class="form-control register-modal-form-floating-input" id="name" name="name" placeholder="Name" required>
                        <label class="register-modal-form-floating-label" for="name">Your Name</label>
                    </div>

                    <div class="form-floating register-modal-form-floating mb-3">
                        <select class="form-select register-modal-form-floating-input" id="nationality" name="nationality" required>
                            <option value="" selected disabled>Select your nationality</option>
                            <option value="Sri Lankan">Sri Lankan</option>
                            <option value="Indian">Indian</option>
                            <option value="American">American</option>
                            <option value="British">British</option>
                            <option value="Australian">Australian</option>
                            <!-- Add more as needed -->
                        </select>
                        <label class="register-modal-form-floating-label" for="nationality">Nationality</label>
                    </div>

                    <div class="form-floating register-modal-form-floating mb-3">
                        <input type="text" class="form-control register-modal-form-floating-input" id="contact_details" name="contact_details" placeholder="Contact details" required>
                        <label class="register-modal-form-floating-label" for="contact_details">Contact details</label>
                    </div>

                    <div class="form-floating login-modal-form-floating mb-3">
                        <input type="password" class="form-control login-modal-form-floating-input" id="password" name="password" placeholder="Password" required>
                        <label class="login-modal-form-floating-label" for="password">Password</label>
                    </div>

                    <div class="form-floating login-modal-form-floating mb-3">
                        <input type="password" class="form-control login-modal-form-floating-input" id="confirm_password" name="confirm_password" placeholder="Confirm password" required>
                        <label class="login-modal-form-floating-label" for="confirm_password">Retype your Password</label>
                    </div>



                    <button type="submit" class="register-modal-btn px-3 py-3 d-flex justify-content-between align-items-center">
                        <span>Create account</span>
                        <svg width="13" height="13" viewBox="0 0 13 13" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M9.74319 5.86088L5.83468 1.95235L6.86514 0.921875L12.5328 6.58953L6.86514 12.2571L5.83468 11.2266L9.74319 7.31819H0.874268V5.86088H9.74319Z" fill="white"/>
                        </svg>
                    </button>
                </form>

            </div>
            <div class="modal-footer register-modal-footer px-3 pt-3 pb-4">
                <div class="d-flex justify-content-center align-items-center gap-2 register-modal-footer-link" id="show-login">
                    <span class="register-modal-footer-label">I already have an account, go to sign in</span>
                    <svg width="9" height="10" viewBox="0 0 9 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M6.96096 4.47708L4.10115 1.61727L4.85512 0.863281L9.00207 5.01023L4.85512 9.15712L4.10115 8.40314L6.96096 5.54338H0.47168V4.47708H6.96096Z" fill="white"/>
                    </svg>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>

  <script>
    const showRegister = document.getElementById('show-register');
    const showLogin = document.getElementById('show-login');
    const loginSection = document.getElementById('login-section');
    const registerSection = document.getElementById('register-section');

    showRegister.addEventListener('click', function () {
      loginSection.style.display = 'none';
      registerSection.style.display = 'block';
      showRegister.style.display = 'none';
      showLogin.style.display = 'inline-flex';
    });

    showLogin.addEventListener('click', function () {
      registerSection.style.display = 'none';
      loginSection.style.display = 'block';
      showLogin.style.display = 'none';
      showRegister.style.display = 'inline-flex';
    });
  </script>

