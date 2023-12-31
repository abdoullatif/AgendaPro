@extends('layout.app')


@section('extend-header')
@endsection



@section('content')

<!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Profile</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item">Profile</div>
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
            <h2 class="section-title">{{ auth()->user()->nom }} {{ auth()->user()->prenom }}</h2>
            <p class="section-lead">
                Vous pouvez modifier vos informations sur cette page.
            </p>

            <div class="row mt-sm-4">
              <div class="col-12 col-md-12 col-lg-5">
                <div class="card profile-widget">
                  <div class="profile-widget-header">                     
                    <img alt="image" src="{{ asset('uploads/user/'.auth()->user()->avatar.'') }}" class="rounded-circle profile-widget-picture">
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Rendez-vous</div>
                        <div class="profile-widget-item-value">7</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">Comfirme</div>
                        <div class="profile-widget-item-value">6</div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label">En attente</div>
                        <div class="profile-widget-item-value">1</div>
                      </div>
                    </div>
                  </div>
                  <!--
                  <div class="profile-widget-description">
                    <div class="profile-widget-name">Ujang Maman <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> Web Developer</div></div>
                    Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
                  </div>
                  <div class="card-footer text-center">
                    <div class="font-weight-bold mb-2">Follow Ujang On</div>
                    <a href="#" class="btn btn-social-icon btn-facebook mr-1">
                      <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-twitter mr-1">
                      <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-github mr-1">
                      <i class="fab fa-github"></i>
                    </a>
                    <a href="#" class="btn btn-social-icon btn-instagram">
                      <i class="fab fa-instagram"></i>
                    </a>
                  </div>
                -->
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-7">
                <div class="card">
                  <form method="post" enctype="multipart/form-data" action="{{ route('profile.up', ['id' => auth()->user()->id]) }}" class="needs-validation" novalidate="">
                    @csrf
                    <div class="card-header">
                      <h4>Editer le profil</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">                               
                          <div class="form-group col-md-6 col-12">
                            <label>Nom</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->nom }}" name="nom">
                            <div class="invalid-feedback">
                                Merci de renseigner le prénom
                            </div>
                          </div>
                          <div class="form-group col-md-6 col-12">
                            <label>prenom</label>
                            <input type="text" class="form-control" value="{{ auth()->user()->prenom }}" name="prenom">
                            <div class="invalid-feedback">
                                Merci de renseigner le nom
                            </div>
                          </div>
                        </div>
                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Email</label>
                            <input type="email" class="form-control" value="{{ auth()->user()->email }}" name="email">
                            <div class="invalid-feedback">
                                Merci de renseigner l'email
                            </div>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Phone</label>
                            <input type="tel" class="form-control" value="{{ auth()->user()->phone }}" name="phone">
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group col-md-7 col-12">
                            <label>Mot de passe</label>
                            <input type="password" class="form-control" value="{{ auth()->user()->password }}" name="password">
                            <div class="invalid-feedback">
                                Merci de renseigner le mot de passe
                            </div>
                          </div>
                          <div class="form-group col-md-5 col-12">
                            <label>Comfirmer mot de passe</label>
                            <input type="password" class="form-control" value="{{ auth()->user()->password }}" name="password_confirmation">
                          </div>
                        </div>

                        <div class="form-group">
                            <label for="image">Photo de profile</label>
                            <input id="image" type="file" class="form-control" name="image">
                            <div class="invalid-feedback">
                            </div>
                        </div>
<!--
                        <div class="row">
                          <div class="form-group col-12">
                            <label>Bio</label>
                            <textarea class="form-control summernote-simple">Ujang maman is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.</textarea>
                          </div>
                        </div>

                        <div class="row">
                          <div class="form-group mb-0 col-12">
                            <div class="custom-control custom-checkbox">
                              <input type="checkbox" name="remember" class="custom-control-input" id="newsletter">
                              <label class="custom-control-label" for="newsletter">Subscribe to newsletter</label>
                              <div class="text-muted form-text">
                                You will get new information about products, offers and promotions
                              </div>
                            </div>
                          </div>
                        </div>
-->
                    </div>
                    <div class="card-footer text-right">
                      <button type="submit" class="btn btn-primary">Sauvegarder les modifications</button>
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