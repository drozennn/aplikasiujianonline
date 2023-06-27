<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>
<div class="p-3">
    <?php if(session()->get('account')['status'] != 'belum' && session()->get('account')['status'] != 'ujian'): ?>
        <h1 class="text-2xl lg:text-3xl text-black font-bold font-poppins">Review Ujian</h1>
        <div class="w-full h-0.5 bg-black rounded-sm my-4"></div>
        <?php $i = 1 ?>
        <?php foreach($data as $row) :?>
            <div class="">
                <p class="font-bold text-black px-2 pb-1 text-lg mt-3 ">Soal <?= $i ?></p>
                <div class="border border-gray-500 p-2 rounded-md bg-slate-100">
                    <p class=""><?= $row['soal'] ?></p>
                    <br>
                    <p>Jawaban : </p>
                    <p><i><?= $row['jawaban'] ?></i></p>
                </div>
            </div>
            <?php $i++ ?>
        <?php endforeach ?>
    <?php else :?>
        <div class="flex justify-center">
            <img src="/asset/access-denied.png" alt="">
        </div>
        <div class="p-3 -mt-4 bg-red-600 text-white text-xl font-semibold text-center shadow-lg rounded-md">
            <h1 class="font-poppins">SELESAIKAN UJIAN UNTUK DAPAT MELIHAT REVIEW</h1>
        </div>
    <?php endif ?>
</div>
<?= $this->endSection(); ?>