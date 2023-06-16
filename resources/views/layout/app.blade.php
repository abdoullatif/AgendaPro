<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>AgendaPro</title>

  <!-- General CSS Files {{ asset('app-assets/') }} -->
  <link rel="stylesheet" href="{{ asset('app-assets/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('app-assets/assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('app-assets/assets/modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('app-assets/assets/modules/weather-icon/css/weather-icons.min.css') }}">
  <link rel="stylesheet" href="{{ asset('app-assets/assets/modules/weather-icon/css/weather-icons-wind.min.css') }}">
  <link rel="stylesheet" href="{{ asset('app-assets/assets/modules/summernote/summernote-bs4.css') }}">

    <!-- custom -->
    @yield ('extend-header')

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('app-assets/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('app-assets/assets/css/components.css') }}">


<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
        @include('layout.includes.header')
        @include('layout.includes.sidebar')
        @yield ('content')
        @include('layout.includes.footer')
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('app-assets/assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('app-assets/assets/modules/popper.js') }}"></script>
  <script src="{{ asset('app-assets/assets/modules/tooltip.js') }}"></script>
  <script src="{{ asset('app-assets/assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('app-assets/assets/modules/nicescroll/jquery.nicescroll.min.js') }}"></script>
  <script src="{{ asset('app-assets/assets/modules/moment.min.js') }}"></script>
  <script src="{{ asset('app-assets/assets/js/stisla.js') }}"></script>
  
  <!-- JS Libraies -->
  <script src="{{ asset('app-assets/assets/modules/simple-weather/jquery.simpleWeather.min.js') }}"></script>
  <script src="{{ asset('app-assets/assets/modules/chart.min.js') }}"></script>
  <script src="{{ asset('app-assets/assets/modules/jqvmap/dist/jquery.vmap.min.js') }}"></script>
  <script src="{{ asset('app-assets/assets/modules/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
  <script src="{{ asset('app-assets/assets/modules/summernote/summernote-bs4.js') }}"></script>
  <script src="{{ asset('app-assets/assets/modules/chocolat/dist/js/jquery.chocolat.min.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('app-assets/assets/js/page/index-0.js') }}"></script>

  <!-- Page Specific JS File -->
  @yield ('extend-footer')
  
  <!-- Template JS File -->
  <script src="{{ asset('app-assets/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('app-assets/assets/js/custom.js') }}"></script>
</body>
</html>