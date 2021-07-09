<?php $this->load->view('header.php',$nav);?>

  <div class="container">
    <?php
      $success=$this->session->flashdata('success');
      if($success!=""){?>
      <div class="alert alert-success alert-dismissible fade show text-center"><?= $this->session->flashdata('success');?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php } ?>
    <?php
      $fail=$this->session->flashdata('fail');
      if($fail!=""){?>
      <div class="alert alert-danger alert-dismissible fade show text-center"><?= $this->session->flashdata('fail');?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php } ?>
    <div class="d-flex row py-5 justify-content-center">
      <div class ="col-11 col-sm-11 col-md-10 col-lg-8 col-xl-5">
        <div class="card p-5 ">
          <h5 class=" mb-3">Login to Your Account</h5>
          <form action="<?= base_url().'login/authenticate'?>" name="loginform" id="loginform" method="post">
            <div class="input-group mb-3">
                <input type="text" name="loginid" value="<?=set_value('loginid')?>" placeholder="E-mail or Phone no." class="form-control">
                <div class="input-group-append">
                    <div class="input-group-text">
                      <em class="fas fa-envelope"></em>
                    </div>
                </div>
            </div>
            <?=form_error('loginid');?>
            <div class="input-group mb-5">
                <input type="password" name="password" placeholder="Enter your Password" class="form-control">
                <div class="input-group-append">
                    <div class="input-group-text">
                      <em class="fas fa-lock"></em>
                    </div>
                </div>
            </div>
            <?=form_error('password');?>
            <div class="row pt-2">
              <div class="col-12 col-sm-12 col-lg-5">
                  <button type="submit" class="btn btn-success btn-sm btn-block mb-2">Login</button>
              </div>
            </div>
            <div class="mt-5 ml-1">   
              <h5><strong>New User?</strong></h5> 
              <a href="<?= base_url().'login/register_receiver'?>" ><h4 class="mt-1">Register as Receiver</h4></a> 
              <a href="<?= base_url().'login/register_hospital'?>" ><h4 class="mt-1">Register as Hospital</h4></a> 
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php $this->load->view('footer.php'); ?>
