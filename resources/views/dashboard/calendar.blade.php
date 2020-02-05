
@extends('layouts.master')
@section('head')
<link rel="stylesheet" href="http://localhost/soccer/node_modules/adminlte/plugins/fullcalendar/main.min.css">
<link rel="stylesheet" href="http://localhost/soccer/node_modules/adminlte/plugins/fullcalendar-daygrid/main.min.css">
<link rel="stylesheet" href="http://localhost/soccer/node_modules/adminlte/plugins/fullcalendar-timegrid/main.min.css">
<link rel="stylesheet" href="http://localhost/soccer/node_modules/adminlte/plugins/fullcalendar-bootstrap/main.min.css">
@endsection
@section('mainsidebar')
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
              @if($user->user_type == 1)
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
  <!-- Content Wrapper. Contains page content -->
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-3">
            <div class="sticky-top mb-3">
              <div class="card">
                <div class="card-header">
                  <h4 class="card-title">Draggable Events</h4>
                </div>
                <div class="card-body">
                  <!-- the events -->
                  <div id="external-events">
                    <div class="external-event bg-success">Lunch</div>
                    <div class="external-event bg-warning">Go home</div>
                    <div class="external-event bg-info">Do homework</div>
                    <div class="external-event bg-primary">Work on UI design</div>
                    <div class="external-event bg-danger">Sleep tight</div>
                    <div class="checkbox">
                      <label for="drop-remove">
                        <input type="checkbox" id="drop-remove">
                        remove after drop
                      </label>
                    </div>
                  </div>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Create Event</h3>
                </div>
                <div class="card-body">
                  <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                    <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                    <ul class="fc-color-picker" id="color-chooser">
                      <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                      <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                    </ul>
                  </div>
                  <!-- /btn-group -->
                  <div class="input-group">
                    <input id="new-event" type="text" class="form-control" placeholder="Event Title">

                    <div class="input-group-append">
                      <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                    </div>
                    <!-- /btn-group -->
                  </div>
                  <!-- /input-group -->
                </div>
              </div>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-md-9">
            <div class="card card-primary">
              <div class="card-body p-0">
                <!-- THE CALENDAR -->
                <div id="calendar"></div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
<!-- jQuery -->
<script src="http://localhost/soccer/node_modules/adminlte/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<!-- jQuery UI -->
<!-- AdminLTE App -->
<!-- AdminLTE for demo purposes -->
<!-- fullCalendar 2.2.5 -->
<script src="http://localhost/soccer/node_modules/adminlte/plugins/moment/moment.min.js"></script>
<script src="http://localhost/soccer/node_modules/adminlte/plugins/fullcalendar/main.min.js"></script>
<script src="http://localhost/soccer/node_modules/adminlte/plugins/fullcalendar-daygrid/main.min.js"></script>
<script src="http://localhost/soccer/node_modules/adminlte/plugins/fullcalendar-timegrid/main.min.js"></script>
<script src="http://localhost/soccer/node_modules/adminlte/plugins/fullcalendar-interaction/main.min.js"></script>
<script src="http://localhost/soccer/node_modules/adminlte/plugins/fullcalendar-bootstrap/main.min.js"></script>

<!-- Page specific script -->
<script>
  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function ini_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    ini_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()

    var Calendar = FullCalendar.Calendar;
    var Draggable = FullCalendarInteraction.Draggable;

    var containerEl = document.getElementById('external-events');
    var checkbox = document.getElementById('drop-remove');
    var calendarEl = document.getElementById('calendar');

    // initialize the external events
    // -----------------------------------------------------------------

    new Draggable(containerEl, {
      itemSelector: '.external-event',
      eventData: function(eventEl) {
        console.log(eventEl);
        return {
          title: eventEl.innerText,
          backgroundColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          borderColor: window.getComputedStyle( eventEl ,null).getPropertyValue('background-color'),
          textColor: window.getComputedStyle( eventEl ,null).getPropertyValue('color'),
        };
      }
    });

    var calendar = new Calendar(calendarEl, {
      plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      //Random default events
      events    : [
        {
          title          : 'All Day Event',
          start          : new Date(y, m, 1),
          backgroundColor: '#f56954', //red
          borderColor    : '#f56954', //red
          allDay         : true
        },
        {
          title          : 'Long Event',
          start          : new Date(y, m, d - 5),
          end            : new Date(y, m, d - 2),
          backgroundColor: '#f39c12', //yellow
          borderColor    : '#f39c12' //yellow
        },
        {
          title          : 'Meeting',
          start          : new Date(y, m, d, 10, 30),
          allDay         : false,
          backgroundColor: '#0073b7', //Blue
          borderColor    : '#0073b7' //Blue
        },
        {
          title          : 'Lunch',
          start          : new Date(y, m, d, 12, 0),
          end            : new Date(y, m, d, 14, 0),
          allDay         : false,
          backgroundColor: '#00c0ef', //Info (aqua)
          borderColor    : '#00c0ef' //Info (aqua)
        },
        {
          title          : 'Birthday Party',
          start          : new Date(y, m, d + 1, 19, 0),
          end            : new Date(y, m, d + 1, 22, 30),
          allDay         : false,
          backgroundColor: '#00a65a', //Success (green)
          borderColor    : '#00a65a' //Success (green)
        },
        {
          title          : 'Click for Google',
          start          : new Date(y, m, 28),
          end            : new Date(y, m, 29),
          url            : 'http://google.com/',
          backgroundColor: '#3c8dbc', //Primary (light-blue)
          borderColor    : '#3c8dbc' //Primary (light-blue)
        }
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      drop      : function(info) {
        // is the "remove after drop" checkbox checked?
        if (checkbox.checked) {
          // if so, remove the element from the "Draggable Events" list
          info.draggedEl.parentNode.removeChild(info.draggedEl);
        }
      }    
    });

    calendar.render();
    // $('#calendar').fullCalendar()

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({
        'background-color': currColor,
        'border-color'    : currColor
      })
    })
    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      ini_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })
</script>

@endsection