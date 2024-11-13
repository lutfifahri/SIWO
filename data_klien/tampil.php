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
                              <h4 class="flex-grow-1 m-0 font-weight-bold">Data Klien</h4>
                              <a href="?page=tambah_klien" class="btn btn-primary">Tambah</a>
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
                                          <th class="text-center">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                      $no= 1;
                                        $query = "
                                            SELECT 
                                                tb_klien.id,
                                                tb_klien.nik,
                                                tb_klien.nomor_telepon,
                                                tb_klien.nama_lengkap,
                                                tb_klien.email,
                                                tb_klien.tanggal_terdaftar,
                                                tb_user.username 
                                            FROM 
                                                tb_klien 
                                            INNER JOIN 
                                                tb_user 
                                            ON 
                                                tb_user.id=tb_klien.id_user
                                            ";
                                        $result = $conn->query($query);
                                        ?>
                                      <?php while ($row = $result->fetch_assoc()) : ?>
                                          <tr>
                                          <td class="text-center"><?= $no++;?></td>
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
                                              <td class="text-center small-td">
                                                  <a href="?page=edit_klien&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                                  <a href="?page=hapus_klien&id=<?= $row['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data <?= $row['username'] ?> ini?')">Hapus</a>
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