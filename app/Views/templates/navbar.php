<!-- Navbar -->
<nav class="bg-[#02343F] py-4 w-full fixed z-50 top-0">
    <?php $nama = session()->get('account')['nama'];
        $namaArray = explode(" ", $nama);

        if (count($namaArray) == 2) {
            $bagianNama = $namaArray[0]; // Jika nama terdiri dari 2 kata, ambil kata pertama
        } elseif (count($namaArray) == 1) {
            $bagianNama = $namaArray[0];
        } else{
            $bagianNama = $namaArray[1]; // Jika nama terdiri dari lebih dari 2 kata, ambil kata kedua
        }?>
    <div class="mx-auto ">
            <div class="flex items-center justify-between px-5">
                <div class="text-white font-bold text-4xl">IMEV 12</div>
                <div class="flex">
                    <div class="bg-white w-7 h-7 mr-2 flex items-center justify-center rounded-full overflow-hidden">
                        <img src="/asset/user-icon.png" alt="" width="25px">
                    </div>
                <div class="text-white font-bold text-lg capitalize">Hello, <?= $bagianNama ?></div>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->