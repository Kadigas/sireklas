@extends('layouts.header')
@section('content')
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
                <img src="pictures/aaaa-page-003.jpg" alt="">
            </div>
        </div>
        @extends('modal.ruangan1')
        @extends('modal.ruangan2')
    </div>

</section>
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