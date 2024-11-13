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
                                      <h4 class="font-weight-bold">Laporan Data Karyawan</h4>
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
                                          <th class="text-center">Jabatan</th>
                                          <th class="text-center">Foto</th>
                                          <th class="text-center">Lama Terdaftar</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $no = 1;
                                        $query = "SELECT tb_karyawan.*, tb_jabatan.nama AS nama_jabatan FROM tb_karyawan LEFT JOIN tb_jabatan ON tb_jabatan.id=tb_karyawan.id_jabatan";
                                        if (isset($_POST['filter'])) {
                                            $query .= " WHERE tb_karyawan.tmt >= '" . $_POST['dari'] . "' AND tb_karyawan.tmt <= '" . $_POST['sampai'] . "'";
                                        }
                                        $result = $conn->query($query);
                                        ?>
                                      <?php while ($row = $result->fetch_assoc()) : ?>
                                          <tr>
                                              <td class="text-center"><?= $no++; ?></td>
                                              <?php
                                                $eng_date = explode('-', explode(' ', $row['tmt'])[0]);
                                                $tanggal = $eng_date[2];
                                                $bulan = $eng_date[1];
                                                $tahun = $eng_date[0];
                                                ?>
                                              <td class="text-center"><?= $tanggal . " " . $BULAN_DALAM_INDONESIA[$bulan - 1] . " " . $tahun ?></td>
                                              <td class="text-center"><?= $row['nik'] ?></td>
                                              <td class="text-center"><?= $row['nama'] ?></td>
                                              <td class="text-center"><?= $row['no_telp'] ?></td>
                                              <td class="text-center"><?= $row['nama_jabatan'] ?></td>
                                              <td class="text-center"><a href="<?= $row['foto'] ?>" target="_blank"> Lihat Foto</a></td>
                                              <?php

                                                $date1 = new DateTime(explode(' ', $row['tmt'])[0]);
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
                          <!-- /.card-body -->
                          <div class="card-footer d-flex justify-content-end">
                              <a href="?page=laporan_karyawan" class="btn btn-secondary mr-3">Reset</a>
                              <?php if (isset($_POST['filter'])) : ?>
                                  <a href="laporan/karyawan.php?dari=<?= $_POST['dari'] ?>&sampai=<?= $_POST['sampai'] ?>" class="btn btn-primary" target="_blank">Cetak</a>
                              <?php else : ?>
                                  <a href="laporan/karyawan.php" class="btn btn-primary" target="_blank">Cetak</a>
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