@extends('layouts.admin')

@section('title', 'Data Pengguna - SayaBantu.com')
@section('back-url', route('admin.dashboard'))
@section('back-text', 'Kembali ke Dashboard')
@section('page-title', 'Data Pengguna')
@section('page-subtitle', 'Kelola Seluruh Pelanggan')

{{-- =========================================================
     TOP HERO AREA
========================================================= --}}
@section('hero')
<div class="px-5 pt-1 pb-5">
    {{-- SUMMARY STATS PENGGUNA --}}
    <div class="p-4 rounded-[22px] bg-white/[0.08] backdrop-blur-md border border-white/15 shadow-xl">
        <div class="flex items-center justify-between mb-3 pb-2.5 border-b border-white/10">
            <span class="text-xs font-bold text-white flex items-center gap-2">
                <i class="fa-solid fa-users text-sky-400"></i>
                Statistik Akun Konsumen
            </span>
            <span class="text-[9px] font-semibold px-2 py-0.5 rounded-full bg-sky-500/20 text-sky-300 border border-sky-500/30">
                1.240 Terdaftar
            </span>
        </div>

        <div class="grid grid-cols-4 gap-2 text-center">
            <div class="p-2 rounded-xl bg-white/[0.04] border border-white/5 cursor-pointer hover:bg-white/[0.08] active:scale-95 transition-all" onclick="filterPengguna('all', this)" title="Semua Pengguna">
                <div class="text-xs font-black text-white">1.240</div>
                <div class="text-[8px] text-gray-300 mt-0.5">Total</div>
            </div>
            <div class="p-2 rounded-xl bg-white/[0.04] border border-white/5 cursor-pointer hover:bg-white/[0.08] active:scale-95 transition-all" onclick="filterPengguna('aktif', this)" title="Pengguna Aktif">
                <div class="text-xs font-black text-emerald-400">890</div>
                <div class="text-[8px] text-gray-300 mt-0.5">Aktif</div>
            </div>
            <div class="p-2 rounded-xl bg-white/[0.04] border border-white/5 cursor-pointer hover:bg-white/[0.08] active:scale-95 transition-all" onclick="filterPengguna('vip', this)" title="Member VIP">
                <div class="text-xs font-black text-amber-400">145</div>
                <div class="text-[8px] text-gray-300 mt-0.5">VIP</div>
            </div>
            <div class="p-2 rounded-xl bg-white/[0.04] border border-white/5 cursor-pointer hover:bg-white/[0.08] active:scale-95 transition-all" onclick="filterPengguna('baru', this)" title="Baru Mendaftar">
                <div class="text-xs font-black text-sky-400">65</div>
                <div class="text-[8px] text-gray-300 mt-0.5">Baru</div>
            </div>
        </div>
    </div>

    {{-- SEARCH BAR INTERAKTIF --}}
    <div class="mt-3">
        <div class="relative">
            <i class="fa-solid fa-magnifying-glass absolute left-3.5 top-1/2 -translate-y-1/2 text-gray-400 text-xs"></i>
            <input
                type="text"
                id="searchPenggunaInput"
                placeholder="Cari nama, email, nomor HP..."
                onkeyup="searchPengguna(this.value)"
                class="w-full pl-9 pr-8 py-2.5 rounded-xl bg-white/10 text-white placeholder-gray-400 text-xs border border-white/15 focus:outline-none focus:border-sky-400 focus:bg-white/15 transition-all"
            >
            <button
                type="button"
                id="clearSearchBtn"
                onclick="clearSearchPengguna()"
                class="absolute right-2.5 top-1/2 -translate-y-1/2 text-gray-400 hover:text-white text-xs hidden"
            >
                <i class="fa-solid fa-xmark"></i>
            </button>
        </div>
    </div>

    {{-- FILTER TABS (DITENGAHKAN SAMA RATA KIRI KANAN) --}}
    <div class="flex items-center justify-center gap-1.5 mt-3 flex-wrap text-[10px]">
        <button type="button" class="pengguna-filter-tab active px-3.5 py-1.5 rounded-full font-semibold transition-all bg-[#173B67] text-white border border-sky-400/40" onclick="filterPengguna('all', this)">
            Semua (<span id="penggunaCount">5</span>)
        </button>
        <button type="button" class="pengguna-filter-tab px-3.5 py-1.5 rounded-full font-medium transition-all bg-white/10 text-gray-300 hover:bg-white/20" onclick="filterPengguna('aktif', this)">
            Aktif (2)
        </button>
        <button type="button" class="pengguna-filter-tab px-3.5 py-1.5 rounded-full font-medium transition-all bg-white/10 text-gray-300 hover:bg-white/20" onclick="filterPengguna('vip', this)">
            VIP Loyal (2)
        </button>
        <button type="button" class="pengguna-filter-tab px-3.5 py-1.5 rounded-full font-medium transition-all bg-white/10 text-gray-300 hover:bg-white/20" onclick="filterPengguna('baru', this)">
            Baru (1)
        </button>
    </div>
