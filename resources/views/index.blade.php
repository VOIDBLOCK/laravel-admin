<!DOCTYPE html>
<html lang="{{ App::getLocale() }}" class="lang-{{ App::getLocale() }} layout-{{ Admin::getDirection() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ Admin::title() }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    {!! Admin::css() !!}
    

    <script src="{{ Admin::jQuery() }}"></script>

    <script src="{{ admin_asset ("/vendor/laravel-admin/AdminLTE/bootstrap/js/bootstrap.min.js") }} "></script>
    <script src="{{ admin_asset("/vendor/laravel-admin/bootstrap-3-arabic-3.3.6/dist/js/bootstrap-arabic.min.js")}}"></script>

  
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

    {{-- Force Custom Font --}}
    @php
        $families = config('admin.font_family_sets', [[0 => null]]);
    @endphp
    @foreach( $families as $family )
        @php
            $fontFamily = isset($family['family']) ? $family['family'] : config('admin.font_family', 'Raleway');
            $fontFamilyName = isset($family['name']) ? $family['name'] : config('admin.font_family_name', 'Raleway');
            $fontFamilyWeights = isset($family['weights']) ? $family['weights'] : config('admin.font_family_weights', '300,500,900');
            $useImportant = isset($family['important']) && !!$family['important']; 
            $tagName = isset($family['selector']) ? $family['selector'] : 'body';
        @endphp
        <link href="https://fonts.googleapis.com/css?family={{ $fontFamily }}:{{ $fontFamilyWeights }}" rel="stylesheet">
        <style type="text/css">
            .f-{{ strtolower($fontFamily) }},
            @php echo $tagName; @endphp {
                font-family: @php echo $fontFamilyName; @endphp, 'Source Sans Pro', 'Helvetica Neue', Helvetica, Arial, sans-serif {{ ( $useImportant ? '!important' : '') }};
            }
        </style>
    @endforeach
    
    @if( file_exists(public_path('favicon.png')) )
    <link rel="icon" type="image/x-icon" href="/favicon.png" />
    @elseif( file_exists(public_path('favicon.ico')) )
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />
    @endif
    
    @if( file_exists(public_path('css/admin_custom.css')) )
      <link rel="stylesheet" href="{{ admin_asset("/css/admin_custom.css") }}">
    @endif

    @if( Admin::isDirection('rtl') )
      <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/bootstrap-3-arabic-3.3.6/dist/css/bootstrap-arabic.min.css") }}">
      @if( file_exists(public_path('css/admin_rtl_custom.css')) )
        <link rel="stylesheet" href="{{ admin_asset("/css/admin_rtl_custom.css") }}">
      @endif
    @endif
</head>

<body class="hold-transition {{config('admin.skin')}} {{join(' ', config('admin.layout'))}}">
<div class="wrapper">

    @include('admin::partials.header')

    @include('admin::partials.sidebar')

    <div class="content-wrapper" id="pjax-container">
        @yield('content')
        {!! Admin::script() !!}
    </div>

    @include('admin::partials.footer')

</div>

<script>
    function LA() {}
    LA.token = "{{ csrf_token() }}";
</script>

<!-- REQUIRED JS SCRIPTS -->
{!! Admin::js() !!}

</body>
</html>
