<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - SIKPEG ENTERPRISE</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark');
        }
        tailwind.config = {
            darkMode: 'class',
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f1f5f9; }
    </style>
</head>
<body class="flex flex-col h-screen overflow-hidden bg-slate-50 dark:bg-slate-900 transition-colors duration-300">

    <!-- Top Navbar -->
    <header class="bg-white dark:bg-slate-800 border-b border-slate-200 dark:border-slate-700 px-6 py-4 flex items-center justify-between z-10 shrink-0 transition-colors duration-300">
        <div class="flex items-center gap-3">
            <div class="w-8 h-8 rounded-lg border border-slate-200 dark:border-slate-600 flex items-center justify-center bg-white dark:bg-slate-700">
                <svg class="w-5 h-5 text-slate-700 dark:text-slate-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            </div>
            <div>
                <h1 class="text-sm font-bold text-slate-800 dark:text-white leading-none flex items-center gap-2">SIKPEG <span class="bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-300 text-[10px] px-1.5 py-0.5 rounded font-semibold tracking-wide">ENTERPRISE</span></h1>
                <p class="text-[10px] text-slate-500 dark:text-slate-400 mt-0.5">Sistem Informasi Manajemen Kepegawaian</p>
            </div>
        </div>
        <div class="flex items-center gap-4 text-xs font-semibold text-slate-600 dark:text-slate-300">
            <button id="theme-toggle" type="button" class="text-slate-500 dark:text-slate-400 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-lg text-sm p-2 transition-colors">
                <svg id="theme-toggle-dark-icon" class="hidden w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path></svg>
                <svg id="theme-toggle-light-icon" class="hidden w-4 h-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"></path></svg>
            </button>
            <span class="bg-slate-800 dark:bg-slate-700 text-white px-2.5 py-1.5 rounded shadow-sm">v2.4.0</span>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 flex items-center justify-center p-6">
        <div class="w-full max-w-5xl bg-white dark:bg-slate-800 rounded-2xl shadow-xl flex flex-col md:flex-row h-full md:h-[90vh] md:max-h-[600px] overflow-hidden border border-slate-200/60 dark:border-slate-700 transition-colors duration-300">
            
            <!-- Left Banner (Hidden on Mobile) -->
            <div class="hidden md:flex bg-[#0f172a] w-5/12 p-8 text-white flex-col relative overflow-hidden">
                <!-- Abstract Background Elements -->
                <div class="absolute top-0 right-0 -mr-16 -mt-16 w-64 h-64 rounded-full bg-blue-600 opacity-10 blur-3xl"></div>
                <div class="absolute bottom-0 left-0 -ml-16 -mb-16 w-64 h-64 rounded-full bg-indigo-600 opacity-10 blur-3xl"></div>
                
                <div class="flex items-center gap-4 mb-10 relative z-10">
                    <div class="w-12 h-12 bg-slate-800/50 rounded-xl border border-slate-700 flex items-center justify-center">
                        <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    </div>
                    <div>
                        <h2 class="text-xl font-bold flex items-center gap-2">SIKPEG <span class="bg-slate-800 text-blue-300 text-[10px] px-1.5 py-0.5 rounded border border-slate-700">ENTERPRISE</span></h2>
                        <p class="text-xs text-slate-400 mt-1">Sistem Informasi Kepegawaian Terpadu</p>
                    </div>
                </div>

                <div class="relative z-10 flex-1">
                    <p class="text-[10px] font-bold text-blue-400 tracking-wider uppercase mb-3">Gerbang Akses ASN</p>
                    <h1 class="text-3xl font-extrabold leading-tight mb-4">Portal Manajemen & Layanan ASN Terintegrasi</h1>
                    <p class="text-sm text-slate-400 mb-8 leading-relaxed">Pusat tata kelola data kepegawaian modern dengan interoperabilitas langsung terhadap infrastruktur SIASN BKN Republik Indonesia.</p>
                    
                </div>
            </div>

            <!-- Right Login Form -->
            <div class="w-full md:w-7/12 p-6 md:p-10 flex flex-col justify-center">
                
                <div class="flex items-center justify-between mb-4">
                    <span class="bg-blue-50 dark:bg-slate-700 text-blue-700 dark:text-blue-300 text-[10px] font-bold px-2 py-1 rounded tracking-wide uppercase">Autentikasi Pegawai</span>
                    <span class="text-xs text-slate-500 dark:text-slate-400 flex items-center gap-1 font-medium"><svg class="w-3.5 h-3.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg> Kementerian / Lembaga</span>
                </div>

                <h2 class="text-2xl font-bold text-slate-900 dark:text-white mb-2">Masuk ke Akun Anda</h2>
                <p class="text-xs text-slate-500 dark:text-slate-400 mb-8 leading-relaxed">Gunakan Username resmi untuk otorisasi akses portal.</p>

                @if($errors->any())
                    <div class="bg-rose-50 text-rose-600 text-xs p-3 rounded-lg border border-rose-200 font-medium mb-4 flex items-center gap-2">
                        <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                        {{ $errors->first() }}
                    </div>
                @endif

                <form action="/login" method="POST">
                    @csrf
                    
                    <div class="mb-5">
                        <div class="flex justify-between items-center mb-1.5">
                            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300">Username Resmi <span class="text-rose-500">*</span></label>
                            <span class="text-[10px] text-slate-400 dark:text-slate-500 font-medium">Identitas Utama ASN</span>
                        </div>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="w-4 h-4 text-slate-400 dark:text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </span>
                            <input type="text" name="username" value="{{ old('username') }}" class="w-full bg-slate-50 dark:bg-slate-900/50 border border-slate-200 dark:border-slate-700 rounded-lg pl-10 pr-10 py-2.5 text-sm font-medium text-slate-900 dark:text-white focus:bg-white dark:focus:bg-slate-900 focus:border-blue-500 dark:focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-all" required placeholder="Contoh: admin" autofocus>
                            <span class="absolute inset-y-0 right-0 flex items-center pr-3">
                                <svg class="w-4 h-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                            </span>
                        </div>
                    </div>
                    
                    <div class="mb-5">
                        <div class="flex justify-between items-center mb-1.5">
                            <label class="block text-xs font-bold text-slate-700 dark:text-slate-300">Kata Sandi <span class="text-rose-500">*</span></label>
                            <a href="#" class="text-[10px] text-blue-600 dark:text-blue-400 hover:underline font-medium">Lupa Kata Sandi?</a>
                        </div>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                                <svg class="w-4 h-4 text-slate-400 dark:text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path></svg>
                            </span>
                            <input type="password" name="password" class="w-full bg-slate-50 dark:bg-slate-900/50 border border-slate-200 dark:border-slate-700 rounded-lg pl-10 pr-10 py-2.5 text-sm font-medium text-slate-900 dark:text-white focus:bg-white dark:focus:bg-slate-900 focus:border-blue-500 dark:focus:border-blue-500 focus:ring-1 focus:ring-blue-500 outline-none transition-all" required placeholder="&bull;&bull;&bull;&bull;&bull;&bull;&bull;&bull;">
                            <button type="button" class="absolute inset-y-0 right-0 flex items-center pr-3 text-slate-400 hover:text-slate-600">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                            </button>
                        </div>
                    </div>

                    <div class="mb-6"></div>

                    <button type="submit" class="w-full bg-[#0f172a] dark:bg-blue-600 hover:bg-slate-800 dark:hover:bg-blue-700 text-white font-bold py-3 px-4 rounded-lg text-sm flex items-center justify-center gap-2 transition-colors shadow-md group">
                        Masuk ke Dashboard
                    </button>
                </form>

                <div class="mt-8 bg-blue-50/50 dark:bg-slate-900/50 border border-blue-100 dark:border-slate-700 rounded-lg p-4 flex gap-3">
                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
                    <div>
                        <h4 class="text-xs font-bold text-slate-800 dark:text-slate-200">Pemberitahuan Keamanan Siber Pemerintah</h4>
                        <p class="text-[10px] text-slate-500 dark:text-slate-400 mt-1 leading-relaxed">Pastikan Anda berada pada subdomain resmi instansi pemerintah. Jangan pernah membagikan kata sandi atau kode OTP token kepada pihak mana pun.</p>
                    </div>
                </div>

                <div class="mt-6 flex items-center justify-between text-[10px] text-slate-400 dark:text-slate-500 font-medium border-t border-slate-100 dark:border-slate-700 pt-4">
                    <span>SIKPEG v2.4.0 &bull; Build 2024.11</span>
                    <div class="flex gap-4">
                        <a href="#" class="hover:text-blue-600 flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg> (021) 809-3008</a>
                        <a href="#" class="hover:text-blue-600 flex items-center gap-1"><svg class="w-3 h-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg> helpdesk@sikpeg.go.id</a>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <!-- Footer Banner -->
    <footer class="bg-[#f8fafc] dark:bg-slate-900 border-t border-slate-200 dark:border-slate-800 px-6 py-4 flex items-center justify-between text-[10px] font-semibold text-slate-500 dark:text-slate-400 shrink-0 transition-colors duration-300">
        <div class="flex items-center gap-2">
            <svg class="w-4 h-4 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path></svg>
            Kepatuhan Standar Keamanan Data Kepegawaian Nasional
        </div>
        <div class="flex items-center gap-4">
            <a href="#" class="hover:text-slate-800 dark:hover:text-slate-300">Pusat Bantuan Teknis Kepegawaian</a>
            <span class="w-1 h-1 rounded-full bg-slate-300 dark:bg-slate-600"></span>
            <span>Enkripsi TLS 1.3 &amp; ISO/IEC 27001</span>
        </div>
    </footer>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const darkIcon = document.getElementById('theme-toggle-dark-icon');
            const lightIcon = document.getElementById('theme-toggle-light-icon');

            if (document.documentElement.classList.contains('dark')) {
                lightIcon.classList.remove('hidden');
            } else {
                darkIcon.classList.remove('hidden');
            }

            const themeToggleBtn = document.getElementById('theme-toggle');
            if (themeToggleBtn) {
                themeToggleBtn.addEventListener('click', function() {
                    darkIcon.classList.toggle('hidden');
                    lightIcon.classList.toggle('hidden');

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
                });
            }
        });
    </script>
</body>
</html>
