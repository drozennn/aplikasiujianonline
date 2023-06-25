<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>
<div class="p-3">
    <div class="flex justify-between">
        <h1 class="text-3xl text-black font-bold">Review Ujian</h1>
        <a href="" class="btn btn-wide btn-accent text-white">Cetak Hasil</a>
    </div>
    <div class="w-full h-1 bg-black rounded-sm my-4"></div>
    <?php $i = 1 ?>
    <?php foreach($data as $row) :?>
        <div class="">
            <p class="font-bold text-black px-2 pb-1 text-lg">Soal <?= $i ?></p>
            <div class="border border-gray-500 p-2 rounded-md">
                <p class=""><?= $row['soal'] ?></p>
                <br>
                <p>Jawaban : </p>
                <p><i><?= $row['jawaban'] ?></i></p>
            </div>
        </div>
        <?php $i++ ?>
    <?php endforeach ?>
</div>
<?= $this->endSection(); ?>