<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>
<div class="p-3 bg-[#F0edcc]">

<?php if(session()->getFlashdata('editStatus')) :?>
        <div class="alert alert-success mb-3">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span><?= session()->getFlashdata('editStatus') ?></span>
        </div>
<?php endif ; ?>

  <h1 class="font-bold text-black text-2xl mb-2 font-poppins">Kontrol Peserta</h1>
  <div class="w-full h-0.5 bg-black rounded-sm my-4"></div>

  <div class="px-4 py-3 lg:hidden">
    <div class="w-3 h-3 bg-gray-200 border-gray-400 border rounded-sm inline-block"></div>
    <p class="inline-block font-poppins">Belum Mulai</p>
    <br class="md:hidden">
    <div class="w-3 h-3 bg-yellow-300 border-yellow-500 border rounded-sm inline-block"></div>
    <p class="inline-block font-poppins">Sedang Ujian</p>
    <br class="md:hidden">
    <div class="w-3 h-3 bg-emerald-300 border-emerald-500 border rounded-sm inline-block"></div>
    <p class="inline-block font-poppins">Selesai</p>
  </div>

<!-- untuk mobile -->
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4 lg:hidden">
    <?php foreach($get as $row) :?>
    <div class="p-4 shadow-lg overflow-hidden rounded-md <?= $row['status'] == 'belum' ? 'bg-gray-200' : ''?> <?= $row['status'] == 'ujian' ? 'bg-yellow-300' : ''?> <?= $row['status'] == 'selesai' ? 'bg-emerald-300' : ''?>">
      <table>
        <tr>
          <td class="p-1.5">Nama</td> 
          <td class="p-1.5">:</td>
          <td class="p-1.5 text-lg capitalize"><b><?= $row['nama'] ?></b></td>
        </tr>
        <tr>
          <td class="p-1.5">Email</td>
          <td class="p-1.5">:</td>
          <td class="p-1.5"><?= $row['email'] ?></td>
        </tr>
        <tr>
          <td class="p-1.5">Universitas</td>
          <td class="p-1.5">:</td>
          <td class="p-1.5 uppercase"><?= $row['univ'] ?></td>
        </tr>
        <tr>
          <td class="p-1.5">Status</td>
          <td class="p-1.5">:</td>
          <td class="p-1.5">
            <div class="flex justify-start items-center gap-3">
                <span class="p-1 px-2 rounded-lg text-white uppercase tracking-wider text-sm <?= $row['status'] == 'belum' ? 'bg-gray-700' : ''?> <?= $row['status'] == 'ujian' ? 'bg-amber-800' : ''?> <?= $row['status'] == 'selesai' ? 'bg-green-700' : ''?>">
                  <?= $row['status'] ?>
                </span>
                <div class="dropdown dropdown-top ">
                    <label tabindex="0" class="btn m-1">Edit</label>
                    <ul tabindex="0" class="dropdown-content z-[1] menu p-1 shadow bg-base-100 rounded-box w-24">
                        <li><a href="/admin/controlbelum/<?= $row['id'] ?>">Belum</a></li>
                        <li><a href="/admin/controlselesai/<?= $row['id'] ?>">Selesai</a></li>
                        <li><a href="/admin/loggedOut/<?= $row['id'] ?>">Logged Out</a></li>
                    </ul>
                </div>
            </div>
          </td>
        </tr>
      </table>
    </div>
    <?php endforeach ?>
  </div>


  <!-- untuk website -->
  <div class="overflow-x-auto hidden shadow-xl lg:block">
        <table class="table shadow-lg">
          <!-- head -->
          <thead>
            <tr class="bg-emerald-500">
              <th></th>
              <th class="text-lg text-white text-center">Nama</th>
              <th class="text-lg text-white text-center">NIM</th>
              <th class="text-lg text-white text-center">Password</th>
              <th class="text-lg text-white text-center">Email</th>
              <th class="text-lg text-white text-center">Universitas</th>
              <th class="w-24 text-lg text-white text-center">Token</th>
              <th class="w-24 text-lg text-white text-center">Login</th>
              <th class="text-lg text-white text-center">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 1; ?>
            <?php foreach ($get as $user) : ?>
              <tr class="odd:bg-slate-200 even:bg-slate-300">
                <th><p class="text-lg text-black text-center"><?= $no ?></th>
                <td><p class="text-lg text-black text-center capitalize"><?= $user['nama'] ?></td>
                <td><p class="text-lg text-black text-center"><?= $user['nim'] ?></td>
                <td><p class="text-lg text-black text-center"><?= $user['password'] ?></td>
                <td><p class="text-lg text-black text-center"><?= $user['email'] ?></td>
                <td><p class="text-lg text-black text-center uppercase"><?= $user['univ'] ?></td>
                <td><p class="text-lg text-black text-center"><?= $user['token'] ?></td>
                <td><p class="text-lg text-black text-center"><?= $user['login'] == 0 ? 'NON' : 'AKTIF' ?></td>
                <td><p class="text-lg text-black text-center">
                    <div class="flex gap-2">
                        <span class="p-1 px-2 rounded-lg text-white uppercase tracking-wider text-sm text-center self-center <?= $user['status'] == 'belum' ? 'bg-gray-700' : ''?> <?= $user['status'] == 'ujian' ? 'bg-yellow-500' : ''?> <?= $user['status'] == 'selesai' ? 'bg-green-700' : ''?>">
                            <?= $user['status'] ?>
                        </span>
                        <div class="dropdown dropdown-bottom dropdown-end">
                            <label tabindex="0" class="btn m-1">Edit</label>
                            <ul tabindex="0" class="dropdown-content z-[1] menu p-1 shadow bg-base-100 rounded-box w-36">
                                <li><a href="/admin/controlbelum/<?= $user['id'] ?>">Belum</a></li>
                                <li><a href="/admin/controlselesai/<?= $user['id'] ?>">Selesai</a></li>
                                <li><a href="/admin/loggedOut/<?= $user['id'] ?>">Logged Out</a></li>
                            </ul>
                            </div>
                    </div>
                </td>
                </tr>
                <?php $no++ ?>
            <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection(); ?>
