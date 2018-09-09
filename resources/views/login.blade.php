<!DOCTYPE html>
<html lang="{{ config('app.locale', 'en') }}" class="lang-{{ config('app.locale', 'en') }} {{ (config('admin.is_rtl', false) ? 'layout-rtl': 'layout-ltr') }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>{{config('admin.title')}} | {{ trans('admin.login') }}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.5 -->
  <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/AdminLTE/bootstrap/css/bootstrap.min.css") }}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/font-awesome/css/font-awesome.min.css") }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/AdminLTE/dist/css/AdminLTE.min.css") }}">
  <!-- iCheck -->
  <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/AdminLTE/plugins/iCheck/square/blue.css") }}">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="//oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="//oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
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


  @if( file_exists(public_path('css/admin_login_custom.css')) )
    <link rel="stylesheet" href="{{ admin_asset("/css/admin_login_custom.css") }}">
  @endif

  @if( config('admin.is_rtl', false) )
    <link rel="stylesheet" href="{{ admin_asset("/vendor/laravel-admin/bootstrap-3-arabic-3.3.6/dist/css/bootstrap-arabic.min.css") }}">
    @if( file_exists(public_path('css/admin_login_rtl_custom.css')) )
      <link rel="stylesheet" href="{{ admin_asset("/css/admin_login_rtl_custom.css") }}">
    @endif
  @endif
</head>
<body class="hold-transition login-page" @if(config('admin.login_background_image'))style="background: url({{config('admin.login_background_image')}}) no-repeat;background-size: cover;"@endif>
<div class="login-box">
  <div class="login-logo">
    <a href="{{ admin_base_path('/') }}"><b>{{config('admin.name')}}</b></a>
  </div>
  <!-- /.login-logo -->
  <div class="login-box-body">
    <p class="login-box-msg">{{ trans('admin.login') }}</p>

    <form action="{{ admin_base_path('auth/login') }}" method="post">
      <div class="form-group has-feedback {!! !$errors->has('username') ?: 'has-error' !!}">

        @if($errors->has('username'))
          @foreach($errors->get('username') as $message)
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label></br>
          @endforeach
        @endif

        <input type="input" class="form-control" placeholder="{{ trans('admin.username') }}" name="username" value="{{ old('username') }}">
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
      <div class="form-group has-feedback {!! !$errors->has('password') ?: 'has-error' !!}">

        @if($errors->has('password'))
          @foreach($errors->get('password') as $message)
            <label class="control-label" for="inputError"><i class="fa fa-times-circle-o"></i>{{$message}}</label></br>
          @endforeach
        @endif

        <input type="password" class="form-control" placeholder="{{ trans('admin.password') }}" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
      <div class="row">

        <!-- /.col -->
        <div class="col-xs-4 col-md-offset-4">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <button type="submit" class="btn btn-primary btn-block btn-flat">{{ trans('admin.login') }}</button>
        </div>
        <!-- /.col -->
      </div>
    </form>

  </div>
  <!-- /.login-box-body -->
</div>
<!-- /.login-box -->

<!-- jQuery 2.1.4 -->
<script src="{{ admin_asset("/vendor/laravel-admin/AdminLTE/plugins/jQuery/jQuery-2.1.4.min.js")}} "></script>

<!-- Bootstrap -->
@if( config('admin.is_rtl', false) )
  <script src="{{ admin_asset("/vendor/laravel-admin/bootstrap-3-arabic-3.3.6/dist/js/bootstrap-arabic.min.js")}}"></script>
@else
    <script src="{{ admin_asset("/vendor/laravel-admin/AdminLTE/bootstrap/js/bootstrap.min.js")}}"></script>
@endif

<!-- iCheck -->
<script src="{{ admin_asset("/vendor/laravel-admin/AdminLTE/plugins/iCheck/icheck.min.js")}}"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass: 'iradio_square-blue',
      increaseArea: '20%' // optional
    });
  });
</script>
</body>
</html>
