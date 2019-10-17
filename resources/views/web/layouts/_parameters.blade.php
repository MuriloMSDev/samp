@if ($entity->parameters->count())
    <div class="col-11 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>{{ __('attributes.parameters') }}</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('attributes.name') }}</th>
                            <th>{{ __('attributes.type') }}</th>
                            <th>{{ __('attributes.optional') }}</th>
                            <th>{{ __('attributes.description') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($entity->parameters as $parameter)
                        <tr>
                            <td>{{ $parameter->name }}</td>
                            <td>{{ $parameter->type }}</td>
                            <td>
                                {{ __("attributes.boolean.{$parameter->optional}") }}
                            </td>
                            <td>
                                @markdown($parameter->description)
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
