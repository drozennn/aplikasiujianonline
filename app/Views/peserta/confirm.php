<?= $this->extend('templates/mainSoal'); ?>
<?= $this->section('content'); ?>
<div class="p-4">
    <h1 class="text-center my-3 text-xl sm:text-2xl lg:text-3xl font-bold">Submit dan Finish</h1>
    <div class="w-full h-0.5 bg-slate-300 rounded-sm my-3"></div>
    <div class="w-full h-screen px-2 md:px-5">
        <?php foreach($data as $row) :?>
        <div class="w-full h-10 rounded-md mb-2 flex justify-center items-center sm:h-12 md:h-14 lg:h-16 <?= $row['jawaban'] != null || $row['jawaban'] != '' ? 'bg-green-500' : 'bg-red-500' ?>">
            <p>Soal <?= $row['urutan'] ?> <?= $row['jawaban'] != null || $row['jawaban'] != '' ? 'terjawab' : 'belum terjawab' ?></p>
        </div>
        <?php endforeach ?>
        <div class="flex justify-between p-2" id="submit">
            <a href="/loadSoal/1" class="btn btn-accent">Kembali</a>
            <a href="/saveJawaban" class="btn btn-accent">Submit</a>
        </div>
        <br><br>
    </div>
    <!-- <a href="#submit">
        <div class="h-10 w-10 p-2 bg-teal-400 rounded-full fixed right-5 bottom-7">
            <img src="/asset/panah-bawah.png" alt="">
        </div>
    </a> -->
</div>

<?= $this->endSection(); ?>