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
            <ol class="items-center justify-center w-full space-y-4 sm:flex sm:space-x-8 sm:space-y-0">
                <li class="flex items-center text-blue-600 dark:text-blue-500 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
                        1
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Informasi Peminjaman</h3>
                    </span>
                </li>
                <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                        2
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Detail Peminjaman</h3>
                    </span>
                </li>
                <li class="flex items-center text-gray-500 dark:text-gray-400 space-x-2.5">
                    <span class="flex items-center justify-center w-8 h-8 border border-gray-500 rounded-full shrink-0 dark:border-gray-400">
                        3
                    </span>
                    <span>
                        <h3 class="font-medium leading-tight">Detail Kegiatan</h3>
                    </span>
                </li>
            </ol>
            </div>
                <div class="pb-10">
                    <h1 class="font-bold text-3xl mb-4">Informasi Peminjam</h1>
                    <p class="text-gray-500">Informasi peminjam dibutuhkan dalam memastikan keaslian peminjaman. Nomor Telepon dan Email dipergunakan untuk menghubungi peminjam saat ruangan tidak dapat dipinjam, atau ketika ruangan yang akan digunakan dialihkan untuk kegiatan lainnya.</p>
                </div>

                <form action="{{ route('postCreateStepOne') }}" method="POST">
                    @csrf
                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                Nama Lengkap
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="fullname" name="fullname"
                             type="text" value="{{$userLogin->name}}">
                            <p class="py-2 text-sm text-gray-600">Masukkan nama lengkap Anda (max. 100 karakter).</p>
                            @if($errors->has('fullname'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('fullname') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                NRP / NIP
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="reserverid" name="reserverid" type="text" value="{{$userLogin->username}}">
                            <p class="py-2 text-sm text-gray-600">Masukkan NRP atau NIP Anda.</p>
                            @if($errors->has('reserverid'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('reserverid') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                Nomor Telepon
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="phone" name="phone" type="text" value="{{$userLogin->phone}}">
                            <p class="py-2 text-sm text-gray-600">Masukkan nomor telepon Anda yang dapat dihubungi.</p>
                            @if($errors->has('phone'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('phone') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="md:flex mb-6">
                        <div class="md:w-1/3">
                            <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="my-textfield">
                                Email
                            </label>
                        </div>
                        <div class="md:w-2/3">
                            <input class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="email" name="email" type="text" value="{{$userLogin->email}}">
                            <p class="py-2 text-sm text-gray-600">Masukkan email Anda.</p>
                            @if($errors->has('email'))
                                <div class="error py-2 text-sm text-red-600">{{ $errors->first('email') }}</div>
                            @endif
                        </div>
                    </div>

                    <div class="md:flex md:items-center">
                        <div class="md:w-1/3"></div>
                        <div class="md:w-2/3">
                            <button type="submit" class="shadow bg-blue-900 hover:bg-blue-700 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" >
                                Selanjutnya
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