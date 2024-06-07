<div class="container-fluid">
    <table>
        <tr>
            <td>
                <div class="table-responsive full-width">
                    <table class="table table-bordered table-striped table-hover" id="table-datatable">
                        <tr>
                            <th>No Pinjam</th>
                            <th>ID User</th>
                            <th>ID Buku</th>
                            <th>Tanggal Pinjam</th>
                            <th>Tanggal Kembali</th>
                            <th>Tanggal Pengembalian</th>
                            <th>Terlambat</th>
                            <th>Denda</th>
                            <th>Status</th>
                            <th>Total Denda</th>
                            <th>Pilihan</th>
                        </tr>
                        <?php
                        foreach ($pinjam as $p) 
                        {
                        ?>
                            <tr>
                                <td><?= $p['no_pinjam']; ?></td>
                                <td><?= $p['id_user']; ?></td>
                                <td><?= $p['id_buku']; ?></td>
                                <td><?= $p['tgl_pinjam']; ?></td>
                                <td><?= $p['tgl_kembali']; ?></td>
                                <td>
                                    <?= isset($tgl_pengembalian) ? $tgl_pengembalian : date('Y-m-d'); ?>
                                    <input type="text" name="tgl_pengembalian" id="tgl_pengembalian" value="<?= isset($tgl_pengembalian) ? $tgl_pengembalian : date('Y-m-d'); ?>">
                                </td>
                                <td>
                                    <?php
                                    $tgl_kembali = new DateTime($p['tgl_kembali']);
                                    $tgl_pengembalian = new DateTime($tgl_pengembalian ?? date('Y-m-d'));
                                    $selisih = $tgl_pengembalian->diff($tgl_kembali)->format("%r%a");
                                    $terlambat = max(0, $selisih);
                                    echo $terlambat;
                                    ?> Hari
                                </td>
                                <td><?= $p['denda']; ?></td>
                                <?php if ($p['status'] == "Pinjam")
                                    $status = "warning";
                                else
                                    $status = "secondary";
                                 ?>
                                <td><i class="btn btn-outline-<?= $status; ?> btn-sm"><?= $p['status']; ?></i></td>
                                <?php
                                $total_denda = $p['denda'] * $terlambat;
                                ?>
                                <td><?= $total_denda; ?>
                                    <input type="hidden" name="totaldenda" id="totaldenda" value="<?= $total_denda; ?>">
                                </td>
                                <td nowrap>
                                    <?php if ($p['status'] == "Kembali") { ?>
                                        <i class="btn btn-sm btn-outline-secondary"><i class="fas fa-fw fa-edit"></i>Ubah Status</i>
                                    <?php } else { ?>
                                        <a class="btn btn-sm btn-outline-info" href="<?= base_url('pinjam/ubahStatus/' . $p['id_buku'] . '/' . $p['no_pinjam']); ?>"><i class="fas fa-fw fa-edit"></i>Ubah Status</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php
                        } ?>
                    </table>
                </div>
            </td>
        </tr>
    </table>
</div>
