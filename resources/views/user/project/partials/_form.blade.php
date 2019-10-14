<div class="col-8 offset-2">
    <div class="form-group">
        {!! Form::label('name', __('attributes.name'), ['class' => 'control-label']) !!}
        {!! Form::text('name', null, ['class' => 'form-control' . input_error($errors, 'name')]) !!}

        @error('name')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('description', __('attributes.description'), ['class' => 'control-label']) !!}
        {!! Form::textarea('description', null, [
            'class' => 'form-control' . input_error($errors, 'description'),
            'rows'  => 5
        ]) !!}

        @error('description')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    @if (!$project->id)
    <div class="form-group">
        {!! Form::label('tool', __('attributes.tool'), ['class' => 'control-label']) !!}
        {!! Form::select2('tool', $tools, null, [
            'class'       => 'form-control' . input_error($errors, 'tool'),
            'placeholder' => __('attributes.tool')
        ]) !!}

        @error('tool')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('language_tool_id', __('attributes.language'), ['class' => 'control-label']) !!}
        {!! Form::select2('language_tool_id', [], null, [
            'class' => 'form-control' . input_error($errors, 'language_tool_id'),
            'placeholder' => __('attributes.language'),
            'based-on' => '#tool',
            'url' => route('user.consults.language.tool')
        ]) !!}

        @error('language_tool_id')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('documentation', __('attributes.data'), ['class' => 'control-label']) !!}
        <div class="custom-file">
            {!! Form::file('documentation', [
                'class' => 'custom-file-input' . input_error($errors, 'documentation')
            ]) !!}
            {!! Form::label('documentation', __('attributes.select_file'), ['class' => 'custom-file-label']) !!}

            @error('documentation')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>
    </div>
    @endif
    <div class="form-group">
        {!! Form::label('image', __('attributes.image'), ['class' => 'control-label']) !!}
        {!! Form::file('image', [
            'class' => 'file-input' . input_error($errors, 'image'),
            'image' => optional($project->image)->toJson(),
            'accept' => 'image/*'
        ]) !!}

        @error('image')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
