@extends('layouts.guest')

<style>
    .light-background {
        background: var(--Colors-Crystal-Lining-200, rgba(225, 236, 250, 1)) !important;
    }

    .shadow-effect {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .login-title {
        color: #126323;
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 20px;
    }

    .login-sub-title {
        color: rgba(79, 172, 134, 1);
        font-weight: 600;
        font-size: 1.1rem;
    }

    .login-description {
        color: #2e6348;
        font-weight: 600;
        margin-top: 10px;
        font-size: 1rem;
    }

    .btn-login {
        background-color: #2e6348 !important;
        color: white;
        font-weight: 700;
        border-radius: 5px;
        padding: 12px;
        transition: all 0.3s ease;
    }

    .btn-login:hover {
        background-color: #2e6348;
        transform: translateY(-2px);
    }

    .form-label {
        font-size: 1rem;
        font-weight: 500;
        color: #333;
    }

    .form-control {
        border-radius: 8px;
        padding: 12px;
        font-size: 1rem;
    }

    .alert-danger {
        border-radius: 8px;
        padding: 10px;
    }
    .btn-primary {
        border-color: #2e6348 !important;
    }
</style>

@section('content')
    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="row w-100 justify-content-center">

            <!-- Form Section -->
            <div class="col-lg-5 col-md-8 col-sm-10 p-5 shadow-effect rounded light-background">

                <div class="text-center mb-5">
                    <img src="{{ asset('assets/img/logo.png') }}" alt="Logo" style="max-width: 150px; border-radius: 50%;">
                </div>

                <h3 class="text-center mb-4 login-title">Sign In</h3>


                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Enter email" required>
                        @error('username')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter Password" required>
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100 btn-login p-2 mt-3">Sign In</button>
                </form>
            </div>

        </div>
    </div>
@endsection
