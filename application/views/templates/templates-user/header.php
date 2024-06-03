<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pustaka-Booking | <?= $judul; ?></title>
    <link rel="icon" type="image/png" href="<?= base_url('assets/img/logo/logo-pb.png'); ?>">
    <link rel="stylesheet" href="<?= base_url('assets/user/css/bootstrap.css'); ?>">
    <link href="<?= base_url('assets/vendor/fontawesome-free/css/all.min.css'); ?>" rel="stylesheet" type="text/css">
  <link rel="stylesheet" href="http://cdn.datatables.net/1.10.13/css/jquery.dataTables.min.css">
</head>

<body>
     <nav class="navbar navbar-expand-lg navbar-light bg-light py-3 shadow">
        <div class="container">
            <a class="navbar-brand" href="<?= base_url(); ?>">
                <img src="https://img.freepik.com/free-vector/gradient-book-logo-with-slogan_23-2148832096.jpg?t=st=1717378641~exp=1717382241~hmac=4bc8c9a1d3e1d81e777ecb58064a7aa589895edad6f1d4c63930c3799abc048f&w=740" alt="Logo" style="width: 40px; height: 40px;">
                Pustaka
            </a>
            <span class="nav-item nav-link d-none d-lg-block ml-3">
                Selamat Datang <b><?= $user; ?></b>
            </span>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ml-auto">
                    <?php if (!empty($this->session->userdata('email'))) { ?>
                        <a class="nav-item nav-link" href="<?= base_url('booking') ?>">
                            <i class="fas fa-cart-arrow-down text-primary"></i><b><?= $this->ModelBooking->getDataWhere('temp', ['email_user' => $this->session->userdata('email')])->num_rows(); ?></b>
                        </a>
                        <a class="nav-item nav-link" href="<?= base_url('member/myprofil'); ?>"><i class="fas fa-user"></i> Profil Saya</a>
                        <a class="nav-item nav-link bg-primary rounded text-white" href="<?= base_url('member/logout'); ?>"><i class="fas fa-sign-out-alt"></i> Log out</a>
                    <?php } else { ?>
                        <a class="nav-item nav-link" data-toggle="modal" data-target="#daftarModal" href="#"><i class="fas fa-user-plus"></i> Daftar</a>
                        <a class="nav-item nav-link bg-primary rounded text-white" data-toggle="modal" data-target="#loginModal" href="#"><i class="fas fa-sign-in-alt"></i> Log in</a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </nav>

    <div class="container">