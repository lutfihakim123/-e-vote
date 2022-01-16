<?php
if ($_SESSION['level'] != 'admin') {
    redirect(base_url('auth'));
}
?>
<div class="container-fluid">
    <h4 class="text-dark">Form Edit Leader</h4>
    <?php $error = null; ?>
    <?= $error; ?>
    <div class="row">
        <div class="col-md-5 ml-3">
            <?php echo form_open_multipart('leader/edit_leader'); ?>
            <div class="form-group row mt-3">
                <?= $this->session->flashdata('message'); ?>
                <input type="text" autocomplete="off" hidden value="<?= $leader['id_leader']; ?>" name="id_leader">
                <label for="nama_lengkap_leader" required class="col-sm-8 col-form-label">Nama Lengkap</label>
                <div class="col-sm-8">
                    <input type="text" autocomplete="off" value="<?= $leader['nama_lengkap_leader']; ?>" class="form-control" id="nama_lengkap_leader" name="nama_lengkap_leader">
                    <?= form_error('nama_lengkap_leader', '<small class="text-danger  pl-1">', '</small>'); ?>
                </div>
            </div>
            <span style="color: #08009a;" class="ml-8">Education</span>
            <div class="form-group row">
                <label for="sd_leader" class="col-sm-8 col-form-label">SD</label>
                <div class="col-sm-8">
                    <input type="text" required autocomplete="off" class="form-control" value="<?= $leader['sd_leader']; ?>" id="sd_leader" name="sd_leader">
                </div>
                <?= form_error('sd_leader', '<small class="text-danger mt-2 pl-3">', '</small>'); ?>
            </div>
            <div class="form-group row">
                <label for="smp_leader" class="col-sm-8 col-form-label">SMP</label>
                <div class="col-sm-8">
                    <input type="text" required autocomplete="off" value="<?= $leader['smp_leader']; ?>" class="form-control" id="smp_leader" name="smp_leader">
                </div>
                <?= form_error('smp_leader', '<small class="text-danger mt-2 pl-3">', '</small>'); ?>
            </div>
            <div class="form-group row">
                <label for="smk_leader" class="col-sm-8 col-form-label">SMA</label>
                <div class="col-sm-8">
                    <input type="text" required autocomplete="off" value="<?= $leader['smk_leader']; ?>" class="form-control" id="smk_leader" name="smk_leader">
                </div>
                <?= form_error('smk_leader', '<small class="text-danger mt-2 pl-3">', '</small>'); ?>
            </div>
        </div>
        <div class="col-md-6 mt-3">
            <div class="form-group row">
                <label for="achievement_1_leader" class="col-sm-8 col-form-label">Achievement 1</label>
                <div class="col-sm-8">
                    <textarea class="form-control" required autocomplete="off" name="achievement_1_leader" rows="3" aria-label="With textarea"><?= $leader['achievement_1_leader']; ?></textarea>
                </div>
                <?= form_error('achievement_1_leader', '<small class="text-danger mt-2 pl-3">', '</small>'); ?>
            </div>
            <div class="form-group row">
                <label for="achievement_2_leader" autocomplete="off" class="col-sm-8 col-form-label">Achievement 2</label>
                <div class="col-sm-8">
                    <textarea class="form-control" required name="achievement_2_leader" rows="3" aria-label="With textarea"><?= $leader['achievement_2_leader']; ?></textarea>
                </div>
                <?= form_error('achievement_2_leader', '<small class="text-danger mt-2 pl-3">', '</small>'); ?>
            </div>
            <div class="form-group row">
                <img style="max-width: 190px;" src="<?= base_url('assets/img/profile/leader/') . $leader['img_leader']; ?>" class="img ml-3 img-thumbnail">
                <label for="inputGroupFile01" class="col-sm-8 col-form-label">Image Profile</label>
                <div class="col-sm-8">
                    <div class="custom-file">
                        <input type="file" name="img_leader" class="custom-file-input" id="inputGroupFile01">
                        <label class="custom-file-label" for="inputGroupFile01">Choose File</label>
                    </div>
                </div>
            </div>
            <input type="text" name="old_image" hidden value="<?= $leader['img_leader']; ?>">
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