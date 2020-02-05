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
    <div class="row justify-content-center">
        <div class="col-md-10">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Create Player</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  {!! Form::open(['action' => 'PlayerController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="card-body">
                      <div class="form-group">
                        {{Form::label('name',  'Player Name')}}
                        {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Player Name'])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('team_id', 'Team Id')}}
                        {{Form::number('team_id', $data['team']->id, ['class' => 'form-control', 'placeholder' => 'Team Id'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('job', 'Job')}}
                            {{Form::text('job', '', ['class' => 'form-control', 'placeholder' => 'Place in the Team'])}}
                            </div>
                        <div class="form-group">
                            {{Form::label('player_phone_number', 'Player Phone Number')}}
                            {{Form::number('player_phone_number', '', ['class' => 'form-control', 'placeholder' => ''])}}
                         </div>
                         <div class="form-group">
                            {{Form::label('player_email', 'Player Email Address')}}
                            {{Form::email('player_email', '', ['class' => 'form-control', 'placeholder' => 'Email'])}}
                        </div>
                        <div class="form-group">
                            {{Form::label('player_address', 'Player Address')}}
                            {{Form::textarea('player_address', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Write Something About Your Self'])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('player_pic', 'Player Picture')}}
                        <div class="input-group">
                          <div class="custom-file">
                            {{Form::file('player_pic')}}
                            <label class="custom-file-label" for="player_pic">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
                    </div>
                    {!! Form::close() !!}
                </div>
    </div>    
@endsection