<!-- views/user/data_user.php -->

<!-- Begin Page Content -->
<div class="container-fluid">
    <div class="row justify-content-center"> <!-- Menambahkan class 'justify-content-center' untuk membuat row berada di tengah -->
        <div class="col-lg-10"> <!-- Menggunakan col-lg-10 agar tabel tidak terlalu lebar di layar besar -->
            <!-- DataTales Example -->
            <div class="card shadow mb-4">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Anggota</th>
                                    <th>Email</th>
                                    <th>Role ID</th>
                                    <th>Aktif</th>
                                    <th>Member Sejak</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1;
                                foreach ($anggota as $a) { ?>
                                    <tr>
                                        <td><?= $i++; ?></td>
                                        <td><?= $a['nama']; ?></td>
                                        <td><?= $a['email']; ?></td>
                                        <td><?= $a['role_id']; ?></td>
                                        <td><?= $a['is_active']; ?></td>
                                        <td><?= date('Y', strtotime($a['tanggal_input'])); ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
