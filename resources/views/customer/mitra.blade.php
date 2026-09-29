@extends('layouts.customer')

@section('title', 'Mitra SayaBantu - Per Kota')

@section('page-top')
<div class="customer-top-area">
    <div class="header-circle-one"></div>
    <div class="header-circle-two"></div>

    @include('customer.partials.mobile-header')

    <section class="relative z-10 px-5 pt-1 pb-5">
        <a href="{{ route('customer.index') }}" class="inline-flex items-center gap-1.5 text-[10px] font-semibold text-white/75 mb-2">
            <i class="fa-solid fa-arrow-left text-[9px]"></i>
            Kembali ke Beranda
        </a>
        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-white/10 border border-white/15 text-[9px] font-bold text-sky-200">
            <i class="fa-solid fa-users text-[8px]"></i> Halaman Publik
        </span>
        <h1 class="mt-2 text-[20px] font-bold tracking-tight text-white">Mitra Per Kota</h1>
        <p class="mt-1 text-[10px] text-white/70">Pilih kota Anda untuk melihat personil terlatih &amp; terverifikasi di sekitarnya.</p>
    </section>
</div>
@endsection

@section('content')
<main class="content-under-gradient px-4 pt-3 pb-4 space-y-3.5">

    @php
        $mitraPerKota = [
            'Jakarta' => [
                ['name' => 'Adam Julian Tjiu', 'service' => 'Full Home Cleaning & Servis AC', 'area' => 'Jakarta Pusat (Menteng)', 'rating' => '4.9', 'tasks' => 164, 'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&auto=format&fit=crop&q=80'],
                ['name' => 'Bambang Sutrisno', 'service' => 'Pindahan, Angkut Beban & Logistik', 'area' => 'Jakarta Selatan (Tebet)', 'rating' => '4.9', 'tasks' => 142, 'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&auto=format&fit=crop&q=80'],
                ['name' => 'Achmad Akbar', 'service' => 'Tukang Ledeng & Perbaikan Rumah', 'area' => 'Jakarta Timur', 'rating' => '4.8', 'tasks' => 95, 'image' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=150&auto=format&fit=crop&q=80'],
            ],
            'Bogor' => [
                ['name' => 'Rizky Pratama', 'service' => 'Antar Jemput & Belanja Harian', 'area' => 'Bogor (Pajajaran)', 'rating' => '4.8', 'tasks' => 76, 'image' => 'https://images.unsplash.com/photo-1504257432389-52343af06ae3?w=150&auto=format&fit=crop&q=80'],
                ['name' => 'Dewi Lestari', 'service' => 'Daily Cleaning & Cuci Piring', 'area' => 'Bogor (Cibinong)', 'rating' => '4.9', 'tasks' => 88, 'image' => 'https://images.unsplash.com/photo-1544005313-94ddf0286df2?w=150&auto=format&fit=crop&q=80'],
            ],
            'Depok' => [
                ['name' => 'Siti Rahmawati', 'service' => 'Belanja Pasar Subuh & Titip Antre RS', 'area' => 'Depok (Margonda)', 'rating' => '5.0', 'tasks' => 87, 'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=150&auto=format&fit=crop&q=80'],
                ['name' => 'Nesya Putri', 'service' => 'Rawat Hewan Peliharaan & Daily Cleaning', 'area' => 'Depok (Kelapa Dua)', 'rating' => '5.0', 'tasks' => 112, 'image' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80'],
            ],
            'Tangerang' => [
                ['name' => 'Dio Alfianto', 'service' => 'Nemenin Olahraga & Pantau Lapangan', 'area' => 'Tangerang Selatan', 'rating' => '4.9', 'tasks' => 120, 'image' => 'https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?w=150&auto=format&fit=crop&q=80'],
                ['name' => 'Hendra Wijaya', 'service' => 'Servis & Cuci AC', 'area' => 'Tangerang (Ciledug)', 'rating' => '4.7', 'tasks' => 64, 'image' => 'https://images.unsplash.com/photo-1517841905240-472988babdf9?w=150&auto=format&fit=crop&q=80'],
            ],
            'Bekasi' => [
                ['name' => 'Abdul Rojak', 'service' => 'Driver Antar Jemput & Pindahan', 'area' => 'Bekasi Barat', 'rating' => '4.8', 'tasks' => 175, 'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=150&auto=format&fit=crop&q=80'],
                ['name' => 'Fajar Ramadhani', 'service' => 'Kurir Cepat, Antar Dokumen & Belanja', 'area' => 'Bekasi Timur', 'rating' => '4.9', 'tasks' => 130, 'image' => 'https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?w=150&auto=format&fit=crop&q=80'],
            ],
            'Bandung' => [
                ['name' => 'Yoga Saputra', 'service' => 'Full Home Cleaning & Pindahan Kos', 'area' => 'Bandung (Dago)', 'rating' => '4.9', 'tasks' => 98, 'image' => 'https://images.unsplash.com/photo-1506795660198-e95c77602129?w=150&auto=format&fit=crop&q=80'],
                ['name' => 'Rina Kartika', 'service' => 'Belanja & Titip Antre', 'area' => 'Bandung (Buah Batu)', 'rating' => '4.8', 'tasks' => 71, 'image' => 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?w=150&auto=format&fit=crop&q=80'],
            ],
            'Solo' => [
                ['name' => 'Bagus Setiawan', 'service' => 'Tukang Serbaguna & Servis AC', 'area' => 'Solo (Laweyan)', 'rating' => '4.8', 'tasks' => 59, 'image' => 'https://images.unsplash.com/photo-1463453091185-61582044d556?w=150&auto=format&fit=crop&q=80'],
                ['name' => 'Anisa Pramesti', 'service' => 'Daily Cleaning & Cuci Dapur', 'area' => 'Solo (Banjarsari)', 'rating' => '5.0', 'tasks' => 44, 'image' => 'https://images.unsplash.com/photo-1494790108377-be9c29b29330?w=150&auto=format&fit=crop&q=80'],
            ],
            'Yogyakarta' => [
                ['name' => 'Wisnu Handoko', 'service' => 'Pindahan Kos Mahasiswa & Angkut Beban', 'area' => 'Yogyakarta (Seturan)', 'rating' => '4.9', 'tasks' => 133, 'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&auto=format&fit=crop&q=80'],
                ['name' => 'Ratna Kusuma', 'service' => 'Rawat Kandang Hewan & Belanja Pasar', 'area' => 'Yogyakarta (Umbulharjo)', 'rating' => '4.9', 'tasks' => 67, 'image' => 'https://images.unsplash.com/photo-1531746020798-e6953c6e8e04?w=150&auto=format&fit=crop&q=80'],
            ],
        ];

        $totalMitra = 0;
        foreach ($mitraPerKota as $list) { $totalMitra += count($list); }
    @endphp

    {{-- INFO PENUGASAN OTOMATIS --}}
    <section class="card-sb p-3.5">
        <div class="p-2.5 rounded-xl bg-blue-50/80 border border-blue-200/80 flex items-start gap-2 text-[10.5px]">
            <i class="fa-solid fa-wand-magic-sparkles text-sky-600 mt-0.5 shrink-0"></i>
            <p class="text-slate-700 leading-snug">
                <strong>Penugasan Otomatis:</strong> Anda tidak perlu repot memilih mitra. Saat Anda membuat suruhan, sistem cerdas kami akan <strong>otomatis memilihkan mitra terdekat dengan rating terbaik</strong>.
            </p>
        </div>
    </section>

    {{-- FILTER KOTA --}}
    <section class="card-sb p-3.5 space-y-3">
        <div class="flex items-center justify-between px-1">
            <div>
                <h2 class="text-xs font-bold text-[#0E1D31] flex items-center gap-1.5">
                    <i class="fa-solid fa-location-dot text-rose-500"></i> Mitra Per Kota
                </h2>
                <p class="text-[9px] text-slate-400">Pilih kota untuk memfilter personil</p>
            </div>
            <span id="jumlahMitraTotal" class="text-[9px] font-bold text-emerald-800 bg-emerald-100 px-2 py-0.5 rounded-full">
                {{ $totalMitra }} personil
            </span>
        </div>

        <div class="flex items-center gap-1.5 overflow-x-auto pb-1 text-[9.5px]">
            <button type="button" onclick="filterKotaMitra('all', this)" class="btn-kota-filter px-2.5 py-1 rounded-full font-bold bg-[#0E1D31] text-white shrink-0 transition-all">
                Semua
            </button>
            @foreach($mitraPerKota as $kota => $list)
                <button type="button" onclick="filterKotaMitra('{{ $kota }}', this)" class="btn-kota-filter px-2.5 py-1 rounded-full font-medium bg-slate-100 text-slate-700 shrink-0 hover:bg-slate-200 transition-all">
                    {{ $kota }} ({{ count($list) }})
                </button>
            @endforeach
        </div>
    </section>

    {{-- DAFTAR MITRA DIKELOMPOKKAN PER KOTA --}}
    @foreach($mitraPerKota as $kota => $list)
        <section class="card-sb p-3.5 space-y-3 mitra-kota-group" data-kota="{{ $kota }}">
            <div class="flex items-center justify-between border-b border-slate-100 pb-2">
                <div class="flex items-center gap-2">
                    <div class="w-7 h-7 rounded-lg bg-[#0E1D31] text-white flex items-center justify-center text-[11px]">
                        <i class="fa-solid fa-city"></i>
                    </div>
                    <div>
                        <h3 class="text-xs font-bold text-[#0E1D31] leading-none">{{ $kota }}</h3>
                        <p class="text-[9px] text-slate-400 mt-0.5">{{ count($list) }} mitra siap tugas</p>
                    </div>
                </div>
                <span class="text-[9px] font-bold text-emerald-800 bg-emerald-100 px-2 py-0.5 rounded-full">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-500 inline-block mr-0.5"></span>Tersedia
                </span>
            </div>

            <div class="space-y-2.5">
                @foreach($list as $mitra)
                    <article class="p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-start gap-3 hover:border-sky-300 transition-all">
                        <div class="relative shrink-0">
                            <img
                                src="{{ $mitra['image'] }}"
                                alt="{{ $mitra['name'] }}"
                                class="w-12 h-12 rounded-xl object-cover border border-white shadow-xs"
                                onerror="this.src='https://ui-avatars.com/api/?name={{ urlencode($mitra['name']) }}&background=173B67&color=fff'"
                            >
                            <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 rounded-full bg-emerald-500 border-2 border-white" title="Online Standby"></span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <div class="flex items-center justify-between gap-2">
                                <h4 class="text-xs font-bold text-slate-900 truncate">{{ $mitra['name'] }}</h4>
                                <span class="text-[10px] text-amber-500 font-bold shrink-0">
                                    ★ {{ $mitra['rating'] }} <span class="text-slate-400 font-normal text-[9px]">({{ $mitra['tasks'] }})</span>
                                </span>
                            </div>
                            <p class="text-[9px] text-sky-700 font-semibold mt-0.5">{{ $mitra['service'] }}</p>
                            <p class="text-[9px] text-slate-500 mt-1">
                                <i class="fa-solid fa-location-dot text-rose-500"></i> {{ $mitra['area'] }}
                                <span class="mx-0.5">•</span>
                                <span class="text-emerald-700 font-medium"><i class="fa-solid fa-shield-check"></i> Terverifikasi</span>
                            </p>
                        </div>
                        <button
                            type="button"
                            onclick='openBocahModal(@json($mitra["name"]), @json($mitra["image"]), @json($mitra["service"]), @json("★ " . $mitra["rating"] . " (" . $mitra["tasks"] . " Tugas)"), @json($mitra["area"]))'
                            class="shrink-0 px-2.5 py-1.5 rounded-lg bg-slate-200 hover:bg-slate-300 text-slate-800 text-[9.5px] font-bold self-center transition-colors"
                        >
                            Profil
                        </button>
                    </article>
                @endforeach
            </div>
        </section>
    @endforeach

</main>
@endsection

@push('scripts')
<script>
    // Filter grup mitra berdasarkan kota
    function filterKotaMitra(kota, btn) {
        document.querySelectorAll('.btn-kota-filter').forEach(b => {
            b.classList.remove('bg-[#0E1D31]', 'text-white', 'font-bold');
            b.classList.add('bg-slate-100', 'text-slate-700', 'font-medium');
        });
        btn.classList.remove('bg-slate-100', 'text-slate-700', 'font-medium');
        btn.classList.add('bg-[#0E1D31]', 'text-white', 'font-bold');

        let personil = 0;
        document.querySelectorAll('.mitra-kota-group').forEach(group => {
            const grupKota = group.getAttribute('data-kota');
            if (kota === 'all' || grupKota === kota) {
                group.classList.remove('hidden');
                personil += group.querySelectorAll('article').length;
            } else {
                group.classList.add('hidden');
            }
        });

        const totalEl = document.getElementById('jumlahMitraTotal');
        if (totalEl) totalEl.innerText = personil + ' personil';
    }
</script>
@endpush

@section('content')
<main class="px-4 pt-3 pb-4 space-y-3.5">
    <section class="card-sb p-3.5">
        <div class="p-2.5 rounded-xl bg-blue-50/80 border-blue-200/80 flex items-start gap-2 text-[10.5px]">
            <i class="fa-solid fa-wand-magic-sparkles text-sky-600 mt-0.5 shrink-0"></i>
            <p class="text-slate-700 leading-snug">
                <strong>Penugasan Otomatis:</strong> Anda tidak perlu repot memilih mitra. Saat Anda membuat suruhan, sistem cerdas kami akan <strong>otomatis memilihkan mitra terdekat dengan rating terbaik</strong>.
            </p>
        </div>
    </section>

    <section class="card-sb p-3.5 space-y-3">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-xs font-bold text-[#0E1D31]">Mitra Siap Kerja</h2>
                <p class="text-[9px] text-slate-400 mt-0.5">Personil terlatih, ber-KTP &amp; SKCK</p>
            </div>
            <span class="text-[9px] font-bold text-emerald-800 bg-emerald-100 px-2 py-0.5 rounded-full">10+ siap tugas</span>
        </div>

        <div class="space-y-2.5">
            @foreach([
                ['name' => 'Adam Julian Tjiu', 'service' => 'Full Home Cleaning & Servis AC', 'location' => 'Jakarta Pusat (Menteng)', 'rating' => '4.9', 'image' => 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=150&auto=format&fit=crop&q=80'],
                ['name' => 'Bambang Sutrisno', 'service' => 'Pindahan, Angkut Beban & Logistik', 'location' => 'Jakarta Selatan (Tebet)', 'rating' => '4.9', 'image' => 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&auto=format&fit=crop&q=80'],
                ['name' => 'Siti Rahmawati', 'service' => 'Belanja Pasar Subuh & Titip Antre RS', 'location' => 'Depok (Margonda)', 'rating' => '5.0', 'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2?w=150&auto=format&fit=crop&q=80'],
                ['name' => 'Abdul Rojak', 'service' => 'Driver Antar Jemput & Pindahan', 'location' => 'Bekasi Barat', 'rating' => '4.8', 'image' => 'https://images.unsplash.com/photo-1506794778202-cad84cf45f1d?w=150&auto=format&fit=crop&q=80'],
                ['name' => 'Nesya Putri', 'service' => 'Rawat Hewan Peliharaan & Daily Cleaning', 'location' => 'Depok (Kelapa Dua)', 'rating' => '5.0', 'image' => 'https://images.unsplash.com/photo-1534528741775-53994a69daeb?w=150&auto=format&fit=crop&q=80'],
                ['name' => 'Fajar Ramadhani', 'service' => 'Kurir Cepat, Antar Dokumen & Belanja', 'location' => 'Bekasi Timur', 'rating' => '4.9', 'image' => 'https://images.unsplash.com/photo-1492562080023-ab3db95bfbce?w=150&auto=format&fit=crop&q=80'],
                ['name' => 'Achmad Akbar', 'service' => 'Tukang Ledeng Bocor & Perbaikan Rumah', 'location' => 'Jakarta Timur', 'rating' => '4.8', 'image' => 'https://images.unsplash.com/photo-1519085360753-af0119f7cbe7?w=150&auto=format&fit=crop&q=80'],
                ['name' => 'Dio Alfianto', 'service' => 'Nemenin Olahraga & Pantau Lapangan', 'location' => 'Tangerang Selatan', 'rating' => '4.9', 'image' => 'https://images.unsplash.com/photo-1522075469751-3a6694fb2f61?w=150&auto=format&fit=crop&q=80'],
            ] as $mitra)
                <article class="p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-start gap-3 hover:border-sky-300 transition-all">
                    <div class="relative shrink-0">
                        <img src="{{ $mitra['image'] }}" alt="{{ $mitra['name'] }}" class="w-12 h-12 rounded-xl object-cover border border-white shadow-xs">
                        <span class="absolute -bottom-0.5 -right-0.5 w-3 h-3 rounded-full bg-emerald-500 border-2 border-white" title="Online Standby"></span>
                    </div>
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center justify-between gap-2">
                            <h3 class="text-xs font-bold text-slate-900 truncate">{{ $mitra['name'] }}</h3>
                            <span class="text-[10px] text-amber-500 font-bold shrink-0">★ {{ $mitra['rating'] }}</span>
                        </div>
                        <p class="text-[9px] text-sky-700 font-semibold mt-0.5">{{ $mitra['service'] }}</p>
                        <p class="text-[9px] text-slate-500 mt-1"><i class="fa-solid fa-location-dot text-rose-500"></i> {{ $mitra['location'] }} · <span class="text-emerald-700">Terverifikasi</span></p>
                    </div>
                    <button
                        type="button"
                        onclick='openBocahModal(@json($mitra["name"]), @json($mitra["image"]), @json($mitra["service"]), @json("★ " . $mitra["rating"] . " Tugas"), @json($mitra["location"]))'
                        class="shrink-0 px-2.5 py-1.5 rounded-lg bg-slate-200 hover:bg-slate-300 text-slate-800 text-[9.5px] font-bold self-center transition-colors"
                    >
                        Profil
                    </button>
                </article>
            @endforeach
        </div>
    </section>

    <section class="card-sb p-3.5 space-y-2.5 text-center">
        <h3 class="text-xs font-bold text-[#0E1D31]">Butuh Bantuan Personil?</h3>
        <p class="text-[10px] text-slate-500 leading-relaxed">
            Buat pesanan dan sistem akan menugaskan mitra terdekat secara otomatis.
        </p>
        <a href="{{ route('customer.index') }}#orderFormCard" class="block w-full py-3 rounded-xl bg-[#0E1D31] text-white text-center text-xs font-bold hover:bg-[#173B67] transition-colors">
            <i class="fa-solid fa-pen-to-square mr-1"></i> Buat Pesanan Sekarang
        </a>
    </section>
</main>
@endsection
