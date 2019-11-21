<div class="col-11 mx-auto">
    <div class="card">
        <div class="card-header">
            <h3>{{ __('attributes.comments') }}</h3>
        </div>
        <div class="card-body">
            @if (user())
            {!! Form::open(['route' => [
                'projects.classes.functions.comments.store',
                $project, $class, $function
            ]]) !!}
            <div class="row">
                <div class="col-9 col-sm-10 col-md-11 pr-0">
                    <div class="form-group mb-0">
                        {!! Form::textarea('comment', null, [
                            'class' => 'form-control' . input_error($errors, 'comment'),
                            'placeholder' => __('attributes.new_comment'),
                            'rows' => 3
                        ]) !!}

                        @error('comment')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="col-3 col-sm-2 col-md-1 pl-0">
                    <button type="submit" class="btn btn-flat btn-success w-100 h-100 rounded-right">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </div>
            </div>
            {!! Form::close() !!}
            <div class="clearfix"></div>
            @endif

            @foreach ($function->comments->sortByDesc('votes_quantity') as $comment)
            <hr>
            <div id="comment-{{ $comment->id }}" class="comment row">
                <div class="col col-sm-2 col-md-1 px-0 text-center d-none d-sm-block">
                    @if (user())
                    <button url="{{ route('comments.up', $comment) }}" class-type="btn-primary"
                        class="btn-vote btn {{ voted($comment, true) ? 'btn-primary' : 'btn-light'}} btn-sm col-auto"
                        {{ $comment->isFrom(user()) ? 'disabled' : '' }}>
                        <i class="fas fa-arrow-up"></i>
                    </button>
                    @else
                    <button class="btn-vote btn btn-light btn-sm col-auto" disabled>
                        <i class="fas fa-arrow-up"></i>
                    </button>
                    @endif
                    <div class="col-12 votes-quantity">
                        {{ $comment->votes_quantity }}
                    </div>
                    @if (user())
                    <button url="{{ route('comments.down', $comment) }}" class-type="btn-danger"
                        class="btn-vote btn {{ voted($comment, false) ? 'btn-danger' : 'btn-light'}} btn-sm col-auto"
                        {{ $comment->isFrom(user()) ? 'disabled' : '' }}>
                        <i class="fas fa-arrow-down"></i>
                    </button>
                    @else
                    <button class="btn-vote btn btn-light btn-sm col-auto" disabled>
                        <i class="fas fa-arrow-down"></i>
                    </button>
                    @endif
                </div>
                <div class="col-12 col-sm-10 col-md-11 pl-sm-0">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-7 pr-0">
                                    <h5>{{ $comment->user->name }}</h5>
                                </div>
                                <div class="col-4 float-right d-flex d-sm-none">
                                    @if (user())
                                    <button url="{{ route('comments.up', $comment) }}" class-type="btn-primary"
                                        class="btn-vote btn {{ voted($comment, true) ? 'btn-primary' : 'btn-light'}} btn-sm float-right"
                                        {{ $comment->isFrom(user()) ? 'disabled' : '' }}>
                                        <i class="fas fa-arrow-up"></i>
                                    </button>
                                    @else
                                    <button class="btn-vote btn btn-light btn-sm float-right" disabled>
                                        <i class="fas fa-arrow-up"></i>
                                    </button>
                                    @endif
                                    <span class="float-right px-1 align-self-center votes-quantity">
                                        {{ $comment->votes_quantity }}
                                    </span>
                                    @if (user())
                                    <button url="{{ route('comments.down', $comment) }}" class-type="btn-danger"
                                        class="btn-vote btn {{ voted($comment, false) ? 'btn-danger' : 'btn-light'}} btn-sm float-right"
                                        {{ $comment->isFrom(user()) ? 'disabled' : '' }}>
                                        <i class="fas fa-arrow-down"></i>
                                    </button>
                                    @else
                                    <button class="btn-vote btn btn-light btn-sm float-right" disabled>
                                        <i class="fas fa-arrow-down"></i>
                                    </button>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="card-body text-justify">
                            <span>{{ $comment->content }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
