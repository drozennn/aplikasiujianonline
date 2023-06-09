<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/src/style.css">
    <title>Document</title>
</head>
<body style="background-image: url(/asset/back-login.jpg); background-size: cover; background-position: center;">
    <div class="flex justify-center items-center h-screen ">
        <div class="w-72 h-72 sm:w-80 sm:h-80 shadow-xl p-3" style="background: rgba(242, 242, 242, .2);
    border-radius: 16px;
    box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
    backdrop-filter: blur(2px);
    -webkit-backdrop-filter: blur(7px);
    border: 1px solid rgba(255, 255, 255, 0.26);">
            <div class="flex justify-center  sm:mt-5">
                <img src="/asset/icon-login.png" alt="" class="w-20">
            </div>
            <h2 class="text-white font-bold text-2xl md:text-3xl text-center mt-2">IMEV 12</h2>

            <form action="/auth" method="post">
                <div class="px-3 mt-3">
                    <input type="text" name="email" id="email" class="w-full rounded-md px-2 py-1 bg-slate-100 outline-none" placeholder="Masukan Email">
                    <input type="text" name="email" id="email" class="w-full rounded-md px-2 py-1 mt-3 bg-slate-100 outline-none" placeholder="Masukan Email">
                    <button class="w-full text-white bg-green-500 rounded-md text-center mt-4 p-1">Log in</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>