@extends('layouts.admin')
@section('content')
<div class="relative overflow-x-auto h-screen bgSecondITS shadow-md sm:rounded-lg">
  <nav class="flex items-center justify-center flex-wrap p-5  w-full z-0 top-0 sticky sm:justify-between">
    <div class="flex items-center flex-shrink-0 text-white mr-6">
      <div>
        <span class="text-black font-bold no-underline hover:text-white hover:no-underline text-2xl pl-2"><i class="em em-grinning"></i>Kontrol Ruangan</span>
      </div>
    </div>
  </nav>
  <section class="text-gray-600 body-font">
  <div class="py-7 mt-1 ml-9">
    <div class="inline-flex rounded-md shadow-sm">
      <a href="{{route('admin-ruangan')}}" class="px-4 py-2 text-sm font-medium text-blue-700 bg-white border border-gray-200 rounded-l-lg hover:bg-gray-100 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        Semua
      </a>
      <a href="{{route('admin-lantai4View')}}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        Lantai 4
      </a>
      <a href="{{route('admin-lantai5View')}}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        Lantai 5
      </a>
      <a href="{{route('admin-lantai6View')}}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        Lantai 6
      </a>
      <a href="{{route('admin-lantai7View')}}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
        Lantai 7
      </a>
      <a href="{{route('admin-lantai8View')}}" class="px-4 py-2 text-sm font-medium text-gray-900 bg-white border-t border-b border-gray-200 rounded-r-lg hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-2 focus:ring-blue-700 focus:text-blue-700 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-blue-500 dark:focus:text-white">
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
            <img class="h-40 rounded w-full object-center mb-2" src="/pictures/cameraoff.png" alt="Gambar Ruangan">
            <input type="hidden" name="image" class="image-tag">
            <div class="flex flex-col justify-center">
              <h4 class="text-center my-2 font-medium">People in Room: <span id="persons"></span></h4>
            </div>
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
              <p class="title-font font-medium text-green-700 bg-green-200 px-4 rounded-md mx-2" id="kosong">Kosong</p>
            @endif
            </div>
          </div>
          </div>
        @endforeach
        </div>
      </form>
  </section>
</div>

@endsection