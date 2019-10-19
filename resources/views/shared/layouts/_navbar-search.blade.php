<div class="w-100">
    {!! Form::open(['route' => 'projects.index', 'method' => 'GET', 'class' => 'form-inline']) !!}
    <div class="input-group input-group-sm search-input-group col-10 mx-auto">
        @foreach (search_params() as $key => $value)
        {!! Form::hidden($key, $value) !!}
        @endforeach

        {!! Form::search('q', request()->get('q'), [
            'class' => 'form-control form-control-navbar',
            'placeholder' => __('attributes.search'),
            'aria-label' => 'Search'
        ]) !!}
        <div class="input-group-append">
            <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
            </button>
        </div>
    </div>
    {!! Form::close() !!}
</div>
