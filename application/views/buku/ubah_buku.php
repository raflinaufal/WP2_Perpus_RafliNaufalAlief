<!-- Begin Page Content -->
<div class="container-fluid">
    <?php if ($this->session->flashdata('success_message')) : ?>
        <div class="alert alert-success" role="alert">
            <?= $this->session->flashdata('success_message') ?>
        </div>
    <?php endif; ?>

    <?php if ($this->session->flashdata('error_message')) : ?>
        <div class="alert alert-danger" role="alert">
            <?= $this->session->flashdata('error_message') ?>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-lg-6">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?php foreach ($buku as $b) { ?>
                <form action="<?= base_url('buku/ubahBuku'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-row">
                        <div class="col-md-4">
                            <?php if (isset($b['image'])) { ?>
                                <input type="hidden" name="old_pict" id="old_pict" value="<?= $b['image']; ?>">
                                <picture>
                                    <source srcset="" type="image/svg+xml">
                                    <img src="<?= base_url('assets/img/upload/') . $b['image']; ?>" class="rounded mb-3 img-fluid" alt="Gambar Buku">
                                </picture>
                            <?php } ?>
                        </div>
                        <div class="col-md-8">
                            <input type="hidden" name="id" id="id" value="<?= $b['id']; ?>">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="judul_buku" name="judul_buku" placeholder="Masukkan Judul Buku" value="<?= $b['judul_buku']; ?>">
                            </div>
                            <div class="form-group">
                                <select name="id_kategori" class="form-control form-control-user">
                                    <option value="<?= $id; ?>" selected="selected"><?= $k; ?></option>
                                    <?php foreach ($kategori as $k) { ?>
                                        <option value="<?= $k['id_kategori']; ?>"><?= $k['nama_kategori']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="pengarang" name="pengarang" placeholder="Masukkan nama pengarang" value="<?= $b['pengarang']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="penerbit" name="penerbit" placeholder="Masukkan nama penerbit" value="<?= $b['penerbit']; ?>">
                            </div>
                            <div class="form-group">
                                <select name="tahun" class="form-control form-control-user">
                                    <option value="<?= $b['tahun_terbit']; ?>"><?= $b['tahun_terbit']; ?></option>
                                    <?php for ($i = date('Y'); $i > 1500; $i--) { ?>
                                        <option value="<?= $i; ?>"><?= $i; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="isbn" name="isbn" placeholder="Masukkan ISBN" value="<?= $b['isbn']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="stok" name="stok" placeholder="Masukkan nominal stok" value="<?= $b['stok']; ?>">
                            </div>
                            <div class="form-group">
                                <input type="file" class="form-control-file" id="image" name="image">
                            </div>
                            <div class="form-group text-right">
                                <button type="button" class="btn btn-dark mt-3" onclick="window.history.go(-1)">Kembali</button>
                                <button type="submit" class="btn btn-primary mt-3">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            <?php } ?>
            <br/>
            <br/>
            <br/>
        </div>
    </div>
</div>
