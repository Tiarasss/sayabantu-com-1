<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <title>Masuk Akun Customer & Mitra - SayaBantu.com</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        * { box-sizing: border-box; -webkit-tap-highlight-color: transparent; }
        body { font-family: 'Inter', sans-serif; background: #E5E7EB; color: #111827; margin: 0; padding: 0; }
        .mobile-app {
            width: 100%;
            max-width: 430px;
            min-height: 100vh;
            margin: 0 auto;
            position: relative;
            overflow-x: hidden;
            background: #F7F9FC;
            box-shadow: 0 0 40px rgba(15,23,42,0.14);
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .login-top-area {
            position: relative;
            overflow: hidden;
            color: white;
            background:
                radial-gradient(circle at 92% 4%, rgba(255,255,255,0.10), transparent 27%),
                radial-gradient(circle at 0% 42%, rgba(75,110,140,0.20), transparent 32%),
                linear-gradient(180deg, #0E1D31 0%, #11263D 38%, #17334C 70%, #F7F9FC 100%);
            padding: 24px 20px 48px;
        }
    </style>
</head>
<body>

<div class="mobile-app">
    
    <div>
        {{-- HEADER GRADIENT --}}
        <div class="login-top-area">
            <div class="flex items-center justify-between">
                <a href="{{ route('customer.index') }}" class="inline-flex items-center gap-1.5 text-xs text-white/80 hover:text-white font-medium transition-colors">
                    <i class="fa-solid fa-arrow-left text-[10px]"></i> Kembali ke Beranda
                </a>
                <span class="text-[10px] font-bold px-2 py-0.5 rounded-full bg-white/15 text-white border border-white/25" id="headerRoleBadge">
                    Customer & Mitra
                </span>
            </div>

            <div class="mt-6 text-center">
                <div class="w-12 h-12 rounded-2xl bg-gradient-to-tr from-sky-400 to-blue-600 flex items-center justify-center text-white font-black text-lg shadow-md mx-auto border border-white/20">
                    SB
                </div>
                <h2 class="text-xl font-extrabold text-white mt-3">Masuk ke SayaBantu</h2>
                <p class="text-xs text-white/70 mt-1">Pilih peran akun Anda untuk melanjutkan</p>

                {{-- DUAL ROLE TAB SWITCHER (PERSIS SANTOSURUH) --}}
                <div class="max-w-[280px] mx-auto grid grid-cols-2 gap-1.5 p-1 bg-black/30 rounded-xl mt-4 text-xs font-bold">
                    <button 
                        type="button" 
                        id="tabCustomerBtn"
                        onclick="setLoginTab('customer')"
                        class="py-2 rounded-lg transition-all text-center bg-white text-[#0E1D31] shadow-xs flex items-center justify-center gap-1.5"
                    >
                        <i class="fa-solid fa-user text-[11px]"></i> Customer
                    </button>
                    <button 
                        type="button" 
                        id="tabMitraBtn"
                        onclick="setLoginTab('mitra')"
                        class="py-2 rounded-lg transition-all text-center text-slate-300 hover:text-white flex items-center justify-center gap-1.5"
                    >
                        <i class="fa-solid fa-helmet-safety text-[11px]"></i> Mitra
                    </button>
                </div>
            </div>
        </div>

        {{-- FORM LOGIN CARD --}}
        <div class="px-5 -mt-6 relative z-10 space-y-4">
            
            {{-- TAB 1: KONTEN CUSTOMER --}}
            <div id="contentCustomerBox" class="space-y-4">
                {{-- FAST 1-CLICK DEMO LOGIN BUTTON --}}
                <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm space-y-2">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block text-center">
                        Uji Coba Cepat Customer
                    </span>
                    <button 
                        type="button" 
                        onclick="loginCustomerAndRedirect('Budi Santoso', '0812-3456-7890')" 
                        class="w-full py-2.5 px-3 rounded-xl bg-sky-500 hover:bg-sky-400 text-slate-950 font-bold text-xs shadow-sm flex items-center justify-center gap-2 transition-all"
                    >
                        <i class="fa-solid fa-bolt text-xs"></i> 1-Klik Masuk sebagai Customer (Budi)
                    </button>
                </div>

                {{-- MANUAL FORM CUSTOMER --}}
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm space-y-3.5 text-xs">
                    <form onsubmit="handleCustomerForm(event)" class="space-y-3">
                        <div>
                            <label class="block text-[11px] font-bold text-slate-700 mb-1">Nomor WhatsApp Customer</label>
                            <input 
                                type="text" 
                                id="inputPhone" 
                                placeholder="0812-3456-7890" 
                                value="081234567890"
                                class="w-full px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:ring-2 focus:ring-[#173B67] focus:outline-none"
                                required
                            >
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-slate-700 mb-1">Kata Sandi</label>
                            <input 
                                type="password" 
                                id="inputPassword" 
                                value="customer123"
                                class="w-full px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:ring-2 focus:ring-[#173B67] focus:outline-none"
                                required
                            >
                        </div>
                        <button 
                            type="submit" 
                            class="w-full py-3 rounded-xl bg-[#0E1D31] hover:bg-[#173B67] text-white font-bold text-xs shadow-sm transition-all flex items-center justify-center gap-2"
                        >
                            <i class="fa-solid fa-right-to-bracket"></i> Masuk Akun Customer
                        </button>
                    </form>
                </div>
            </div>

            {{-- TAB 2: KONTEN MITRA --}}
            <div id="contentMitraBox" class="hidden space-y-4">
                {{-- FAST 1-CLICK DEMO LOGIN MITRA --}}
                <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-sm space-y-2">
                    <span class="text-[10px] font-bold uppercase tracking-wider text-slate-400 block text-center">
                        Uji Coba Cepat Mitra / Helper
                    </span>
                    <button 
                        type="button" 
                        onclick="loginMitraAndRedirect('Bambang Sutrisno', '0813-9876-5432', 'Pindahan & Cleaning')" 
                        class="w-full py-2.5 px-3 rounded-xl bg-emerald-500 hover:bg-emerald-400 text-slate-950 font-bold text-xs shadow-sm flex items-center justify-center gap-2 transition-all"
                    >
                        <i class="fa-solid fa-helmet-safety text-xs"></i> 1-Klik Masuk sebagai Mitra (Bambang)
                    </button>
                </div>

                {{-- MANUAL FORM MITRA --}}
                <div class="bg-white p-5 rounded-2xl border border-slate-200 shadow-sm space-y-3.5 text-xs">
                    <form onsubmit="handleMitraForm(event)" class="space-y-3">
                        <div>
                            <label class="block text-[11px] font-bold text-slate-700 mb-1">ID Mitra / WhatsApp Terdaftar</label>
                            <input 
                                type="text" 
                                id="inputMitraId" 
                                placeholder="#MTR-0042 atau 081398765432" 
                                value="#MTR-0042"
                                class="w-full px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:ring-2 focus:ring-emerald-600 focus:outline-none"
                                required
                            >
                        </div>
                        <div>
                            <label class="block text-[11px] font-bold text-slate-700 mb-1">PIN Mitra</label>
                            <input 
                                type="password" 
                                id="inputMitraPass" 
                                value="mitra123"
                                class="w-full px-3 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold focus:ring-2 focus:ring-emerald-600 focus:outline-none"
                                required
                            >
                        </div>
                        <button 
                            type="submit" 
                            class="w-full py-3 rounded-xl bg-emerald-700 hover:bg-emerald-600 text-white font-bold text-xs shadow-sm transition-all flex items-center justify-center gap-2"
                        >
                            <i class="fa-solid fa-helmet-safety"></i> Masuk Portal Mitra
                        </button>
                    </form>
                </div>
            </div>

            <div class="text-center pt-1">
                <a href="{{ route('customer.index') }}" class="text-slate-500 hover:text-slate-800 text-xs font-medium">
                    ← Lanjut Jelajahi Layanan Tanpa Login (Tamu Publik)
                </a>
            </div>

        </div>
    </div>

    {{-- FOOTER: opsi daftar untuk pengguna baru (tanpa tautan admin) --}}
    <div class="p-5 text-center text-xs text-slate-500">
        <p>
            Belum punya akun?
            <a href="{{ route('customer.index') }}" class="text-[#173B67] font-bold hover:underline">Daftar di halaman utama »</a>
        </p>
    </div>

</div>

<script>
    function setLoginTab(role) {
        const btnCust = document.getElementById('tabCustomerBtn');
        const btnMitra = document.getElementById('tabMitraBtn');
        const boxCust = document.getElementById('contentCustomerBox');
        const boxMitra = document.getElementById('contentMitraBox');
        const badge = document.getElementById('headerRoleBadge');

        if (role === 'mitra') {
            btnMitra.className = 'py-2 rounded-lg transition-all text-center bg-white text-emerald-900 shadow-xs flex items-center justify-center gap-1.5';
            btnCust.className = 'py-2 rounded-lg transition-all text-center text-slate-300 hover:text-white flex items-center justify-center gap-1.5';
            boxMitra.classList.remove('hidden');
            boxCust.classList.add('hidden');
            if (badge) badge.innerText = 'Portal Mitra';
        } else {
            btnCust.className = 'py-2 rounded-lg transition-all text-center bg-white text-[#0E1D31] shadow-xs flex items-center justify-center gap-1.5';
            btnMitra.className = 'py-2 rounded-lg transition-all text-center text-slate-300 hover:text-white flex items-center justify-center gap-1.5';
            boxCust.classList.remove('hidden');
            boxMitra.classList.add('hidden');
            if (badge) badge.innerText = 'Akun Customer';
        }
    }

    function loginCustomerAndRedirect(name, phone) {
        localStorage.setItem('sb_customer_auth', JSON.stringify({
            isLoggedIn: true,
            name: name,
            phone: phone,
            role: 'customer'
        }));
        window.location.href = "{{ route('customer.index') }}";
    }

    function loginMitraAndRedirect(name, phone, specialty) {
        localStorage.setItem('sb_customer_auth', JSON.stringify({
            isLoggedIn: true,
            name: name,
            phone: phone,
            specialty: specialty,
            role: 'mitra'
        }));
        window.location.href = "{{ route('customer.index') }}";
    }

    function handleCustomerForm(e) {
        e.preventDefault();
        const phone = document.getElementById('inputPhone').value.trim();
        loginCustomerAndRedirect('Customer Budi', phone);
    }

    function handleMitraForm(e) {
        e.preventDefault();
        const phone = document.getElementById('inputMitraId').value.trim();
        loginMitraAndRedirect('Bambang Sutrisno', phone, 'Pindahan & Home Cleaning');
    }
</script>

</body>
</html>
