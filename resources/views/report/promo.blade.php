<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Promo Servis</title>
    <style>
        body { font-family: sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 20px; border-bottom: 2px solid #000; padding-bottom: 10px; }
        .header h2, .header h4 { margin: 0; padding: 2px; }
        table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        th, td { border: 1px solid #000; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; text-align: center; }
        .text-center { text-align: center; }
    </style>
</head>
<body>
    <div class="header">
        <h2>BENGKEL PASTIBERES</h2>
        <h4>Laporan Data Master: Promo Servis</h4>
        <p>Dicetak pada: {{ \Carbon\Carbon::now()->format('d F Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="20%">Cabang Penyelenggara</th>
                <th width="15%">Diskon</th>
                <th width="25%">Periode Berlaku</th>
                <th width="35%">Syarat & Ketentuan</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $p)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td><strong>{{ $p->bengkel->namabengkel ?? '-' }}</strong></td>
                <td class="text-center" style="color: red; font-weight: bold;">{{ $p->persen }}%</td>
                <td class="text-center">{{ \Carbon\Carbon::parse($p->mulai_tgl)->format('d M Y') }} - {{ \Carbon\Carbon::parse($p->hingga_tgl)->format('d M Y') }}</td>
                <td>{{ $p->deskripsi ?? 'Tidak ada S&K' }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>