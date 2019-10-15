<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <title>Laravel</title>

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('admin/css/bootstrap.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/font-awesome.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/ionicons.css') }}">
  @yield('css')
  <link rel="stylesheet" href="{{ asset('admin/css/AdminLTE.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/_all-skins.css') }}">
  <link rel="stylesheet" href="{{ asset('admin/css/pace.css') }}">

</head>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    @include('manage.layouts.header')
    @include('manage.layouts.sidebar')
    <div class="content-wrapper">
      @yield('content')
    </div>
    @include('manage.layouts.footer')
    @include('manage.layouts.control-sidebar')
  </div>
  <script src="{{ asset('admin/js/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('admin/js/pace.min.js') }}"></script>
  <script src="{{ asset('admin/js/jquery.slimscroll.min.js') }}"></script>
  <script src="{{ asset('admin/js/fastclick.js') }}"></script>
  <script src="{{ asset('admin/js/adminlte.min.js') }}"></script>
  <script src="{{ asset('admin/js/jquery-ui.min.js')}}"></script>
  @yield('javascript')
  <script type="text/javascript">
    // To make Pace works on Ajax calls
          $(document).ajaxStart(function () {
            Pace.restart()
          })
          $('.ajax').click(function () {    
            $.ajax({
              url: '#', success: function (result) {
                $('.ajax-content').html('<hr>Ajax Request Completed !')
              }
            })
          })
  </script>
</body>

</html>