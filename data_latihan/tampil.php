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
                              <h4 class="flex-grow-1 m-0 font-weight-bold">Data Latihan</h4>
                              <a href="?page=tambah_latihan" class="btn btn-primary">Tambah</a>
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
                                          <!-- <th class="text-center small-td">Tanggal Terdaftar</th> -->
                                          <th class="text-center">latihan 1</th>
                                          <th class="text-center">Latihan 2</th>
                                          <th class="text-center">Latihan 3</th>
                                          <th class="text-center">Latihan 4</th>
                                          <th class="text-center">foto</th>
                                          <th class="text-center">relasi</th>
                                          <th class="text-center">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $query = "SELECT tb_latihan.*, tb_latihan_relasi.latihan_relasi AS latihan_relasi FROM tb_latihan LEFT JOIN tb_latihan_relasi ON tb_latihan_relasi.id=tb_latihan.id_latihan_relasi";
                                        $result = $conn->query($query);
                                        ?>
                                      <?php while ($row = $result->fetch_assoc()) : ?>
                                          <tr>
                                              <!-- <?php
                                                    $eng_date = explode('-', explode(' ', $row['tmt'])[0]);
                                                    $tanggal = $eng_date[2];
                                                    $bulan = $eng_date[1];
                                                    $tahun = $eng_date[0];
                                                    ?> -->
                                              <!-- <td class="text-center"><?= $tanggal . " " . $BULAN_DALAM_INDONESIA[$bulan - 1] . " " . $tahun ?></td> -->
                                              <td class="text-center"><?= $row['latihan_1'] ?></td>
                                              <td class="text-center"><?= $row['latihan_2'] ?></td>
                                              <td class="text-center"><?= $row['latihan_3'] ?></td>
                                              <td class="text-center"><?= $row['latihan_4'] ?></td>
                                              <td class="text-center"><img src="<?= $row['foto'] ?>" width="60" height="60" /></td>
                                              <td class="text-center"><?= $row['latihan_relasi'] ?></td>
                                              <td class="text-center small-td">
                                                  <a href="?page=edit_latihan&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                                  <form action="?page=hapus_latihan&id=<?= $row['id'] ?>" method="POST" class="d-inline">
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