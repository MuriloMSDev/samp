@if (!user())
    @include('shared.layouts._modal-login')
    @include('shared.layouts._modal-register')
    @include('shared.layouts._modal-password-email')
@endif
