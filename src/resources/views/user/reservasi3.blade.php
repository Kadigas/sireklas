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
                        <h3 class="font-medium leading-tight">Detail Peminjaman</h3>
                    </span>
                </li>
                <li class="flex items-center text-blue-600 dark:text-blue-500 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                        3
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Detail Kegiatan</h3>
                    </span>
                </li>
            </ol>
            </div>
                <div class="pb-10">
                    <h1 class="font-bold text-3xl mb-4">Detail Kegiatan</h1>
                    <p class="text-gray-500">Keterangan kegiatan diperlukan untuk memastikan keaslian peminjaman. Nama Acara beserta waktu peminjaman akan ditampilkan di ruangan yang dipinjam, apabila peminjaman disetujui.</p>
                </div>
                <form action="{{route('postCreateStepThree')}}" method="POST">
                    @csrf
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Unit/Organisasi
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <select class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="organization" name="organization">
                                <option value="">Default</option>
                                <option value="ITS">ITS</option>
                                <option value="Fakultas">Fakultas</option>
                                <option value="Departemen">Departemen</option>
                                <option value="BEM">BEM</option>
                                <option value="Himpunan">Himpunan</option>
                                <option value="Mahasiswa">Mahasiswa</option>
                                <option value="Lainnya">Lainnya</option>
                            </select>
                            @if($errors->has('organization'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('organization') }}</div>
                            @endif
                            <p class="py-2 text-sm text-gray-600">Pilih Organisasi yang Anda wakilkan.</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Jabatan Penanggung Jawab Utama
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="pic_position" name="pic_position" type="text" value="">
                            <p class="py-2 text-sm text-gray-600">Masukkan jabatan Penanggung Jawab Utama.</p>
                            @if($errors->has('pic_position'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('pic_position') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Nama Kegiatan
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="event_name" name="event_name" type="text" >
                            @if($errors->has('event_name'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('event_name') }}</div>
                            @endif
                            <p class="py-2 text-sm text-gray-600">Masukkan nama kegiatan Anda.</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Kategori Acara
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <select class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="event_category" name="event_category">
                                <option value="">Default</option>
                                <option value="Perkuliahan">Perkuliahan</option>
                                <option value="Evaluasi">Evaluasi / Ujian</option>
                                <option value="Praktikum">Praktikum</option>
                                <option value="Pelatihan">Pelatihan</option>
                                <option value="Rapat Organisasi">Rapat Organisasi</option>
                            </select>
                            @if($errors->has('event_category'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('event_category') }}</div>
                            @endif
                            <p class="py-2 text-sm text-gray-600">Pilih kategori kegiatan Anda.</p>
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Deskripsi Kegiatan
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <textarea class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="event_description" name="event_description" type="text" cols="30" rows="10"></textarea>
                            @if($errors->has('event_description'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('event_description') }}</div>
                            @endif
                            <p class="py-2 text-sm text-gray-600">Deskripsikan kegiatan Anda.</p>
                        </div>
                    </div>

                    {{-- <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                            Surat
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input type="file" name="suratpath" id="suratpath">
                            <p class="py-2 text-sm text-gray-600">Masukkan Surat/Izin terkait Acara</p>
                            @if($errors->has('suratpath'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('suratpath') }}</div>
                            @endif
                        </div>
                    </div> --}}

                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3">
                            <button type="submit" class="shadow bg-green-700 hover:bg-green-900 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" type="button">
                                Kirim
                            </button>
                        </div>
                    </div>
                </form>

            </div>
            <!--/Card-->

        </section>

      </div>
      <!--/container-->
@endsection