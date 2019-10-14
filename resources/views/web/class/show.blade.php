@extends('shared.layouts.app')

@section('content')
<div class="row">
    <div class="col-11 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>{{ __('attributes.class') . ": $class->name" . $class->renderParameters() }}</h3>
            </div>
            @if ($class->description)
            <div class="card-body">
                <p class="card-text text-justify">
                    @markdown($class->description)
                </p>
            </div>
            @endif
        </div>
    </div>
    @if ($class->parameters->count())
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
                        @foreach ($class->parameters as $parameter)
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
    @if ($class->examples->count())
    <div class="col-11 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>{{ __('attributes.examples') }}</h3>
            </div>
            <div class="card-body">
                @foreach ($class->examples as $example)
                <pre>
                    <code>{{ $example->content }}</code>
                </pre>
                @endforeach
            </div>
        </div>
    </div>
    @endif
    <div class="col-11 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4>{{ __('attributes.functions') }}</h4>
            </div>
            <div class="card-body">
                @datatable([
                    'url'     => route('projects.classes.functions.datatable', [$project, $class]),
                    'columns' => [
                        ['name' => 'name'],
                        ['name' => 'description']
                    ],
                    'actions' => [
                        'label' => __('attributes.options'),
                        'links' => [
                            [
                                'title' => __('attributes.show'),
                                'url'   => route('projects.classes.functions.show', [$project, $class, '(id)']),
                                'icon'  => 'fa-search'
                            ]
                        ],
                        'width' => '90px',
                        'class' => 'text-center'
                    ]
                ])@enddatatable
            </div>
        </div>
    </div>
</div>
@endsection
