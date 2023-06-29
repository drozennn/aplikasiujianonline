<?= $this->extend('templates/main'); ?>
<?= $this->section('content'); ?>
<div class="p-3 bg-[#F0edcc]">
    <?php if(session()->get('change-time')) : ?>
        <div class="alert alert-success">
            <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
            <span><?= session()->get('change-time') ?></span>
        </div>
    <?php endif ?>
    <h1 class="text-3xl sm:text-4xl md:text-5xl font-bold ">Waktu Peserta</h1>
    <div class="w-full h-0.5 bg-black rounded-sm my-6"></div>
    <!-- untuk tampilan web -->
    <div class="bg-cyan-900 h-56 rounded-lg p-3 hidden md:block relative">
        <form action="/admin/setWaktu" method="post">
        <div class="flex justify-center ">
            <table class=" w-full">
                <thead >
                    <tr>
                        <th class="py-3"><label for="mulai" class="text-2xl text-white">Mulai</label></th>
                        <th class="py-3"><label for="selesai" class="text-2xl text-white">Selesai</label></th>
                    </tr>                    
                </thead>
                <tbody>
                    <tr>
                        <td class="px-1 py-3"><input type="datetime-local" class="w-full h-12 p-2 rounded-md text-lg" id="mulai" name="mulai" value="<?= $mulai ?>"></td>
                        <td class="px-1 py-3"><input type="datetime-local" class="w-full h-12 p-2 rounded-md text-lg" id="selesai" name="selesai" value="<?= $selesai ?>"></td>
                    </tr>                    
                </tbody>
            </table>
        </div>
        <div class="absolute bottom-3 right-6">
            <button type="submit" name="submit" class="btn btn-outline btn-info w-32 text-xl">Set</button>
        </div>

        </form>
    </div>
    <!-- untuk tampilan mobile -->
    <div class="bg-cyan-900 rounded-lg p-3 md:hidden relative">
        <form action="/admin/setWaktu" method="post">
            <label for="mulai" class="text-2xl text-white">Mulai</label>
            <input type="datetime-local" class="w-full h-12 p-2 my-3 rounded-md focus:outline-violet-500" id="mulai" name="mulai" value="<?= $mulai ?>">>

            <label for="selesai" class="text-2xl text-white">Selesai</label>            
            <input type="datetime-local" class="w-full h-12 p-2 my-3 rounded-md focus:outline-violet-500" id="selesai" name="selesai" value="<?= $selesai ?>">>
            <button type="submit" name="submit" class="btn btn-outline btn-info w-full my-2">Set</button>
        </form>
    </div>
<?= $this->endSection(); ?>
