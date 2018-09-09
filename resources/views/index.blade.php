<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ Admin::title() }}</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/AdminLTE/bootstrap/css/bootstrap.min.css") }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/font-awesome/css/font-awesome.min.css") }}">

    <!-- Theme style -->
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/AdminLTE/dist/css/skins/" . config('admin.skin') .".min.css") }}">

    {!! Admin::css() !!}
    
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/laravel-admin/laravel-admin.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/nprogress/nprogress.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/sweetalert/dist/sweetalert.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/nestable/nestable.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/toastr/build/toastr.min.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/bootstrap3-editable/css/bootstrap-editable.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/google-fonts/fonts.css") }}">
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/AdminLTE/dist/css/AdminLTE.min.css") }}">

    <!-- REQUIRED JS SCRIPTS -->
    <script src="{{ admin_asset ("/vendor/laravel-admin/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js") }}"></script>
    <script src="{{ admin_asset ("/vendor/laravel-admin/AdminLTE/bootstrap/js/bootstrap.min.js") }}"></script>
    <script src="{{ admin_asset ("/vendor/laravel-admin/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js") }}"></script>
    <script src="{{ admin_asset ("/vendor/laravel-admin/AdminLTE/dist/js/app.min.js") }}"></script>
    <script src="{{ admin_asset ("/vendor/laravel-admin/jquery-pjax/jquery.pjax.js") }}"></script>
    <script src="{{ admin_asset ("/vendor/laravel-admin/nprogress/nprogress.js") }}"></script>

    @if( config('admin.is_rtl', false) )
        <script src="{{ admin_asset("/vendor/laravel-admin/bootstrap-3.3.6/dist/js/bootstrap.min.js")}}"></script>
    @endif
  
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

    @if( config('admin.is_rtl', false) )
      <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/bootstrap-3.3.6/dist/css/bootstrap.min.css") }}">
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

<!-- ./wrapper -->

<script>
    function LA() {}
    LA.token = "{{ csrf_token() }}";
</script>

<!-- REQUIRED JS SCRIPTS -->
<script src="{{ admin_asset ("/vendor/laravel-admin/nestable/jquery.nestable.js") }}"></script>
<script src="{{ admin_asset ("/vendor/laravel-admin/toastr/build/toastr.min.js") }}"></script>
<script src="{{ admin_asset ("/vendor/laravel-admin/bootstrap3-editable/js/bootstrap-editable.min.js") }}"></script>
<script src="{{ admin_asset ("/vendor/laravel-admin/sweetalert/dist/sweetalert.min.js") }}"></script>
{!! Admin::js() !!}
<script src="{{ admin_asset ("/vendor/laravel-admin/laravel-admin/laravel-admin.js") }}"></script>

</body>
</html>
