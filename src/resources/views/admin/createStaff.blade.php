@extends('layouts.admin')
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

<div class="container w-full flex flex-wrap mx-auto lg:pt-4 pb-10">
    <!--Section container-->
    <section class="w-full">
        <!--Card-->
        <div id='section' class="p-8 mt-6 lg:mt-0 rounded-lg shadow-lg bg-white">
            <div class="pb-10">
                <h1 class="font-bold text-3xl mb-4">Tambah Staff</h1>
                <p class="text-gray-500">Form ini digunakan untuk menambah staff dengan memasukkan user ID dan ID ruangan.</p>
            </div>
            <form action="{{ route('storeStaff') }}" method="POST">
                @csrf

                <!-- User ID Field -->
                <div class="md:flex mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="user_id">
                            User ID
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="user_id" name="user_id" type="text" placeholder="Masukkan User ID">
                        @if($errors->has('user_id'))
                            <div class="error py-2 text-sm text-red-600">{{ $errors->first('user_id') }}</div>
                        @endif
                        <p class="py-2 text-sm text-gray-600">Masukkan myITS ID pengguna (user).</p>
                    </div>
                </div>

                <!-- Ruangan ID Field -->
                <div class="md:flex mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="ruangan_id">
                            Ruangan ID
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <select class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="ruangan_id" name="ruangan_id">
                            <option value="">Pilih Ruangan</option>
                            @foreach($ruangans as $ruangan)
                                <option value="{{ $ruangan->id }}">{{ $ruangan->roomname }}</option>
                            @endforeach
                        </select>
                        @if($errors->has('ruangan_id'))
                            <div class="error py-2 text-sm text-red-600">{{ $errors->first('ruangan_id') }}</div>
                        @endif
                        <p class="py-2 text-sm text-gray-600">Pilih ID ruangan yang terkait dengan staff ini.</p>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="md:flex md:items-center">
                    <div class="md:w-1/3"></div>
                    <div class="md:w-2/3">
                        <button type="submit" class="shadow bg-green-700 hover:bg-green-900 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded">
                            Simpan
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
