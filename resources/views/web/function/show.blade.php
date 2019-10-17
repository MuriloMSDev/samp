@extends('shared.layouts.app')

@section('content')
<div class="row">
    <div class="col-11 mx-auto">
        <h3>{{ __('attributes.class') . ": $class->name" }}</h3>
    </div>
    <div class="col-11 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>
                    {{ __('attributes.function') . ($function->type ? " {$function->type}" : '') . ": $function->name" . $function->renderParameters() }}
                </h3>
            </div>
            @if ($function->description)
            <div class="card-body">
                <p class="card-text text-justify">
                    @markdown($function->description)
                </p>
            </div>
            @endif
        </div>
    </div>
    @include('web.layouts._parameters', ['entity' => $function])
    @if ($function->return)
    <div class="col-11 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>{{ __('attributes.return') }}</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('attributes.name') }}</th>
                            <th>{{ __('attributes.type') }}</th>
                            <th>{{ __('attributes.description') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>{{ $function->return->name }}</td>
                            <td>{{ $function->return->type }}</td>
                            <td>
                                @markdown($function->return->description)
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
    @if ($function->content)
    <div class="col-11 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>{{ __('attributes.code') }}</h3>
            </div>
            <div class="card-body">
                <pre>
                    <code>{{ $function->content }}</code>
                </pre>
            </div>
        </div>
    </div>
    @endif
    @include('web.layouts._examples', ['entity' => $function])
    @if ($function->comments->count() || user())
        @include('web.function.partials._comments')
    @endif
</div>
@endsection
