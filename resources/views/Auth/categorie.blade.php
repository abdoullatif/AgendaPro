<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>AgendaPro</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('app-assets/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('app-assets/assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('app-assets/assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('app-assets/assets/css/components.css') }}">
  <!-- Simple bar CSS {{ asset('app-assets/') }} -->
  <link rel="stylesheet" href="{{ asset('app-assets/assets/css/categorie.css') }}">

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
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
                <h1>AgendaPro</h1>
                <!--<img src="{{ asset('app-assets/assets/img/stisla-fill.svg') }}" alt="logo" width="100" class="shadow-light rounded-circle">-->
            </div>

                <!-- 2 columns 
                <h3>Agenda Pro</h3>-->

                <div class="container">
                    <div class="row">
                        
                        <div class="col-xs-12 col-sm-6">
                            <a href="{{ route('login') }}">
                                <div class="box">
                                    <p>Je veux prendre rendez-vous</p>
                                </div>
                            </a>
                        </div>
                        
                        <div class="col-xs-12 col-sm-6">
                            <a href="{{ route('login') }}">
                                <div class="box">
                                    <p>Administration</P>
                                </div>
                            </a>
                        </div>
                        
                    </div>
                </div>

            <div class="simple-footer">
              Copyright &copy; by abdoulatif sooba
            </div>
          </div>
        </div>
      </div>
    </section>
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

  <!-- Page Specific JS File -->
  
  <!-- Template JS File -->
  <script src="{{ asset('app-assets/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('app-assets/assets/js/custom.js') }}"></script>
</body>
</html>