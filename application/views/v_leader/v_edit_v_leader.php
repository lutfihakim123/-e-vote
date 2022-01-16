<?php
if ($_SESSION['level'] != 'admin') {
    redirect(base_url('auth'));
}
?>
<div class="container-fluid">
    <h4 class="text-dark">Form Edit Vice Leader</h4>
    <?php $error = null; ?>
    <?= $error; ?>
    <div class="row">
        <div class="col-md-5 ml-3">
            <?php echo form_open_multipart('v_leader/edit_v_leader'); ?>
            <div class="form-group row mt-3">
                <?= $this->session->flashdata('message'); ?>
                <input type="text" autocomplete="off" hidden value="<?= $v_leader['id_v_leader']; ?>" name="id_v_leader">
                <label for="nama_lengkap_v_leader" required class="col-sm-8 col-form-label">Nama Lengkap</label>
                <div class="col-sm-8">
                    <input type="text" autocomplete="off" value="<?= $v_leader['nama_lengkap_v_leader']; ?>" class="form-control" id="nama_lengkap_v_leader" name="nama_lengkap_v_leader">
                    <?= form_error('nama_lengkap_v_leader', '<small class="text-danger  pl-1">', '</small>'); ?>
                </div>
            </div>
            <span style="color: #08009a;" required class="ml-8">Education</span>
            <div class="form-group row">
                <label for="sd_v_leader" class="col-sm-8 col-form-label">SD</label>
                <div class="col-sm-8">
                    <input type="text" autocomplete="off" class="form-control" value="<?= $v_leader['sd_v_leader']; ?>" id="sd_v_leader" name="sd_v_leader">
                </div>
                <?= form_error('sd_v_leader', '<small class="text-danger mt-2 pl-3">', '</small>'); ?>
            </div>
            <div class="form-group row">
                <label for="smp_v_leader" class="col-sm-8 col-form-label">SMP</label>
                <div class="col-sm-8">
                    <input type="text" required autocomplete="off" value="<?= $v_leader['smp_v_leader']; ?>" class="form-control" id="smp_v_leader" name="smp_v_leader">
                </div>
                <?= form_error('smp_v_leader', '<small class="text-danger mt-2 pl-3">', '</small>'); ?>
            </div>
            <div class="form-group row">
                <label for="smk_v_leader" required class="col-sm-8 col-form-label">SMA</label>
                <div class="col-sm-8">
                    <input type="text" autocomplete="off" value="<?= $v_leader['smk_v_leader']; ?>" class="form-control" id="smk_v_leader" name="smk_v_leader">
                </div>
                <?= form_error('smk_v_leader', '<small class="text-danger mt-2 pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group row">
                <label for="achievement_1_v_leader" class="col-sm-8 col-form-label">Achievement 1</label>
                <div class="col-sm-8">
                    <textarea class="form-control" required autocomplete="off" name="achievement_1_v_leader" rows="3" aria-label="With textarea"><?= $v_leader['achievement_1_v_leader']; ?></textarea>
                </div>
                <?= form_error('achievement_1_v_leader', '<small class="text-danger mt-2 pl-3">', '</small>'); ?>
            </div>
            <div class="form-group row">
                <label for="achievement_2_v_leader" autocomplete="off" class="col-sm-8 col-form-label">Achievement 2</label>
                <div class="col-sm-8">
                    <textarea class="form-control" required name="achievement_2_v_leader" rows="3" aria-label="With textarea"><?= $v_leader['achievement_2_v_leader']; ?></textarea>
                </div>
                <?= form_error('achievement_2_v_leader', '<small class="text-danger mt-2 pl-3">', '</small>'); ?>
            </div>
            <div class="form-group row">
                <img style="max-width: 190px;" src="<?= base_url('assets/img/profile/v_leader/') . $v_leader['img_v_leader']; ?>" class="img ml-3 img-thumbnail">
                <label for="inputGroupFile01" class="col-sm-8 col-form-label">Image Profile</label>
                <div class="col-sm-8">
                    <div class="custom-file">
                        <input type="file" name="img_v_leader" class="custom-file-input" id="inputGroupFile01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose File</label>
                    </div>
                </div>
            </div>
            <input type="text" name="old_image" hidden value="<?= $v_leader['img_v_leader']; ?>">
            <div class="form-group row">
                <div class="col-sm-5">
                </div>
                <div class="col-sm-3">
                    <input type="submit" name="submit" class="btn btn-primary float-right" value="Edit Data">
                </div>
            </div>
        </div>
        </form>
    </div>
</div>