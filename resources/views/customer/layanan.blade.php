@extends('layouts.customer')

@section('title', 'Semua Layanan & Jasa - SayaBantu.com')

@section('page-top')
<div class="customer-top-area">
    <div class="header-circle-one"></div>
    <div class="header-circle-two"></div>

    @include('customer.partials.mobile-header')

    <section id="pageTopContent" class="relative z-10 px-5 pt-1 pb-5">
        <a href="{{ route('customer.index') }}" class="inline-flex items-center gap-1.5 text-[10px] font-semibold text-white/75 mb-2">
            <i class="fa-solid fa-arrow-left text-[9px]"></i>
            Kembali ke Beranda
        </a>
        <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-white/10 border border-white/15 text-[9px] font-bold text-sky-200">
            <i class="fa-solid fa-list-check text-[8px]"></i> 16 Kategori Layanan
        </span>
        <h1 class="mt-2 text-[20px] font-bold tracking-tight text-white">Semua Layanan &amp; Jasa</h1>
        <p class="mt-1 text-[10px] text-white/70">Bebas dilihat tanpa login. Pilih layanan untuk langsung mengisi formulir pesanan.</p>
    </section>
</div>
@endsection

@section('content')
<main class="content-under-gradient px-4 pt-3 pb-4 space-y-3.5">

    @php
        $services = [
            ['cat' => 'bersih', 'name' => 'Full Home Cleaning', 'label' => 'Full Home Cleaning', 'icon' => 'fa-broom', 'color' => 'emerald', 'budget' => '85.000',
             'desc' => 'Pembersihan rumah menyeluruh meliputi kamar, ruang tamu, lantai dan debu.'],
            ['cat' => 'bersih', 'name' => 'Basic Daily Cleaning', 'label' => 'Basic Daily Cleaning', 'icon' => 'fa-spray-can-sparkles', 'color' => 'emerald', 'budget' => '50.000',
             'desc' => 'Sapu, pel lantai rutin, dan lap meja/kaca.'],
            ['cat' => 'bersih', 'name' => 'Bersihkan Kamar Mandi', 'label' => 'Bersihkan Kamar Mandi', 'icon' => 'fa-shower', 'color' => 'teal', 'budget' => '65.000',
             'desc' => 'Kuras bak, sikat kerak lantai kamar mandi & kloset kinclong.'],
            ['cat' => 'bersih', 'name' => 'Cuci Piring & Dapur Bersih', 'label' => 'Cuci Piring & Dapur', 'icon' => 'fa-sink', 'color' => 'cyan', 'budget' => '45.000',
             'desc' => 'Bantu cuci piring tumpuk, bersihkan kompor & wastafel.'],
            ['cat' => 'angkut', 'name' => 'Pindahan', 'label' => 'Pindahan Kos & Rumah', 'icon' => 'fa-boxes-packing', 'color' => 'blue', 'budget' => '150.000',
             'desc' => 'Bantu packing, angkat barang pindahan kos/rumah ke kendaraan.'],
            ['cat' => 'angkut', 'name' => 'Angkut Barang', 'label' => 'Angkut Barang Berat', 'icon' => 'fa-dolly', 'color' => 'blue', 'budget' => '80.000',
             'desc' => 'Angkat lemari, kulkas, kasur, atau tata ulang perabotan.'],
            ['cat' => 'angkut', 'name' => 'Buang Sampah', 'label' => 'Buang Sampah & Puing', 'icon' => 'fa-trash-can', 'color' => 'slate', 'budget' => '40.000',
             'desc' => 'Buang puing renovasi, sampah daun taman, atau barang rongsok.'],
            ['cat' => 'antar', 'name' => 'Antar / Jemput', 'label' => 'Antar / Jemput Barang', 'icon' => 'fa-motorcycle', 'color' => 'sky', 'budget' => '50.000',
             'desc' => 'Antar barang, dokumen penting, atau ambil laundry kilat.'],
            ['cat' => 'antar', 'name' => 'SanSu Food', 'label' => 'Belanja Pasar Subuh', 'icon' => 'fa-basket-shopping', 'color' => 'amber', 'budget' => '45.000',
             'desc' => 'Belanja sayur ke pasar tradisional subuh atau supermarket.'],
            ['cat' => 'antar', 'name' => 'Titip Antre RS & Faskes', 'label' => 'Titip Antre RS & Faskes', 'icon' => 'fa-hourglass-half', 'color' => 'purple', 'budget' => '60.000',
             'desc' => 'Ambilkan nomor antrean dokter, faskes, atau antre tiket event.'],
            ['cat' => 'tukang', 'name' => 'Servis & Cuci AC', 'label' => 'Servis & Cuci AC', 'icon' => 'fa-snowflake', 'color' => 'sky', 'budget' => '75.000',
             'desc' => 'Cuci AC split rumah, isi freon, atau cek kebocoran air.'],
            ['cat' => 'tukang', 'name' => 'Tukang Listrik & Ledeng', 'label' => 'Tukang Listrik & Ledeng', 'icon' => 'fa-wrench', 'color' => 'indigo', 'budget' => '70.000',
             'desc' => 'Perbaikan kran bocor, ganti saklar, pasang lampu & pompa air.'],
            ['cat' => 'khusus', 'name' => 'Membersihkan Kandang / Kotoran Hewan', 'label' => 'Rawat Kandang Hewan', 'icon' => 'fa-shield-cat', 'color' => 'pink', 'budget' => '55.000',
             'desc' => 'Bersihkan kandang kucing/anjing, sterilkan pasir & buang kotoran.'],
            ['cat' => 'khusus', 'name' => 'Mengubur Bangkai Hewan', 'label' => 'Mengubur Bangkai Hewan', 'icon' => 'fa-paw', 'color' => 'stone', 'budget' => '60.000',
             'desc' => 'Bantuan kubur bangkai kucing atau hewan liar secara layak.'],
            ['cat' => 'khusus', 'name' => 'Nemenin Olahraga', 'label' => 'Nemenin Olahraga', 'icon' => 'fa-person-running', 'color' => 'orange', 'budget' => '60.000',
             'desc' => 'Temani jogging pagi, gym, bersepeda atau jaga stand toko.'],
            ['cat' => 'khusus', 'name' => 'JASA LAINNYA', 'label' => 'Jasa Lainnya / Kustom', 'icon' => 'fa-star', 'color' => 'navy', 'budget' => '100.000',
             'desc' => 'Tugas khusus, cek lokasi lapangan, atau suruhan apa saja yang Anda mau.'],
        ];

        $catLabels = [
            'all' => 'Semua',
            'bersih' => 'Kebersihan',
            'angkut' => 'Pindah & Angkut',
            'antar' => 'Antar & Belanja',
            'tukang' => 'Tukang & AC',
            'khusus' => 'Khusus & Lainnya',
        ];

        $colorMap = [
            'emerald' => 'bg-emerald-50 text-emerald-600 border-emerald-100',
            'teal' => 'bg-teal-50 text-teal-600 border-teal-100',
            'cyan' => 'bg-cyan-50 text-cyan-600 border-cyan-100',
            'blue' => 'bg-blue-50 text-blue-600 border-blue-100',
            'slate' => 'bg-slate-100 text-slate-700 border-slate-200',
            'sky' => 'bg-sky-50 text-sky-600 border-sky-100',
            'amber' => 'bg-amber-50 text-amber-600 border-amber-100',
            'purple' => 'bg-purple-50 text-purple-600 border-purple-100',
            'indigo' => 'bg-indigo-50 text-indigo-600 border-indigo-100',
            'pink' => 'bg-pink-50 text-pink-600 border-pink-100',
            'stone' => 'bg-stone-100 text-stone-700 border-stone-200',
            'orange' => 'bg-orange-50 text-orange-600 border-orange-100',
            'navy' => 'bg-slate-900 text-sky-400 border-slate-700',
        ];
    @endphp

    {{-- PENCARIAN DIHAPUS: pencarian sudah tersedia di header --}}

    {{-- KATALOG LAYANAN --}}
    <section id="layananKatalogSection" class="card-sb p-3.5 space-y-3">
        <div class="flex items-center justify-between px-1">
            <div>
                <h3 class="text-xs font-bold text-[#0E1D31] flex items-center gap-1.5">
                    <i class="fa-solid fa-list-check text-[#173B67]"></i> Katalog Layanan &amp; Jasa
                </h3>
                <p class="text-[9px] text-slate-400">Seluruh layanan suruhan SayaBantu</p>
            </div>
            <span id="jumlahLayanan" class="text-[9px] text-[#173B67] font-bold bg-blue-50 px-2.5 py-0.5 rounded-full border border-blue-100">
                16 Kategori
            </span>
        </div>

        <div class="flex items-center gap-1.5 overflow-x-auto pb-1 text-[9.5px]">
            <button type="button" onclick="filterLayananPageByCat('all', this)" class="btn-cat-filter px-2.5 py-1 rounded-full font-bold bg-[#0E1D31] text-white shrink-0 transition-all">
                Semua
            </button>
            @foreach($catLabels as $key => $label)
                @if($key !== 'all')
                    <button type="button" onclick="filterLayananPageByCat('{{ $key }}', this)" class="btn-cat-filter px-2.5 py-1 rounded-full font-medium bg-slate-100 text-slate-700 shrink-0 hover:bg-slate-200 transition-all">
                        {{ $label }}
                    </button>
                @endif
            @endforeach
        </div>

        {{-- DAFTAR LENGKAP 16 LAYANAN --}}
        <div class="space-y-2.5" id="layananGrid">
            @foreach($services as $svc)
                <button
                    type="button"
                    data-cat="{{ $svc['cat'] }}"
                    data-search="{{ strtolower($svc['label'] . ' ' . $svc['name'] . ' ' . $svc['desc']) }}"
                    onclick="selectServiceToForm(@json($svc['name']), @json($svc['desc']), @json($svc['budget']))"
                    class="layanan-item w-full text-left p-3 rounded-xl bg-slate-50 border border-slate-200/80 flex items-start gap-3 hover:border-sky-300 hover:bg-white active:scale-[0.99] transition-all"
                >
                    <div class="w-11 h-11 shrink-0 rounded-xl border flex items-center justify-center text-base {{ $colorMap[$svc['color']] }}">
                        <i class="fa-solid {{ $svc['icon'] }}"></i>
                    </div>
                    <div class="flex-1 min-w-0">
                        <h4 class="text-xs font-bold text-slate-900 truncate">{{ $svc['label'] }}</h4>
                        <p class="text-[10px] text-slate-500 leading-snug mt-0.5 line-clamp-2">{{ $svc['desc'] }}</p>
                        <span class="inline-flex items-center gap-1 mt-1.5 text-[9.5px] font-bold text-[#173B67] bg-blue-50 border border-blue-100 px-2 py-0.5 rounded-full">
                            Mulai Rp {{ $svc['budget'] }}
                        </span>
                    </div>
                    <i class="fa-solid fa-chevron-right text-[10px] text-slate-300 self-center shrink-0"></i>
                </button>
            @endforeach
        </div>

        {{-- EMPTY STATE --}}
        <div id="layananKosong" class="hidden text-center py-8">
            <div class="w-12 h-12 rounded-2xl bg-slate-100 text-slate-400 flex items-center justify-center text-lg mx-auto mb-2">
                <i class="fa-solid fa-magnifying-glass"></i>
            </div>
            <p class="text-xs font-bold text-slate-700">Layanan tidak ditemukan</p>
            <p class="text-[10px] text-slate-400 mt-0.5">Coba kata kunci lain, atau hubungi CS kami.</p>
        </div>
    </section>

    {{-- INFO PENUGASAN OTOMATIS --}}
    <section class="card-sb p-3.5">
        <div class="p-2.5 rounded-xl bg-blue-50/80 border border-blue-200/80 flex items-start gap-2 text-[10.5px]">
            <i class="fa-solid fa-wand-magic-sparkles text-sky-600 mt-0.5 shrink-0"></i>
            <p class="text-slate-700 leading-snug">
                <strong>Penugasan Otomatis:</strong> Anda tidak perlu memilih mitra. Setelah mengajukan layanan, sistem akan otomatis mencocokkan mitra terdekat dengan rating terbaik.
            </p>
        </div>
    </section>

