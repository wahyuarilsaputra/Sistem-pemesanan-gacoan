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
                <?= form_open('/levelmenu/update/'. $tampil['id_level_menu']) ?>
                <h3>Update Level Menu</h3>
                <label for="" style="margin-bottom: 5px;">ID Level</label>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" readonly
                        id="id_level_menu" name="id_level_menu" placeholder="Masukan id Level" value="<?= $tampil['id_level_menu'] ;?>">
                </div>
                <label for="" style="margin-bottom: 5px;">Id level</label>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" readonly
                        id="id_level" name="id_level" placeholder="Masukan Nama Menu" value="<?= $tampil['id_level'] ;?>">
                </div>
                <label for="" style="margin-bottom: 5px;">Id Interface</label>
                <div class="form-group">
                    <input type="text" class="form-control form-control-user" readonly
                        id="id_interface" name="id_interface" placeholder="Masukan Nama Menu" value="<?= $tampil['id_interface'] ;?>">
                </div>
                <label for="" style="margin-bottom: 5px;">Status</label>
                <select class="form-control form-control-user" name="status" id="status">
                    <option value="aktif" <?php if ($tampil['status'] == "aktif") echo 'selected="selected"'; ?>>Aktif</option>
                    <option value="tidak" <?php if ($tampil['status'] == "tidak") echo 'selected="selected"'; ?>>Tidak</option>
                </select>
                <button type="submit" name="button" class="btn-primary" style="margin-top: 5px;">Update</button>
                <?= form_close() ?>
            </div>
        </div>
    </div>
</body>
</html>