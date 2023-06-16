@extends('layout.app')


@section('extend-header')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('app-assets/assets/modules/bootstrap-daterangepicker/daterangepicker.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/assets/modules/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/assets/modules/select2/dist/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/assets/modules/jquery-selectric/selectric.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/assets/modules/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.css') }}">
@endsection



@section('content')

    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Reserver</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Modules</a></div>
              <div class="breadcrumb-item">Reservation</div>
            </div>
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

          <div class="section-body">
            <h2 class="section-title">Reserver votre date de rendez-vous</h2>
            <p class="section-lead">Choisissez une date pour votre rendez-vous avec notre entreprise</p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                    <!--
                  <div class="card-header">
                    <h4>Simple Summernote</h4>
                  </div>-->

                    <form method="post" action="{{ route('creneau.store') }}">
                        @csrf                
                        <div class="card-body">


                            <div class="form-group row mb-4">
                                <label for="nom" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date et heur de debut</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control datetimepicker" name="date_heur_debut">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="prenom" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Date et heur de fin</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" class="form-control datetimepicker" name="date_heur_fin">
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                                <label for="note" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Note</label>
                                <div class="col-sm-12 col-md-7">
                                    <input id="note" type="text" class="form-control" name="note" autofocus>
                                </div>
                            </div>

                            <div class="form-group row mb-4">
                            <label for="image" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Reserver
                                </button>
                            </div>
                            </div>


                        </div>
                    </form>


                </div>
              </div>
            </div>


          </div>
        </section>
    </div>


@endsection



@section('extend-footer')
    <!-- JS Libraies -->
    <script src="{{ asset('app-assets/assets/modules/cleave-js/dist/cleave.min.js') }}"></script>
    <script src="{{ asset('app-assets/assets/modules/cleave-js/dist/addons/cleave-phone.us.js') }}"></script>
    <script src="{{ asset('app-assets/assets/modules/jquery-pwstrength/jquery.pwstrength.min.js') }}"></script>
    <script src="{{ asset('app-assets/assets/modules/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
    <script src="{{ asset('app-assets/assets/modules/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js') }}"></script>
    <script src="{{ asset('app-assets/assets/modules/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ asset('app-assets/assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js') }}"></script>
    <script src="{{ asset('app-assets/assets/modules/select2/dist/js/select2.full.min.js') }}"></script>
    <script src="{{ asset('app-assets/assets/modules/jquery-selectric/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('app-assets/assets/js/page/forms-advanced-forms.js') }}"></script>
@endsection