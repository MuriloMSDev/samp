@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>{{ __('attributes.user_edit') }}</h3>
    </div>

    {!! Form::model($user, [
        'route'  => ['admin.users.update', $user],
        'method' => 'PUT'
    ]) !!}

    <div class="card-body">
        @include('admin.user.partials._form')
    </div>

    <div class="card-footer">
        <a href="{{ url()->previous() }}" class="btn btn-secondary float-left">
            <i class="fas fa-arrow-left"></i> {{ __('attributes.back') }}
        </a>

        <button type="submit" class="btn btn-primary float-right">
            <i class="fas fa-save"></i> {{ __('attributes.update') }}
        </button>
    </div>

    {!! Form::close() !!}
</div>
@endsection
