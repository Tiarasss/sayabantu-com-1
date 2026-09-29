@extends('layouts.admin')

@section('title', 'Detail Pesanan #' . $id . ' - SayaBantu.com')
@section('back-url', route('admin.pesanan'))
@section('back-text', 'Kembali ke Pesanan')
@section('page-title', 'Detail Pesanan')
@section('page-subtitle', 'Informasi dan status pemesanan layanan')

{{-- =========================================================
     TOP HERO AREA
========================================================= --}}
@section('hero')
<section class="relative z-10 px-5 pb-5 pt-1">
    <div class="flex items-start justify-between gap-3 p-4 rounded-[22px] bg-white/[0.08] backdrop-blur-md border border-white/15 shadow-xl">
        <div>
            <p class="text-[9px] font-medium text-white/60">
                Nomor Pesanan
            </p>
            <h2 class="mt-1 text-[20px] font-bold tracking-tight text-white flex items-center gap-2">
                #SB{{ $id }}
                <span class="text-[10px] font-normal text-white/50">• Servis Rumah</span>
            </h2>
        </div>

        <span class="mt-1 inline-flex shrink-0 items-center rounded-full border border-amber-300/30 bg-amber-400/15 px-3 py-1 text-[8.5px] font-semibold text-amber-200">
            <span class="w-1.5 h-1.5 rounded-full bg-amber-400 mr-1.5 animate-pulse"></span>
            Diproses
        </span>
    </div>
</section>
@endsection

{{-- =========================================================
     CONTENT DETAIL
========================================================= --}}
@section('content')

