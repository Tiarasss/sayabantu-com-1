@extends('layouts.customer')

@section('title', 'SayaBantu.com | Layanan Suruhan & Jasa Terpercaya')

@php
/*
|--------------------------------------------------------------------------
| MASKOT HERO BERANDA (statis / tidak bergerak)
| Pekerja SayaBantu: helm oranye + rompi + papan "24 JAM".
|--------------------------------------------------------------------------
*/
$maskotHero = <<<'SVG'
<svg viewBox="0 0 220 240" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Maskot SayaBantu">
  <ellipse cx="110" cy="228" rx="78" ry="11" fill="#0E1D31" opacity="0.10"/>
  <!-- kaki -->
  <rect x="86" y="176" width="18" height="42" rx="9" fill="#1E293B"/>
  <rect x="116" y="176" width="18" height="42" rx="9" fill="#1E293B"/>
  <rect x="80" y="210" width="30" height="14" rx="7" fill="#0F172A"/>
  <rect x="110" y="210" width="30" height="14" rx="7" fill="#0F172A"/>
  <!-- badan -->
  <path d="M70 96 q40 -14 80 0 l8 84 q-48 14 -96 0 z" fill="#F8FAFC"/>
  <!-- rompi -->
  <path d="M74 98 l20 -6 l16 82 l-30 4 z" fill="#FBBF24"/>
  <path d="M146 98 l-20 -6 l-16 82 l30 4 z" fill="#FBBF24"/>
  <rect x="70" y="150" width="80" height="10" fill="#0E1D31" opacity="0.08"/>
  <!-- lengan kiri -->
  <path d="M70 100 l-16 46 q-4 12 8 14 q10 2 13 -10 l12 -44 z" fill="#F8FAFC"/>
  <!-- lengan kanan memegang papan -->
  <path d="M150 100 l18 44 q4 12 -8 14 q-10 2 -13 -10 l-13 -42 z" fill="#F8FAFC"/>
  <!-- kepala -->
  <circle cx="110" cy="62" r="34" fill="#FCD9B6"/>
  <!-- helm -->
  <path d="M76 58 a34 34 0 0 1 68 0 z" fill="#F97316"/>
  <rect x="70" y="56" width="80" height="10" rx="5" fill="#EA580C"/>
  <rect x="104" y="24" width="12" height="10" rx="4" fill="#EA580C"/>
  <!-- mata & senyum -->
  <circle cx="99" cy="66" r="3.4" fill="#0F172A"/>
  <circle cx="121" cy="66" r="3.4" fill="#0F172A"/>
  <path d="M100 78 q10 8 20 0" stroke="#0F172A" stroke-width="2.6" fill="none" stroke-linecap="round"/>
  <!-- pi -->
  <circle cx="90" cy="74" r="4" fill="#FDA4AF" opacity="0.7"/>
  <circle cx="130" cy="74" r="4" fill="#FDA4AF" opacity="0.7"/>
  <!-- papan 24 jam -->
  <rect x="150" y="120" width="58" height="42" rx="8" fill="#173B67"/>
  <rect x="150" y="120" width="58" height="42" rx="8" fill="none" stroke="#FFFFFF" stroke-opacity="0.25" stroke-width="2"/>
  <text x="179" y="139" text-anchor="middle" font-family="Inter, sans-serif" font-size="14" font-weight="800" fill="#FFFFFF">24</text>
  <text x="179" y="154" text-anchor="middle" font-family="Inter, sans-serif" font-size="10" font-weight="700" fill="#7DD3FC">JAM</text>
</svg>
SVG;

/*
|--------------------------------------------------------------------------
| GAMBAR LAYANAN (mini-ilustrasi bergaya flat, satu per layanan)
| Kunci = nama layanan pada $featuredServices.
|--------------------------------------------------------------------------
*/
$layananArt = [
    'fa-broom' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><rect width="64" height="64" rx="14" fill="#ECFDF5"/><path d="M40 12 l10 10" stroke="#065F46" stroke-width="4" stroke-linecap="round"/><rect x="34" y="18" width="12" height="6" rx="3" fill="#059669" transform="rotate(45 40 21)"/><path d="M30 26 q-14 8 -16 22 q14 4 24 -6 z" fill="#10B981"/><path d="M14 48 q16 4 24 -6" stroke="#047857" stroke-width="2.5" fill="none"/><path d="M20 40 l3 8 M27 35 l3 10 M33 31 l2 11" stroke="#047857" stroke-width="2" stroke-linecap="round"/></svg>',

    'fa-spray-can-sparkles' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><rect width="64" height="64" rx="14" fill="#ECFDF5"/><rect x="26" y="26" width="16" height="26" rx="4" fill="#10B981"/><rect x="28" y="18" width="12" height="7" rx="2" fill="#059669"/><rect x="33" y="12" width="3" height="6" rx="1.5" fill="#065F46"/><circle cx="47" cy="18" r="2" fill="#34D399"/><circle cx="43" cy="12" r="1.6" fill="#6EE7B7"/><circle cx="52" cy="24" r="1.4" fill="#6EE7B7"/><path d="M20 40 l1.5 3.5 L25 45 l-3.5 1.5 L20 50 l-1.5 -3.5 L15 45 l3.5 -1.5 z" fill="#FBBF24"/></svg>',

    'fa-shower' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><rect width="64" height="64" rx="14" fill="#F0FDFA"/><path d="M20 14 v34" stroke="#0F766E" stroke-width="4" stroke-linecap="round"/><path d="M20 14 q16 0 16 12" stroke="#0F766E" stroke-width="4" fill="none" stroke-linecap="round"/><ellipse cx="40" cy="30" rx="12" ry="5" fill="#14B8A6"/><circle cx="34" cy="42" r="2.4" fill="#5EEAD4"/><circle cx="41" cy="46" r="2.4" fill="#5EEAD4"/><circle cx="48" cy="42" r="2.4" fill="#5EEAD4"/><circle cx="36" cy="52" r="1.8" fill="#99F6E4"/><circle cx="46" cy="52" r="1.8" fill="#99F6E4"/></svg>',

    'fa-sink' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><rect width="64" height="64" rx="14" fill="#ECFEFF"/><path d="M30 14 h14 a6 6 0 0 1 6 6 v4" stroke="#0E7490" stroke-width="4" fill="none" stroke-linecap="round"/><rect x="14" y="32" width="36" height="18" rx="6" fill="#06B6D4"/><path d="M22 32 q10 -12 20 0" fill="none" stroke="#0891B2" stroke-width="2.5"/><circle cx="32" cy="41" r="3" fill="#164E63"/><circle cx="30" cy="22" r="2" fill="#67E8F9"/><circle cx="24" cy="27" r="1.6" fill="#A5F3FC"/></svg>',

    'fa-boxes-packing' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><rect width="64" height="64" rx="14" fill="#EFF6FF"/><rect x="12" y="30" width="20" height="20" rx="3" fill="#3B82F6"/><rect x="12" y="30" width="20" height="6" rx="2" fill="#1D4ED8"/><rect x="34" y="24" width="18" height="26" rx="3" fill="#60A5FA"/><rect x="34" y="24" width="18" height="6" rx="2" fill="#2563EB"/><path d="M22 30 v20 M43 24 v26" stroke="#1E3A8A" stroke-width="1.5" opacity="0.35"/><path d="M16 22 l6 -6 l6 6" fill="none" stroke="#1D4ED8" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"/></svg>',

    'fa-dolly' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><rect width="64" height="64" rx="14" fill="#EFF6FF"/><rect x="18" y="18" width="26" height="22" rx="3" fill="#93C5FD"/><rect x="18" y="18" width="26" height="6" rx="2" fill="#2563EB"/><path d="M14 16 v30 h34" stroke="#1D4ED8" stroke-width="4" fill="none" stroke-linecap="round"/><circle cx="18" cy="50" r="5" fill="#1E40AF"/><circle cx="44" cy="50" r="5" fill="#1E40AF"/><circle cx="18" cy="50" r="1.8" fill="#DBEAFE"/><circle cx="44" cy="50" r="1.8" fill="#DBEAFE"/></svg>',

    'fa-motorcycle' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><rect width="64" height="64" rx="14" fill="#F0F9FF"/><circle cx="18" cy="44" r="9" fill="none" stroke="#0369A1" stroke-width="4"/><circle cx="48" cy="44" r="9" fill="none" stroke="#0369A1" stroke-width="4"/><path d="M18 44 l10 -14 h14 l6 14" stroke="#0EA5E9" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"/><path d="M28 30 l-6 -8 h10" stroke="#0EA5E9" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"/><rect x="30" y="20" width="14" height="10" rx="3" fill="#38BDF8"/></svg>',

    'fa-snowflake' => '<svg viewBox="0 0 64 64" xmlns="http://www.w3.org/2000/svg"><rect width="64" height="64" rx="14" fill="#F0F9FF"/><g stroke="#0EA5E9" stroke-width="3.5" stroke-linecap="round"><path d="M32 12 v40"/><path d="M15 22 l34 20"/><path d="M49 22 l-34 20"/></g><g stroke="#38BDF8" stroke-width="3" stroke-linecap="round"><path d="M32 20 l-6 -6 M32 20 l6 -6 M32 44 l-6 6 M32 44 l6 6"/></g><circle cx="32" cy="32" r="4" fill="#0284C7"/></svg>',
];

