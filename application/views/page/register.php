<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center mt-4">
        <div class="col-xl-7 col-lg-6 col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <div class="p-5">
                                <div class="text-center">
                                    <h3 style="color: royalblue;"> <img src="<?= base_url('assets/img/logo.png'); ?>" style="width: 50px;" class="mb-2"> <b> Registration Form</b></h3>
                                    <br>
                                    <?= $this->session->flashdata('message'); ?>
                                </div>
                                <form action="<?= base_url('auth/register'); ?>" method="POST" class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" aria-describedby="email" name="email" placeholder="Email">
                                        <?= form_error('email', '<small class="text-danger mt-3 pl-3">', '</small>'); ?>
                                        <?php if ($email_erorr != '') {
                                            echo $email_erorr;
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control  form-control-user" id="password1" autocomplete="off" aria-describedby="password1" name="password1" placeholder="Password">
                                        <?= form_error('password1', '<small class="text-danger mt-3 pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" autocomplete="off" class="form-control  form-control-user" id="password2" name="password2" placeholder="Repeat Password">
                                        <?= form_error('password2', '<small class="text-danger mt-3 pl-3">', '</small>'); ?>
                                    </div>
                                    <input type="submit" name="login" value="Register" class="btn btn-primary btn-user btn-block">
                                    </input>
                                </form>
                                <p class="mt-4"><b>Have Account ?<a href="<?= base_url('auth') ?>"> Login Here !!!</a></b> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>