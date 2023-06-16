@extends('layout.app')


@section('extend-header')
<!-- CSS Libraries -->
<link rel="stylesheet" href="{{ asset('app-assets/assets/modules/fullcalendar/fullcalendar.min.css') }}">


@endsection



@section('content')

<!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Calendrier</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">tabeau de bord</a></div>
              <div class="breadcrumb-item"><a href="#">Modules</a></div>
              <div class="breadcrumb-item">Calendrier</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Calendrier</h2>
            <p class="section-lead">
              Consulter votre calendrier.
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                    <!--
                  <div class="card-header">
                    <h4>Calendar</h4>
                  </div>-->
                  <div class="card-body">
                    <div class="fc-overflow">                            
                      <div id="myEvent"></div>
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
<!-- JS Libraies -->
<script src="{{ asset('app-assets/assets/modules/fullcalendar/fullcalendar.min.js') }}"></script>

<!-- Page Specific JS File 
  <script src="{{ asset('app-assets/assets/js/page/modules-calendar.js') }}"></script>-->

<script>
  "use strict";

$("#myEvent").fullCalendar({
  height: 'auto',
  header: {
    left: 'prev,next today',
    center: 'title',
    right: 'month,agendaWeek,agendaDay,listWeek'
  },
  editable: true,
  events: [

    @foreach($creneaux as $creneau)

    {
      title: '{{ $creneau->note }}',
      start: '{{ $creneau->date_heur_debut }}',
      end: '{{ $creneau->date_heur_fin }}',
      backgroundColor: "#f56954",
      borderColor: "#f56954",
      textColor: '#fff'
    },

    @Endforeach

  ]

});

</script>

<!-- Template JS File -->
<script src="{{ asset('app-assets/assets/js/scripts.js') }}"></script>
<script src="{{ asset('app-assets/assets/js/custom.js') }}"></script>

@endsection