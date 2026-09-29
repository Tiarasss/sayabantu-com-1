{{-- MOBILE APP HEADER --}}
<header class="bg-[#0E1D31] text-white px-4 pt-3 pb-4 shadow-md shrink-0 relative z-30">
    
    {{-- TOP BAR: BURGER + BRANDING + ACTIONS --}}
    <div class="flex items-center justify-between gap-2 mb-3">

        {{-- BURGER MENU + BRAND --}}
        <div class="flex items-center gap-2.5">
            <button
                type="button"
                onclick="openCustomerDrawer()"
                class="header-icon shrink-0"
                aria-label="Menu Navigasi"
                title="Menu Navigasi"
            >
                <i class="fa-solid fa-bars text-[15px]"></i>
            </button>

            <h1 class="text-[17px] font-bold tracking-tight text-white leading-none">
                SayaBantu<span class="text-white">.com</span>
            </h1>
        </div>

        {{-- TOP RIGHT ACTION BUTTONS --}}
        <div class="flex items-center gap-1.5">

            {{-- ROLE SWITCHER PILL (CUSTOMER / MITRA) --}}
            <div class="bg-white/10 p-0.5 rounded-full border-white/15 flex items-center text-[10px] font-bold hidden">
                <button type="button" onclick="switchLoginRole('customer'); openModal('modalLoginCustomer');" class="px-2 py-0.5 rounded-full bg-sky-400 text-slate-950 shadow-xs">User</button>
                <button type="button" onclick="switchLoginRole('mitra'); openModal('modalLoginCustomer');" class="hidden">
                    Mitra
                </button>
            </div>

            {{-- IKON SEARCH --}}
            <button type="button" onclick="toggleHeaderSearch()" class="w-8 h-8 rounded-full bg-white/10 hover:bg-white/20 text-slate-200 hover:text-white flex items-center justify-center transition-all border border-white/10" title="Cari Layanan" aria-label="Pencarian">
                <i class="fa-solid fa-magnifying-glass text-xs"></i>
            </button>

            {{-- TOMBOL MASUK (TAMU PUBLIK) --}}
            <button type="button" onclick="switchLoginRole('customer'); openModal('modalLoginCustomer');" id="mobileHeaderLoginBtn" class="px-3 py-1.5 rounded-full bg-white text-[#0E1D31] text-[10px] font-extrabold shadow-sm hover:bg-sky-100 transition-colors">
                Masuk
            </button>

            {{-- PROFIL (SETELAH LOGIN) --}}
            <button type="button" onclick="handleAccountButtonClick()" id="mobileHeaderProfileBtn" class="w-8 h-8 rounded-full bg-gradient-to-tr from-sky-600 to-indigo-600 text-white items-center justify-center text-xs font-bold shadow-md border border-white/20 hidden" title="Akun Saya">
                <i class="fa-regular fa-user"></i>
            </button>
        </div>

    </div>

    {{-- SEARCH BAR (EXPANDABLE) --}}
    <div id="mobileHeaderSearchWrap" class="relative hidden">
        <div class="relative flex items-center">
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 text-xs text-slate-400 pointer-events-none"></i>
            <input
                type="text"
                id="mobileSearchInput"
                onkeyup="filterMobileServices(this.value)"
                placeholder="Mau cari suruhan apa hari ini?"
                class="w-full bg-white text-slate-900 placeholder-slate-400 text-xs rounded-2xl pl-9 pr-9 py-2.5 shadow-xl border border-white/20 focus:outline-none focus:ring-2 focus:ring-sky-400"
            >
            <button type="button" onclick="toggleHeaderSearch()" class="absolute right-2.5 text-slate-400 hover:text-slate-700 p-1 text-xs">
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    </div>

    {{-- E-WALLET STRIP (HANYA UNTUK PENGGUNA YANG SUDAH MASUK) --}}
    <div id="mobileHeaderWallet" class="mt-3 bg-gradient-to-r from-[#173B67] to-[#1E4E8C] rounded-2xl p-2.5 border border-white/15 shadow-inner hidden items-center justify-between text-xs">
        <div class="flex items-center gap-2.5">
            <div class="w-7 h-7 rounded-xl bg-sky-400/20 text-sky-300 flex items-center justify-center font-bold text-xs border border-sky-400/30">
                <i class="fa-solid fa-wallet"></i>
            </div>
            <div>
                <span class="text-[10px] text-slate-300 block leading-tight">SayaBantu Pay</span>
                <span class="font-extrabold text-white text-xs tracking-tight">Rp 175.000</span>
            </div>
        </div>

        <div class="h-6 w-px bg-white/15"></div>

        <div class="flex items-center gap-2 text-[11px]">
            <div class="text-right">
                <span class="text-[10px] text-slate-300 block leading-tight">Poin Bonus</span>
                <span class="font-bold text-amber-400 flex items-center justify-end gap-1">
                    <i class="fa-solid fa-coins text-[10px]"></i> 48 Poin
                </span>
            </div>

            <button type="button" onclick="showCustomerToast('Top Up', 'Fitur isi ulang saldo e-wallet SayaBantu Pay aktif', 'success')" class="px-2.5 py-1 rounded-xl bg-sky-400 hover:bg-sky-300 text-slate-950 font-extrabold text-[10px] shadow-sm transition-all flex items-center gap-1">
                <i class="fa-solid fa-plus text-[8px]"></i> Top Up
            </button>
        </div>
    </div>

</header>

<script>
    // Search bar di header: tersembunyi, muncul saat ikon search ditekan
    function toggleHeaderSearch() {
        const wrap = document.getElementById('mobileHeaderSearchWrap');
        if (!wrap) return;
        wrap.classList.toggle('hidden');
        if (!wrap.classList.contains('hidden')) {
            const input = document.getElementById('mobileSearchInput');
            if (input) input.focus();
        }
    }
</script>
