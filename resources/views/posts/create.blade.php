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
    <div class="row justify-content-center">
        <div class="col-md-10">
                <!-- general form elements -->
                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Create Post</h3>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
                    <div class="card-body">
                      <div class="form-group">
                        {{Form::label('title', 'Title')}}
                        {{Form::text('title', '', ['class' => 'form-control', 'placeholder' => 'Title'])}}
                      </div>
                      <div class="form-group">
                        {{Form::label('body', 'Body')}}
                        {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
                    </div>
                      <div class="form-group">
                        {{Form::label('cover_image', 'Cover Image  ')}}
                        <div class="input-group">
                          <div class="custom-file">
                            {{Form::file('cover_image')}}
                            <label class="custom-file-label" for="cover_image">Choose file</label>
                          </div>
                          <div class="input-group-append">
                            <span class="input-group-text" id="">Upload</span>
                          </div>
                        </div>
                      </div>
                      <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="exampleCheck1">
                        <label class="form-check-label" for="exampleCheck1">Check me out</label>
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