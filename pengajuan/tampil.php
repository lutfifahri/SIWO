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
                              <h4 class="flex-grow-1 m-0 font-weight-bold">Data Pengajuan</h4>
                              <?php if ($_SESSION['level'] == "KLIEN") : ?>
                                  <a href="?page=tambah_pengajuan" class="btn btn-primary">Tambah</a>
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
                                          <th class="text-center small-td">Tanggal Pengajuan</th>
                                          <th class="text-center">NIK</th>
                                          <th class="text-center">Nama Lengkap</th>
                                          <th class="text-center">Status Pengajuan</th>
                                          <th class="text-center">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $no = 1;
                                        $query = "
                                        SELECT 
                                            tb_pengajuan.*,
                                            tb_klien.nik,
                                            tb_klien.nama_lengkap,
                                            (SELECT nama FROM tb_konsep WHERE id=tb_pengajuan.konsep) AS konsep,
                                            (SELECT nama FROM tb_produksi WHERE id=tb_pengajuan.dekorasi) AS dekorasi,
                                            (SELECT nama FROM tb_produksi WHERE id=tb_pengajuan.dokumentasi) AS dokumentasi,
                                            (SELECT nama FROM tb_equipment WHERE id=tb_pengajuan.lighting) AS lighting,
                                            (SELECT nama FROM tb_equipment WHERE id=tb_pengajuan.sound) AS sound,
                                            (SELECT nama FROM tb_talent WHERE id=tb_pengajuan.band) AS band,
                                            (SELECT nama FROM tb_talent WHERE id=tb_pengajuan.mc) AS mc,
                                            (SELECT nama FROM tb_talent WHERE id=tb_pengajuan.mua) AS mua 
                                        FROM 
                                            tb_pengajuan 
                                        INNER JOIN 
                                            tb_klien 
                                        ON 
                                            tb_pengajuan.id_klien=tb_klien.id 
                                        ";
                                        if ($_SESSION['level'] == 'KLIEN') {
                                            $query .= " WHERE tb_klien.id=" . $_SESSION['id_klien'];
                                        } elseif ($_SESSION['level'] == 'ADMIN') {
                                            $query .= " WHERE tb_pengajuan.status='Pending'";
                                        }
                                        $result = $conn->query($query);
                                        ?>
                                      <?php while ($row = $result->fetch_assoc()) : ?>
                                          <tr>
                                              <td class="text-center"><?= $no++ ?></td>
                                              <?php
                                                $eng_date = explode('-', explode(' ', $row['tanggal_pengajuan'])[0]);
                                                $tanggal = $eng_date[2];
                                                $bulan = $eng_date[1];
                                                $tahun = $eng_date[0];
                                                ?>
                                              <td class="text-center"><?= $tanggal . " " . $BULAN_DALAM_INDONESIA[$bulan - 1] . " " . $tahun ?></td>
                                              <td class="text-center"><?= $row['nik'] ?></td>
                                              <td class="text-center"><?= $row['nama_lengkap'] ?></td>
                                              <td class="text-center"><?= $row['status'] ?></td>
                                              <td class="text-center small-td">
                                                  <a href="?page=detail_pengajuan&id=<?= $row['id'] ?>" class="btn btn-sm btn-info">Detail</a>
                                                  <a href="?page=edit_pengajuan&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                                  <form action="?page=hapus_pengajuan&id=<?= $row['id'] ?>" method="POST" class="d-inline">
                                                      <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Hapus </button>
                                                  </form>
                                              </td>
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