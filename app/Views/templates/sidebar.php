<div class="bg-gray-800 w-64 h-screen -translate-x-full transition fixed  sm:translate-x-0 z-30" id="sidebar">
            <nav class="mt-20">
<<<<<<< HEAD
                <a href="#" class="block py-2 px-4 text-white hover:bg-gray-700 text-lg">Home</a>
                <?php 
                    if(session()->get('account')['nama'] == 'admin') {
                        echo '<a href="/admin/pesertaujian" class="block py-2 px-4 text-white hover:bg-gray-700 text-lg">Peserta Ujian</a>'; //admin
                        echo '<a href="/admin/hasilujian" class="block py-2 px-4 text-white hover:bg-gray-700 text-lg">Hasil Ujian</a>';
                    }else {
                        echo '<a href="#" class="block py-2 px-4 text-white hover:bg-gray-700 text-lg">Ujian</a>'; // peserta
                        echo '<a href="#hasulujian-peserta" class="block py-2 px-4 text-white hover:bg-gray-700 text-lg">Hasil Ujian</a>';
=======
                
                <?php 
                    if(session()->get('account')['nama'] == 'admin') {
                        echo '<a href="/admin/dashboard" class="block py-2 px-4 text-white hover:bg-gray-700 text-lg">Home</a>';
                        echo '<a href="/admin/pesertaujian" class="block py-2 px-4 text-white hover:bg-gray-700 text-lg">Peserta Ujian</a>'; //admin
                        echo '<a href="/admin/hasilujian" class="block py-2 px-4 text-white hover:bg-gray-700 text-lg">Hasil Ujian</a>';
                    }else {
                        echo '<a href="/dashboard" class="block py-2 px-4 text-white hover:bg-gray-700 text-lg">Home</a>';
                        echo '<a href="/ujian" class="block py-2 px-4 text-white hover:bg-gray-700 text-lg">Ujian</a>'; // peserta
                        echo '<a href="/hasilujian" class="block py-2 px-4 text-white hover:bg-gray-700 text-lg">Hasil Ujian</a>';
>>>>>>> 6c7768d8f1b29b6f0e960b895279b81fd9360f51
                    }
                ?>
            </nav>
            <div class="absolute bottom-0 p-2 w-full">
                <a href="/logout" class="bg-red-700 py-1 hover:bg-red-800 text-center block text-white rounded-md">Log Out</a>
            </div>
        </div>