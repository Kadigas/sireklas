<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name', 'SIReKa') }}</title>

        <!-- Fonts -->
        <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

		<link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css"
    />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
		<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
        @vite('resources/css/app.css')

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
			.active {
				background-color: rgba(55, 65, 81, 0.7);
				color: white;
				border-radius: 10px;
			}
        </style>
    </head>
    <body class="flex w-screen h-screen bg-white-700">
	<span
      class="absolute text-white text-4xl top-5 left-4 cursor-pointer"
      onclick="openSidebar()"
    >
      <i class="bi bi-filter-left px-2 bg-gray-900 rounded-md"></i>
    </span>
	<!-- Component Start -->
	<div class="sidebar fixed z-10 flex flex-col items-center w-40 h-full overflow-hidden text-gray-400 bg-blue-900 rounded">
	<i
            class="bi bi-x cursor-pointer ml-28 lg:hidden"
            onclick="openSidebar()"
          ></i>
		<a class="flex items-center w-full px-3 mt-3" href="#">
			<svg class="w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
				<path d="M11 17a1 1 0 001.447.894l4-2A1 1 0 0017 15V9.236a1 1 0 00-1.447-.894l-4 2a1 1 0 00-.553.894V17zM15.211 6.276a1 1 0 000-1.788l-4.764-2.382a1 1 0 00-.894 0L4.789 4.488a1 1 0 000 1.788l4.764 2.382a1 1 0 00.894 0l4.764-2.382zM4.447 8.342A1 1 0 003 9.236V15a1 1 0 00.553.894l4 2A1 1 0 009 17v-5.764a1 1 0 00-.553-.894l-4-2z" />
			</svg>
			<span class="ml-2 text-sm font-bold">SIReKa: SIM Reservasi Kelas</span>
		</a>
		<div class="w-full px-2">
			<div class="flex flex-col items-center w-full mt-3 border-t border-gray-700">
				<a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300 {{ Request::is('admin') ? 'active': '';}}" href="{{route('dashboardAdmin')}}">
				<svg class="w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 55" fill="currentColor">
					<path d="M11 39h7.5V26.5h11V39H37V19.5L24 9.75 11 19.5Zm-3 3V18L24 6l16 12v24H26.5V29.5h-5V42Zm16-17.65Z" />
				</svg>
					<span class="ml-2 text-sm font-medium">Home</span>
				</a>
				<a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300 {{ Request::is('list-reservasi') ? 'active': '';}}" href="{{route('list-reservasi')}}">
				<svg class="w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 55" fill="currentColor">
					<path d="M7.5 34q-.65 0-1.075-.425Q6 33.15 6 32.5q0-.65.425-1.075Q6.85 31 7.5 31q.65 0 1.075.425Q9 31.85 9 32.5q0 .65-.425 1.075Q8.15 34 7.5 34Zm0-8.5q-.65 0-1.075-.425Q6 24.65 6 24q0-.65.425-1.075Q6.85 22.5 7.5 22.5q.65 0 1.075.425Q9 23.35 9 24q0 .65-.425 1.075-.425.425-1.075.425Zm0-8.5q-.65 0-1.075-.425Q6 16.15 6 15.5q0-.65.425-1.075Q6.85 14 7.5 14q.65 0 1.075.425Q9 14.85 9 15.5q0 .65-.425 1.075Q8.15 17 7.5 17Zm7 17v-3H42v3Zm0-8.5v-3H42v3Zm0-8.5v-3H42v3Z" />
				</svg>
					<span class="ml-2 text-sm font-medium">Reservasi</span>
				</a>
				<a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300 {{ Request::is('view') ? 'active': '';}}" href="{{route('viewClass')}}">
				<svg class="w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 55" fill="currentColor">
					<path d="M9 42q-1.25 0-2.125-.875T6 39V9q0-1.25.875-2.125T9 6h30q1.25 0 2.125.875T42 9v30q0 1.25-.875 2.125T39 42Zm0-3h30V13H9v26Zm15-5.25q-4 0-7.15-2.15-3.15-2.15-4.6-5.6 1.45-3.45 4.6-5.6Q20 18.25 24 18.25t7.15 2.15q3.15 2.15 4.6 5.6-1.45 3.45-4.6 5.6Q28 33.75 24 33.75Zm0-2.5q2.85 0 5.25-1.4T33 26q-1.35-2.45-3.75-3.85T24 20.75q-2.85 0-5.25 1.4T15 26q1.35 2.45 3.75 3.85t5.25 1.4Zm0-2.75q-1.05 0-1.775-.725Q21.5 27.05 21.5 26q0-1.05.725-1.775Q22.95 23.5 24 23.5q1.05 0 1.775.725.725.725.725 1.775 0 1.05-.725 1.775-.725.725-1.775.725Z" />
				</svg>
					<span class="ml-2 text-sm font-medium">View</span>
				</a>
				<a class=" flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300 {{ Request::is('full-calendar') ? 'active': '';}}" href="{{route('full-calendar')}}">
				<svg class="w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 55" fill="currentColor">
					<path d="M9 44q-1.2 0-2.1-.9Q6 42.2 6 41V10q0-1.2.9-2.1Q7.8 7 9 7h3.25V4h3.25v3h17V4h3.25v3H39q1.2 0 2.1.9.9.9.9 2.1v31q0 1.2-.9 2.1-.9.9-2.1.9Zm0-3h30V19.5H9V41Zm0-24.5h30V10H9Zm0 0V10v6.5ZM24 28q-.85 0-1.425-.575Q22 26.85 22 26q0-.85.575-1.425Q23.15 24 24 24q.85 0 1.425.575Q26 25.15 26 26q0 .85-.575 1.425Q24.85 28 24 28Zm-8 0q-.85 0-1.425-.575Q14 26.85 14 26q0-.85.575-1.425Q15.15 24 16 24q.85 0 1.425.575Q18 25.15 18 26q0 .85-.575 1.425Q16.85 28 16 28Zm16 0q-.85 0-1.425-.575Q30 26.85 30 26q0-.85.575-1.425Q31.15 24 32 24q.85 0 1.425.575Q34 25.15 34 26q0 .85-.575 1.425Q32.85 28 32 28Zm-8 8q-.85 0-1.425-.575Q22 34.85 22 34q0-.85.575-1.425Q23.15 32 24 32q.85 0 1.425.575Q26 33.15 26 34q0 .85-.575 1.425Q24.85 36 24 36Zm-8 0q-.85 0-1.425-.575Q14 34.85 14 34q0-.85.575-1.425Q15.15 32 16 32q.85 0 1.425.575Q18 33.15 18 34q0 .85-.575 1.425Q16.85 36 16 36Zm16 0q-.85 0-1.425-.575Q30 34.85 30 34q0-.85.575-1.425Q31.15 32 32 32q.85 0 1.425.575Q34 33.15 34 34q0 .85-.575 1.425Q32.85 36 32 36Z" />
				</svg>
					<span class="ml-2 text-sm font-medium">Jadwal</span>
				</a>
				<a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="#">
				<svg class="w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 55" fill="currentColor">
					<path d="M24 33.95q.7 0 1.225-.525.525-.525.525-1.225 0-.7-.525-1.225Q24.7 30.45 24 30.45q-.7 0-1.225.525-.525.525-.525 1.225 0 .7.525 1.225.525.525 1.225.525Zm-1.5-7.2h3V13.6h-3ZM16.5 42 6 31.5v-15L16.5 6h15L42 16.5v15L31.5 42Zm1.25-3h12.5L39 30.25v-12.5L30.25 9h-12.5L9 17.75v12.5ZM24 24Z" />
				</svg>
					<span class="ml-2 text-sm font-medium">Report</span>
				</a>
			</div>
			<div class="flex flex-col items-center w-full mt-2 border-t border-gray-700">
				<a class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" href="#">
					<svg class="w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 55" fill="currentColor">
						<path d="m19.4 44-1-6.3q-.95-.35-2-.95t-1.85-1.25l-5.9 2.7L4 30l5.4-3.95q-.1-.45-.125-1.025Q9.25 24.45 9.25 24q0-.45.025-1.025T9.4 21.95L4 18l4.65-8.2 5.9 2.7q.8-.65 1.85-1.25t2-.9l1-6.35h9.2l1 6.3q.95.35 2.025.925Q32.7 11.8 33.45 12.5l5.9-2.7L44 18l-5.4 3.85q.1.5.125 1.075.025.575.025 1.075t-.025 1.05q-.025.55-.125 1.05L44 30l-4.65 8.2-5.9-2.7q-.8.65-1.825 1.275-1.025.625-2.025.925l-1 6.3ZM24 30.5q2.7 0 4.6-1.9 1.9-1.9 1.9-4.6 0-2.7-1.9-4.6-1.9-1.9-4.6-1.9-2.7 0-4.6 1.9-1.9 1.9-1.9 4.6 0 2.7 1.9 4.6 1.9 1.9 4.6 1.9Zm0-3q-1.45 0-2.475-1.025Q20.5 25.45 20.5 24q0-1.45 1.025-2.475Q22.55 20.5 24 20.5q1.45 0 2.475 1.025Q27.5 22.55 27.5 24q0 1.45-1.025 2.475Q25.45 27.5 24 27.5Zm0-3.5Zm-2.2 17h4.4l.7-5.6q1.65-.4 3.125-1.25T32.7 32.1l5.3 2.3 2-3.6-4.7-3.45q.2-.85.325-1.675.125-.825.125-1.675 0-.85-.1-1.675-.1-.825-.35-1.675L40 17.2l-2-3.6-5.3 2.3q-1.15-1.3-2.6-2.175-1.45-.875-3.2-1.125L26.2 7h-4.4l-.7 5.6q-1.7.35-3.175 1.2-1.475.85-2.625 2.1L10 13.6l-2 3.6 4.7 3.45q-.2.85-.325 1.675-.125.825-.125 1.675 0 .85.125 1.675.125.825.325 1.675L8 30.8l2 3.6 5.3-2.3q1.2 1.2 2.675 2.05Q19.45 35 21.1 35.4Z" />
					</svg>
						<span class="ml-2 text-sm font-medium">Settings</span>
				</a>
				<form class="flex items-center w-full h-12 px-3 mt-2 rounded hover:bg-gray-700 hover:text-gray-300" action="{{route('logout.post')}}" method="POST">
					@csrf
					<svg class="w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 55" fill="currentColor">
						<path d="M9 42q-1.2 0-2.1-.9Q6 40.2 6 39V9q0-1.2.9-2.1Q7.8 6 9 6h14.55v3H9v30h14.55v3Zm24.3-9.25-2.15-2.15 5.1-5.1h-17.5v-3h17.4l-5.1-5.1 2.15-2.15 8.8 8.8Z" />
					</svg>
						<button type="submit" class="ml-2 text-sm font-medium">logout</button>
				</form>
			</div>
		</div>
		<a class="flex items-center justify-center w-full h-16 mt-auto bg-blue-900 hover:bg-gray-700 hover:text-gray-300" href="#">
				<svg class="w-8 h-8 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 70 55" fill="currentColor">
					<path d="M11.1 35.25q3.15-2.2 6.25-3.375Q20.45 30.7 24 30.7q3.55 0 6.675 1.175t6.275 3.375q2.2-2.7 3.125-5.45Q41 27.05 41 24q0-7.25-4.875-12.125T24 7q-7.25 0-12.125 4.875T7 24q0 3.05.95 5.8t3.15 5.45ZM24 25.5q-2.9 0-4.875-1.975T17.15 18.65q0-2.9 1.975-4.875T24 11.8q2.9 0 4.875 1.975t1.975 4.875q0 2.9-1.975 4.875T24 25.5ZM24 44q-4.1 0-7.75-1.575-3.65-1.575-6.375-4.3-2.725-2.725-4.3-6.375Q4 28.1 4 24q0-4.15 1.575-7.775t4.3-6.35q2.725-2.725 6.375-4.3Q19.9 4 24 4q4.15 0 7.775 1.575t6.35 4.3q2.725 2.725 4.3 6.35Q44 19.85 44 24q0 4.1-1.575 7.75-1.575 3.65-4.3 6.375-2.725 2.725-6.35 4.3Q28.15 44 24 44Zm0-3q2.75 0 5.375-.8t5.175-2.8q-2.55-1.8-5.2-2.75-2.65-.95-5.35-.95-2.7 0-5.35.95-2.65.95-5.2 2.75 2.55 2 5.175 2.8Q21.25 41 24 41Zm0-18.5q1.7 0 2.775-1.075t1.075-2.775q0-1.7-1.075-2.775T24 14.8q-1.7 0-2.775 1.075T20.15 18.65q0 1.7 1.075 2.775T24 22.5Zm0-3.85Zm0 18.7Z" />
				</svg>
			<span class="ml-2 text-sm font-medium">{{{Auth::user()->nama}}}</span>
		</a>
	</div>
	<!-- Component End  -->
	<main class="h-full w-full">
	<div class="pl-0 sm:pl-40">
            @yield('content')
    </div>
	</main>

	<script type="text/javascript">
      function dropdown() {
        document.querySelector("#submenu").classList.toggle("hidden");
        document.querySelector("#arrow").classList.toggle("rotate-0");
      }
      dropdown();

      function openSidebar() {
        document.querySelector(".sidebar").classList.toggle("hidden");
      }
    </script>
</body>
</html>
