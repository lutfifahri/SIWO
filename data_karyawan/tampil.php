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
                              <h4 class="flex-grow-1 m-0 font-weight-bold">Data Karyawan</h4>
                              <a href="?page=tambah_karyawan" class="btn btn-primary">Tambah</a>
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
                                          <th class="text-center">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                      $no = 1;
                                        $query = "SELECT tb_karyawan.*, tb_jabatan.nama AS nama_jabatan FROM tb_karyawan LEFT JOIN tb_jabatan ON tb_jabatan.id=tb_karyawan.id_jabatan";
                                        $result = $conn->query($query);
                                        ?>
                                      <?php while ($row = $result->fetch_assoc()) : ?>
                                          <tr>
                                            <td class="text-center"><?= $no++;?></td>
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
                                              <td class="text-center small-td">
                                                  <a href="?page=edit_karyawan&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                                  <form action="?page=hapus_karyawan&id=<?= $row['id'] ?>" method="POST" class="d-inline">
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