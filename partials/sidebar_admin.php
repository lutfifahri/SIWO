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
                <a href="#" class="d-block"><?= $_SESSION['level']; ?></a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 pb-5">
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
                <!-- <li class="nav-item">
                    <a href="?page=latihan" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] == "latihan") ? "active" : "")  : "" ?>">
                        <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                        <p>
                            Data Latihan
                        </p>
                    </a>
                </li> -->
                <li class="nav-item">
                    <a href="?page=karyawan" class="nav-link <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['karyawan', 'tambah_karyawan', 'edit_karyawan'])) ? "active" : "")  : "" ?>">
                        <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                        <p>
                            Data Karyawan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="?page=klien" class="nav-link <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['klien', 'tambah_klien', 'edit_klien'])) ? "active" : "")  : "" ?>">
                        <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                        <p>
                            Data Klien
                        </p>
                    </a>
                </li>
                <li class="nav-item <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['detail_konsep', 'detail_produksi', 'detail_talent', 'detail_equipment', 'jabatan', 'bank', 'konsep', 'produksi', 'equipment', 'talent', 'tambah_konsep', 'tambah_bank', 'tambah_jabatan', 'tambah_produksi', 'tambah_equipment', 'tambah_talent', 'edit_konsep', 'edit_bank', 'edit_produksi', 'edit_jabatan', 'edit_equipment', 'edit_talent'])) ? "menu-open" : "")  : "" ?>">
                    <a href="#" class="nav-link <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['detail_konsep', 'detail_produksi', 'detail_talent', 'detail_equipment', 'jabatan', 'konsep', 'produksi', 'equipment', 'talent', 'tambah_konsep', 'tambah_jabatan', 'bank', 'tambah_produksi', 'tambah_equipment', 'tambah_talent', 'tambah_bank', 'edit_konsep', 'edit_bank', 'edit_produksi', 'edit_jabatan', 'edit_equipment', 'edit_talent'])) ? "active" : "")  : "" ?>">
                        <i class="nav-icon far fa-folder"></i>
                        <p>
                            Master Data
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <!-- <li class="nav-item">
                            <a href="?page=latihan_relasi" class="nav-link <?= isset($_GET['page']) ? (in_array($_GET['page'], ['latihan_relasi', 'tambah_latihan_relasi', 'edit_latihan_relasi']) ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Latihan</p>
                            </a>
                        </li> -->
                        <li class="nav-item">
                            <a href="?page=bank" class="nav-link  <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['bank', 'tambah_bank', 'edit_bank'])) ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>
                                    Bank
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=jabatan" class="nav-link <?= isset($_GET['page']) ? (in_array($_GET['page'], ['jabatan', 'tambah_jabatan', 'edit_jabatan']) ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jabatan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=konsep" class="nav-link <?= isset($_GET['page']) ? (in_array($_GET['page'], ['detail_konsep', 'konsep', 'tambah_konsep', 'edit_konsep']) ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Konsep</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=produksi" class="nav-link <?= isset($_GET['page']) ? (in_array($_GET['page'], ['detail_produksi', 'produksi', 'tambah_produksi', 'edit_produksi']) ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produksi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=equipment" class="nav-link <?= isset($_GET['page']) ? (in_array($_GET['page'], ['detail_equipment', 'equipment', 'tambah_equipment', 'edit_equipment']) ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Equipment</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=talent" class="nav-link <?= isset($_GET['page']) ? (in_array($_GET['page'], ['detail_talent', 'talent', 'tambah_talent', 'edit_talent']) ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Talent</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <?php
                $query = "SELECT COUNT(*) AS jml FROM tb_pengajuan WHERE status='Pending'";
                $result = $conn->query($query);
                $pengajuan = $result->fetch_assoc();
                ?>
                <?php
                $query = "SELECT COUNT(*) AS jml FROM tb_pembayaran WHERE status='Menunggu Verifikasi'";
                $result = $conn->query($query);
                $pembayaran = $result->fetch_assoc();
                ?>
                <li class="nav-item <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['pembayaran', 'tambah_pembayaran', 'pengajuan', 'detail_pengajuan', 'edit_pengajuan', 'jadwal_meeting', 'tambah_jadwal_meeting', 'edit_jadwal_meeting', 'anggaran', 'tambah_anggaran'])) ? "menu-open" : "")  : "" ?>">
                    <a href="#" class="nav-link <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['pembayaran', 'tambah_pembayaran', 'pengajuan', 'detail_pengajuan', 'edit_pengajuan', 'jadwal_meeting', 'tambah_jadwal_meeting', 'edit_jadwal_meeting', 'anggaran', 'tambah_anggaran'])) ? "active" : "")  : "" ?>">
                        <i class="nav-icon fas fa-retweet"></i>
                        <p>
                            Proses Data (<?= $pengajuan['jml'] + $pembayaran['jml'] ?>)
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?page=pengajuan" class="nav-link <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['pengajuan', 'edit_pengajuan', 'detail_pengajuan'])) ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengajuan (<?= $pengajuan['jml'] ?>)</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=jadwal_meeting" class="nav-link <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['jadwal_meeting', 'tambah_jadwal_meeting', 'edit_jadwal_meeting'])) ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Jadwal Meeting</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=anggaran" class="nav-link <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['anggaran', 'tambah_anggaran'])) ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Anggaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=pembayaran" class="nav-link <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['pembayaran'])) ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pembayaran (<?= $pembayaran['jml'] ?>)</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['laporan_klien', 'laporan_pembayaran', 'laporan_karyawan', 'laporan_konsep', 'laporan_produksi', 'laporan_equipment', 'laporan_talent', 'laporan_pengajuan', 'laporan_anggaran'])) ? "menu-open" : "")  : "" ?>">
                    <a href="#" class="nav-link <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['laporan_klien', 'laporan_pembayaran', 'laporan_karyawan', 'laporan_konsep', 'laporan_produksi', 'laporan_equipment', 'laporan_talent', 'laporan_pengajuan', 'laporan_anggaran'])) ? "active" : "")  : "" ?>">
                        <i class="nav-icon fas fa-clipboard-list"></i>
                        <p>
                            Laporan
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?page=laporan_klien" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] == "laporan_klien") ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Klien</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=laporan_karyawan" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] == "laporan_karyawan") ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Karyawan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=laporan_konsep" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] == "laporan_konsep") ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Konsep/Tema</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=laporan_produksi" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] == "laporan_produksi") ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Produksi</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=laporan_equipment" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] == "laporan_equipment") ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Equipment</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=laporan_talent" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] == "laporan_talent") ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Talent</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=laporan_pengajuan" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] == "laporan_pengajuan") ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pengajuan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=laporan_anggaran" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] == "laporan_anggaran") ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Anggaran</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=laporan_pembayaran" class="nav-link <?= isset($_GET['page']) ? (($_GET['page'] == "laporan_pembayaran") ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Pembayaran</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-header">PORTFOLIO</li>
                <li class="nav-item <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['paket_wedding', 'tambah_paket_wedding', 'edit_paket_wedding','caraousel', 'tambah_caraousel', 'edit_caraousel', 'tambah_hasil_kerja', 'edit_hasil_kerja', 'profil', 'alasan_pengguna', 'kelebihan', 'hasil_kerja'])) ? "menu-open" : "")  : "" ?>">
                    <a href="#" class="nav-link <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['paket_wedding', 'tambah_paket_wedding', 'edit_paket_wedding','caraousel', 'tambah_caraousel', 'edit_caraousel', 'tambah_hasil_kerja', 'edit_hasil_kerja', 'profil', 'alasan_pengguna', 'kelebihan', 'hasil_kerja'])) ? "active" : "")  : "" ?>">
                        <i class="nav-icon fas fa-desktop"></i>
                        <p>
                            Home
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?page=caraousel" class="nav-link <?= isset($_GET['page']) ? (in_array($_GET['page'], ['caraousel', 'tambah_caraousel', 'edit_caraousel']) ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Caraousel</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=profil" class="nav-link <?= isset($_GET['page']) ? (in_array($_GET['page'], ['profil']) ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=alasan_pengguna" class="nav-link <?= isset($_GET['page']) ? (in_array($_GET['page'], ['alasan_pengguna']) ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Alasan Pengguna</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=kelebihan" class="nav-link <?= isset($_GET['page']) ? (in_array($_GET['page'], ['kelebihan']) ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelebihan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=paket_wedding" class="nav-link <?= isset($_GET['page']) ? (in_array($_GET['page'], ['paket_wedding', 'tambah_paket_wedding', 'edit_paket_wedding']) ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Paket Wedding</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=hasil_kerja" class="nav-link <?= isset($_GET['page']) ? (in_array($_GET['page'], ['hasil_kerja', 'tambah_hasil_kerja', 'edit_hasil_kerja']) ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Hasil Kerja</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['profil_vendor', 'vendor_terbaik'])) ? "menu-open" : "")  : "" ?>">
                    <a href="#" class="nav-link <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['profil_vendor', 'vendor_terbaik'])) ? "active" : "")  : "" ?>">
                        <i class="nav-icon fab fa-battle-net"></i>
                        <p>
                            Vendor
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?page=profil_vendor" class="nav-link <?= isset($_GET['page']) ? (in_array($_GET['page'], ['profil_vendor']) ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profil</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="?page=vendor_terbaik" class="nav-link <?= isset($_GET['page']) ? (in_array($_GET['page'], ['vendor_terbaik']) ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Vendor Terbaik</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['profil_crew'])) ? "menu-open" : "")  : "" ?>">
                    <a href="#" class="nav-link <?= isset($_GET['page']) ? ((in_array($_GET['page'], ['profil_crew'])) ? "active" : "")  : "" ?>">
                        <i class="nav-icon fas fa-user-tie"></i>
                        <p>
                            Crew
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="?page=profil_crew" class="nav-link <?= isset($_GET['page']) ? (in_array($_GET['page'], ['profil_crew']) ? "active" : "")  : "" ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Profil</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>