/*
|--------------------------------------------------------------------------
| Pemetaan ikon Font Awesome -> kunci ilustrasi di atas.
|--------------------------------------------------------------------------
*/
$iconToArt = [
    'fa-broom'             => 'fa-broom',
    'fa-spray-can-sparkles' => 'fa-spray-can-sparkles',
    'fa-shower'            => 'fa-shower',
    'fa-sink'              => 'fa-sink',
    'fa-boxes-packing'     => 'fa-boxes-packing',
    'fa-dolly'             => 'fa-dolly',
    'fa-motorcycle'        => 'fa-motorcycle',
    'fa-snowflake'         => 'fa-snowflake',
];

/*
|--------------------------------------------------------------------------
| FOTO LAYANAN (diunduh dari internet, disimpan di public/images/services).
| Kunci = ikon Font Awesome layanan.
|--------------------------------------------------------------------------
*/
$layananPhoto = [
    'fa-broom'              => 'images/services/full-clean.jpg',
    'fa-spray-can-sparkles' => 'images/services/sapu-pel.jpg',
    'fa-shower'             => 'images/services/kamar-mandi.jpg',
    'fa-sink'               => 'images/services/cuci-dapur.jpg',
    'fa-boxes-packing'      => 'images/services/pindahan.jpg',
    'fa-dolly'              => 'images/services/angkut-beban.jpg',
    'fa-motorcycle'         => 'images/services/antar-jemput.jpg',
    'fa-snowflake'          => 'images/services/cuci-ac.jpg',
];
@endphp

{{-- =========================================================
     TOP AREA (GRADIENT BLUR UNIFORM DENGAN HEADER DUAL-ROLE)
========================================================= --}}
@section('page-top')

<div class="customer-top-area">
    
    {{-- DECORATION CIRCLES --}}
    <div class="header-circle-one"></div>
    <div class="header-circle-two"></div>

    {{-- TOP NAVBAR --}}
    <header class="relative z-10 px-5 pt-4">
        <div class="flex items-center justify-between w-full">
            
            {{-- SISI KIRI: BURGER MENU + BRAND --}}
            <div class="flex items-center gap-2">
                <button 
                    type="button" 
                    onclick="openCustomerDrawer()" 
                    class="header-icon shrink-0" 
                    aria-label="Menu"
                    title="Menu Navigasi"
                >
                    <i class="fa-solid fa-bars text-[16px]"></i>
                </button>

                <h1 class="text-[17px] font-bold tracking-tight text-white leading-none">
                    SayaBantu<span class="text-white">.com</span>
                </h1>
            </div>

            {{-- SISI KANAN: SEARCH -> MASUK / AKUN --}}
            <div class="flex items-center gap-1.5">

                {{-- IKON SEARCH --}}
                <button
                    type="button"
                    onclick="toggleHeaderSearch()"
                    class="header-icon shrink-0"
                    aria-label="Pencarian"
                    title="Cari Layanan"
                >
                    <i class="fa-solid fa-magnifying-glass text-[14px]"></i>
                </button>

                {{-- TOMBOL MASUK (TAMU PUBLIK) --}}
                <button
                    type="button"
                    id="headerLoginBtn"
                    onclick="switchLoginRole('customer'); openModal('modalLoginCustomer');"
                    class="shrink-0 px-3 py-1.5 rounded-xl bg-white text-[#0E1D31] text-[10.5px] font-extrabold shadow-sm hover:bg-sky-100 transition-colors"
                    title="Masuk sebagai Customer atau Mitra"
                >
                    Masuk
                </button>

                {{-- PROFIL / AVATAR (TAMPIL SETELAH LOGIN) --}}
                <button
                    type="button"
                    id="headerAccountBtn"
                    onclick="handleAccountButtonClick()"
                    class="header-icon shrink-0 font-bold hidden"
                    aria-label="Profil Akun"
                    title="Akun Saya"
                >
                    <i class="fa-regular fa-user text-[14px]"></i>
                </button>

            </div>

        </div>

        {{-- EXPANDABLE SEARCH BAR --}}
        <div id="headerSearchDropdown" class="hidden mt-3 transition-all duration-300">
            <div class="relative flex items-center">
                <i class="fa-solid fa-magnifying-glass absolute left-3.5 text-slate-400 text-xs pointer-events-none"></i>
                <input 
                    type="text" 
                    id="searchSuruhanInput"
                    onkeyup="filterCategoryLive(this.value)"
                    placeholder="Ketik layanan: bersih, pindahan, belanja, ac, titip..." 
                    class="w-full bg-white text-slate-900 placeholder-slate-400 text-xs rounded-xl pl-9 pr-8 py-2.5 shadow-xl border border-white/20 focus:outline-none focus:ring-2 focus:ring-sky-400"
                >
                <button type="button" onclick="toggleHeaderSearch()" class="absolute right-2.5 text-slate-400 hover:text-slate-700 p-1 text-xs">
                    <i class="fa-solid fa-xmark"></i>
                </button>
            </div>
        </div>

    </header>

    {{-- GREETING AREA (DINAMIS 3 STATE: GUEST, CUSTOMER, MITRA) --}}
    <section class="relative z-10 px-5 pt-4 pb-2">
        
        {{-- 1. TAMPILAN TAMU PUBLIK (DEFAULT) + MASKOT --}}
        <div id="guestGreetingCard" class="flex items-center gap-3">
        <div class="space-y-1 flex-1 min-w-0">
            <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-white/10 border border-white/15 text-[9px] font-bold text-sky-200">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                Publik • Bebas Melihat Layanan & Personil Mitra
            </div>

            <h2 class="text-[19px] font-bold tracking-tight text-white leading-snug">
                Mau Dibantu Apa Hari Ini?
            </h2>

            <p class="text-[11px] text-white/70 leading-relaxed">
                Pilih layanan yang Anda butuhkan. Sistem cerdas SayaBantu akan <strong>otomatis menugaskan mitra terbaik</strong> di sekitar Anda tanpa repot memilih!
            </p>
        </div>

        {{-- MASKOT SAYABANTU (GAMBAR STATIS) --}}
        <div class="shrink-0 w-[118px] -mb-3" aria-hidden="true">
            <img src="{{ asset('images/maskot-sayabantu.jpg') }}" alt="Maskot SayaBantu" class="w-full h-auto rounded-2xl shadow-xl object-cover">
        </div>
        </div>

        {{-- 2. TAMPILAN CUSTOMER VIP (KETIKA LOGIN CUSTOMER) --}}
        <div id="vipGreetingCard" class="hidden space-y-1">
            <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-amber-500/20 border border-amber-400/30 text-[9px] font-bold text-amber-300">
                <i class="fa-solid fa-crown text-[8px]"></i>
                Member VIP Terverifikasi • #CUST-104
            </div>

            <h2 class="text-[19px] font-bold tracking-tight text-white leading-snug">
                Halo, <span id="vipUserNameText" class="text-sky-300">Budi Santoso</span>! 👋
            </h2>

            <p class="text-[11px] text-white/70 leading-relaxed">
                Prioritas penugasan mitra tercepat & kontak WhatsApp CS resmi aktif untuk akun Anda.
            </p>
        </div>

        {{-- 3. TAMPILAN MITRA (KETIKA LOGIN MITRA) --}}
        <div id="mitraGreetingCard" class="hidden space-y-1">
            <div class="inline-flex items-center gap-1.5 px-2.5 py-0.5 rounded-full bg-emerald-500/20 border border-emerald-400/30 text-[9px] font-bold text-emerald-300">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span>
                Bocah SayaBantu • #MTR-0042
            </div>

            <h2 class="text-[19px] font-bold tracking-tight text-white leading-snug">
                Halo Mitra, <span id="mitraGreetingName" class="text-emerald-300">Bambang</span>! 👷
            </h2>

            <p class="text-[11px] text-white/70 leading-relaxed">
                Status Anda: <strong>Online Siap Terima Job</strong>. Sistem akan otomatis mengarahkan tugas di area Anda.
            </p>
        </div>

    </section>

