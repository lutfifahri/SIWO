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
                              <h4 class="flex-grow-1 m-0 font-weight-bold">Data Anggaran</h4>
                              <?php if ($_SESSION['level'] == 'ADMIN') : ?>
                                  <a href="?page=tambah_anggaran" class="btn btn-primary">Tambah</a>
                              <?php endif; ?>
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
                                          <th class="text-center">Total Anggaran Vendor</th>
                                          <th class="text-center">Anggaran Tambahan</th>
                                          <th class="text-center">Total Anggaran</th>
                                          <th class="text-center">Detail Anggaran</th>
                                          <?php if ($_SESSION['level'] == 'ADMIN') : ?>
                                              <th class="text-center">Aksi</th>
                                          <?php endif; ?>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $no = 1;
                                        $query = "
                                        SELECT 
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
                                        ";

                                        if ($_SESSION['level'] == 'KLIEN') {
                                            $query .= " WHERE tb_klien.id=" . $_SESSION['id_klien'];
                                        }

                                        $result = $conn->query($query);
                                        ?>
                                      <?php while ($row = $result->fetch_assoc()) : ?>
                                          <tr>
                                              <td class="text-center"><?= $no++ ?></td>
                                              <td class="text-center"><?= $row['nama_lengkap'] ?></td>
                                              <td class="text-center">Rp. <?= number_format($row['total_anggaran_vendor'], 0, ",", "."); ?></td>
                                              <td class="text-center">Rp. <?= number_format($row['anggaran_tambahan'], 0, ",", "."); ?></td>
                                              <td class="text-center">Rp. <?= number_format($row['anggaran_tambahan'] + $row['total_anggaran_vendor'], 0, ",", "."); ?></td>
                                              <td class="text-center"><a href="?page=detail_anggaran&id=<?= $row['id_pengajuan'] ?>">Lihat Detail</a></td>
                                              <?php if ($_SESSION['level'] == 'ADMIN') : ?>
                                                  <td class="text-center small-td">
                                                      <a href="?page=edit_anggaran&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                                      <form action="?page=hapus_anggaran&id=<?= $row['id'] ?>" method="POST" class="d-inline">
                                                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Hapus </button>
                                                      </form>
                                                  </td>
                                              <?php endif; ?>
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