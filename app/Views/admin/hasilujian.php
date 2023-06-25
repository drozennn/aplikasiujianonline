<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>
<div class="p-3">

    <div class="overflow-x-auto">
        <table class="table table-zebra">
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
              <tr>
                <th><p class="text-lg text-black text-center"><?= $no ?></p></th>
                <td><p class="text-lg text-black text-center"><?= $user['nama'] ?></p></td>
                <td><p class="text-lg text-black text-center"><?= $user['univ'] ?></p></td>
                <td><p class="text-lg text-black text-center"><?= $user['waktu_mulai'] == null ? 'Belum mulai' : $user['waktu_mulai'] ?></p></td>
                <td><p class="text-lg text-black text-center"><?= $user['waktu_selesai'] == null ? 'Belum selesai' : $user['waktu_selesai'] ?></p></td>
                <td class="flex items-center justify-center">
                  <a href="" class="btn btn-outline ">Cetak</a>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
    </div>

  <?= $this->endSection(); ?>