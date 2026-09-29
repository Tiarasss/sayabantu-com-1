{{-- =========================================================================
     SAYABANTU.COM - UNIFIED ADMIN HEADER COMPONENT (PERSIS SCREENSHOT)
     Header seragam di SELURUH halaman admin:
     [Burger] SayaBantu.com ---------------------- [Bell Notifikasi] [Avatar A]
     Tanpa tambahan status LIVE, tanpa judul halaman di baris ini.
========================================================================== --}}

<header class="relative z-10 px-5 pt-4">
    <div class="header-content flex items-center justify-between">
        
        {{-- Sisi Kiri: Burger Menu + Brand SayaBantu.com --}}
        <div class="flex items-center gap-2.5">
            <button
                type="button"
                class="header-icon shrink-0"
                aria-label="Menu Navigasi"
                onclick="if(typeof openSbBurger === 'function') openSbBurger(); else { const m = document.getElementById('sbBurgerModal'); if(m) { m.classList.remove('opacity-0', 'invisible', 'pointer-events-none'); document.getElementById('sbBurgerPanel')?.classList.remove('-translate-x-full'); } }"
                title="Buka Navigasi"
            >
                <i class="fa-solid fa-bars text-[16px]"></i>
            </button>

            <h1 class="text-[17px] font-bold tracking-tight text-white leading-none">
                SayaBantu.com
            </h1>
        </div>

        {{-- Sisi Kanan: Notifikasi (dengan dot) + Avatar "A" Lingkaran --}}
        <div class="flex items-center gap-2 shrink-0">
            
            {{-- Notification Bell Button --}}
            <button
                type="button"
                id="sbNotifHeaderBtn"
                class="header-icon relative shrink-0"
                aria-label="Notifikasi Realtime"
                onclick="if(typeof openSbNotifSheet === 'function') openSbNotifSheet(); else { const m = document.getElementById('sbNotifSheet'); if(m) { m.classList.remove('opacity-0', 'invisible', 'pointer-events-none'); document.getElementById('sbNotifPanel')?.classList.remove('translate-y-full'); } }"
                title="Pusat Notifikasi"
            >
                <i class="fa-regular fa-bell text-[16px]"></i>
                <span id="sbNotifBadge" class="notification-dot" style="display: none;"></span>
            </button>

            {{-- Avatar Profile "A" Circle Button --}}
            <button
                type="button"
                id="sbAvatarHeaderBtn"
                class="profile-admin shrink-0"
                aria-label="Profil Admin"
                onclick="if(typeof openSbAvatarMenu === 'function') openSbAvatarMenu(); else { const m = document.getElementById('sbAvatarMenuModal'); if(m) { m.classList.remove('opacity-0', 'invisible', 'pointer-events-none'); document.getElementById('sbAvatarMenuPanel')?.classList.remove('translate-y-full'); } }"
                title="Menu Akun Admin"
            >
                A
            </button>

        </div>

    </div>
</header>
