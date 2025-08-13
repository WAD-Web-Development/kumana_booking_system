<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
      <div class="modal-content login-modal-content">

        <div id="login-section" class="login-registration-fade-slide-transition show">
            <div class="modal-body login-modal-body px-3 pt-3 pb-4">

                <h5 class="modal-title login-modal-title mb-3" id="loginModalLabel">Sign in</h5>

                <p class="login-modal-description mb-4">
                    Sign in or create your account to place bookings and receive notifications and updates
                </p>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <input type="hidden" name="form_type" value="login">

                    <div class="form-floating login-modal-form-floating">
                        <input type="email" class="form-control login-modal-form-floating-input" id="email" name="email" placeholder="Email address" required>
                        <label class="login-modal-form-floating-label" for="email">Email address</label>
                    </div>
                    @error('email')
                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                            </svg>
                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                        </div>
                    @enderror

                    <div class="form-floating login-modal-form-floating mt-3">
                        <input type="password" class="form-control login-modal-form-floating-input" id="password" name="password" placeholder="Password" required>
                        <label class="login-modal-form-floating-label" for="password">Password</label>
                    </div>
                    @error('password')
                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                            </svg>
                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                        </div>
                    @enderror

                    <div class="d-flex justify-content-between align-items-center mt-3 mb-4">
                        <div class="form-check d-flex align-items-center gap-2 mb-0">
                            <input class="form-check-input rounded-circle login-modal-checkbox" type="checkbox" value="1" id="remember" name="remember">
                            <label class="form-check-label login-modal-checkbox-label mb-0" for="remember">Remember me</label>
                        </div>
                        <a href="{{ route('password.request') }}" class="login-modal-forgot-password-link">Forgot Password</a>
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
        <div id="register-section" style="display: none;" class="login-registration-fade-slide-transition">
            <div class="modal-body register-modal-body px-3 pt-3 pb-4">

                <h5 class="modal-title register-modal-title mb-3" id="registerModalLabel">Create an account</h5>

                <p class="register-modal-description mb-4">
                    Sign in or create your account to place bookings and receive notifications and updates
                </p>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <input type="hidden" name="form_type" value="register">

                    <div class="form-floating register-modal-form-floating">
                        <input type="email" class="form-control register-modal-form-floating-input" id="register-email" name="register_email" placeholder="Email address" required>
                        <label class="register-modal-form-floating-label" for="register-email">Email address</label>
                    </div>
                    @error('register_email')
                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                            </svg>
                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                        </div>
                    @enderror

                    <div class="form-floating register-modal-form-floating mt-3">
                        <input type="text" class="form-control register-modal-form-floating-input" id="name" name="name" placeholder="Name" required>
                        <label class="register-modal-form-floating-label" for="name">Your Name</label>
                    </div>
                    @error('name')
                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                            </svg>
                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                        </div>
                    @enderror

                    <div class="form-floating register-modal-form-floating mt-3">
                        <select class="form-select register-modal-form-floating-input" id="nationality" name="nationality" required>
                            <option value="">Select Nationality </option>
                            @foreach($nationalities as $nationality)
                                <option value="{{ $nationality->name }}" {{ old('nationality') == $nationality->name ? 'selected' : '' }}>
                                    {{ $nationality->name }}
                                </option>
                            @endforeach
                        </select>
                        <label class="register-modal-form-floating-label" for="nationality">Nationality</label>
                    </div>
                    @error('nationality')
                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                            </svg>
                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                        </div>
                    @enderror

                    <div class="form-floating register-modal-form-floating mt-3">
                        <input type="text" class="form-control register-modal-form-floating-input" id="contact_no" name="contact_no" placeholder="Contact details" required>
                        <label class="register-modal-form-floating-label" for="contact_details">Contact details</label>
                    </div>
                    @error('contact_no')
                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                            </svg>
                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                        </div>
                    @enderror

                    <div class="form-floating login-modal-form-floating mt-3">
                        <input type="password" class="form-control login-modal-form-floating-input" id="register-password" name="register_password" placeholder="Password" required>
                        <label class="login-modal-form-floating-label" for="register-password">Password</label>
                    </div>
                    @error('register_password')
                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                            </svg>
                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                        </div>
                    @enderror

                    <div class="form-floating login-modal-form-floating mt-3">
                        <input type="password" class="form-control login-modal-form-floating-input" id="password_confirmation" name="password_confirmation" placeholder="Confirm password" required>
                        <label class="login-modal-form-floating-label" for="password_confirmation">Retype your Password</label>
                    </div>
                    @error('password_confirmation')
                        <div class="invalid-feedback d-flex align-items-center mt-1 px-3 py-2" role="alert">
                            <svg width="21" height="21" viewBox="0 0 21 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M10.042 18.6715C5.43958 18.6715 1.70862 14.9405 1.70862 10.3382C1.70862 5.73584 5.43958 2.00488 10.042 2.00488C14.6443 2.00488 18.3753 5.73584 18.3753 10.3382C18.3753 14.9405 14.6443 18.6715 10.042 18.6715ZM9.20862 12.8382V14.5049H10.8753V12.8382H9.20862ZM9.20862 6.17155V11.1715H10.8753V6.17155H9.20862Z" fill="white"/>
                            </svg>
                            <span class="invalid-feedback-text mx-2">{{ $message }}</span>
                        </div>
                    @enderror

                    <div class="text-center mt-4 mb-3">
                        <span class="register-modal-privacy-policy-label">
                            By creating an account you agree to our
                            <a href="#" class="register-modal-privacy-policy-link">privacy policy</a>
                        </span>
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
        $('#nationality').select2({
            placeholder: 'Select Nationality',
        });
    </script>

    @if ($errors->any())
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const loginModal = new bootstrap.Modal(document.getElementById('loginModal'));
            loginModal.show();

            const loginSection = document.getElementById('login-section');
            const registerSection = document.getElementById('register-section');
            const showRegister = document.getElementById('show-register');
            const showLogin = document.getElementById('show-login');

            @if (old('form_type') === 'register')
                loginSection.classList.remove('show');
                loginSection.style.display = 'none';
                registerSection.style.display = 'block';
                setTimeout(() => registerSection.classList.add('show'), 10);

                showLogin.style.display = 'inline-flex';
                showRegister.style.display = 'none';
            @else
                registerSection.classList.remove('show');
                registerSection.style.display = 'none';
                loginSection.style.display = 'block';
                setTimeout(() => loginSection.classList.add('show'), 10);

                showRegister.style.display = 'inline-flex';
                showLogin.style.display = 'none';
            @endif
        });
    </script>
    @endif


    <script>
        const showRegister = document.getElementById('show-register');
        const showLogin = document.getElementById('show-login');
        const loginSection = document.getElementById('login-section');
        const registerSection = document.getElementById('register-section');

        function switchSection(hideEl, showEl) {
        hideEl.classList.remove('show');
        setTimeout(() => {
            hideEl.style.display = 'none';
            showEl.style.display = 'block';
            setTimeout(() => {
            showEl.classList.add('show');
            }, 10); // allow DOM to paint before applying class
        }, 400); // match transition time
        }

        showRegister.addEventListener('click', function () {
        switchSection(loginSection, registerSection);
        showRegister.style.display = 'none';
        showLogin.style.display = 'inline-flex';
        });

        showLogin.addEventListener('click', function () {
        switchSection(registerSection, loginSection);
        showLogin.style.display = 'none';
        showRegister.style.display = 'inline-flex';
        });
    </script>

