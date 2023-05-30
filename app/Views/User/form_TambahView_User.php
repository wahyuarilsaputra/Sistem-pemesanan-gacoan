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
                <?= form_open('/User/tambah') ?>
                <h3>Tambah User</h3>
                <label for="" style="margin-bottom: 5px;">Username</label>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>"
                        id="username" name="username" placeholder="Masukan Nama User">
                        <div class="invalid-feedback">
                            Username Kosong
                        </div>
                </div>
                <label for="" style="margin-bottom: 5px;">Password</label>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>"
                        id="password" name="password" placeholder="Masukan Nama Password">
                        <div class="invalid-feedback">
                            Password Kosong
                        </div>
                </div>
                <label for="" style="margin-bottom: 5px;">Nama User</label>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>"
                        id="nama" name="nama" placeholder="Masukan Nama User">
                        <div class="invalid-feedback">
                            Nama Kosong
                        </div>
                </div>
                <label for="" style="margin-bottom: 5px;">Level</label>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user <?= ($validation->hasError('level')) ? 'is-invalid' : ''; ?>"
                        id="level" name="level" placeholder="Masukan level">
                        <div class="invalid-feedback">
                            Level Kosong
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