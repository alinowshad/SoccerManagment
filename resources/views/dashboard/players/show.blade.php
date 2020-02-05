@extends('layouts.master')
@section('mainsidebar')
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
            <img src="http://localhost/soccer/node_modules/adminlte/dist/img/slogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">SoccerManagment</span>
          </a>
      
          <!-- Sidebar -->
          <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                <img src="/soccer/public/storage/user_pic/{{$data['user']->user_pic}}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                <a href="#" class="d-block">{{$data['user']->name}}</a>
              </div>
            </div>
      
            <!-- Sidebar Menu -->
            <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                  <a href="#" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                      Dashboard
                      <i class="right fas fa-angle-left"></i>
                    </p>
                  </a>
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="/soccer/public/dashboard/teams" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Teams</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/soccer/public/dashboard/allplayers" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Players</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                    <a href="/soccer/public/dashboard/users/{{$data['user']->id}}/edit" class="nav-link">
                      <i class="nav-icon fas fa-th"></i>
                      <p>
                        Edit Profile
                        <span class="right badge badge-danger"></span>
                      </p>
                    </a>
                  </li>
                  <li class="nav-item">
                      <a href="/soccer/public/dashboard/calendar" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                          Calendar
                          <span class="badge badge-info right"></span>
                        </p>
                      </a>
                    </li>
                  <li class="nav-item">
                      <a href="{{ route('logout') }}"
                          onclick="event.preventDefault();
                                   document.getElementById('logout-form').submit();" class="nav-link">
                                   <i class="nav-icon fas fa-th"></i>
                          <p>
                              Logout
                              <span class="right badge badge-danger"></span>
                          </p>
                          
                      </a>
      
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          {{ csrf_field() }}
                      </form>
                  </li>
              </ul>
            </nav>
            <!-- /.sidebar-menu -->
          </div>
          <!-- /.sidebar -->
@endsection
@section('content')
<div class="container-fluid">
        <div class="row">
          <div class="col-md-3">

            <!-- Profile Image -->
            <div class="card card-primary card-outline">
              <div class="card-body box-profile">
                <div class="text-center">
                  <img class="profile-user-img img-fluid img-circle"
                src="/soccer/public/storage/player_pic/{{$data['player']->player_pic}}"
                       alt="User profile picture">
                </div>

                <h3 class="profile-username text-center">{{$data['player']->name}}</h3>

                <p class="text-muted text-center">Player</p>

                <ul class="list-group list-group-unbordered mb-3">
                  <li class="list-group-item">
                    <b>Phone Number</b> <a class="float-right">{{$data['player']->player_phone_number}}</a>
                  </li>
                  <li class="list-group-item">
                    <b>Created At</b> <a class="float-right">{{$data['player']->created_at}}</a>
                  </li>
                </ul>

                <a href="/soccer/public/dashboard/players/{{$data['player']->id}}/edit" class="btn btn-sm btn-warning btn-block"><b>Edit</b></a>
                <hr>
                <div class="">
                  {!!Form::open(['action' => ['PlayerController@destroy', $data['player']->id], 'method'=>'POST', 'class' => 'pull-right'])!!}
                  {{Form::hidden('_method', 'DELETE')}}
                  {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger btn-block'])}}
                  {!!Form::close()!!}
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->

            <!-- About Me Box -->
            <div class="card card-primary">
              <div class="card-header">
                <h3 class="card-title">About Me</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i> Job</strong>

                <p class="text-muted">
                  {{$data['player']->job}}
                </p>

                <hr>

                <strong><i class="fas fa-map-marker-alt mr-1"></i> Address</strong>

                <p class="text-muted">{!!$data['player']->player_address!!}</p>

                <hr>

                <strong><i class="fas fa-pencil-alt mr-1"></i> Email</strong>

                <p class="text-muted">
                    {{$data['player']->player_email}}
                </p>

              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
          <div class="col-md-9">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">Playe In Teams</h3>
          
                    <div class="card-tools">
                    </div>
                  </div>
                  <!-- /.card-header -->
                 @if(count($data['teams']) > 0)
                  <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                      <thead>
                        <tr>
                          <th>Team Logo</th>
                          <th>ID</th>
                          <th>Team Name</th>
                          <th>Team Leader Name</th>
                          <th>Team Gender</th>
                          <th>Date</th>
                        </tr>
                      </thead>
                      <tbody>
                      @foreach($data['teams'] as $team)
                        <tr>
                          <td>
                                <div class="user-panel mt-3 pb-3 mb-3 d-flex">  
                                    <div class="image">
                                      <img src="/soccer/public/storage/team_pic/{{$team->team_pic}}" class="img-circle elevation-2" alt="User Image">
                                    </div>  
                                </div> 
                            </td>
                          <td>
                              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                {{$team->id}}
                              </div>
                          </td>
                          <td>
                              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                {{$team->name}}
                              </div>
                          </td>
                          <td>
                              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                {{$team->team_leader_name}}
                              </div>
                          </td>
                          <td>
                              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                {{$team->team_gender}}
                              </div>
                          </td>
                          <td>
                              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                {{$team->created_at}}
                              </div>
                          </td>
                          <td><span class="tag tag-success"></span></td>
                          <td>
                              <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                                  <a href="/soccer/public/dashboard/players/delete/{{$team->id}}/{{$data['player']->id}}" class="btn btn-sm btn-danger float-left">Delete</a>
                              </div>
                          </td>
                        </tr>
                      @endforeach
                      </tbody>
                    </table>
                  </div>
                  @else
                      <div class="card-body table-responsive p-0">
                          <p align="center" >Player have no Teams</p>
                      </div>
                  <!-- /.card-body -->
                  @endif
                </div>
                <!-- /.card -->
              </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
@endsection