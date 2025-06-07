<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta name="description" content="Sistem Pengelola Kehadiran SMKN 1 Kota Bengkulu">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = {
      theme: {
        fontFamily: {
          sans: ['Poppins', 'sans-serif'],
        },
        extend: {
          colors: {
            primary: {
              600: '#2563eb',
              700: '#1d4ed8',
              800: '#1e40af',
              900: '#1e3a8a',
            },
            secondary: {
              400: '#fbbf24',
              500: '#f59e0b',
            },
            dark: {
              800: '#1e293b',
              900: '#0f172a',
            }
          },
          boxShadow: {
            'card': '0 4px 20px -5px rgba(0, 0, 0, 0.1)',
            'card-hover': '0 10px 25px -5px rgba(0, 0, 0, 0.15)',
            'nav': '0 2px 10px rgba(0, 0, 0, 0.08)',
          },
          animation: {
            'fade-in': 'fadeIn 0.4s ease-out',
            'slide-up': 'slideUp 0.4s cubic-bezier(0.16, 1, 0.3, 1)',
            'float': 'float 6s ease-in-out infinite',
            'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
          },
          keyframes: {
            fadeIn: {
              '0%': { opacity: '0' },
              '100%': { opacity: '1' }
            },
            slideUp: {
              '0%': { transform: 'translateY(30px)', opacity: '0' },
              '100%': { transform: 'translateY(0)', opacity: '1' }
            },
            float: {
              '0%, 100%': { transform: 'translateY(0)' },
              '50%': { transform: 'translateY(-12px)' }
            }
          }
        }
      }
    }
  </script>
  <script src="https://unpkg.com/feather-icons"></script>
  <title>Hadirin - Sistem Kehadiran SMKN 1 Kota Bengkulu</title>
  <style>
    .blob {
      position: absolute;
      border-radius: 50%;
      filter: blur(40px);
      opacity: 0.15;
      z-index: 0;
    }
    
    .blob-1 {
      width: 300px;
      height: 300px;
      background: linear-gradient(135deg, #3b82f6 0%, #1d4ed8 100%);
      top: -150px;
      right: -150px;
      animation: float 8s ease-in-out infinite;
    }
    
    .blob-2 {
      width: 400px;
      height: 400px;
      background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
      bottom: -200px;
      left: -200px;
      animation: float 10s ease-in-out infinite reverse;
    }
    
    .card-hover-effect {
      transition: all 0.3s cubic-bezier(0.25, 0.8, 0.25, 1);
    }
    
    .card-hover-effect:hover {
      transform: translateY(-5px);
    }
    
    .tab-button {
      transition: all 0.3s ease;
      position: relative;
    }
    
    .tab-button::after {
      content: '';
      position: absolute;
      bottom: 0;
      left: 50%;
      transform: translateX(-50%);
      width: 0;
      height: 3px;
      background: white;
      transition: all 0.3s ease;
      border-radius: 3px 3px 0 0;
    }
    
    .tab-button.active::after {
      width: 70%;
    }
    
    .tab-button.active {
      font-weight: 600;
    }
    
    @media (max-width: 640px) {
      .header-height {
        height: auto;
        min-height: 20rem;
      }
      
      .card-square {
        aspect-ratio: 1/1;
      }
      
      .card-rectangle {
        aspect-ratio: 2/1;
      }
      
      .blob-1, .blob-2 {
        display: none;
      }
    }
  </style>
</head>
<body class="bg-gray-50 text-gray-800 font-sans min-h-screen antialiased">

  <!-- Header -->
  <header class="w-full header-height rounded-b-[2.5rem] bg-gradient-to-br from-primary-700 to-primary-900 px-6 py-8 md:px-8 md:py-10 relative overflow-hidden">
    <!-- Blob backgrounds -->
    <div class="blob blob-1"></div>
    <div class="blob blob-2"></div>
    
    <div class="relative z-10 max-w-6xl mx-auto">
      <div class="flex justify-between items-center">
        <div class="flex items-center">
          <div class="w-8 h-8 md:w-10 md:h-10 bg-white rounded-lg flex items-center justify-center shadow-md mr-2">
            <i data-feather="clock" class="text-primary-700 w-4 h-4 md:w-5 md:h-5"></i>
          </div>
          <div class="text-white font-bold text-xl md:text-2xl tracking-tight">HADIRIN</div>
        </div>
        <div class="flex items-center space-x-3">
          <div class="text-white text-xs md:text-sm bg-white/10 backdrop-blur-sm px-3 py-1 rounded-full">
            <span id="current-time" class="font-medium"></span>
          </div>
          <div class="w-8 h-8 md:w-10 md:h-10 rounded-full bg-white/20 backdrop-blur-sm flex items-center justify-center">
            <i data-feather="user" class="text-white w-4 h-4 md:w-5 md:h-5"></i>
          </div>
        </div>
      </div>

      <div class="text-white text-center mt-8 md:mt-12">
        <div class="mx-auto w-24 h-24 md:w-28 md:h-28 bg-white/10 backdrop-blur-sm rounded-2xl p-4 shadow-md flex items-center justify-center animate-fade-in">
          <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 1 Kota Bengkulu" class="w-full h-full object-contain" />
        </div>
        <h1 class="text-3xl md:text-4xl font-bold tracking-tight mt-4 animate-fade-in">SMKN 1</h1>
        <p class="text-lg md:text-xl text-blue-100/90 mt-1 animate-fade-in">Kota Bengkulu</p>
      </div>

      <nav class="flex justify-center mt-8 md:mt-12 space-x-2 md:space-x-4 lg:space-x-6 bg-white/10 backdrop-blur-sm rounded-xl p-1.5 shadow-nav max-w-max mx-auto">
        <button id="b1" onclick="switchTab(1)" class="text-white font-medium text-sm md:text-base px-4 py-2 rounded-lg transition-all duration-200 flex items-center tab-button active">
          <i data-feather="tool" class="mr-2 w-4 h-4 md:w-5 md:h-5"></i> Tools
        </button>
        <button id="b2" onclick="switchTab(2)" class="text-white font-medium text-sm md:text-base px-4 py-2 rounded-lg transition-all duration-200 flex items-center tab-button">
          <i data-feather="printer" class="mr-2 w-4 h-4 md:w-5 md:h-5"></i> Prints
        </button>
        <button id="b3" onclick="switchTab(3)" class="text-white font-medium text-sm md:text-base px-4 py-2 rounded-lg transition-all duration-200 flex items-center tab-button">
          <i data-feather="info" class="mr-2 w-4 h-4 md:w-5 md:h-5"></i> Info
        </button>
      </nav>
    </div>
  </header>

  <!-- Main Content -->
  <main class="px-4 py-8 md:px-8 md:py-12 max-w-6xl mx-auto transition-all duration-300 -mt-4">

    <!-- Tools Tab -->
    <div id="tab1" class="grid grid-cols-2 md:grid-cols-4 gap-4 md:gap-6 transition-opacity duration-300">
      <!-- Card 1 -->
      <a href="/users" class="card-hover-effect bg-white rounded-2xl shadow-card hover:shadow-card-hover group overflow-hidden border border-gray-100/50 animate-fade-in animate-slide-up">
        <div class="h-full p-5 md:p-6 flex flex-col">
          <div class="w-12 h-12 md:w-14 md:h-14 rounded-xl bg-gradient-to-br from-blue-50 to-blue-100 mb-4 flex items-center justify-center group-hover:from-blue-100 group-hover:to-blue-200 transition-all duration-300 mx-auto">
            <img src="https://img.icons8.com/ios-filled/50/1e40af/add-user-group-man-man.png" class="w-6 h-6 md:w-7 md:h-7" alt="Input Anggota" />
          </div>
          <h3 class="text-sm md:text-base font-semibold text-gray-800 mb-1 text-center">Input Anggota</h3>
          <p class="text-xs text-gray-500 text-center mt-auto">Tambah atau edit data anggota</p>
          <div class="mt-3 flex justify-center">
            <div class="w-6 h-0.5 bg-blue-200 group-hover:bg-blue-400 transition-colors duration-300"></div>
          </div>
        </div>
      </a>
      
      <!-- Card 2 -->
      <a href="/events" class="card-hover-effect bg-white rounded-2xl shadow-card hover:shadow-card-hover group overflow-hidden border border-gray-100/50 animate-fade-in animate-slide-up" style="animation-delay: 50ms">
        <div class="h-full p-5 md:p-6 flex flex-col">
          <div class="w-12 h-12 md:w-14 md:h-14 rounded-xl bg-gradient-to-br from-blue-50 to-blue-100 mb-4 flex items-center justify-center group-hover:from-blue-100 group-hover:to-blue-200 transition-all duration-300 mx-auto">
            <img src="https://img.icons8.com/ios-filled/50/1e40af/edit-calendar.png" class="w-6 h-6 md:w-7 md:h-7" alt="Input Kegiatan" />
          </div>
          <h3 class="text-sm md:text-base font-semibold text-gray-800 mb-1 text-center">Input Kegiatan</h3>
          <p class="text-xs text-gray-500 text-center mt-auto">Kelola jadwal kegiatan</p>
          <div class="mt-3 flex justify-center">
            <div class="w-6 h-0.5 bg-blue-200 group-hover:bg-blue-400 transition-colors duration-300"></div>
          </div>
        </div>
      </a>
      
      <!-- Card 3 -->
      <a href="{{ route('generate.id.show') }}" class="card-hover-effect bg-white rounded-2xl shadow-card hover:shadow-card-hover group overflow-hidden border border-gray-100/50 animate-fade-in animate-slide-up" style="animation-delay: 100ms">
        <div class="h-full p-5 md:p-6 flex flex-col">
          <div class="w-12 h-12 md:w-14 md:h-14 rounded-xl bg-gradient-to-br from-blue-50 to-blue-100 mb-4 flex items-center justify-center group-hover:from-blue-100 group-hover:to-blue-200 transition-all duration-300 mx-auto">
            <img src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIzMiIgaGVpZ2h0PSIzMiIgdmlld0JveD0iMCAwIDI0IDI0IiBmaWxsPSJub25lIiBzdHJva2U9IiMxZTQwYWYiIHN0cm9rZS13aWR0aD0iMiIgc3Ryb2tlLWxpbmVjYXA9InJvdW5kIiBzdHJva2UtbGluZWpvaW49InJvdW5kIiBjbGFzcz0ibHVjaWRlIGx1Y2lkZS1pZC1jYXJkLWljb24gbHVjaWRlLWlkLWNhcmQiPjxwYXRoIGQ9Ik0xNiAxMGgyIi8+PHBhdGggZD0iTTE2IDE0aDIiLz48cGF0aCBkPSJNNi4xNyAxNWEzIDMgMCAwIDEgNS42NiAwIi8+PGNpcmNsZSBjeD0iOSIgY3k9IjExIiByPSIyIi8+PHJlY3QgeD0iMiIgeT0iNSIgd2lkdGg9IjIwIiBoZWlnaHQ9IjE0IiByeD0iMiIvPjwvc3ZnPg==" class="w-6 h-6 md:w-7 md:h-7" alt="Generate ID" />
          </div>
          <h3 class="text-sm md:text-base font-semibold text-gray-800 mb-1 text-center">Generate ID</h3>
          <p class="text-xs text-gray-500 text-center mt-auto">Buat kartu identitas</p>
          <div class="mt-3 flex justify-center">
            <div class="w-6 h-0.5 bg-blue-200 group-hover:bg-blue-400 transition-colors duration-300"></div>
          </div>
        </div>
      </a>
      
      <!-- Card 4 -->
      <a href="{{ route('scan.show') }}" class="card-hover-effect bg-white rounded-2xl shadow-card hover:shadow-card-hover group overflow-hidden border border-gray-100/50 animate-fade-in animate-slide-up" style="animation-delay: 150ms">
        <div class="h-full p-5 md:p-6 flex flex-col">
          <div class="w-12 h-12 md:w-14 md:h-14 rounded-xl bg-gradient-to-br from-blue-50 to-blue-100 mb-4 flex items-center justify-center group-hover:from-blue-100 group-hover:to-blue-200 transition-all duration-300 mx-auto">
            <i data-feather="maximize" class="w-6 h-6 md:w-7 md:h-7 text-blue-800"></i>
          </div>
          <h3 class="text-sm md:text-base font-semibold text-gray-800 mb-1 text-center">Scan Kehadiran</h3>
          <p class="text-xs text-gray-500 text-center mt-auto">Scan QR code presensi</p>
          <div class="mt-3 flex justify-center">
            <div class="w-6 h-0.5 bg-blue-200 group-hover:bg-blue-400 transition-colors duration-300"></div>
          </div>
        </div>
      </a>
    </div>

    <!-- Prints Tab -->
    <div id="tab2" class="hidden grid grid-cols-1 md:grid-cols-2 gap-4 md:gap-6 transition-opacity duration-300">
      <!-- Rectangle Card (Full width) -->
      <a href="{{ route('print.harian') }}" class="card-hover-effect md:col-span-2 bg-white rounded-2xl shadow-card hover:shadow-card-hover group overflow-hidden border border-gray-100/50 animate-fade-in animate-slide-up">
        <div class="h-full p-6 md:p-8 flex flex-col md:flex-row items-center">
          <div class="w-14 h-14 md:w-16 md:h-16 rounded-xl bg-gradient-to-br from-blue-50 to-blue-100 mb-4 md:mb-0 md:mr-6 flex items-center justify-center group-hover:from-blue-100 group-hover:to-blue-200 transition-all duration-300">
            <i data-feather="calendar" class="w-7 h-7 md:w-8 md:h-8 text-blue-800"></i>
          </div>
          <div class="text-center md:text-left">
            <h3 class="text-base md:text-lg font-semibold text-gray-800 mb-1">Print Kehadiran Harian</h3>
            <p class="text-xs md:text-sm text-gray-500">Laporan kehadiran harian lengkap dengan detail waktu</p>
          </div>
          <div class="mt-4 md:mt-0 md:ml-auto">
            <i data-feather="chevron-right" class="w-5 h-5 text-gray-400 group-hover:text-blue-600 transition-colors duration-300"></i>
          </div>
        </div>
      </a>
      
      <!-- Square Card 1 -->
      <a href="{{ route('print.bulanan') }}" class="card-hover-effect bg-white rounded-2xl shadow-card hover:shadow-card-hover group overflow-hidden border border-gray-100/50 animate-fade-in animate-slide-up" style="animation-delay: 50ms">
        <div class="h-full p-5 md:p-6 flex flex-col">
          <div class="w-12 h-12 md:w-14 md:h-14 rounded-xl bg-gradient-to-br from-blue-50 to-blue-100 mb-4 flex items-center justify-center group-hover:from-blue-100 group-hover:to-blue-200 transition-all duration-300 mx-auto">
            <i data-feather="calendar" class="w-6 h-6 md:w-7 md:h-7 text-blue-800"></i>
          </div>
          <h3 class="text-sm md:text-base font-semibold text-gray-800 mb-1 text-center">Print Kehadiran Bulanan</h3>
          <p class="text-xs text-gray-500 text-center mt-auto">Laporan kehadiran bulanan</p>
          <div class="mt-3 flex justify-center">
            <div class="w-6 h-0.5 bg-blue-200 group-hover:bg-blue-400 transition-colors duration-300"></div>
          </div>
        </div>
      </a>
      
      <!-- Square Card 2 -->
      <a href="{{ route('print.card.id') }}" class="card-hover-effect bg-white rounded-2xl shadow-card hover:shadow-card-hover group overflow-hidden border border-gray-100/50 animate-fade-in animate-slide-up" style="animation-delay: 100ms">
        <div class="h-full p-5 md:p-6 flex flex-col">
          <div class="w-12 h-12 md:w-14 md:h-14 rounded-xl bg-gradient-to-br from-blue-50 to-blue-100 mb-4 flex items-center justify-center group-hover:from-blue-100 group-hover:to-blue-200 transition-all duration-300 mx-auto">
            <img src="https://img.icons8.com/ios-filled/50/1e40af/print.png" class="w-6 h-6 md:w-7 md:h-7" alt="Print ID" />
          </div>
          <h3 class="text-sm md:text-base font-semibold text-gray-800 mb-1 text-center">Print Semua ID</h3>
          <p class="text-xs text-gray-500 text-center mt-auto">Cetak semua kartu identitas</p>
          <div class="mt-3 flex justify-center">
            <div class="w-6 h-0.5 bg-blue-200 group-hover:bg-blue-400 transition-colors duration-300"></div>
          </div>
        </div>
      </a>
    </div>

    <!-- Info Tab -->
    <div id="tab3" class="hidden transition-opacity duration-300 animate-fade-in">
      <div class="bg-white rounded-2xl shadow-card overflow-hidden">
        <div class="bg-gradient-to-r from-primary-600 to-primary-800 p-6 md:p-8 text-white">
          <div class="flex items-center">
            <div class="w-12 h-12 rounded-xl bg-white/20 backdrop-blur-sm flex items-center justify-center mr-4">
              <i data-feather="info" class="w-6 h-6"></i>
            </div>
            <div>
              <h2 class="text-xl md:text-2xl font-bold">Tentang Hadirin</h2>
              <p class="text-sm md:text-base text-blue-100/90 mt-1">Sistem Pengelola Kehadiran Digital</p>
            </div>
          </div>
        </div>
        
        <div class="p-6 md:p-8 space-y-4 md:space-y-5">
          <div class="flex items-start bg-blue-50/50 rounded-xl p-4 md:p-5 transition-all duration-300 hover:bg-blue-50">
            <div class="flex-shrink-0 mt-0.5">
              <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-800 flex items-center justify-center">
                <i data-feather="award" class="w-4 h-4"></i>
              </div>
            </div>
            <div class="ml-4">
              <h3 class="font-semibold text-gray-800">Solusi Digital Kehadiran</h3>
              <p class="text-sm text-gray-600 mt-1">
                Hadirin merupakan sistem pengelola kehadiran modern untuk lingkungan sekolah dengan antarmuka yang intuitif dan fitur lengkap.
              </p>
            </div>
          </div>
          
          <div class="flex items-start bg-blue-50/50 rounded-xl p-4 md:p-5 transition-all duration-300 hover:bg-blue-50">
            <div class="flex-shrink-0 mt-0.5">
              <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-800 flex items-center justify-center">
                <i data-feather="zap" class="w-4 h-4"></i>
              </div>
            </div>
            <div class="ml-4">
              <h3 class="font-semibold text-gray-800">Fitur Unggulan</h3>
              <p class="text-sm text-gray-600 mt-1">
                Dilengkapi dengan QR Code scanning, laporan real-time, dan manajemen data terintegrasi untuk memudahkan administrasi kehadiran.
              </p>
            </div>
          </div>
          
          <div class="flex items-start bg-blue-50/50 rounded-xl p-4 md:p-5 transition-all duration-300 hover:bg-blue-50">
            <div class="flex-shrink-0 mt-0.5">
              <div class="w-8 h-8 rounded-lg bg-blue-100 text-blue-800 flex items-center justify-center">
                <i data-feather="heart" class="w-4 h-4"></i>
              </div>
            </div>
            <div class="ml-4">
              <h3 class="font-semibold text-gray-800">Pengembangan Swadaya</h3>
              <p class="text-sm text-gray-600 mt-1">
                Dikembangkan oleh Guru Produktif Jurusan PPLG SMKN 1 Kota Bengkulu sebagai produk inovasi untuk mendukung pendidikan digital.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  <footer class="px-4 py-6 md:px-8 max-w-6xl mx-auto text-center">
    <p class="text-xs md:text-sm text-gray-500">
      &copy; 2023 Hadirin - Sistem Kehadiran SMKN 1 Kota Bengkulu. All rights reserved.
    </p>
  </footer>

  <script>
    function switchTab(id) {
      // Hide all tabs
      for (let i = 1; i <= 3; i++) {
        document.getElementById('tab' + i).classList.add('hidden');
        document.getElementById('b' + i).classList.remove('active');
      }
      
      // Show selected tab
      document.getElementById('tab' + id).classList.remove('hidden');
      document.getElementById('b' + id).classList.add('active');
      
      // Store selected tab in sessionStorage
      sessionStorage.setItem('selectedTab', id);
    }

    // Update current time
    function updateTime() {
      const now = new Date();
      const timeString = now.toLocaleTimeString('id-ID', {
        hour: '2-digit',
        minute: '2-digit'
      });
      document.getElementById('current-time').textContent = timeString;
    }
    
    // Initialize
    document.addEventListener('DOMContentLoaded', () => {
      // Initialize feather icons
      feather.replace();
      
      // Set initial tab from sessionStorage or default to 1
      const selectedTab = sessionStorage.getItem('selectedTab') || 1;
      switchTab(selectedTab);
      
      // Update time immediately and then every minute
      updateTime();
      setInterval(updateTime, 60000);
    });
  </script>
</body>
</html>