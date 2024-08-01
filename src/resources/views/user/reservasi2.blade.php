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
                    <li class="flex items-center text-blue-600 dark:text-blue-500 space-x-2.5">
                        <span class="flex items-center justify-center w-8 h-8 border border-blue-600 rounded-full shrink-0 dark:border-blue-500">
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
                <h1 class="font-bold text-3xl mb-4">Detail Peminjaman</h1>
                <p class="text-gray-500">Ruangan yang akan dipinjam memiliki kapasitas dan fasilitas yang berbeda-beda. Teknisi yang bertanggung jawab terhadap ruangan dapat dilihat di halaman staff. Untuk melihat ketersediaan ruangan dapat dilihat di halaman ruangan</p>
                @if ($errors->has('msg'))
                <div class="error py-4 text-md text-bold text-red-600">{{$errors->first('msg')}}</div>
                @endif
            </div>
            <form action="{{route('postCreateStepTwo')}}" method="POST">
                @csrf
                <div class="md:flex mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="start">
                        Tanggal dan Waktu Mulai Peminjaman
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="start" name="start" type="datetime-local">
                        @if($errors->has('start'))
                            <div class="error py-2 text-sm text-red-600">{{ $errors->first('start') }}</div>
                        @endif
                        <p class="py-2 text-sm text-gray-600">Pilih tanggal acara Anda (Format: DD-MM-YYYY).</p>
                    </div>
                </div>

                <div class="md:flex mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="end">
                        Tanggal dan Waktu Selesai Peminjaman
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <input class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="end" name="end" type="datetime-local" disabled>
                        @if($errors->has('end'))
                            <div class="error py-2 text-sm text-red-600">{{ $errors->first('end') }}</div>
                        @endif
                        <p class="py-2 text-sm text-gray-600">Masukkan tanggal dan waktu selesai peminjaman.</p>
                    </div>
                </div>

                <div class="md:flex mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="floornum">
                        Lantai
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <select class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="floornum" name="floornum" disabled>
                            <option value="">Default</option>
                            @foreach ($lantais as $key => $lantai)
                            <option value="{{ $lantai->floornum }}">Lantai {{ $lantai->floornum}}</option>
                            @endforeach
                        </select>
                        @if($errors->has('floornum'))
                            <div class="error py-2 text-sm text-red-600">{{ $errors->first('floornum') }}</div>
                        @endif
                        <p class="py-2 text-sm text-gray-600">Pilih Lantai dari ruangan yang akan Anda gunakan.</p>
                    </div>
                </div>

                <div class="md:flex mb-6">
                    <div class="md:w-1/3">
                        <label class="block text-gray-600 font-bold md:text-left mb-3 md:mb-0 pr-4" for="room_name">
                        Ruangan
                        </label>
                    </div>
                    <div class="md:w-2/3">
                        <select class="form-input block w-full focus:bg-white border border-gray-300 px-2 py-1" id="room_name" name="room_name" disabled>
                            <option value="">Pilih Kelas</option>
                        </select>
                        <p class="py-2 text-sm text-gray-600">Pilih Ruangan yang akan Anda gunakan.</p>
                    </div>
                </div>

                <div id="denah"></div>
                <button data-modal-hide="defaultModal" type="submit" id="submitted" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Booking Sekarang</button>
            </form>
        </div>
        <!--/Card-->
    </section>
</div>
<!--/container-->

