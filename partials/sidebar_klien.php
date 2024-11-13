<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link px-5">
        <img src="assets/img/logo1.png" alt="AdminLTE Logo" width="100%">
        <!-- <span class="brand-text font-weight-light">Jingga Kreatif</span> -->
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <!-- <img src="assets/img/sy.png" style="height:55px; width:55px; object-fit: cover;" class="img-circle elevation-2" alt="User Image"> -->
            </div>
            <div class="info">
                <a href="#" class="d-block"><?= $_SESSION['username']; ?></a>
                <a href="#" class="d-block"><?= $_SESSION['level']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="index.php" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] == "") ? "active" : "")  : "active" ?>">
                        <i class="nav-icon fas fa-home"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="?page=pengajuan" class="nav-link <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['pengajuan', 'edit_pengajuan', 'tambah_pengajuan', 'detail_pengajuan'])) ? "active" : "")  : "" ?>">
                        <i class="nav-icon fa fa-paper-plane"></i>
                        <p>
                            Pengajuan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=edit_klien&id=<?= $_SESSION['id_klien'] ?>" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] == "edit_klien") ? "active" : "")  : "" ?>">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                            Profil
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="?page=jadwal_meeting" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] == "jadwal_meeting" || $_GET['page'] == "edit_jadwal_meeting") ? "active" : "")  : "" ?>">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p>
                            Jadwal Meeting
                        </p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="?page=anggaran" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] == "anggaran" || $_GET['page'] == "detail_anggaran") ? "active" : "")  : "" ?>">
                        <i class="nav-icon fas fa-dollar-sign"></i>
                        <p>
                            Anggaran
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=pembayaran" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] == "pembayaran" || $_GET['page'] == "detail_pembayaran") ? "active" : "")  : "" ?>">
                        <i class="nav-icon far fa-credit-card"></i>
                        <p>
                            Pembayaran
                        </p>
                    </a>
                </li>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>