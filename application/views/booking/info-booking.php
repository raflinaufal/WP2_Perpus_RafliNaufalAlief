<div class="">
    <?php foreach ($useraktif as $u) { ?>
        <p class="mb-2">Terima Kasih <b><?= $u->nama; ?></b></p>
        <p class="mb-4">Buku yang ingin Anda Pinjam adalah sebagai berikut:</p>
    <?php } ?>

    <div class="table-responsive">
        <table class="table table-bordered table-striped table-hover" id="table-datatable">
            <thead class="bg-primary text-white">
                <tr>
                    <th>No.</th>
                    <th>Buku</th>
                    <th>Penulis</th>
                    <th>Penerbit</th>
                    <th>Tahun</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $no = 1;
                foreach ($items as $i) {
                ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td>
                            <img src="<?= base_url('assets/img/upload/' . $i['image']); ?>" class="rounded" alt="No Picture" style="width: 20%;">
                        </td>
                        <td><?= $i['pengarang']; ?></td>
                        <td><?= $i['penerbit']; ?></td>
                        <td><?= $i['tahun_terbit']; ?></td>
                    </tr>
                <?php $no++;
                } ?>
            </tbody>
        </table>
    </div>

    <div class="mt-4">
        <a class="btn btn-sm btn-outline-danger " onclick="information('Waktu Pengambilan Buku 1x24 jam dari Booking!!!')" href="<?= base_url() . 'booking/exportToPdf/' . $this->session->userdata('id_user'); ?>">
            <span class="far fa-lg fa-fw fa-file-pdf"></span> Download PDF
        </a>
    </div>
</div>
