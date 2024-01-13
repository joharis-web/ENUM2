<x-guest-layout>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>History Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        tr:hover {
            background-color: #f1f1f1;
        }
    </style>
</head>
<body>
    <h1>History Pembayaran</h1>
    <table>
        <thead>
            <tr>
                <th>Tanggal</th>
                <th>Deskripsi</th>
                <th>Jumlah</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <!-- Data dari database atau sumber lain -->
            <tr>
                <td>10 Januari 2024</td>
                <td>Pembayaran Listrik</td>
                <td>Rp 500.000</td>
                <td>Sukses</td>
            </tr>
            <tr>
                <td>5 Januari 2024</td>
                <td>Pembayaran Internet</td>
                <td>Rp 350.000</td>
                <td>Sukses</td>
            </tr>
            <!-- Menambahkan baris sesuai dengan data history pembayaran -->
        </tbody>
    </table>
</body>
</html>

</x-guest-layout>