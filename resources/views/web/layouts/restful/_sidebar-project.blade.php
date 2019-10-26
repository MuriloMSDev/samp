<li class="nav-header">{{ __('attributes.project') }}: {{ $project->name }}</li>
<div class="nav-divider"></div>
@foreach ($project->classes as $class)
<li class="nav-item has-treeview">
    <a href="#" class="nav-link">
        <i class="nav-icon far fa-circle"></i>
        <p>
            {{ $class->name }}
            <i class="right fas fa-angle-left"></i>
        </p>
    </a>
    <ul class="nav nav-treeview">
        @foreach ($class->functions as $function)
        <li class="nav-item">
            <a href="#function-{{ $function->id }}" class="nav-link">
                <i class="far fa-dot-circle nav-icon"></i>
                <p>{{ $function->name }}</p>
            </a>
        </li>
        @endforeach
    </ul>
</li>
@endforeach
