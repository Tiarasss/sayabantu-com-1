@extends('layouts.admin')

@section('title', 'Detail Pembayaran #' . ($id ?? '1024') . ' - SayaBantu.com')
@section('back-url', route('admin.pembayaran'))
@section('back-text', 'Kembali ke Pembayaran')
@section('page-title', 'Detail Pembayaran')
@section('page-subtitle', 'Rincian transaksi dan status dana')

{{-- =========================================================
     TOP HERO AREA
========================================================= --}}
@section('hero')
<section class="relative z-10 px-5 pb-5 pt-1">
    <div class="flex items-start justify-between gap-3 p-4 rounded-[22px] bg-white/[0.08] backdrop-blur-md border border-white/15 shadow-xl">
        <div>
            <p class="text-[9px] font-medium text-white/60">
                Nomor Pembayaran
            </p>
            <h2 class="mt-1 text-[20px] font-bold tracking-tight text-white">
                #PAY{{ $id ?? '1024' }}
            </h2>
        </div>

        <span class="mt-1 inline-flex shrink-0 items-center rounded-full border border-amber-300/30 bg-amber-400/15 px-3 py-1 text-[8.5px] font-semibold text-amber-200">
            <span class="w-1.5 h-1.5 rounded-full bg-amber-400 mr-1.5 animate-pulse"></span>
            Menunggu
        </span>
    </div>
</section>
@endsection

{{-- =========================================================
     CONTENT DETAIL
========================================================= --}}
@section('content')

