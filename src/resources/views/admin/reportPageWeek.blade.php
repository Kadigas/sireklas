@extends('layouts.admin')
@section('content')

<div class="relative overflow-x-auto h-full bgSecondITS shadow-md sm:rounded-lg">
    <nav class="flex items-center justify-center flex-wrap p-5  w-full z-0 top-0 sticky sm:justify-between">
      <div class="flex items-center flex-shrink-0 text-white mr-6">
        <div>
          <span class="text-black font-bold no-underline hover:text-white hover:no-underline text-2xl pl-2"><i class="em em-grinning"></i>Report Minggu Ini</span>
        </div>
      </div>
    </nav>

    <div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 my-4">
            <thead class="text-xs text-white uppercase bgITS dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 hidden md:block">
                        No.
                    </th>
                    <th scope="col" class="pl-2 py-3 md:px-6">
                        Lantai
                    </th>
                    <th scope="col" class="pl-2 py-3 md:px-6">
                        Ruangan
                    </th>
                    <th scope="col" class="pl-2 py-3 md:px-6">
                       Jumlah Penggunaan
                    </th>
                    <th scope="col" class="pl-2 py-3 md:px-6">
                        Rerata Okupansi
                    </th>
                    
                </tr>
            </thead>
            
            <tbody >
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    @foreach ($occ_tables as $key => $table)
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white hidden md:block">
                            {{ $key +1  }}
                        </th>
                        <th scope="row" class="pl-2 py-3 md:px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$table->floornum}}
                        </th>
                        <th scope="row" class="pl-2 py-3 md:px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{$table->roomname}}
                        </th>
                        <td class="pl-2 py-3 md:px-6">
                            {{$table->pemakaian}}
                        </td>
                        <td class="pl-2 py-3 md:px-6">
                            {{$table->rata_okupansi}} %
                        </td>
                    </tr> 
                    @endforeach    
                </tr>
            </tbody>
        </table>
    </div>
    
   
        <div class="w-full md:w-1/2 xl:w-1/3 p-3">
            <!--Template Card-->
            <div class="bg-white border rounded shadow">
                <div class="border-b p-3">
                    <h5 class="font-bold uppercase text text-gray-600">Grafik Okupansi Ruangan</h5>
                </div>
                <div class="p-5">
                    <canvas id="chartruangan" class="mx-auto w-full overflow-hidden"></canvas> 
                </div>
            </div>
            <!--/Template Card-->
        </div>
    
</div>

<script>
    const ctx = document.getElementById('chartruangan');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels:  {!!json_encode($rooms)!!},
        datasets: [{
      label: 'Okupansi Ruangan',
      data: {!!json_encode($datas)!!},
      hoverOffset: 4
    }]
    },
      options: {
        scales: {
            y: {
                max: 20,
                min: 0,
                ticks: {
                    stepSize: 0.5
                }
            }
        },
        responsive: true,
        plugins: {
        autocolors: {
          mode: 'data'
        }
        }
      }
    });
  
  </script>


@endsection
