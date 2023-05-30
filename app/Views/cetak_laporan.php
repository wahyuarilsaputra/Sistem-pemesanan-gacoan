<!DOCTYPE html>
<html>
<head>
    <title>Nota</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h2>Nota</h2>
    <table>
        <tr>
            <th>id pembayaran</th>
            <th>id pemesanan</th>
            <th>id user</th>
            <th>tanggal</th>
            <th>jumlah</th>
            <th>total harga</th>
            <th>bayar</th>
            <th>kembalian</th>
        </tr>
        <?php foreach ($tampil as $tampil) : ?>
        <tr>
            <td><?= $tampil->id_pembayaran; ?></td>
            <td><?= $tampil->id_pemesanan; ?></td>
            <td><?= $tampil->id_user; ?></td>
            <td><?= $tampil->tanggal_pembayaran; ?></td>
            <td><?= $tampil->jumlah; ?></td>
            <td><?= $tampil->total_harga; ?></td>
            <td><?= $tampil->bayar; ?></td>
            <td><?= $tampil->kembalian; ?></td>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>