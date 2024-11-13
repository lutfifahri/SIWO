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
                                      <h4 class="font-weight-bold">Laporan Data Pembayaran</h4>
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
                                                              <option <?= isset($_POST['filter']) ? ($_POST['status'] == "Terverifikasi" ? "selected" : "") : "" ?> value="Terverifikasi">Terverifikasi</option>
                                                              <option <?= isset($_POST['filter']) ? ($_POST['status'] == "Menunggu Verifikasi" ? "selected" : "") : "" ?> value="Menunggu Verifikasi">Menunggu Verifikasi</option>
                                                              <option <?= isset($_POST['filter']) ? ($_POST['status'] == "Ditolak" ? "selected" : "") : "" ?> value="Ditolak">Ditolak</option>
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
                                          <th class="text-center small-td">Tanggal Pembayaran</th>
                                          <th class="text-center">Nama Klien</th>
                                          <th class="text-center">Bank</th>
                                          <th class="text-center">Atas Nama</th>
                                          <th class="text-center">Nomor Rekening</th>
                                          <th class="text-center">Total Pembayaran</th>
                                          <th class="text-center">Status</th>
                                          <th class="text-center">Keterangan</th>
                                          <th class="text-center small-td">Tanggal Verifikasi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $no = 1;
                                        $query = "
                                        SELECT 
                                        tb_pembayaran.keterangan AS keterangan_pembayaran,
                                        tb_pembayaran.status AS status_pembayaran,
                                        tb_pembayaran.id AS id_pembayaran,
                                        tb_pembayaran.file_bukti_pembayaran,
                                        tb_pembayaran.tanggal AS tanggal_pembayaran,
                                        tb_pembayaran.tanggal_verifikasi,
                                        tb_bank.nama AS nama_bank,
                                        tb_bank.atas_nama,
                                        tb_bank.no_rek,
                                        tb_pengajuan.*,
                                        tb_klien.nik,
                                        tb_klien.nama_lengkap,
                                        tb_klien.email,
                                        tb_anggaran.id AS id_anggaran,
                                        tb_anggaran.anggaran_tambahan,
                                        tb_anggaran.detail_anggaran,
                                        (SELECT nama FROM tb_konsep WHERE id=tb_pengajuan.konsep) AS konsep,
                                        (SELECT nama FROM tb_produksi WHERE id=tb_pengajuan.dekorasi) AS dekorasi,
                                        (SELECT harga FROM tb_produksi WHERE id=tb_pengajuan.dekorasi) AS harga_dekorasi,
                                        (SELECT nama FROM tb_produksi WHERE id=tb_pengajuan.dokumentasi) AS dokumentasi,
                                        (SELECT harga FROM tb_produksi WHERE id=tb_pengajuan.dokumentasi) AS harga_dokumentasi,
                                        (SELECT nama FROM tb_equipment WHERE id=tb_pengajuan.lighting) AS lighting,
                                        (SELECT harga FROM tb_equipment WHERE id=tb_pengajuan.lighting) AS harga_lighting,
                                        (SELECT nama FROM tb_equipment WHERE id=tb_pengajuan.sound) AS sound,
                                        (SELECT harga FROM tb_equipment WHERE id=tb_pengajuan.sound) AS harga_sound,
                                        (SELECT nama FROM tb_talent WHERE id=tb_pengajuan.band) AS band,
                                        (SELECT harga FROM tb_talent WHERE id=tb_pengajuan.band) AS harga_band,
                                        (SELECT nama FROM tb_talent WHERE id=tb_pengajuan.mc) AS mc,
                                        (SELECT harga FROM tb_talent WHERE id=tb_pengajuan.mc) AS harga_mc,
                                        (SELECT nama FROM tb_talent WHERE id=tb_pengajuan.mua) AS mua, 
                                        (SELECT harga FROM tb_talent WHERE id=tb_pengajuan.mua) AS harga_mua 
                                        FROM 
                                            tb_pengajuan 
                                        INNER JOIN 
                                            tb_klien 
                                        ON 
                                            tb_pengajuan.id_klien=tb_klien.id 
                                        INNER JOIN 
                                            tb_anggaran 
                                        ON 
                                            tb_pengajuan.id=tb_anggaran.id_pengajuan 
                                        LEFT JOIN 
                                            tb_pembayaran 
                                        ON 
                                            tb_anggaran.id=tb_pembayaran.id_anggaran 
                                        INNER JOIN 
                                            tb_bank 
                                        ON 
                                            tb_bank.id=tb_pembayaran.id_bank 
                                            WHERE tb_pembayaran.status LIKE '%" .( $_POST['status'] ?? '') . "%'";
                                        if (isset($_POST['dari']) && isset($_POST['sampai'])) {
                                            if ($_POST['dari'] != "" && $_POST['sampai'] != "")
                                                $query .= "  AND DATE(tb_pembayaran.tanggal) >= '" . $_POST['dari'] . "' AND DATE(tb_pembayaran.tanggal) <= '" . $_POST['sampai'] . "'";
                                        }
                                        $result = $conn->query($query);
                                        ?>
                                      <?php while ($row = $result->fetch_assoc()) : ?>
                                          <tr>
                                              <td class="text-center"><?= $no++; ?></td>
                                              <?php
                                                $eng_date = explode('-', explode(' ', $row['tanggal_pembayaran'])[0]);
                                                $tanggal = $eng_date[2];
                                                $bulan = $eng_date[1];
                                                $tahun = $eng_date[0];
                                                ?>
                                              <td class="text-center"><?= $tanggal . " " . $BULAN_DALAM_INDONESIA[$bulan - 1] . " " . $tahun ?></td>
                                              <td class="text-center"><?= $row['nama_lengkap'] ?></td>
                                              <td class="text-center"><?= $row['nama_bank'] ?></td>
                                              <td class="text-center"><?= $row['atas_nama'] ?></td>
                                              <td class="text-center"><?= $row['no_rek'] ?></td>
                                              <td class="text-center">Rp. <?=
                                                                            number_format(
                                                                                $row['anggaran_tambahan'] + $row['harga_dekorasi'] + $row['harga_dokumentasi'] + $row['harga_lighting'] + $row['harga_sound'] + $row['harga_band'] + $row['harga_mc'] + $row['harga_mua'],
                                                                                0,
                                                                                ",",
                                                                                "."
                                                                            );
                                                                            ?></td>
                                              <td class="text-center"><?= $row['status_pembayaran'] ?></td>
                                              <td class=""><?= $row['keterangan_pembayaran'] ?></td>

                                              <?php
                                                $eng_date = explode('-', explode(' ', $row['tanggal_verifikasi'])[0]);
                                                $tanggal = $eng_date[2];
                                                $bulan = $eng_date[1];
                                                $tahun = $eng_date[0];
                                                ?>

                                              <td class="text-center"><?= $tanggal . " " . $BULAN_DALAM_INDONESIA[$bulan - 1] . " " . $tahun ?></td>

                                          </tr>
                                      <?php endwhile; ?>
                                  </tbody>
                              </table>
                          </div>
                          <!-- /.card-body -->
                          <div class="card-footer d-flex justify-content-end">
                              <a href="?page=laporan_pembayaran" class="btn btn-secondary mr-3">Reset</a>
                              <?php if (isset($_POST['filter'])) : ?>
                                  <a href="laporan/pembayaran.php?status=<?= $_POST['status'] ?>&dari=<?= $_POST['dari'] ?>&sampai=<?= $_POST['sampai'] ?>" class="btn btn-primary" target="_blank">Cetak</a>
                              <?php else : ?>
                                  <a href="laporan/pembayaran.php" class="btn btn-primary" target="_blank">Cetak</a>
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
          $('#example2').rowTable({
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