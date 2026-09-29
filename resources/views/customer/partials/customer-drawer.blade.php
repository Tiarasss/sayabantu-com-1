{{-- =====================================================
     CUSTOMER BURGER MENU DRAWER (SLIDE-IN DARI KIRI)
====================================================== --}}
<div id="customerBurgerModal" class="fixed inset-0 z-[120] pointer-events-none opacity-0 invisible transition-all duration-300" aria-hidden="true">
    
    {{-- BACKDROP CLICK --}}
    <div onclick="closeCustomerDrawer()" class="absolute inset-0 bg-black/60 backdrop-blur-[2px] pointer-events-auto"></div>

    {{-- DRAWER CONTAINER DALAM MOBILE APP FRAME --}}
    <div class="relative mx-auto w-full max-w-[430px] h-full pointer-events-none overflow-hidden">
        
        <div id="customerBurgerPanel" class="absolute left-0 top-0 bottom-0 w-[82%] max-w-[340px] bg-[#0E1D31] text-white pointer-events-auto flex flex-col shadow-2xl -translate-x-full border-r border-white/10 z-10 transition-transform duration-300">
            
            {{-- DRAWER HEADER --}}
            <div class="p-4 border-b border-white/10 flex items-center justify-between bg-gradient-to-b from-[#173B67]/40 to-transparent">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-xl bg-[#173B67] border border-sky-400/30 flex items-center justify-center text-white font-bold text-xs shadow-md">
                        SB
                    </div>
                    <div>
                        <h3 class="text-sm font-bold tracking-tight text-white flex items-center gap-1 leading-none">
                            SayaBantu<span class="text-white">.com</span>
                        </h3>
                        <p class="text-[10px] text-gray-400 mt-0.5">Suruh Apa Aja Siap</p>
                    </div>
                </div>
                <button type="button" onclick="closeCustomerDrawer()" class="w-7 h-7 rounded-lg bg-white/5 hover:bg-white/10 active:scale-95 text-gray-300 hover:text-white flex items-center justify-center transition-colors">
                    <i class="fa-solid fa-xmark text-sm"></i>
                </button>
            </div>

            {{-- KARTU STATUS USER / PROFIL --}}
            <div class="px-4 py-3.5 bg-white/[0.04] border-b border-white/5" id="drawerProfileBox">
                <div class="flex items-center gap-3">
                    <div class="relative">
                        <div class="w-10 h-10 rounded-full bg-gradient-to-tr from-sky-400 to-blue-600 text-white font-bold text-sm flex items-center justify-center shadow-md border border-white/20" id="drawerAvatarInitial">
                            <i class="fa-solid fa-user"></i>
                        </div>
                        <span class="absolute bottom-0 right-0 w-2.5 h-2.5 bg-emerald-500 rounded-full border-2 border-[#0E1D31]"></span>
                    </div>
                    <div class="min-w-0 flex-1">
                        <h4 class="text-xs font-bold text-white truncate" id="drawerUserName">Pengunjung Umum</h4>
                        <p class="text-[10px] text-slate-400 truncate" id="drawerUserStatus">Akses Publik Layanan</p>
                        <div class="mt-1 hidden" id="drawerUserActionBtn"></div>
                    </div>
                </div>
            </div>

            {{-- DAFTAR MENU NAVIGASI --}}
            <div class="flex-1 overflow-y-auto px-3 py-3 space-y-1 text-xs">

                <span class="px-3 text-[9px] font-bold tracking-wider text-slate-400 uppercase block mb-1">
                    Informasi
                </span>

                @php
                    $infoBases = 'flex items-center gap-2.5 px-3 py-2.5 rounded-xl font-medium transition-colors';
                    $infoAktif = 'bg-sky-500/20 text-white border border-sky-400/30 font-bold';
                    $infoBiasa = 'hover:bg-white/10 text-slate-200 hover:text-white';
                @endphp

                {{-- CARA KERJA --}}
                <a href="{{ route('customer.cara-kerja') }}" class="{{ $infoBases }} {{ request()->routeIs('customer.cara-kerja') ? $infoAktif : $infoBiasa }}">
                    <i class="fa-solid fa-diagram-project text-sky-400 w-4"></i>
                    <span>Cara Kerja</span>
                </a>

                {{-- SYARAT & KETENTUAN --}}
                <a href="{{ route('customer.syarat-ketentuan') }}" class="{{ $infoBases }} {{ request()->routeIs('customer.syarat-ketentuan') ? $infoAktif : $infoBiasa }}">
                    <i class="fa-solid fa-file-contract text-amber-400 w-4"></i>
                    <span>Syarat &amp; Ketentuan</span>
                </a>

                {{-- KEBIJAKAN PRIVASI --}}
                <a href="{{ route('customer.kebijakan-privasi') }}" class="{{ $infoBases }} {{ request()->routeIs('customer.kebijakan-privasi') ? $infoAktif : $infoBiasa }}">
                    <i class="fa-solid fa-shield-halved text-emerald-400 w-4"></i>
                    <span>Kebijakan Privasi</span>
                </a>


            </div>

            {{-- DRAWER FOOTER --}}
            <div class="p-3.5 border-t border-white/10 bg-black/20 text-center text-[10px] text-slate-400 space-y-2">
                <div id="drawerFooterAction" class="hidden"></div>
                <p>© 2026 SayaBantu.com • Jasa &amp; Suruhan Terpercaya</p>
            </div>

        </div>

    </div>

</div>

<script>
    function openCustomerDrawer() {
        const modal = document.getElementById('customerBurgerModal');
        const panel = document.getElementById('customerBurgerPanel');
        if (modal && panel) {
            modal.classList.remove('pointer-events-none', 'opacity-0', 'invisible');
            panel.classList.remove('-translate-x-full');
            updateDrawerProfileUI();
        }
    }

    function closeCustomerDrawer() {
        const modal = document.getElementById('customerBurgerModal');
        const panel = document.getElementById('customerBurgerPanel');
        if (modal && panel) {
            panel.classList.add('-translate-x-full');
            modal.classList.add('opacity-0');
            setTimeout(() => {
                modal.classList.add('pointer-events-none', 'invisible');
            }, 250);
        }
    }

    function updateDrawerProfileUI() {
        const user = getCustomerAuth();
        const avatarEl = document.getElementById('drawerAvatarInitial');
        const nameEl = document.getElementById('drawerUserName');
        const statusEl = document.getElementById('drawerUserStatus');
        const actionBtn = document.getElementById('drawerUserActionBtn');

        if (user && user.isLoggedIn) {
            if (user.role === 'mitra') {
                if (avatarEl) avatarEl.innerHTML = `<i class="fa-solid fa-helmet-safety text-emerald-300"></i>`;
                if (nameEl) nameEl.innerText = user.name;
                if (statusEl) statusEl.innerHTML = `<span class="text-emerald-400 font-semibold">● Mitra Aktif</span>`;
            } else {
                if (avatarEl) avatarEl.innerHTML = `<span class="font-black">${user.name ? user.name.charAt(0) : 'C'}</span>`;
                if (nameEl) nameEl.innerText = user.name;
                if (statusEl) statusEl.innerHTML = `<span class="text-sky-400 font-semibold">⭐ Member Terverifikasi</span>`;
            }
            if (actionBtn) {
                actionBtn.classList.remove('hidden');
                actionBtn.innerHTML = `<span class="text-[9px] text-slate-400 block">${user.phone || ''}</span>`;
            }
        } else {
            if (avatarEl) avatarEl.innerHTML = `<i class="fa-solid fa-user"></i>`;
            if (nameEl) nameEl.innerText = 'Pengunjung Umum';
            if (statusEl) statusEl.innerText = 'Akses Publik Layanan';
            if (actionBtn) {
                actionBtn.classList.add('hidden');
                actionBtn.innerHTML = '';
            }
        }

        // Footer: hanya tampilkan tombol keluar jika sudah masuk
        const footer = document.getElementById('drawerFooterAction');
        if (footer) {
            if (user && user.isLoggedIn) {
                footer.classList.remove('hidden');
                footer.innerHTML = `
                    <button type="button" onclick="closeCustomerDrawer(); logoutUserAction();" class="w-full py-2 bg-red-500/20 hover:bg-red-500/30 text-red-300 border border-red-500/30 font-bold rounded-xl transition-colors">
                        <i class="fa-solid fa-arrow-right-from-bracket mr-1"></i> Keluar dari Akun
                    </button>
                `;
            } else {
                footer.classList.add('hidden');
                footer.innerHTML = '';
            }
        }
    }
</script>
