<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Agenda Pro</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('app-assets/assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('app-assets/assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('app-assets/assets/modules/jquery-selectric/selectric.css') }}">

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
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <h1>AgendaPro</h1>
              <!--<img src="{{ asset('app-assets/assets/img/stisla-fill.svg') }}" alt="logo" width="100" class="shadow-light rounded-circle">-->
            </div>

                <!-- ============================================================== -->
                @if(count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                @if(session('success'))
                <div class="alert alert-success">
                {{ session('success') }}
                </div> 
                @endif
                <!-- ===================== Alerte laravel ===================== -->

            <div class="card card-primary">
              <div class="card-header"><h4>S'inscrit !</h4></div>

              <div class="card-body">
                <form method="post" enctype="multipart/form-data" action="{{ route('storeUser') }}">
                @csrf
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="frist_name">Nom</label>
                      <input id="frist_name" type="text" class="form-control" name="nom" autofocus>
                    </div>
                    <div class="form-group col-6">
                      <label for="last_name">Prenom</label>
                      <input id="last_name" type="text" class="form-control" name="prenom">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email">
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="phone">Telephone</label>
                    <input id="phone" type="phone" class="form-control" name="phone">
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password" class="d-block">Mot de passe</label>
                      <input id="password" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="password">
                      <div id="pwindicator" class="pwindicator">
                        <div class="bar"></div>
                        <div class="label"></div>
                      </div>
                    </div>
                    <div class="form-group col-6">
                      <label for="password2" class="d-block">Confirmation mot de passe</label>
                      <input id="password2" type="password" class="form-control" name="password_confirmation">
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="image">Photo de profile</label>
                    <input id="image" type="file" class="form-control" name="image">
                    <div class="invalid-feedback">
                    </div>
                  </div>

                  <!--

                  <div class="form-divider">
                    Mon adresse
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>Pays</label>
                      <select class="form-control selectric">
                        <option>Guinee</option>
                        <option>Cote d'ivoir</option>
                        <option>Benin</option>
                        <option>Togo</option>
                        <option>Ghana</option>
                      </select>
                    </div>
                    <div class="form-group col-6">
                      <label>Province</label>
                      <select class="form-control selectric">
                        <option>Ouest africa</option>
                        <option>Est africa</option>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label>Cite</label>
                      <input type="text" class="form-control">
                    </div>
                    <div class="form-group col-6">
                      <label>Postal Code</label>
                      <input type="text" class="form-control">
                    </div>
                  </div>
                  -->

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">Je suis d'accord avec les termes et conditions</label>
                    </div>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      je m'inscrit
                    </button>
                  </div>
                </form>
              </div>


            </div>
            <div class="simple-footer">
              Copyright &copy; Abdoulatif s. sooba 2023
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
  <script src="{{ asset('app-assets/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
  <script src="{{ asset('app-assets/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

  <!-- Page Specific JS File -->
  <script src="{{ asset('app-assets/assets/js/page/auth-register.js') }}"></script>
  
  <!-- Template JS File -->
  <script src="{{ asset('app-assets/assets/js/scripts.js') }}"></script>
  <script src="{{ asset('app-assets/assets/js/custom.js') }}"></script>
</body>
</html>