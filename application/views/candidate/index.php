<?php
if ($_SESSION['level'] != 'admin') {
    redirect(base_url('auth'));
}
?>
<div class="container-fluid">

    <div class="row">
        <div class="col-md-4">
            <h5 class="ml-4 text-dark">List Of Candidate</h5>
            <?= $this->session->flashdata('message'); ?>
        </div>
        <div class="col-md-5">
            <a href="<?= base_url('candidate/add_candidate'); ?>" class="btn btn-primary mr-4 float-right"> <i class="fas fa-user-plus"></i> Add Data</a>
        </div>
    </div>
    <div class="col-md-12  mt-3">
        <table class="table table-responsive text-dark">
            <tr style="background-color: whitesmoke;">
                <th>No</th>
                <th>Leader</th>
                <th>Vice Leader</th>
                <th>Candidate</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
            <?php
            $no = 1;
            foreach ($candidate as $l) :
            ?>
                <tr>
                    <td><?= $no++; ?> </td>
                    <td><?= $l->nama_lengkap_leader; ?></td>
                    <td><?= $l->nama_lengkap_v_leader; ?></td>
                    <td><?= $l->candidate; ?></td>
                    <td><img style="max-width: 100px;" src="<?php echo base_url('assets/img/profile/candidate/') . $l->img_candidate; ?>"></td>
                    <td>
                        <a href="<?php echo base_url('candidate/edit_candidate/' . $l->id_candidate); ?>" class="badge badge-success"> <i class="fa fa-edit"></i> Edit</a>
                        <a href="<?php echo base_url('candidate/delete_candidate/' . $l->id_candidate); ?>" class="badge badge-danger" onclick="return confirm('Anda yakin akan mengahapus data ini  ?');"> <i class="fas fa-trash-alt"></i> Delete</a>
                        <a href="<?php echo base_url('candidate/detail_candidate/' . $l->id_candidate); ?>" class="badge badge-info"> <i class="fas fa-print"></i> Detail</a>
                    </td>
                </tr>
            <?php
            endforeach;
            ?>
        </table>
    </div>
</div>