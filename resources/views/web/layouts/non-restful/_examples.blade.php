@if ($entity->examples->count())
<div class="col-11 mx-auto">
    <div class="card">
        <div class="card-header">
            <h3>{{ __('attributes.examples') }}</h3>
        </div>
        <div class="card-body">
            @foreach ($entity->examples as $example)
            <pre>
                <code>{{ $example->content }}</code>
            </pre>
            @endforeach
        </div>
    </div>
</div>
@endif
