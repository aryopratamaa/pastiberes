<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Laporan Cabang Bengkel</title>
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
        <h4>Laporan Data Master: Cabang Bengkel</h4>
        <p>Dicetak pada: {{ \Carbon\Carbon::now()->format('d F Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="25%">Nama Cabang</th>
                <th width="20%">Tipe Layanan</th>
                <th width="30%">Alamat</th>
                <th width="20%">Terdaftar Pada</th>
            </tr>
        </thead>
        <tbody>
            @foreach($data as $index => $b)
            <tr>
                <td class="text-center">{{ $index + 1 }}</td>
                <td><strong>{{ $b->namabengkel }}</strong></td>
                <td class="text-center">{{ $b->tipeLayanan->tipe ?? '-' }}</td>
                <td>{{ $b->alamat }}</td>
                <td class="text-center">{{ $b->created_at->format('d/m/Y') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>