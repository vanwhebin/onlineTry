<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="{{ $meta_description }}">
    <meta name="author" content="{{ config('post.author') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $title ?? config('post.title') }}</title>

    {{-- Styles --}}
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    <link href="{{ asset('css/atelier-heath-dark.css') }}" rel="stylesheet">
    <link href="{{ asset('font/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('layui/css/layui.css') }}" rel="stylesheet">
    <link href="{{ asset('css/pure-highlight.css') }}" rel="stylesheet">
    <link href="{{ asset('css/shCoreDefault.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sweetalert2.min.css') }}" rel="stylesheet">
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('layui/layui.all.js') }}"></script>
    @yield('styles')
</head>
<body class="post-template-default single single-post single-format-standard  navbar-sticky navbar-slide no-search sidebar-right pagination-infinite_button" style="transform: none;">

@include('post.partials.page-nav')

@yield('page-header')

@yield('content')

@yield('gadget')

@include('post.partials.page-footer')

{{-- Scripts --}}

<script src="{{ asset('js/main.js') }}"></script>
<script src="{{ asset('js/common.js') }}"></script>
<script src="{{ asset('js/highlight.pack.js') }}"></script>
<script src="{{ asset('js/iconfont.js') }}"></script>
<script src="{{ asset('js/jquery.fancybox.min.js') }}"></script>
<script src="{{ asset('js/plugins.js') }}"></script>
<script src="{{ asset('js/shCore.js') }}"></script>
<script src="{{ asset('js/theia-sticky-sidebar.js') }}"></script>
@yield('scripts')
</body>
</html>