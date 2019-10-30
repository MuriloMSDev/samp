@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        @datatable([
            'url' => route('admin.projects.datatable'),
            'per_page' => 15,
            'columns' => [
                ['name' => 'name'],
                ['name' => 'type'],
                [
                    'name' => 'name',
                    'relation' => 'user',
                    'label' => __('attributes.user')
                ]
            ],
            'actions' => [
                'label' => __('attributes.options'),
                'links' => [
                    [
                        'title' => __('attributes.show'),
                        'url' => route('projects.show', '(id)'),
                        'icon' => 'fa-search'
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
    </div>
</div>
@endsection
