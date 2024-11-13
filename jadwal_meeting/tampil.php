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
                              <h4 class="flex-grow-1 m-0 font-weight-bold">Data Jadwal Meeting</h4>
                              <?php if ($_SESSION['level'] == 'ADMIN') : ?>
                                  <a href="?page=tambah_jadwal_meeting" class="btn btn-primary">Tambah</a>
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
                                          <th class="text-center">Meeting 1</th>
                                          <th class="text-center">Meeting 2</th>
                                          <th class="text-center">Meeting 3</th>
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
                                            tb_jadwal_meeting.*,
                                            DATE(tb_jadwal_meeting.jadwal_meeting_1) AS jadwal_meeting_1,
                                            DATE(tb_jadwal_meeting.jadwal_meeting_2) AS jadwal_meeting_2,
                                            DATE(tb_jadwal_meeting.jadwal_meeting_3) AS jadwal_meeting_3,
                                            tb_klien.nama_lengkap 
                                        FROM 
                                            tb_jadwal_meeting 
                                        INNER JOIN 
                                            tb_pengajuan 
                                        ON 
                                            tb_pengajuan.id=tb_jadwal_meeting.id_pengajuan 
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
                                              <td class="text-center"><a href="?page=edit_jadwal_meeting&id=<?= $row['id'] ?>&riwayat_meeting_1=true"><?= explode('-', $row['jadwal_meeting_1'])[2] . " " . $BULAN_DALAM_INDONESIA[explode('-', $row['jadwal_meeting_1'])[1] - 1] . " " . explode('-', $row['jadwal_meeting_1'])[0] ?></a></td>
                                              <?php if (isset($row['jadwal_meeting_2'])) : ?>
                                                  <td class="text-center"><a href="?page=edit_jadwal_meeting&id=<?= $row['id'] ?>&riwayat_meeting_2=true"><?= explode('-', $row['jadwal_meeting_2'])[2] . " " . $BULAN_DALAM_INDONESIA[explode('-', $row['jadwal_meeting_2'])[1] - 1] . " " . explode('-', $row['jadwal_meeting_1'])[0] ?></a></td>
                                              <?php else : ?>
                                                  <?php if ($_SESSION['level'] == 'ADMIN') : ?>
                                                      <td class="text-center"><a href="?page=edit_jadwal_meeting&id=<?= $row['id'] ?>&jadwal_meeting_2=true">Tentukan Tanggal</a></td>
                                                  <?php else : ?>
                                                      <td></td>
                                                  <?php endif; ?>
                                              <?php endif; ?>
                                              <?php if (isset($row['jadwal_meeting_3'])) : ?>
                                                  <td class="text-center"><a href="?page=edit_jadwal_meeting&id=<?= $row['id'] ?>&riwayat_meeting_3=true"><?= explode('-', $row['jadwal_meeting_3'])[2] . " " . $BULAN_DALAM_INDONESIA[explode('-', $row['jadwal_meeting_3'])[1] - 1] . " " . explode('-', $row['jadwal_meeting_1'])[0] ?></a></td>
                                              <?php else : ?>
                                                  <?php if ($_SESSION['level'] == 'ADMIN') : ?>
                                                      <td class="text-center"><a href="?page=edit_jadwal_meeting&id=<?= $row['id'] ?>&jadwal_meeting_3=true">Tentukan Tanggal</a></td>
                                                  <?php else : ?>
                                                      <td class="text-center"></td>
                                                  <?php endif; ?>
                                              <?php endif; ?>
                                              <?php if ($_SESSION['level'] == 'ADMIN') : ?>
                                                  <td class="text-center small-td">
                                                      <form action="?page=hapus_jadwal_meeting&id=<?= $row['id'] ?>" method="POST" class="d-inline">
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