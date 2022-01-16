<?php
if ($_SESSION['level'] != 'admin') {
    redirect(base_url('auth'));
}
?>
<?php
error_reporting(0);
if (!empty($_GET['download'] == 'doc')) {
    header("Content-Type: application/vnd.ms-word");
    header("Expires: 0");
    header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
    header("content-disposition: attachment;filename=" . date('d-m-Y') . "_detail_candidate.doc");
}
if (!empty($_GET['download'] == 'xls')) {
    header("Content-Type: application/force-download");
    header("Cache-Control: no-cache, must-revalidate");
    header("Expires: 0");
    header("content-disposition: attachment;filename=" . date('d-m-Y') . "_detail_candidate.xls");
}
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="<?= base_url('assets/');  ?>vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="<?= base_url('assets/');  ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link rel="shortcut icon" href="<?= base_url('assets/');  ?>img/logo.png" />
    <title><?= $title; ?></title>
    <style>
        body {
            background: rgba(0, 0, 0, 0.2);
        }

        page[size="A4"] {
            background: white;
            width: 21cm;
            height: 29.7cm;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5pc;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
            padding-left: 2.54cm;
            padding-right: 2.54cm;
            padding-top: 1.54cm;
            padding-bottom: 1.54cm;
        }

        @media print {

            body,
            page[size="A4"] {
                margin: 0;
                box-shadow: 0;
            }


            .cetak {
                display: none;
            }

            .judul {
                display: none;
            }
        }
    </style>
</head>

<body>
    <div class="container-fluid">
        <br>
        <div class="row">
            <div class="col-2">
            </div>
            <div class="col-7">
                <h4 class="judul" style="color:black;">Data candidate</h4>
            </div>
            <div class="col-1 ml-3">
                <button type='button' class='btn btn-info cetak' onclick="printDiv('printableArea')">
                    <i class='fa fa-print'> </i> Print
                </button>
            </div>
        </div>
        <br>
        <div id="printableArea">
            <page size="A4">
                <div class="panel panel-default">
                    <div class="panel-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-6">

                                </div>
                            </div>
                            <?php
                            $misi = $candidate['misi'];
                            $e_misi = explode("-", $misi);
                            ?>
                            <center>
                                <img style="max-width: 250px;  border-radius: 3%;" src="<?= base_url('assets/img/profile/candidate/') . $candidate['img_candidate']; ?>" alt="">
                                <br><br>
                                <h3 style="text-decoration:none; color: #233e8b; "> <b><a href="<?= base_url('leader/detail_leader/' . $candidate['leader_id']); ?>"><?= $candidate['nama_lengkap_leader']; ?></a> <span style="color: #4e73df;">&</span> <a href="<?= base_url('v_leader/detail_v_leader/' . $candidate['v_leader_id']); ?>"><?= $candidate['nama_lengkap_v_leader']; ?></a></b> </h3>
                                <br>
                                <h4 style="color: #4e73df;">Visi</h4>
                                <h6><b><?= $candidate['visi']; ?></b></h6>
                                <h4 class="mt-2" style="color: #4e73df;">Misi</h4>
                                <?php $i = 0;
                                foreach ($e_misi as $m) : ?>
                                    <h6>
                                        <b>
                                            <!-- <?php if ($i == 0) : ?>
                                                <?php $i = "" ?>
                                            <?php endif; ?> -->
                                            <?= $i++ .
                                                $m; ?>
                                        </b>
                                    </h6>
                                <?php endforeach; ?>
                            </center>
                            <br>
                        </div>

                    </div>
                    <br><br>
                    <div class="footer" style="margin-left: 20px;">
                        Created At <?= date("Y-m-d"); ?>
                    </div>
            </page>
        </div>
    </div>

</body>
<script>
    function printDiv(divName) {
        var printContents = document.getElementById(divName).innerHTML;
        var originalContents = document.body.innerHTML;
        document.body.innerHTML = printContents;
        window.print();
        document.body.innerHTML = originalContents;
    }
</script>
<script src="<?= base_url('assets/');  ?>vendor/jquery/jquery.min.js"></script>
<script src="<?= base_url('assets/');  ?>vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="<?= base_url('assets/');  ?>vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="<?= base_url('assets/');  ?>js/sb-admin-2.min.js"></script>

</html>