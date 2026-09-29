<?php

namespace App\Services;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class AdminRealtimeService
{
    protected string $storagePath;

    public function __construct()
    {
        $this->storagePath = storage_path('app/admin_realtime_state.json');
        $this->ensureInitialized();
    }

    /**
     * Pastikan state default tersedia
     */
    protected function ensureInitialized(): void
    {
        if (!File::exists(dirname($this->storagePath))) {
            File::makeDirectory(dirname($this->storagePath), 0755, true);
        }

        if (!File::exists($this->storagePath)) {
            $this->saveState($this->defaultState());
        }
    }

    /**
     * Data default awal
     */
    protected function defaultState(): array
    {
        return [
            'stats' => [
                'total_pesanan' => 128,
                'pesanan_growth' => '+12%',
                'total_pembayaran' => 94,
                'total_pendapatan' => 'Rp 14.850.000',
                'total_pengguna' => 450,
                'total_mitra' => 64,
                'total_konflik' => 3,
                'rating_rata' => 4.9,
            ],
            'recent_orders' => [
                [
                    'id' => 'SB-00128',
                    'service' => 'Full Home Cleaning',
                    'customer' => 'Siti Rahma',
                    'mitra' => 'Budi Santoso',
                    'amount' => 'Rp 150.000',
                    'status' => 'Diproses',
                    'status_class' => 'status-warning',
                    'icon' => 'fa-broom',
                    'icon_class' => 'icon-blue',
                    'created_at' => 'Baru saja',
                    'timestamp' => time() - 30,
                ],
                [
                    'id' => 'SB-00127',
                    'service' => 'Service AC Split',
                    'customer' => 'Ahmad Fauzi',
                    'mitra' => 'Hendra Wijaya',
                    'amount' => 'Rp 85.000',
                    'status' => 'Menunggu',
                    'status_class' => 'status-warning',
                    'icon' => 'fa-snowflake',
                    'icon_class' => 'icon-blue',
                    'created_at' => '4 menit lalu',
                    'timestamp' => time() - 240,
                ],
                [
                    'id' => 'SB-00126',
                    'service' => 'Angkut Barang Pick Up',
                    'customer' => 'Dewi Lestari',
                    'mitra' => 'Yanto Transport',
                    'amount' => 'Rp 220.000',
                    'status' => 'Selesai',
                    'status_class' => 'status-success',
                    'icon' => 'fa-truck',
                    'icon_class' => 'icon-amber',
                    'created_at' => '18 menit lalu',
                    'timestamp' => time() - 1080,
                ],
                [
                    'id' => 'SB-00125',
                    'service' => 'Jasa Belanja Harian',
                    'customer' => 'Rina Marlina',
                    'mitra' => 'Agus Pratama',
                    'amount' => 'Rp 65.000',
                    'status' => 'Selesai',
                    'status_class' => 'status-success',
                    'icon' => 'fa-bag-shopping',
                    'icon_class' => 'icon-green',
                    'created_at' => '45 menit lalu',
                    'timestamp' => time() - 2700,
                ],
            ],
            'recent_activities' => [
                [
                    'id' => 'act-1',
                    'title' => 'Pembayaran pesanan terverifikasi',
                    'subtitle' => 'Pesanan #SB-00128 (Rp 150.000 via QRIS)',
                    'type' => 'payment',
                    'icon' => 'fa-check',
                    'color_class' => 'bg-green-50 text-green-600',
                    'time' => '1m',
                    'timestamp' => time() - 60,
                ],
                [
                    'id' => 'act-2',
                    'title' => 'Mitra baru mendaftar',
                    'subtitle' => 'Joko Susanto - Teknisi Listrik (Menunggu Verifikasi)',
                    'type' => 'partner',
                    'icon' => 'fa-user-plus',
                    'color_class' => 'bg-blue-50 text-blue-600',
                    'time' => '12m',
                    'timestamp' => time() - 720,
                ],
                [
                    'id' => 'act-3',
                    'title' => 'Rating & ulasan baru',
                    'subtitle' => 'Customer memberikan bintang 5.0 untuk Mitra Budi',
                    'type' => 'review',
                    'icon' => 'fa-star',
                    'color_class' => 'bg-amber-50 text-amber-600',
                    'time' => '35m',
                    'timestamp' => time() - 2100,
                ],
            ],
            'notifications' => [
                [
                    'id' => 'notif-1',
                    'title' => 'Pesanan baru masuk',
                    'message' => 'Pesanan #SB-00128 Full Home Cleaning perlu dikonfirmasi mitra.',
                    'read' => false,
                    'time' => '1m lalu',
                    'icon' => 'fa-bell',
                ],
                [
                    'id' => 'notif-2',
                    'title' => 'Permintaan Verifikasi Mitra',
                    'message' => 'Mitra baru (Joko Susanto) mengunggah dokumen KTP & SKCK.',
                    'read' => false,
                    'time' => '12m lalu',
                    'icon' => 'fa-id-card',
                ],
            ],
            'unread_notifications' => 2,
            'last_updated' => time(),
        ];
    }

