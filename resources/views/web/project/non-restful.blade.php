@extends('shared.layouts.app')

@section('sidebar')
@include('web.layouts.non-restful._sidebar-project')
@endsection

@section('content')
<div class="row">
    <div class="col-11 mx-auto">
        <div class="card">
            <div class="row no-gutters">
                <div class="col-auto d-flex mx-auto">
                    <img src="{{ $project->image->url ?? asset("images/languages/{$project->language->icon}.svg") }}"
                        alt="{{ $project->image->name ?? $project->language->name }}" class="p-1 align-self-center"
                        width="150px">
                </div>
                <div class="col-md col-sm-12">
                    <div class="card-block p-2">
                        <p class="card-text text-justify">{{ $project->description }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-11 mx-auto">
        <div class="card">
            <div class="card-header">
                <h4>{{ __('attributes.classes') }}</h4>
            </div>
            <div class="card-body">
                @datatable([
                    'url' => route('projects.classes.datatable', $project),
                    'columns' => [
                        ['name' => 'name'],
                        ['name' => 'description']
                    ],
                    'actions' => [
                        'label' => __('attributes.options'),
                        'links' => [
                            [
                                'title' => __('attributes.show'),
                                'url' => route('projects.classes.show', [$project, '(id)']),
                                'icon' => 'fa-search'
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
