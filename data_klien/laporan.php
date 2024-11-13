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
                                       <h4 class="font-weight-bold">Laporan Data Klien</h4>
                                   </div>
                                   <div class="col-auto">
                                       <form action="" method="POST">
                                           <div class="row">
                                               <div class="col-auto d-flex align-items-center">
                                                   Tanggal Terdaftar:
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
                                           <th class="text-center small-td">No</th>
                                           <th class="text-center small-td">Tanggal Terdaftar</th>
                                           <th class="text-center">NIK</th>
                                           <th class="text-center">Nama</th>
                                           <th class="text-center">Nomor Telepon</th>
                                           <th class="text-center">Email</th>
                                           <th class="text-center">Username</th>
                                           <th class="text-center">Lama Terdaftar</th>
                                       </tr>
                                   </thead>
                                   <tbody>
                                       <?php
                                        $no = 1;
                                        $query = "
                                            SELECT 
                                                tb_klien.*,
                                                tb_user.username 
                                            FROM 
                                                tb_klien 
                                            INNER JOIN 
                                                tb_user 
                                            ON 
                                                tb_user.id=tb_klien.id_user
                                            ";

                                        if (isset($_POST['filter'])) {
                                            $query .= " WHERE DATE(tb_klien.tanggal_terdaftar) >= '" . $_POST['dari'] . "' AND DATE(tb_klien.tanggal_terdaftar) <= '" . $_POST['sampai'] . "'";
                                        }
                                        $result = $conn->query($query);
                                        ?>
                                       <?php while ($row = $result->fetch_assoc()) : ?>
                                           <tr>
                                               <td class="text-center"><?= $no++; ?></td>
                                               <?php
                                                $eng_date = explode('-', explode(' ', $row['tanggal_terdaftar'])[0]);
                                                $tanggal = $eng_date[2];
                                                $bulan = $eng_date[1];
                                                $tahun = $eng_date[0];
                                                ?>
                                               <td class="text-center"><?= $tanggal . " " . $BULAN_DALAM_INDONESIA[$bulan - 1] . " " . $tahun ?></td>
                                               <td><?= $row['nik'] ?></td>
                                               <td><?= $row['nama_lengkap'] ?></td>
                                               <td><?= $row['nomor_telepon'] ?></td>
                                               <td><?= $row['email'] ?></td>
                                               <td><?= $row['username'] ?></td>
                                               <?php

                                                $date1 = new DateTime($row['tanggal_terdaftar']);
                                                $date2 = new DateTime();
                                                $interval = $date1->diff($date2);
                                                ?>
                                               <td class="text-center">
                                                   <?php
                                                    if ($interval->y) {
                                                        echo $interval->y . " Tahun";
                                                    }
                                                    if ($interval->m) {
                                                        echo " " . $interval->m . " Bulan";
                                                    }
                                                    if ($interval->d) {
                                                        echo " " . $interval->d . " Hari ";
                                                    }

                                                    if (!($interval->d || $interval->m || $interval->y))
                                                        echo "Hari ini";

                                                    ?></td>
                                           </tr>
                                       <?php endwhile; ?>

                                   </tbody>
                               </table>
                           </div>
                           <div class="card-footer d-flex justify-content-end">
                               <a href="?page=laporan_klien" class="btn btn-secondary mr-3">Reset</a>
                               <?php if (isset($_POST['filter'])) : ?>
                                   <a href="laporan/klien.php?dari=<?= $_POST['dari'] ?>&sampai=<?= $_POST['sampai'] ?>" class="btn btn-primary float-right" target="_blank">Cetak</a>
                               <?php else : ?>
                                   <a href="laporan/klien.php" class="btn btn-primary" target="_blank">Cetak</a>
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