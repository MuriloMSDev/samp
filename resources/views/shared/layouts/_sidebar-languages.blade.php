@inject('languageClass', 'App\Models\Language')

<li class="nav-header">{{ __('attributes.languages') }}</li>
<div class="nav-divider"></div>
@foreach ($languageClass::all() as $language)
<li class="nav-item">
    <a href="#" class="nav-link {{ active('#') }}">
        <i class="nav-icon {{ $language->icon }}"></i>
        <p>{{ $language->name }}</p>
    </a>
</li>
@endforeach
