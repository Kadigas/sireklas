@extends('layouts.admin')
@section('content')
<div class="relative overflow-x-auto h-screen bgSecondITS shadow-md sm:rounded-lg">
    <nav class="flex items-center justify-center flex-wrap p-5  w-full z-0 top-0  sm:justify-between">
		<div class="flex items-center flex-shrink-0 text-white mr-6">
		<div>
			<span class="text-black font-bold no-underline hover:text-white hover:no-underline text-2xl pl-2"><i class="em em-grinning"></i>Detail Reservasi</span>
		</div>
	</div>
    </nav>
    

    {{-- card --}}


    <div class="container w-full flex flex-wrap mx-auto px-2 pt-8 lg:pt-4 mt-8 pb-10">
        <!--Section container-->
        <section class="w-full">
        <form method="post" action="{{  route('terimaReservasi', $reservasis->id)  }}">
        @csrf
            <!--Card-->
            <div id='section' class="p-8 mt-6 lg:mt-0 rounded shadow-lg bg-white">    
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                Nama Lengkap Peminjam
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->fullname }}</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                NRP / NIP
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->reserverid }}</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                Nomor Telepon
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">+62{{ $reservasis->phone }}</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                Email
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->email }}</p>
                        </div>
                    </div>


                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                Jabatan Penanggungjawab
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->pic_position }}</p>
                        </div>
                    </div>


                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                Lantai Ruangan yang dipinjam
                            </label>
                        </div>
                        <input type="hidden" id="floornum" name="floornum" value="{{$reservasis->floornum}}">
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->floornum }}</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                Nama Ruangan yang dipinjam
                            </label>
                        </div>
                        <input type="hidden" id="room_name" name="room_name" value="{{$reservasis->room_name}}">
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->room_name }}</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                               Tanggal Reservasi
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->created_at }}</p>
                        </div>
                    </div>
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                               Tanggal dan Jam Penggunaan
                            </label>
                        </div>
                        <input type="hidden" id="start" name="start" value="{{$reservasis->start}}">
                        <input type="hidden" id="end" name="end" value="{{$reservasis->end}}">
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $date }} {{ $timestart }} - {{ $timeend }}</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                               Organisasi Yang Diwakilkan
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->organization }} </p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                               Nama Kegiatan
                            </label>
                        </div>
                        <input type="hidden" id="event_name" name="event_name" value="{{$reservasis->event_name}}">
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->event_name }} </p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                               Kategori Kegiatan
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->event_category}} </p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                               Deskripsi Kegiatan
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <p class="py-2 text-sm text-gray-600">{{ $reservasis->event_description}} </p>
                        </div>
                    </div>

                    {{-- <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                               Surat keterangan
                            </label>
                        </div>
                        <div class="w-full md:w-3/4">
                            <embed class="w-full md:w-3/4" height="500" weigth="400" src="{{ asset('storage/surat/'.$reservasis->suratpath) }}"  alt="pdf" />
                        </div>
                    </div> --}}

                @if($reservasis->status == '1')
                <form method="post" action="{{  route('terimaReservasi', $reservasis->id)  }}">
                    {{ csrf_field() }}
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                               Status Reservasi :
                            </label>
                        </div>
                        <div class="md:w-2/3">
                        <select class="form-input block w-full focus:bg-white border border-gray-300 py-2 px-2" id="status" name="status">
                                <option value="1">Pending</option>
                                <option value="2">Diterima</option>
                                <option value="3">Ditolak</option>
                            </select>
                            <button type="submit" class="shadow bg-green-900 hover:bg-green-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 mt-8 rounded" >
                                Simpan
                            </button>
                        </div>
                    </div>
                </form>
                @endif
            </div>
        </form>
        </section>
    {{-- card --}}


</div>

@endsection('content')