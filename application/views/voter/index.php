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
    <br>
    <?php
    if ($_SESSION['candidate_id'] == 0) {
    ?>
        <center>
            <h3>Vote Your Candidate</h3>
            <div class="row">
                <div class="col-2">
                </div>
                <?php
                foreach ($candidate as $c) :
                    $misi = $c->misi;
                    $e_misi = explode("-", $misi);
                ?>
                    <div class="card pt-4 col-xl-4  col-sm-12 mt-5 ml-3">
                        <center>
                            <img style="max-width: 200px;" class="card-img-top" src="<?php echo base_url('assets/img/profile/candidate/') . $c->img_candidate; ?>">
                        </center>
                        <div class="card-body">
                            <p class="card-text"><b><a href="<?= base_url('voter/detail_leader/') . $c->id_leader; ?>"><?= $c->nama_lengkap_leader; ?></a> <span style="color: royalblue;">&</span> <a href="<?= base_url('voter/detail_v_leader/') . $c->id_v_leader; ?>"><?= $c->nama_lengkap_v_leader; ?></a></b></p>
                            <h4><b>Visi</b></h4>
                            <p><?= $c->visi; ?></p>
                            <h4><b>Misi</b></h4>
                            <?php $i = 0;
                            foreach ($e_misi as $m) : ?>
                                <p>
                                    <!-- <?php if ($i == 0) : ?>
                                                <?php $i = "" ?>
                                            <?php endif; ?> -->
                                    <?= $i++ .
                                        $m; ?>

                                </p>
                            <?php endforeach; ?>
                            <a href="<?php echo base_url('voter/vote?id_candidate=') . $c->id_candidate ?>" class="btn btn-primary"><i class="fas fa-vote-yea"></i> Vote</a>
                        </div>
                    </div>
                <?php
                endforeach;
                ?>
                <div class="col-2"></div>
            </div>
        </center>
        <!-- end of navbar -->
    <?php
    } else {
    ?>
        <h2 class="text-danger ml-2">Your Vote is <?= $d_vote['nama_lengkap_leader']; ?> & <?= $d_vote["nama_lengkap_v_leader"]; ?></h2>
    <?php
    }
    ?>
</body>

</html>