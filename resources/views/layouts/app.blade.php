<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIKPEG - Sistem Informasi Kepegawaian</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Setup Dark Mode
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }

        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    colors: {
                        primary: '#1a365d',
                        secondary: '#2563eb',
                    }
                }
            }
        }
    </script>


    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }

        /* Splash Screen Styles */
        #global-loader {
            position: fixed;
            inset: 0;
            z-index: 9999;
            background-color: #1a365d;
            /* bg-primary */
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            transition: opacity 0.6s cubic-bezier(0.4, 0, 0.2, 1), visibility 0.6s;
        }

        .loader-hidden {
            opacity: 0 !important;
            visibility: hidden !important;
            pointer-events: none;
        }

        .splash-logo {
            display: flex;
            align-items: center;
            gap: 12px;
            margin-bottom: 24px;
            animation: pulse-glow 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        .splash-icon {
            width: 48px;
            height: 48px;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            box-shadow: 0 10px 25px -5px rgba(59, 130, 246, 0.5);
        }

        .splash-text {
            color: white;
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: 2px;
        }

        .progress-container {
            width: 200px;
            height: 4px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 10px;
            overflow: hidden;
            position: relative;
        }

        .progress-bar {
            width: 40%;
            height: 100%;
            background: #3b82f6;
            border-radius: 10px;
            position: absolute;
            animation: loading-bar 1.5s infinite ease-in-out;
        }

        .loading-text {
            margin-top: 16px;
            color: #94a3b8;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 3px;
            animation: blink 1.5s infinite;
        }

        @keyframes pulse-glow {

            0%,
            100% {
                opacity: 1;
                transform: scale(1);
                filter: drop-shadow(0 0 15px rgba(59, 130, 246, 0));
            }

            50% {
                opacity: 0.8;
                transform: scale(1.02);
                filter: drop-shadow(0 0 25px rgba(59, 130, 246, 0.4));
            }
        }

        @keyframes loading-bar {
            0% {
                left: -40%;
                width: 40%;
            }

            50% {
                left: 20%;
                width: 80%;
            }

            100% {
                left: 100%;
                width: 40%;
            }
        }

        @keyframes blink {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.5;
            }
        }

        /* Page Transition */
        main {
            animation: fadeIn 0.4s ease forwards;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
    <script src="https://unpkg.com/htmx.org@1.9.11"></script>
</head>

<body class="text-slate-800 dark:text-slate-100 antialiased h-screen overflow-hidden" hx-boost="true" hx-target="#app-wrapper"
    hx-select="#app-wrapper" hx-swap="outerHTML show:none">

    <!-- Splash Screen Loader -->
    <div id="global-loader">
        <div class="splash-logo">
            <div class="splash-icon">
                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                </svg>
            </div>
            <h2 class="splash-text">SIKPEG</h2>
        </div>
        <div class="progress-container">
            <div class="progress-bar"></div>
        </div>
        <p class="loading-text">Menyiapkan Workspace...</p>
    </div>

    <div id="app-wrapper" class="flex h-screen overflow-hidden w-full relative">
        <!-- Mobile Sidebar Overlay -->
        <div id="mobile-sidebar-overlay" class="fixed inset-0 bg-slate-900/50 z-40 hidden md:hidden backdrop-blur-sm transition-opacity opacity-0"></div>

        <!-- Sidebar -->
        <aside id="sidebar" class="fixed md:static inset-y-0 left-0 z-50 w-64 bg-white dark:bg-slate-800 border-r border-slate-200 dark:border-slate-600 flex flex-col shrink-0 transform -translate-x-full md:translate-x-0 transition-transform duration-300 ease-in-out">
            <button id="close-sidebar-btn" class="md:hidden absolute top-5 right-4 text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path></svg>
            </button>
            <div class="h-16 flex items-center px-6 border-b border-slate-200 dark:border-slate-600">
                <div class="flex items-center gap-2">
                    <div class="w-8 h-8 bg-primary text-white rounded-lg flex items-center justify-center font-bold">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                        </svg>
                    </div>
                    <div>
                        <h1 class="text-sm font-bold text-slate-900 dark:text-white leading-tight">SIKPEG</h1>
                        <p class="text-[10px] text-slate-500 dark:text-slate-400">Sistem Informasi Kepegawaian</p>
                    </div>
                </div>
            </div>

            <div class="flex-1 overflow-y-auto p-4">
                <div class="mb-6">
                    <p class="text-[10px] font-bold text-slate-400 mb-3 uppercase tracking-wider">Menu Utama</p>
                    <nav class="space-y-1">
                        <a href="/"
                            class="nav-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ Request::is('/') ? 'bg-primary text-white shadow-sm' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 hover:text-slate-900 dark:text-white' }}">
                            <svg class="w-5 h-5 {{ Request::is('/') ? 'text-white' : 'text-slate-400' }}" fill="none"
                                stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
                                </path>
                            </svg>
                            Dashboard
                        </a>
                        <a href="/pegawai"
                            class="nav-link flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium transition-colors {{ Request::is('pegawai*') ? 'bg-primary text-white shadow-sm' : 'text-slate-600 dark:text-slate-300 hover:bg-slate-50 dark:hover:bg-slate-700 hover:text-slate-900 dark:text-white' }}">
                            <svg class="w-5 h-5 {{ Request::is('pegawai*') ? 'text-white' : 'text-slate-400' }}"
                                fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                </path>
                            </svg>
                            Data Pegawai
                        </a>
                    </nav>
                </div>

                <div class="mb-4">
                    <button onclick="toggleMasterMenu()" class="w-full text-left text-[10px] font-bold text-slate-400 hover:text-slate-600 dark:hover:text-slate-300 mb-3 uppercase tracking-wider flex justify-between items-center transition-colors">
                        Konfigurasi & Master
                        <svg id="master-menu-icon" class="w-3 h-3 transform transition-transform duration-200 rotate-180" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>
                    <div id="master-menu-items" class="space-y-1 pl-2 border-l border-slate-200 dark:border-slate-700 ml-2 overflow-hidden transition-all duration-300 max-h-64 opacity-100">
                        <a href="/master/unit-kerja" class="block px-3 py-2 rounded-lg text-xs font-medium transition-all {{ Request::is('master/unit-kerja') ? 'bg-blue-50 dark:bg-blue-900/30 text-primary dark:text-blue-400 font-bold shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-slate-700 dark:hover:text-slate-300' }}">Unit Kerja</a>
                        <a href="/master/jabatan" class="block px-3 py-2 rounded-lg text-xs font-medium transition-all {{ Request::is('master/jabatan') ? 'bg-blue-50 dark:bg-blue-900/30 text-primary dark:text-blue-400 font-bold shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-slate-700 dark:hover:text-slate-300' }}">Jabatan</a>
                        <a href="/master/status-pegawai" class="block px-3 py-2 rounded-lg text-xs font-medium transition-all {{ Request::is('master/status-pegawai') ? 'bg-blue-50 dark:bg-blue-900/30 text-primary dark:text-blue-400 font-bold shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-slate-700 dark:hover:text-slate-300' }}">Status Pegawai</a>
                        <a href="/master/golongan" class="block px-3 py-2 rounded-lg text-xs font-medium transition-all {{ Request::is('master/golongan') ? 'bg-blue-50 dark:bg-blue-900/30 text-primary dark:text-blue-400 font-bold shadow-sm' : 'text-slate-500 dark:text-slate-400 hover:bg-slate-50 dark:hover:bg-slate-800 hover:text-slate-700 dark:hover:text-slate-300' }}">Golongan</a>
                    </div>
                </div>
            </div>
            <div class="p-4 border-t border-slate-200 dark:border-slate-600">
                <div class="flex items-center gap-2 text-xs text-slate-500 dark:text-slate-400">
                    <svg class="w-4 h-4 text-emerald-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    SIKPEG v2.4.0 <span
                        class="ml-auto bg-emerald-50 dark:bg-emerald-900/30 text-emerald-600 dark:text-emerald-400 px-2 py-0.5 rounded text-[10px] font-semibold border border-emerald-200">Aktif</span>
                </div>
            </div>
        </aside>

        <!-- Main Wrapper -->
        <div class="flex-1 flex flex-col h-screen overflow-hidden w-full">
            <!-- Top Header -->
            <header class="h-16 bg-white dark:bg-slate-800 border-b border-slate-200 dark:border-slate-600 flex items-center justify-between px-4 md:px-6 shrink-0">
                <div class="flex items-center gap-2 md:gap-3 flex-1 max-w-2xl">
                    <!-- Hamburger Button (Mobile) -->
                    <button id="open-sidebar-btn" class="md:hidden text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:hover:text-slate-200 p-1">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
                    </button>
                    

                </div>

                <div class="flex items-center gap-6 ml-4">
                    <!-- Theme Toggle -->
                    <button id="theme-toggle" type="button" class="text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700 focus:outline-none rounded-lg text-sm p-2.5">
                        <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                        <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z" fill-rule="evenodd" clip-rule="evenodd"></path></svg>
                    </button>
                    
                    <button class="relative text-slate-500 dark:text-slate-400 hover:text-slate-700 dark:text-slate-200">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9">
                            </path>
                        </svg>
                        <span
                            class="absolute top-0 right-0 block w-2 h-2 rounded-full bg-red-500 ring-2 ring-white"></span>
                    </button>

                    <div class="flex items-center gap-3 border-l pl-6 border-slate-200 dark:border-slate-600">
                        <div class="text-right hidden md:block">
                            <p class="text-sm font-semibold text-slate-800 dark:text-slate-100 leading-tight">{{ auth()->user()->username ?? 'Admin' }}</p>
                            <form action="/logout" method="POST" class="inline" hx-boost="false" onsubmit="window.showGlobalLoader()">
                                @csrf
                                <button type="submit" class="text-[11px] text-rose-500 hover:text-rose-700 font-medium transition-colors">Keluar (Logout)</button>
                            </form>
                        </div>
                        <img src="https://ui-avatars.com/api/?name={{ urlencode(auth()->user()->username ?? 'Admin') }}&background=1a365d&color=fff"
                            alt="User" class="w-9 h-9 rounded-full">
                    </div>
                </div>
            </header>

            <!-- Main Content -->
            <main class="flex-1 overflow-y-auto p-6 bg-slate-50 dark:bg-slate-900">
                @yield('content')
            </main>
            
            <!-- Global Footer (Sticky) -->
            <footer class="bg-white dark:bg-slate-800 border-t border-slate-200 dark:border-slate-600 px-6 py-3 shrink-0 z-10">
                <div class="flex flex-col md:flex-row justify-between items-center gap-4">
                    <div class="flex items-center gap-2 text-slate-500 dark:text-slate-400">
                        <div class="w-6 h-6 bg-slate-100 dark:bg-slate-700 text-slate-500 dark:text-slate-400 rounded flex items-center justify-center font-bold">
                            <svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <p class="text-xs font-semibold text-slate-600 dark:text-slate-300">SIKPEG &copy; {{ date('Y') }}</p>
                    </div>
                    <p class="text-[11px] text-slate-400">Sistem Informasi Kepegawaian &bull; Dikelola oleh BKD</p>
                    <div class="flex gap-4 text-xs font-medium text-slate-400">
                        <a href="#" class="hover:text-primary transition-colors">Panduan</a>
                        <a href="#" class="hover:text-primary transition-colors">Dukungan IT</a>
                    </div>
                </div>
            </footer>
        </div>

    </div>
    <script>
        // Hide loader on initial load
        window.addEventListener('load', function () {
            const loader = document.getElementById('global-loader');
            if (loader) {
                loader.classList.add('loader-hidden');
                setTimeout(() => { loader.style.display = 'none'; }, 400);
            }
        });

        window.showGlobalLoader = function() {
            const loader = document.getElementById('global-loader');
            if (loader) {
                loader.style.display = 'flex';
                setTimeout(() => { loader.classList.remove('loader-hidden'); }, 10);
            }
        };

        // Show loader when HTMX starts requesting
        document.body.addEventListener('htmx:beforeRequest', function () {
            window.showGlobalLoader();
        });

        // Hide loader when HTMX finishes swapping
        document.body.addEventListener('htmx:afterSettle', function () {
            const loader = document.getElementById('global-loader');
            if (loader) {
                loader.classList.add('loader-hidden');
                setTimeout(() => { loader.style.display = 'none'; }, 400);
            }
        });

        // Dark Mode Logic
        function updateThemeIcons() {
            const darkIcon = document.getElementById('theme-toggle-dark-icon');
            const lightIcon = document.getElementById('theme-toggle-light-icon');
            if (!darkIcon || !lightIcon) return;

            if (document.documentElement.classList.contains('dark')) {
                lightIcon.classList.remove('hidden');
                darkIcon.classList.add('hidden');
            } else {
                lightIcon.classList.add('hidden');
                darkIcon.classList.remove('hidden');
            }
        }
        
        function attachThemeToggle() {
            const btn = document.getElementById('theme-toggle');
            if (!btn) return;
            
            // Remove existing listener to prevent duplicates just in case
            const newBtn = btn.cloneNode(true);
            btn.parentNode.replaceChild(newBtn, btn);
            
            newBtn.addEventListener('click', function() {
                if (localStorage.getItem('color-theme')) {
                    if (localStorage.getItem('color-theme') === 'light') {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    } else {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    }
                } else {
                    if (document.documentElement.classList.contains('dark')) {
                        document.documentElement.classList.remove('dark');
                        localStorage.setItem('color-theme', 'light');
                    } else {
                        document.documentElement.classList.add('dark');
                        localStorage.setItem('color-theme', 'dark');
                    }
                }
                updateThemeIcons();
            });
        }
        
        // Sidebar Toggle Logic for Mobile
        function attachSidebarToggle() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobile-sidebar-overlay');
            const openBtn = document.getElementById('open-sidebar-btn');
            const closeBtn = document.getElementById('close-sidebar-btn');

            if (!sidebar || !overlay) return;

            function openSidebar() {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
                setTimeout(() => overlay.classList.remove('opacity-0'), 10);
            }

            function closeSidebar() {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('opacity-0');
                setTimeout(() => overlay.classList.add('hidden'), 300);
            }

            if (openBtn) openBtn.onclick = openSidebar;
            if (closeBtn) closeBtn.onclick = closeSidebar;
            if (overlay) overlay.onclick = closeSidebar;

            // Close sidebar on link click (for SPA navigation)
            const navLinks = sidebar.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', () => {
                    if (window.innerWidth < 768) {
                        closeSidebar();
                    }
                });
            });
        }

        // Master Menu Toggle
        function toggleMasterMenu() {
            const menu = document.getElementById('master-menu-items');
            const icon = document.getElementById('master-menu-icon');
            if (menu.classList.contains('max-h-0')) {
                menu.classList.remove('max-h-0', 'opacity-0');
                menu.classList.add('max-h-64', 'opacity-100');
                icon.classList.add('rotate-180');
            } else {
                menu.classList.add('max-h-0', 'opacity-0');
                menu.classList.remove('max-h-64', 'opacity-100');
                icon.classList.remove('rotate-180');
            }
        }

        // Initialize on first load
        updateThemeIcons();
        attachThemeToggle();
        attachSidebarToggle();

        // Re-initialize after HTMX swap
        document.body.addEventListener('htmx:afterSettle', function() {
            updateThemeIcons();
            attachThemeToggle();
            attachSidebarToggle();
        });
    </script>
</body>

</html>