</div>
@endsection

{{-- =========================================================
     CONTENT AREA
========================================================= --}}
@section('content')
<div class="space-y-3">

    {{-- INFO BAR --}}
    <div class="flex items-center justify-between px-1 text-xs">
        <span class="text-gray-500 font-medium">Daftar Konsumen Terverifikasi</span>
        <button type="button" onclick="showToast('Ekspor Data', 'Mengunduh laporan pengguna format CSV/Excel...', 'info')" class="text-[10px] font-semibold text-[#173B67] hover:underline flex items-center gap-1">
            <i class="fa-solid fa-file-export text-[9px]"></i> Ekspor Data
        </button>
    </div>

    <div id="penggunaList" class="space-y-3">

        {{-- USER 1: Dimas Pratama --}}
        <div class="pengguna-card p-4 rounded-[22px] bg-white border border-gray-200/80 shadow-sm space-y-3 transition-all hover:border-sky-300" data-status="aktif" data-name="dimas pratama" data-phone="081233445566" data-email="dimas.pratama@gmail.com">
            <div class="flex items-start justify-between gap-3">
                <div class="flex items-center gap-3 min-w-0">
                    <div class="w-11 h-11 rounded-2xl bg-sky-50 text-[#173B67] font-bold text-base flex items-center justify-center border border-sky-100 shrink-0">
                        D
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-1.5">
                            <h3 class="text-xs font-bold text-gray-900 truncate">Dimas Pratama</h3>
                            <i class="fa-solid fa-circle-check text-sky-600 text-[10px]" title="Nomor Terverifikasi"></i>
                        </div>
                        <p class="text-[10px] text-gray-500 truncate">dimas.pratama@gmail.com</p>
                        <p class="text-[9px] text-gray-400 mt-0.5">Kebayoran Baru, Jakarta Selatan</p>
                    </div>
                </div>
                <span class="px-2.5 py-0.5 rounded-full text-[9px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 shrink-0">
                    Aktif
                </span>
            </div>

            <div class="grid grid-cols-3 gap-2 text-center p-2 rounded-xl bg-gray-50 border border-gray-100 text-[10px]">
                <div>
                    <span class="text-gray-400 text-[8px] block">PESANAN</span>
                    <strong class="text-gray-800 text-xs">14</strong>
                </div>
                <div>
                    <span class="text-gray-400 text-[8px] block">TOTAL BELANJA</span>
                    <strong class="text-gray-800 text-xs">Rp 2.85jt</strong>
                </div>
                <div>
                    <span class="text-gray-400 text-[8px] block">BERGABUNG</span>
                    <strong class="text-gray-800 text-xs">Jan 2026</strong>
                </div>
            </div>

            <div class="flex items-center justify-between pt-1 border-t border-gray-100 text-xs">
                <span class="text-[10px] text-gray-400 font-mono">+62 812-3344-5566</span>
                <div class="flex items-center gap-1.5">
                    <a href="{{ route('admin.pesanan') }}" class="px-2.5 py-1 rounded-lg bg-sky-50 text-[#173B67] font-bold text-[10px] hover:bg-sky-100 transition-colors inline-flex items-center gap-1">
                        <i class="fa-solid fa-clock-rotate-left text-[9px]"></i> Order
                    </a>
                    <button type="button" onclick="showToast('WhatsApp Pelanggan', 'Membuka WhatsApp ke Dimas Pratama (+62 812-3344-5566)', 'info')" class="px-2.5 py-1 rounded-lg bg-emerald-50 text-emerald-700 font-bold text-[10px] hover:bg-emerald-100 transition-colors inline-flex items-center gap-1">
                        <i class="fa-brands fa-whatsapp text-[9px]"></i> Chat
                    </button>
                    <button type="button" onclick="showToast('Detail Pengguna', 'Profil pelanggan #USR-1082 Dimas Pratama aman tanpa pelanggaran.', 'info')" class="px-2 py-1 rounded-lg bg-gray-100 text-gray-700 font-bold text-[10px] hover:bg-gray-200 transition-colors">
                        <i class="fa-solid fa-ellipsis"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- USER 2: Rina Wulandari (VIP) --}}
        <div class="pengguna-card p-4 rounded-[22px] bg-white border border-gray-200/80 shadow-sm space-y-3 transition-all hover:border-amber-300" data-status="vip" data-name="rina wulandari" data-phone="081987654321" data-email="rina.wulan@yahoo.co.id">
            <div class="flex items-start justify-between gap-3">
                <div class="flex items-center gap-3 min-w-0">
                    <div class="w-11 h-11 rounded-2xl bg-amber-50 text-amber-700 font-bold text-base flex items-center justify-center border border-amber-200 shrink-0">
                        R
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-1.5">
                            <h3 class="text-xs font-bold text-gray-900 truncate">Rina Wulandari</h3>
                            <span class="px-1.5 py-0.2 rounded text-[8px] font-bold bg-amber-100 text-amber-800 border border-amber-300">VIP GOLD</span>
                        </div>
                        <p class="text-[10px] text-gray-500 truncate">rina.wulan@yahoo.co.id</p>
                        <p class="text-[9px] text-gray-400 mt-0.5">Puri Indah, Jakarta Barat</p>
                    </div>
                </div>
                <span class="px-2.5 py-0.5 rounded-full text-[9px] font-bold bg-amber-50 text-amber-700 border border-amber-200 shrink-0">
                    VIP
                </span>
            </div>

            <div class="grid grid-cols-3 gap-2 text-center p-2 rounded-xl bg-gray-50 border border-gray-100 text-[10px]">
                <div>
                    <span class="text-gray-400 text-[8px] block">PESANAN</span>
                    <strong class="text-gray-800 text-xs">28</strong>
                </div>
                <div>
                    <span class="text-gray-400 text-[8px] block">TOTAL BELANJA</span>
                    <strong class="text-emerald-700 text-xs">Rp 7.42jt</strong>
                </div>
                <div>
                    <span class="text-gray-400 text-[8px] block">BERGABUNG</span>
                    <strong class="text-gray-800 text-xs">Nov 2025</strong>
                </div>
            </div>

            <div class="flex items-center justify-between pt-1 border-t border-gray-100 text-xs">
                <span class="text-[10px] text-gray-400 font-mono">+62 819-8765-4321</span>
                <div class="flex items-center gap-1.5">
                    <a href="{{ route('admin.pesanan') }}" class="px-2.5 py-1 rounded-lg bg-sky-50 text-[#173B67] font-bold text-[10px] hover:bg-sky-100 transition-colors inline-flex items-center gap-1">
                        <i class="fa-solid fa-clock-rotate-left text-[9px]"></i> Order
                    </a>
                    <button type="button" onclick="showToast('Kupon Loyalitas', 'Voucher Diskon 20% telah dikirim ke notifikasi Rina Wulandari.', 'success')" class="px-2.5 py-1 rounded-lg bg-amber-50 text-amber-800 font-bold text-[10px] hover:bg-amber-100 transition-colors inline-flex items-center gap-1 border border-amber-200">
                        <i class="fa-solid fa-gift text-[9px]"></i> Beri Kupon
                    </button>
                    <button type="button" onclick="showToast('Detail Pengguna', 'Pelanggan VIP #USR-1045 dengan skor kepuasan 98%.', 'info')" class="px-2 py-1 rounded-lg bg-gray-100 text-gray-700 font-bold text-[10px] hover:bg-gray-200 transition-colors">
                        <i class="fa-solid fa-ellipsis"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- USER 3: Budi Santoso (Baru) --}}
        <div class="pengguna-card p-4 rounded-[22px] bg-white border border-gray-200/80 shadow-sm space-y-3 transition-all hover:border-sky-300" data-status="baru" data-name="budi santoso" data-phone="085711223344" data-email="budi.s@outlook.com">
            <div class="flex items-start justify-between gap-3">
                <div class="flex items-center gap-3 min-w-0">
                    <div class="w-11 h-11 rounded-2xl bg-indigo-50 text-indigo-700 font-bold text-base flex items-center justify-center border border-indigo-100 shrink-0">
                        B
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-1.5">
                            <h3 class="text-xs font-bold text-gray-900 truncate">Budi Santoso</h3>
                            <span class="px-1.5 py-0.2 rounded text-[8px] font-bold bg-sky-100 text-sky-800">BARU</span>
                        </div>
                        <p class="text-[10px] text-gray-500 truncate">budi.s@outlook.com</p>
                        <p class="text-[9px] text-gray-400 mt-0.5">Menteng, Jakarta Pusat</p>
                    </div>
                </div>
                <span class="px-2.5 py-0.5 rounded-full text-[9px] font-bold bg-sky-50 text-sky-700 border border-sky-200 shrink-0">
                    Baru
                </span>
            </div>

            <div class="grid grid-cols-3 gap-2 text-center p-2 rounded-xl bg-gray-50 border border-gray-100 text-[10px]">
                <div>
                    <span class="text-gray-400 text-[8px] block">PESANAN</span>
                    <strong class="text-gray-800 text-xs">1</strong>
                </div>
                <div>
                    <span class="text-gray-400 text-[8px] block">TOTAL BELANJA</span>
                    <strong class="text-gray-800 text-xs">Rp 150rb</strong>
                </div>
                <div>
                    <span class="text-gray-400 text-[8px] block">BERGABUNG</span>
                    <strong class="text-sky-700 text-xs">2 hari lalu</strong>
                </div>
            </div>

            <div class="flex items-center justify-between pt-1 border-t border-gray-100 text-xs">
                <span class="text-[10px] text-gray-400 font-mono">+62 857-1122-3344</span>
                <div class="flex items-center gap-1.5">
                    <button type="button" onclick="showToast('Kirim Sambutan', 'Notifikasi selamat datang dan panduan layanan dikirim ke Budi Santoso.', 'success')" class="px-2.5 py-1 rounded-lg bg-sky-50 text-[#173B67] font-bold text-[10px] hover:bg-sky-100 transition-colors inline-flex items-center gap-1">
                        <i class="fa-solid fa-paper-plane text-[9px]"></i> Sambutan
                    </button>
                    <button type="button" onclick="showToast('WhatsApp Pelanggan', 'Membuka WhatsApp ke Budi Santoso (+62 857-1122-3344)', 'info')" class="px-2.5 py-1 rounded-lg bg-emerald-50 text-emerald-700 font-bold text-[10px] hover:bg-emerald-100 transition-colors inline-flex items-center gap-1">
                        <i class="fa-brands fa-whatsapp text-[9px]"></i> Chat
                    </button>
                    <button type="button" onclick="showToast('Detail Pengguna', 'Akun #USR-1192 baru mendaftar dan verifikasi OTP sukses.', 'info')" class="px-2 py-1 rounded-lg bg-gray-100 text-gray-700 font-bold text-[10px] hover:bg-gray-200 transition-colors">
                        <i class="fa-solid fa-ellipsis"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- USER 4: Maya Anggraini (VIP Platinum) --}}
        <div class="pengguna-card p-4 rounded-[22px] bg-white border border-gray-200/80 shadow-sm space-y-3 transition-all hover:border-purple-300" data-status="vip" data-name="maya anggraini" data-phone="082199887766" data-email="maya.anggraini@corporate.id">
            <div class="flex items-start justify-between gap-3">
                <div class="flex items-center gap-3 min-w-0">
                    <div class="w-11 h-11 rounded-2xl bg-purple-50 text-purple-700 font-bold text-base flex items-center justify-center border border-purple-200 shrink-0">
                        M
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-1.5">
                            <h3 class="text-xs font-bold text-gray-900 truncate">Maya Anggraini</h3>
                            <span class="px-1.5 py-0.2 rounded text-[8px] font-bold bg-purple-100 text-purple-800 border border-purple-300">PLATINUM</span>
                        </div>
                        <p class="text-[10px] text-gray-500 truncate">maya.anggraini@corporate.id</p>
                        <p class="text-[9px] text-gray-400 mt-0.5">BSD City, Tangerang Selatan</p>
                    </div>
                </div>
                <span class="px-2.5 py-0.5 rounded-full text-[9px] font-bold bg-purple-50 text-purple-700 border border-purple-200 shrink-0">
                    VIP
                </span>
            </div>

            <div class="grid grid-cols-3 gap-2 text-center p-2 rounded-xl bg-gray-50 border border-gray-100 text-[10px]">
                <div>
                    <span class="text-gray-400 text-[8px] block">PESANAN</span>
                    <strong class="text-gray-800 text-xs">42</strong>
                </div>
                <div>
                    <span class="text-gray-400 text-[8px] block">TOTAL BELANJA</span>
                    <strong class="text-purple-700 text-xs">Rp 14.9jt</strong>
                </div>
                <div>
                    <span class="text-gray-400 text-[8px] block">BERGABUNG</span>
                    <strong class="text-gray-800 text-xs">Agu 2025</strong>
                </div>
            </div>

            <div class="flex items-center justify-between pt-1 border-t border-gray-100 text-xs">
                <span class="text-[10px] text-gray-400 font-mono">+62 821-9988-7766</span>
                <div class="flex items-center gap-1.5">
                    <a href="{{ route('admin.pesanan') }}" class="px-2.5 py-1 rounded-lg bg-sky-50 text-[#173B67] font-bold text-[10px] hover:bg-sky-100 transition-colors inline-flex items-center gap-1">
                        <i class="fa-solid fa-clock-rotate-left text-[9px]"></i> Order
                    </a>
                    <button type="button" onclick="showToast('Layanan Prioritas', 'Akun Maya Anggraini telah diberi status CS Dedicated Prioritas.', 'info')" class="px-2.5 py-1 rounded-lg bg-purple-50 text-purple-700 font-bold text-[10px] hover:bg-purple-100 transition-colors inline-flex items-center gap-1">
                        <i class="fa-solid fa-crown text-[9px]"></i> Prioritas
                    </button>
                    <button type="button" onclick="showToast('Detail Pengguna', 'Pelanggan korporat VIP Platinum dengan riwayat pembayaran lancar.', 'info')" class="px-2 py-1 rounded-lg bg-gray-100 text-gray-700 font-bold text-[10px] hover:bg-gray-200 transition-colors">
                        <i class="fa-solid fa-ellipsis"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- USER 5: Hendra Setiawan --}}
        <div class="pengguna-card p-4 rounded-[22px] bg-white border border-gray-200/80 shadow-sm space-y-3 transition-all hover:border-sky-300" data-status="aktif" data-name="hendra setiawan" data-phone="087855443322" data-email="hendra.setiawan@gmail.com">
            <div class="flex items-start justify-between gap-3">
                <div class="flex items-center gap-3 min-w-0">
                    <div class="w-11 h-11 rounded-2xl bg-sky-50 text-[#173B67] font-bold text-base flex items-center justify-center border border-sky-100 shrink-0">
                        H
                    </div>
                    <div class="min-w-0">
                        <div class="flex items-center gap-1.5">
                            <h3 class="text-xs font-bold text-gray-900 truncate">Hendra Setiawan</h3>
                            <i class="fa-solid fa-circle-check text-sky-600 text-[10px]" title="Nomor Terverifikasi"></i>
                        </div>
                        <p class="text-[10px] text-gray-500 truncate">hendra.setiawan@gmail.com</p>
                        <p class="text-[9px] text-gray-400 mt-0.5">Harapan Indah, Bekasi</p>
                    </div>
                </div>
                <span class="px-2.5 py-0.5 rounded-full text-[9px] font-bold bg-emerald-50 text-emerald-700 border border-emerald-200 shrink-0">
                    Aktif
                </span>
            </div>

            <div class="grid grid-cols-3 gap-2 text-center p-2 rounded-xl bg-gray-50 border border-gray-100 text-[10px]">
                <div>
                    <span class="text-gray-400 text-[8px] block">PESANAN</span>
                    <strong class="text-gray-800 text-xs">8</strong>
                </div>
                <div>
                    <span class="text-gray-400 text-[8px] block">TOTAL BELANJA</span>
                    <strong class="text-gray-800 text-xs">Rp 1.62jt</strong>
                </div>
                <div>
                    <span class="text-gray-400 text-[8px] block">BERGABUNG</span>
                    <strong class="text-gray-800 text-xs">Des 2025</strong>
                </div>
            </div>

            <div class="flex items-center justify-between pt-1 border-t border-gray-100 text-xs">
                <span class="text-[10px] text-gray-400 font-mono">+62 878-5544-3322</span>
                <div class="flex items-center gap-1.5">
                    <a href="{{ route('admin.pesanan') }}" class="px-2.5 py-1 rounded-lg bg-sky-50 text-[#173B67] font-bold text-[10px] hover:bg-sky-100 transition-colors inline-flex items-center gap-1">
                        <i class="fa-solid fa-clock-rotate-left text-[9px]"></i> Order
                    </a>
                    <button type="button" onclick="showToast('WhatsApp Pelanggan', 'Membuka WhatsApp ke Hendra Setiawan (+62 878-5544-3322)', 'info')" class="px-2.5 py-1 rounded-lg bg-emerald-50 text-emerald-700 font-bold text-[10px] hover:bg-emerald-100 transition-colors inline-flex items-center gap-1">
                        <i class="fa-brands fa-whatsapp text-[9px]"></i> Chat
                    </button>
                    <button type="button" onclick="showToast('Detail Pengguna', 'Profil pelanggan #USR-1104 aktif secara rutin tiap bulan.', 'info')" class="px-2 py-1 rounded-lg bg-gray-100 text-gray-700 font-bold text-[10px] hover:bg-gray-200 transition-colors">
                        <i class="fa-solid fa-ellipsis"></i>
                    </button>
                </div>
            </div>
        </div>

    </div>

    {{-- EMPTY STATE PENGGUNA --}}
    <div id="emptyPengguna" class="hidden p-8 text-center bg-white rounded-[22px] border border-gray-100 shadow-sm space-y-2">
        <div class="w-12 h-12 rounded-2xl bg-gray-100 text-gray-400 mx-auto flex items-center justify-center text-xl">
            <i class="fa-solid fa-user-slash"></i>
        </div>
        <h4 class="text-xs font-bold text-gray-800">Tidak Menemukan Pengguna</h4>
        <p class="text-[10px] text-gray-400">Tidak ada data konsumen yang sesuai dengan kata kunci atau filter ini.</p>
        <button type="button" onclick="clearSearchPengguna(); filterPengguna('all')" class="mt-2 text-[10px] font-bold text-[#173B67] bg-sky-50 hover:bg-sky-100 px-3 py-1.5 rounded-lg transition-colors">
            Reset Pencarian
        </button>
    </div>