<div class="detail-main space-y-4">


    {{-- =====================================================
    INFORMASI LAYANAN
    ====================================================== --}}

    <section>

        <div class="detail-card p-4">

            <div class="mb-5">

                <p class="text-[9px] text-slate-400">
                    Layanan
                </p>

                <h3 class="mt-1 text-[17px] font-bold text-navy">
                    Bersihkan Rumah
                </h3>

            </div>


            <div class="space-y-4">

                {{-- CUSTOMER --}}
                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-[9px] text-slate-400">
                            Customer
                        </p>

                        <p class="mt-1 text-[11px] font-semibold text-slate-700">
                            Andi
                        </p>

                    </div>

                    <div
                        class="flex h-9 w-9 items-center justify-center rounded-full border border-blue-100 bg-blue-50 text-[11px] font-bold text-blue-600"
                    >
                        A
                    </div>

                </div>


                {{-- MITRA --}}
                <div class="flex items-center justify-between">

                    <div>

                        <p class="text-[9px] text-slate-400">
                            Mitra
                        </p>

                        <p class="mt-1 text-[11px] font-semibold text-slate-700">
                            Budi
                        </p>

                    </div>

                    <div
                        class="flex h-9 w-9 items-center justify-center rounded-full border border-green-100 bg-green-50 text-[11px] font-bold text-green-600"
                    >
                        B
                    </div>

                </div>


                {{-- TANGGAL --}}
                <div class="flex justify-between gap-4">

                    <span class="text-[9px] text-slate-400">
                        Tanggal
                    </span>

                    <span class="text-right text-[10px] font-semibold text-slate-700">
                        31 Agustus 2026
                    </span>

                </div>


                {{-- WAKTU --}}
                <div class="flex justify-between gap-4">

                    <span class="text-[9px] text-slate-400">
                        Waktu
                    </span>

                    <span class="text-right text-[10px] font-semibold text-slate-700">
                        10.00 - 12.00
                    </span>

                </div>


                {{-- ALAMAT --}}
                <div class="flex justify-between gap-5">

                    <span class="text-[9px] text-slate-400">
                        Alamat
                    </span>

                    <span class="max-w-[210px] text-right text-[10px] font-semibold leading-relaxed text-slate-700">
                        Jl. Kaliurang No. 25, Yogyakarta
                    </span>

                </div>

            </div>

        </div>

    </section>



    {{-- =====================================================
    DETAIL PEKERJAAN
    ====================================================== --}}

    <section>

        <div class="detail-card p-4">

            <h3 class="text-[13px] font-bold text-navy">
                Detail Pekerjaan
            </h3>

            <p class="mt-3 text-[10px] leading-relaxed text-slate-500">
                Customer membutuhkan bantuan untuk membersihkan
                rumah, meliputi ruang tamu, kamar tidur, dapur,
                kamar mandi, dan area teras.
            </p>


            <div class="mt-4 flex flex-wrap gap-2">

                <span class="rounded-full border border-blue-100 bg-blue-50 px-3 py-1.5 text-[8px] font-medium text-[#294D65]">
                    Ruang Tamu
                </span>

                <span class="rounded-full border border-blue-100 bg-blue-50 px-3 py-1.5 text-[8px] font-medium text-[#294D65]">
                    Kamar
                </span>

                <span class="rounded-full border border-blue-100 bg-blue-50 px-3 py-1.5 text-[8px] font-medium text-[#294D65]">
                    Dapur
                </span>

                <span class="rounded-full border border-blue-100 bg-blue-50 px-3 py-1.5 text-[8px] font-medium text-[#294D65]">
                    Kamar Mandi
                </span>

            </div>

        </div>

    </section>



    {{-- =====================================================
    PEMBAYARAN
    ====================================================== --}}

    <section>

        <div class="detail-card p-4">

            <div class="flex items-center justify-between gap-3">

                <div>

                    <h3 class="text-[13px] font-bold text-navy">
                        Pembayaran
                    </h3>

                    <p class="mt-1 text-[8px] text-slate-400">
                        Status transaksi pesanan
                    </p>

                </div>


                <span
                    class="inline-flex items-center gap-1.5 rounded-full border border-green-200 bg-green-50 px-3 py-1.5 text-[8px] font-bold text-green-700"
                >

                    <span class="flex h-3.5 w-3.5 items-center justify-center rounded-full bg-green-600 text-[7px] text-white">
                        ✓
                    </span>

                    Terkonfirmasi

                </span>

            </div>


            {{-- STATUS --}}
            <div class="mt-5 rounded-[15px] border border-green-100 bg-green-50/70 p-3">

                <div class="flex items-start gap-3">

                    <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-green-500 text-[13px] font-bold text-white">
                        ✓
                    </div>

                    <div>

                        <p class="text-[10px] font-bold text-green-700">
                            Pembayaran telah dikonfirmasi
                        </p>

                        <p class="mt-1 text-[8px] leading-relaxed text-green-600">
                            Pembayaran pesanan ini telah diperiksa
                            dan dikonfirmasi oleh Admin.
                        </p>

                    </div>

                </div>

            </div>


            {{-- NOMINAL --}}
            <div class="mt-5 space-y-3">

                <div class="flex justify-between">

                    <span class="text-[9px] text-slate-400">
                        Harga Layanan
                    </span>

                    <span class="text-[10px] font-semibold text-slate-700">
                        Rp150.000
                    </span>

                </div>


                <div class="flex justify-between">

                    <span class="text-[9px] text-slate-400">
                        Biaya Platform
                    </span>

                    <span class="text-[10px] font-semibold text-slate-700">
                        Rp5.000
                    </span>

                </div>


                <div class="border-t border-slate-100 pt-3">

                    <div class="flex justify-between">

                        <span class="text-[10px] font-semibold text-slate-700">
                            Total Pembayaran
                        </span>

                        <span class="text-[13px] font-bold text-navy">
                            Rp155.000
                        </span>

                    </div>

                </div>

            </div>


            {{-- INFORMASI TRANSAKSI --}}
            <div class="mt-4 rounded-[14px] border border-slate-100 bg-slate-50 p-3">

                <div class="flex justify-between gap-3">

                    <span class="text-[8px] text-slate-400">
                        Metode Pembayaran
                    </span>

                    <span class="text-[9px] font-semibold text-slate-600">
                        QRIS
                    </span>

                </div>


                <div class="mt-2 flex justify-between gap-3">

                    <span class="text-[8px] text-slate-400">
                        Waktu Pembayaran
                    </span>

                    <span class="text-right text-[9px] font-semibold text-slate-600">
                        31 Agustus 2026 • 09.15
                    </span>

                </div>

            </div>

        </div>

    </section>



    {{-- =====================================================
    STATUS PESANAN
    ====================================================== --}}

    <section>

        <div class="detail-card p-4">

            <h3 class="text-[13px] font-bold text-navy">
                Status Pesanan
            </h3>


            <div class="mt-5 space-y-5">


                {{-- STATUS 1 --}}
                <div class="relative flex gap-3">

                    <div class="relative z-10 mt-1 h-3 w-3 shrink-0 rounded-full bg-green-500 ring-4 ring-green-50">
                    </div>

                    <div>

                        <p class="text-[10px] font-semibold text-slate-700">
                            Pesanan dibuat
                        </p>

                        <p class="mt-1 text-[8px] text-slate-400">
                            31 Agustus 2026 • 08.30
                        </p>

                    </div>

                </div>


                {{-- STATUS 2 --}}
                <div class="relative flex gap-3">

                    <div class="relative z-10 mt-1 h-3 w-3 shrink-0 rounded-full bg-green-500 ring-4 ring-green-50">
                    </div>

                    <div>

                        <p class="text-[10px] font-semibold text-slate-700">
                            Mitra menerima pekerjaan
                        </p>

                        <p class="mt-1 text-[8px] text-slate-400">
                            31 Agustus 2026 • 09.00
                        </p>

                    </div>

                </div>


                {{-- STATUS 3 --}}
                <div class="relative flex gap-3">

                    <div class="relative z-10 mt-1 h-3 w-3 shrink-0 rounded-full bg-green-500 ring-4 ring-green-50">
                    </div>

                    <div>

                        <p class="text-[10px] font-semibold text-green-700">
                            Pembayaran terkonfirmasi
                        </p>

                        <p class="mt-1 text-[8px] text-green-600">
                            Dikonfirmasi oleh Admin • 09.20
                        </p>

                    </div>

                </div>


                {{-- STATUS 4 --}}
                <div class="relative flex gap-3">

                    <div class="relative z-10 mt-1 h-3 w-3 shrink-0 rounded-full bg-slate-300 ring-4 ring-slate-50">
                    </div>

                    <div>

                        <p class="text-[10px] font-semibold text-slate-400">
                            Layanan dimulai
                        </p>

                        <p class="mt-1 text-[8px] text-slate-400">
                            Belum dimulai
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </section>



    {{-- =====================================================
    TINDAKAN ADMIN
    ====================================================== --}}

    <section>

        <div class="detail-card p-4">

            <h3 class="text-[13px] font-bold text-navy">
                Tindakan Admin
            </h3>


            <div class="mt-4 space-y-2">

                {{-- TERKONFIRMASI --}}
                <button
                    type="button"
                    disabled
                    class="flex w-full items-center justify-center gap-2 rounded-[14px] border border-green-200 bg-green-50 px-4 py-3 text-[9px] font-semibold text-green-700"
                >

                    <span class="flex h-5 w-5 items-center justify-center rounded-full bg-green-500 text-[8px] text-white">
                        ✓
                    </span>

                    Pembayaran Terkonfirmasi

                </button>


                {{-- KONFIRMASI --}}
                <button
                    type="button"
                    class="w-full rounded-[14px] bg-gradient-to-r from-[#0E1D31] to-[#294D65] px-4 py-3 text-[9px] font-semibold text-white shadow-sm transition hover:opacity-95"
                >
                    Konfirmasi Pesanan
                </button>


                {{-- KONFLIK --}}
                <button
                    type="button"
                    class="w-full rounded-[14px] border border-red-200 bg-red-50 px-4 py-3 text-[9px] font-semibold text-red-600 transition hover:bg-red-100"
                >
                    Tandai sebagai Konflik
                </button>

            </div>

        </div>

    </section>



    {{-- =====================================================
    CATATAN ADMIN
    ====================================================== --}}

    <section>

        <div class="detail-card p-4">

            <h3 class="text-[13px] font-bold text-navy">
                Catatan Admin
            </h3>

            <p class="mt-1 text-[8px] text-slate-400">
                Catatan internal mengenai pesanan
            </p>


            <textarea
                rows="4"
                placeholder="Tambahkan catatan..."
                class="mt-4 w-full resize-none rounded-[14px] border border-slate-200 bg-slate-50 p-3 text-[9px] leading-relaxed text-slate-600 outline-none placeholder:text-slate-300 transition focus:border-[#4F7CAC] focus:bg-white focus:ring-2 focus:ring-blue-50"
            ></textarea>


            <button
                type="button"
                class="mt-3 w-full rounded-[13px] bg-[#EEF5FF] px-4 py-3 text-[9px] font-semibold text-[#294D65] transition hover:bg-[#E0EDFF]"
            >
                Simpan Catatan
            </button>

        </div>

    </section>

</div>

@endsection