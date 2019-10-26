@inject('projectType', 'App\Enums\ProjectType')

<li class="nav-header">{{ __('attributes.project_types') }}</li>
<div class="nav-divider"></div>
@foreach ($projectType::getValues() as $type)
<li class="nav-item">
    <a href="{{ route('projects.index', search_params(['project_type' => $type])) }}"
        class="nav-link {{ route_class('projects.index', ['project_type' => $type]) }}">
        <i class="nav-icon fas {{ $projectType::getIcon($type) }}"></i>
        <p>{{ $projectType::getDescription($type) }}</p>
    </a>
</li>
@endforeach
