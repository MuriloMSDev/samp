<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>
        @isset($title)
        {{ $title }} |
        @endisset
        {{ config('app.name', 'SAMP') }}
    </title>

    <link rel="stylesheet" href="{{ mix('css/admin/app.css') }}">
</head>
