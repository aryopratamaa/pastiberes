<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Laporan Tipe Layanan</title>
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
        <h4>Laporan Data Master: Tipe Layanan</h4>
        <p>Dicetak pada: {{ \Carbon\Carbon::now()->format('d F Y H:i') }}</p>
    </div>

    <table>
        <thead>
            <tr>
                <th width="5%">No</th>
                <th width="30%">Tipe Layanan</th>
                <th>Deskripsi Operasional</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $index => $item)
                <tr>
                    <td class="text-center">{{ $index + 1 }}</td>
                    <td><strong>{{ $item->tipe }}</strong></td>
                    <td>{{ $item->deskripsi ?? '-' }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
