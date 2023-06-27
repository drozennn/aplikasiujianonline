<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>
<div class="p-3 relative">
  <div class="flex justify-between items-center">
    <h1 class="font-bold text-black text-2xl font-poppins">Hasil Ujian Peserta</h1>
    <div>
      <a href="#" class="btn btn-accent text-white">Cetak Semua</a>
    </div>
  </div>
  <div class="w-full h-0.5 bg-slate-300 rounded-sm my-4"></div>

        <table class="table">
          <!-- head -->
          <thead>
            <tr class="bg-emerald-500">
              <th></th>
              <th class="text-lg text-white text-center">Nama</th>
              <th class="text-lg text-white text-center">Universitas</th>
              <th class="text-lg text-white text-center">Waktu Mulai</th>
              <th class="text-lg text-white text-center">Waktu Selesai</th>
              <th class="text-lg text-white text-center">Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($get as $user) : ?>
              <?php if($user['waktu_mulai'] != null && $user['waktu_selesai'] != null) {
                  $status = $user['waktu_selesai'];
                } elseif ($user['waktu_mulai'] != null && $user['waktu_selesai'] == null){
                  $status = 'Sedang Mengerjakan';
                } else{
                  $status = 'Belum Mulai';
                }
                ?>
              <tr class="odd:bg-slate-200 even:bg-slate-300">
                <th><p class="text-lg text-black text-center"><?= $no ?></p></th>
                <td><p class="text-lg text-black text-center capitalize"><?= $user['nama'] ?></p></td>
                <td><p class="text-lg text-black text-center"><?= $user['univ'] ?></p></td>
                <td><p class="text-lg text-black text-center"><?= $user['waktu_mulai'] == null ? 'Belum Mulai' : $user['waktu_mulai'] ?></p></td>
                <td><p class="text-lg text-black text-center"><?= $status ?></p></td>
                <td class="flex items-center justify-center">
                  <a href="" class="btn btn-outline ">Cetak</a>
                </td>
              </tr>
              <?php $no++ ?>
            <?php endforeach ?>
          </tbody>
        </table>

</div>
  <?= $this->endSection(); ?>