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

                <div id="notifBtn" class="relative w-12 h-12 rounded-xl flex items-center justify-center text-gray-400 hover:bg-gray-100 cursor-pointer">
                    <i class="fa-solid fa-bell"></i>

                    <!-- Badge -->
                    <span id="notifBadge" class="absolute top-2 right-2 w-2.5 h-2.5 bg-red-500 rounded-full"></span>
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
                        <p class="text-sm text-gray-700 pb-0.75">Kadar Gas</p>
                        <div class="flex items-baseline gap-2">
                            <h2 class="text-3xl font-bold">10.000</h2>
                            <p>ppm</p>
                        </div>
                        
                    </div>
                </div>

            </div>

            <div class="grid grid-cols-2 gap-6">
                <!-- CHART PLACEHOLDER -->
                <div class="rounded-2xl bg-white p-6 shadow">
                    <h2 class="font-bold mb-4">Kadar Gas Mingguan</h2>
    
                    <div class="h-80">
                        <canvas id="gasChart"></canvas>
                    </div>
                </div>
    
                <div class="relative w-full h-105 rounded-2xl overflow-hidden shadow-lg">
                    <!-- Background Image -->
                    <img 
                        src="{{ asset('assets/img/fotoLahan.jpeg') }}" 
                        alt="Lahan Pertanian"
                        class="absolute inset-0 w-full h-full object-cover"
                    />
    
                    <!-- Overlay gelap -->
                    <div class="absolute inset-0 bg-black/40"></div>
    
                    <!-- Text Content -->
                    <div class="relative z-10 h-full flex flex-col justify-end p-6 text-white">
                        <h2 class="text-xl font-semibold">
                        Lahan Pertanian Pak Suwono
                        </h2>
                        <p class="text-sm text-white/80">
                        Tracker untuk lahan pertanian pak suwono
                        </p>
                    </div>
                </div>
            </div>

        </main>

    </div>

    <!-- NOTIFICATION POPUP -->
    <div id="notifPopup" class="fixed inset-0 z-50 hidden">
        <!-- Overlay -->
        <div id="notifOverlay" class="absolute inset-0 bg-black/30"></div>
    
        <!-- Panel -->
        <div class="absolute left-28 top-20 w-105 max-h-130 bg-white rounded-2xl shadow-xl flex flex-col">
        
            <!-- Header -->
            <div class="flex items-center justify-between px-5 py-4 border-b border-gray-200">
                <h2 class="font-semibold text-lg">Notifications</h2>
                <div class="flex items-center gap-3 text-sm text-gray-500">
                    <button id="markAllRead" class="hover:text-black">Tandai telah dibaca!</button>
                    <button id="notifClose" class="text-gray-400 hover:text-black">✕</button>
                </div>
            </div>
        
            <!-- Notification List -->
            <div class="flex-1 overflow-y-auto">

                <!-- ITEM 1 -->
                <div class="notif-item flex gap-4 px-5 py-4 hover:bg-gray-50 cursor-pointer" data-read="false">
                    <div class="w-9 h-9 rounded-full bg-gray-200 flex items-center justify-center">
                        <i class="fa-solid fa-fire text-red-500"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm">
                            <span class="font-semibold">Sensor Api</span>
                            mendeteksi api di lahan pertanian.
                        </p>
                        <p class="text-xs text-gray-400 mt-1">1 menit lalu</p>
                    </div>
                    <span class="unread-dot w-2 h-2 bg-red-500 rounded-full mt-2"></span>
                </div>
            
                <!-- ITEM 2 -->
                <div class="notif-item flex gap-4 px-5 py-4 hover:bg-gray-50 cursor-pointer" data-read="false">
                    <div class="w-9 h-9 rounded-full bg-gray-200 flex items-center justify-center">
                        <i class="fa-solid fa-gauge text-yellow-500"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm">
                            <span class="font-semibold">Gas Tinggi</span>
                            terdeteksi melebihi ambang batas.
                        </p>
                        <p class="text-xs text-gray-400 mt-1">5 menit lalu</p>
                    </div>
                    <span class="unread-dot w-2 h-2 bg-red-500 rounded-full mt-2"></span>
                </div>
            
                <!-- ITEM 3 (sudah dibaca) -->
                <div class="notif-item flex gap-4 px-5 py-4 hover:bg-gray-50 cursor-pointer" data-read="true">
                    <div class="w-9 h-9 rounded-full bg-gray-200 flex items-center justify-center">
                        <i class="fa-solid fa-circle-check text-green-500"></i>
                    </div>
                    <div class="flex-1">
                        <p class="text-sm">Kondisi lahan kembali normal.</p>
                        <p class="text-xs text-gray-400 mt-1">10 menit lalu</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Section JS -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const ctx = document.getElementById('gasChart').getContext('2d');
        const notifBtn = document.getElementById('notifBtn');
        const notifPopup = document.getElementById('notifPopup');
        const notifClose = document.getElementById('notifClose');
        const notifOverlay = document.getElementById('notifOverlay');
        const markAllRead = document.getElementById('markAllRead');
        const notifBadge = document.getElementById('notifBadge');

        const gasChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Min 1', 'Min 2', 'Min 3', 'Min 4'],
            datasets: [{
            data: [1000, 1800, 900, 5200], // contoh data
            borderColor: '#FACC15',       // kuning
            backgroundColor: 'rgba(250, 204, 21, 0.2)',
            fill: true,
            tension: 0.4,                 // bikin curve halus
            pointRadius: 0,               // hilangin titik
            borderWidth: 2,
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
            legend: {
                display: false
            }
            },
            scales: {
            x: {
                grid: {
                display: false
                }
            },
            y: {
                beginAtZero: true,
                grid: {
                color: '#E5E7EB'
                }
            }
            }
        }
        });

        // Fungsi untuk update badge di icon bell
        function updateBadge() {
            const unreadCount = document.querySelectorAll('.notif-item[data-read="false"]').length;
            
            if (unreadCount > 0) {
                notifBadge.classList.remove('hidden');
            } else {
                notifBadge.classList.add('hidden');
            }
        }

        // Buka popup
        notifBtn.addEventListener('click', () => {
            notifPopup.classList.remove('hidden');
        });

        // Tutup popup
        notifClose.addEventListener('click', () => {
            notifPopup.classList.add('hidden');
        });

        notifOverlay.addEventListener('click', () => {
            notifPopup.classList.add('hidden');
        });

        // Mark all as read - hilangkan semua bulatan merah
        markAllRead.addEventListener('click', () => {
            const unreadDots = document.querySelectorAll('.unread-dot');
            const notifItems = document.querySelectorAll('.notif-item');
            
            unreadDots.forEach(dot => {
                dot.remove(); // Hapus bulatan merah
            });
            
            notifItems.forEach(item => {
                item.setAttribute('data-read', 'true'); // Update status
            });

            updateBadge();
        });

        // Mark individual notification as read saat diklik
        const notifItems = document.querySelectorAll('.notif-item');
        notifItems.forEach(item => {
            item.addEventListener('click', () => {
                if (item.getAttribute('data-read') === 'false') {
                    const dot = item.querySelector('.unread-dot');
                    if (dot) {
                        dot.remove(); // Hapus bulatan merah
                    }
                    item.setAttribute('data-read', 'true'); // Update status

                    updateBadge();
                }
            });
        });

        updateBadge();
    </script>

</body>


</html>