<form id="submitClass" method="get" accept-charset="utf-8">
<div id="kelas2" tabindex="-1" aria-hidden="true" class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-modal md:h-full">
    <div class="relative w-full h-full m-auto max-w-2xl md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="flex items-start justify-between p-4 border-b rounded-t dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Kelas 2
                </h3>
                <button type="button" id="buttonClose2" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="defaultModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    <img src="/pictures/Class2.jpg" alt="">
                </p>
                <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                    <ol>
                        <li>{{ $ruangans->capacity }}</li>
                        <li>{{ $ruangans->description }}</li>
                    </ol>
                </p>
            </div>
            <!-- Modal footer -->
            <div  class="flex items-center p-6 space-x-2 border-t border-gray-200 rounded-b dark:border-gray-600">
                <input type="hidden" id="roomname" name="roomname" value="Kelas 2">   
                <button data-modal-hide="defaultModal" type="submit" id="submitted" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Booking Sekarang</button>
            </div>
        </div>
    </div>
</div>
</form>

<script>
$(document).ready(function() {
        $('#submitClass').on('submit', function() {
           var roomname = $('#roomname').val();
           if(roomname) {
               $.ajax({
                   url: '/reservasi/detailPeminjaman/',
                   type: "POST",
                   data : {"_token":"{{ csrf_token() }}"},
                   dataType: "json",
                   success:function(data)
                   {
                    alert("Sukses memilih ruangan");
                    document.getElementById("kelas2").classList.toggle("hidden");
                 }
               });
           }else{
             $('#roomname').empty();
           }
        });
        });
</script>