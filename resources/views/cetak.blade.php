<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .container {
            max-width: 36rem/* 576px */;
            margin-left: auto;
            margin-right: auto;
            padding-left: 2rem/* 32px */;
            padding-right: 2rem/* 32px */;
            margin-top: calc(1.5rem * calc(1 - 0));
            margin-bottom: calc(1.5rem * 0);
        }
        .heading {
            font-weight: 900;
            color: rgb(31 41 55 / 1);
            font-size: 2.25rem/* 36px */;
            line-height: 2.5rem/* 40px */;
        }

        table {
            width: 100%;
        }

        th {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1 class="heading">Bukti Reservasi</h1>
        <table>
            <tr>
                <th>Id Reservasi</th>
                <td>:</td>
                <td>{{ $reservasi->id }}</td>
            </tr>
            <tr>
                <th>Email</th>
                <td>:</td>
                <td>{{ $reservasi->email }}</td>
            </tr>
            <tr>
                <th>Nama Tamu</th>
                <td>:</td>
                <td>{{ $reservasi->nama_tamu }}</td>
            </tr>
            <tr>
                <th>No Handphone</th>
                <td>:</td>
                <td>{{ $reservasi->no_handphone }}</td>
            </tr>
            <tr>
                <th>Tipe Kamar</th>
                <td>:</td>
                <td>{{ $reservasi->tipe_kamar }}</td>
            </tr>
            <tr>
                <th>Tanggal Check In</th>
                <td>:</td>
                <td>{{ $reservasi->check_in }}</td>
            </tr>
            <tr>
                <th>Tanggal Check Out</th>
                <td>:</td>
                <td>{{ $reservasi->check_out }}</td>
            </tr>
            <tr>
                <th>Status Reservasi</th>
                <td>:</td>
                <td>{{ $reservasi->status }}</td>
            </tr>
        </table>
    </div>
</body>
</html>