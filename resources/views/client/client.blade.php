@extends('layout.app')


@section('extend-header')
<!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('app-assets/assets/modules/datatables/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/assets/modules/datatables/DataTables-1.10.16/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('app-assets/assets/modules/datatables/Select-1.2.4/css/select.bootstrap4.min.css') }}">
@endsection



@section('content')

<!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Administration</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Modules</a></div>
              <div class="breadcrumb-item">Administration</div>
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
            <h2 class="section-title">Admin</h2>
            <p class="section-lead">
              Vous avez la liste de tous les administrateur ou employer inscrit sur la plateforme.
            </p>

            <div class="row">
              <div class="col-12">
                <div class="card">
                  <!--
                  <div class="card-header">
                    <h4></h4>
                  </div>-->
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Nom et prenom</th>
                            <th>Telephone</th>
                            <th>Photo</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>   
                          @foreach($users as $user)
                          <tr>
                            <td>
                              1
                            </td>
                            <td>{{ $user->nom }} {{ $user->prenom }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>
                              <img alt="image" src="{{ asset('uploads/user/'.$user->avatar.'') }}" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                            </td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role }}</td>
                            <!--<td><a href="#" class="btn btn-secondary">Detail</a></td>-->
                            <td>
                              <button class="btn btn-sm dropdown-toggle more-horizontal" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="text-muted sr-only">Action</span>
                              </button>
                              <div class="dropdown-menu dropdown-menu-right">
                                <a class="dropdown-item" href="#">Modifier</a>
                                <a class="dropdown-item" href="#">Suprimer</a>
                                <a class="dropdown-item" href="#">Assign</a>
                              </div>
                            </td>
                          </tr>
                          @endforeach
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>



            <!--
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Advanced Table</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-2">
                        <thead>
                          <tr>
                            <th class="text-center">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad" class="custom-control-input" id="checkbox-all">
                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                              </div>
                            </th>
                            <th>Task Name</th>
                            <th>Progress</th>
                            <th>Members</th>
                            <th>Due Date</th>
                            <th>Status</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-1">
                                <label for="checkbox-1" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td>Create a mobile app</td>
                            <td class="align-middle">
                              <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                                <div class="progress-bar bg-success" data-width="100%"></div>
                              </div>
                            </td>
                            <td>
                              <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Wildan Ahdian">
                            </td>
                            <td>2018-01-20</td>
                            <td><div class="badge badge-success">Completed</div></td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                          </tr>
                          <tr>
                            <td>
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-2">
                                <label for="checkbox-2" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td>Redesign homepage</td>
                            <td class="align-middle">
                              <div class="progress" data-height="4" data-toggle="tooltip" title="0%">
                                <div class="progress-bar" data-width="0"></div>
                              </div>
                            </td>
                            <td>
                              <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Nur Alpiana">
                              <img alt="image" src="assets/img/avatar/avatar-3.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Hariono Yusup">
                              <img alt="image" src="assets/img/avatar/avatar-4.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Bagus Dwi Cahya">
                            </td>
                            <td>2018-04-10</td>
                            <td><div class="badge badge-info">Todo</div></td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                          </tr>
                          <tr>
                            <td>
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-3">
                                <label for="checkbox-3" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td>Backup database</td>
                            <td class="align-middle">
                              <div class="progress" data-height="4" data-toggle="tooltip" title="70%">
                                <div class="progress-bar bg-warning" data-width="70%"></div>
                              </div>
                            </td>
                            <td>
                              <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Rizal Fakhri">
                              <img alt="image" src="assets/img/avatar/avatar-2.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Hasan Basri">
                            </td>
                            <td>2018-01-29</td>
                            <td><div class="badge badge-warning">In Progress</div></td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                          </tr>
                          <tr>
                            <td>
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input" id="checkbox-4">
                                <label for="checkbox-4" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td>Input data</td>
                            <td class="align-middle">
                              <div class="progress" data-height="4" data-toggle="tooltip" title="100%">
                                <div class="progress-bar bg-success" data-width="100%"></div>
                              </div>
                            </td>
                            <td>
                              <img alt="image" src="assets/img/avatar/avatar-2.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Rizal Fakhri">
                              <img alt="image" src="assets/img/avatar/avatar-5.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Isnap Kiswandi">
                              <img alt="image" src="assets/img/avatar/avatar-4.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Yudi Nawawi">
                              <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle" width="35" data-toggle="tooltip" title="Khaerul Anwar">
                            </td>
                            <td>2018-01-16</td>
                            <td><div class="badge badge-success">Completed</div></td>
                            <td><a href="#" class="btn btn-secondary">Detail</a></td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
-->
          </div>
        </section>
    </div>

@endsection



@section('extend-footer')
    <!-- JS Libraies -->
    <script src="{{ asset('app-assets/assets/modules/datatables/datatables.min.js') }}"></script>
    <script src="{{ asset('app-assets/assets/modules/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('app-assets/assets/modules/datatables/Select-1.2.4/js/dataTables.select.min.js') }}"></script>
    <script src="{{ asset('app-assets/assets/modules/jquery-ui/jquery-ui.min.js') }}"></script>
    <!-- Page Specific JS File -->
    <script src="{{ asset('app-assets/assets/js/page/modules-datatables.js') }}"></script>
@endsection