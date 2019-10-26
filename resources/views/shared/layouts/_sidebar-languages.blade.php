@inject('languageClass', 'App\Models\Language')

<li class="nav-header">{{ __('attributes.languages') }}</li>
<div class="nav-divider"></div>
@foreach ($languageClass::all() as $language)
<li class="nav-item">
    <a href="{{ route('projects.index', search_params(['language' => $language->id])) }}"
        class="nav-link {{ route_class('projects.index', ['language' => $language->id]) }}">
        <i class="nav-icon {{ $language->icon }}"></i>
        <p>{{ $language->name }}</p>
    </a>
</li>
@endforeach
