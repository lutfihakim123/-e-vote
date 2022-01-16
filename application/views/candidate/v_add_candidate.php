<?php
if ($_SESSION['level'] != 'admin') {
    redirect(base_url('auth'));
}
?>
<div class="container-fluid">
    <h4 class="text-dark ">Form Add Candidate</h4>
    <?php $error = null; ?>
    <?= $error; ?>
    <?php echo form_open_multipart('candidate/add_candidate');
    if (validation_errors()) {
        echo "<div class='alert col-4 alert-danger'><b>";
        echo validation_errors();
        echo "</b></div>";
    }
    ?>
    <div class="form-group row mt-3">
        <label for="leader_id" class="col-sm-2 mt-2">Leader</label>
        <select id="leader_id" name="leader_id" class="form-control col-sm-3">
            <option value="" selected>Choose Leader</option>
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
            <textarea class="form-control" autocomplete="off" name="visi" rows="3" aria-label="With textarea"></textarea>
        </div>
    </div>
    <div class="form-group row mt-3">
        <label for="v_leader_id" class="col-sm-2 mt-2">Vice Leader</label>
        <select id="v_leader_id" name="v_leader_id" class="form-control mr-1 col-sm-3">
            <option value="" selected>Choose Vice Leader</option>
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
            <textarea class="form-control" autocomplete="off" name="misi" rows="6" aria-label="With textarea"></textarea>
        </div>
    </div>
    <div class="form-group row mt-3">
        <?php
        $candidate = $c_candidate + 1;
        ?>
        <label for="candidate" class="col-sm-2 mt-1">Candidate</label>
        <input type="text" class="form-control col-sm-3" name="candidate" readonly value="<?= 'Candidate ' . $candidate; ?>">
        <label for="img_candidate" class="col-sm-2 ml-3 mt-1">Image Candidate</label>
        <div class="col-sm-4">
            <input type="file" name="img_candidate" required class="custom-file-input" id="inputGroupFile01">
            <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
        </div>
    </div>
    <div class="row">
        <div class="col-md-9">
        </div>
        <div class="col-md-2 ml-4">
            <input type="submit" name="submit" class="btn float-right btn-primary" value="Add Data">
        </div>
    </div>
    </form>
</div>