@extends('shared.layouts.app')

@section('sidebar')
@include('web.layouts.restful._sidebar-project')
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
        @foreach ($project->classes as $class)
        <div class="card" id="class-{{ $class->id }}">
            <div class="card-header">
                <h4><strong>{{ $class->name }}</strong> - {{ $class->description }}</h4>
            </div>
            <div class="card-body row">
                <div class="col-12">
                    @foreach ($class->functions as $function)
                    <div class="card" id="function-{{ $function->id }}">
                        <div class="card-header">
                            <h5><strong>{{ $function->name }}</strong> {!! method_badge($function->method) !!}</h5>
                        </div>
                        <div class="card-body">
                            <p>{{ $function->description }}</p>
                            <p>{{ __('attributes.url') }}: {{ $function->url }}</p>

                            @include('web.layouts.restful._variables', [
                                'title' => __('attributes.header'),
                                'entity' => $function->header
                            ])

                            @include('web.layouts.restful._variables', [
                                'title' => __('attributes.parameters'),
                                'entity' => $function->parameters
                            ])

                            @include('web.layouts.restful._variables', [
                                'title' => __('attributes.success_return'),
                                'entity' => $function->success
                            ])

                            @include('web.layouts.restful._variables', [
                                'title' => __('attributes.error_return'),
                                'entity' => $function->error
                            ])
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
