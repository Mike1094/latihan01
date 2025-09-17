<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Palembang Smart Web</title>
    <script src="https://cdn.tailwindcss.com/"></script>
    <script src="js/login.js"></script>
    <script src="js/home.js" defer></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
</head>
<body style="font-family: Lato;">
    <header class="fixed top-0 left-0 w-full bg-opacity-100">
        <!-- <nav class="">
        <div class="flex items-center">
            <div class="mr-6 ml-6">
                <img src="assets/logo_web.png" class="w-20 h-auto" alt="">
            </div>
            <div style="padding-right: 27%;"class="font-bold">
                <ul class="grid grid-flow-col gap-10">
                    <li><a href="home.html" class="hover:text-blue-500">Beranda</a></li>
                    <li class="relative">
                        <button id="dropdownBeritaButton" class="hover:text-blue-500 flex items-center space-x-1">
                            <div>Berita</div>
                            <div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>
                            </div>
                        </button>
                        <ul id="dropdownBeritaMenu" class="absolute left-0 mt-2 hidden w-40 bg-gray-200 shadow-lg rounded-xl">
                          <li><a href="#" class="block px-4 py-2 hover:bg-white rounded-xl">Berita Listrik</a></li>
                          <li><a href="#" class="block px-4 py-2 hover:bg-white rounded-xl">Berita Cuaca</a></li>
                          <li><a href="#" class="block px-4 py-2 hover:bg-white rounded-xl">Berita Air</a></li>
                        </ul>
                    </li>
                    <li><a href="Gallery.html" class="hover:text-blue-500">Galeri</a></li>
                    <li class="relative">
                        <button id="dropdownProgramButton" class="hover:text-blue-500 flex items-center space-x-1">
                            <div>Program Unggulan</div>
                            <div><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-3"><path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" /></svg>
                            </div>
                        </button>
                        <ul id="dropdownProgramMenu" class="absolute left-0 mt-2 hidden w-40 bg-gray-200 shadow-lg rounded-xl">
                          <li><a href="#" class="block px-4 py-2 hover:bg-white flex items-center space-x-1 rounded-xl"><div><img src="assets/cuaca (2).png" class="w-6 h-auto"></div><div>Cuaca</div></a></li>
                          <li><a href="#" class="block px-4 py-2 hover:bg-white flex items-center space-x-1 rounded-xl"><div><img src="assets/listrik.png" class="w-6 h-auto"></div><div>Listrik</div></a></li>
                          <li><a href="#" class="block px-4 py-2 hover:bg-white flex items-center space-x-1 rounded-xl"><div><img src="assets/air.png" class="w-6 h-auto"></div><div>Air</div></a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html" class="hover:text-blue-500">Kontak</a></li>
                </ul>
            </div>
            <div class="flex mr-6">
                <form action="">
                    <input 
                    type="text" 
                    placeholder="Cari sesuatu..." 
                    class=" font-bold w-64 border border-gray-300 rounded-3xl bg-transparent p-2 focus:outline-none focus:ring-2 focus:ring-gray-300 placeholder-gray-300"
                    />
                </form>
            </div>              
            <div>
                <ul class="border border-solid border-gray-300 hover:bg-black rounded-3xl p-2 hover:text-white" style="border-width: 2px;">
                    <li>
                        <a href="login copy.html" class="flex space-x-1 hover:text-white">
                            <div class="text-gray-300">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                </svg>
                            </div>
                            <div><p class="font-bold text-gray-300">Admin Login</p></div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        </nav> -->
    </header>
    <main>
        <div class="flex">
            <div id="container">
                <img src="assets/AD_4nXdbdmcCQXk4Ag_UZEWb1oLRYaZVNbonZAAhEIBKbgK_l8ATZ1M07P3AaS49_Y15UA03qmCKM8YfqUZvUOphzmXTLR0VWDLBxh9QBiBYUKFm8R2clB81sUTnwbdTHksp8DJ7qblLvSGIyUmslkrW6A-1536x864.jpg" style="width: 100%; height: 100%; object-fit: cover;">
            </div>

            <div class="flex space-x-0 h-screen bg-whitex" style="width: 90%;">
                <div style="margin-top: 28%; margin-left: 13%;">
                    <div class="mb-3"><svg xmlns="http://www.w3.org/2000/svg" height="10%" viewBox="0 -960 960 960" width="10%" fill="currentColor"><path d="M680-280q25 0 42.5-17.5T740-340q0-25-17.5-42.5T680-400q-25 0-42.5 17.5T620-340q0 25 17.5 42.5T680-280Zm0 120q31 0 57-14.5t42-38.5q-22-13-47-20t-52-7q-27 0-52 7t-47 20q16 24 42 38.5t57 14.5ZM480-80q-139-35-229.5-159.5T160-516v-244l320-120 320 120v227q-19-8-39-14.5t-41-9.5v-147l-240-90-240 90v188q0 47 12.5 94t35 89.5Q310-290 342-254t71 60q11 32 29 61t41 52q-1 0-1.5.5t-1.5.5Zm200 0q-83 0-141.5-58.5T480-280q0-83 58.5-141.5T680-480q83 0 141.5 58.5T880-280q0 83-58.5 141.5T680-80ZM480-494Z"/></svg>
                </div>
                    <p class="text-4xl font-bold ">Masuk akun anda!</p>
                    <form id="loginForm" action="loginscript2.php" method="post">
                        <br>
                        <label class="text-xl" for="email">Email:</label><br>
                        <input type="text" id="username" name="email" required placeholder="Masukkan email disini" class=" placeholder-gray-500 h-8 w-96 border border-black rounded-md bg-transparent p-2 focus:outline-none focus:ring-2 focus:ring-black focus:bg-white"><br><br>

                        <label class="text-xl" for="password">Password:</label><br>
                        <input type="password" id="password" name="password" required placeholder="Masukkan kata sandi disini" class="placeholder-gray-500 h-8 w-96 border border-black rounded-md bg-transparent p-2 focus:outline-none focus:ring-2 focus:ring-black focus:bg-white"><br><br>
                        <button type="submit" name="submit" class="bg-opacity-50 pt-1 pb-1 pl-4 pr-4 bg-slate-400 rounded-xl hover:text-white hover:bg-slate-700">Login</button>
                    </form>
                    <div class="bottom-3 mt-32">
                        <p>&copy;&nbsp;Michael Eluzai, Salsabila Putri, Muhammad Afif</p>
                    </div>
                </div>
            </div>

        </div>
    </main>
</body>
</html>