@extends('layouts.header')
@section('content')
<div class="container mx-auto bg-white my-4 rounded-lg shadow-xl flex flex-col font-sans p-6 h-full">
    <h2 class="text-black font-bold no-underline hover:no-underline text-2xl pb-4">Petunjuk Umum</h2>
    @if($petunjuk)
        <embed class="" height="700" src="{{ asset('storage/petunjuk/'.$petunjuk->file_path) }}" alt="pdf" />
    @else
        <p>File not found or not available.</p>
    @endif

</div>

@endsection