</div>
@endsection

@push('scripts')
<script>
    let currentPenggunaFilter = 'all';
    let searchKeyword = '';

    function filterPengguna(status, btnEl) {
        currentPenggunaFilter = status;

        document.querySelectorAll('.pengguna-filter-tab').forEach(b => {
            b.classList.remove('active', 'bg-[#173B67]', 'text-white', 'border-sky-400/40');
            b.classList.add('bg-white/10', 'text-gray-300');
        });

        if (btnEl) {
            btnEl.classList.add('active', 'bg-[#173B67]', 'text-white', 'border-sky-400/40');
            btnEl.classList.remove('bg-white/10', 'text-gray-300');
        } else {
            const defaultBtn = document.querySelector('.pengguna-filter-tab');
            if (defaultBtn) {
                defaultBtn.classList.add('active', 'bg-[#173B67]', 'text-white', 'border-sky-400/40');
                defaultBtn.classList.remove('bg-white/10', 'text-gray-300');
            }
        }

        applyPenggunaFilters();
    }

    function searchPengguna(val) {
        searchKeyword = (val || '').toLowerCase().trim();
        const clearBtn = document.getElementById('clearSearchBtn');
        if (clearBtn) {
            if (searchKeyword.length > 0) {
                clearBtn.classList.remove('hidden');
            } else {
                clearBtn.classList.add('hidden');
            }
        }
        applyPenggunaFilters();
    }

    function clearSearchPengguna() {
        const input = document.getElementById('searchPenggunaInput');
        if (input) input.value = '';
        searchPengguna('');
    }

    function applyPenggunaFilters() {
        const cards = document.querySelectorAll('.pengguna-card');
        const empty = document.getElementById('emptyPengguna');
        const countEl = document.getElementById('penggunaCount');
        let visibleCount = 0;

        cards.forEach(card => {
            const cardStatus = card.getAttribute('data-status');
            const cardName = card.getAttribute('data-name') || '';
            const cardPhone = card.getAttribute('data-phone') || '';
            const cardEmail = card.getAttribute('data-email') || '';

            const matchesStatus = (currentPenggunaFilter === 'all' || cardStatus === currentPenggunaFilter);
            const matchesSearch = !searchKeyword || 
                                  cardName.includes(searchKeyword) || 
                                  cardPhone.includes(searchKeyword) || 
                                  cardEmail.includes(searchKeyword);

            if (matchesStatus && matchesSearch) {
                card.style.display = 'block';
                visibleCount++;
            } else {
                card.style.display = 'none';
            }
        });

        if (countEl && currentPenggunaFilter === 'all' && !searchKeyword) {
            countEl.textContent = visibleCount;
        }

        if (visibleCount === 0) {
            if (empty) empty.classList.remove('hidden');
        } else {
            if (empty) empty.classList.add('hidden');
        }
    }
</script>
@endpush
