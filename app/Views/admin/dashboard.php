<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>

<?php 
if(session()->getFlashdata('loginsukses') == true) :?>
    <div class="alert alert-success">
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span> <?= session()-> getFlashdata ('loginsukses') ?></span>
    </div>
    <div class="text-white font-bold text-lg"></div>
<?php endif ?>

<div class="flex justify-evenly items-center flex-wrap">
    <div class="w-60 h-60 lg:w-96 lg:h-96 xl:w-[450px] xl:h-[450px] bg-blue-600 rounded-md my-5 relative">
        <h1 class="text-3xl lg:text-5xl font-medium mt-6 text-center text-white">Jumlah Peserta</h1>
        <h1 class="text-8xl lg:text-[280px] font-semibold text-center mt-5 text-white"><?= $total ?></h1>
    </div>
    <div class="w-60 h-60 lg:w-96 lg:h-96 xl:w-[450px] xl:h-[450px] bg-slate-600 rounded-md my-5 relative">
        <h1 class="text-3xl lg:text-5xl font-medium mt-6 text-center text-white">Status Belum</h1>
        <h1 class="text-8xl lg:text-[280px] font-semibold text-center mt-5 text-white"><?= $belum ?></h1>
    </div>
    <div class="w-60 h-60 lg:w-96 lg:h-96 xl:w-[450px] xl:h-[450px] bg-yellow-400 rounded-md my-5 relative">
        <h1 class="text-3xl lg:text-5xl font-medium mt-6 text-center text-white">Status Ujian</h1>
        <h1 class="text-8xl lg:text-[280px] font-semibold text-center mt-5 text-white"><?= $ujian ?></h1>
    </div>
    <div class="w-60 h-60 lg:w-96 lg:h-96 xl:w-[450px] xl:h-[450px] bg-green-600 rounded-md my-5 relative">
        <h1 class="text-3xl lg:text-5xl font-medium mt-6 text-center text-white">Status Selesai</h1>
        <h1 class="text-8xl lg:text-[280px] font-semibold text-center mt-5 text-white"><?= $selesai ?></h1>
    </div>
</div>



<?= $this->endSection(); ?>