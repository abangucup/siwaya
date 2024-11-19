<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Verifikasi WBTB</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 8px;
            text-align: center;
        }

        .header {
            margin-bottom: 20px;
        }

        .tabel {
            width: 100%;
            border-collapse: collapse;
        }

        .tabel th,
        .tabel td {
            border: 1px solid #ddd;
            padding: 6px;
            text-align: center;
        }

        .tabel th {
            background-color: #f2f2f2;
        }
        
        thead {
            display: table-header-group;
        }

    </style>
</head>

<body>
    <div class="header">
        <h1>Laporan Verifikasi Warisan Budaya Tak Benda</h1>
        <span>Dinas Pendidikan dan Kebudayaan Provinsi Gorontalo</span>
        <hr>
    </div>
    <table class="tabel">
        <thead>
            <tr>
                <th>No</th>
                <th>Nomor WBTB</th>
                <th>Nama WBTB</th>
                <th>Kategori</th>
                <th>Kondisi</th>
                <th>Deskripsi</th>
                <th>Status</th>
                <th>Sebaran</th>
                <th>Instansi</th>
                <th>Pembuat</th>
                <th>Status Verif</th>
                <th>Keterangan Verif</th>
                <th>Tanggal Verif</th>
                <th>Status Penetapan</th>
                <th>Keterangan Penetapan</th>
                <th>Tanggal Penetapan</th>
                <th>Url Gambar</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($wbtbs as $index => $wbtb)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $wbtb?->nomor_wbtb }}</td>
                <td>{{ $wbtb->nama_wbtb }}</td>
                <td>{{ $wbtb->kategoris->pluck('nama_kategori')->implode(', ') }}</td>
                <td>{{ $wbtb->kondisi->nama_kondisi }}</td>
                <td>{{ $wbtb->deskripsi_wbtb }}</td>
                <td>{{ Str::upper($wbtb->status) }}</td>
                <td>{{ $wbtb->sebarans->pluck('nama_kabkot')->implode(', ') }}</td>
                <td>{{ $wbtb->user->instansi?->nama_instansi ?? 'Masyarakat' }}</td>
                <td>{{ $wbtb->user->biodata->nama_lengkap }}</td>
                <td>{{ Str::upper($wbtb->verifikasi?->status_verifikasi) }}</td>
                <td>{{ $wbtb->verifikasi?->keterangan }}</td>
                <td>{{ \Carbon\Carbon::parse($wbtb->verifikasi?->tanggal_verifikasi)->isoFormat('LL') }}</td>
                <td>{{ Str::upper($wbtb->penetapan?->status_penetapan) }}</td>
                <td>{{ $wbtb->penetapan?->keterangan }}</td>
                <td>{{ \Carbon\Carbon::parse($wbtb->penetapan?->tanggal_penetapan)->isoFormat('LL') }}</td>
                <td>
                    <img src="{{ public_path($wbtb->galeries()->first()->url_image) }}" alt="Gambar" style="max-width: 100px; height: auto;">
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <table style="margin-top: 4rem; width: 100%; text-align: center">
        <tr>
            <td colspan="3" style="padding-bottom: 20px">Mengetahui,</td>
        </tr>
        <tr>
            <td style="padding-bottom: 50px">Verifikator Kabupaten/Kota</td>
            <td></td>
            <td style="padding-bottom: 50px">Verifikator Provinsi</td>
        </tr>
        <tr>
            <td>{{ $wbtb->verifikasi->user->biodata->nama_lengkap ?? 'Kosong' }}</td>
            <td></td>
            <td>{{ $wbtb->penetapan->user->biodata->nama_lengkap ?? 'KOsong' }}</td>
        </tr>
    </table>
</body>

</html>