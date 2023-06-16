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
    /*
    {
      title: 'Conference',
      start: '2023-01-9',
      end: '2023-01-11',
      backgroundColor: "#fff",
      borderColor: "#fff",
      textColor: '#000'
    },
    {
      title: "John's Birthday",
      start: '2018-01-14',
      backgroundColor: "#007bff",
      borderColor: "#007bff",
      textColor: '#fff'
    },
    */

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
    /*
    {
      title: 'Starting New Project',
      start: '2023-01-11',
      backgroundColor: "#ffc107",
      borderColor: "#ffc107",
      textColor: '#fff'
    },
    {
      title: 'Social Distortion Concert',
      start: '2023-01-24',
      end: '2023-01-27',
      backgroundColor: "#000",
      borderColor: "#000",
      textColor: '#fff'
    },
    {
      title: 'Lunch',
      start: '2023-01-24T13:15:00',
      backgroundColor: "#fff",
      borderColor: "#fff",
      textColor: '#000',
    },
    {
      title: 'Company Trip',
      start: '2023-01-28',
      end: '2023-01-31',
      backgroundColor: "#fff",
      borderColor: "#fff",
      textColor: '#000',
    },
    */
  ]

});

</script>

<!-- Template JS File -->
<script src="{{ asset('app-assets/assets/js/scripts.js') }}"></script>
<script src="{{ asset('app-assets/assets/js/custom.js') }}"></script>

@endsection