    /**
     * Ambil state terkini
     */
    public function getState(): array
    {
        $this->ensureInitialized();
        $content = File::get($this->storagePath);
        $state = json_decode($content, true);
        if (!is_array($state)) {
            $state = $this->defaultState();
            $this->saveState($state);
        }
        return $state;
    }

    /**
     * Simpan state ke file
     */
    public function saveState(array $state): void
    {
        $state['last_updated'] = time();
        File::put($this->storagePath, json_encode($state, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES));
    }

    /**
     * Update status pesanan secara realtime
     */
    public function updateOrderStatus(string $id, string $status): array
    {
        $state = $this->getState();
        $updated = false;

        $statusClassMap = [
            'Menunggu' => 'status-warning',
            'Diproses' => 'status-warning',
            'Selesai' => 'status-success',
            'Dibatalkan' => 'status-danger',
        ];

        foreach ($state['recent_orders'] as &$order) {
            if ($order['id'] === $id) {
                $order['status'] = $status;
                $order['status_class'] = $statusClassMap[$status] ?? 'status-warning';
                $updated = true;
                break;
            }
        }

        if ($updated) {
            // Tambahkan catatan ke aktivitas
            array_unshift($state['recent_activities'], [
                'id' => 'act-' . uniqid(),
                'title' => "Status pesanan {$id} diubah",
                'subtitle' => "Status diperbarui menjadi {$status}",
                'type' => 'order',
                'icon' => $status === 'Selesai' ? 'fa-circle-check' : ($status === 'Dibatalkan' ? 'fa-ban' : 'fa-arrows-rotate'),
                'color_class' => $status === 'Selesai' ? 'bg-green-50 text-green-600' : ($status === 'Dibatalkan' ? 'bg-red-50 text-red-600' : 'bg-blue-50 text-blue-600'),
                'time' => 'Baru saja',
                'timestamp' => time(),
            ]);

            $state['recent_activities'] = array_slice($state['recent_activities'], 0, 10);
            $this->saveState($state);
        }

        return $state;
    }

