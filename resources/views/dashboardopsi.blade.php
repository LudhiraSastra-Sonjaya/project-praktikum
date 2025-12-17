<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    @vite('resources/css/app.css')
    <style>
        body {
            font-family: 'Manrope', sans-serif;
        }
    </style>
    <script src="https://kit.fontawesome.com/8786bcd90a.js" crossorigin="anonymous"></script>
</head>
<body class="bg-[#faf6f4]">

    <div class="flex min-h-screen">

        <!-- SIDEBAR -->
        <aside class="w-20 bg-white flex flex-col items-center py-6 gap-6">

            <!-- MENU -->
            <nav class="flex flex-col gap-4 mt-8">

                <!-- ACTIVE -->
                <div class="w-12 h-12 rounded-xl bg-indigo-500 flex items-center justify-center text-white">
                <i class="fa-solid fa-chart-pie"></i>
                </div>

                <div class="w-12 h-12 rounded-xl flex items-center justify-center text-gray-400 hover:bg-gray-100">
                <i class="fa-solid fa-bell"></i>
                </div>

            </nav>

        </aside>

        <!-- MAIN CONTENT -->
        <main class="flex-1 px-10 py-8">

        <h1 class="text-3xl font-bold mb-8">Dashboard</h1>

        <!-- CARDS -->
        <div class="grid grid-cols-3 gap-6 mb-8">

            <div class="rounded-2xl bg-red-100 p-6 flex items-center gap-6">
                <i class="fa-solid fa-fire text-[40px] pb-1 text-red-500"></i>
                <div>
                    <h2 class="font-bold text-xl">Situasi Bahaya!</h2>
                    <p class="text-sm text-gray-700">
                        Api terdeteksi! Hati-hati kemungkinan terjadi kebakaran.
                    </p>
                </div>
            </div>

            <div class="rounded-2xl bg-yellow-100 p-6 flex items-center gap-6">
                <i class="fa-solid fa-gauge-simple text-[40px] text-yellow-500"></i>
                <div>
                    <h2 class="font-bold text-xl">Kadar Gas Tinggi!</h2>
                    <p class="text-sm text-gray-700">
                        Indikasi pemantik kebakaran besar.
                    </p>
                </div>
            </div>

            <div class="rounded-2xl bg-white p-6 shadow flex items-center gap-4">
                <i class="fa-solid fa-gauge-simple text-[40px] text-yellow-500"></i>
                <div>
                    <p class="text-sm text-gray-700 pb-[3px]">Kadar Gas</p>
                    <div class="flex items-baseline gap-2">
                        <h2 class="text-3xl font-bold">10.000</h2>
                        <p>ppm</p>
                    </div>
                    
                </div>
            </div>

        </div>

        <!-- CHART PLACEHOLDER -->
        <div class="grid grid-cols-2 gap-6">
            <div class="rounded-2xl bg-white p-6 shadow">
            <h2 class="font-bold mb-4">Kadar Gas Mingguan</h2>
            <div class="h-48 bg-gray-100 rounded"></div>
        </div>

        <div class="rounded-2xl bg-white p-6 shadow">
            <h2 class="font-bold mb-4">Kadar Gas Mingguan</h2>
            <div class="h-48 bg-gray-100 rounded"></div>
        </div>
        </div>

        </main>

    </div>

</body>


</html>