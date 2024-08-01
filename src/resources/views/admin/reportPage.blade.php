@extends('layouts.admin')
@section('content')

<div class="relative overflow-x-auto h-screen bgSecondITS shadow-md sm:rounded-lg">
    <nav class="flex items-center justify-center flex-wrap p-5  w-full z-0 top-0 sticky sm:justify-between">
      <div class="flex items-center flex-shrink-0 text-white mr-6">
        <div>
          <span class="text-black font-bold no-underline hover:text-white hover:no-underline text-2xl pl-2"><i class="em em-grinning"></i>Report </span>
        </div>
      </div>
    </nav>

    <div>
        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 my-4">
            <thead class="text-xs text-white uppercase bgITS dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="pl-2 py-3 md:px-6">
                       Durasi
                    </th>
                    <th scope="col" class="pl-2 py-3 md:px-6">
                        Detail
                    </th>
                    
                </tr>
            </thead>

            <tbody >
                <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="pl-2 py-3 md:px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           Minggu Ini
                        </th>
                        <th scope="row" class="pl-2 py-3 md:px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{route('viewWeek')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail Link</a>
                        </th>
                    </tr>  
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="pl-2 py-3 md:px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           Bulan Ini
                        </th>
                        <th scope="row" class="pl-2 py-3 md:px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{route('viewMonth')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail Link</a>
                        </th>
                    </tr>  
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="pl-2 py-3 md:px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           Semester Ini
                        </th>
                        <th scope="row" class="pl-2 py-3 md:px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <a href="{{route('viewSemester')}}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Detail Link</a>
                        </th>
                    </tr>  
                </tr>
            </tbody>
        </table>
    </div>
   

   
    
</div>


@endsection
