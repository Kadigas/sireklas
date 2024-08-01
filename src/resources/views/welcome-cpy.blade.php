@extends('layouts.header')
@section('content')

			<style>
				.iProcessing {
					margin: 0;
					padding: 0;
					width: 100vw;
					height: 100vh;
					display: flex;
					justify-content: center;
					align-items: center;
      			}
				  .background-its {
						background: url("/pictures/aaaa-page-003.jpg");
						background-size: cover;
						width: 100%;
						height: 100%;
					}
			canvas {
			position: absolute;
			}
			</style>
			<div class="w-full p-0">
				<main role="main" class="w-full flex flex-col h-screen content-center justify-center">
					<div class="mx-auto flex px-5 py-24 md:flex-row flex-col items-center h-full background-its">
						<div class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center">

							<h1 class="sm:text-5xl md:text-6xl text-4xl mb-4 font-bold text-white tx-roboto">Selamat Datang di
							<br class="hidden lg:inline-block tx-roboto">Tower ITS
							</h1>
					
							
							<div class="flex justify-center">
								<a class="" href="{{route('reservasi')}}">
							<button class="inline-flex text-white bg-blue-400 shadow-xl border-0 py-4 px-6 mx-4 my-4 focus:outline-none hover:bg-yellow-500 rounded text-lg">Reservasi Sekarang <img style="width: 25px;" src="/pictures/icon/rightArrow.png" alt=""> </button>
							</a>
							</div>
						</div>
					<!-- <div class="lg:max-w-lg lg:w-full md:w-1/2 w-5/6">
						<img class="object-cover object-center rounded" alt="Tower Mockup" src="pictures/mockup-tower.png">
					</div> -->
					</div>
				</main>
			</div>

			<div class="relative overflow-x-auto h-full bg-white shadow-md sm:rounded-lg js-show-on-scroll tx-poppins">
			<nav class="flex items-center justify-center flex-wrap p-5  w-full z-0 top-0 sticky sm:justify-between">
				<div class="flex items-center flex-shrink-0 text-white mr-6">
				<div>
					<span class="text-black font-bold no-underline hover:text-white hover:no-underline text-2xl pl-2"><i class="em em-grinning"></i>Kontrol Ruangan</span>
				</div>
				</div>
			</nav>
			<section class="text-gray-600 body-font">
			<div class="py-7 mt-1">
				<div class="inline-flex rounded-md shadow-sm">
				<a href="{{route('ruanganView')}}" class="px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
					Semua
				</a>
				<a href="{{route('lantai4')}}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
					Lantai 4
				</a>
				<a href="{{route('lantai5')}}" class="px-4 py-2 text-sm font-medium text-gray-900 border bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
					Lantai 5
				</a>
				<a href="{{route('lantai6')}}" class="px-4 py-2 text-sm font-medium text-gray-900 border bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
					Lantai 6
				</a>
				<a href="{{route('lantai7')}}" class="px-4 py-2 text-sm font-medium text-gray-900 border bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
					Lantai 7
				</a>
				<a href="{{route('lantai8')}}"  class="px-4 py-2 text-sm font-medium text-gray-900 rounded-r-lg border bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
					Lantai 8
				</a>
				</div>

				<form method="POST" id="upload_form">
				@csrf
					<div class="flex flex-wrap m-4">
					@php($rooms = 0)
					@foreach($ruangans as $key => $ruangan)
						@php($rooms = $rooms + 1)
						<div class="xl:w-1/3 md:w-1/2 p-4">
						@php($isEmpty = 1)
							@foreach($events as $event)
								@if($event->ruangan == $ruangan->roomname && $event->lantai == $ruangan->floornum)
								<div class="border-2 border-red-400 px-6 py-12 rounded-lg bg-white shadow-2xl">
								@php ($isEmpty = 0)
								@break
								@endif
							@endforeach
							@if ($isEmpty)
							<div class="border-2 border-yellow-400 px-6 py-12 rounded-lg bg-white shadow-2xl">
							@endif
							<div class="flex justify-center mb-1">
								<p class="leading-relaxed font-extrabold">Ruangan {{$ruangan->roomname}}</p>
								</div>
								<div class="flex justify-center mb-1">
								<p class="leading-relaxed font-light">Lantai {{$ruangan->floornum}}</p>
							</div>
							{{-- @if ($ruangan->roomname == "TW - 401 Kelas 1") --}}
							<div id="camera{{$rooms}}"></div>
							<input type="hidden" name="image" class="image-tag">
							<div class="flex flex-col justify-center">
								<!-- <button class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="submit">Check</button> -->
								<h4 class="text-center my-2 font-medium">People in Room: <span id="persons"></span></h4>
							</div>
							{{-- @else
							<img class="h-40 rounded w-full object-scale-down object-center mb-2" src="{{$ruangan->picture}}" alt="Gambar Ruangan">
							@endif --}}
							<div class="flex justify-center">
							@php($isEmpty = 1)
							<span class="font-medium">Status: </span>
							@foreach($events as $event)
								@if($event->ruangan == $ruangan->roomname && $event->lantai == $ruangan->floornum)
								<p class="title-font font-medium text-red-700 bg-red-200 px-4 rounded-md mx-2" id="sedangDipakai">Sedang Dipakai</p>
								@php ($isEmpty = 0)
								@break
								@endif
							@endforeach
							@if ($isEmpty)
								{{-- <span class="mt-1.5 mr-1 w-3 h-3 bg-green-500 rounded-full"></span> --}}
								<p class="title-font font-medium text-green-700 bg-green-200 px-4 rounded-md mx-2" id="kosong">Kosong</p>
							@endif
							</div>
						</div>
						</div>
					@endforeach
					</div>
				</form>

			<div class="relative overflow-hidden bg-cover bg-no-repeat p-0" style="background-position: 50%;
      			background-image: url('/pictures/aaaa-page-003.jpg');
      			height: 350px;
    		">
				<div
				class="absolute bottom-0 left-0 right-0 top-0 h-full w-full overflow-hidden bg-fixed"
				style="background-color: rgba(0, 0, 0, 0.50)">
				<div class="flex h-full items-center justify-center">
					<div class="px-6 text-center text-white md:px-12">
					<h1 class="mb-4 text-3xl font-extrabold text-gray-500 dark:text-white md:text-5xl lg:text-6xl"><span class="text-transparent bg-clip-text bg-gradient-to-r to-emerald-600 from-sky-400">Daftar Pilihan</span> Ruangan.</h1>
					<p class="text-lg font-normal text-gray-500 lg:text-xl dark:text-gray-400">Pilihlah ruangan sesuai dengan kebutuhan anda.</p>
					</div>
				</div>
				</div>
  			</div>

			<div class="grid mb-8 border border-gray-200 rounded-lg shadow-sm dark:border-gray-700 md:mb-12 md:grid-cols-2">
				<figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-t-lg md:rounded-t-none md:rounded-tl-lg md:border-r dark:bg-gray-800 dark:border-gray-700">
					<blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
						<h3 class="text-lg font-semibold text-gray-900 dark:text-white">Auditorium</h3>
						<img src="/pictures/Class1.jpg" alt="">
					</blockquote>
					<figcaption class="flex items-center justify-center space-x-3">
						<div class="space-y-0.5 font-medium dark:text-white text-left">
							<div>Ruangan ini memiliki kapasitas maksimal 40 orang dengan berbagai macam fasilitas seperti:</div>
							<div class="text-sm text-gray-500 dark:text-gray-400">2 Layar dengan resolusi 4K</div>
							<div class="text-sm text-gray-500 dark:text-gray-400">6 Microphone</div>
							<div class="text-sm text-gray-500 dark:text-gray-400">4 Sound System</div>
							<div class="text-sm text-gray-500 dark:text-gray-400">4 Standing Mic</div>
						</div>
					</figcaption>    
				</figure>
				<figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-tr-lg dark:bg-gray-800 dark:border-gray-700">
				<blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
						<h3 class="text-lg font-semibold text-gray-900 dark:text-white">Kelas 200</h3>
						<img src="/pictures/Class1.jpg" alt="">
					</blockquote>
					<figcaption class="flex items-center justify-center space-x-3">
						<div class="space-y-0.5 font-medium dark:text-white text-left">
							<div>Ruangan ini memiliki kapasitas maksimal 20 orang dengan berbagai macam fasilitas seperti:</div>
							<div class="text-sm text-gray-500 dark:text-gray-400">1 Layar dengan resolusi 4K</div>
							<div class="text-sm text-gray-500 dark:text-gray-400">4 Microphone</div>
							<div class="text-sm text-gray-500 dark:text-gray-400">4 Sound System</div>
						</div>
					</figcaption>   
				</figure>
				<figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-b border-gray-200 rounded-bl-lg md:border-b-0 md:border-r dark:bg-gray-800 dark:border-gray-700">
				<blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
						<h3 class="text-lg font-semibold text-gray-900 dark:text-white">Kelas 117</h3>
						<img src="/pictures/Class1.jpg" alt="">
					</blockquote>
					<figcaption class="flex items-center justify-center space-x-3">
						<div class="space-y-0.5 font-medium dark:text-white text-left">
							<div>Ruangan ini memiliki kapasitas maksimal 20 orang dengan berbagai macam fasilitas seperti:</div>
							<div class="text-sm text-gray-500 dark:text-gray-400">1 Layar dengan resolusi 4K</div>
							<div class="text-sm text-gray-500 dark:text-gray-400">3 Microphone</div>
							<div class="text-sm text-gray-500 dark:text-gray-400">2 Sound System</div>
							<div class="text-sm text-gray-500 dark:text-gray-400">1 Standing Mic</div>
						</div>
					</figcaption> 
				</figure>
				<figure class="flex flex-col items-center justify-center p-8 text-center bg-white border-gray-200 rounded-b-lg md:rounded-br-lg dark:bg-gray-800 dark:border-gray-700">
				<blockquote class="max-w-2xl mx-auto mb-4 text-gray-500 lg:mb-8 dark:text-gray-400">
						<h3 class="text-lg font-semibold text-gray-900 dark:text-white">Kelas 118</h3>
						<img src="/pictures/Class1.jpg" alt="">
					</blockquote>
					<figcaption class="flex items-center justify-center space-x-3">
						<div class="space-y-0.5 font-medium dark:text-white text-left">
							<div>Ruangan ini memiliki kapasitas maksimal 25 orang dengan berbagai macam fasilitas seperti:</div>
							<div class="text-sm text-gray-500 dark:text-gray-400">1 Layar dengan resolusi 1080p</div>
							<div class="text-sm text-gray-500 dark:text-gray-400">2 Microphone</div>
							<div class="text-sm text-gray-500 dark:text-gray-400">2 Sound System</div>
							<div class="text-sm text-gray-500 dark:text-gray-400">2 Standing Mic</div>
						</div>
					</figcaption>  
				</figure>
			</div>


			</section>
			</div>

			<div class="js-show-on-scroll">
			<div class="container-fluid bg-blue-900 p-10 text-center text-white">
				<h1 class="text-3xl p-3">Panduan Reservasi Ruangan Tower ITS</h1>
				<p class="text-lg p-5">Untuk mendapatkan panduan mengenai tata cara reservasi ruangan pada Tower ITS, <br> silahkan klik tombol di bawah.</p>
				<a href="{{route('panduanReservasi')}}" type="button" class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-3 mr-2 mb-2 dark:focus:ring-yellow-900">Panduan Reservasi</a>
			</div>
			<div class="container-fluid bg-white p-10 text-center my-6">
				<h1 class="text-4xl font-bold pb-5">Tata Tertib Reservasi</h1>
				<div class="text-left px-0 md:px-8 sm:px-0">
				<ol type="1" class="list-decimal">
					<li>Penggunaan ruangan harus mendapat persetujuan dari Rektor ITS.</li>
					<li>Pengajuan peminjaman maksimal 2 minggu sebelum pelaksanaan kegiatan.</li>
					<li>Penggunaan ruang hanya diperbolehkan pada rentang waktu jam kerja (08:00 -18:00) di hari kerja, dan maksimal pukul 16:00 untuk hari Sabtu dan Minggu.</li>
					<li>Pengguna atau Peminjam hanya dikhususkan untuk civitas akademika ITS.</li>
					<li>Pengguna ruang wajib melakukan pemeriksaan kondisi barang yang akan digunakan sebelum maupun sesudah digunakan untuk memastikan keadaan kondisi barang dalam keadaan baik.</li>
					<li>Tidak dibenarkan meninggalkan ruang dalam keadaan kosong dan tidak terkunci.</li>
					<li>Jika terjadi kerusakan inventaris ruang karena kelalaian/kecerobohan pemakaian maka yang bersangkutan diberi sanksi untuk:</li>
					<ol class="list-disc pl-5">
						<li>Memperbaiki alat tersebut apabila kerusakan tersebut dapat diperbaiki.</li>
						<li>Mengganti dengan alat yang baru apabila kerusakan tersebut tidak bisa diperbaiki.</li>
					</ol>
				</ol> 
				</div>
			</div>
		</div>

			<!-- <script>
				const callback = function (entries) {
				entries.forEach((entry) => {
					console.log(entry);

					if (entry.isIntersecting) {
					entry.target.classList.add("animate-fadeIn");
					} else {
					entry.target.classList.remove("animate-fadeIn");
					}
				});
				};

				const observer = new IntersectionObserver(callback);

				const targets = document.querySelectorAll(".js-show-on-scroll");
				targets.forEach(function (target) {
				target.classList.add("opacity-0");
				observer.observe(target);
				});
			</script> -->
			<script>
			Webcam.set({
				width: 540,
				height: 320,
				// width: 360,
				// height: 300,
				image_format: 'jpeg',
				jpeg_quality: 90
			});
			
			for (let i = 1; i <= <?php echo"$rooms"?>; i++) {
				id = "#camera" + i;
				Webcam.attach(id);
			}
			
			function take_snapshot() {
				Webcam.id.snap( function(data_uri) {
					$(".image-tag").val(data_uri);
					document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
				} );
			}

			$(document).ready(function(){
				$('#upload_form').submit(ajax);
			});
			function ajax(){
				// event.preventDefault();
				Webcam.snap( function(data_uri) {
					$(".image-tag").val(data_uri);
				});
				$.ajax({
					url:"{{ route('upload') }}",
					method:"POST",
					data:new FormData(document.getElementById("upload_form")),
					dataType:'JSON',
					contentType: false,
					cache: false,
					processData: false,
					success:function(data)
					{
						loc = "/predict/" + data.uploaded_image
						$.ajax({
							url:loc,
							method:"GET",
							data: '{}',
							dataType:'JSON',
							contentType: "application/json",
							success: function(data, status, xhr) {
								$('#persons').html(data.person)
								echo($('#persons').html(data.person))
							},
						})
					}
				})
			}

			window.onload=function(){
				setInterval(ajax, 5000);
			}
			</script>

			<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
			<script>
			const ctx = document.getElementById('myChart');

			new Chart(ctx, {
				type: 'bar',
				data: {
				labels: ['Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
				datasets: [{
					label: '# of Votes',
					data: [!!json_encode($datas)!!],
					borderWidth: 1
				}]
				},
				options: {
				scales: {
					y: {
					beginAtZero: true
					}
				}
				}
			});

			</script>
@endsection