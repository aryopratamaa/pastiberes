<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Promo Servis</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            font-size: 12px;
            color: #333;
        }

        .header {
            text-align: center;
            margin-bottom: 25px;
            border-bottom: 2px solid #435ebe;
            padding-bottom: 15px;
        }

        .header h2 {
            margin: 0;
            padding: 0;
            font-size: 24px;
            color: #435ebe;
        }

        .header h4 {
            margin: 5px 0;
            font-size: 16px;
            font-weight: normal;
            color: #555;
        }

        .header p {
            margin: 5px 0 0;
            font-size: 10px;
            color: #777;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #435ebe;
            color: #ffffff;
            text-align: center;
            text-transform: uppercase;
            font-size: 11px;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        .text-center {
            text-align: center;
        }
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
            @foreach ($data as $index => $p)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td><strong>{{ $p->bengkel->namabengkel ?? '-' }}</strong></td>
                    <td class="text-center" style="color: red; font-weight: bold;">{{ $p->persen }}%</td>
                    <td class="text-center">{{ \Carbon\Carbon::parse($p->mulai_tgl)->format('d M Y') }} -
                        {{ \Carbon\Carbon::parse($p->hingga_tgl)->format('d M Y') }}</td>
                    <td>{{ $p->deskripsi ?? 'Tidak ada S&K' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
