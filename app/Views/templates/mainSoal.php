<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.4/dist/tailwind.min.css" rel="stylesheet">
    <link href="/src/style.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
    <title><?= $title ?></title>
</head>

<body>
    <?= $this->include('templates/navbar') ?>

        <!-- Hamburger Line -->
    <!-- <div id="btnNav" class="w-10 h-10 z-20 shadow-md backdrop-blur-lg bg-slate-200 opacity-50 fixed top-1/2 flex items-center justify-center">
            <p><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M4.5 12h15m0 0l-6.75-6.75M19.5 12l-6.75 6.75" />
            </svg></p>
    </div> -->
    <!-- Hamburger Line End -->

    <!-- <div id="soal" class="w-10 h-10 z-20 shadow-md backdrop-blur-lg bg-slate-200 opacity-50 top-1/4 absolute right-0 flex justify-center items-center">
        <img src="/asset/panah-kiri.png" alt="" width="70%">
    </div> -->


    <div class="pt-16 h-screen" id="content">
        <?= $this->renderSection('content') ?>
    </div>
    
</body>
<script>
    const burger = document.querySelector("#soal");
    const sidebar = document.querySelector("#sidebar");
    const content = document.querySelector("#content");

    burger.addEventListener("click", function(){
        if(sidebar.classList.contains('-translate-x-full')){
            sidebar.classList.remove('-translate-x-full')
            sidebar.classList.add('translate-x-0')
        }
    })

    content.addEventListener("click", function(){
        sidebar.classList.remove('translate-x-0')
        sidebar.classList.add('-translate-x-full')
    })
</script>
</html>