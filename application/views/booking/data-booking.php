
<head>
    <style>
        table {
            background-color: #fff;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        .table-responsive {
            border-radius: 5px;
            overflow: hidden;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        .book-image {
            width: 100px; /* Adjust the width as needed */
        }
        .btn-custom {
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <div class="container mt-3">
        <center>
            <div class="table-responsive full-width">
                <table class="table table-bordered table-striped table-hover" id="table-datatable">
                    <thead>
                        <tr>
                            <th>No.</th>
                            <th>Buku</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th>Tahun</th>
                            <th>Pilihan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($temp as $t) 
                        {
                        ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td>
                                    <img src="<?= base_url('assets/img/upload/' . $t['image']); ?>" class="rounded book-image" alt="No Picture">
                                </td>
                                <td nowrap><?= $t['penulis']; ?></td>
                                <td nowrap><?= $t['penerbit']; ?></td>
                                <td nowrap><?= substr($t['tahun_terbit'], 0, 4); ?></td>
                                <td nowrap>
                                    <a href="<?= base_url('booking/hapusbooking/' . $t['id_buku']); ?>" onclick="return confirm('Yakin tidak Jadi Booking <?= $t['judul_buku']; ?>?')">
                                        <i class="btn btn-sm btn-outline-danger fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
            <div class="btn-custom">
                <a class="btn btn-sm btn-outline-primary" href="<?php echo base_url(); ?>"><span class="fas fa-play"></span> Lanjutkan Booking Buku</a>
                <a class="btn btn-sm btn-outline-success" href="<?php echo base_url() . 'booking/bookingSelesai/' . $this->session->userdata('id_user'); ?>"><span class="fas fa-check"></span> Selesaikan Booking</a>
            </div>
        </center>
    </div>

