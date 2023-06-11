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
                    $id_level = $_SESSION['level'];
                    $sql = "select nama_interface from tb_interface
                            where id_interface in
                            (
                            select id_interface from tb_level_menu
                            where id_level = '$id_level' and status = 'aktif'
                            )";
                    $query = $db->query($sql,session()->get('id_level'));
                    foreach ($query->getResultArray() as $row){
                        if ($row['nama_interface'] == 'laporan') {
                            echo '<li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                                        <span>'.$row['nama_interface'].'</span>
                                    </a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="'.base_url('laporan/index').'">Data Laporan</a>
                                        <a class="dropdown-item" href="'.base_url('laporan/grafik').'">Grafik Laporan</a>
                                        <a class="dropdown-item" href="'.base_url('laporan/best_seller').'">Menu Best Seller</a>
                                    </div>
                                </li>';
                        }else {
                            echo '<li class="nav-item">
                                    <a class="nav-link" href="'.site_url($row['nama_interface']).'/index">
                                        <span>'.$row['nama_interface'].'</span>
                                    </a>
                                </li>';
                        }
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
                        $nama = $_SESSION['username'];
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
                        <h1 class="h3 mb-0 text-gray-800">Grafik Per bulan</h1>
                    </div>
                    <!-- Content Row -->
                    <!-- Dashboard -->
                    <div class="row">
                        <form method="get" action="<?php echo base_url('laporan/best_seller'); ?>">
                            <label for="bulan">Pilih Bulan:</label>
                            <select name="bulan" id="bulan">
                                <?php for ($i = 1; $i <= 12; $i++) : ?>
                                    <option value="<?php echo $i; ?>" <?php if ($i == $bulan) echo 'selected'; ?>><?php echo date('F', mktime(0, 0, 0, $i, 1)); ?></option>
                                    <?php endfor; ?>
                                </select>
                                <button type="submit" class="btn btn-primary">Tampilkan</button>
                            </form>
                    <div class="row">
                    <?php if (!empty($menuTerpopuler)) : ?>
                        <h4>&nbsp;&nbsp;Menu Terpopuler Bulan <?php echo date('F', mktime(0, 0, 0, $bulan, 1)); ?></h4>
                        <canvas id="chart"></canvas>
                    <?php else : ?>
                        <p>Tidak ada data menu terpopuler untuk bulan ini.</p>
                    <?php endif; ?>
                    </div>  
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
    
    <!-- Page level custom scripts -->
    <script>
    // Ambil data menu terpopuler dari controller
    var menuTerpopuler = <?php echo json_encode($menuTerpopuler); ?>;

    // Siapkan data dan label untuk grafik
    var labels = [];
    var data = [];

    for (var i = 0; i < menuTerpopuler.length; i++) {
        labels.push(menuTerpopuler[i].nama_menu);
        data.push(menuTerpopuler[i].total_pesanan);
    }

    // Buat grafik menggunakan Chart.js
    var ctx = document.getElementById('chart').getContext('2d');
    var chart = new Chart(ctx, {
        type: 'horizontalBar',
        data: {
            labels: labels,
            datasets: [{
                label: 'Jumlah Menu',
                data: data,
                backgroundColor: 'rgb(66, 144, 245, 0.8)',
                borderColor: 'rgb(66, 144, 245, 0.8)',
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }
        }
    });
</script>


</body>

</html>
