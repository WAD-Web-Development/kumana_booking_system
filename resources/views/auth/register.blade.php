<x-guest-layout>
    <x-authentication-card>
        <x-slot name="logo">
            <x-authentication-card-logo />
        </x-slot>

        <x-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <x-label for="name" value="{{ __('Name') }}" />
                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-label for="email" value="{{ __('Email') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Password') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
                <x-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-label for="terms">
                        <div class="flex items-center">
                            <x-checkbox name="terms" id="terms" required />

                            <div class="ms-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ms-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>



@extends('layouts.guest')

<style>
    .light-background {
        background: var(--Colors-Crystal-Lining-200, rgba(225, 236, 250, 1)) !important;
    }

    .shadow-effect {
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    }

    .register-title {
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
                    <img src="{{ asset('assets/img/logo.jpg') }}" alt="Logo" style="max-width: 150px; border-radius: 50%;">
                </div>

                <h3 class="text-center mb-4 guest-title">Sign Up</h3>

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Enter Name" required>
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Enter Email" required>
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Contact Number</label>
                        <input type="text" class="form-control @error('contact_no') is-invalid @enderror" name="contact_no" placeholder="Enter Contact Number" required>
                        @error('contact_no')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Nationality</label>
                        <select name="nationality" id="nationality" class="form-control @error('nationality') is-invalid @enderror" required>
                            <option value=""> Select Nationality </option>
                            @foreach($nationalities as $nationality)
                                <option value="{{ $nationality->name }}" {{ old('nationality') == $nationality->name ? 'selected' : '' }}>
                                    {{ $nationality->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('nationality')
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

                    <div class="mb-3">
                        <label class="form-label">Confirm Password</label>
                        <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation" placeholder="Enter Confirm Password" required>
                        @error('password_confirmation')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary w-100 btn-login p-2 mt-3">Sign Up</button>
                </form>
            </div>

        </div>
    </div>
@endsection

@push('custom_scripts')
    <script>
        $('#nationality').select2({
            placeholder: 'Select Nationality',
        });
    </script>
@endpush
