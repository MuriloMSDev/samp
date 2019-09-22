@extends('admin.layouts.auth')

@section('content')
<div class="card">
    <div class="card-body">
        <form action="{{ route('admin.password.email') }}" method="POST">
            @csrf

            <div class="input-group mb-3">
                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                    placeholder="{{ __('E-Mail Address') }}" name="email" value="{{ old('email') }}" required
                    autocomplete="email" autofocus>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope"></span>
                    </div>
                </div>

                @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="row justify-content-end">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary btn-block btn-flat">
                        {{ __('Send Password Reset Link') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
