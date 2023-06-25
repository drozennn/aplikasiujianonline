<?= $this->extend('templates/mainSoal'); ?>
<?= $this->section('content'); ?>
    <!-- <?php d(session()->get('soal')) ?> -->
    
    <div class="flex py-2">
        <div class="w-3/4 p-4 relative border-r-2 h-screen">
            <div class="bg-gray-200 p-3 mb-4 rounded-md">
                <h4 class="font-bold mb-2 text-xl">Soal No. <?= $soal['urutan'] ?></h4>

                <?php if(!$soal['gambar'] == '') :?>
                    <div class="flex justify-center items-center h-1/2">
                        <div class="w-full flex justify-center items-center overflow-hidden">
                            <img src="/asset/test-image2.jpg" alt="Gambar" class="object-center">
                        </div>
                    </div>
                <?php endif ?>
                <p><?= $soal['soal'] ?></p>
            </div>
            <form action="/loadSoal/<?= $soal['urutan']?>" method="post">
            <textarea name="jawaban" id="jawaban" rows="4" class="w-full px-4 py-2 border border-slate-500 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-300 " autofocus placeholder="Jawaban anda . . . ."><?= $soal['jawaban'] != null ? $soal['jawaban'] : '' ?></textarea>
                <div class="flex justify-between p-3 ">
                    <div>
                        <input type="submit" name="button" id="previous" value="previous" class="btn btn-primary  <?= $soal['urutan'] == 1 ? 'hidden' : '' ?>">
                    </div>
                    <?php if($soal['urutan'] == $akhir) : ?>
                        <div class="absolute right-5 ">
                            <input type="submit" name="button" id="next" value="submit" class="btn btn-success">
                        </div>
                    <?php else : ?>
                        <div class="absolute right-5 ">
                            <input type="submit" name="button" id="next" value="next" class="btn btn-primary">
                        </div>
                    <?php endif ?>
                </div>
            </form>
            <br><br>
        </div>
        <div class="w-1/4 p-4 max-h-screen overflow-auto">
            <div class="flex flex-wrap ">
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
<?= $this->endSection(); ?>