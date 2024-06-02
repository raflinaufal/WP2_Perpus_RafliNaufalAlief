<div class="container-fluid">
    <div class="">
        <div class="">
            <div class="p-3 bg-white rounded d-flex flex-wrap align-items-start"> <!-- Mengubah align-items-center menjadi align-items-start -->
                <div class="me-3 px-3 flex-grow-1 flex-md-grow-0">
                    <img src="<?= base_url(); ?>assets/img/upload/<?= $gambar; ?>" class="img-fluid rounded" alt="Book Image" style="height: 300px; width: 100%; object-fit: cover;"> <!-- Menyesuaikan tinggi gambar -->
                </div>
                <div class="flex-grow-1">
                     <table class="table table-bordered">
                        <tbody>
                            <tr class="bg-primary text-white">
                                <th  scope="row">Pengarang</th>
                                <td><?= $pengarang ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Judul Buku</th>
                                <td><?= $judul; ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Kategori</th>
                                <td><?= $kategori ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Penerbit</th>
                                <td><?= $penerbit ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Dipinjam</th>
                                <td><?= $dipinjam ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Tahun Terbit</th>
                                <td><?= substr($tahun, 0, 4) ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Dibooking</th>
                                <td><?= $dibooking ?></td>
                            </tr>
                            <tr>
                                <th scope="row">ISBN</th>
                                <td><?= $isbn ?></td>
                            </tr>
                            <tr>
                                <th scope="row">Tersedia</th>
                                <td><?= $stok ?></td>
                            </tr>
                        </tbody>
                    </table>
                    <div class="text-center pt-3 px-4">
                        <a href="<?= base_url('booking/tambahBooking/' . $id); ?>" class="btn btn-outline-primary px-3">
                            <i class="fas fa-shopping-cart"></i> Booking
                        </a>
                        <button class="btn btn-outline-secondary" onclick="window.history.go(-1)">
                            <i class="fas fa-reply"></i> Kembali
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
