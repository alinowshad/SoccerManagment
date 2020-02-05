@extends('layouts.master')
@section('mainsidebar')
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
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
      <!-- Default box -->
      <div class="card">
          <div class="card-header">
            <h3 class="card-title">Player Detail</h3>
  
            <div class="card-tools">
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                <i class="fas fa-minus"></i></button>
              <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fas fa-times"></i></button>
            </div>
          </div>
          <div class="card-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-8 order-2 order-md-1">
                <div class="row">
                  <div class="col-12 col-sm-4">
                    <div class="info-box bg-light">
                      <div class="info-box-content">
                        <span class="info-box-text text-center text-muted">Players</span>
                        <span class="info-box-number text-center text-muted mb-0">{{count($data['players'])}}</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-12">
                    <h4>Team Leader</h4>
                      <div class="post">
                        <div class="user-block">
                          <img class="img-circle img-bordered-sm" src="/soccer/public/storage/user_pic/{{$data['user']->user_pic}}" alt="user image">
                          <span class="username">
                            <a href="#">{{$data['user']->name}}</a>
                          </span>
                        <span class="description">Created By {{$data['team']->team_leader_name}} On {{$data['team']->created_at}}</span>
                        </div>
                        <!-- /.user-block -->
                        <p>
                          {!!$data['team']->team_leader_decription!!}
                        </p>
                        <p>
                                                  
                        </p>
                      </div>
                  </div>
                </div>
              </div>
              <div class="col-12 col-md-12 col-lg-4 order-1 order-md-2">
                <h3 class="text-primary"><i class="fas fa-paint-brush"></i> Team Details</h3>
                <p class="text-muted">This Place You Can Khow More About Your Team Profile.</p>
                <br>
                <div class="text-muted">
                  <p class="text-sm">Team Name
                    <b class="d-block">{{$data['team']->name}}</b>
                  </p>
                  <p class="text-sm">Team Leader
                    <b class="d-block">{{$data['team']->team_leader_name}}</b>
                  </p>
                </div>
                
                <h5 class="mt-5 text-muted">Team files</h5>
                <ul class="list-unstyled">
                  <li>
                    <a href="/soccer/public/storage/team_pic/{{$data['team']->team_pic}}" class="btn-link text-secondary"><i class="far fa-fw fa-image "></i> Logo.png</a>
                  </li>
                </ul>
                <div class="text-center mt-5 mb-3">
                  <a href="/soccer/public/dashboard/players/create/{{$data['team']->id}}" class="btn btn-sm btn-primary">Add New Player</a>
                  <a href="/soccer/public/dashboard/teams/{{$data['team']->id}}/edit" class="btn btn-sm btn-warning">Edit</a>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
@endsection