<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'SIReKa') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
		<link rel="icon" href="/pictures/itslogo.png">

		<link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"
    />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
		<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/redmond/jquery-ui.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
		<script src="https://code.highcharts.com/highcharts.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
		<script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-autocolors"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
		<link rel="stylesheet" type="text/css" href="//ajax.googleapis.com/ajax/libs/jqueryui/1.8.16/themes/redmond/jquery-ui.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/webcamjs/1.0.25/webcam.min.js"></script>
    	<script defer src="/js/script.js"></script>
        @vite('resources/css/app.css')

        <style>
			.active {
				background-color: #FFFFFF;
				color: black;
				box-shadow: 2px 5px 5px #e0e0de;
			}
        </style>
    </head>
    <body class="h-screen">
	
		<button id="sidebarSmall" data-drawer-target="sidebar-multi-level-sidebar" data-drawer-toggle="sidebar-multi-level-sidebar" aria-controls="sidebar-multi-level-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-yellow-600 rounded-lg lg:hidden hover:bg-white focus:outline-none focus:ring-2 focus:ring-yellow-500 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600 z-10">
			<span class="sr-only">Open sidebar</span>
			<img style="width: 25px;" src="/pictures/icon/list.png" alt="">
		</button>

		<aside id="sidebar" class="fixed top-0 left-0 z-10 w-64 h-screen transition-transform -translate-x-full lg:translate-x-0 text-zinc-950" aria-label="Sidebar">
			<div class="h-full px-3 py-4 overflow-y-auto bgSecondITS dark:bg-gray-800">
				<ul class="space-y-2 tx-Poppins darkBlue text-md">
					<li>
					<a class="flex items-center w-full px-3 mt-3 pb-4" href="#">
						<img src="/pictures/icon/logoITS.png" class="w-8 h-8 fill-current" alt="">
						<span class="ml-2 text-lg font-semibold">SIREKLAS</span>
					</a>
					</li>
					<li>
					<a class="flex text-dark items-center w-full h-12 px-3 mt-2 rounded hover:bg-white-900 hover:shadow-md {{ Request::is('admin') ? 'active': '';}}" href="{{route('dashboardAdmin')}}">
							<img style="width: 25px;" src="/pictures/icon/home.png" alt="">
								<span class="ml-4 font-medium ">Home</span>
							</a>
					</li>
					<li>
					<a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-white hover:shadow-md {{ Request::is('admin/reservasi') ? 'active': '';}}" href="{{route('admin-reservasi')}}">
							<img style="width: 25px;" src="/pictures/icon/list.png" alt="">
								<span class="ml-4  font-medium">Reservasi</span>
					</a>
					</li>
					<li>
					<a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-white hover:shadow-md {{ Request::is('admin/ruangan', '||', 'admin/ruangan/Lantai4', '||', 'admin/ruangan/Lantai5', '||', 'admin/ruangan/Lantai6', '||', 'admin/ruangan/Lantai7', '||', 'admin/ruangan/Lantai8') ? 'active': '';}}" href="{{route('admin-ruangan')}}">
						<img style="width: 25px;" src="/pictures/icon/view.png" alt="">
								<span class="ml-4  font-medium">View</span>
							</a>
					</li>
					<li>
					<a class=" flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-white hover:shadow-md {{ Request::is('admin/jadwal') ? 'active': '';}}" href="{{route('admin-jadwal')}}">
							<img style="width: 25px;" src="/pictures/icon/calendar.png" alt="">
								<span class="ml-4  font-medium">Jadwal</span>
							</a>
					</li>
					<li>
					<a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-white hover:shadow-md {{ Request::is('admin/report') ? 'active': '';}}" href="{{route('report')}}" >
								<img style="width: 25px;" src="/pictures/icon/report.png" alt="">
								<span class="ml-4  font-medium">Report</span>
							</a>
					</li>
					<li>
						<a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-white hover:shadow-md {{ Request::is('admin/staff') ? 'active': '';}}" href="{{route('admin-staff')}}" >
							<img style="width: 25px;" src="/pictures/icon/profil.png" alt="">
							<span class="ml-4  font-medium">Staff</span>
						</a>
					</li>
					<li>
					<div class="p-0.5 rounded-full max-w-sm bg-gradient-to-r from-rose-400 via-fuchsia-500 to-indigo-500"></div>
						<div class="flex flex-col items-center w-full mt-2">
							<a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-white hover:shadow-md" href="#">
								<img style="width: 25px;" src="/pictures/icon/settings.png" alt="">
								<span class="ml-4 font-medium">Settings</span>
							</a>
							<form class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-white hover:shadow-md" action="/logout" method="GET">
								@csrf
								<img style="width: 25px;" src="/pictures/icon/logout.png" alt="">
									<button type="submit" class="ml-4 font-medium">Logout</button>
							</form>
						</div>
					</li>
					<li>
					<a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-white hover:shadow-md" href="#">
								<span class="ml-4 font-bold text-blue-500">{{{Auth::user()->name}}}</span>
							</a>
					</li>
				</ul>
			</div>
		</aside>

		<div class="lg:ml-64">
		<div class="border-gray-200 rounded-lg dark:border-gray-700 bgSecondITS">
			@yield('content')
		</div>
		</div>

		<script>
		document.getElementById('sidebarSmall').onclick = function(){
			document.getElementById("sidebar").classList.toggle("-translate-x-full");
			document.getElementById("sidebarSmall").classList.toggle("pl-52");
		}
		</script>
	</body>
</html>
