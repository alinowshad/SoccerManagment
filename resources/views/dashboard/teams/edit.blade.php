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
                        <h3 class="card-title">Edit Team</h3>
                      </div>
                      <!-- /.card-header -->
                      <!-- form start -->
                      {!! Form::open(['action' => ['TeamController@update', $data['team']->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                        <div class="card-body">
                          <div class="form-group">
                                {{Form::label('name', 'Name')}}
                                {{Form::text('name', $data['team']->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
                          </div>
                          <div class="form-group">
                                {{Form::label('team_gender', 'Team Gender')}}
                                {{Form::text('team_gender', $data['team']->team_gender, ['class' => 'form-control', 'placeholder' => 'Team Gender'])}}
                        </div>
                          <div class="form-group">
                              {{Form::label('team_leader_name', 'Team Leader Name')}}
                              {{Form::text('team_leader_name', $data['team']->team_leader_name, ['class' => 'form-control', 'placeholder' => 'Team Leader'])}}
                              </div>
                          <div class="form-group">
                              {{Form::label('team_leader_decription', 'Team Leader Description')}}
                              {{Form::textarea('team_leader_decription', $data['team']->team_leader_decription, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
                        </div>
                          <div class="form-group">
                            {{Form::label('team_pic', 'Team Flag')}}
                            <div class="input-group">
                              <div class="custom-file">
                                    {{Form::file('team_pic')}}
                                <label class="custom-file-label" for="cover_image">Choose file</label>
                              </div>
                              <div class="input-group-append">
                                <span class="input-group-text" id="">Upload</span>
                              </div>
                            </div>
                          </div>
                        </div>
                        <!-- /.card-body -->
        
                        <div class="card-footer">
                            {{Form::hidden('_method', 'PUT')}}
                            {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
                        </div>
                        {!! Form::close() !!}
                    </div>
        </div>    
@endsection