    /**
     * Simulasi event realtime secara instan
     */
    public function simulateEvent(string $type = 'random'): array
    {
        $state = $this->getState();
        $events = ['new_order', 'payment_success', 'new_partner', 'new_rating'];
        if ($type === 'random') {
            $type = $events[array_rand($events)];
        }

        $now = time();

        switch ($type) {
            case 'new_order':
                $state['stats']['total_pesanan']++;
                $orderId = 'SB-' . str_pad((string)($state['stats']['total_pesanan']), 5, '0', STR_PAD_LEFT);
                $services = [
                    ['name' => 'Deep Cleaning Rumah', 'icon' => 'fa-broom', 'icon_class' => 'icon-blue', 'amount' => 'Rp 175.000'],
                    ['name' => 'Perbaikan Pipa Bocor', 'icon' => 'fa-wrench', 'icon_class' => 'icon-amber', 'amount' => 'Rp 95.000'],
                    ['name' => 'Cuci Sofa & Springbed', 'icon' => 'fa-couch', 'icon_class' => 'icon-green', 'amount' => 'Rp 140.000'],
                    ['name' => 'Jasa Pindahan Kos', 'icon' => 'fa-truck-fast', 'icon_class' => 'icon-blue', 'amount' => 'Rp 180.000'],
                ];
                $service = $services[array_rand($services)];
                $customerNames = ['Bayu Pratama', 'Nurul Hidayah', 'Indra Gunawan', 'Mega Pertiwi', 'Rudi Hermanto'];
                $customer = $customerNames[array_rand($customerNames)];

                $newOrder = [
                    'id' => $orderId,
                    'service' => $service['name'],
                    'customer' => $customer,
                    'mitra' => 'Mencari Mitra...',
                    'amount' => $service['amount'],
                    'status' => 'Menunggu',
                    'status_class' => 'status-warning',
                    'icon' => $service['icon'],
                    'icon_class' => $service['icon_class'],
                    'created_at' => 'Baru saja',
                    'timestamp' => $now,
                ];

                array_unshift($state['recent_orders'], $newOrder);
                $state['recent_orders'] = array_slice($state['recent_orders'], 0, 8);

                // Aktivitas
                array_unshift($state['recent_activities'], [
                    'id' => 'act-' . uniqid(),
                    'title' => 'Pesanan baru masuk',
                    'subtitle' => "{$orderId} • {$service['name']} ({$service['amount']})",
                    'type' => 'order',
                    'icon' => 'fa-cart-plus',
                    'color_class' => 'bg-sky-50 text-sky-600',
                    'time' => 'Baru saja',
                    'timestamp' => $now,
                ]);

                // Notifikasi
                array_unshift($state['notifications'], [
                    'id' => 'notif-' . uniqid(),
                    'title' => 'Pesanan Baru #' . $orderId,
                    'message' => "Pesanan baru {$service['name']} oleh {$customer}.",
                    'read' => false,
                    'time' => 'Baru saja',
                    'icon' => 'fa-cart-shopping',
                ]);
                $state['unread_notifications']++;
                break;

            case 'payment_success':
                $state['stats']['total_pembayaran']++;
                $orderNum = rand(110, 128);
                $amounts = [85000, 120000, 150000, 220000];
                $amount = $amounts[array_rand($amounts)];
                $amountFmt = 'Rp ' . number_format($amount, 0, ',', '.');

                array_unshift($state['recent_activities'], [
                    'id' => 'act-' . uniqid(),
                    'title' => 'Pembayaran berhasil dikonfirmasi',
                    'subtitle' => "Pesanan #SB-00{$orderNum} ({$amountFmt}) terverifikasi sistem",
                    'type' => 'payment',
                    'icon' => 'fa-circle-check',
                    'color_class' => 'bg-emerald-50 text-emerald-600',
                    'time' => 'Baru saja',
                    'timestamp' => $now,
                ]);

                array_unshift($state['notifications'], [
                    'id' => 'notif-' . uniqid(),
                    'title' => 'Pembayaran Berhasil',
                    'message' => "Dana {$amountFmt} dari pesanan #SB-00{$orderNum} telah diterima.",
                    'read' => false,
                    'time' => 'Baru saja',
                    'icon' => 'fa-credit-card',
                ]);
                $state['unread_notifications']++;
                break;

            case 'new_partner':
                $state['stats']['total_mitra']++;
                $state['stats']['total_pengguna']++;
                $names = ['Dedi Setiawan', 'Fajar Ramadhan', 'Bambang Irawan', 'Taufik Hidayat'];
                $skills = ['Tukang Bangunan', 'Montir Panggilan', 'Jasa Bersih Kamar', 'Tukang Ledeng'];
                $idx = array_rand($names);

                array_unshift($state['recent_activities'], [
                    'id' => 'act-' . uniqid(),
                    'title' => 'Mitra baru terdaftar',
                    'subtitle' => "{$names[$idx]} ({$skills[$idx]}) menunggu persetujuan berkas",
                    'type' => 'partner',
                    'icon' => 'fa-user-check',
                    'color_class' => 'bg-blue-50 text-blue-600',
                    'time' => 'Baru saja',
                    'timestamp' => $now,
                ]);
                break;

            case 'new_rating':
                array_unshift($state['recent_activities'], [
                    'id' => 'act-' . uniqid(),
                    'title' => 'Ulasan bintang 5.0 masuk',
                    'subtitle' => 'Customer: "Pelayanan sangat cepat dan rapi, recommended!"',
                    'type' => 'review',
                    'icon' => 'fa-star',
                    'color_class' => 'bg-amber-50 text-amber-600',
                    'time' => 'Baru saja',
                    'timestamp' => $now,
                ]);
                break;
        }

        $state['recent_activities'] = array_slice($state['recent_activities'], 0, 10);
        $state['notifications'] = array_slice($state['notifications'], 0, 8);
        $this->saveState($state);

        return [
            'success' => true,
            'event_type' => $type,
            'state' => $state,
        ];
    }

    /**
     * Tandai notifikasi telah dibaca
     */
    public function markNotificationsRead(): array
    {
        $state = $this->getState();
        foreach ($state['notifications'] as &$n) {
            $n['read'] = true;
        }
        $state['unread_notifications'] = 0;
        $this->saveState($state);
        return $state;
    }
}
