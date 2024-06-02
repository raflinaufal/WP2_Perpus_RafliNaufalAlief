<?= $this->session->flashdata('pesan'); ?> 
<div style="padding: 25px;">
    <div class="x_panel">
        <div class="x_content">
            <!-- Tampilkan semua produk -->
            <div class="row">
                <!-- looping products -->
                <?php foreach ($buku as $buku) { ?> 
                    <div class="col-md-3 col-sm-6" style="margin-bottom: 20px;">
                        <div class="card shadow-sm h-100" style="border-radius: 10px;">
                            <img src="<?= base_url(); ?>assets/img/upload/<?= $buku->image; ?>" class="card-img-top" style="height: 200px; object-fit: cover; border-top-left-radius: 10px; border-top-right-radius: 10px;">
                            <div class="card-body text-center d-flex flex-column justify-content-between">
                                <div>
                                    <h5 class="card-title" style="min-height: 30px;"><?= $buku->pengarang ?></h5>
                                    <h6 class="card-subtitle mb-2 text-muted"><?= $buku->penerbit ?></h6>
                                    <h6 class="card-subtitle mb-2 text-muted"><?= substr($buku->tahun_terbit, 0, 4) ?></h6>
                                </div>
                                <div class="mt-3">
                                    <?php if ($buku->stok < 1) { ?>
                                        <button class="btn btn-outline-primary disabled w-100 mb-2"><i class="fas fa-shopping-cart"></i> Booking 0</button>
                                    <?php } else { ?>
                                        <a class="btn btn-outline-primary w-100 mb-2" href="<?= base_url('booking/tambahBooking/' . $buku->id); ?>"><i class="fas fa-shopping-cart"></i> Booking</a>
                                    <?php } ?>
                                    <a class="btn btn-outline-warning w-100" href="<?= base_url('home/detailBuku/' . $buku->id); ?>"><i class="fas fa-search"></i> Detail</a>
                                </div>
                            </div>
                        </div>
                    </div> 
                <?php } ?>
                <!-- end looping -->
            </div>
        </div>
    </div>
</div>
