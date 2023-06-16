@extends('layout.app')


@section('extend-header')
@endsection



@section('content')

    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Creer un compte</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Administration</a></div>
              <div class="breadcrumb-item">compte</div>
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
            <h2 class="section-title">Creation de compte employer ou administrateur</h2>
            <p class="section-lead">Vous pouvez creer ici les compte administrateur.</p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                    <!--
                  <div class="card-header">
                    <h4>Simple Summernote</h4>
                  </div>-->

                    <form method="post" enctype="multipart/form-data" action="{{ route('administrateur.store') }}">
                        @csrf                
                        <div class="card-body">


                            <div class="form-group row mb-4">
                            <label for="nom" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nom</label>
                            <div class="col-sm-12 col-md-7">
                                <input id="nom" type="text" class="form-control" name="nom" autofocus>
                            </div>
                            </div>

                            <div class="form-group row mb-4">
                            <label for="prenom" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Prenom</label>
                            <div class="col-sm-12 col-md-7">
                                <input id="prenom" type="text" class="form-control" name="prenom" autofocus>
                            </div>
                            </div>

                            <div class="form-group row mb-4">
                            <label for="email" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                            <div class="col-sm-12 col-md-7">
                                <input id="email" type="email" class="form-control" name="email" autofocus>
                            </div>
                            </div>

                            <div class="form-group row mb-4">
                            <label for="phone" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Telephone</label>
                            <div class="col-sm-12 col-md-7">
                                <input id="phone" type="phone" class="form-control" name="phone" autofocus>
                            </div>
                            </div>

                            <div class="form-group row mb-4">
                            <label for="password" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Mot de passe</label>
                            <div class="col-sm-12 col-md-7">
                                <input id="password" type="password" class="form-control" name="password" autofocus>
                            </div>
                            </div>

                            <div class="form-group row mb-4">
                            <label for="password" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Comfime mot de passe</label>
                            <div class="col-sm-12 col-md-7">
                                <input id="password" type="password" class="form-control" name="password_confirmation" autofocus>
                            </div>
                            </div>

                            <div class="form-group row mb-4">
                            <label for="image" class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Photo</label>
                            <div class="col-sm-12 col-md-7">
                                <input id="image" type="file" class="form-control" name="image" autofocus>
                            </div>
                            </div>


                            <div class="form-group row mb-4">
                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Role</label>
                            <div class="col-sm-12 col-md-7">
                                <select class="form-control selectric" name="role">
                                <option value="Administrateur">Administrateur</option>
                                <option value="Employer">Employer</option>
                                </select>
                            </div>
                            </div>


                            <div class="form-group row mb-4">
                            <label for="image" class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                            <div class="col-sm-12 col-md-7">
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Inscrit
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
@endsection