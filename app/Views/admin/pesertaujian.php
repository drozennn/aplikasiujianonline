<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>
<div class="p-3">
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
    <!-- Item data pertama -->
    <div class="p-4 bg-white shadow">
      <table>
        <tr>
          <td>nama</td>
          <td>univ</td>
          <td>token</td>
          <td>nama</td>
          <td>univ</td>
          <td>token</td>          
        </tr>
        <tr>
          <td>asep</td>
          <td>pnj</td>
          <td>asdaqw</td>
          <td>asep</td>
          <td>pnj</td>
          <td>asdaqw</td>
        </tr>
      </table>
    </div>

    <!-- Item data kedua -->
    <div class="p-4 bg-white shadow">
      <!-- Konten item data -->
    </div>

    <!-- Item data ketiga -->
    <div class="p-4 bg-white shadow">
      <!-- Konten item data -->
    </div>

    <!-- Dan seterusnya... -->
</div>

</div>
<?= $this->endSection(); ?>
