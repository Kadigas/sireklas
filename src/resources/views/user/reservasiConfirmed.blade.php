@extends('layouts.header')
@section('content')


<div class="flex flex-col justify-center items-center h-screen">
    <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
    </svg>
    <h1 class="font-bold text-4xl my-8">Reservasi Telah Sukses!</h1>
    <div class="flex flex-row items-center justify-center">
        <a href="reservasi" type="button" class="focus:outline-none text-white bg-yellow-700 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-3 mr-2 mb-2 dark:focus:ring-yellow-900">Reservasi lagi</a>
        <a href="status"type="button" class="focus:outline-none text-white bg-green-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-lg px-5 py-3 mr-2 mb-2 dark:focus:ring-yellow-900">Lihat Status</a>
    </div>
</div>
@endsection