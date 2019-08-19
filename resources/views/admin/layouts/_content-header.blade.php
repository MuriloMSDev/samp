<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 @isset($breadcrumb) justify-content-end @endisset">
            @isset($title)
            <div class="col-sm-6">
                <h1 class="m-0 text-dark">
                    {{ $title }}
                </h1>
            </div><!-- /.col -->
            @endisset
            @isset($breadcrumb)
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    @foreach ($breadcrumb as $item)
                    <li class="breadcrumb-item @if($loop->last) active @endif">
                        @isset($item['url'])
                        <a href="{{ $item['url'] }}">{{ $item['title'] }}</a>
                        @else
                        {{ $item['title'] }}
                        @endif
                    </li>
                    @endforeach
                </ol>
            </div><!-- /.col -->
            @endisset
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
