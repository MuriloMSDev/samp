<div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Login') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="{{ route('user.login', '#login-modal') }}">
                <div class="modal-body">
                    @csrf

                    <div class="input-group mb-3">
                        <input id="login-email" type="email" name="login_email"
                            class="form-control @error('login_email') is-invalid @enderror"
                            placeholder="{{ __('E-Mail Address') }}" value="{{ old('login_email') }}" required
                            autocomplete="email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                        @error('login_email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-group">
                        <input id="login-password" type="password" name="login_password"
                            class="form-control @error('login_password') is-invalid @enderror"
                            placeholder="{{ __('Password') }}" required autocomplete="current-password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>

                        @error('login_password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="mb-3 mt-1">
                        <button type="button" class="btn btn-link p-0" data-toggle="modal" data-dismiss="modal"
                            data-target="#password-email-modal">
                            {{ __('Forgot Your Password?') }}
                        </button>
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <div class="icheck-primary">
                                <input type="checkbox" name="login_remember" id="login-remember"
                                    {{ old('login_remember') ? 'checked' : '' }}>
                                <label for="login-remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Login') }}</button>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="text-center mb-3">
                            <p>- OU -</p>
                            <button type="button" class="btn btn-block btn-success" data-toggle="modal"
                                data-dismiss="modal" data-target="#register-modal">
                                {{ __('Register') }}
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