</div>

@endsection


{{-- =========================================================
     CONTENT AREA
========================================================= --}}
@section('content')

<main class="content-under-gradient px-4 pt-3 space-y-3.5">

    {{-- =====================================================
         0A. KHUSUS CUSTOMER VIP LOGIN (DOMPET & LIVE TRACKER)
    ====================================================== --}}
    <section id="vipWalletCard" class="hidden card-sb p-3.5 bg-gradient-to-br from-white to-sky-50/40 border border-sky-200/80 shadow-xs">
        <div class="flex items-center justify-between mb-2">
            <div class="flex items-center gap-2">
                <div class="w-7 h-7 rounded-lg bg-[#173B67] text-white flex items-center justify-center text-xs">
                    <i class="fa-solid fa-wallet"></i>
                </div>
                <div>
                    <span class="text-[10px] text-slate-500 block leading-none font-medium">SayaBantu Pay</span>
                    <strong class="text-xs font-bold text-slate-900">Rp 250.000</strong>
                </div>
            </div>
            <button type="button" onclick="showCustomerToast('Top Up', 'Fitur isi saldo via Virtual Account aktif', 'success')" class="px-2.5 py-1 rounded-lg bg-sky-500 hover:bg-sky-400 text-slate-950 font-bold text-[10px] shadow-xs">
                + Top Up
            </button>
        </div>
        <div class="pt-2 border-t border-slate-200/60 flex items-center justify-between text-[10px] text-slate-600">
            <span class="flex items-center gap-1">
                <i class="fa-solid fa-coins text-amber-500"></i> 120 Poin Loyalty
            </span>
            <span class="flex items-center gap-1 font-bold text-sky-700 bg-sky-100/70 px-2 py-0.5 rounded-full">
                <i class="fa-solid fa-ticket"></i> 2 Voucher Diskon Aktif
            </span>
        </div>
    </section>

    {{-- TRACKER SURUHAN CUSTOMER --}}
    <section id="vipActiveOrderCard" class="hidden card-sb p-3.5 bg-gradient-to-br from-slate-50 to-emerald-50/40 border-l-4 border-l-emerald-500 border-slate-200 shadow-xs">
        <div class="flex items-center justify-between mb-1.5">
            <span class="text-[9px] font-extrabold px-2 py-0.5 rounded-full bg-emerald-100 text-emerald-800 flex items-center gap-1">
                <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 animate-pulse"></span> Suruhan Sedang Diproses
            </span>
            <span class="text-[10px] font-bold text-slate-900">#SB-SURUH-9012</span>
        </div>
        <h4 class="text-xs font-bold text-slate-900">Full Home Cleaning (2 Kamar)</h4>
        <p class="text-[10px] text-slate-600 mt-0.5">
            Mitra Otomatis: <strong>Bambang Sutrisno</strong> (★ 4.9) • Sedang OTW ke alamat Anda
        </p>
        <div class="mt-2.5 flex items-center gap-2">
            <button type="button" onclick="openModal('modalLacakPesanan')" class="flex-1 py-1.5 bg-[#0E1D31] hover:bg-[#173B67] text-white font-bold text-[10px] rounded-lg text-center transition-colors">
                <i class="fa-solid fa-route mr-1"></i> Lacak Status
            </button>
            <button type="button" onclick="handleWaGatedClick()" class="py-1.5 px-3 bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-[10px] rounded-lg text-center transition-colors">
                <i class="fa-brands fa-whatsapp"></i> Chat Mitra
            </button>
        </div>
    </section>

    {{-- =====================================================
         0B. KHUSUS MITRA LOGIN (DASHBOARD KERJA MITRA)
    ====================================================== --}}
    <section id="mitraDashboardCard" class="hidden card-sb p-3.5 bg-gradient-to-br from-white to-emerald-50/50 border border-emerald-300 shadow-xs space-y-2.5">
        <div class="flex items-center justify-between">
            <div class="flex items-center gap-2">
                <div class="w-8 h-8 rounded-xl bg-emerald-600 text-white flex items-center justify-center font-bold text-sm">
                    <i class="fa-solid fa-helmet-safety"></i>
                </div>
                <div>
                    <span class="text-[9px] text-emerald-800 font-bold uppercase tracking-wider block">Panel Bocah SayaBantu</span>
                    <strong class="text-xs font-bold text-slate-900">Penghasilan Hari Ini: Rp 450.000</strong>
                </div>
            </div>
            <span class="text-[9px] bg-emerald-100 text-emerald-800 font-bold px-2 py-0.5 rounded-full">
                ● Siap Tugas
            </span>
        </div>
        <div class="p-2.5 bg-slate-50 rounded-xl border border-slate-200/80 flex items-center justify-between text-[10px]">
            <div>
                <span class="text-slate-500">Tugas Selesai: <strong>4 Job</strong></span>
                <span class="mx-1">•</span>
                <span class="text-slate-500">Rating: <strong class="text-amber-600">★ 4.9</strong></span>
            </div>
            <button type="button" onclick="handleWaGatedClick()" class="font-bold text-emerald-700 hover:underline flex items-center gap-1">
                <i class="fa-brands fa-whatsapp text-xs"></i> Dispatcher WA
            </button>
        </div>
    </section>


@php
/*
| Komponen ringkas katalog layanan untuk BERANDA.
| Hanya menampilkan 8 layanan unggulan. Sisanya ada di halaman /layanan.
*/

$featuredServices = [
    ['name' => 'Full Home Cleaning', 'label' => 'Full Clean', 'icon' => 'fa-broom', 'color' => 'emerald', 'budget' => '85.000',
     'desc' => 'Pembersihan rumah menyeluruh meliputi kamar, ruang tamu, lantai dan debu.'],
    ['name' => 'Basic Daily Cleaning', 'label' => 'Sapu & Pel', 'icon' => 'fa-spray-can-sparkles', 'color' => 'emerald', 'budget' => '50.000',
     'desc' => 'Sapu, pel lantai rutin, dan lap meja/kaca.'],
    ['name' => 'Bersihkan Kamar Mandi', 'label' => 'Kamar Mandi', 'icon' => 'fa-shower', 'color' => 'teal', 'budget' => '65.000',
     'desc' => 'Kuras bak, sikat kerak lantai kamar mandi & kloset kinclong.'],
    ['name' => 'Cuci Piring & Dapur Bersih', 'label' => 'Cuci Dapur', 'icon' => 'fa-sink', 'color' => 'cyan', 'budget' => '45.000',
     'desc' => 'Bantu cuci piring tumpuk, bersihkan kompor & wastafel.'],
    ['name' => 'Pindahan', 'label' => 'Pindahan', 'icon' => 'fa-boxes-packing', 'color' => 'blue', 'budget' => '150.000',
     'desc' => 'Bantu packing, angkat barang pindahan kos/rumah ke kendaraan.'],
    ['name' => 'Angkut Barang', 'label' => 'Angkut Beban', 'icon' => 'fa-dolly', 'color' => 'blue', 'budget' => '80.000',
     'desc' => 'Angkat lemari, kulkas, kasur, atau tata ulang perabotan.'],
    ['name' => 'Antar / Jemput', 'label' => 'Antar Jemput', 'icon' => 'fa-motorcycle', 'color' => 'sky', 'budget' => '50.000',
     'desc' => 'Antar barang, dokumen penting, atau ambil laundry kilat.'],
    ['name' => 'Servis & Cuci AC', 'label' => 'Cuci AC', 'icon' => 'fa-snowflake', 'color' => 'sky', 'budget' => '75.000',
     'desc' => 'Cuci AC split rumah, isi freon, atau cek kebocoran air.'],
];

$featuredColors = [
    'emerald' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
    'teal' => 'bg-teal-50 text-teal-600 border-teal-100',
    'cyan' => 'bg-cyan-50 text-cyan-600 border-cyan-100',
    'blue' => 'bg-blue-50 text-blue-600 border-blue-100',
    'sky' => 'bg-sky-50 text-sky-600 border-sky-100',
];
@endphp

