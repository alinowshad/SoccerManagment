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
                @if($data['user']->user_type == 1)
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
<div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Users</h3>

          <div class="card-tools">
          </div>
        </div>
        <!-- /.card-header -->
        @if(count($data['users']) > 0)
        <div class="card-body table-responsive p-0">
          <table class="table table-hover text-nowrap">
            <thead>
              <tr>
                <th>User Picture</th>
                <th>User ID</th>
                <th>User Name</th>
                <th>User Email</th>
                <th>created_at</th>
              </tr>
            </thead>
            <tbody>
            @foreach($data['users'] as $user)
              <tr>
                <td>
                      <div class="user-panel mt-3 pb-3 mb-3 d-flex">  
                          <div class="image">
                            <img src="/soccer/public/storage/user_pic/{{$user->user_pic}}" class="img-circle elevation-2" alt="User Image">
                          </div>  
                      </div> 
                  </td>
                <td>
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                      {{$user->id}}
                    </div>
                </td>
                <td>
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                      {{$user->name}}
                    </div>
                </td>
                <td>
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                      {{$user->email}}
                    </div>
                </td>
                <td>
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                      {{$user->created_at}}
                    </div>
                </td>
                <td><span class="tag tag-success"></span></td>
                <td>
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        {!!Form::open(['action' => ['UserController@destroy', $user->id], 'method'=>'POST', 'class' => 'pull-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-sm btn-danger float-left'])}}
                        {!!Form::close()!!}
                    </div>
                </td>
              </tr>
            @endforeach
            </tbody>
          </table>
        </div>
        @else
            <div class="card-body table-responsive p-0">
                <p align="center" >There Is No User</p>
            </div>
        <!-- /.card-body -->
        @endif
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->
@endsection