@extends('admin.layouts.app')

@section('content')
<div class="card">
    <div class="card-body">
        @datatable([
            'url' => route('admin.users.datatable'),
            'per_page' => 10,
            'columns' => [
                ['name' => 'name'],
                ['name' => 'email']
            ],
            'actions' => [
                'label' => __('attributes.options'),
                'links' => [
                    [
                        'title' => __('attributes.edit'),
                        'url' => route('admin.users.edit', '(id)'),
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
    </div>
</div>
@endsection
