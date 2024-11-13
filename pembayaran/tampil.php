  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->

      <!-- Main content -->
      <section class="content">
          <div class="container-fluid">
              <div class="row">
                  <div class="col-12">

                      <div class="card mt-3">
                          <div class="card-header d-flex align-items-center">
                              <h4 class="flex-grow-1 m-0 font-weight-bold">Data Pembayaran</h4>
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
                                          <th class="text-center small-td">Nama Klien</th>
                                          <th class="text-center">Total Anggaran</th>
                                          <th class="text-center">Status</th>
                                          <th class="text-center">Pembayaran</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $no = 1;
                                        $query = "
                                        SELECT 
                                            tb_pembayaran.status,
                                            tb_anggaran.*,
                                            tb_klien.nama_lengkap,
                                            tb_pengajuan.id AS id_pengajuan,
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
                                        LEFT JOIN 
                                            tb_pembayaran 
                                        ON 
                                            tb_anggaran.id=tb_pembayaran.id_anggaran  
                                        ";

                                        if ($_SESSION['level'] == 'ADMIN') {
                                            $query .= " WHERE tb_pembayaran.status='Menunggu Verifikasi'";
                                        }

                                        if ($_SESSION['level'] == 'KLIEN') {
                                            $query .= " WHERE tb_klien.id=" . $_SESSION['id_klien'];
                                        }

                                        $result = $conn->query($query);
                                        ?>
                                      <?php while ($row = $result->fetch_assoc()) : ?>
                                          <tr>
                                              <td class="text-center"><?= $no++ ?></td>
                                              <td class="text-center"><?= $row['nama_lengkap'] ?></td>
                                              <td class="text-center">Rp. <?= number_format($row['anggaran_tambahan'] + $row['total_anggaran_vendor'], 0, ",", "."); ?></td>
                                              <td class="text-center"><?= is_null($row['status']) ? "Belum Dibayar" : $row['status'] ?></td>
                                              <td class="text-center"><a href="?page=detail_pembayaran&id=<?= $row['id_pengajuan'] ?>">Lihat Detail</a></td>
                                          </tr>
                                      <?php endwhile; ?>
                                  </tbody>
                              </table>
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