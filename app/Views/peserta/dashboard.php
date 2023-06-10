<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>
<div class="overflow-auto">
<table border="1">
    <tr>
      <th>Kolom 1</th>
      <th>Kolom 2</th>
      <th>Kolom 3</th>
      <th>Kolom 4</th>
      <th>Kolom 5</th>
      <th>Kolom 6</th>
      <th>Kolom 7</th>
      <th>Kolom 8</th>
    </tr>
    <tr>
      <td>Data 1</td>
      <td>Data 2</td>
      <td>Data 3</td>
      <td>Data 4</td>
      <td>Data 5</td>
      <td>Data 6</td>
      <td>Data 7</td>
      <td>Data 8</td>
    </tr>
    <tr>
      <td>Data 9</td>
      <td>Data 10</td>
      <td>Data 11</td>
      <td>Data 12</td>
      <td>Data 13</td>
      <td>Data 14</td>
      <td>Data 15</td>
      <td>Data 16</td>
    </tr>
    <!-- Tambahkan baris tambahan jika diperlukan -->
  </table>
</div>
<?= $this->endSection(); ?>