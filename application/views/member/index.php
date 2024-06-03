<!-- Begin Page Content -->
<div class="container-fluid mt-3">
    <div class="row">
        <div class="col-lg-6 justify-content-x"> 
            <?= $this->session->flashdata('pesan'); ?> 
        </div>
    </div>
    <div class="card mb-3 shadow" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4"> 
                <img src="<?= base_url('assets/img/profile/') . $image; ?>" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title"><?= $user; ?></h5>
                    <p class="card-text"><?= $email; ?></p>
                    <?php
                        if ($tanggal_input) {
                            $timestamp = strtotime($tanggal_input);
                            $formatted_date = date('d F Y', $timestamp);
                        } else {
                            $formatted_date = "Tanggal tidak valid";
                        }
                    ?>
                    <p class="card-text"><small class="text-muted">Jadi member sejak: <br><b><?= $formatted_date; ?></b></small></p>
                </div>
                <div class="btn btn-info ml-3 my-3">
                    <a href="<?= base_url('member/ubahprofil'); ?>" class="text text-white">
                        <i class="fas fa-user-edit"></i> Ubah Profil
                    </a>
                </div>
            </div>
        </div>
    </div>
</div> 
<!-- /.container-fluid --> 
<!-- End of Main Content -->
