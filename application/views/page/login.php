<div class="container">
    <!-- Outer Row -->
    <div class="row justify-content-center mt-1">
        <div class="col-xl-7 col-lg-6 col-md-6">
            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-1"></div>
                        <div class="col-lg-10">
                            <div class="p-5">
                                <div class="text-center">
                                    <img src="<?= base_url('assets'); ?>/img/logo.png" class="img-fluid" style="width: 230px;">
                                </div>
                                <div class="text-center">
                                    <br>
                                    <?= $this->session->flashdata('message'); ?>
                                </div>
                                <form action="<?= base_url('auth'); ?>" method="POST" class="user">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" autocomplete="off" aria-describedby="username" name="username" placeholder="Email">
                                        <?= form_error('username', '<small class="text-danger mt-2 pl-3">', '</small>'); ?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" autocomplete="off" class="form-control  form-control-user" id="password" name="password" placeholder="Password">
                                        <?= form_error('password', '<small class="text-danger mt-2 pl-3">', '</small>'); ?>
                                    </div>
                                    <input type="submit" name="login" value="Login" class="btn btn-primary btn-user btn-block">
                                    </input>
                                </form>
                                <br>
                                <p class="ml-2"> <b>Create account ? <a href="<?= base_url('auth/register') ?>">Register Here !!!</a></b> </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>