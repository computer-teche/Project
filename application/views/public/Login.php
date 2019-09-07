<?php include('Header2.php');?>  
<?php include('Navbar2.php');?>  




<div class="container-fluid mt-5 pt-5">
    <div class="container mt-5 pb-5">
      <div class="row justify-content-center mt-auto">
        <div class="col-xs-12 col-sm-8 col-lg-5 col-md-7 ">
          <div class="card bg-secondary shadow border-0 mt-auto">
            <div class="card-header bg-white pb-5">
              <div class="text-muted text-center mt-2 mb-3"><small>Sign in with</small></div>
              <div class="btn-wrapper text-center">
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon"><img src="<?= base_url('assets/icons/svg/github.svg')?>"></span>
                  <span class="btn-inner--text">Github</span>
                </a>
                <a href="#" class="btn btn-neutral btn-icon">
                  <span class="btn-inner--icon">
                  <img src="<?= base_url('assets/icons/svg/google.svg')?>">            
                  <span class="btn-inner--text">Google</span>
                </a>
              </div>
            </div>
            <div class="card-body bg-white px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                <small>Or sign in with credentials</small>
              </div>
              <form role="form" action="<?= base_url('/WorkC/AuthUser')?>" method="post">
                <div class="form-group mb-3">
                  <div class="input-group input-group-alternative">
                    
                    <input class="form-control" placeholder="Email" type="username" name="username">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-alternative">
                   
                    <input class="form-control" placeholder="Password" type="password" name="password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4">Sign in</button>
                </div>
              </form>
            </div>
          </div>
          <div class="row mt-3">
            <div class="col-6">
              <a href="#" class="text-light"><small>Forgot password?</small></a>
            </div>
            <div class="col-6 text-right">
              <a href="#" class="text-light"><small>Create new account</small></a>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>

    <?php include('Footer2.php');?>  