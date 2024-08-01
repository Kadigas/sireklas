@extends('layouts.admin')
@section('content')
<div class="bgSecondITS h-full">
    <nav class="flex items-center justify-center flex-wrap p-5 w-full z-0 top-0 sm:justify-between">
		<div class="flex items-center flex-shrink-0 text-white mr-6">
		<div>
			<span class="text-black font-bold no-underline hover:text-white hover:no-underline text-2xl pl-2"><i class="em em-grinning"></i>Overview</span>
		</div>
	</div>
    </nav>
    <section class="text-gray-600 bgSecondITS">
        <div class="container px-5 py-10 mx-auto">
          <div class="flex flex-wrap -m-4 text-center">
            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
              <div class="border-2 border-blue-400 px-6 py-12 rounded-lg bg-white">
                <p class="leading-relaxed font-extrabold">Total Ruangan </p>
                <h2 class="title-font font-medium text-3xl text-gray-900">{{ $ruangans }}</h2>
                
              </div>
            </div>
            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
              <div class="border-2 border-yellow-400 px-6 py-12 rounded-lg bg-white">
                <p class="leading-relaxed font-extrabold">Reservasi Pending</p>
                <h2 class="title-font font-medium text-3xl text-gray-900">{{ $reservasisPending }}</h2>
              </div>
            </div>
            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
              <div class="border-2 border-green-500 px-6 py-12 rounded-lg bg-white">
                <p class="leading-relaxed font-extrabold">Reservasi Diterima</p>
                <h2 class="title-font font-medium text-3xl text-gray-900">{{ $reservasisTerima }}</h2>
              </div>
            </div>
            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
              <div class="border-2 border-red-500 px-6 py-12 rounded-lg bg-white">
                <p class="leading-relaxed font-extrabold">Reservasi Ditolak</p>
                <h2 class="title-font font-medium text-3xl text-gray-900">{{ $reservasisTolak }}</h2>
              </div>
            </div>

          </div>
         
        </div>
      </section>
</div>

<hr class="border-b-2 border-blue-900 my-8 mx-4">
            <div class="flex flex-row flex-wrap flex-grow mt-2">
                <div class="w-full md:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border rounded shadow">
                        <div class="border-b p-3">
                        <h1 class="font-bold uppercase text-gray-600">Penggunaan Ruangan Bulan Ini</h1>
                        </div>
                        <div class="p-5">
                          <canvas id="chartevents" class="mt-5 mx-auto w-3/4 overflow-hidden"></canvas>  
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class="w-full md:w-1/2 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border rounded shadow">
                        <div class="border-b p-3">
                          <h1 class="font-bold uppercase text-gray-600">Approval Reservasi Ruangan Bulan Ini</h1>
                        </div>
                        <div class="p-5">
                          <canvas id="chartapprovalreservasi" class="mx-auto w-3/4 overflow-hidden"></canvas>  
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border rounded shadow">
                        <div class="border-b p-3">
                            <h1 class="font-bold uppercase text-gray-600">Pemesanan Ruangan Bulan Ini</h1>
                        </div>
                        <div class="p-5">
                          <canvas id="chartreservasi" class="mx-auto w-3/4 overflow-hidden"></canvas>  
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Graph Card-->
                    <div class="bg-white border rounded shadow">
                        <div class="border-b p-3">
                        <h1 class="font-bold uppercase text-gray-600">Penggunaan Ruangan Per Lantai Bulan Ini</h1>
                        </div>
                        <div class="p-5">
                          <canvas id="chartlantaievents" class="mx-auto w-3/4 overflow-hidden"></canvas>  
                        </div>
                    </div>
                    <!--/Graph Card-->
                </div>

                {{-- <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                    <!--Template Card-->
                    <div class="bg-white border rounded shadow">
                        <div class="border-b p-3">
                            <h5 class="font-bold uppercase text-gray-600">Template Buat graph yang lain</h5>
                        </div>
                        <div class="p-5">

                        </div>
                    </div>
                    <!--/Template Card-->
                </div> --}}


<script>
  const ctx = document.getElementById('chartevents');
  const autocolors = window['chartjs-plugin-autocolors'];
  Chart.register(autocolors);
  new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels:  {!!json_encode($categories)!!},
      datasets: [{
    label: 'Jumlah Pemakaian',
    data: {!!json_encode($datas)!!},
    hoverOffset: 4
  }]
  },
    options: {
      responsive: true,
      plugins: {
      autocolors: {
        mode: 'data'
      }
      }
    }
  });


  //chart 2  
  const ctx2 = document.getElementById('chartapprovalreservasi');
  
  new Chart(ctx2, {
    type: 'doughnut',
    data: {
      labels:   [
    'Diterima',
    'DiTolak',
  ],
      datasets: [{
    label: 'Reservasi',
    data: [{!!json_encode($reservasisTerimaChart)!!},{!!json_encode($reservasisTolakChart)!!}],
    backgroundColor: [
      '#00FF00',
      '#FF0000'
    ],
    borderColor: [
      '#00FF00',
      '#FF0000'
    ],
    hoverOffset: 5
  }]
  },
    options: {
      responsive: true,
      plugins: {
      }
    }
  });
</script>

<script>
  const ctx3 = document.getElementById('chartreservasi');
  new Chart(ctx3, {
    type: 'doughnut',
    data: {
      labels:  {!!json_encode($categories)!!},
      datasets: [{
    label: 'Jumlah Pemesanan',
    data: {!!json_encode($datares)!!},
    hoverOffset: 4
  }]
  },
    options: {
      responsive: true,
      plugins: {
      autocolors: {
        mode: 'data'
      }
      }
    }
  });

</script>

<script>
  const ctx4 = document.getElementById('chartlantaievents');
  new Chart(ctx4, {
    type: 'doughnut',
    data: {
      labels:  {!!json_encode($floorcat)!!},
      datasets: [{
    label: 'Jumlah Pemesanan',
    data: {!!json_encode($datalantai)!!},
    hoverOffset: 4
  }]
  },
    options: {
      responsive: true,
      plugins: {
      autocolors: {
        mode: 'data'
      }
      }
    }
  });

</script>

@endsection('content')