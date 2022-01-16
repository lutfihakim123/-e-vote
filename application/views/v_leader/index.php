<?php
if ($_SESSION['level'] != 'admin') {
    redirect(base_url('auth'));
}
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-8">
            <h5 class="ml-3 text-dark">List Of Vice Leader</h5>
            <?= $this->session->flashdata('message'); ?>
        </div>
        <div class="col-md-2">
            <a href="<?= base_url('v_leader/add_v_leader'); ?>" class="btn btn-primary ml-3"> <i class="fas fa-user-plus"></i> Add Data</a>
        </div>
    </div>
    <div class="col-md-12  mt-3">
        <table class="table table-responsive text-dark">

            <tr style="background-color: whitesmoke;">
                <th>No</th>
                <th>Nama Lengkap</th>
                <th>Sd</th>
                <th>Smp</th>
                <th>Smk</th>
                <th>Img</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no = 1;
            foreach ($v_leader as $vl) :
            ?>
                <tr>
                    <td><?= $no++; ?> </td>
                    <td><?= $vl->nama_lengkap_v_leader; ?></td>
                    <td><?= $vl->sd_v_leader; ?></td>
                    <td><?= $vl->smp_v_leader; ?></td>
                    <td><?= $vl->smk_v_leader; ?></td>
                    <td><img style="max-width: 60px;" src="<?php echo base_url('assets/img/profile/v_leader/') . $vl->img_v_leader; ?>"></td>
                    <td>
                        <a href="<?php echo base_url('v_leader/edit_v_leader/' . $vl->id_v_leader); ?>" class="badge badge-success"> <i class="fa fa-edit"></i> Edit</a>
                        <a href="<?php echo base_url('v_leader/delete_v_leader/' . $vl->id_v_leader); ?>" class="badge badge-danger" onclick="return confirm('Anda yakin akan mengahapus data ini  ?');"> <i class="fas fa-trash-alt"></i> Delete</a>
                        <a href="<?php echo base_url('v_leader/detail_v_leader/' . $vl->id_v_leader); ?>" class="badge badge-info"> <i class="fas fa-print"></i> Detail</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>

        </table>
    </div>

</div>