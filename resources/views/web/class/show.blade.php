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
    @include('web.layouts._parameters', ['entity' => $class])
    @include('web.layouts._examples', ['entity' => $class])
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
