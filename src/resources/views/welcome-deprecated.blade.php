@extends('layouts.header')
@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <style>
        #map {
            height: 50vh;
            z-index: 1;
        }
    </style>
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

        nav {
            position: relative;
            z-index: 1000;
        }
    </style>
    <div class="w-full p-0">
        <main role="main" class="w-full flex flex-col h-screen content-center justify-center">
            <div class="mx-auto flex px-5 py-24 md:flex-row flex-col items-center h-full background-its">
                <div
                    class="lg:flex-grow md:w-1/2 lg:pr-24 md:pr-16 flex flex-col md:items-start md:text-left mb-16 md:mb-0 items-center text-center mx-12">

                    <h1 class="sm:text-5xl md:text-6xl text-4xl mb-4 font-bold text-white tx-roboto">Selamat Datang di
                        <br class="hidden lg:inline-block tx-roboto">Tower ITS
                    </h1>

                    <div class="flex justify-center">
                        <a class="" href="{{ route('reservasi') }}">
                            <button
                                class="inline-flex text-white bg-blue-400 shadow-xl border-0 py-4 px-6 mx-4 my-4 focus:outline-none hover:bg-yellow-500 rounded text-lg duration-200">Reservasi
                                Sekarang <img style="width: 25px;" src="/pictures/icon/rightArrow.png" alt="">
                            </button>
                        </a>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div class="relative h-full bg-white shadow-md sm:rounded-lg js-show-on-scroll tx-poppins px-6">
        <nav class="flex items-center justify-center flex-wrap w-full z-0 top-0 sticky sm:justify-between">
            <div class="flex items-center flex-shrink-0 text-white mt-6 ml-6">
                <div>
                    <span class="text-black font-bold no-underline text-2xl pl-2"><i class="em em-grinning"></i>Kontrol
                        Ruangan</span>
                </div>
            </div>
        </nav>
        <section class="text-gray-600 body-font">
            <div class="py-7 mt-1">
                <div class="inline-flex rounded-md shadow-sm mx-8">
                    <a href="{{ route('ruanganView') }}"
                        class="px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        Semua
                    </a>
                    <a href="{{ route('lantai4') }}"
                        class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        Lantai 4
                    </a>
                    <a href="{{ route('lantai5') }}"
                        class="px-4 py-2 text-sm font-medium text-gray-900 border bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        Lantai 5
                    </a>
                    <a href="{{ route('lantai6') }}"
                        class="px-4 py-2 text-sm font-medium text-gray-900 border bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        Lantai 6
                    </a>
                    <a href="{{ route('lantai7') }}"
                        class="px-4 py-2 text-sm font-medium text-gray-900 border bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        Lantai 7
                    </a>
                    <a href="{{ route('lantai8') }}"
                        class="px-4 py-2 text-sm font-medium text-gray-900 rounded-r-lg border bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
                        Lantai 8
                    </a>
                </div>

                <form method="POST" id="upload_form">
                    @csrf
                    <div class="flex flex-wrap m-4">
                        @php($rooms = 0)
                        @foreach ($ruangans as $key => $ruangan)
                            @php($rooms = $rooms + 1)
                            <div class="xl:w-1/3 md:w-1/2 p-4">
                                <div class="border-2 border-yellow-400 px-6 py-12 rounded-lg bg-white shadow-2xl">
                                    <div class="flex justify-center mb-1">
                                        <p class="leading-relaxed font-extrabold">Ruangan {{ $ruangan->roomname }}</p>
                                    </div>
                                    <div class="flex justify-center mb-1">
                                        <p class="leading-relaxed font-light">Lantai {{ $ruangan->floornum }}</p>
                                    </div>
                                    @if ($ruangan->roomname == 'TW2 - 704 Kelas 4')
                                        <video id="video1" src="/videos/ujicoba-2.mp4" class="h-80" autoplay=true></video>
                                    @elseif ($ruangan->roomname == 'TW2 - 705 Kelas 5')
                                        <video id="video2" src="/videos/ujicoba-1.mp4" class="h-80" autoplay=true></video>
                                    @else
                                        <img class="h-80 rounded w-full object-scale-down object-center mb-2"
                                            src="/pictures/cameraoff.png" alt="Gambar Ruangan">
                                    @endif
                                    <input type="hidden" name="image" class="image-tag">
                                    <div class="flex flex-col justify-center">
                                        <h4 class="text-center my-2 font-medium">People in Room: <span
                                                id="persons_{{ $ruangan->roomname == 'TW2 - 704 Kelas 4' ? 'video1' : ($ruangan->roomname == 'TW2 - 705 Kelas 5' ? 'video2' : 'default') }}"></span>
                                        </h4>
                                    </div>
                                    <div class="flex justify-center">
                                        @php($isEmpty = 1)
                                        <span class="font-medium">Status: </span>
                                        @foreach ($events as $event)
                                            @if ($event->room_name == $ruangan->roomname && $event->floornum == $ruangan->floornum)
                                                <p class="title-font font-medium text-red-700 bg-red-200 px-4 rounded-md mx-2"
                                                    id="sedangDipakai">Sedang Dipakai</p>
                                                @php($isEmpty = 0)
                                            @break
                                        @endif
                                    @endforeach
                                    @if ($isEmpty)
                                        <p class="title-font font-medium text-green-700 bg-green-200 px-4 rounded-md mx-2"
                                            id="kosong">Kosong</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>
            </form>
            <div class="js-show-on-scroll">
                <div class="container-fluid bg-blue-900 p-10 text-center text-white">
                    <h1 class="text-4xl font-bold pb-5">Tower 2 ITS</h1>
                    <p class="text-lg px-8 py-5">Tower 2 ITS didirikan untuk memenuhi fasilitas pembelajaran mahasiswa
                        khususnya
                        departemen dari Fakultas Teknologi Elektro dan Informatika Cerdas (FTEIC). Berlokasi di antara
                        Departemen Elektro dan Statistika,
                        gedung Tower 2 yang terdiri dari 11 lantai ini memiliki berbagai fasilitas yang berbeda di
                        setiap
                        lantainya. Terdapat beberapa ruang kelas pada lantai 4 hingga 8 yang dapat digunakan untuk
                        kegiatan
                        perkuliahan maupun kegiatan civitas akademik ITS lainnya.</p>
                </div>
                <div class="container-fluid bg-yellow-400 p-10 text-center text-white">
                    <h1 class="text-4xl font-bold pb-5">Lokasi Tower 2 ITS</h1>
                    <div class="justify-center mx-12 px-12">
                        <div id="map"></div>
                    </div>
                </div>
                <div class="container-fluid bg-blue-900 p-10 text-center text-white">
                    <h1 class="text-4xl font-bold pb-5">Panduan Reservasi Ruangan Tower ITS</h1>
                    <p class="text-lg p-5">Untuk mendapatkan panduan mengenai tata cara reservasi ruangan pada Tower
                        ITS,
                        <br> silahkan klik tombol di bawah.
                    </p>
                    <a href="{{ route('panduanReservasi') }}" type="button"
                        class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-3 mr-2 mb-2 dark:focus:ring-yellow-900 duration-200">Panduan
                        Reservasi</a>
                </div>
                <div class="container-fluid bg-white p-10 text-center my-6">
                    <h1 class="text-4xl font-bold pb-5">Tata Tertib Reservasi</h1>
                    <div class="text-lg text-left px-0 md:px-8 sm:px-0 pt-5">
                        <ol type="1" class="list-decimal">
                            <li>Penggunaan ruangan harus mendapat persetujuan dari Rektor ITS.</li>
                            <li>Pengajuan peminjaman maksimal 2 minggu sebelum pelaksanaan kegiatan.</li>
                            <li>Penggunaan ruang hanya diperbolehkan pada rentang waktu jam kerja (08:00 -18:00) di hari
                                kerja, dan maksimal pukul 16:00 untuk hari Sabtu dan Minggu.</li>
                            <li>Pengguna atau Peminjam hanya dikhususkan untuk civitas akademika ITS.</li>
                            <li>Pengguna ruang wajib melakukan pemeriksaan kondisi barang yang akan digunakan sebelum
                                maupun
                                sesudah digunakan untuk memastikan keadaan kondisi barang dalam keadaan baik.</li>
                            <li>Tidak dibenarkan meninggalkan ruang dalam keadaan kosong dan tidak terkunci.</li>
                            <li>Jika terjadi kerusakan inventaris ruang karena kelalaian/kecerobohan pemakaian maka yang
                                bersangkutan diberi sanksi untuk:</li>
                            <ol class="list-disc pl-5">
                                <li>Memperbaiki alat tersebut apabila kerusakan tersebut dapat diperbaiki.</li>
                                <li>Mengganti dengan alat yang baru apabila kerusakan tersebut tidak bisa diperbaiki.
                                </li>
                            </ol>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</div>
