@extends('shared.layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">{{ __('Reset Password') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('user.password.update') }}">
                    @csrf

                    <input type="hidden" name="reset_token" value="{{ $token }}">

                    <div class="input-group mb-3">
                        <input id="password-reset-email" type="email" name="reset_email"
                            class="form-control @error('reset_email') is-invalid @enderror"
                            placeholder="{{ __('E-Mail Address') }}" value="{{ $email ?? old('reset_email') }}" required
                            autocomplete="email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                        @error('reset_email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input id="password-reset-password" type="password" name="reset_password"
                            class="form-control @error('reset_password') is-invalid @enderror"
                            placeholder="{{ __('Password') }}" required autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                        @error('reset_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="input-group mb-3">
                        <input id="password-reset-password-confirm" type="password" name="reset_password_confirmation"
                            class="form-control @error('reset_password_confirmation') is-invalid @enderror"
                            placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                        @error('reset_password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">
                                {{ __('Reset Password') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
