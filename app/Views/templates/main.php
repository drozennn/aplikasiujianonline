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
        
    <!-- Sidebar -->
    <div class="flex">
        <?= $this->include('templates/sidebar') ?>
        <div class="flex-1" id="content">
            <!-- Content -->
            <div class="p-4 mt-14 sm:ml-64 h-screen">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>
    <!-- Sidebar End -->
    
</body>
<script>
    const burger = document.querySelector("#btnNav");
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
