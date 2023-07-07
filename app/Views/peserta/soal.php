<?= $this->extend('templates/mainSoal'); ?>
<?= $this->section('content'); ?>
    <div class="md:flex py-2 relative text-black font-poppins">
        <div class="md:w-3/4 p-4 md:relative md:border-r-2  md:h-screen">
            <div class="bg-white p-3 mb-4 rounded-md">
                <div class="flex justify-between items-center">
                    <h4 class="font-bold text-xl">Soal No. <?= $soal['urutan'] ?></h4>
                    <h5 class="font-medium text-lg uppercase sm:block hidden">Materi : <?= $soal['kategori'] ?></h5>
                    <span class="countdown font-mono text-2xl font-bold" id="countdown">
                        <span style="--value:0;"></span>:
                        <span style="--value:0;"></span>:
                        <span style="--value:0;"></span>
                    </span>
                </div>
                
                <p class="py-2"><?= $soal['soal'] ?></p>
            </div>
            <form action="/loadSoal/<?= $soal['urutan']?>" method="post">
            <textarea name="jawaban" id="jawaban" rows="4" class="w-full px-4 py-2 border border-slate-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300 selection:bg-green-500 selection:text-white" autofocus placeholder="Jawaban anda . . . ."><?= $soal['jawaban'] != null ? $soal['jawaban'] : '' ?></textarea>
                <div class="flex justify-between p-1 sm:mt-2 ">
                    <div>
                        <input type="submit" name="button" id="previous" value="previous" class="btn btn-primary sm: justify-start  <?= $soal['urutan'] == 1 ? 'hidden' : '' ?>">
                    </div>
                    <?php if($soal['urutan'] == $akhir) : ?>
                        <div class="absolute right-5 ">
                            <input type="submit" name="button" id="next" value="submit" class="btn btn-success">
                        </div>
                    <?php else : ?>
                        <div class="absolute right-5 ">
                            <input type="submit" name="button" id="next" value="simpan jawaban" class="btn btn-primary">
                        </div>
                    <?php endif ?>
                </div>
            </form>
            <br><br>
        </div>
        <div class="w-full max-h-32 overflow-auto ml-2 md:block md:w-1/4 md:p-4 md:max-h-screen md:overflow-auto">
            <div class="flex flex-wrap">
                <?php $j = 1 ?>
                    <?php foreach($jmlSoal as $row) :?>
                        <a href="/loadSoal/<?= $j ?>">
                            <div class="w-14 h-14 transition rounded-md mr-2 mb-3 flex justify-center items-center <?= $row['jawaban'] != null || $row['jawaban'] != '' ? 'bg-green-500' : 'bg-gray-400' ?> <?= $row['jawaban'] != null || $row['jawaban'] != '' ? 'hover:bg-green-600' : 'hover:bg-gray-500' ?>">
                                <h3 class="font-bold text-white"><?= $j ?></h3>
                            </div>
                        </a>
                        <?php $j++ ?>
                    <?php endforeach ?>
            </div>
        </div>
    </div>
    <span id="selesai" class="hidden"><?= strtotime($waktu[0]['selesai'])*1000 ?></span>
<?= $this->endSection(); ?>