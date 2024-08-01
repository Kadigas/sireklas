@extends('layouts.header')
@section('content')
<style>
        .max-h-64 {
            max-height: 16rem;
        }
        /*Quick overrides of the form input as using the CDN version*/
        .form-input,
        .form-textarea,
        .form-select,
        .form-multiselect {
            background-color: #edf2f7;
        }
    </style>

 <!-- <h1>Reservasi Ruangan</h1> -->
 <div class="container w-full flex flex-wrap mx-auto lg:pt-4 pb-10">
        <!--Section container-->
        <section class="w-full">
            <!--Card-->
            <div id='section' class="p-8 mt-6 lg:mt-0 rounded-lg shadow-lg bg-white">
            <div class="mt-6 pb-10">
            <ol class="items-cente justify-center w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0">
            <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" zoomAndPan="magnify" viewBox="0 0 30 30.000001" height="20" preserveAspectRatio="xMidYMid meet" version="1.0"><defs><clipPath id="id1"><path d="M 2.328125 4.222656 L 27.734375 4.222656 L 27.734375 24.542969 L 2.328125 24.542969 Z M 2.328125 4.222656 " clip-rule="nonzero"/></clipPath></defs><g clip-path="url(#id1)"><path fill="rgb(13.729858%, 12.159729%, 12.548828%)" d="M 27.5 7.53125 L 24.464844 4.542969 C 24.15625 4.238281 23.65625 4.238281 23.347656 4.542969 L 11.035156 16.667969 L 6.824219 12.523438 C 6.527344 12.230469 6 12.230469 5.703125 12.523438 L 2.640625 15.539062 C 2.332031 15.84375 2.332031 16.335938 2.640625 16.640625 L 10.445312 24.324219 C 10.59375 24.472656 10.796875 24.554688 11.007812 24.554688 C 11.214844 24.554688 11.417969 24.472656 11.566406 24.324219 L 27.5 8.632812 C 27.648438 8.488281 27.734375 8.289062 27.734375 8.082031 C 27.734375 7.875 27.648438 7.679688 27.5 7.53125 Z M 27.5 7.53125 " fill-opacity="1" fill-rule="nonzero"/></g></svg> 
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Informasi Peminjaman</h3>
                    </span>
                </li>
                <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                        <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40" zoomAndPan="magnify" viewBox="0 0 30 30.000001" height="20" preserveAspectRatio="xMidYMid meet" version="1.0"><defs><clipPath id="id1"><path d="M 2.328125 4.222656 L 27.734375 4.222656 L 27.734375 24.542969 L 2.328125 24.542969 Z M 2.328125 4.222656 " clip-rule="nonzero"/></clipPath></defs><g clip-path="url(#id1)"><path fill="rgb(13.729858%, 12.159729%, 12.548828%)" d="M 27.5 7.53125 L 24.464844 4.542969 C 24.15625 4.238281 23.65625 4.238281 23.347656 4.542969 L 11.035156 16.667969 L 6.824219 12.523438 C 6.527344 12.230469 6 12.230469 5.703125 12.523438 L 2.640625 15.539062 C 2.332031 15.84375 2.332031 16.335938 2.640625 16.640625 L 10.445312 24.324219 C 10.59375 24.472656 10.796875 24.554688 11.007812 24.554688 C 11.214844 24.554688 11.417969 24.472656 11.566406 24.324219 L 27.5 8.632812 C 27.648438 8.488281 27.734375 8.289062 27.734375 8.082031 C 27.734375 7.875 27.648438 7.679688 27.5 7.53125 Z M 27.5 7.53125 " fill-opacity="1" fill-rule="nonzero"/></g></svg> 
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Informasi Penanggung Jawab</h3>
                    </span>
                </li>
                <li class="flex items-center text-blue-600 dark:text-blue-500 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                        3
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Detail Peminjaman</h3>
                    </span>
                </li>
                <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                        4
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Detail Kegiatan</h3>
                    </span>
                </li>
            </ol>
            </div>
                <div class="pb-10">
                    <h1 class="font-bold text-3xl mb-4">Detail Peminjaman</h1>
                    <p class="text-gray-500">Ruangan yang akan dipinjam memiliki kapasitas dan fasilitas yang berbeda-beda. Teknisi yang bertanggung jawab terhadap ruangan dapat dilihat di halaman staff. Untuk melihat ketersediaan ruangan dapat dilihat di halaman ruangan</p>
                    @if ($errors->has('msg'))
                    <div class="error py-4 text-md text-bold text-red-600">{{$errors->first('msg')}}</div>
                    @endif
                </div>
                <form action="{{route('postCreateStepThree')}}" method="POST">
                    @csrf
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Ruangan
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <section id="map">
                                <div class="container m-auto">
                                    <div class="flex justify-center mb-4 bg-gray-300" style="overflow: hidden; user-select: none; touch-action: none;">
                                        <div class="relative h-64 md:h-auto" style="cursor: move; user-select: none; touch-action: none;">
                                            <div class="absolute top-0 w-full h-full z-10">
                                            <svg class="scale-10 md:scale-10" viewBox="0 0 1920 1100" preserveAspectRatio="none">
                                                <polygon id="test" class="polygon roomAvailable" points="537.4213562373095,559.4213562373095 254.57864376269052,559.4213562373095 254.57864376269046,276.5786437626905 537.4213562373095,276.5786437626905" stroke="#000" stroke-width="1"/>
                                                <polygon id="test1" class="polygon roomAvailable" points="841.4213562373095,559.4213562373095 558.5786437626905,559.4213562373095 558.5786437626905,276.5786437626905 841.4213562373095,276.5786437626905" stroke="#000" stroke-width="1"/>
                                            </svg> 
                                            </div>
                                            <img src="/pictures/aaaa-page-003.jpg" alt="">
                                        </div>
                                    </div>
                                    @extends('modal.ruangan1')
                                    @foreach($ruangans as $ruangan)
                                    @if($ruangan->floornum)
                                    <div id="kelas2" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
                                        <div class="relative w-full h-full m-auto max-w-2xl md:h-auto">
                                            <!-- Modal content -->
                                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                <!-- Modal header -->
                                                <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                                        {{ $ruangan->roomname }}
                                                    </h3>
                                                    <button type="button" id="buttonClose2" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                                                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                                        <span class="sr-only">Close modal</span>
                                                    </button>
                                                </div>
                                                <!-- Modal body -->
                                                <div class="p-6 space-y-6">
                                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                        <img src="{{ $ruangan->picture }}" alt="">
                                                    </p>
                                                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                                                        <ol>
                                                        <li>Lantai {{ $key }}</li>
                                                        <li>Kapasitas yang dapat ditampung sebanyak {{ $ruangan->capacity }} orang</li>
                                                        <li>{{ $ruangan->description }}</li>
                                                        </ol>
                                                    </p>
                                                </div>
                                                @if($errors->has('roomname'))
                                                    <div class="error py-2 text-sm text-red-600">{{ $errors->first('roomname') }}</div>
                                                @endif
                                                <!-- Modal footer -->
                                                <div  class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                                                    <input type="hidden" id="roomname" name="roomname" value="{{ $ruangan->roomname }}">   
                                                    <button data-modal-hide="defaultModal" type="submit" id="submitted" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Booking Sekarang</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                            </section>
                            <p class="py-2 text-sm text-gray-600">Pilih Ruangan yang akan Anda gunakan.</p>
                        </div>
                    </div>
                </form>

            </div>
            <!--/Card-->

        </section>

      </div>
      <!--/container-->

      <script type="text/javascript">
        $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });
        $(document).ready(function () {
            $('#floornum').on('change',function(e) {
                var floorID = e.target.value;
        $.ajax({
            url:"{{ route('detailPeminjamanAjax') }}",
            type:"POST",
            data: {
            floornum: floorID
        },
        dataType: 'json',
        success:function (result) {
            $('#roomname').empty();
            $('#roomname').append('   <option>Default</option>'); 
            $.each(result.ruangans, function(key,value){
            $('#roomname').append('<option value="'+value.roomname+'">'+value.roomname+'</option>');
            })
        }
            })
            });
            });
        </script>

      {{-- <script>
        $(document).ready(function() {
        $('#floornum').on('change', function() {
           var lantaiPos = $(this).val();
           if(lantaiPos) {
               $.ajax({
                   url: '/reservasi/detailPeminjaman/'+lantaiPos,
                   type: "GET",
                   data : {"_token":"{{ csrf_token() }}"},
                   dataType: "json",
                   success:function(data)
                   {
                     if(data){
                        $('#roomname').empty();
                        $('#roomname').append('   <option>Default</option>'); 
                        $.each(data, function(key,ruangans){
                            $('select[name="ruangans"]').append('<option value="'+ ruangans.roomname +'">' + ruangans.roomname+ '</option>');
                        });
                    }else{
                        $('#course').empty();
                    }
                 }
               });
           }else{
             $('#roomname').empty();
           }
        });
        });
    </script> --}}
    <script>
    document.getElementById('test').onclick = function(){
        document.getElementById("kelas1").classList.toggle("hidden");
    }
    document.getElementById('test1').onclick = function(){
        document.getElementById("kelas2").classList.toggle("hidden");
    }

    document.getElementById('buttonClose1').onclick = function(){
        document.getElementById("kelas1").classList.toggle("hidden");
    }

    document.getElementById('buttonClose2').onclick = function(){
        document.getElementById("kelas2").classList.toggle("hidden");
    }
</script>
@endsection