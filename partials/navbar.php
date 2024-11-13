<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        <!-- Notifications Dropdown Menu -->
        <?php if ($_SESSION['level'] === "ADMIN") : ?>
            <?php
            $query = "
            
            SELECT
ROUND(TIMESTAMPDIFF(second,tanggal_pengajuan, NOW() )/86400) as Day,
ROUND(TIMESTAMPDIFF(second,tanggal_pengajuan, NOW())/3600%24) as Hour,
ROUND(TIMESTAMPDIFF(second,tanggal_pengajuan, NOW())/60%60) as Minute,
ROUND(TIMESTAMPDIFF(second,tanggal_pengajuan, NOW())%60) as Second, 
tb_user.username FROM tb_pengajuan INNER JOIN tb_klien ON tb_klien.id=tb_pengajuan.id_klien INNER JOIN tb_user ON tb_user.id=tb_klien.id_user WHERE tb_pengajuan.status='Pending' ORDER BY tb_pengajuan.id DESC";
            $result = $conn->query($query);
            ?>
            <li class="nav-item dropdown mr-4">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-warning navbar-badge"><?= $result->num_rows ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-xl dropdown-menu-right">
                    <span class="dropdown-item dropdown-header"><?= $result->num_rows ?> Pengajuan Baru</span>
                    <div class="dropdown-divider"></div>
                    <?php while ($row = $result->fetch_assoc()) : ?>
                        <a href="#" class="dropdown-item">
                            <i class="fa fa-paper-plane mr-2"></i>
                            Pengajuan Baru Oleh <?= $row['username'] ?>
                            <span class="float-right text-muted text-sm">
                                <?php if ($row['Day']) : ?>
                                    <?= $row['Day'] . " Hari"; ?>
                                <?php elseif ($row['Hour']) : ?>
                                    <?= $row['Hour'] . " Jam"; ?>
                                <?php elseif ($row['Minute']) : ?>
                                    <?= $row['Minute'] . " Menit"; ?>
                                <?php elseif ($row['Second']) : ?>
                                    <?= $row['Second'] . " Detik"; ?>
                                <?php endif; ?>
                            </span>
                        </a>
                        <div class="dropdown-divider"></div>
                    <?php endwhile; ?>
                </div>
            </li>
        <?php endif; ?>

        <li class="nav-item mr-4">
            <a href="halaman_auth/logout.php" class="btn btn-dark" onclick="return confirm('Are you sure?');">
                Logout
            </a>
        </li>
    </ul>
</nav>