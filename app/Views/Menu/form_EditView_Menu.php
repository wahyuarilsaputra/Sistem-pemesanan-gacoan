<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Edit tampil</title>

    <!-- Custom fonts for this template-->
    <link href="<?=base_url()?>/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url()?>/template/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <div id="content-wrapper" class="d-flex flex-column">
        <div class="container-fluid">
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800"></h1>
            </div>
            <div class="container" style="margin-top: 40px; margin-bottom: 50px;">
                <hr>
                <?= form_open_multipart('/menu/update/'. $tampil['id_menu']) ?>
                <h3>Update Menu</h3>
                <label for="" style="margin-bottom: 5px;">Nama Menu</label>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user"
                        id="nama_menu" name="nama_menu" placeholder="Masukan Nama Menu" value="<?= $tampil['nama_menu'] ;?>">
                </div>
                <label for="" style="margin-bottom: 5px;">Harga</label>
                <div class="form-group">
                    <input type="number" class="form-control form-control-user"
                        id="harga" name="harga" placeholder="Masukan harga" value="<?= $tampil['harga'] ;?>">
                </div>
                <label for="" style="margin-bottom: 5px;">Status</label>
                <select class="form-control form-control-user" name="status" id="status">
                    <option value="tersedia" <?php if ($tampil['status'] == "tersedia") echo 'selected="selected"'; ?>>Tersedia</option>
                    <option value="tidak" <?php if ($tampil['status'] == "tidak") echo 'selected="selected"'; ?>>Tidak Tersedia</option>
                </select>
                <div class="form-group">
                    <label for="text-input" class=" form-control-label">Gambar</label>
                    <input type="file" id="gambar" name="gambar" class="form-control" style="height:50px" size="20">
                    <input type="hidden" name="lama" value="<?php echo $tampil['gambar']; ?>">
                </div>
                <button type="submit" name="button" class="btn-primary" style="margin-top: 5px;">Update</button>
                <button type="reset" name="button" class="btn-danger" style="margin-top: 5px;">Hapus</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</body>
</html>