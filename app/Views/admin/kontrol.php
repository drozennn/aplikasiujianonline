<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>
<div class="p-3 bg-[#F0edcc]">
    <div class="lg:flex lg:justify-around">
        <div class="max-w-md  bg-white shadow-xl px-4 py-2 rounded-lg mb-6 relative">
            <figure class="p-4 flex justify-center">
                <img src="/asset/time-icon.png" alt="Time" class="rounded-xl" width="90%" />
            </figure>
            <div class="text-center">
                <h2 class="font-bold text-3xl text-black mb-3">Waktu Ujian</h2>
                <p>Kontrol waktu untuk ujian peserta meliputi <b>WAKTU DIMULAI</b> nya ujian dan <b>WAKTU SELESAI</b>  nya ujian</p>
                <div class="mt-4">
                    <a href="/admin/kontrol/waktu" class="btn btn-outline btn-info w-full cursor-pointer shadow-md">Manage</a>
                </div>
            </div>
        </div>
        <div class="max-w-md bg-white shadow-xl px-4 py-2 rounded-lg mb-6 relative">
            <figure class="p-4 flex justify-center">
                <img src="/asset/userKontrol-icon.png" alt="User" class="rounded-xl" width="90%" />
            </figure>
            <div class="text-center">
                <h2 class="font-bold text-3xl text-black mb-3">Peserta Ujian</h2>
                <p class="text-lg">Kontrol peserta ujian untuk mengubah <b>STATUS</b> peserta</p>
                <div class="mt-4">
                    <a href="/admin/kontrol/peserta" class="btn btn-outline btn-info w-full cursor-pointer shadow-md">Manage</a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<?= $this->endSection(); ?>
