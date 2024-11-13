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
                              <h4 class="flex-grow-1 m-0 font-weight-bold">Data Konsep</h4>
                              <a href="?page=tambah_konsep" class="btn btn-primary">Tambah</a>
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
                                          <th class="text-center smal-td">No</th>
                                          <th class="text-center">Nama Konsep/Tema</th>

                                          <th class="text-center">Aksi</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                      <?php
                                        $no = 1;
                                        $query = "
                                            SELECT 
                                               *
                                            FROM 
                                                tb_konsep
                                            ";
                                        $result = $conn->query($query);
                                        ?>
                                      <?php while ($row = $result->fetch_assoc()) : ?>
                                          <tr>
                                              <td class="text-center"><?= $no++; ?></td>
                                              <td class="text-center"><?= $row['nama'] ?></td>

                                              <td class="text-center small-td">
                                                  <a href="?page=detail_konsep&id=<?= $row['id'] ?>" class="btn btn-sm btn-info">Detail</a>
                                                  <a href="?page=edit_konsep&id=<?= $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                                  <form action="?page=hapus_konsep&id=<?= $row['id'] ?>" method="POST" class="d-inline">
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