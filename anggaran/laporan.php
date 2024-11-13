   <!-- Content Wrapper. Contains page content -->
   <div class="content-wrapper">
       <!-- Content Header (Page header) -->

       <!-- Main content -->
       <section class="content">
           <div class="container-fluid">
               <div class="row">
                   <div class="col-12">

                       <div class="card mt-3">
                           <div class="card-header">
                               <div class="row">
                                   <div class="col d-flex align-items-center">
                                       <h4 class="font-weight-bold">Laporan Data Anggaran</h4>
                                   </div>
                                   <div class="col-auto">
                                       <form action="" method="POST">
                                           <div class="row">
                                               <div class="col-auto d-flex align-items-center">
                                                   Tanggal Pengajuan:
                                               </div>
                                               <div class="col">
                                                   <input type="date" class="form-control" name="dari" value="<?= isset($_POST['filter']) ? $_POST['dari'] : '' ?>">
                                               </div>
                                               <div class="col d-flex align-items-center">to</div>
                                               <div class="col">
                                                   <input type="date" class="form-control" name="sampai" value="<?= isset($_POST['filter']) ? $_POST['sampai'] : '' ?>">
                                               </div>
                                               <div class="col">
                                                   <button type="submit" name="filter" class="btn btn-secondary">Filter</button>
                                               </div>
                                           </div>
                                       </form>
                                   </div>
                               </div>
                           </div>
                           <!-- /.card-header -->
                           <style>
                               .small-td {
                                   width: 1%;
                                   white-space: nowrap;
                               }
                           </style>
                           <div class="card-body">
                               <table id="example2" class="table table-bordered table-striped">
                                   <thead>
                                       <tr>
                                           <th class="text-center">No</th>
                                           <th class="text-center small-td">Tanggal Pengajuan</th>
                                           <th class="text-center small-td">Nama Klien</th>
                                           <th class="text-center">Total Anggaran Vendor</th>
                                           <th class="text-center">Anggaran Tambahan</th>
                                           <th class="text-center">Total Anggaran</th>
                                           <th class="text-center">Detail Anggaran</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <?php
                                        $no = 1;
                                        $query = "
                                        SELECT 
                                            DATE(tb_pengajuan.tanggal_pengajuan) AS tanggal_pengajuan,
                                            tb_anggaran.*,
                                            tb_klien.nama_lengkap,
                                            ((SELECT harga FROM tb_produksi WHERE id=tb_pengajuan.dekorasi) + (SELECT harga FROM tb_produksi WHERE id=tb_pengajuan.dokumentasi) + (SELECT harga FROM tb_equipment WHERE id=tb_pengajuan.lighting) + (SELECT harga FROM tb_equipment WHERE id=tb_pengajuan.sound) + (SELECT harga FROM tb_talent WHERE id=tb_pengajuan.band) + (SELECT harga FROM tb_talent WHERE id=tb_pengajuan.mc) + (SELECT harga FROM tb_talent WHERE id=tb_pengajuan.mua)) AS total_anggaran_vendor 
                                        FROM 
                                            tb_anggaran 
                                        INNER JOIN 
                                            tb_pengajuan 
                                        ON 
                                            tb_pengajuan.id=tb_anggaran.id_pengajuan 
                                        INNER JOIN 
                                            tb_klien 
                                        ON 
                                            tb_pengajuan.id_klien=tb_klien.id 
                                        ";
                                        if (isset($_POST['dari']) && isset($_POST['sampai'])) {
                                            if ($_POST['dari'] != "" && $_POST['sampai'] != "")
                                                $query .= "  WHERE DATE(tb_pengajuan.tanggal_pengajuan) >= '" . $_POST['dari'] . "' AND DATE(tb_pengajuan.tanggal_pengajuan) <= '" . $_POST['sampai'] . "'";
                                        }
                                        $result = $conn->query($query);
                                        ?>
                                       <?php while ($row = $result->fetch_assoc()) : ?>
                                           <tr>
                                               <td class="text-center"><?= $no++ ?></td>
                                               <td class="text-center"><?= explode('-', $row['tanggal_pengajuan'])[2] . " " . $BULAN_DALAM_INDONESIA[explode('-', $row['tanggal_pengajuan'])[1] - 1] . " " . explode('-', $row['tanggal_pengajuan'])[0] ?></td>
                                               <td class="text-center"><?= $row['nama_lengkap'] ?></td>
                                               <td class="text-center">Rp. <?= number_format($row['total_anggaran_vendor'], 0, ",", "."); ?></td>
                                               <td class="text-center">Rp. <?= number_format($row['anggaran_tambahan'], 0, ",", "."); ?></td>
                                               <td class="text-center">Rp. <?= number_format($row['anggaran_tambahan'] + $row['total_anggaran_vendor'], 0, ",", "."); ?></td>
                                               <td class="text-center"><a target="_blank" href="<?= $row['detail_anggaran'] ?>">Lihat Detail</a></td>
                                           </tr>
                                       <?php endwhile; ?>

                                   </tbody>
                               </table>
                           </div>
                           <div class="card-footer d-flex justify-content-end">
                               <?php if (isset($_POST['filter'])) : ?>
                                <a href="?page=laporan_anggaran" class="btn btn-secondary mr-3">Reset</a>
                                   <a href="laporan/anggaran.php?dari=<?= $_POST['dari'] ?>&sampai=<?= $_POST['sampai'] ?>" class="btn btn-primary float-right" target="_blank">Cetak</a>
                               <?php else : ?>
                                   <a href="laporan/anggaran.php" class="btn btn-primary" target="_blank">Cetak</a>
                               <?php endif; ?>
                           </div>
                           <!-- /.card-body -->
                       </div>
                       <!-- /.card -->
                   </div>
                   <!-- /.col -->
               </div>
               <!-- /.row -->
           </div>
           <!-- /.container-fluid -->
       </section>
       <!-- /.content -->
   </div>
   <!-- /.content-wrapper -->
   <script>
       $(function() {
           $('#example2').DataTable({
               "paging": true,
               "lengthChange": true,
               "searching": true,
               "ordering": true,
               "info": true,
               "autoWidth": false,
               "responsive": true,
           });
       });
   </script>