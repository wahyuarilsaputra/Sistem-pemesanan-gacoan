<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Dashboard</title>

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
                <?= form_open_multipart('/menu/tambah') ?>
                <h3>Tambah Menu</h3>
                <label for="" style="margin-bottom: 5px;">Nama Menu</label>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('nama_menu')) ? 'is-invalid' : ''; ?>"
                        id="nama_menu" name="nama_menu" placeholder="Masukan Nama Menu">
                        <div class="invalid-feedback">
                            Nama Menu Kosong
                        </div>
                </div>
                <label for="" style="margin-bottom: 5px;">Harga</label>
                <div class="form-group">
                    <input type="number" class="form-control form-control-user <?= ($validation->hasError('harga')) ? 'is-invalid' : ''; ?>"
                        id="harga" name="harga" placeholder="Masukan Harga">
                        <div class="invalid-feedback">
                           Harga Kosong
                        </div>
                </div>
                <label for="" style="margin-bottom: 5px;">Status</label>
                <select class="form-control form-control-user" name="status" id="status">
                    <option value="tersedia">Tersedia</option>
                    <option value="kosong">Kosong</option>
                </select>
                <div class="form-group">
                    <label for="" class=" form-control-label">Gambar</label>
                    <input type="file" id="gambar" name="gambar" class="form-control <?= ($validation->hasError('gambar')) ? 'is-invalid' : ''; ?>" style="height:50px" size="20" required>
                    <div class="invalid-feedback">
                        Gambar Kosong
                    </div>
                </div>
                <button type="submit" name="button" class="btn-primary" style="margin-top: 5px;">Tambah</button>
                <button type="reset" name="button" class="btn-danger" style="margin-top: 5px;">Hapus</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>

</body>

</html>