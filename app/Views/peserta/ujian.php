<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>
<div class="overflow-x-auto">
  <table class="table table-zebra">
    <!-- head -->
    <thead>
      <tr>
        <th class="text-center">No</th>
        <th class="text-center">Nama</th>
        <th class="text-center">NIM</th>
        <th class="text-center">Waktu Ujian</th>
        <th class="text-center">Jumlah Soal</th>
        <th class="text-center">Durasi</th>
        <th class="text-center">Aksi</th>
      </tr>
    </thead>
    <tbody>
    <?php $no = 0; ?>
      <tr>
        <td class="text-center"><?= ++$no; ?></td>
        <td class="text-center"><?= $peserta['nama'] ?></td>
        <td class="text-center"><?= $peserta['nim'] ?></td>
        <td class="text-center">Senin, 20 Juli 2023</td>
        <td class="text-center"><?= $soal ?></td>
        <td class="text-center">120 Menit</td>
        <td class="text-center">
          <?php if ($peserta['status'] == "selesai") : ?>
            <a href="/peserta/reviewujian" class="btn btn-info">Lihat Review</a>
          <?php else : ?>
            <a href="/peserta/token" class="btn btn-success">Mulai</a>
          <?php endif; ?>
        </td>
      </tr>
    </tbody>
  </table>
</div>
<?= $this->endSection(); ?>