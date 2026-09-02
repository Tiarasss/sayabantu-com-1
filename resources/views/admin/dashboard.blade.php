@extends('layouts.admin')

@section('title', 'Admin - SayaBantu.com')

@section('content')

{{-- =====================================================
PESANAN TERBARU
====================================================== --}}

<section
    class="pt-2"
>


{{-- SECTION HEADER --}}

<div
    class="mb-3 flex items-center justify-between"
>

    <div>

        <h2
            class="section-title"
        >
            Pesanan Terbaru
        </h2>

        <p
            class="mt-1 text-[9px] text-gray-400"
        >
            Pantau pesanan yang sedang berjalan
        </p>

    </div>


    <a
        href="{{ route('admin.pesanan') }}"
        class="section-link"
    >
        Lihat semua
    </a>

</div>


{{-- =================================================
     PESANAN CARD
================================================== --}}

<div
    class="pesanan-card"
>


    {{-- PESANAN 1 --}}

    <div
        class="pesanan-item flex cursor-pointer items-center gap-3 p-4"
    >

        <div
            class="icon-box icon-blue shrink-0"
        >

            <i
                class="fa-solid fa-broom text-sm"
            ></i>

        </div>


        <div
            class="min-w-0 flex-1"
        >

            <div
                class="flex items-center justify-between gap-2"
            >

                <h3
                    class="truncate text-xs font-semibold text-gray-900"
                >
                    Full Home Cleaning
                </h3>


                <span
                    class="status status-warning shrink-0"
                >
                    Diproses
                </span>

            </div>


            <p
                class="mt-1 text-[10px] text-gray-500"
            >
                Pesanan #SB-00124
            </p>


            <div
                class="mt-1 flex items-center gap-1.5 text-[9px] text-gray-400"
            >

                <i
                    class="fa-regular fa-clock"
                ></i>

                10 menit lalu

            </div>

        </div>


        <i
            class="fa-solid fa-chevron-right text-[9px] text-gray-300"
        ></i>

    </div>


    {{-- DIVIDER --}}

    <div
        class="h-px bg-gray-100"
    ></div>


    {{-- PESANAN 2 --}}

    <div
        class="pesanan-item flex cursor-pointer items-center gap-3 p-4"
    >

        <div
            class="icon-box icon-amber shrink-0"
        >

            <i
                class="fa-solid fa-truck text-sm"
            ></i>

        </div>


        <div
            class="min-w-0 flex-1"
        >

            <div
                class="flex items-center justify-between gap-2"
            >

                <h3
                    class="truncate text-xs font-semibold text-gray-900"
                >
                    Angkut Barang
                </h3>


                <span
                    class="status status-success shrink-0"
                >
                    Selesai
                </span>

            </div>


            <p
                class="mt-1 text-[10px] text-gray-500"
            >
                Pesanan #SB-00123
            </p>


            <div
                class="mt-1 flex items-center gap-1.5 text-[9px] text-gray-400"
            >

                <i
                    class="fa-regular fa-clock"
                ></i>

                32 menit lalu

            </div>

        </div>


        <i
            class="fa-solid fa-chevron-right text-[9px] text-gray-300"
        ></i>

    </div>


    {{-- DIVIDER --}}

    <div
        class="h-px bg-gray-100"
    ></div>


    {{-- PESANAN 3 --}}

    <div
        class="pesanan-item flex cursor-pointer items-center gap-3 p-4"
    >

        <div
            class="icon-box icon-green shrink-0"
        >

            <i
                class="fa-solid fa-bag-shopping text-sm"
            ></i>

        </div>


        <div
            class="min-w-0 flex-1"
        >

            <div
                class="flex items-center justify-between gap-2"
            >

                <h3
                    class="truncate text-xs font-semibold text-gray-900"
                >
                    Belanja
                </h3>


                <span
                    class="status status-success shrink-0"
                >
                    Selesai
                </span>

            </div>


            <p
                class="mt-1 text-[10px] text-gray-500"
            >
                Pesanan #SB-00122
            </p>


            <div
                class="mt-1 flex items-center gap-1.5 text-[9px] text-gray-400"
            >

                <i
                    class="fa-regular fa-clock"
                ></i>

                1 jam lalu

            </div>

        </div>


        <i
            class="fa-solid fa-chevron-right text-[9px] text-gray-300"
        ></i>

    </div>


</div>

</section>

{{-- =====================================================
AKTIVITAS TERBARU
====================================================== --}}

<section
    class="mt-6"
>


{{-- SECTION HEADER --}}

<div
    class="mb-3 flex items-center justify-between"
>

    <div>

        <h2
            class="section-title"
        >
            Aktivitas Terbaru
        </h2>

        <p
            class="mt-1 text-[9px] text-gray-400"
        >
            Aktivitas sistem terbaru
        </p>

    </div>


    <span
        class="flex items-center gap-1.5 text-[9px] font-medium text-green-600"
    >

        <span
            class="h-1.5 w-1.5 animate-pulse rounded-full bg-green-500"
        ></span>

        Live

    </span>

</div>


{{-- ACTIVITY CARD --}}

<div
    class="admin-card p-4"
>


    {{-- ACTIVITY 1 --}}

    <div
        class="flex items-center gap-3"
    >

        <div
            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-green-50 text-green-600"
        >

            <i
                class="fa-solid fa-check text-[11px]"
            ></i>

        </div>


        <div
            class="min-w-0 flex-1"
        >

            <p
                class="text-[10px] font-semibold text-gray-800"
            >
                Pembayaran berhasil
            </p>

            <p
                class="mt-0.5 text-[9px] text-gray-400"
            >
                Pesanan #SB-00123
            </p>

        </div>


        <span
            class="text-[8px] text-gray-400"
        >
            5m
        </span>

    </div>


    <div
        class="my-3 h-px bg-gray-100"
    ></div>


    {{-- ACTIVITY 2 --}}

    <div
        class="flex items-center gap-3"
    >

        <div
            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-blue-50 text-blue-600"
        >

            <i
                class="fa-solid fa-user-plus text-[11px]"
            ></i>

        </div>


        <div
            class="min-w-0 flex-1"
        >

            <p
                class="text-[10px] font-semibold text-gray-800"
            >
                Mitra baru terdaftar
            </p>

            <p
                class="mt-0.5 text-[9px] text-gray-400"
            >
                Menunggu verifikasi
            </p>

        </div>


        <span
            class="text-[8px] text-gray-400"
        >
            18m
        </span>

    </div>


    <div
        class="my-3 h-px bg-gray-100"
    ></div>


    {{-- ACTIVITY 3 --}}

    <div
        class="flex items-center gap-3"
    >

        <div
            class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full bg-amber-50 text-amber-600"
        >

            <i
                class="fa-solid fa-star text-[11px]"
            ></i>

        </div>


        <div
            class="min-w-0 flex-1"
        >

            <p
                class="text-[10px] font-semibold text-gray-800"
            >
                Rating baru diterima
            </p>

            <p
                class="mt-0.5 text-[9px] text-gray-400"
            >
                Customer memberikan rating 5.0
            </p>

        </div>


        <span
            class="text-[8px] text-gray-400"
        >
            42m
        </span>

    </div>


</div>


</section>

@endsection
