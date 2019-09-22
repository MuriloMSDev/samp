<div class="modal fade" id="password-email-modal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">{{ __('Reset Password') }}</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form method="POST" action="{{ route('user.password.email', '#password-email-modal') }}">
                <div class="modal-body">
                    @csrf

                    <div class="input-group mb-3">
                        <input id="password-email-email" type="email" name="request_reset_email"
                            class="form-control @error('request_reset_email') is-invalid @enderror"
                            placeholder="{{ __('E-Mail Address') }}" value="{{ old('request_reset_email') }}" required
                            autocomplete="email" autofocus>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>

                        @error('request_reset_email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row justify-content-end">
                        <div class="col-8">
                            <button type="submit" class="btn btn-primary btn-block btn-flat">{{ __('Send Password Reset Link') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
