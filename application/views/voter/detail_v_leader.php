<?php
if ($_SESSION['level'] != 'voter') {
    redirect(base_url('auth'));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <link rel="shortcut icon" href="<?= base_url('assets/');  ?>img/logo.png" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="<?= base_url('assets/');  ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-light bg-light">
        <a class="navbar-brand" href="#">
            <img src="<?= base_url('assets/img/logo.png') ?>" width="30" height="30" class="d-inline-block align-top" alt="">
            E-Vote
        </a>
        <a href="<?= base_url('auth/logout'); ?>" class="btn btn-outline-danger ">Logout</a>
    </nav>
    <div class="col-xl-4 col-sm-6 mt-3">
        <div class="card">
            <div class="card-header">
                <h3><?= $v_leader['nama_lengkap_v_leader']; ?></h3>
            </div>
            <div class="card-body">
                <img style="max-width: 150px;" src="<?= base_url('assets/img/profile/v_leader/') . $v_leader['img_v_leader']; ?>" class="img-thumbnail" alt="">
                <h5 class="card-title mt-3">Education</h5>
                <div style="color: #393e46;" class="row">
                    <div class="col-8">
                        <p><?= $v_leader['sd_v_leader']; ?></p>
                    </div>
                </div>
                <div style="color: #393e46;" class="row">
                    <div class="col-8">
                        <p><?= $v_leader['smp_v_leader']; ?></p>
                    </div>
                </div>
                <div style="color: #393e46;" class="row">
                    <div class="col-8">
                        <p><?= $v_leader['smk_v_leader']; ?></p>
                    </div>
                </div>
                <h5 class="card-title">Achievment</h5>
                <div style="color: #393e46;" class="row">
                    <div class="col-8">
                        <p><?= $v_leader['achievement_1_v_leader']; ?></p>
                    </div>
                </div>
                <div style="color: #393e46;" class="row">
                    <div class="col-8">
                        <p><?= $v_leader['achievement_2_v_leader']; ?></p>
                    </div>
                </div>
                <a href="<?php echo base_url('voter'); ?>" class="btn btn-warning col-4"><i class="fas fa-arrow-circle-left"></i> Back</a>
            </div>
        </div>
    </div>
    <br>
    <!-- end of navbar -->
</body>

</html>