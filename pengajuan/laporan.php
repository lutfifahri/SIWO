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
                                      <h4 class="font-weight-bold">Laporan Data Pengajuan</h4>
                                  </div>
                                  <div class="col-auto">
                                      <form action="" method="POST">


                                          <div class="row">
                                              <div class="col-2">
                                                  <div class="row ">
                                                      <div class="col-12 py-2 mb-3">Status</div>
                                                      <div class="col-12 py-2">Tanggal</div>
                                                  </div>
                                              </div>
                                              <div class="col">
                                                  <div class="row justify-content-end">
                                                      <div class="col-11 mb-3">
                                                          <select name="status" id="status" class="form-control">
                                                              <option <?= isset($_POST['filter']) ? ($_POST['status'] == "" ? "selected" : "selected") : "" ?> value="">Semua</option>
                                                              <option <?= isset($_POST['filter']) ? ($_POST['status'] == "Disetujui" ? "selected" : "") : "" ?> value="Disetujui">Disetujui</option>
                                                              <option <?= isset($_POST['filter']) ? ($_POST['status'] == "Ditolak" ? "selected" : "") : "" ?> value="Ditolak">Ditolak</option>
                                                              <option <?= isset($_POST['filter']) ? ($_POST['status'] == "Pending" ? "selected" : "") : "" ?> value="Pending">Pending</option>
                                                          </select>
                                                      </div>
                                                      <div class="col-5">
                                                          <input type="date" class="form-control" name="dari" value="<?= isset($_POST['filter']) ? $_POST['dari'] : Date("Y") ?>">
                                                      </div>
                                                      <div class="col-1 py-2 text-center">
                                                          to
                                                      </div>
                                                      <div class="col-5">
                                                          <input type="date" class="form-control" name="sampai" value="<?= isset($_POST['filter']) ? $_POST['sampai'] : Date("Y") ?>">
                                                      </div>
                                                  </div>
                                              </div>
                                              <div class="col-auto d-flex align-items-end py-1">
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
                                          <th class="text-center small-td">Tanggal Pengajuan</th>
                                          <!-- <th class="text-center small-td">Lama Pengajuan</th> -->
                                          <th class="text-center">NIK</th>
                                          <th class="text-center">Nama</th>
                                          <th class="text-center">Username</th>
                                          <th class="text-center">Status</th>
                                          <th class="text-center">Keterangan</th>
                                          <th class="text-center small-td">Tanggal Disetujui</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $no = 1;
                                        $query = "
                                            SELECT DATEDIFF(DATE(tb_pengajuan.tanggal_disetujui),DATE(tb_pengajuan.tanggal_pengajuan)) AS lama_pengajuan, tb_pengajuan.*, tb_klien.nama_lengkap, tb_klien.nik, tb_user.username FROM tb_pengajuan INNER JOIN tb_klien ON tb_klien.id=tb_pengajuan.id_klien INNER JOIN tb_user ON tb_klien.id_user=tb_user.id WHERE tb_pengajuan.status LIKE '%" . ($_POST['status'] ?? '') . "%'
                                            ";
                                        if (isset($_POST['dari']) && isset($_POST['sampai'])) {
                                            if ($_POST['dari'] != "" && $_POST['sampai'] != "")
                                                $query .= "  AND DATE(tb_pengajuan.tanggal_pengajuan) >= '" . $_POST['dari'] . "' AND DATE(tb_pengajuan.tanggal_pengajuan) <= '" . $_POST['sampai'] . "'";
                                        }
                                        $result = $conn->query($query);
                                        ?>
                                      <?php while ($row = $result->fetch_assoc()) : ?>
                                          <tr>
                                              <td class="text-center"><?= $no++; ?></td>
                                              <?php
                                                $eng_date = explode('-', explode(' ', $row['tanggal_pengajuan'])[0]);
                                                $tanggal = $eng_date[2];
                                                $bulan = $eng_date[1];
                                                $tahun = $eng_date[0];
                                                ?>
                                              <td class="text-center"><?= $tanggal . " " . $BULAN_DALAM_INDONESIA[$bulan - 1] . " " . $tahun ?></td>
                                              <?php
                                                if (!is_null($row['tanggal_disetujui'])) {
                                                    $eng_date = explode('-', explode(' ', $row['tanggal_disetujui'])[0]);
                                                    $tanggal = $eng_date[2];
                                                    $bulan = $eng_date[1];
                                                    $tahun = $eng_date[0];
                                                    $tanggal_disetujui = $tanggal . " " . $BULAN_DALAM_INDONESIA[$bulan - 1] . " " . $tahun;
                                                    $lama_pengajuan = $row['lama_pengajuan'] . " Hari";
                                                } else {
                                                    $lama_pengajuan = "Menunggu Persetujuan";
                                                    $tanggal_disetujui = "Menunggu Persetujuan";
                                                }

                                                ?>

                                              <!-- <td class="text-center"><?= $lama_pengajuan ?></td> -->
                                              <td class="text-center"><?= $row['nik'] ?></td>
                                              <td class="text-center"><?= $row['nama_lengkap'] ?></td>
                                              <td class="text-center"><?= $row['username'] ?></td>
                                              <td class="text-center"><?= $row['status'] ?></td>
                                              <td class=""><?= $row['keterangan'] ?></td>
                                              <td class="text-center"><?= $tanggal_disetujui ?></td>
                                          </tr>
                                      <?php endwhile; ?>
                                  </tbody>
                              </table>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer d-flex justify-content-end">
                              <a href="?page=laporan_pengajuan" class="btn btn-secondary mr-3">Reset</a>
                              <?php if (isset($_POST['filter'])) : ?>
                                  <a href="laporan/pengajuan.php?status=<?= $_POST['status'] ?>&dari=<?= $_POST['dari'] ?>&sampai=<?= $_POST['sampai'] ?>" class="btn btn-primary" target="_blank">Cetak</a>
                              <?php else : ?>
                                  <a href="laporan/pengajuan.php" class="btn btn-primary" target="_blank">Cetak</a>
                              <?php endif; ?>
                          </div>
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