<!-- Navbar -->
<nav class="bg-gray-800 py-4 w-full fixed z-50 top-0">
    <div class="mx-auto ">
            <div class="flex items-center justify-between px-5">
                <div class="text-white font-bold text-4xl">IMEV 12</div>
                <div class="flex">
                    <div class="bg-white w-7 h-7 mr-2 flex items-center justify-center rounded-full overflow-hidden">
                        <img src="/asset/user-icon.png" alt="" width="25px">
                    </div>
                <div class="text-white font-bold text-lg">Hello, <?= session()->get('account')['nama'] ?></div>
            </div>
        </div>
    </div>
</nav>
<!-- Navbar End -->