</main>
@endsection

@push('scripts')
<script>
    // Jarak gradient ditangani terpusat oleh syncGradientEkor() di layouts/customer.blade.php

    // Pilih layanan -> arahkan ke halaman detail layanan (prefilled)
    function selectServiceToForm(serviceName, noteDesc, budget) {
        const params = new URLSearchParams({
            name: serviceName,
            description: noteDesc,
            budget,
        });
        window.location.href = `/customer/layanan?${params.toString()}`;
    }

    // Filter kategori
    function filterLayananPageByCat(cat, btn) {
        document.querySelectorAll('.btn-cat-filter').forEach(b => {
            b.classList.remove('bg-[#0E1D31]', 'text-white', 'font-bold');
            b.classList.add('bg-slate-100', 'text-slate-700', 'font-medium');
        });
        btn.classList.remove('bg-slate-100', 'text-slate-700', 'font-medium');
        btn.classList.add('bg-[#0E1D31]', 'text-white', 'font-bold');

        // Simpan kategori aktif untuk digabung dengan pencarian
        window.__layananCat = cat;
        applyLayananFilter();
    }

    // Filter berdasarkan kata kunci pencarian
    function filterLayananPage(query) {
        window.__layananQuery = (query || '').toLowerCase().trim();
        applyLayananFilter();
    }

    function clearCariLayanan() {
        const input = document.getElementById('cariLayananInput');
        if (input) input.value = '';
        window.__layananQuery = '';
        applyLayananFilter();
    }

    function applyLayananFilter() {
        const cat = window.__layananCat || 'all';
        const q = window.__layananQuery || '';
        let visible = 0;

        document.querySelectorAll('.layanan-item').forEach(item => {
            const itemCat = item.getAttribute('data-cat');
            const search = item.getAttribute('data-search') || '';
            const matchCat = (cat === 'all' || itemCat === cat);
            const matchQuery = (!q || search.includes(q));

            if (matchCat && matchQuery) {
                item.classList.remove('hidden');
                visible++;
            } else {
                item.classList.add('hidden');
            }
        });

        const emptyEl = document.getElementById('layananKosong');
        if (emptyEl) emptyEl.classList.toggle('hidden', visible > 0);

        const countEl = document.getElementById('jumlahLayanan');
        if (countEl) countEl.innerText = visible + ' Kategori';
    }
</script>
@endpush
