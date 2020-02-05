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
                @if($user->user_type == 1)
                <li class="nav-item">
                  <a href="/soccer/public/dashboard/users/create" class="nav-link">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                      Create Admin
                      <span class="right badge badge-danger"></span>
                    </p>
                  </a>
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
        <a href="#"><b>Admin</b></a>
      </div>
    
      <div class="card">
        <div class="card-body register-card-body">
          <p class="login-box-msg">Create New Admin</p>
          <form class="form-horizontal" method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
            {{ csrf_field() }}

            <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                <label for="name" class="col-md-6 control-label">Name</label>

                <div class="col-md-12">
                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                    @if ($errors->has('name'))
                        <span class="help-block">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                <label for="email" class="col-md-6 control-label">E-Mail Address</label>

                <div class="col-md-12">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                <label for="password" class="col-md-6 control-label">Password</label>

                <div class="col-md-12">
                    <input id="password" type="password" class="form-control" name="password" required>

                    @if ($errors->has('password'))
                        <span class="help-block">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="form-group">
                <label for="password-confirm" class="col-md-6 control-label">Confirm Password</label>

                <div class="col-md-12">
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                </div>
                <hr>
            </div>
            <div class="form-group">
                    {{Form::label('user_pic', 'Admin Picture')}}
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
                    <button type="submit" class="btn btn-primary">
                        Create
                    </button>
                </div>
            </div>
        </form>
    
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