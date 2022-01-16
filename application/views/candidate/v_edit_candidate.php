<?php
if ($_SESSION['level'] != 'admin') {
    redirect(base_url('auth'));
}
?>
<div class="container-fluid">
    <center>
        <img style="max-width: 190px;" src="<?= base_url('assets/img/profile/candidate/') . $candidate['img_candidate']; ?>" class="img img-thumbnail">
        <h4 class="text-dark mt-2 ">Edit Candidate</h4>
    </center>
    <?php $error = null; ?>
    <?= $error; ?>
    <?php echo form_open_multipart('candidate/edit_candidate');
    if (validation_errors()) {
        echo "<div class='alert col-4 alert-danger'><b>";
        echo validation_errors();
        echo "</b></div>";
    }
    ?>
    <input type="text" hidden name="id_candidate" value="<?= $candidate['id_candidate']; ?>">
    <div class="form-group row mt-3">
        <label for="leader_id" class="col-sm-2 mt-2">Leader</label>
        <select id="leader_id" required name="leader_id" class="form-control col-sm-3">
            <option value="<?= $candidate['leader_id']; ?>" selected><?= $candidate['nama_lengkap_leader']; ?></option>
            <?php
            foreach ($leader as $l) :
            ?>
                <option value="<?= $l->id_leader; ?>"><?= $l->nama_lengkap_leader; ?></option>
            <?php
            endforeach;
            ?>
        </select>
        <label for="visi" class="col-sm-1 ml-3 col-form-label">Visi</label>
        <div class="col-sm-5">
            <textarea class="form-control" autocomplete="off" required name="visi" rows="3" aria-label="With textarea"><?= $candidate['visi']; ?></textarea>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="v_leader_id" class="col-sm-2 mt-2">Vice Leader</label>
        <select id="v_leader_id" required name="v_leader_id" class="form-control mr-1 col-sm-3">
            <option value="<?= $candidate['v_leader_id']; ?>" selected><?= $candidate['nama_lengkap_v_leader']; ?></option>
            <?php
            foreach ($v_leader as $v_l) :
            ?>
                <option value="<?= $v_l->id_v_leader; ?>"><?= $v_l->nama_lengkap_v_leader; ?></option>
            <?php
            endforeach;
            ?>
        </select>
        <label for="misi" class="col-sm-1 ml-3 col-form-label">Misi</label>
        <div class="col-sm-5">
            <textarea required class="form-control" autocomplete="off" name="misi" rows="6" aria-label="With textarea"><?= $candidate['misi']; ?></textarea>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="candidate" class="col-sm-2 mt-1">Candidate</label>
        <input type="text" class="form-control col-sm-3" name="candidate" readonly value="<?= $candidate['candidate']; ?>">
        <label for="img_candidate" class="col-sm-2 ml-3 mt-1">Image Candidate</label>
        <div class="col-sm-4">
            <input type="file" name="img_candidate" class="custom-file-input" id="inputGroupFile01">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
    </div>
    <input type="text" hidden name="old_image" value="<?= $candidate['img_candidate']; ?>">
    <input type="text" hidden name="old_leader_id" value="<?= $candidate['leader_id']; ?>">
    <input type="text" hidden name="old_v_leader_id" value="<?= $candidate['v_leader_id']; ?>">
    <div class="row">
        <div class="col-md-9">
        </div>
        <div class="col-md-2 ml-4">
            <input type="submit" name="submit" class="btn float-right  btn-primary" value="Edit Data">
        </div>
    </div>
    </form>
</div>