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
                <img src="/soccer/public/storage/user_pic/{{$user->user_pic}}" class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                <a href="#" class="d-block">{{$user->name}}</a>
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
                  @if($user->user_type == 1)
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="/soccer/public/dashboard/posts" class="nav-link active">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Posts</p>
                      </a>
                    </li>
                    <li class="nav-item">
                      <a href="/soccer/public/dashboard/users" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Users</p>
                      </a>
                    </li>
                  </ul>
                </li>
                <li class="nav-item">
                  <a href="/soccer/public/dashboard/users/create" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                      Create Admin
                      <span class="right badge badge-danger"></span>
                    </p>
                  </a>
                </li>
                @else
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
                @endif
                <li class="nav-item">
                    <a href="/soccer/public/dashboard/users/{{$user->id}}/edit" class="nav-link">
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
<body align="center" class="hold-transition register-page">
<div class="row justify-content-center">
    <div class="register-box">
      <div class="register-logo">
        <a href="#"><b>Edit Profile</b></a>
      </div>
    
      <div class="card">
        <div class="card-body register-card-body">
          <p class="login-box-msg">Edit Your Profile Info</p>
          {!! Form::open(['action' => ['UserController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}


            <div class="form-group">
                <label for="name" class="col-md-6 control-label">Name</label>
                <div class="col-md-12">
                    {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
                </div>
            </div>

            <div class="form-group">
                <label for="email" class="col-md-6 control-label">E-Mail Address</label>
                <div class="col-md-12">
                    {{Form::email('email', $user->email, ['class' => 'form-control', 'placeholder' => 'Email'])}}
                </div>
            </div>
            <div class="form-group">
                    {{Form::label('user_pic', 'User Picture')}}
                    <div class="input-group">
                      <div class="custom-file">
                        {{Form::file('user_pic')}}
                        <label class="custom-file-label" for="user_pic">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text" id="">Upload</span>
                      </div>
                    </div>
                  </div>
                <br>
            <div class="form-group">
                <div class="col-md-12 col-md-offset-4">
                    {{Form::submit('Submit', ['class'=> 'btn btn-primary'])}}
                </div>
            </div>
            {!! Form::close() !!}
    
          <div class="social-auth-links text-center">
          </div>
        </div>
        <!-- /.form-box -->
      </div><!-- /.card -->
    </div>
    <!-- /.register-box -->
</div>
    </body>
@endsection