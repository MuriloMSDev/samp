<div class="content-header">
    <div class="container-fluid">
        <div class="row mb-2 @isset($breadcrumb) justify-content-end @endisset">
            @isset($title)
            <div class="col-12 col-sm">
                <h1 class="m-0 text-dark">
                    <strong>{{ $title }}</strong>
                    @isset($subTitle)
                    <small>{{ $subTitle }}</small>
                    @endisset
                </h1>
            </div><!-- /.col -->
            @endisset
            @isset($breadcrumb)
            <div class="col-12 col-sm-auto">
                <ol class="breadcrumb float-sm-right">
                    @foreach ($breadcrumb as $item)
                    <li class="breadcrumb-item @if($loop->last) active @endif">
                        @isset($item['url'])
                        <a href="{{ $item['url'] }}">{{ mb_strimwidth($item['title'], 0, 35, "...") }}</a>
                        @else
                        {{ mb_strimwidth($item['title'], 0, 35, "...") }}
                        @endif
                    </li>
                    @endforeach
                </ol>
            </div><!-- /.col -->
            @endisset
        </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