<div class="detail-main space-y-3">

    {{-- KARTU TOTAL PEMBAYARAN --}}
    <section class="detail-card p-4">
        <div class="flex items-start justify-between gap-3">
            <div>
                <p class="text-[9px] text-slate-400 font-medium">
                    Total Tagihan Pembayaran
                </p>
                <h3 class="mt-1 text-[22px] font-extrabold text-[#0E1D31]">
                    Rp140.000
                </h3>
            </div>
            <div class="px-2.5 py-1 rounded-lg bg-sky-50 text-[#173B67] border border-sky-100 text-[10px] font-bold">
                BCA Virtual Account
            </div>
        </div>

        <div class="mt-3 pt-3 border-t border-slate-100 flex items-center justify-between text-[10px]">
            <span class="text-slate-400">Kode Pembayaran VA:</span>
            <div class="flex items-center gap-1.5">
                <span class="font-mono font-bold text-slate-800">8801 0812 3344 5566</span>
                <button type="button" onclick="showToast('Disalin', 'Nomor Virtual Account disalin ke clipboard.', 'info')" class="text-sky-600 hover:text-sky-800">
                    <i class="fa-regular fa-copy"></i>
                </button>
            </div>
        </div>
    </section>

    {{-- DETAIL TRANSAKSI --}}
    <section class="detail-card p-4">
        <div class="mb-3">
            <h4 class="text-xs font-bold text-[#0E1D31]">
                Informasi Transaksi
            </h4>
            <p class="text-[9px] text-slate-400 mt-0.5">
                Rincian pihak yang terlibat dalam pesanan
            </p>
        </div>

        <div class="space-y-3 text-xs">
            <div class="flex items-center justify-between">
                <span class="text-[10px] text-slate-400">ID Pesanan Terkait</span>
                <a href="{{ route('admin.pesanan.detail', 1024) }}" class="text-[10px] font-bold text-[#173B67] hover:underline flex items-center gap-1">
                    #SB1024 <i class="fa-solid fa-arrow-up-right-from-square text-[8px]"></i>
                </a>
            </div>

            <div class="flex items-center justify-between">
                <span class="text-[10px] text-slate-400">Layanan</span>
                <span class="text-[10px] font-semibold text-slate-800">Bersihkan Rumah</span>
            </div>

            <div class="flex items-center justify-between">
                <span class="text-[10px] text-slate-400">Customer</span>
                <div class="flex items-center gap-1.5">
                    <span class="text-[10px] font-bold text-slate-800">Andi</span>
                    <button type="button" onclick="showToast('Customer', 'Membuka kontak customer Andi (+62 812-3344-5566)', 'info')" class="text-emerald-600 hover:text-emerald-800 text-[10px]">
                        <i class="fa-brands fa-whatsapp"></i>
                    </button>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <span class="text-[10px] text-slate-400">Mitra Penyedia</span>
                <div class="flex items-center gap-1.5">
                    <span class="text-[10px] font-bold text-slate-800">Budi Santoso</span>
                    <button type="button" onclick="showToast('Mitra', 'Membuka kontak mitra Budi Santoso (+62 812-3456-7890)', 'info')" class="text-emerald-600 hover:text-emerald-800 text-[10px]">
                        <i class="fa-brands fa-whatsapp"></i>
                    </button>
                </div>
            </div>

            <div class="flex items-center justify-between">
                <span class="text-[10px] text-slate-400">Waktu Pemesanan</span>
                <span class="text-[10px] text-slate-600">31 Agustus 2026, 10:25</span>
            </div>
        </div>
    </section>

    {{-- RINCIAN BIAYA --}}
    <section class="detail-card p-4">
        <div class="mb-3">
            <h4 class="text-xs font-bold text-[#0E1D31]">
                Rincian Biaya
            </h4>
            <p class="text-[9px] text-slate-400 mt-0.5">
                Perhitungan tagihan layanan dan sistem
            </p>
        </div>

        <div class="space-y-2 text-xs">
            <div class="flex items-center justify-between text-[10px]">
                <span class="text-slate-500">Harga Layanan Bersihkan Rumah</span>
                <span class="font-medium text-slate-700">Rp130.000</span>
            </div>

            <div class="flex items-center justify-between text-[10px]">
                <span class="text-slate-500">Biaya Layanan Platform</span>
                <span class="font-medium text-slate-700">Rp10.000</span>
            </div>

            <div class="pt-2 border-t border-slate-100 flex items-center justify-between">
                <span class="text-xs font-bold text-slate-800">Total Tagihan</span>
                <span class="text-sm font-extrabold text-[#173B67]">Rp140.000</span>
            </div>
        </div>
    </section>

    {{-- STATUS PEMBAYARAN TIMELINE --}}
    <section class="detail-card p-4">
        <div class="mb-3">
            <h4 class="text-xs font-bold text-[#0E1D31]">
                Riwayat Status Transaksi
            </h4>
            <p class="text-[9px] text-slate-400 mt-0.5">
                Log proses pembayaran
            </p>
        </div>

        <div class="space-y-3 text-xs pl-2 border-l-2 border-slate-100 ml-1">
            <div class="relative pl-3">
                <span class="absolute -left-[18px] top-1 w-2.5 h-2.5 rounded-full bg-emerald-500 ring-4 ring-white"></span>
                <p class="text-[10px] font-bold text-slate-800">Tagihan Dibuat</p>
                <p class="text-[8px] text-slate-400">31 Agustus 2026, 10:20 WIB</p>
            </div>

            <div class="relative pl-3">
                <span class="absolute -left-[18px] top-1 w-2.5 h-2.5 rounded-full bg-amber-400 ring-4 ring-white animate-pulse"></span>
                <p class="text-[10px] font-bold text-slate-800">Menunggu Pembayaran Customer</p>
                <p class="text-[8px] text-amber-600 font-medium">Batas bayar: 23 jam lagi</p>
            </div>

            <div class="relative pl-3 opacity-50">
                <span class="absolute -left-[18px] top-1 w-2.5 h-2.5 rounded-full bg-slate-300 ring-4 ring-white"></span>
                <p class="text-[10px] font-semibold text-slate-500">Verifikasi Otomatis</p>
                <p class="text-[8px] text-slate-400">Belum diproses sistem</p>
            </div>
        </div>
    </section>

    {{-- TOMBOL AKSI INTERAKTIF --}}
    <section class="pt-2 pb-6 grid grid-cols-2 gap-2">
        <a
            href="{{ route('admin.pesanan.detail', 1024) }}"
            class="py-3 px-3 rounded-2xl bg-white border border-slate-200 text-slate-700 text-xs font-bold text-center shadow-sm hover:bg-slate-50 active:scale-95 transition-all inline-flex items-center justify-center gap-1.5"
        >
            <i class="fa-solid fa-file-lines text-xs text-slate-400"></i>
            Lihat Pesanan
        </a>

        <button
            type="button"
            onclick="showToast('Verifikasi Berhasil', 'Pembayaran #PAY{{ $id ?? '1024' }} telah diverifikasi secara manual.', 'success')"
            class="py-3 px-3 rounded-2xl bg-[#173B67] hover:bg-[#1E4E8C] text-white text-xs font-bold text-center shadow-md active:scale-95 transition-all inline-flex items-center justify-center gap-1.5 border border-sky-400/30"
        >
            <i class="fa-solid fa-check-double text-xs text-sky-400"></i>
            Konfirmasi Manual
        </button>
    </section>

</div>

@endsection
