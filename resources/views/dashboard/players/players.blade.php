@extends('layouts.master')
@section('mainsidebar')
    <!-- Brand Logo -->
    <a href="#" class="brand-link">
            <img src="http://localhost/soccer/node_modules/adminlte/dist/img/slogo.jpg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
                 style="opacity: .8">
            <span class="brand-text font-weight-light">SoccerManegment</span>
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
      <div class="card card-solid">
            <div class="card-body pb-0">
              <div class="row d-flex align-items-stretch">
                @foreach($data['players'] as $player)
                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
                  <div class="card bg-light">
                    <div class="card-header text-muted border-bottom-0">
                      Player
                    </div>
                    <div class="card-body pt-0">
                      <div class="row">
                        <div class="col-7">
                          <h2 class="lead"><b>{{$player->name}}</b></h2>
                          <p class="text-muted text-sm"><b>Job: </b> {{$player->job}} </p>
                          <ul class="ml-4 mb-0 fa-ul text-muted">
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-building"></i></span> Address:{!!$player->player_address!!}</li>
                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span> Phone #: {{$player->player_phone_number}}</li>
                          </ul>
                        </div>
                        <div class="col-5 text-center">
                            <img src="/soccer/public/storage/player_pic/{{$player->player_pic}}" alt="" class="img-circle img-fluid">
                        </div>
                      </div>
                    </div>
                    <div class="card-footer">
                      <div class="text-right">
                        <a href="/soccer/public/dashboard/players/{{$player->id}}" class="btn btn-sm btn-primary">
                          <i class="fas fa-user"></i> View Profile
                        </a>
                          @if($data['flag'] == 1)
                          <a href="/soccer/public/dashboard/players/add/{{$data['team']->id}}/{{$player->id}}" class="btn btn-sm btn-success btn-sm">Add Player</a>
                          @endif
                        </div>
                    </div>
                  </div>
                </div>
                @endforeach
              </div>
            </div>
@endsection