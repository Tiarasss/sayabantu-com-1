/**
 * SayaBantu.com - Admin Realtime Engine
 * Server-Sent Events (SSE) + Smart Polling Fallback
 * Mengelola sinkronisasi live statistik, daftar pesanan, stream aktivitas,
 * audio chime, notifikasi toast, dan aksi status langsung tanpa refresh.
 */

(function () {
    'use strict';

    class SayaBantuRealtimeManager {
        constructor() {
            this.csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
            this.stateUrl = '/admin/api/realtime-state';
            this.streamUrl = '/admin/api/stream';
            this.eventSource = null;
            this.pollTimer = null;
            this.pollInterval = 3500;
            this.lastState = null;
            this.isConnecting = false;
            this.audioCtx = null;
            this.soundEnabled = true;

            this.init();
        }

        init() {
            this.bindEvents();
            this.connectStream();
            this.updateLiveIndicator(true);

            // Periksa state pertama kali
            this.fetchSnapshot();
        }

        /**
         * Web Audio API Chime halus (tanpa file audio eksternal)
         */
        playNotificationChime() {
            if (!this.soundEnabled) return;
            try {
                const AudioCtx = window.AudioContext || window.webkitAudioContext;
                if (!AudioCtx) return;
                if (!this.audioCtx) {
                    this.audioCtx = new AudioCtx();
                }
                if (this.audioCtx.state === 'suspended') {
                    this.audioCtx.resume();
                }

                const now = this.audioCtx.currentTime;
                const osc = this.audioCtx.createOscillator();
                const gain = this.audioCtx.createGain();

                osc.type = 'sine';
                osc.frequency.setValueAtTime(587.33, now); // D5
                osc.frequency.exponentialRampToValueAtTime(880, now + 0.12); // A5

                gain.gain.setValueAtTime(0.0001, now);
                gain.gain.linearRampToValueAtTime(0.12, now + 0.04);
                gain.gain.exponentialRampToValueAtTime(0.0001, now + 0.45);

                osc.connect(gain);
                gain.connect(this.audioCtx.destination);

                osc.start(now);
                osc.stop(now + 0.45);
            } catch (e) {
                // Abaikan jika browser memblokir audio sebelum interaksi
            }
        }

        /**
         * Sambungkan Server-Sent Events (SSE)
         */
        connectStream() {
            if (!window.EventSource) {
                this.startPolling();
                return;
            }

            try {
                if (this.eventSource) {
                    this.eventSource.close();
                }

                this.eventSource = new EventSource(this.streamUrl);

                this.eventSource.onopen = () => {
                    this.updateLiveIndicator(true, 'Live • Terhubung');
                    if (this.pollTimer) {
                        clearInterval(this.pollTimer);
                        this.pollTimer = null;
                    }
                };

                this.eventSource.addEventListener('initial_state', (e) => {
                    try {
                        const data = JSON.parse(e.data);
                        this.applyState(data, false);
                    } catch (err) {
                        console.error('SSE initial_state parse error:', err);
                    }
                });

                this.eventSource.addEventListener('state_updated', (e) => {
                    try {
                        const data = JSON.parse(e.data);
                        this.applyState(data, true);
                    } catch (err) {
                        console.error('SSE state_updated parse error:', err);
                    }
                });

                this.eventSource.onerror = () => {
                    this.updateLiveIndicator(false, 'Live • Polling');
                    this.eventSource.close();
                    this.eventSource = null;
                    this.startPolling();
                };
            } catch (err) {
                this.startPolling();
            }
        }

        /**
         * Fallback Polling jika SSE terputus
         */
        startPolling() {
            if (this.pollTimer) return;
            this.pollTimer = setInterval(() => {
                this.fetchSnapshot(true);
            }, this.pollInterval);
        }

        /**
         * Ambil data snapshot via AJAX
         */
        fetchSnapshot(triggerNotice = false) {
            fetch(this.stateUrl, {
                headers: {
                    'Accept': 'application/json',
                    'X-Requested-With': 'XMLHttpRequest'
                }
            })
            .then(res => res.json())
            .then(res => {
                if (res.status === 'success' && res.data) {
                    this.applyState(res.data, triggerNotice);
                    this.updateLiveIndicator(true);
                }
            })
            .catch(() => {
                this.updateLiveIndicator(false, 'Menghubungkan...');
            });
        }

        /**
         * Terapkan state ke seluruh elemen antarmuka admin
         */
        applyState(state, isRealtimeUpdate = false) {
            const prevState = this.lastState;
            this.lastState = state;

            // 1. Update Statistik Counter
            if (state.stats) {
                for (const [key, val] of Object.entries(state.stats)) {
                    const elements = document.querySelectorAll(`[data-rt-stat="${key}"]`);
                    elements.forEach(el => {
                        const currentVal = el.innerText.trim();
                        const newVal = String(val);
                        if (currentVal !== newVal) {
                            el.innerText = newVal;
                            if (isRealtimeUpdate) {
                                el.classList.remove('sb-counter-bump');
                                void el.offsetWidth;
                                el.classList.add('sb-counter-bump');
                            }
                        }
                    });
                }
            }

            // 2. Update Badge Notifikasi Header
            const notifBadge = document.getElementById('sbNotifBadge');
            const unreadCount = state.unread_notifications || 0;
            if (notifBadge) {
                if (unreadCount > 0) {
                    notifBadge.style.display = 'block';
                    notifBadge.title = `${unreadCount} notifikasi belum dibaca`;
                } else {
                    notifBadge.style.display = 'none';
                }
            }

            // 3. Render Pesanan Terbaru (Dashboard)
            if (state.recent_orders && Array.isArray(state.recent_orders)) {
                this.renderRecentOrders(state.recent_orders, isRealtimeUpdate);
            }

            // 4. Render Aktivitas Terbaru (Dashboard & Pembayaran)
            if (state.recent_activities && Array.isArray(state.recent_activities)) {
                this.renderRecentActivities(state.recent_activities, isRealtimeUpdate);
            }

            // 5. Notifikasi & Audio jika ada data baru
            if (isRealtimeUpdate && prevState) {
                const prevOrders = prevState.stats?.total_pesanan || 0;
                const newOrders = state.stats?.total_pesanan || 0;
                if (newOrders > prevOrders) {
                    this.playNotificationChime();
                    const latestOrder = state.recent_orders?.[0];
                    if (latestOrder) {
                        this.showToast('Pesanan Baru Masuk!', `${latestOrder.id} • ${latestOrder.service} (${latestOrder.amount})`, 'order');
                    }
                }

                const prevPayment = prevState.stats?.total_pembayaran || 0;
                const newPayment = state.stats?.total_pembayaran || 0;
                if (newPayment > prevPayment) {
                    this.playNotificationChime();
                    this.showToast('Pembayaran Diterima!', 'Sistem berhasil memverifikasi transaksi pembayaran baru.', 'payment');
                }
            }

            // Trigger custom event untuk halaman spesifik
            document.dispatchEvent(new CustomEvent('sb:realtime:state', { detail: state }));
        }

        /**
         * Render Kartu Pesanan Terbaru
         */
        renderRecentOrders(orders, animateNew = false) {
            const container = document.getElementById('sbRecentOrdersContainer');
            if (!container) return;

            let html = '';
            orders.slice(0, 4).forEach((item, index) => {
                const detailUrl = `/admin/pesanan/${item.id}`;
                const isFirst = index === 0;

                html += `
                    <div
                        class="pesanan-item flex cursor-pointer items-center gap-3 p-3.5 hover:bg-gray-50/80 active:scale-[0.99] transition-all ${isFirst && animateNew ? 'sb-item-highlight' : ''}"
                        onclick="window.location.href='${detailUrl}'"
                        title="Lihat Detail Pesanan ${item.id}"
                    >
                        <div class="icon-box ${item.icon_class || 'icon-blue'} shrink-0">
                            <i class="fa-solid ${item.icon || 'fa-file-lines'} text-sm"></i>
                        </div>

                        <div class="min-w-0 flex-1">
                            <div class="flex items-center justify-between gap-2">
                                <h3 class="truncate text-xs font-semibold text-gray-900 leading-tight">
                                    ${item.service || 'Layanan SayaBantu'}
                                </h3>
                                <span class="status ${item.status_class || 'status-warning'} shrink-0">
                                    ${item.status}
                                </span>
                            </div>

                            <div class="mt-1 flex items-center justify-between text-[9px] text-gray-400">
                                <span>Pesanan #${item.id}</span>
                                <span class="font-semibold text-gray-600">${item.amount || ''}</span>
                            </div>

                            <div class="mt-1 flex items-center gap-1.5 text-[8.5px] text-gray-400">
                                <i class="fa-regular fa-clock text-[8px]"></i>
                                <span>${item.created_at || 'Baru saja'}</span>
                            </div>
                        </div>

                        <i class="fa-solid fa-chevron-right text-[9px] text-gray-300"></i>
                    </div>
                `;

                if (index < Math.min(orders.length - 1, 3)) {
                    html += '<div class="h-px bg-gray-100"></div>';
                }
            });

            container.innerHTML = html;
        }

        /**
         * Render Stream Aktivitas Terbaru
         */
        renderRecentActivities(activities, animateNew = false) {
            const container = document.getElementById('sbRecentActivitiesContainer');
            if (!container) return;

            let html = '';
            activities.slice(0, 4).forEach((item, index) => {
                const isFirst = index === 0;

                html += `
                    <div class="flex items-center gap-3 ${isFirst && animateNew ? 'sb-item-highlight rounded-xl p-1.5' : ''}">
                        <div class="flex h-8 w-8 shrink-0 items-center justify-center rounded-full ${item.color_class || 'bg-blue-50 text-blue-600'} shadow-sm">
                            <i class="fa-solid ${item.icon || 'fa-bell'} text-[11px]"></i>
                        </div>

                        <div class="min-w-0 flex-1">
                            <p class="text-[10px] font-semibold text-gray-800 leading-tight truncate">
                                ${item.title}
                            </p>
                            <p class="mt-0.5 text-[9px] text-gray-400 truncate">
                                ${item.subtitle || ''}
                            </p>
                        </div>

                        <span class="text-[8px] text-gray-400 font-medium shrink-0">
                            ${item.time || '1m'}
                        </span>
                    </div>
                `;

                if (index < Math.min(activities.length - 1, 3)) {
                    html += '<div class="my-3 h-px bg-gray-100"></div>';
                }
            });

            container.innerHTML = html;
        }

        /**
         * Ubah Status Pesanan secara Realtime (Aksi Langsung)
         */
        updateOrderStatus(orderId, status) {
            return fetch(`/admin/api/orders/${orderId}/status`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ status })
            })
            .then(res => res.json())
            .then(res => {
                if (res.status === 'success') {
                    this.applyState(res.data, true);
                    this.showToast('Status Diperbarui', res.message, 'success');
                }
                return res;
            })
            .catch(err => {
                this.showToast('Gagal', 'Terjadi kesalahan saat memperbarui status', 'error');
                throw err;
            });
        }

        /**
         * Trigger Simulasi Event Realtime
         */
        simulateEvent(type = 'random') {
            return fetch('/admin/api/simulate-event', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': this.csrfToken,
                    'Accept': 'application/json'
                },
                body: JSON.stringify({ type })
            })
            .then(res => res.json())
            .then(res => {
                if (res.status === 'success') {
                    this.applyState(res.data.state, true);
                }
                return res;
            });
        }

        /**
         * Update Indikator Live di Header
         */
        updateLiveIndicator(isActive, label = 'LIVE') {
            const ind = document.getElementById('sbLiveIndicator');
            if (!ind) return;

            if (isActive) {
                ind.className = 'sb-live-badge flex items-center gap-1.5 px-2 py-1 rounded-full bg-emerald-500/15 border border-emerald-400/30 text-emerald-300 text-[8.5px] font-semibold tracking-wide';
                ind.innerHTML = `
                    <span class="relative flex h-1.5 w-1.5">
                        <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-emerald-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-emerald-400"></span>
                    </span>
                    <span class="hidden xs:inline">${label}</span>
                `;
            } else {
                ind.className = 'sb-live-badge flex items-center gap-1.5 px-2 py-1 rounded-full bg-amber-500/15 border border-amber-400/30 text-amber-300 text-[8.5px] font-semibold tracking-wide';
                ind.innerHTML = `
                    <span class="relative flex h-1.5 w-1.5">
                        <span class="relative inline-flex rounded-full h-1.5 w-1.5 bg-amber-400"></span>
                    </span>
                    <span class="hidden xs:inline">${label}</span>
                `;
            }
        }

        /**
         * Tampilkan Toast Realtime
         */
        showToast(title, message, type = 'info') {
            if (typeof window.showToast === 'function') {
                window.showToast(title, message, type);
                return;
            }

            // Fallback lightweight inline toast
            const toastContainerId = 'sbToastContainer';
            let container = document.getElementById(toastContainerId);
            if (!container) {
                container = document.createElement('div');
                container.id = toastContainerId;
                container.className = 'fixed top-4 right-4 z-[999] flex flex-col gap-2 pointer-events-none max-w-[340px] w-full px-4';
                document.body.appendChild(container);
            }

            const toast = document.createElement('div');
            toast.className = 'pointer-events-auto flex items-start gap-2.5 p-3 rounded-xl bg-[#0E1D31] text-white shadow-2xl border border-white/10 text-xs transform transition-all duration-300 translate-y-[-10px] opacity-0';
            
            const iconMap = {
                order: 'fa-cart-shopping text-sky-400',
                payment: 'fa-circle-check text-emerald-400',
                success: 'fa-circle-check text-emerald-400',
                error: 'fa-circle-xmark text-rose-400',
                info: 'fa-bell text-amber-400',
            };

            toast.innerHTML = `
                <i class="fa-solid ${iconMap[type] || 'fa-bell'} text-sm mt-0.5 shrink-0"></i>
                <div class="min-w-0 flex-1">
                    <p class="font-bold text-white text-[11px] leading-tight">${title}</p>
                    <p class="text-gray-300 text-[10px] mt-0.5 leading-snug">${message}</p>
                </div>
            `;

            container.appendChild(toast);
            requestAnimationFrame(() => {
                toast.classList.remove('translate-y-[-10px]', 'opacity-0');
            });

            setTimeout(() => {
                toast.classList.add('opacity-0', 'translate-y-[-10px]');
                setTimeout(() => toast.remove(), 350);
            }, 4000);
        }

        bindEvents() {
            // Aktifkan Web Audio API saat interaksi pertama
            const unlockAudio = () => {
                if (this.audioCtx && this.audioCtx.state === 'suspended') {
                    this.audioCtx.resume();
                }
                window.removeEventListener('click', unlockAudio);
                window.removeEventListener('touchstart', unlockAudio);
            };
            window.addEventListener('click', unlockAudio, { once: true });
            window.addEventListener('touchstart', unlockAudio, { once: true });
        }
    }

    // Inisialisasi secara otomatis saat DOM siap
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', () => {
            window.SayaBantuRealtime = new SayaBantuRealtimeManager();
        });
    } else {
        window.SayaBantuRealtime = new SayaBantuRealtimeManager();
    }
})();
