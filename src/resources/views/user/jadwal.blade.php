@extends('layouts.header')
@section('content')
<style>
    .fc-event {
        width: auto;
        height: auto;
        display: flex;
        flex-wrap: wrap;
        align-content: center;
    }

</style>


<div class="container bg-white mx-auto py-2 my-4 rounded-lg shadow-xl">
    <div class="mx-4 pl-2">
    <h1 class="text-black font-bold no-underline hover:no-underline text-2xl pt-2">Jadwal</h1> 
    <div class="flex flex-row justify-between w-56 ">
        <div>
            <label for="floornum" class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Lantai</label>
            <select id="lantai-dropdown" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-100 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Pilih Lantai</option>
                @foreach ($floornum as $datas)
                <option value="{{$datas->floornum}}">
                    {{$datas->floornum}}
                </option>
                @endforeach
        </select>
        </div>
    
        <div>
            <label for="kelas" class="block  mb-2 text-sm font-medium text-gray-900 dark:text-white">Pilih Kelas</label>
            <select id="kelas-dropdown" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-100 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                <option value="">Pilih Kelas</option>
        </select>
        </div>
    
    </div>

    <div class=" bg-white px-6 py-5 rounded-md z-0">
        <div id="calendar" class=""></div>
    </div>
</div>

<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js" integrity="sha256-lSjKY0/srUM9BE3dPm+c4fBo1dky2v27Gdjm2uoZaL0=" crossorigin="anonymous"></script>
   
<script>

$(document).ready(function () {
    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN' : $('meta[name="csrf-token"]').attr('content')
        }
    });
    var schedule = @json($event);
    var calendar = $('#calendar').fullCalendar({
        timeZone:'local',
        themeSystem: 'jquery-ui',
        groupByResource: true,
        defaultView:'agendaWeek',
        contentHeight:'auto',
        editable:false,
        header:{
            left:'agendaWeek,agendaDay',
            center:'title, resources',
            right:'prev,next today'
        },
        events:schedule,
        eventRender: function(event, element) { 
            element.find('.fc-title').after("-<span class=\"myClass\">" + event.room_name + "</span>"); 
        } ,
        
    });
    $('.fc').css('background-color', 'white');
    $('#lantai-dropdown').on('change', function () {
                var floornum = this.value;
                $("#kelas-dropdown").html('');
                $.ajax({
                    url: "{{route('fetchruangan')}}",
                    type: "POST",
                    data: {
                        floornum: floornum,
                        _token: '{{csrf_token()}}'
                    },
                    dataType: 'json',
                    success: function (result) {
                        $('#kelas-dropdown').html('<option value="">Pilih Kelas</option>');
                        $.each(result.room_name, function (key, value) {
                            $("#kelas-dropdown").append('<option value="'+ value
                                .roomname +'">' + value.roomname + '</option>');
                        });
                    }
                });
            });

                $("#kelas-dropdown").on('change',function() {
            var selectedKelas = this.value
            alert("You have selected  " + selectedKelas);
            $.ajax({
                url:"{{ route('fetchcalendar') }}",
                type:"POST",
                data: {
                room_name: selectedKelas,
                _token: '{{csrf_token()}}'
            },
            dataType: 'json',
            success:function (result) {
                // alert(result);
                calendar.fullCalendar ('removeEvents'); 
                // console.log(result);
                schedule = result.event
                console.log(schedule)
                calendar.fullCalendar( 'addEventSource', schedule )
                calendar.fullCalendar("rerenderEvents");
            },
            error: function() {
                alert('Error occured');
            }
            
            });
            });

   
    
    // var calendar = $('#calendar').fullCalendar({
    //     timeZone:'local',
    //     themeSystem: 'jquery-ui',
    //     groupByResource: true,
    //     defaultView:'agendaWeek',
    //     editable:false,
    //     header:{
    //         left:'agendaWeek,agendaDay',
    //         center:'title, resources',
    //         right:'prev,next today'
    //     },
    //     events:schedule,
    //     eventRender: function(event, element) { 
    //         element.find('.fc-title').after("-<span class=\"myClass\">" + event.ruangan + "</span>"); 
    //     } ,
        
    // });
    // $('.fc').css('background-color', 'white');
});
</script>
@endsection('content')