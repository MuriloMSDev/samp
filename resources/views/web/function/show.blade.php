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
    @if ($function->parameters->count())
    <div class="col-11 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>{{ __('attributes.parameters') }}</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('attributes.name') }}</th>
                            <th>{{ __('attributes.type') }}</th>
                            <th>{{ __('attributes.optional') }}</th>
                            <th>{{ __('attributes.description') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($function->parameters as $parameter)
                        <tr>
                            <td>{{ $parameter->name }}</td>
                            <td>{{ $parameter->type }}</td>
                            <td>
                                {{ __("attributes.boolean.{$parameter->optional}") }}
                            </td>
                            <td>
                                @markdown($parameter->description)
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
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
    @if ($function->examples->count())
    <div class="col-11 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>{{ __('attributes.examples') }}</h3>
            </div>
            <div class="card-body">
                @foreach ($function->examples as $example)
                <pre>
                    <code>{{ $example->content }}</code>
                </pre>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</div>
@endsection
