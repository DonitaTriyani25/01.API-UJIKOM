<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Riwayat Peminjaman</title>

    <style>
        /* =====================================================
           1. RESET & BASE
        ===================================================== */

        * { box-sizing: border-box; }

        body {
            margin: 0;
            font-family: Arial, Helvetica, sans-serif;
            background: #eef6ff;
            color: #173b68;
        }

        /* =====================================================
           2. HEADER / NAVBAR
        ===================================================== */

        .header {
            height: 70px;
            background: linear-gradient(90deg, #0878d1, #2398ed);
            color: white;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 5%;
            box-shadow: 0 3px 12px rgba(0, 91, 170, .18);
        }

        .header-title {
            display: flex;
            align-items: center;
            gap: 12px;
            font-size: 21px;
            font-weight: 700;
        }

        .header-icon {
            width: 38px;
            height: 38px;
            border-radius: 10px;
            background: white;
            color: #1683d8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 20px;
        }

        .header-menu {
            display: flex;
            align-items: center;
        }

        .header-menu a {
            text-decoration: none;
            color: white;
            background: rgba(255, 255, 255, .12);
            border: 1px solid rgba(255, 255, 255, .35);
            padding: 9px 15px;
            border-radius: 9px;
            font-size: 12px;
            font-weight: 600;
            transition: .2s;
        }

        .header-menu a:hover {
            background: white;
            color: #1683d8;
        }

        /* =====================================================
           3. LAYOUT
        ===================================================== */

        .container {
            max-width: 1320px;
            margin: auto;
            padding: 28px 30px 35px;
        }

        /* =====================================================
           4. HERO
        ===================================================== */

        .hero {
            background: white;
            border-radius: 18px;
            padding: 24px 28px;
            margin-bottom: 18px;
            border: 1px solid #dcecff;
            box-shadow: 0 5px 20px rgba(35, 100, 160, .07);
            display: flex;
            align-items: center;
            justify-content: space-between;
            overflow: hidden;
            position: relative;
        }

        .hero-left {
            display: flex;
            align-items: center;
            gap: 18px;
            position: relative;
            z-index: 2;
        }

        .history-icon {
            width: 64px;
            height: 64px;
            border-radius: 50%;
            background: #e2f1ff;
            color: #1683d8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 31px;
        }

        .page-title {
            margin: 0;
            font-size: 29px;
            font-weight: 700;
            color: #173f70;
        }

        .page-subtitle {
            margin: 7px 0 0;
            color: #7188a5;
            font-size: 13px;
        }

        .hero-decoration {
            font-size: 72px;
            opacity: .13;
            position: absolute;
            right: 30px;
            top: 5px;
        }

        /* =====================================================
           5. STATISTIK
        ===================================================== */

        .stats {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 14px;
            margin-bottom: 18px;
        }

        .stat-card {
            min-height: 92px;
            border-radius: 14px;
            padding: 15px 18px;
            display: flex;
            align-items: center;
            gap: 13px;
            border: 1px solid transparent;
        }

        .stat-blue {
            background: linear-gradient(135deg, #e8f4ff, #f5faff);
            border-color: #d6ebff;
        }

        .stat-green {
            background: linear-gradient(135deg, #e8fbf4, #f6fffb);
            border-color: #d5f4e7;
        }

        .stat-orange {
            background: linear-gradient(135deg, #fff4e3, #fffaf2);
            border-color: #ffebcb;
        }

        .stat-red {
            background: linear-gradient(135deg, #fff0f0, #fff8f8);
            border-color: #ffe0e0;
        }

        .stat-icon {
            width: 44px;
            height: 44px;
            min-width: 44px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 21px;
            font-weight: bold;
        }

        .icon-blue { background: #168be4; }
        .icon-green { background: #16b878; }
        .icon-orange { background: #f3a11d; }
        .icon-red { background: #e65050; }

        .stat-label {
            font-size: 11px;
            color: #7188a5;
            margin-bottom: 4px;
        }

        .stat-number {
            font-size: 23px;
            font-weight: 700;
            color: #173f70;
        }

        .stat-number span {
            font-size: 11px;
            font-weight: 500;
            color: #8294aa;
            margin-left: 3px;
        }

        /* =====================================================
           6. CARD & FILTER
        ===================================================== */

        .card {
            background: white;
            border: 1px solid #dcecff;
            border-radius: 17px;
            padding: 14px;
            box-shadow: 0 5px 20px rgba(35, 100, 160, .07);
        }

        .filter-area {
            display: flex;
            gap: 10px;
            padding: 4px 0 13px;
        }

        .search-wrapper {
            flex: 1;
            position: relative;
        }

        .search-icon {
            position: absolute;
            left: 14px;
            top: 50%;
            transform: translateY(-50%);
            color: #7891ae;
            font-size: 16px;
        }

        .search-input,
        .date-filter {
            width: 100%;
            height: 42px;
            border: 1px solid #d8e7f5;
            border-radius: 9px;
            background: white;
            outline: none;
            color: #315578;
            font-size: 12px;
        }

        .search-input { padding: 0 15px 0 40px; }

        .date-filter {
            width: 190px;
            padding: 0 12px;
        }

        .search-input:focus,
        .date-filter:focus {
            border-color: #2493e8;
            box-shadow: 0 0 0 3px rgba(36, 147, 232, .09);
        }

        /* =====================================================
           7. NOTIFIKASI
        ===================================================== */

        .alert {
            padding: 12px;
            margin-bottom: 12px;
            border-radius: 8px;
            font-size: 12px;
            border: 1px solid;
        }

        .alert-success {
            background: #ddf8ed;
            color: #087c50;
            border-color: #b8ebd5;
        }

        .alert-error {
            background: #ffe7e7;
            color: #c62828;
            border-color: #ffcaca;
        }

        /* =====================================================
           8. TABEL
        ===================================================== */

        .table-wrapper {
            overflow-x: auto;
            border: 1px solid #dcecff;
            border-radius: 11px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 1000px;
        }

        thead {
            background: linear-gradient(90deg, #eaf5ff, #f3f9ff);
        }

        th {
            padding: 13px 14px;
            text-align: left;
            font-size: 11px;
            color: #275b8f;
            font-weight: 700;
            border-bottom: 1px solid #d8e8f7;
            white-space: nowrap;
        }

        td {
            padding: 12px 14px;
            border-bottom: 1px solid #edf3f8;
            font-size: 12px;
            color: #385b7f;
            vertical-align: middle;
        }

        tbody tr { transition: .15s; }
        tbody tr:hover { background: #f8fcff; }
        tbody tr:last-child td { border-bottom: none; }

        /* Lebar kolom */
        .col-no       { width: 65px; text-align: center; }
        .col-tanggal  { width: 140px; }
        .col-rencana  { width: 150px; }
        .col-status   { width: 170px; }
        .col-aksi     { width: 170px; text-align: center; }

        .td-center { text-align: center; }

        /* =====================================================
           9. KOMPONEN TABEL (ID, TANGGAL, ALAT)
        ===================================================== */

        .id-number {
            font-weight: 700;
            color: #214b79;
        }

        .date-main {
            color: #315a86;
            font-weight: 600;
        }

        .alat-list {
            display: flex;
            flex-direction: column;
            gap: 6px;
        }

        .alat-item {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .alat-photo {
            width: 46px;
            height: 42px;
            object-fit: contain;
            border-radius: 7px;
            background: #f3f8fc;
            border: 1px solid #e0ebf4;
        }

        .alat-info {
            display: flex;
            flex-direction: column;
        }

        .alat-name {
            color: #1d4d80;
            font-weight: 600;
            font-size: 12px;
        }

        .alat-name-dihapus { color: #dc2626; }

        .alat-quantity {
            color: #8095ac;
            font-size: 10px;
            margin-top: 3px;
        }

        .alat-dot {
            width: 6px;
            height: 6px;
            border-radius: 50%;
            background: #168be4;
            display: inline-block;
            margin-right: 5px;
        }

        /* =====================================================
           10. KOMPONEN TABEL (STATUS & CATATAN)
        ===================================================== */

        .status {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 7px 11px;
            border-radius: 20px;
            font-size: 10px;
            font-weight: 700;
            white-space: nowrap;
        }

        .status::before {
            content: "";
            width: 7px;
            height: 7px;
            border-radius: 50%;
            background: currentColor;
        }

        .status-dipinjam  { background: #e3f1ff; color: #1683d8; }
        .status-diajukan  { background: #e5f8ff; color: #0789c8; }
        .status-selesai   { background: #ddf8ed; color: #10a86e; }
        .status-terlambat { background: #ffe7e7; color: #df4141; }
        .status-lain      { background: #f0f3f6; color: #687b8f; }

        .note {
            font-size: 10px;
            margin-top: 7px;
            font-weight: 600;
        }

        .note-danger { color: #dc2626; }
        .note-overdue { color: #df4141; }
        .note-muted { color: #8ba0b5; font-weight: 500; }

        /* =====================================================
           11. TOMBOL AKSI
        ===================================================== */

        .btn-hapus {
            background: #fee2e2;
            color: #dc2626;
            padding: 6px 12px;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            font-size: 11px;
            font-weight: 600;
            display: inline-block;
        }

        .btn-hapus:hover { background: #fecaca; }

        /* =====================================================
           12. EMPTY & NO-SEARCH
        ===================================================== */

        .empty {
            text-align: center;
            padding: 55px 20px;
            color: #7c91a8;
            font-size: 13px;
        }

        .empty-icon {
            width: 65px;
            height: 65px;
            margin: 0 auto 13px;
            border-radius: 50%;
            background: #edf6ff;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .no-search {
            display: none;
            text-align: center;
            padding: 35px;
            color: #7890a8;
            font-size: 12px;
        }

        /* =====================================================
           13. BOTTOM INFO
        ===================================================== */

        .bottom-info {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 14px 4px 2px;
            color: #7990a8;
            font-size: 10px;
        }

        .info-text {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .info-icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            background: #e4f2ff;
            color: #1683d8;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
        }

        /* =====================================================
           14. RESPONSIVE
        ===================================================== */

        @media (max-width: 900px) {
            .stats { grid-template-columns: repeat(2, 1fr); }
            .hero { padding: 20px; }
            .container { padding: 20px 15px; }
        }

        @media (max-width: 600px) {
            .header { padding: 0 15px; }
            .header-title { font-size: 17px; }
            .header-icon {
                width: 32px;
                height: 32px;
                font-size: 17px;
            }
            .stats { grid-template-columns: 1fr; }
            .page-title { font-size: 23px; }
            .page-subtitle { font-size: 11px; }
            .hero-decoration { display: none; }
            .filter-area { flex-direction: column; }
            .date-filter { width: 100%; }
            .bottom-info {
                flex-direction: column;
                align-items: flex-start;
                gap: 8px;
            }
        }
    </style>
</head>

<body>

    <!-- =====================================================
         HEADER
    ===================================================== -->
    <div class="header">
        <div class="header-title">
            <div class="header-icon">💼</div>
            Panel Peminjam
        </div>

        <div class="header-menu">
            <a href="{{ url('/peminjam/katalog') }}">
                ▦ &nbsp; Katalog Alat
            </a>
        </div>
    </div>

    <!-- =====================================================
         KONTEN
    ===================================================== -->
    <div class="container">

        <!-- HERO -->
        <div class="hero">
            <div class="hero-left">
                <div class="history-icon">↻</div>
                <div>
                    <h1 class="page-title">Riwayat Peminjaman</h1>
                    <p class="page-subtitle">
                        Berikut adalah daftar riwayat peminjaman alat Anda.
                    </p>
                </div>
            </div>

            <div class="hero-decoration">📋</div>
        </div>

        <!-- STATISTIK -->
        @php
            $statusOf = fn ($item) => strtolower(trim($item->status ?? ''));

            $totalPeminjaman = $peminjaman->count();
            $totalSelesai    = $peminjaman->filter(fn ($item) => in_array($statusOf($item), ['selesai', 'dikembalikan']))->count();
            $totalDipinjam   = $peminjaman->filter(fn ($item) => $statusOf($item) === 'dipinjam')->count();
            $totalTerlambat  = $peminjaman->filter(fn ($item) => in_array($statusOf($item), ['telat', 'terlambat']))->count();
        @endphp

        <div class="stats">
            <div class="stat-card stat-blue">
                <div class="stat-icon icon-blue">▣</div>
                <div>
                    <div class="stat-label">Total Peminjaman</div>
                    <div class="stat-number">{{ $totalPeminjaman }} <span>kali</span></div>
                </div>
            </div>

            <div class="stat-card stat-green">
                <div class="stat-icon icon-green">✓</div>
                <div>
                    <div class="stat-label">Selesai</div>
                    <div class="stat-number">{{ $totalSelesai }} <span>kali</span></div>
                </div>
            </div>

            <div class="stat-card stat-orange">
                <div class="stat-icon icon-orange">◷</div>
                <div>
                    <div class="stat-label">Dipinjam</div>
                    <div class="stat-number">{{ $totalDipinjam }} <span>kali</span></div>
                </div>
            </div>

            <div class="stat-card stat-red">
                <div class="stat-icon icon-red">!</div>
                <div>
                    <div class="stat-label">Terlambat</div>
                    <div class="stat-number">{{ $totalTerlambat }} <span>kali</span></div>
                </div>
            </div>
        </div>

        <!-- TABEL CARD -->
        <div class="card">

            <!-- NOTIFIKASI -->
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            @if (session('error'))
                <div class="alert alert-error">{{ session('error') }}</div>
            @endif

            <!-- FILTER -->
            <div class="filter-area">
                <div class="search-wrapper">
                    <span class="search-icon">🔍</span>
                    <input
                        type="text"
                        id="searchInput"
                        class="search-input"
                        placeholder="Cari nama alat, tanggal, atau status..."
                        autocomplete="off"
                    >
                </div>

                <input
                    type="date"
                    id="dateFilter"
                    class="date-filter"
                >
            </div>

            @if ($peminjaman->isEmpty())

                <!-- DATA KOSONG -->
                <div class="empty">
                    <div class="empty-icon">📋</div>
                    Belum ada riwayat peminjaman.
                </div>

            @else

                <!-- TABEL RIWAYAT -->
                <div class="table-wrapper">
                    <table>

                        <thead>
                            <tr>
                                <th class="col-no">No</th>
                                <th class="col-tanggal">📅 &nbsp; Tanggal</th>
                                <th>🔧 &nbsp; Alat</th>
                                <th class="col-rencana">🗓 &nbsp; Rencana Kembali</th>
                                <th class="col-status">⚙ &nbsp; Status</th>
                                <th class="col-aksi">🗑 &nbsp; Aksi</th>
                            </tr>
                        </thead>

                        <tbody id="historyTableBody">

                            @foreach ($peminjaman as $item)

                                @php
                                    $status = strtolower(trim($item->status ?? ''));

                                    $sudahSelesai = in_array($status, ['selesai', 'dikembalikan']);
                                    $sudahTelat   = in_array($status, ['telat', 'terlambat']);

                                    // Barang pernah dihapus admin (relasi alat kosong)
                                    $barangDihapus = $item->detailPinjam->contains(
                                        fn ($detail) => $detail->alat === null
                                    );

                                    // Hapus hanya boleh untuk riwayat selesai atau barang dihapus admin
                                    $bolehHapus = $sudahSelesai || $barangDihapus;

                                    // Penanda keterlambatan pada kolom rencana kembali
                                    $melewatiBatas = ! $sudahSelesai
                                        && $item->tgl_kembali_plan
                                        && $item->tgl_kembali_plan->isPast();

                                    // Label & warna status
                                    if ($status === 'dipinjam') {
                                        [$statusLabel, $statusClass] = ['Dipinjam', 'status-dipinjam'];
                                    } elseif ($status === 'diajukan') {
                                        [$statusLabel, $statusClass] = ['Diajukan', 'status-diajukan'];
                                    } elseif ($sudahSelesai) {
                                        [$statusLabel, $statusClass] = ['Selesai', 'status-selesai'];
                                    } elseif ($sudahTelat) {
                                        [$statusLabel, $statusClass] = ['Terlambat', 'status-terlambat'];
                                    } else {
                                        [$statusLabel, $statusClass] = [$item->status ?? '-', 'status-lain'];
                                    }

                                    // Data pencarian (nama alat + tanggal + status)
                                    $namaAlatSearch = $item->detailPinjam
                                        ->map(fn ($detail) => $detail->alat->nama_alat ?? 'Barang sudah dihapus admin')
                                        ->implode(' ');

                                    $searchData = strtolower(implode(' ', [
                                        $item->id,
                                        $status,
                                        $item->created_at?->format('d-m-Y') ?? '',
                                        $namaAlatSearch,
                                    ]));
                                @endphp

                                <tr
                                    class="history-row"
                                    data-search="{{ $searchData }}"
                                    data-date="{{ $item->created_at?->format('Y-m-d') }}"
                                >

                                    <!-- NO -->
                                    <td class="td-center">
                                        <span class="id-number">{{ $item->id }}</span>
                                    </td>

                                    <!-- TANGGAL -->
                                    <td>
                                        <div class="date-main">
                                            {{ $item->created_at?->format('d-m-Y') ?? '-' }}
                                        </div>
                                    </td>

                                    <!-- ALAT -->
                                    <td>
                                        <div class="alat-list">

                                            @forelse ($item->detailPinjam as $detail)

                                                @php
                                                    $alatDihapus = $detail->alat === null;

                                                    $namaAlat = $alatDihapus
                                                        ? 'Barang sudah dihapus admin'
                                                        : $detail->alat->nama_alat;

                                                    // Foto alat yang tersimpan, fallback placeholder
                                                    if ($alatDihapus) {
                                                        $foto = 'https://placehold.co/46x42/f3f8fc/dc2626?text=Hapus';
                                                    } elseif (! empty($detail->alat->gambar)) {
                                                        $foto = asset($detail->alat->gambar);
                                                    } else {
                                                        $foto = 'https://placehold.co/46x42/f3f8fc/7890a8?text=Alat';
                                                    }
                                                @endphp

                                                <div class="alat-item">
                                                    <img
                                                        src="{{ $foto }}"
                                                        class="alat-photo"
                                                        alt="{{ $namaAlat }}"
                                                        loading="lazy"
                                                        onerror="this.onerror=null;this.src='https://placehold.co/46x42/f3f8fc/7890a8?text=Alat';"
                                                    >

                                                    <div class="alat-info">
                                                        <div class="alat-name {{ $alatDihapus ? 'alat-name-dihapus' : '' }}">
                                                            {{ $namaAlat }}
                                                        </div>

                                                        @if ($alatDihapus)
                                                            <div class="note note-danger" style="margin-top:3px;">
                                                                Data alat sudah dihapus oleh admin.
                                                            </div>
                                                        @else
                                                            <div class="alat-quantity">
                                                                <span class="alat-dot"></span>
                                                                {{ $detail->jumlah ?? 0 }} unit
                                                            </div>
                                                        @endif
                                                    </div>
                                                </div>

                                            @empty
                                                <span class="note note-danger" style="margin-top:0;">
                                                    Detail barang tidak tersedia.
                                                </span>
                                            @endforelse

                                        </div>
                                    </td>

                                    <!-- RENCANA KEMBALI -->
                                    <td>
                                        <div class="date-main">
                                            {{ $item->tgl_kembali_plan?->format('d-m-Y') ?? '-' }}
                                        </div>

                                        @if ($melewatiBatas)
                                            <div class="note note-overdue">
                                                Melewati batas
                                            </div>
                                        @endif
                                    </td>

                                    <!-- STATUS -->
                                    <td>
                                        <span class="status {{ $statusClass }}">
                                            {{ $statusLabel }}
                                        </span>

                                        @if ($barangDihapus)
                                            <div class="note note-danger">
                                                Barang dihapus admin
                                            </div>
                                        @endif
                                    </td>

                                    <!-- AKSI -->
                                    <td class="td-center">
                                        @if ($bolehHapus)
                                            <form
                                                action="{{ route('peminjam.riwayat.hapus', $item->id) }}"
                                                method="POST"
                                                onsubmit="return confirm('Yakin ingin menghapus riwayat peminjaman ini?')"
                                            >
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit" class="btn-hapus">
                                                    🗑 Hapus Riwayat
                                                </button>
                                            </form>
                                        @else
                                            <span class="note note-muted" style="margin-top:0;">
                                                Belum bisa dihapus
                                            </span>
                                        @endif
                                    </td>

                                </tr>

                            @endforeach

                        </tbody>

                    </table>

                    <!-- HASIL PENCARIAN -->
                    <div class="no-search" id="noSearch">
                        Tidak ada riwayat yang sesuai dengan pencarian.
                    </div>
                </div>

                <!-- BOTTOM -->
                <div class="bottom-info">
                    <div class="info-text">
                        <div class="info-icon">i</div>
                        Riwayat ini menunjukkan semua peminjaman alat yang pernah Anda ajukan.
                    </div>

                    <div>Sistem Peminjaman Alat</div>
                </div>

            @endif

        </div>

    </div>

    <!-- =====================================================
         JAVASCRIPT (FILTER PENCARIAN & TANGGAL)
    ===================================================== -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchInput');
            const dateFilter  = document.getElementById('dateFilter');
            const rows        = document.querySelectorAll('.history-row');
            const noSearch    = document.getElementById('noSearch');

            function filterHistory() {
                const keyword      = searchInput.value.toLowerCase().trim();
                const selectedDate = dateFilter.value;

                let found = 0;

                rows.forEach(function (row) {
                    const searchData = row.dataset.search.toLowerCase();
                    const rowDate    = row.dataset.date;

                    const matchKeyword = keyword === '' || searchData.includes(keyword);
                    const matchDate    = selectedDate === '' || rowDate === selectedDate;

                    if (matchKeyword && matchDate) {
                        row.style.display = '';
                        found++;
                    } else {
                        row.style.display = 'none';
                    }
                });

                if (noSearch) {
                    noSearch.style.display =
                        found === 0 && rows.length > 0 ? 'block' : 'none';
                }
            }

            if (searchInput) {
                searchInput.addEventListener('input', filterHistory);
            }

            if (dateFilter) {
                dateFilter.addEventListener('change', filterHistory);
            }
        });
    </script>

</body>
</html>
