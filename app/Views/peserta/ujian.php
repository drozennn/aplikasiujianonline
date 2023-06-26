<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>
<div class="overflow-x-auto p-4">
    <?php $error = session()->get('_ci_validation_errors'); ?>

    <?php if(session()->getFlashdata('token-false')) :?>
        <div class="alert alert-error mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span><?= session()->getFlashdata('token-false') ?></span>
        </div>
    <?php endif?>

    <?php if(isset($error['inputtoken'])) :?>
        <div class="alert alert-error mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 14l2-2m0 0l2-2m-2 2l-2-2m2 2l2 2m7-2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span><?= $error['inputtoken'] ?></span>
        </div>
    <?php endif ; ?>

    <?php if(session()->getFlashdata('selesai')) :?>
        <div class="alert alert-success mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span><?= session()->getFlashdata('selesai') ?></span>
        </div>
    <?php endif ; ?>

    <p class="font-poppins text-4xl mb-6 font-bold lg:text-6xl">Ujian IMEV 2023</p>
    <?php if ($peserta['status'] == 'belum') : ?>
        <p class="font-poppins">Jumlah Soal : <?= count($soal) ; ?></p>
        <p class="font-poppins mb-2">Anda memiliki 1 kesempatan untuk mengerjakan ujian ini.</p>
        
        <label for="inputtoken" class="font-poppins text-slate-400 mb-1">Token</p>
        
        <form method="post" action="/soal" class="md:flex md:items-center">
            <input name="inputtoken" id="inputtoken" type="text" placeholder="Masukkan token disini" class="input input-bordered input-primary w-full max-w-xs text-black" />
            <button onclick="" class="btn btn-success mt-2 justify-center md:inline md:ml-2 md:mt-0">Mulai</button>
        </form>
        
    <?php elseif ($peserta['status'] == 'ujian') : ?>
        <p class="font-poppins">Anda memiliki ujian yang sedang berjalan</p>
        <form action="/soal" method="post">
            <button class="btn btn-success mt-2">Lanjutkan</button>
        </form>
    <?php else : ?>
        <p class="font-poppins">Anda telah menggunakan seluruh kesempatan anda atau Waktu ujian telah selesai.</p>
        <a class="btn btn-info mt-2" href="/dashboard">Kembali ke Dashboard</a>
    <?php endif; ?>
</div>

<?= $this->endSection(); ?>