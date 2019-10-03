@extends('shared.layouts.app')

@section('content')
<div class="card">
    <div class="card-header">
        <h3>{{ __('attributes.project_new') }}</h3>
    </div>

    {!! Form::open([
        'route' => 'user.projects.store',
        'files' => true
    ]) !!}

    <div class="card-body">
        @include('user.project.partials._form')
    </div>

    <div class="card-footer">
        <a href="{{ url()->previous() }}" class="btn btn-secondary float-left">
            <i class="fas fa-arrow-left"></i> {{ __('attributes.back') }}
        </a>

        <button type="submit" class="btn btn-success float-right">
            <i class="fas fa-save"></i> {{ __('attributes.save') }}
        </button>
    </div>

    {!! Form::close() !!}
</div>
@endsection
