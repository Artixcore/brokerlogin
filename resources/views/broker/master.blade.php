<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>


	<link href="{{ asset('frontend/css/app.css')}}" rel="stylesheet">
	<link href="{{ asset('frontend/css/bootstrap.css')}}" rel="stylesheet">
	<link href="{{ asset('frontend/css/dataTables.css')}}" rel="stylesheet">
  	<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
   {{-- Data Table --}}
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/date-1.1.1/r-2.2.9/rr-1.2.8/sb-1.3.0/sp-1.4.0/datatables.min.css"/>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs5/jq-3.6.0/dt-1.11.3/date-1.1.1/r-2.2.9/rr-1.2.8/sb-1.3.0/sp-1.4.0/datatables.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    .ca{
    background-color:#B62828;
    }
    strong{
    color: #B62828;
    }
    .card-title{
    color: #B62828;
    }
    th{
    color: #B62828;
    }
</style>
  @yield('style_css')
</head>
<body>
	<div class="wrapper">
		<nav id="sidebar" class="sidebar js-sidebar">
			<div class="sidebar-content js-simplebar">
				<a class="sidebar-brand" style="text-decoration: none;" href="#">
          <span class="align-middle">Maklerpanel</span>
        </a>

		<ul class="sidebar-nav">

		<li class="sidebar-item">
			<a class="sidebar-link" href="{{route('broker.dashboard')}}">
              <i style="color: #000000;"class="align-middle" data-feather="sliders"></i> <span class="align-middle">Dashboard</span>
            </a>
		</li>

        <li class="sidebar-item">
			<a class="sidebar-link" href="{{route('broker.form')}}">
              <i style="color: #000000;"class="align-middle fas fa-coffee"></i> <span class="align-middle">Angebot</span>
            </a>
		</li>

		<li class="sidebar-item">
			<a class="sidebar-link" href="{{route('broker.customer')}}">
              <i style="color: #000000;"class="align-middle fas fa-mug-hot"></i> <span class="align-middle">Kunden</span>

            </a>
		</li>

        <li class="sidebar-item">
			<a class="sidebar-link" href="{{route('broker.contact')}}">
              <i style="color: #000000;"class="align-middle far fa-address-book"></i> <span class="align-middle">Verträge</span>
            </a>
		</li>

    <li class="sidebar-item">
			<a class="sidebar-link" href="{{route('broker.fremdvertrag')}}">
              <i style="color: #000000;"class="align-middle far fa-address-book"></i> <span class="align-middle">Fremdverträge</span>
            </a>
		</li>

        <li class="sidebar-item">
			<a class="sidebar-link" href="{{route('broker.task')}}">
              <i style="color: #000000;"class="align-middle fas fa-tasks"></i> <span class="align-middle">Aufgabe</span>
            </a>
		</li>

        <li class="sidebar-item">
			<a class="sidebar-link" href="{{route('broker.lead')}}">
              <i style="color: #000000;"class="align-middle fas fa-chalkboard"></i> <span class="align-middle">Lead</span>
            </a>
		</li>

     	</ul>
			</div>
		</nav>

		<div class="main">
			<nav class="navbar navbar-expand fixed-top navbar-light navbar-bg">
				<a class="sidebar-toggle js-sidebar-toggle" style="color: #B62828;">
                <i style="color: #000000;" class="hamburger align-self-center"></i>
                </a>

				<div class="navbar-collapse collapse">
					<ul class="navbar-nav navbar-align">

                        {{-- <li class="nav-item">
							<a class="nav-item btn btn-outline-primary" href="#" data-bs-toggle="modal" data-bs-target="#task">
								<div class="position-relative">
									<i style="color: #000000;"class="align-middle fas fa-plus-square"></i>  Neue Aufgabe
								</div>
							</a>
						</li> --}}

						{{-- <li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle" href="#" id="alertsDropdown" data-bs-toggle="dropdown">
								<div class="position-relative">
									<i style="color: #000000;"class="align-middle" data-feather="bell"></i>
									<span class="indicator">1</span>
								</div>
							</a>
							<div class="dropdown-menu dropdown-menu-lg dropdown-menu-end py-0" aria-labelledby="alertsDropdown">

								<div class="list-group">
									<a href="#" class="list-group-item">
										<div class="row g-0 align-items-center">
											<div class="col-2">
												<i style="color: #000000;"class="text-danger" data-feather="alert-circle"></i>
											</div>
											<div class="col-10">
												<div class="text-dark">Update completed</div>

												<div class="text-muted small mt-1">30m ago</div>
											</div>
										</div>
									</a>

								</div>
								<div class="dropdown-menu-footer">
									<a href="#" class="text-muted">all notifications</a>
								</div>
							</div>
						</li> --}}

						<li class="nav-item dropdown">
							<a class="nav-icon dropdown-toggle d-inline-block d-sm-none" href="#" data-bs-toggle="dropdown">
                <i style="color: #000000;"class="align-middle" data-feather="settings"></i>
               </a>

			<a class="nav-link dropdown-toggle d-none d-sm-inline-block" href="#" data-bs-toggle="dropdown">
                <img src="{{asset('user')}}/{{Auth::user()->avatar}}" class="avatar img-fluid rounded me-1" alt="{{ Auth::user()->name }}" /> <span class="text-dark">{{ Auth::user()->name }}</span>
              </a>
			<div class="dropdown-menu dropdown-menu-end">
				<a class="dropdown-item" href="{{ route('broker.profile', Auth::user()->name ) }}"><i style="color: #000000;"class="align-middle me-1" data-feather="user"></i> Profile</a>
                <a class="dropdown-item" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                 document.getElementById('logout-form').submit();">
                    Ausloggen
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
							</div>
						</li>
					</ul>
				</div>
			</nav>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper mt-3 mb-4 py-4">
	<div class="container mt-3 mb-4 py-4">

        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible fade show alert-block">
        <b>{{ $message }}</b>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        @endif

    <!-- Content Header (Page header) -->
        @yield('content')

  </div>
  </div>


</div>
</div>

<!-- Task -->
<div class="modal fade" id="task" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Neue Aufgabe</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <form action="{{route('broker.savetask')}}" method="POST" enctype="multipart/form-data">
            @csrf
        <div class="modal-body">

            <div class="mb-3">

            <select name="type_of_task" class="form-control" id="">
                    <option selected>Art der Aufgabe</option>
                    <option value="Rückruf">Rückruf</option>
                    <option value="Offertenanfrage">Offertenanfrage</option>
                    <option value="Sonstiges">Sonstiges</option>
            </select>
            </div>

            <div class="mb-3">
            <input type="date" class="form-control" name="task_date">
            </div>

            <div class="mb-3">
            <input type="hidden" class="form-control" name="user_id" value="{{ Auth::user()->id }}">
            <input type="time" class="form-control" name="task_hour">
            </div>

            <div class="mb-3">
            <input type="text" class="form-control" name="task_place" placeholder="Place">
            </div>

            <div class="mb-3">
            <textarea type="text" class="form-control" name="task_note" placeholder="Note"></textarea>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">speichern </button>
        </div>
       </form>
      </div>
    </div>
  </div>
</div>

</div>



<script src="{{ asset('frontend/js/app.js')}}"></script>
<script>
    function myFunction() {
        if(!confirm("Bist Du sicher?"))
        event.preventDefault();
    }
</script>
@yield('footer_js')

</body>

</html>
