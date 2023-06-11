<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>
<div class="overflow-x-auto">

  <div class="overflow-x-auto">
    <table class="table table-xs">
      <thead>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Nim</th>
          <th>Paket</th>
          <th>Status</th>

        </tr>
      </thead>
      <tbody>
        <?php $no = 0; ?>
        <?php foreach ($get as $user) : ?>
          <tr>
            <th><?= ++$no; ?></th>
            <td><?= $user['nama']; ?></td>
            <td><?= $user['nim']; ?></td>
            <td><?= $user['paket']; ?></td>
            <td><?= $user['status']; ?></td>

          </tr>

        <?php endforeach; ?>
      <tfoot>
        <tr>
          <th>No</th>
          <th>Nama</th>
          <th>Nim</th>
          <th>Paket</th>
          <th>Status</th>
        </tr>
      </tfoot>

    </table>
  </div>



  <?= $this->endSection(); ?>