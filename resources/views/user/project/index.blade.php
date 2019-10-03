@extends('shared.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        @datatable([
            'url' => route('user.projects.datatable'),
            'columns' => [
                ['name'=>'name']
            ],
            'actions' => [
                'label' => __('attributes.options'),
                'links' => [
                    [
                        'title' => __('attributes.show'),
                        'url' => route('projects.show', '(id)'),
                        'icon' => 'fa-search'
                    ],
                    [
                        'title' => __('attributes.edit'),
                        'url' => route('user.projects.edit', '(id)'),
                        'icon' => 'fa-edit'
                    ]
                ],
                'width' => '90px',
                'class' => 'text-center'
            ]
        ])@enddatatable
    </div>

    <div class="card-footer">
        <a href="{{ url()->previous() }}" class="btn btn-secondary float-left">
            <i class="fas fa-arrow-left"></i> {{ __('attributes.back') }}
        </a>

        <a href="{{ route('user.projects.create') }}" class="btn btn-success float-right">
            <i class="fas fa-plus"></i> {{ __('attributes.project_new') }}
        </a>
    </div>
</div>
@endsection
