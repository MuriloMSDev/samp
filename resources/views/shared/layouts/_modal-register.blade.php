<div class="modal fade" id="register-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Register') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="{{ route('user.register', '#register-modal') }}">
                <div class="modal-body">
                    @csrf

                    <div class="input-group mb-3">
                        <input id="register-name" type="text" name="register_name"
                            class="form-control @error('register_name') is-invalid @enderror"
                            placeholder="{{ __('Name') }}" value="{{ old('register_name') }}" required
                            autocomplete="name" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>

                        @error('register_name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="register-email" type="email" name="register_email"
                            class="form-control @error('register_email') is-invalid @enderror"
                            placeholder="{{ __('E-Mail Address') }}" value="{{ old('register_email') }}" required
                            autocomplete="email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                        @error('register_email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="register-password" type="password" name="register_password"
                            class="form-control @error('register_password') is-invalid @enderror"
                            placeholder="{{ __('Password') }}" required autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                        @error('register_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group mb-3">
                        <input id="register-password-confirm" type="password" name="register_password_confirmation"
                            class="form-control @error('register_password_confirmation') is-invalid @enderror"
                            placeholder="{{ __('Confirm Password') }}" required autocomplete="new-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                        @error('register_password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-4">
                            <button type="submit"
                                class="btn btn-primary btn-block btn-flat">{{ __('Register') }}</button>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="text-center mb-3">
                            <p>- OU -</p>
                            <button type="button" class="btn btn-block btn-success" data-toggle="modal"
                                data-dismiss="modal" data-target="#login-modal">
                                {{ __('Login') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
