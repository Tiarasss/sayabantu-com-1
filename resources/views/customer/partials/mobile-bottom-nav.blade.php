{{-- NATIVE MOBILE BOTTOM NAVIGATION BAR --}}
@php
    $isBeranda = request()->routeIs('customer.index') || request()->routeIs('customer.home');
    $isLayanan = request()->routeIs('customer.layanan') || request()->routeIs('customer.service');
    $isMitra   = request()->routeIs('customer.mitra');
@endphp
<nav class="w-full bg-white/95 backdrop-blur-lg border-t border-slate-200/80 px-4 py-2 flex items-center justify-between shadow-bottom-nav shrink-0 z-40 relative">

    {{-- BERANDA --}}
    <a href="{{ route('customer.index') }}" class="flex flex-col items-center justify-center gap-0.5 text-[10px] w-14 transition-all {{ $isBeranda ? 'text-sky-600 font-extrabold' : 'text-slate-500 hover:text-slate-900 font-semibold' }}">
        <div class="w-6 h-6 rounded-full flex items-center justify-center {{ $isBeranda ? 'bg-sky-50 text-sky-600' : '' }}">
            <i class="fa-solid fa-house text-xs"></i>
        </div>
        <span>Beranda</span>
    </a>

    {{-- SEMUA LAYANAN (KATALOG) --}}
    <a href="{{ route('customer.layanan') }}" class="flex flex-col items-center justify-center gap-0.5 text-[10px] w-14 transition-all {{ $isLayanan ? 'text-sky-600 font-extrabold' : 'text-slate-500 hover:text-slate-900 font-semibold' }}">
        <div class="w-6 h-6 rounded-full flex items-center justify-center {{ $isLayanan ? 'bg-sky-50 text-sky-600' : '' }}">
            <i class="fa-solid fa-list-check text-xs"></i>
        </div>
        <span>Layanan</span>
    </a>

    {{-- ELEVATED CENTER BUTTON: (+) BUAT SURUHAN --}}
    <div class="-mt-6 flex flex-col items-center justify-center">
        <button
            type="button"
            onclick="scrollToFormSuruhan()"
            class="w-13 h-13 rounded-full bg-gradient-to-tr from-sky-500 to-[#173B67] text-white flex items-center justify-center text-xl shadow-[0_8px_20px_rgba(2,132,199,0.45)] hover:scale-105 active:scale-95 transition-all border-4 border-white"
            title="Buat Suruhan Baru"
        >
            <i class="fa-solid fa-plus font-black"></i>
        </button>
        <span class="text-[9px] font-extrabold text-slate-700 mt-0.5">Suruh</span>
    </div>

    {{-- MITRA --}}
    <a href="{{ route('customer.mitra') }}" class="flex flex-col items-center justify-center gap-0.5 text-[10px] w-14 transition-all {{ $isMitra ? 'text-sky-600 font-extrabold' : 'text-slate-500 hover:text-slate-900 font-semibold' }}">
        <div class="w-6 h-6 rounded-full flex items-center justify-center {{ $isMitra ? 'bg-sky-50 text-sky-600' : '' }}">
            <i class="fa-solid fa-users text-xs"></i>
        </div>
        <span>Mitra</span>
    </a>

    {{-- AKUN / MASUK --}}
    <button type="button" onclick="handleAccountButtonClick()" class="flex flex-col items-center justify-center gap-0.5 text-slate-500 hover:text-[#0E1D31] font-semibold text-[10px] w-14 transition-all">
        <div class="w-6 h-6 flex items-center justify-center">
            <i class="fa-solid fa-user text-xs"></i>
        </div>
        <span>Masuk</span>
    </button>

</nav>
