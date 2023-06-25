<?= $this->extend('templates/mainSoal'); ?>
<?= $this->section('content'); ?>
<div class="overflow-x-auto p-3">
    <h1 class="text-center my-3 text-xl font-bold">Submit dan Finish</h1>
    <div class="w-full h-screen">
        <?php foreach($data as $row) :?>
        <div class="w-full h-10 rounded-md mb-2 flex justify-center items-center <?= $row['jawaban'] != null || $row['jawaban'] != '' ? 'bg-green-500' : 'bg-red-500' ?>">
            <p>Soal <?= $row['urutan'] ?> <?= $row['jawaban'] != null || $row['jawaban'] != '' ? 'terjawab' : 'belum terjawab' ?></p>
        </div>
        <?php endforeach ?>
        <div class="flex justify-between p-2">
            <a href="/loadSoal/1" class="btn btn-primary">Kembali</a>
            <a href="/saveJawaban" class="btn btn-primary">Submit</a>
        </div>
        </div>
    </div>
<?= $this->endSection(); ?>