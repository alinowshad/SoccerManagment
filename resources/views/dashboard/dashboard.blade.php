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
                  @if($data['user']->user_type == 1)
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
                  @else
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
                  @endif
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
<div class="container-fluid">
        <!-- Info boxes -->
        <div class="row">
          @if($data['user']->user_type == 1)
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box">
              <span class="info-box-icon bg-info elevation-1"><i class="fas fa-cog"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">CPU Traffic</span>
                <span class="info-box-number">
                  10
                  <small>%</small>
                </span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          @endif

          <!-- /.col -->
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-thumbs-up"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Likes</span>
                <span class="info-box-number">41,410</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          <!-- /.col -->

          <!-- fix for small devices only -->
          <div class="clearfix hidden-md-up"></div>
          @if($data['user']->user_type == 1)
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-success elevation-1"><i class="fas fa-file"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Posts</span>
                <span class="info-box-number">{{count($data['allposts'])}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          @else
          <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-user"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Players</span>
                  <span class="info-box-number">{{count($data['players'])}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          @endif
          <!-- /.col -->
          @if($data['user']->user_type == 1)
          <div class="col-12 col-sm-6 col-md-3">
            <div class="info-box mb-3">
              <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>

              <div class="info-box-content">
                <span class="info-box-text">Members</span>
                <span class="info-box-number">{{count($data['users'])}}</span>
              </div>
              <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
          </div>
          @else
          <div class="col-12 col-sm-6 col-md-3">
              <div class="info-box mb-3">
                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-users"></i></span>
  
                <div class="info-box-content">
                  <span class="info-box-text">Teams</span>
                  <span class="info-box-number">{{count($data['teams'])}}</span>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
          @endif
          <!-- /.col -->
        </div>
        <!-- /.row -->
        <!-- /.row -->

        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <div class="col-md-8">
            <!-- MAP & BOX PANE -->
            <!-- /.card -->
            <div class="row">
              <div class="col-md-6">
                <!-- DIRECT CHAT -->
                <div class="card  bg-gradient-success">
                  <div class="card-header">
                        <h3 class="card-title">
                                <i class="far fa-calendar-alt"></i>
                                Calendar
                        </h3>
                        <div class="card-tools">
                                <!-- button with a dropdown -->
                                <div class="btn-group">
                                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                                    <i class="fas fa-bars"></i></button>
                                  <div class="dropdown-menu float-right" role="menu">
                                    <div class="dropdown-divider"></div>
                                    <a href="#" class="dropdown-item">View calendar</a>
                                  </div>
                                </div>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                  <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                  <i class="fas fa-times"></i>
                                </button>
                        </div>
                        <div class="card-body pt-0">
                                <!--The calendar -->
                                <div id="calendar" style="width: 100%">
                                </div>
                        </div>
                  </div>
                  <!-- /.card-header -->
                </div>
                <!--/.direct-chat -->
              </div>
              <!-- /.col -->

              <div class="col-md-6">
                <!-- USERS LIST -->
                <div class="card">
                @if($data["user_type"] == 1)
                    <div class="card-header">
                        <h3 class="card-title">Latest Members</h3>

                        <div class="card-tools">
                        <span class="badge badge-danger">8 Lastest Members</span>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                        </button>
                        </div>
                    </div>
                  <!-- /.card-header -->
                    <div class="card-body p-0">
                        <ul class="users-list clearfix">
                    @foreach($data['users'] as $user)
                        <li>
                            <img src="/soccer/public/storage/user_pic/{{$user->user_pic}}" alt="User Image">
                            <a class="users-list-name" href="#">{{$user->name}}</a>
                            <span class="users-list-date">{{$user->created_at}}</span>
                        </li>
                    @endforeach
                        </ul>
                        <!-- /.users-list -->
                    </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="/soccer/public/dashboard/users">View All Users</a>
                  </div>
                  <!-- /.card-footer -->
                @else
                <div class="card-header">
                        <h3 class="card-title">Teams</h3>

                        <div class="card-tools">
                        <span class="badge badge-danger">8 Last Teams</span>
                        <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                        </button>
                        </div>
                    </div>
                  <!-- /.card-header -->
                    <div class="card-body p-0">
                        <ul class="users-list clearfix">
                    @foreach($data['teams'] as $team)
                        <li>
                            <img src="/soccer/public/storage/team_pic/{{$team->team_pic}}" alt="User Image">
                            <a class="users-list-name" href="/soccer/public/dashboard/teams/{{$team->id}}">{{$team->name}}</a>
                            <span class="users-list-date">{{$team->created_at}}</span>
                        </li>
                    @endforeach
                        </ul>
                        <!-- /.users-list -->
                    </div>
                  <!-- /.card-body -->
                  <div class="card-footer text-center">
                    <a href="/soccer/public/dashboard/teams">View All Teams</a>
                  </div>
                  <!-- /.card-footer -->
                  @endif
                </div>
                <!--/.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->

            <!-- TABLE: LATEST ORDERS -->
        @if($data["user_type"] == 1)
            <div class="card">
              <div class="card-header border-transparent">
                <h3 class="card-title">Latest Posts</h3>

                <div class="card-tools">
                  <button type="button" class="btn btn-tool" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-tool" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <!-- /.card-header -->
            @if(count($data['posts']) > 0)
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table m-0">
                    <thead>
                    <tr>
                      <th>Title</th>
                      <th>User Name</th>
                      <th>Category</th>
                      <th>Created At</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php $counter = 0; ?>
                    @foreach ($data['posts'] as $post)
                        @if($counter < 5)
                            <?php $counter++ ?>
                            <tr>
                            <td><a href="#">{{$post->title}}</a></td>
                            <td>{{$post->user->name}}</td>
                            <td><span class="badge badge-success">Category</span></td>
                            <td>
                                <div class="sparkbar" data-color="#00a65a" data-height="20">{{$post->created_at}}</div>
                            </td>
                            </tr>
                        @else
                            @break
                        @endif
                    @endforeach
                    </tbody>
                  </table>

                </div>
                <!-- /.table-responsive -->
              </div>
            @else
                <div class="card-body p-0">
                    <p align="center">You Have No Post</p>
                </div>
            @endif
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <a href="/soccer/public/posts/create" class="btn btn-sm btn-info float-left">Create New Post</a>
                @if(count($data['posts']) > 0)
                <a href="/soccer/public/dashboard/posts" class="btn btn-sm btn-secondary float-right">View All Posts</a>
                @endif
              </div>
              <!-- /.card-footer -->
            </div>
            @endif
            <!-- /.card -->
        </div>
        <div class="col-md-4">
          @if($data['user_type'] == 0)
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Latest Players</h3>

                  <div class="card-tools">
                    <span class="badge badge-danger">8 New Player</span>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="users-list clearfix">
                    @foreach($data['players8'] as $player)
                    <li>
                        <img src="/soccer/public/storage/player_pic/{{$player->player_pic}}" alt="User Image">
                        <a class="users-list-name" href="/soccer/public/dashboard/players/{{$player->id}}">{{$player->name}}</a>
                        <span class="users-list-date">{{$player->created_at}}</span>
                    </li>
                    @endforeach
                  </ul>
                  <!-- /.users-list -->
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="/soccer/public/dashboard/allplayers">View All Players</a>
                </div>
                <!-- /.card-footer -->
              </div>
            @endif
            @if($data["user_type"] == 1)  
            <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Recently Added Posts</h3>
  
                  <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                      <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                      <i class="fas fa-times"></i>
                    </button>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body p-0">
                  <ul class="products-list product-list-in-card pl-2 pr-2">
                  @foreach($data['allposts'] as $post)
                      <li class="item">
                          <div class="product-img">
                          <img src="/soccer/public/storage/cover_image/{{$post->cover_image}}" alt="Product Image" class="img-size-50">
                          </div>
                          <div class="product-info">
                          <a href="javascript:void(0)" class="product-title">{{substr($post->title, 0, 20)}}
                              <span class="badge badge-warning float-right">Category</span></a>
                          <span class="product-description">
                                  {!!substr($post->body, 0, 40)!!}
                          </span>
                          </div>
                      </li>
                  @endforeach
                    <!-- /.item -->
                  </ul>
                </div>
                <!-- /.card-body -->
                <div class="card-footer text-center">
                  <a href="/soccer/public/dashboard/posts" class="uppercase">View All Posts</a>
                </div>
                <!-- /.card-footer -->
              </div>
              @endif
        
        
          </div>
          <!-- /.col -->
            <!-- /.info-box -->
            <!-- /.card -->            
            <!-- PRODUCT LIST -->
       
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!--/. container-fluid -->
@endsection
