@extends('layouts.admin')

@section('title', 'Detail Pembayaran - SayaBantu.com')

@section('content')

{{-- =========================================================
HEADER
========================================================= --}}

<section class="mb-5">


<a
    href="{{ route('admin.pembayaran') }}"
    class="mb-4 inline-flex items-center gap-1.5 text-[10px] font-semibold text-blueMain"
>
    <span class="text-sm">←</span>
    Kembali
</a>

<p class="text-xs font-medium text-slate-500">
    Informasi transaksi
</p>

<h2 class="mt-1 text-2xl font-bold tracking-tight text-primary">
    Detail Pembayaran
</h2>

<p class="mt-1 text-xs text-slate-500">
    Detail transaksi pembayaran pelanggan.
</p>


</section>

{{-- =========================================================
PAYMENT STATUS CARD
========================================================= --}}

<section class="mb-5">

<div
    class="rounded-[20px] border border-blue-100/70 bg-gradient-to-br from-blue-50 via-white to-blue-50/60 p-5 shadow-sm"
>

    <div class="flex items-start justify-between gap-3">

        <div>

            <p class="text-[10px] font-medium text-slate-400">
                Nomor Pembayaran
            </p>

            <h3 class="mt-1 text-base font-bold text-primary">
                #PAY1024
            </h3>

        </div>


        <span
            class="rounded-full bg-yellow-50 px-3 py-1.5 text-[9px] font-semibold text-yellow-700"
        >
            Menunggu
        </span>

    </div>


    <div class="mt-5">

        <p class="text-[10px] font-medium text-slate-400">
            Total Pembayaran
        </p>

        <p class="mt-1 text-2xl font-bold tracking-tight text-primary">
            Rp140.000
        </p>

    </div>

</div>

</section>

{{-- =========================================================
DETAIL TRANSAKSI
========================================================= --}}

<section class="mb-5">


<div class="mb-3">

    <h3 class="text-base font-bold text-primary">
        Detail Transaksi
    </h3>

    <p class="mt-1 text-[10px] text-slate-400">
        Informasi pembayaran
    </p>

</div>


<div class="glass-card rounded-[20px] p-4">

    <div class="space-y-4">


        {{-- ID TRANSAKSI --}}

        <div class="flex items-center justify-between gap-4">

            <span class="text-[10px] text-slate-400">
                ID Transaksi
            </span>

            <span class="text-[10px] font-semibold text-slate-700">
                #PAY1024
            </span>

        </div>


        {{-- ID PESANAN --}}

        <div class="flex items-center justify-between gap-4">

            <span class="text-[10px] text-slate-400">
                ID Pesanan
            </span>

            <a
                href="#"
                class="text-[10px] font-semibold text-blueMain"
            >
                #SB1024
            </a>

        </div>


        {{-- CUSTOMER --}}

        <div class="flex items-center justify-between gap-4">

            <span class="text-[10px] text-slate-400">
                Customer
            </span>

            <span class="text-[10px] font-semibold text-slate-700">
                Andi
            </span>

        </div>


        {{-- MITRA --}}

        <div class="flex items-center justify-between gap-4">

            <span class="text-[10px] text-slate-400">
                Mitra
            </span>

            <span class="text-[10px] font-semibold text-slate-700">
                Budi
            </span>

        </div>


        {{-- METODE --}}

        <div class="flex items-center justify-between gap-4">

            <span class="text-[10px] text-slate-400">
                Metode Pembayaran
            </span>

            <span class="text-[10px] font-semibold text-slate-700">
                Transfer Bank
            </span>

        </div>


        {{-- WAKTU --}}

        <div class="flex items-center justify-between gap-4">

            <span class="text-[10px] text-slate-400">
                Waktu Transaksi
            </span>

            <span class="text-[10px] font-semibold text-slate-700">
                31 Agustus 2026, 10:25
            </span>

        </div>


    </div>

</div>


</section>

{{-- =========================================================
RINCIAN PEMBAYARAN
========================================================= --}}

<section class="mb-5">


<div class="mb-3">

    <h3 class="text-base font-bold text-primary">
        Rincian Pembayaran
    </h3>

    <p class="mt-1 text-[10px] text-slate-400">
        Rincian biaya pesanan
    </p>

</div>


<div class="glass-card rounded-[20px] p-4">

    <div class="space-y-3">


        {{-- HARGA LAYANAN --}}

        <div class="flex items-center justify-between">

            <span class="text-[10px] text-slate-500">
                Harga layanan
            </span>

            <span class="text-[10px] font-medium text-slate-700">
                Rp130.000
            </span>

        </div>


        {{-- BIAYA ADMIN --}}

        <div class="flex items-center justify-between">

            <span class="text-[10px] text-slate-500">
                Biaya layanan
            </span>

            <span class="text-[10px] font-medium text-slate-700">
                Rp10.000
            </span>

        </div>


        {{-- GARIS --}}

        <div class="border-t border-slate-100 pt-3">


            <div class="flex items-center justify-between">

                <span class="text-xs font-semibold text-slate-700">
                    Total
                </span>

                <span class="text-sm font-bold text-primary">
                    Rp140.000
                </span>

            </div>


        </div>

    </div>

</div>

</section>

{{-- =========================================================
STATUS PEMBAYARAN
========================================================= --}}

<section class="mb-5">

<div class="mb-3">

    <h3 class="text-base font-bold text-primary">
        Status Pembayaran
    </h3>

    <p class="mt-1 text-[10px] text-slate-400">
        Riwayat status transaksi
    </p>

</div>


<div class="glass-card rounded-[20px] p-4">

    <div class="space-y-4">


        {{-- DIBUAT --}}

        <div class="status-line flex gap-3">

            <div
                class="mt-1 flex h-3 w-3 shrink-0 items-center justify-center rounded-full bg-green-500"
            >
            </div>

            <div>

                <p class="text-[10px] font-semibold text-slate-700">
                    Transaksi dibuat
                </p>

                <p class="mt-1 text-[9px] text-slate-400">
                    31 Agustus 2026, 10:20
                </p>

            </div>

        </div>


        {{-- MENUNGGU --}}

        <div class="status-line flex gap-3">

            <div
                class="mt-1 flex h-3 w-3 shrink-0 items-center justify-center rounded-full bg-yellow-400"
            >
            </div>

            <div>

                <p class="text-[10px] font-semibold text-slate-700">
                    Menunggu pembayaran
                </p>

                <p class="mt-1 text-[9px] text-slate-400">
                    31 Agustus 2026, 10:25
                </p>

            </div>

        </div>


        {{-- STATUS SAAT INI --}}

        <div class="flex gap-3">

            <div
                class="mt-1 flex h-3 w-3 shrink-0 rounded-full border-2 border-slate-200 bg-white"
            >
            </div>

            <div>

                <p class="text-[10px] font-semibold text-slate-400">
                    Menunggu konfirmasi
                </p>

                <p class="mt-1 text-[9px] text-slate-400">
                    Belum diproses
                </p>

            </div>

        </div>


    </div>

</div>


</section>

{{-- =========================================================
ACTION
========================================================= --}}

<section class="pb-2">

<div class="grid grid-cols-2 gap-2">

    <button
        type="button"
        class="rounded-[16px] border border-slate-200 bg-white px-4 py-3 text-[10px] font-semibold text-slate-600 shadow-sm"
    >
        Lihat Pesanan
    </button>


    <button
        type="button"
        class="rounded-[16px] bg-primary px-4 py-3 text-[10px] font-semibold text-white shadow-sm"
    >
        Konfirmasi Pembayaran
    </button>

</div>

</section>

@endsection
