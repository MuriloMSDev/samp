@extends('shared.layouts.app')

@section('sidebar')
    @include('web.layouts.non-restful._sidebar-project')
@endsection

@section('content')
<div class="row">
    <div class="col-11 mx-auto">
        <h3>{{ __('attributes.class') . ": $class->name" }}</h3>
    </div>
    <div class="col-11 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>
                    {{ __('attributes.function') . ($function->type ? " {$function->type}" : '') . ": $function->name" . $function->renderParameters() }}
                </h3>
            </div>
            @if ($function->description)
            <div class="card-body">
                <p class="card-text text-justify">
                    @markdown($function->description)
                </p>
            </div>
            @endif
        </div>
    </div>
    @include('web.layouts.non-restful._parameters', ['entity' => $function])
    @if ($return = $function->returns)
    <div class="col-11 mx-auto">
        <div class="card">
            <div class="card-header">
                <h3>{{ __('attributes.return') }}</h3>
            </div>
            <div class="card-body">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>{{ __('attributes.name') }}</th>
                            <th>{{ __('attributes.type') }}</th>
                            <th>{{ __('attributes.description') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($return->variables as $item)
                        <tr>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->type }}</td>
                            <td>
                                @markdown($item->description)
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    @endif
    @include('web.layouts.non-restful._examples', ['entity' => $function])
    @if ($function->comments->count() || user())
        @include('web.function.partials._comments')
    @endif
</div>
@endsection
