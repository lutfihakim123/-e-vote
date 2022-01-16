<?php
if ($_SESSION['level'] != 'admin') {
    redirect(base_url('auth'));
}
?>
<h2 class="ml-4" style="color: #0061a8;"><i class="fas fa-tachometer-alt" style="color:#0061a8"></i> Dashoard</h2>
<div class="row mt-3">
    <div class="col-xl-3 ml-2 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Candidate</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $candidate; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-friends fa-2x text-dark"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3  col-md-6 ml-1 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Leader</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $leader; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="far fa-address-card fa-2x text-dark"></i>


                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-1">

    </div>
    <div class="col-md-3"></div>
    <div class="col-xl-3  ml-2 col-md-6 mb-4">
        <div class="card border-left-warning shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                            Vice Leader</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $v_leader; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="far fa-address-book fa-2x text-dark"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 ml-2 col-md-6  mb-4">
        <div class="card border-left-danger shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                            Vote</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $voter; ?></div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-vote-yea fa-2x text-dark"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>