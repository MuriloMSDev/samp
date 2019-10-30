@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6 col-12">
        <div class="info-box bg-success">
            <span class="info-box-icon"><i class="fas fa-users"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">{{ __('attributes.users') }}</span>
                <span class="info-box-number">{{ $usersQty }}</span>

                <div class="progress">
                    <div class="progress-bar w-100"></div>
                </div>
                <span class="progress-description d-block">
                    {{ __('messages.all_of', [
                        'of' => __('attributes.users')
                    ]) }}
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-12">
        <div class="info-box bg-info">
            <span class="info-box-icon"><i class="fas fa-book"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">{{ __('attributes.projects') }}</span>
                <span class="info-box-number">{{ $projectsQty }}</span>

                <div class="progress">
                    <div class="progress-bar w-100"></div>
                </div>
                <span class="progress-description d-block">
                    {{ __('messages.all_of', [
                        'of' => __('attributes.projects')
                    ]) }}
                </span>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-12">
        <div class="info-box bg-warning">
            <span class="info-box-icon"><i class="fas fa-check-circle"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">{{ __('attributes.projects') }} {{ __('attributes.restful') }}</span>
                <span class="info-box-number">{{ $restfulQty }}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: {{ $restfulPercent }}%"></div>
                </div>
                <span class="progress-description d-block">
                    {{ __('messages.percent_of', [
                        'value' => $restfulPercent,
                        'of' => __('attributes.projects')
                    ]) }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <div class="col-lg-3 col-md-6 col-12">
        <div class="info-box bg-warning">
            <span class="info-box-icon"><i class="fas fa-times-circle"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">{{ __('attributes.projects') }} {{ __('attributes.non_restful') }}</span>
                <span class="info-box-number">{{ $nonRestfulQty }}</span>

                <div class="progress">
                    <div class="progress-bar" style="width: {{ $nonRestfulPercent }}%"></div>
                </div>
                <span class="progress-description d-block">
                    {{ __('messages.percent_of', [
                        'value' => $nonRestfulPercent,
                        'of' => __('attributes.projects')
                    ]) }}
                </span>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
</div>
<div class="row">
    <div class="col-12 col-md-6">
        <div class="card bg-gradient-success">
            <div class="card-header border-0">
                <h3 class="card-title">
                    <i class="fas fa-users mr-1"></i>
                    {{ __('attributes.users_registered') }}
                </h3>
            </div>
            <div class="card-body">
                {!! $usersChart->container() !!}
            </div>
        </div>
    </div>
    <div class="col-12 col-md-6">
        <div class="card bg-gradient-info">
            <div class="card-header border-0">
                <h3 class="card-title">
                    <i class="fas fa-book mr-1"></i>
                    {{ __('attributes.projects_created') }}
                </h3>
            </div>
            <div class="card-body">
                {!! $projectsChart->container() !!}
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
    {!! $usersChart->script() !!}
    {!! $projectsChart->script() !!}
@endpush