<section id="layananKatalogSection" class="card-sb p-3.5 space-y-3">
    <div class="flex items-center justify-between px-1">
        <div>
            <h3 class="text-xs font-bold text-[#0E1D31] flex items-center gap-1.5">
                <i class="fa-solid fa-list-check text-[#173B67]"></i> Layanan Populer
            </h3>
            <p class="text-[9px] text-slate-400">8 layanan paling sering dipesan</p>
        </div>
        <a href="{{ route('customer.layanan') }}" class="text-[9px] text-[#173B67] font-bold bg-blue-50 px-2.5 py-1 rounded-full border border-blue-100 hover:bg-blue-100 transition-colors">
            Lihat Semua »
        </a>
    </div>

    {{-- GRID 8 LAYANAN UNGGULAN --}}
    <div class="grid grid-cols-4 gap-2 text-center pt-1 items-stretch">
        @foreach($featuredServices as $svc)
            <button
                type="button"
                onclick="selectServiceToForm({{ Js::from($svc['name']) }}, {{ Js::from($svc['desc']) }}, {{ Js::from($svc['budget']) }})"
                class="flex flex-col items-center justify-start group active:scale-95 transition-transform h-full"
            >
                <div class="w-16 h-16 rounded-xl border border-slate-200 overflow-hidden shadow-xs group-hover:scale-105 group-hover:border-[#173B67] group-hover:shadow-md transition-all flex items-center justify-center bg-slate-100">
                    @if(isset($layananPhoto[$svc['icon']]))
                        <img src="{{ asset($layananPhoto[$svc['icon']]) }}" alt="{{ $svc['name'] }}" loading="lazy" class="w-full h-full object-cover">
                    @elseif(isset($layananArt[$svc['icon']]))
                        <span class="block w-full h-full [&>svg]:w-full [&>svg]:h-full">{!! $layananArt[$svc['icon']] !!}</span>
                    @else
                        <span class="flex items-center justify-center w-full h-full text-lg {{ $featuredColors[$svc['color']] }}">
                            <i class="fa-solid {{ $svc['icon'] }}"></i>
                        </span>
                    @endif
                </div>
                <span class="text-[9.5px] font-semibold text-slate-700 mt-1 line-clamp-1">{{ $svc['label'] }}</span>
            </button>
        @endforeach
    </div>

    {{-- CTA KE HALAMAN SEMUA LAYANAN --}}
    <a
        href="{{ route('customer.layanan') }}"
        class="flex items-center justify-center gap-2 w-full py-2.5 rounded-xl bg-slate-100 hover:bg-slate-200 text-[#0E1D31] text-[11px] font-bold transition-colors"
    >
        <i class="fa-solid fa-grip"></i> Lihat Semua 16 Layanan &amp; Jasa
    </a>