<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script>
    var latitude = -7.285322488794634;
    var longitude = 112.79532755932263;

    var map = L.map('map').setView([latitude, longitude], 18);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        maxZoom: 19,
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([latitude, longitude]).addTo(map)
        .bindPopup('Gedung Tower 2 ITS')
        .openPopup();
</script>
<script>
    window.onload = function() {
        handleVideos(['video1', 'video2']);
    };

    function captureScreenshot(videoElement) {
        var canvas = document.createElement('canvas');
        canvas.width = videoElement.videoWidth;
        canvas.height = videoElement.videoHeight;
        var context = canvas.getContext('2d');
        context.drawImage(videoElement, 0, 0, canvas.width, canvas.height);
        return canvas.toDataURL('image/png');
    }

    function handleVideos(videoIds) {
        videoIds.forEach(function(videoId) {
            handleVideo(videoId);
        });
    }

    function handleVideo(videoId) {
        var videoElement = document.getElementById(videoId);
        if (videoElement) {
            setInterval(function() {
                if (videoElement.readyState === videoElement.HAVE_ENOUGH_DATA) {
                    var screenshot = captureScreenshot(videoElement);
                    console.log('Screenshot captured:', screenshot); // Debugging output
                    $(".image-tag").val(screenshot);
                    uploadScreenshot(screenshot, videoId);
                }
            }, 5000);
        } else {
            console.error('Video element not found:', videoId);
        }
    }

    function uploadScreenshot(screenshot, videoId) {
        $.ajax({
            url: "{{ route('uploadImage') }}",
            method: "POST",
            data: {
                _token: "{{ csrf_token() }}",
                image: screenshot
            },
            dataType: 'JSON',
            success: function(data) {
                console.log('Upload successful:', data); // Debugging output
                var loc = "/predict/" + data.uploaded_image;
                $.ajax({
                    url: loc,
                    method: "GET",
                    dataType: 'JSON',
                    success: function(predictionData) {
                        console.log('Prediction data:', predictionData); // Debugging output
                        var personId = videoId === 'video1' ? 'persons_video1' :
                            'persons_video2';
                        $('#' + personId).html(predictionData.person);
                    }
                });
            },
            error: function(xhr, status, error) {
                console.error('Upload error:', status, error); // Debugging output
            }
        });
    }
</script>
@endsection
