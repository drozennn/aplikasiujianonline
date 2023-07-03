<div class="bg-[#02343F] w-64 h-screen -translate-x-full transition fixed  sm:translate-x-0 z-30" id="sidebar">
    <nav class="mt-20">
        <?php 
        if(session()->get('account')['nama'] == 'admin') {
            echo '<a href="/admin/dashboard" class="block py-2 px-4 text-white hover:bg-gray-700 text-lg">Home</a>';
            echo '<a href="/admin/pesertaujian" class="block py-2 px-4 text-white hover:bg-gray-700 text-lg">Peserta Ujian</a>'; //admin
            echo '<a href="/admin/hasilujian" class="block py-2 px-4 text-white hover:bg-gray-700 text-lg">Hasil Ujian</a>';
            echo '<a href="/admin/kontrol" class="block py-2 px-4 text-white hover:bg-gray-700 text-lg">Kontrol</a>';
        }else {
            echo '<a href="/dashboard" class="block py-2 px-4 text-white hover:bg-gray-700 text-lg">Home</a>';
            echo '<a href="/ujian" class="block py-2 px-4 text-white hover:bg-gray-700 text-lg">Ujian</a>'; // peserta
            echo '<a href="/hasilujian" class="block py-2 px-4 text-white hover:bg-gray-700 text-lg">Review Ujian</a>';
        }
        ?>
    </nav>
    
    
    <!-- <div class="flex flex-wrap">
        <div class="w-20 bg-green-400 rounded-md flex justify-center items-center p-2">
            <img src="/asset/sponsor1.png" alt="sponsor1">
        </div>
        <div class="w-28 bg-green-400 rounded-md flex justify-center items-center p-2">
            <img src="/asset/sponsor2.png" alt="sponsor2">
        </div>
        <div class="w-28 bg-green-400 rounded-md flex justify-center items-center p-2">
            <img src="/asset/sponsor3.png" alt="sponsor3">
        </div>
        <div class="w-28 bg-green-400 rounded-md flex justify-center items-center p-2">
            <img src="/asset/sponsor4.png" alt="sponsor4">
        </div>
    </div> -->
    <div class="absolute bottom-0 p-2 w-full">
        <div class="flex flex-wrap justify-around gap-3 my-3">
            <div class="bg-slate-50 w-28 h-28 flex items-center justify-center rounded-md overflow-hidden">
                <img src="/asset/sponsor1.png" alt="sponsor1" width="85%">
            </div>
            <div class="bg-slate-50 w-28 h-28 flex items-center justify-center rounded-md overflow-hidden">
                <img src="/asset/sponsor2.png" alt="sponsor2" width="85%">
            </div>
            <div class="bg-slate-50 w-28 h-28 flex items-center justify-center rounded-md overflow-hidden">
                <img src="/asset/sponsor3.png" alt="sponsor3" width="85%">
            </div>
            <div class="bg-slate-50 w-28 h-28 flex items-center justify-center rounded-md overflow-hidden">
                <img src="/asset/sponsor4.png" alt="sponsor4" width="85%">
            </div>
        </div>
        <?php if(session()->get('account')['nama'] == 'admin') : ?>
            <a href="/admin/logout" class="bg-red-700 py-1 hover:bg-red-800 text-center block text-white rounded-md">Log Out</a>
        <?php else : ?>
            <a href="/logout" class="bg-red-700 py-1 hover:bg-red-800 text-center block text-white rounded-md">Log Out</a>
        <?php endif ?>
    </div>
</div>