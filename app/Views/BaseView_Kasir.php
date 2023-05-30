<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Warung Gacoan</title>

    <!-- Custom fonts for this template-->
    <link rel="icon" href="<?=base_url()?>/template/img/logo_login2.png" type="image/x-icon">
    <link href="<?=base_url()?>/template/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?=base_url()?>/template/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">
    <?php if (session()->getFlashdata('success')): ?>
        <script>
            alert("<?php echo session()->getFlashdata('success'); ?>");
        </script>
    <?php endif; ?>

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-text mx-3" style="font-size: 15px;">Warung Gacoan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <div class="sidebar-heading">
                Menu
            </div>   
                <?php
                    $db = db_connect();
                    session()->get('id_level');
                    $id_level = $_SESSION['id_user'];
                    $sql = "select nama_interface from tb_interface
                            where id_interface in
                            (
                            select id_interface from tb_level_menu
                            where id_level = '$id_level' and status = 'aktif'
                            )";
                    $query = $db->query($sql,session()->get('id_level'));
                    foreach ($query->getResultArray() as $row){
                        echo '<li class="nav-item">
                        <a class="nav-link" href="'.site_url($row['nama_interface']).'/index"><span>'.$row['nama_interface'].'</span></a>
                        </li>';
                    }
                ?>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Topbar Navbar -->
                    <?php 
                        session()->get('id_user');
                        $nama = $_SESSION['nama'];
                    ?>
                    <ul class="navbar-nav ml-auto">
                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nama; ?></span>
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Keluar
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Daftar Pesanan</h1>
                    </div>
                    <!-- Content Row -->
                    <!-- Dashboard -->
                    <div class="row">
            <div class="card-body">
                <?php if (session()->has('success')) : ?>
                    <div class="alert alert-success">
                        <?= session('success') ?>
                    </div>
                <?php endif; ?>
                <?php if (session()->has('error')) : ?>
                    <div class="alert alert-danger">
                        <?= session('error') ?>
                    </div>
                <?php endif; ?>
                <div class="table-responsive">
                    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Id Pemesanan</th>
                                <th>Nama Pelanggan</th>
                                <th>Tanggal</th>
                                <th>Jumlah</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>  
                            <?php foreach ($tampil as $tampil) : ?>
                        <tr>
                        <tr>
                            <td><?= $tampil->id_pemesanan ?></td>
                            <td><?= $tampil->nama ?></td>
                            <td><?= $tampil->tanggal_pemesanan ?></td>
                            <td><?= $tampil->jumlah ?></td>
                            <td><?= $tampil->status ?></td>
                            <td>
                                <a href="<?php echo base_url('/Kasir/bayar/'.$tampil->id_pemesanan); ?>">
                                    <button type="button" class="btn btn-danger">Pembayaran</button>
                                </a>
                                <a href="<?php echo base_url('/Kasir/detail_pesanan/'.$tampil->id_pemesanan); ?>">
                                    <button type="button" class="btn btn-danger">Detail</button>
                                </a>
                            </td>
                            </tr>
                            <?php endforeach; ?>
                        </tr>
                        </tbody>
                    </table>
                </div>  

            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; P11 PSBF</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bayar Modal-->
    <div class="modal fade" id="bayarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ingin Memesan?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Mau nambah ni</button>
                    <a class="btn btn-primary" href="/Pembayaran/bayar">Pesan</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Yakin ingin keluar?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="/Logout/logout">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="<?=base_url()?>/template/vendor/jquery/jquery.min.js"></script>
    <script src="<?=base_url()?>/template/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?=base_url()?>/template/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?=base_url()?>/template/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?=base_url()?>/template/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?=base_url()?>/template/js/demo/chart-area-demo.js"></script>
    <script src="<?=base_url()?>/template/js/demo/chart-pie-demo.js"></script>

</body>

</html>




