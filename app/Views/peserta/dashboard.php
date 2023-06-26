<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>
<div class="overflow-x-auto">
<?php 
if(session()->getFlashdata('loginsukses') == true) :?>

<div class="alert alert-success my-3">
<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
<span class="capitalize font-medium"> <?= session()-> getFlashdata ('loginsukses') ?></span>
</div>
<?php endif ?>
<div class="font-poppins text-lg p-2"style="border: 1px; border-color: red">
  <h1 class="font-poppins text-3xl">Panduan Ujian</h1>
  <p class="mt-6">Lorem ipsum dolor sit amet consectetur adipisicing elit. 
    Fuga, cum dolorem, non tempore dolor asperiores velit molestiae ratione sapiente corrupti hic doloribus ea suscipit dolorum accusamus. 
    Aspernatur earum aut esse inventore voluptatum iusto laudantium aliquam ullam excepturi molestias minima impedit temporibus, enim dicta 
    quia consectetur officia ipsum est suscipit necessitatibus!</p>  
  
</div>
</div>
<?= $this->endSection(); ?>