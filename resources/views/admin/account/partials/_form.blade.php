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
        {!! Form::label('email', __('attributes.email'), ['class' => 'control-label']) !!}
        {!! Form::email('email', null, [
            'class' => 'form-control' . input_error($errors, 'email')
        ]) !!}

        @error('email')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label('password', __('attributes.password'), ['class' => 'control-label']) !!}
        {!! Form::password('password', [
            'class' => 'form-control' . input_error($errors, 'password'),
            'autocomplete' => 'new-password'
        ]) !!}

        @error('password')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
    <div class="form-group">
        {!! Form::label(
            'password_confirmation',
            __('attributes.password_confirmation'),
            ['class' => 'control-label']
        ) !!}
        {!! Form::password('password_confirmation', [
            'class' => 'form-control' . input_error($errors, 'password_confirmation'),
            'autocomplete' => 'new-password'
        ]) !!}

        @error('password_confirmation')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
        @enderror
    </div>
</div>
