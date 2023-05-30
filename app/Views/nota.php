<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <table>
        <thead>
            <tr><th colspan="6">Mie</th></tr>
            <tr><th colspan="6">Gacoan</th></tr>
            <tr><th colspan="6">BANGKALAN</th></tr>
            <tr><th colspan="6">========================</th></tr>
        </thead>
        <tbody>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td colspan="4"><?= $nota['tanggal_pembayaran']; ?></td>
            </tr>
            <tr>
                <td>Nama User</td>
                <td>:</td>
                <td colspan="4"><?= $user; ?></td>
            </tr>
            <tr>
                <td>Nama Kasir</td>
                <td>:</td>
                <td colspan="4"><?= $kasir; ?></td>
            </tr>
            <tr><th colspan="6">========================</th></tr>
            <?php foreach ($menu as $menu): ?>
                <tr><td colspan="6"><?= $menu->nama_menu; ?></td></tr>
                <tr>
                    <td><?= $menu->jumlah; ?></td>
                    <td>x</td>
                    <td><?= $menu->harga; ?></td>
                    <td></td>
                    <?php $total_harga_menu = intval($menu->jumlah) * intval($menu->harga);?>
                    <td colspan="6"><?= $total_harga_menu ?></td>
                </tr>
            <?php endforeach; ?>
            <tr><th colspan="6">---------------------------------------</th></tr>
            <tr>
                <?php foreach ($pembayaran as $bayar): ?>
                <td>Jumlah</td>
                <td>:</td>
                <td><?= $bayar->jumlah; ?></td>
                <td>Total</td>
                <td>:</td>
                <td><?= $bayar->total_harga; ?></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>Bayar</td>
                <td>:</td>
                <td><?= $bayar->bayar; ?></td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td colspan="3">-----------------</td>
            </tr>
            <tr>
                <td colspan="3"></td>
                <td>Kembalian</td>
                <td>:</td>
                <td><?= $bayar->kembalian; ?></td>
            </tr>
            <tr>
            <?php endforeach; ?>
                <th colspan="6">Terima Kasih</th>
            </tr>
        </tbody>
    </table>
</body>
</html>