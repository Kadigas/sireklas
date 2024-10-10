@extends('layouts.admin')
@section('content')  
<div class="container m-auto rounded-lg shadow-lg overflow-x-auto shadow-lg h-screen my-4">
    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400 rounded-lg">
        <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">
            <h1 class="text-black font-bold no-underline hover:no-underline text-2xl pl-2">Staff</h1>
            <div class="flex justify-end">
                <a href="{{ route('createStaff') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded text-sm">
                    Add Staff
                </a>
            </div>
        </caption>
        <thead class="text-sm text-white uppercase bg-blue-700 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Nama
                </th>
                <th scope="col" class="px-6 py-3">
                    Lantai
                </th>
                <th scope="col" class="px-6 py-3">
                    Kelas
                </th>
                <th scope="col" class="px-6 py-3">
                    No Telp
                </th>
                <th scope="col" class="px-6 py-3">
                    Email
                </th>
            </tr>
        </thead>
        <tbody>
            @foreach ($staffs as $staff)
            <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    {{$staff->user->name}}
                </th>
                <td class="px-6 py-4">
                    {{$staff->ruangan->floornum}}
                </td>
                <td class="px-6 py-4">
                    {{$staff->ruangan->roomname}}
                </td>
                <td class="px-6 py-4">
                    {{$staff->user->phone}}
                </td>
                <td class="px-6 py-4">
                    {{$staff->user->email}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection