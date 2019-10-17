@extends('shared.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>{{ __('attributes.my_account_edit') }}</h3>
    </div>

    {!! Form::model($admin, [
        'route'  => ['admin.account.update'],
        'method' => 'PUT'
    ]) !!}

    <div class="card-body">
        @include('admin.account.partials._form')
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