<script>
    function pad(number) {
        return (number < 10 ? '0' : '') + number;
    }

    function getCurrentDateTime() {
        const now = new Date();
        const year = now.getFullYear();
        const month = pad(now.getMonth() + 1);
        const day = pad(now.getDate());
        const hours = pad(now.getHours());
        const minutes = pad(now.getMinutes());
        return `${year}-${month}-${day}T${hours}:${minutes}`;
    }

    function isValidTime(date) {
        const day = date.getDay();
        const hours = date.getHours();

        if (day >= 1 && day <= 5) { // Monday to Friday
            return hours >= 8 && hours < 18;
        } else { // Saturday and Sunday
            return hours >= 8 && hours < 16;
        }
    }

    function setMinStartDate() {
        const startInput = document.getElementById('start');
        startInput.setAttribute('min', getCurrentDateTime());
    }

    function setEndDateRestrictions() {
        const startInput = document.getElementById('start');
        const endInput = document.getElementById('end');
        const floornumInput = document.getElementById('floornum');
        const roomNameInput = document.getElementById('room_name');

        if (startInput.value) {
            const startDate = new Date(startInput.value);
            const year = startDate.getFullYear();
            const month = pad(startDate.getMonth() + 1);
            const day = pad(startDate.getDate());

            if (!isValidTime(startDate)) {
                alert("Waktu reservasi harus di antara 08:00 - 18:00 pada hari kerja, dan 08:00 - 16:00 pada akhir pekan.");
                startInput.value = '';
                endInput.setAttribute('disabled', true);
                floornumInput.setAttribute('disabled', true);
                roomNameInput.setAttribute('disabled', true);
                return;
            }

            const minEndDate = startInput.value;
            const maxEndDate = `${year}-${month}-${day}T${day >= 1 && day <= 5 ? '18:00' : '16:00'}`;

            endInput.setAttribute('min', minEndDate);
            endInput.setAttribute('max', maxEndDate);
            endInput.removeAttribute('disabled');
        } else {
            endInput.removeAttribute('min');
            endInput.removeAttribute('max');
            endInput.setAttribute('disabled', true);
            floornumInput.setAttribute('disabled', true);
            roomNameInput.setAttribute('disabled', true);
        }

        if (endInput.value) {
            floornumInput.removeAttribute('disabled');
        } else {
            floornumInput.setAttribute('disabled', true);
            roomNameInput.setAttribute('disabled', true);
        }

        enableRoomName();
    }

    function validateEndBeforeStart() {
        const startInput = document.getElementById('start');
        const endInput = document.getElementById('end');

        if (new Date(endInput.value) < new Date(startInput.value)) {
            endInput.setCustomValidity("Tanggal dan waktu selesai harus setelah tanggal dan waktu mulai.");
        } else if (!isValidTime(new Date(endInput.value))) {
            endInput.setCustomValidity("Waktu reservasi harus di antara 08:00 - 18:00 pada hari kerja, dan 08:00 - 16:00 pada akhir pekan.");
        } else {
            endInput.setCustomValidity("");
        }

        enableRoomName();
    }

    function enableRoomName() {
        const floornumInput = document.getElementById('floornum');
        const roomNameInput = document.getElementById('room_name');
        const endInput = document.getElementById('end');

        if (endInput.value && floornumInput.value) {
            roomNameInput.removeAttribute('disabled');
        } else {
            roomNameInput.setAttribute('disabled', true);
        }

        enableSubmitButton();
    }

    function enableSubmitButton() {
        const roomNameInput = document.getElementById('room_name');
        const submitButton = document.getElementById('submitted');

        if (roomNameInput.value) {
            submitButton.removeAttribute('disabled');
        } else {
            submitButton.setAttribute('disabled', true);
        }
    }

    // Set initial min attributes on page load
    window.onload = function() {
        setMinStartDate();
        document.getElementById('start').addEventListener('input', setEndDateRestrictions);
        document.getElementById('end').addEventListener('input', setEndDateRestrictions);
        document.getElementById('end').addEventListener('input', validateEndBeforeStart);
        document.getElementById('floornum').addEventListener('change', validateEndBeforeStart);
        document.getElementById('room_name').addEventListener('change', enableSubmitButton);
        enableSubmitButton(); // Initial check to disable/enable submit button
    }
</script>


<script type="text/javascript">
    $(document).ready(function () {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $('#floornum').on('change', function () {
            var floornum = this.value;
            $("#room_name").html('');
            $.ajax({
                url: "{{ route('checkAvailability') }}",
                type: "POST",
                data: {
                    floornum: floornum,
                    start: $('#start').val(),
                    end: $('#end').val(),
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#room_name').html('<option value="">Pilih Kelas</option>');
                    $.each(result.ruangan, function (key, value) {
                        $("#room_name").append('<option value="'+ value +'">' + value + '</option>');
                    });
                }
            });
        });

        $('#room_name').on('change', function () {
            var room_name = this.value;
            $.ajax({
                url: "{{ route('detailPeminjamanAjax') }}",
                type: "POST",
                data: {
                    room_name: room_name,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    document.getElementById('denah').innerHTML = '<center><img src="/pictures/'+room_name+'.png" width=500/></center>';
                }
            });
        });
    });
</script>
@endsection
