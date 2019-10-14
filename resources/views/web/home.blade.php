@extends('shared.layouts.app')

@section('content')
<div class="row">
    <div class="col-12 col-sm-10 col-lg-8 offset-sm-1 offset-lg-2">
        @foreach ($projects as $project)
        <div class="card">
            <a href="{{ route('projects.show', $project)}}" class="card-link text-dark">
                <div class="row no-gutters">
                    <div class="col-auto d-flex mx-auto">
                        <img src="{{ $project->image->url ?? asset("images/languages/{$project->language->icon}.svg") }}"
                            alt="{{ $project->image->name ?? $project->language->name }}" class="p-1 align-self-center" width="150px">
                    </div>
                    <div class="col-md col-sm-12">
                        <div class="card-block p-2">
                            <h3 class="card-title text-lg">{{ $project->name }}</h3>
                            <small class="card-subtitle ml-1">{{ $project->language->name }}</small>
                            <p class="card-text text-justify ellipse-text">{{ $project->description }}</p>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        @endforeach

        {{ $projects->links() }}
    </div>
</div>
@endsection
