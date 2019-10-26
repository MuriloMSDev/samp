@if ($entity)
<h5>{{ $title }}</h5>
<table class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <th>{{ __('attributes.name') }}</th>
            <th>{{ __('attributes.type') }}</th>
            <th>{{ __('attributes.optional') }}</th>
            <th>{{ __('attributes.default_value') }}</th>
            <th>{{ __('attributes.description') }}</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($entity->variables as $variable)
        <tr>
            <td>{{ $variable->name }}</td>
            <td>{{ $variable->type }}</td>
            <td>
                {{ __("attributes.boolean.{$variable->optional}") }}
            </td>
            <td>{{ $variable->default }}</td>
            <td>
                @markdown($variable->description)
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@if ($example = $entity->example)
<br>
<h5>{{ __('attributes.example') }}:</h5>
<pre>
    <code>{{ $example->content }}</code>
</pre>
@endif
<hr>
@endif
