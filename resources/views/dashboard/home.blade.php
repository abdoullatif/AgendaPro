@extends('layout.app')


@section('extend-header')
@endsection



@section('content')

<!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Acceuil</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Tableau de bord</a></div>
              <div class="breadcrumb-item"><a href="#">Components</a></div>
              <div class="breadcrumb-item">Acceuil</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Avec Agendapro plus besoin de longue fille d'attente, reserver votre rendez-vous sans vous deplacer</h2>
            <p class="section-lead"></p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                    <!--
                  <div class="card-header">
                    <h4>Order Status</h4>
                  </div>-->
                  <div class="card-body">

                    <div class="row mt-4">
                      <div class="col-12 col-lg-8 offset-lg-2">
                        <div class="wizard-steps">
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="fas fa-user"></i>
                            </div>
                            <div class="wizard-step-label">
                             Inscription
                            </div>
                          </div>
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="fas fa-calendar-alt"></i>
                            </div>
                            <div class="wizard-step-label">
                              Reservation
                            </div>
                          </div>
                          <div class="wizard-step wizard-step-active">
                            <div class="wizard-step-icon">
                              <i class="far fa-clipboard-list"></i>
                            </div>
                            <div class="wizard-step-label">
                              Traitement
                            </div>
                          </div>
                          <div class="wizard-step wizard-step-success">
                            <div class="wizard-step-icon">
                              <i class="fas fa-calendar-check"></i>
                            </div>
                            <div class="wizard-step-label">
                              Reservation confirmer
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                    
                  </div>
                </div>
              </div>
            </div>

          </div>
        </section>
    </div>

@endsection



@section('extend-footer')
@endsection