</section>


    {{-- =====================================================
         2. BOCAH SAYABANTU (MITRA DENGAN FOTO PERSIS SANTOSURUH)
         (Sistem yang menugaskan otomatis, bukan dipilih manual!)
    ====================================================== --}}
    <section id="mitraSection" class="hidden card-sb p-3.5 space-y-3">
        
        <div class="flex items-center justify-between px-1">
            <div>
                <div class="flex items-center gap-1.5">
                    <span class="w-2 h-2 rounded-full bg-emerald-500 animate-pulse"></span>
                    <h3 class="text-xs font-bold text-[#0E1D31]">Bocah SayaBantu (Mitra Siap Kerja)</h3>
                </div>
                <p class="text-[9px] text-slate-400">Personil terlatih, ber-SKCK & standby di Jabodetabek</p>
            </div>
            <span class="text-[9px] font-extrabold text-emerald-800 bg-emerald-100 px-2 py-0.5 rounded-full">
                10+ Siap Tugas
            </span>
        </div>

        {{-- BANNER NOTICE: MITRA DITUGASKAN OTOMATIS OLEH SISTEM --}}
        <div class="p-2.5 rounded-xl bg-blue-50/80 border border-blue-200/80 flex items-start gap-2 text-[10.5px]">
            <i class="fa-solid fa-wand-magic-sparkles text-sky-600 mt-0.5 shrink-0"></i>
            <p class="text-slate-700 leading-snug">
                <strong>Penugasan Otomatis:</strong> Anda tidak perlu repot memilih mitra. Saat Anda membuat suruhan, sistem cerdas kami akan <strong>otomatis memilihkan mitra terdekat dengan rating terbaik</strong>!
            </p>
        </div>

        {{-- FILTER WILAYAH --}}
        <div class="flex items-center gap-1.5 overflow-x-auto pb-1 text-[9.5px]">
            <button type="button" onclick="filterBocahRegion('all', this)" class="btn-region-chip px-2.5 py-1 rounded-full font-bold bg-[#0E1D31] text-white shrink-0 transition-all">
                Semua Wilayah
            </button>
            <button type="button" onclick="filterBocahRegion('jaksel', this)" class="btn-region-chip px-2.5 py-1 rounded-full font-medium bg-slate-100 text-slate-700 shrink-0 hover:bg-slate-200 transition-all">
                Jakarta Pusat & Selatan
            </button>
            <button type="button" onclick="filterBocahRegion('depok', this)" class="btn-region-chip px-2.5 py-1 rounded-full font-medium bg-slate-100 text-slate-700 shrink-0 hover:bg-slate-200 transition-all">
                Depok & Bogor
            </button>
            <button type="button" onclick="filterBocahRegion('bekasi', this)" class="btn-region-chip px-2.5 py-1 rounded-full font-medium bg-slate-100 text-slate-700 shrink-0 hover:bg-slate-200 transition-all">
                Bekasi & Tangerang
            </button>
        </div>

        {{-- DAFTAR ORANG-ORANG NYA BESERTA FOTO (ALA SANTOSURUH) --}}
        <div class="space-y-2.5" id="bocahListContainer">
            
            {{-- MITRA 1: Adam Julian --}}
            <div class="bocah-card-item p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-start gap-3 hover:border-sky-300 transition-all" data-region="jaksel">
                <div class="relative shrink-0">
                    <img 
                        src="https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&auto=format&fit=crop&q=80" 
                        alt="Adam Julian"
                        class="w-12 h-12 rounded-xl object-cover border border-white shadow-xs"
                        onerror="this.src='https://ui-avatars.com/api/?name=Adam+Julian&background=173B67&color=fff'"
                    >
                    <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 rounded-full bg-emerald-500 border-2 border-white" title="Online Standby"></span>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between">
                        <h4 class="text-xs font-bold text-slate-900 truncate">Adam Julian Tjiu</h4>
                        <span class="text-[10px] text-amber-500 font-bold flex items-center gap-0.5">
                            ★ 4.9 <span class="text-slate-400 font-normal text-[9px]">(164)</span>
                        </span>
                    </div>
                    <span class="text-[9px] text-sky-700 font-semibold block">Spesialis: Full Home Cleaning & Servis AC</span>
                    <div class="flex items-center gap-2 text-[9px] text-slate-500 mt-1">
                        <span><i class="fa-solid fa-location-dot text-rose-500"></i> Jakarta Pusat (Menteng)</span>
                        <span>•</span>
                        <span class="text-emerald-700 font-medium"><i class="fa-solid fa-shield-check"></i> KTP & SKCK</span>
                    </div>
                </div>
                <button type="button" onclick="openBocahModal('Adam Julian Tjiu', 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&auto=format&fit=crop&q=80', 'Full Home Cleaning & Cuci AC', '★ 4.9 (164 Tugas)', 'Jakarta Pusat')" class="shrink-0 px-2.5 py-1.5 rounded-lg bg-slate-200 hover:bg-slate-300 text-slate-800 text-[9.5px] font-bold self-center transition-colors">
                    Profil
                </button>
            </div>

            {{-- MITRA 2: Bambang Sutrisno --}}
            <div class="bocah-card-item p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-start gap-3 hover:border-sky-300 transition-all" data-region="jaksel">
                <div class="relative shrink-0">
                    <img 
                        src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&auto=format&fit=crop&q=80" 
                        alt="Bambang Sutrisno"
                        class="w-12 h-12 rounded-xl object-cover border border-white shadow-xs"
                        onerror="this.src='https://ui-avatars.com/api/?name=Bambang+Sutrisno&background=173B67&color=fff'"
                    >
                    <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 rounded-full bg-emerald-500 border-2 border-white" title="Online Standby"></span>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between">
                        <h4 class="text-xs font-bold text-slate-900 truncate">Bambang Sutrisno</h4>
                        <span class="text-[10px] text-amber-500 font-bold flex items-center gap-0.5">
                            ★ 4.9 <span class="text-slate-400 font-normal text-[9px]">(142)</span>
                        </span>
                    </div>
                    <span class="text-[9px] text-sky-700 font-semibold block">Spesialis: Pindahan, Angkut Beban & Logistik</span>
                    <div class="flex items-center gap-2 text-[9px] text-slate-500 mt-1">
                        <span><i class="fa-solid fa-location-dot text-rose-500"></i> Jakarta Selatan (Tebet)</span>
                        <span>•</span>
                        <span class="text-emerald-700 font-medium"><i class="fa-solid fa-shield-check"></i> KTP & SKCK</span>
                    </div>
                </div>
                <button type="button" onclick="openBocahModal('Bambang Sutrisno', 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&auto=format&fit=crop&q=80', 'Pindahan Kos & Angkut Beban', '★ 4.9 (142 Tugas)', 'Jakarta Selatan')" class="shrink-0 px-2.5 py-1.5 rounded-lg bg-slate-200 hover:bg-slate-300 text-slate-800 text-[9.5px] font-bold self-center transition-colors">
                    Profil
                </button>
            </div>

            {{-- MITRA 3: Siti Rahmawati --}}
            <div class="bocah-card-item p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-start gap-3 hover:border-sky-300 transition-all" data-region="depok">
                <div class="relative shrink-0">
                    <img 
                        src="https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=150&auto=format&fit=crop&q=80" 
                        alt="Siti Rahmawati"
                        class="w-12 h-12 rounded-xl object-cover border border-white shadow-xs"
                        onerror="this.src='https://ui-avatars.com/api/?name=Siti+Rahmawati&background=173B67&color=fff'"
                    >
                    <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 rounded-full bg-emerald-500 border-2 border-white" title="Online Standby"></span>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between">
                        <h4 class="text-xs font-bold text-slate-900 truncate">Siti Rahmawati</h4>
                        <span class="text-[10px] text-amber-500 font-bold flex items-center gap-0.5">
                            ★ 5.0 <span class="text-slate-400 font-normal text-[9px]">(87)</span>
                        </span>
                    </div>
                    <span class="text-[9px] text-amber-700 font-semibold block">Spesialis: Belanja Pasar Subuh & Titip Antre RS</span>
                    <div class="flex items-center gap-2 text-[9px] text-slate-500 mt-1">
                        <span><i class="fa-solid fa-location-dot text-rose-500"></i> Depok (Margonda)</span>
                        <span>•</span>
                        <span class="text-emerald-700 font-medium"><i class="fa-solid fa-shield-check"></i> KTP & SKCK</span>
                    </div>
                </div>
                <button type="button" onclick="openBocahModal('Siti Rahmawati', 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=150&auto=format&fit=crop&q=80', 'Belanja Pasar & Titip Antre', '★ 5.0 (87 Tugas)', 'Depok')" class="shrink-0 px-2.5 py-1.5 rounded-lg bg-slate-200 hover:bg-slate-300 text-slate-800 text-[9.5px] font-bold self-center transition-colors">
                    Profil
                </button>
            </div>

            {{-- MITRA 4: Abdul Rojak --}}
            <div class="bocah-card-item p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-start gap-3 hover:border-sky-300 transition-all" data-region="bekasi">
                <div class="relative shrink-0">
                    <img 
                        src="https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=150&auto=format&fit=crop&q=80" 
                        alt="Abdul Rojak"
                        class="w-12 h-12 rounded-xl object-cover border border-white shadow-xs"
                        onerror="this.src='https://ui-avatars.com/api/?name=Abdul+Rojak&background=173B67&color=fff'"
                    >
                    <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 rounded-full bg-emerald-500 border-2 border-white" title="Online Standby"></span>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between">
                        <h4 class="text-xs font-bold text-slate-900 truncate">Abdul Rojak</h4>
                        <span class="text-[10px] text-amber-500 font-bold flex items-center gap-0.5">
                            ★ 4.8 <span class="text-slate-400 font-normal text-[9px]">(175)</span>
                        </span>
                    </div>
                    <span class="text-[9px] text-sky-700 font-semibold block">Spesialis: Driver Antar Jemput & Pindahan</span>
                    <div class="flex items-center gap-2 text-[9px] text-slate-500 mt-1">
                        <span><i class="fa-solid fa-location-dot text-rose-500"></i> Bekasi Barat</span>
                        <span>•</span>
                        <span class="text-emerald-700 font-medium"><i class="fa-solid fa-shield-check"></i> SIM, KTP & SKCK</span>
                    </div>
                </div>
                <button type="button" onclick="openBocahModal('Abdul Rojak', 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=150&auto=format&fit=crop&q=80', 'Driver Antar Jemput & Pindahan', '★ 4.8 (175 Tugas)', 'Bekasi')" class="shrink-0 px-2.5 py-1.5 rounded-lg bg-slate-200 hover:bg-slate-300 text-slate-800 text-[9.5px] font-bold self-center transition-colors">
                    Profil
                </button>
            </div>

            {{-- MITRA 5: Nesya Putri --}}
            <div class="bocah-card-item p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-start gap-3 hover:border-sky-300 transition-all" data-region="depok">
                <div class="relative shrink-0">
                    <img 
                        src="https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80" 
                        alt="Nesya Putri"
                        class="w-12 h-12 rounded-xl object-cover border border-white shadow-xs"
                        onerror="this.src='https://ui-avatars.com/api/?name=Nesya+Putri&background=173B67&color=fff'"
                    >
                    <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 rounded-full bg-emerald-500 border-2 border-white" title="Online Standby"></span>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between">
                        <h4 class="text-xs font-bold text-slate-900 truncate">Nesya Putri</h4>
                        <span class="text-[10px] text-amber-500 font-bold flex items-center gap-0.5">
                            ★ 5.0 <span class="text-slate-400 font-normal text-[9px]">(112)</span>
                        </span>
                    </div>
                    <span class="text-[9px] text-pink-700 font-semibold block">Spesialis: Rawat Hewan Peliharaan & Daily Cleaning</span>
                    <div class="flex items-center gap-2 text-[9px] text-slate-500 mt-1">
                        <span><i class="fa-solid fa-location-dot text-rose-500"></i> Depok (Kelapa Dua)</span>
                        <span>•</span>
                        <span class="text-emerald-700 font-medium"><i class="fa-solid fa-shield-check"></i> KTP & SKCK</span>
                    </div>
                </div>
                <button type="button" onclick="openBocahModal('Nesya Putri', 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80', 'Rawat Hewan & Daily Cleaning', '★ 5.0 (112 Tugas)', 'Depok')" class="shrink-0 px-2.5 py-1.5 rounded-lg bg-slate-200 hover:bg-slate-300 text-slate-800 text-[9.5px] font-bold self-center transition-colors">
                    Profil
                </button>
            </div>

            {{-- MITRA 6: Fajar Ramadhani --}}
            <div class="bocah-card-item p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-start gap-3 hover:border-sky-300 transition-all" data-region="bekasi">
                <div class="relative shrink-0">
                    <img 
                        src="https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?w=150&auto=format&fit=crop&q=80" 
                        alt="Fajar Ramadhani"
                        class="w-12 h-12 rounded-xl object-cover border border-white shadow-xs"
                        onerror="this.src='https://ui-avatars.com/api/?name=Fajar+Ramadhani&background=173B67&color=fff'"
                    >
                    <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 rounded-full bg-emerald-500 border-2 border-white" title="Online Standby"></span>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between">
                        <h4 class="text-xs font-bold text-slate-900 truncate">Fajar Ramadhani</h4>
                        <span class="text-[10px] text-amber-500 font-bold flex items-center gap-0.5">
                            ★ 4.9 <span class="text-slate-400 font-normal text-[9px]">(130)</span>
                        </span>
                    </div>
                    <span class="text-[9px] text-sky-700 font-semibold block">Spesialis: Kurir Cepat, Antar Dokumen & Belanja</span>
                    <div class="flex items-center gap-2 text-[9px] text-slate-500 mt-1">
                        <span><i class="fa-solid fa-location-dot text-rose-500"></i> Bekasi Timur</span>
                        <span>•</span>
                        <span class="text-emerald-700 font-medium"><i class="fa-solid fa-shield-check"></i> SIM & SKCK</span>
                    </div>
                </div>
                <button type="button" onclick="openBocahModal('Fajar Ramadhani', 'https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?w=150&auto=format&fit=crop&q=80', 'Kurir Cepat & Belanja', '★ 4.9 (130 Tugas)', 'Bekasi')" class="shrink-0 px-2.5 py-1.5 rounded-lg bg-slate-200 hover:bg-slate-300 text-slate-800 text-[9.5px] font-bold self-center transition-colors">
                    Profil
                </button>
            </div>

            {{-- MITRA 7: Achmad Akbar --}}
            <div class="bocah-card-item p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-start gap-3 hover:border-sky-300 transition-all" data-region="jaksel">
                <div class="relative shrink-0">
                    <img 
                        src="https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=150&auto=format&fit=crop&q=80" 
                        alt="Achmad Akbar"
                        class="w-12 h-12 rounded-xl object-cover border border-white shadow-xs"
                        onerror="this.src='https://ui-avatars.com/api/?name=Achmad+Akbar&background=173B67&color=fff'"
                    >
                    <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 rounded-full bg-emerald-500 border-2 border-white" title="Online Standby"></span>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between">
                        <h4 class="text-xs font-bold text-slate-900 truncate">Achmad Akbar</h4>
                        <span class="text-[10px] text-amber-500 font-bold flex items-center gap-0.5">
                            ★ 4.8 <span class="text-slate-400 font-normal text-[9px]">(95)</span>
                        </span>
                    </div>
                    <span class="text-[9px] text-indigo-700 font-semibold block">Spesialis: Tukang Ledeng Bocor & Perbaikan Rumah</span>
                    <div class="flex items-center gap-2 text-[9px] text-slate-500 mt-1">
                        <span><i class="fa-solid fa-location-dot text-rose-500"></i> Jakarta Timur</span>
                        <span>•</span>
                        <span class="text-emerald-700 font-medium"><i class="fa-solid fa-shield-check"></i> KTP & SKCK</span>
                    </div>
                </div>
                <button type="button" onclick="openBocahModal('Achmad Akbar', 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=150&auto=format&fit=crop&q=80', 'Tukang Ledeng & Perbaikan Rumah', '★ 4.8 (95 Tugas)', 'Jakarta Timur')" class="shrink-0 px-2.5 py-1.5 rounded-lg bg-slate-200 hover:bg-slate-300 text-slate-800 text-[9.5px] font-bold self-center transition-colors">
                    Profil
                </button>
            </div>

            {{-- MITRA 8: Dio Alfianto --}}
            <div class="bocah-card-item p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-start gap-3 hover:border-sky-300 transition-all" data-region="bekasi">
                <div class="relative shrink-0">
                    <img 
                        src="https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?w=150&auto=format&fit=crop&q=80" 
                        alt="Dio Alfianto"
                        class="w-12 h-12 rounded-xl object-cover border border-white shadow-xs"
                        onerror="this.src='https://ui-avatars.com/api/?name=Dio+Alfianto&background=173B67&color=fff'"
                    >
                    <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 rounded-full bg-emerald-500 border-2 border-white" title="Online Standby"></span>
                </div>
                <div class="flex-1 min-w-0">
                    <div class="flex items-center justify-between">
                        <h4 class="text-xs font-bold text-slate-900 truncate">Dio Alfianto</h4>
                        <span class="text-[10px] text-amber-500 font-bold flex items-center gap-0.5">
                            ★ 4.9 <span class="text-slate-400 font-normal text-[9px]">(120)</span>
                        </span>
                    </div>
                    <span class="text-[9px] text-orange-700 font-semibold block">Spesialis: Nemenin Olahraga & SPY Pantau Lapangan</span>
                    <div class="flex items-center gap-2 text-[9px] text-slate-500 mt-1">
                        <span><i class="fa-solid fa-location-dot text-rose-500"></i> Tangerang Selatan</span>
                        <span>•</span>
                        <span class="text-emerald-700 font-medium"><i class="fa-solid fa-shield-check"></i> KTP & SKCK</span>
                    </div>
                </div>
                <button type="button" onclick="openBocahModal('Dio Alfianto', 'https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?w=150&auto=format&fit=crop&q=80', 'Nemenin Olahraga & Pantau Lapangan', '★ 4.9 (120 Tugas)', 'Tangerang')" class="shrink-0 px-2.5 py-1.5 rounded-lg bg-slate-200 hover:bg-slate-300 text-slate-800 text-[9.5px] font-bold self-center transition-colors">
                    Profil
                </button>
            </div>

        </div>

    </section>


    {{-- =====================================================
         3. FORMULIR INTERAKTIF: BUAT SURUHAN
         (Dengan Penugasan Otomatis Sistem - Bukan Pilih Manual!)
    ====================================================== --}}
    <section id="orderFormCard" class="card-sb p-4 border-2 border-slate-200/90 shadow-sm">
        
        <div class="flex items-center justify-between border-b border-slate-100 pb-2.5 mb-3">
            <div>
                <h3 class="text-sm font-bold text-[#0E1D31] flex items-center gap-1.5">
                    <i class="fa-solid fa-pen-to-square text-[#173B67]"></i> Buat Suruhan Baru
                </h3>
                <p class="text-[10px] text-slate-400">Jam operasional penugasan mitra 07:00 - 24:00 WIB</p>
            </div>
            <span class="text-[9px] font-bold px-2 py-0.5 rounded-full bg-emerald-50 text-emerald-700 border border-emerald-200">
                Online
            </span>
        </div>

        {{-- INFO PENUGASAN OTOMATIS SISTEM --}}
        <div class="mb-3 p-2.5 rounded-xl bg-gradient-to-r from-sky-50 to-blue-50 border border-sky-200 flex items-start gap-2 text-xs">
            <i class="fa-solid fa-wand-magic-sparkles text-sky-600 mt-0.5 shrink-0"></i>
            <div>
                <strong class="text-[11px] font-bold text-[#0E1D31] block">Penugasan Otomatis oleh Sistem</strong>
                <p class="text-[10px] text-slate-600 leading-snug">
                    Begitu suruhan diajukan, sistem cerdas SayaBantu akan otomatis mencocokkan mitra terdekat dengan rating terbaik untuk Anda.
                </p>
            </div>
        </div>

        {{-- BADGE MEMBER VIP JIKA SUDAH LOGIN --}}
        <div id="vipBadgeForm" class="hidden mb-3 p-2 rounded-xl bg-amber-50 border border-amber-200 flex items-center justify-between text-xs">
            <span class="text-[10px] font-bold text-amber-800 flex items-center gap-1">
                <i class="fa-solid fa-crown text-amber-500"></i> Akun Member VIP Terhubung
            </span>
            <span class="text-[9px] font-extrabold text-emerald-700 bg-emerald-100 px-2 py-0.5 rounded-full">
                Diskon 10% Aktif
            </span>
        </div>

        <form id="publicSuruhanForm" onsubmit="handleSuruhanSubmit(event)" class="space-y-3 text-xs">
            
            {{-- TANGGAL --}}
            <div>
                <label class="block text-[10px] font-bold text-slate-600 mb-1">Pilih Tanggal</label>
                <div class="grid grid-cols-3 gap-1.5 mb-1.5">
                    <button type="button" onclick="setDatePreset('today', this)" class="btn-date-chip py-1.5 rounded-lg bg-[#0E1D31] text-white font-bold text-[10px] text-center transition-all">
                        Hari Ini
                    </button>
                    <button type="button" onclick="setDatePreset('tomorrow', this)" class="btn-date-chip py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-[10px] text-center transition-all">
                        Besok
                    </button>
                    <button type="button" onclick="setDatePreset('custom', this)" class="btn-date-chip py-1.5 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-700 font-semibold text-[10px] text-center transition-all">
                        Pilih Tgl
                    </button>
                </div>
                <input 
                    type="date" 
                    id="formTanggal" 
                    class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 focus:ring-2 focus:ring-[#173B67] focus:outline-none"
                    value="{{ date('Y-m-d') }}"
                    required
                >
            </div>

            {{-- JAM & MENIT --}}
            <div class="grid grid-cols-2 gap-2">
                <div>
                    <label class="block text-[10px] font-bold text-slate-600 mb-1">Jam</label>
                    <select id="formJam" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 focus:ring-2 focus:ring-[#173B67] focus:outline-none" required>
                        @for($j = 7; $j <= 23; $j++)
                            @php $jamStr = sprintf('%02d', $j); @endphp
                            <option value="{{ $jamStr }}" {{ $j == 14 ? 'selected' : '' }}>{{ $jamStr }}:00</option>
                        @endfor
                    </select>
                </div>

                <div>
                    <label class="block text-[10px] font-bold text-slate-600 mb-1">Menit</label>
                    <select id="formMenit" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 focus:ring-2 focus:ring-[#173B67] focus:outline-none" required>
                        <option value="00">00 Menit</option>
                        <option value="15">15 Menit</option>
                        <option value="30" selected>30 Menit</option>
                        <option value="45">45 Menit</option>
                    </select>
                </div>
            </div>

            {{-- LAYANAN JASA (16 LENGKAP) --}}
            <div>
                <label class="block text-[10px] font-bold text-slate-600 mb-1">Layanan Jasa Yang Diperlukan</label>
                <select id="formLayanan" class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 focus:ring-2 focus:ring-[#173B67] focus:outline-none" required>
                    <option value="" disabled selected>Pilih layanan jasa...</option>
                    <option value="Full Home Cleaning">Full Home Cleaning (Pembersihan Menyeluruh)</option>
                    <option value="Basic Daily Cleaning">Basic Daily Cleaning (Sapu & Pel Rutin)</option>
                    <option value="Bersihkan Kamar Mandi">Bersihkan Kamar Mandi & Kloset</option>
                    <option value="Cuci Piring & Dapur Bersih">Cuci Piring & Dapur Bersih</option>
                    <option value="Pindahan">Pindahan Kos & Rumah</option>
                    <option value="Angkut Barang">Angkut Barang / Angkat Beban Berat</option>
                    <option value="Buang Sampah">Buang Sampah / Puing Bangunan</option>
                    <option value="Antar / Jemput">Antar / Jemput Barang atau Orang</option>
                    <option value="SanSu Food">SanSu Food (Belanja Pasar / Makanan)</option>
                    <option value="Titip Antre RS & Faskes">Titip Antre RS, Faskes & Tiket</option>
                    <option value="Servis & Cuci AC">Servis & Cuci AC Rutin</option>
                    <option value="Tukang Listrik & Ledeng">Tukang Listrik & Ledeng Bocor</option>
                    <option value="Membersihkan Kandang / Kotoran Hewan">Membersihkan Kandang / Kotoran Hewan</option>
                    <option value="Mengubur Bangkai Hewan">Mengubur Bangkai Hewan</option>
                    <option value="Nemenin Olahraga">Nemenin Olahraga (Jogging / Gym)</option>
                    <option value="SPY / Mata - Mata">SPY / Pantau Lokasi & Cek Keberadaan</option>
                    <option value="JASA LAINNYA">JASA LAINNYA (Tugas Kustom Bebas)</option>
                </select>
            </div>

            {{-- ALAMAT & PATOKAN --}}
            <div>
                <label class="block text-[10px] font-bold text-slate-600 mb-1">Alamat Lengkap & Patokan</label>
                <textarea id="formAlamat" rows="2" placeholder="Jl. Sudirman No. 12, patokan dekat halte busway..." class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 focus:ring-2 focus:ring-[#173B67] focus:outline-none" required></textarea>
            </div>

            {{-- CATATAN KETERANGAN --}}
            <div>
                <label class="block text-[10px] font-bold text-slate-600 mb-1">Keterangan / Detail Pekerjaan</label>
                <textarea id="formNote" rows="2" placeholder="Jelaskan detail instruksi suruhan Anda..." class="w-full px-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs text-slate-800 focus:ring-2 focus:ring-[#173B67] focus:outline-none" required></textarea>
            </div>

            {{-- BUDGET & NEGO --}}
            <div>
                <label class="block text-[10px] font-bold text-slate-600 mb-1">Penawaran Biaya / Budget</label>
                <div class="grid grid-cols-12 gap-2">
                    <div class="col-span-4">
                        <select id="formNego" class="w-full px-2.5 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-semibold text-slate-800 focus:ring-2 focus:ring-[#173B67] focus:outline-none">
                            <option value="Nego">Bisa Nego</option>
                            <option value="Pas">Harga Pas</option>
                        </select>
                    </div>
                    <div class="col-span-8">
                        <div class="relative flex items-center">
                            <span class="absolute left-3 text-[11px] font-bold text-slate-400">Rp</span>
                            <input 
                                type="text" 
                                id="formBudget" 
                                onkeyup="formatRupiahSimple(this)" 
                                placeholder="100.000" 
                                class="w-full pl-9 pr-3 py-2 bg-slate-50 border border-slate-200 rounded-xl text-xs font-bold text-slate-900 focus:ring-2 focus:ring-[#173B67] focus:outline-none" 
                                required
                            >
                        </div>
                    </div>
                </div>
            </div>

            {{-- GENDER PREFERENCE MITRA --}}
            <div>
                <label class="block text-[10px] font-bold text-slate-600 mb-1">Preferensi Gender Mitra</label>
                <div class="grid grid-cols-3 gap-2">
                    <label class="cursor-pointer">
                        <input type="radio" name="formGender" value="Bebas" class="peer sr-only" checked>
                        <div class="py-2 rounded-xl border border-slate-200 text-center font-bold text-slate-600 peer-checked:border-[#173B67] peer-checked:bg-blue-50/60 peer-checked:text-[#173B67] transition-all">
                            Bebas
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="formGender" value="Pria" class="peer sr-only">
                        <div class="py-2 rounded-xl border border-slate-200 text-center font-bold text-slate-600 peer-checked:border-[#173B67] peer-checked:bg-blue-50/60 peer-checked:text-[#173B67] transition-all">
                            Pria
                        </div>
                    </label>
                    <label class="cursor-pointer">
                        <input type="radio" name="formGender" value="Wanita" class="peer sr-only">
                        <div class="py-2 rounded-xl border border-slate-200 text-center font-bold text-slate-600 peer-checked:border-[#173B67] peer-checked:bg-blue-50/60 peer-checked:text-[#173B67] transition-all">
                            Wanita
                        </div>
                    </label>
                </div>
            </div>

            {{-- SYARAT & KETENTUAN --}}
            <div class="pt-1 flex items-start gap-2">
                <input type="checkbox" id="checkTerms" onchange="toggleFormSubmit(this.checked)" class="w-4 h-4 mt-0.5 rounded text-[#173B67] focus:ring-[#173B67] border-slate-300">
                <label for="checkTerms" class="text-[10px] text-slate-600 leading-tight">
                    Saya menyetujui ketentuan dan penugasan mitra otomatis SayaBantu.com
                </label>
            </div>

            {{-- TOMBOL SUBMIT --}}
            <button 
                type="submit" 
                id="btnSubmitSuruhan"
                disabled 
                class="w-full py-3 rounded-xl bg-[#0E1D31] text-white font-bold text-xs shadow-sm opacity-50 cursor-not-allowed hover:bg-[#173B67] transition-all flex items-center justify-center gap-2"
            >
                <i class="fa-solid fa-paper-plane"></i> Ajukan Suruhan Sekarang
            </button>

            <p class="text-[10px] text-center text-slate-400">
                <i class="fa-solid fa-lock text-[9px] mr-1"></i> Untuk membuat pesanan Anda perlu masuk sebagai Customer (gratis).
            </p>

        </form>

    </section>


    {{-- =====================================================
         4. TESTIMONI PELANGGAN (ALA SANTOSURUH)
    ====================================================== --}}
    <section class="card-sb p-3.5 space-y-2.5">
        <div class="flex items-center justify-between px-1">
            <h3 class="text-xs font-bold text-[#0E1D31]">Ulasan Pelanggan Terakhir</h3>
            <span class="text-[10px] text-emerald-600 font-bold flex items-center gap-1">
                <i class="fa-solid fa-circle-check"></i> Terverifikasi
            </span>
        </div>

        <div class="p-3 bg-slate-50 rounded-xl border border-slate-200/70 text-xs space-y-1">
            <div class="flex justify-between items-center">
                <strong class="font-bold text-slate-900 text-[11px]">Margaretha Trisha</strong>
                <span class="text-amber-400 text-[10px]">★★★★★</span>
            </div>
            <p class="text-[11px] text-slate-700 italic">"Sistem penugasan otomatisnya cepet banget, dalam 5 menit mitra udah OTW dan rumah beres kinclong."</p>
            <span class="text-[9px] text-slate-400 block">Layanan: Full Home Cleaning</span>
        </div>

        <div class="p-3 bg-slate-50 rounded-xl border border-slate-200/70 text-xs space-y-1">
            <div class="flex justify-between items-center">
                <strong class="font-bold text-slate-900 text-[11px]">Rendra Pratama</strong>
                <span class="text-amber-400 text-[10px]">★★★★★</span>
            </div>
            <p class="text-[11px] text-slate-700 italic">"Bantu angkut barang kosan lantai 3. Mitranya sopan, kuat, dan harga sangat terjangkau."</p>
            <span class="text-[9px] text-slate-400 block">Layanan: Pindahan Kos & Angkut</span>
        </div>
    </section>


    {{-- =====================================================
         5. FOOTER PUBLIK
    ====================================================== --}}
    <footer class="pt-2 pb-6 text-center text-[10px] text-slate-400 space-y-3">
        <div class="flex flex-wrap items-center justify-center gap-x-4 gap-y-2 text-slate-500 font-semibold">
            <a href="{{ route('customer.index') }}" class="hover:text-slate-900">Beranda</a>
            <span class="text-slate-300">•</span>
            <a href="{{ route('customer.layanan') }}" class="hover:text-slate-900">Layanan</a>
            <span class="text-slate-300">•</span>
            <a href="{{ route('customer.mitra') }}" class="hover:text-slate-900">Mitra Kami</a>
            <span class="text-slate-300">•</span>
            <a href="{{ route('customer.tentang') }}" class="hover:text-slate-900">Tentang</a>
        </div>

        <p>© 2026 <strong>SayaBantu.com</strong> • Solusi Suruhan Apa Aja Siap Melayani</p>
    </footer>

</main>

@endsection

@push('scripts')
<script>
    // Smooth scroll to order form
    function scrollToOrderForm() {
        const formEl = document.getElementById('orderFormCard');
        if (formEl) {
            formEl.scrollIntoView({ behavior: 'smooth', block: 'center' });
            formEl.classList.add('ring-2', 'ring-[#173B67]');
            setTimeout(() => formEl.classList.remove('ring-2', 'ring-[#173B67]'), 1500);
        }
    }

    // Smooth scroll to Layanan catalog
    function scrollToLayananList() {
        const el = document.getElementById('layananKatalogSection');
        if (el) {
            el.scrollIntoView({ behavior: 'smooth', block: 'start' });
            el.classList.add('ring-2', 'ring-[#173B67]');
            setTimeout(() => el.classList.remove('ring-2', 'ring-[#173B67]'), 1500);
        }
    }

    // Filter Service Catalog Categories
    function filterServiceCatalog(cat, btn) {
        document.querySelectorAll('.btn-cat-filter').forEach(b => {
            b.classList.remove('bg-[#0E1D31]', 'text-white', 'font-bold');
            b.classList.add('bg-slate-100', 'text-slate-700', 'font-medium');
        });
        btn.classList.remove('bg-slate-100', 'text-slate-700', 'font-medium');
        btn.classList.add('bg-[#0E1D31]', 'text-white', 'font-bold');

        const items = document.querySelectorAll('.service-cat-item');
        items.forEach(item => {
            const itemCat = item.getAttribute('data-cat');
            if (cat === 'all' || itemCat === cat) {
                item.style.display = 'flex';
            } else {
                item.style.display = 'none';
            }
        });
    }

    // Filter Bocah SayaBantu by Region
    function filterBocahRegion(region, btn) {
        document.querySelectorAll('.btn-region-chip').forEach(b => {
            b.classList.remove('bg-[#0E1D31]', 'text-white', 'font-bold');
            b.classList.add('bg-slate-100', 'text-slate-700', 'font-medium');
        });
        btn.classList.remove('bg-slate-100', 'text-slate-700', 'font-medium');
        btn.classList.add('bg-[#0E1D31]', 'text-white', 'font-bold');

        const cards = document.querySelectorAll('.bocah-card-item');
        cards.forEach(card => {
            const cardReg = card.getAttribute('data-region');
            if (region === 'all' || cardReg === region) {
                card.style.display = 'flex';
            } else {
                card.style.display = 'none';
            }
        });
    }

    // Select category to auto-fill form (tanpa milih mitra, sistem yang menugaskan!)
    function selectServiceToForm(serviceName, noteDesc, budget) {
        const params = new URLSearchParams({
            name: serviceName,
            description: noteDesc,
            budget,
        });
        window.location.href = `/customer/layanan?${params.toString()}`;
    }

    // Date chips
    function setDatePreset(type, btn) {
        document.querySelectorAll('.btn-date-chip').forEach(b => {
            b.classList.remove('bg-[#0E1D31]', 'text-white');
            b.classList.add('bg-slate-100', 'text-slate-700');
        });
        btn.classList.remove('bg-slate-100', 'text-slate-700');
        btn.classList.add('bg-[#0E1D31]', 'text-white');

        const input = document.getElementById('formTanggal');
        const today = new Date();
        if (type === 'today') {
            input.value = today.toISOString().split('T')[0];
        } else if (type === 'tomorrow') {
            const tmrw = new Date(today);
            tmrw.setDate(tmrw.getDate() + 1);
            input.value = tmrw.toISOString().split('T')[0];
        } else {
            input.focus();
        }
    }

    // Format Rupiah Simple
    function formatRupiahSimple(el) {
        let number_string = el.value.replace(/[^,\d]/g, '').toString();
        let split = number_string.split(',');
        let sisa = split[0].length % 3;
        let rupiah = split[0].substr(0, sisa);
        let ribuan = split[0].substr(sisa).match(/\d{3}/gi);

        if (ribuan) {
            let separator = sisa ? '.' : '';
            rupiah += separator + ribuan.join('.');
        }
        el.value = rupiah;
    }

    // Toggle submit button
    function toggleFormSubmit(checked) {
        const btn = document.getElementById('btnSubmitSuruhan');
        if (checked) {
            btn.disabled = false;
            btn.classList.remove('opacity-50', 'cursor-not-allowed');
        } else {
            btn.disabled = true;
            btn.classList.add('opacity-50', 'cursor-not-allowed');
        }
    }

    // Handle Form Submit (Requires Login Identity!)
    function handleSuruhanSubmit(e) {
        e.preventDefault();

        const user = getCustomerAuth();
        if (!user || !user.isLoggedIn) {
            switchLoginRole('customer');
            openModal('modalLoginCustomer');
            showCustomerToast('Masuk Diperlukan', 'Silakan masuk akun terlebih dahulu agar sistem dapat menugaskan mitra untuk Anda.', 'warning');
            return;
        }

        const tanggal = document.getElementById('formTanggal').value;
        const jam = document.getElementById('formJam').value;
        const menit = document.getElementById('formMenit').value;
        const layanan = document.getElementById('formLayanan').value;
        const alamat = document.getElementById('formAlamat').value;
        const note = document.getElementById('formNote').value;
        const budget = document.getElementById('formBudget').value;
        const nego = document.getElementById('formNego').value;

        const btn = document.getElementById('btnSubmitSuruhan');
        btn.disabled = true;
        btn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Sistem Mencocokkan Mitra...';

        setTimeout(() => {
            btn.disabled = false;
            btn.innerHTML = '<i class="fa-solid fa-paper-plane"></i> Ajukan Suruhan Sekarang';

            const randCode = '#SB-SURUH-' + Math.floor(1000 + Math.random() * 9000);

            document.getElementById('confOrderCode').innerText = randCode;
            document.getElementById('confLayanan').innerText = layanan;
            document.getElementById('confWaktu').innerText = `${tanggal} ${jam}:${menit} WIB`;
            document.getElementById('confBudget').innerText = `Rp ${budget} (${nego})`;
            document.getElementById('confPemesan').innerText = `${user.name} (${user.phone})`;
            document.getElementById('confNote').innerText = `${note} (Lokasi: ${alamat})`;

            const waText = encodeURIComponent(
                `Halo Admin SayaBantu! Saya telah membuat suruhan baru:\n` +
                `• Kode: ${randCode}\n` +
                `• Pemesan: ${user.name} (${user.phone})\n` +
                `• Layanan: ${layanan}\n` +
                `• Jadwal: ${tanggal} ${jam}:${menit} WIB\n` +
                `• Alamat: ${alamat}\n` +
                `• Catatan: ${note}\n` +
                `• Penawaran: Rp ${budget} (${nego})\n\n` +
                `Mohon sistem mencocokkan dan menugaskan mitra terdekat ya!`
            );
            document.getElementById('btnSendWaOrder').href = `https://wa.me/6281234567890?text=${waText}`;

            openModal('modalKonfirmasiOrder');
        }, 600);
    }

    // Filter Category Live Search
    function filterCategoryLive(query) {
        const lower = query.toLowerCase().trim();
        if (!lower) return;
        const select = document.getElementById('formLayanan');
        if (select) {
            for (let i = 0; i < select.options.length; i++) {
                if (select.options[i].text.toLowerCase().includes(lower)) {
                    select.selectedIndex = i;
                    scrollToOrderForm();
                    break;
                }
            }
        }
    }
</script>
@endpush
