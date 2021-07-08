<?php $this->load->view('header.php');?>
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
    
        <div class="d-flex row py-5 justify-content-center">
        
            <div class ="col-12 col-sm-12 col-md-10 col-lg-8 col-xl-5">
                <div class="card p-5">

                    <h4 class="mb-1">Register Hospital</h4>
                    <h6 class="ml-1 mb-3">to continue to the BloodBank</h6>
                    
                    <form action="<?= base_url().'login/register_hospital'?>" name="registerform" id="registerform" method="post">
                        <div class="input-group mt-4 mb-3">
                            <input type="text" name="name" value="<?=set_value('name')?>" placeholder="Name" class="form-control <?=(form_error('name')!='')? 'is-invalid' : '' ; ?>">
                        </div>
                        <?=form_error('name');?>
                        <div class="input-group mt-4 mb-3">
                            <input type="text" name="address" value="<?=set_value('address')?>" placeholder="Hospital Address" class="form-control <?=(form_error('address')!='')? 'is-invalid' : '' ; ?>">
                        </div>
                        <?=form_error('address');?>
                        <div class="input-group mt-4 mb-3">
                            <input type="text" name="city" value="<?=set_value('city')?>" placeholder="City" class="form-control <?=(form_error('city')!='')? 'is-invalid' : '' ; ?>">
                        </div>
                        <?=form_error('city');?>
                        <div class="input-group mt-4 mb-3">
                            <input type="email" name="email" placeholder="E-mail" value="<?=set_value('email')?>" class="form-control <?=(form_error('email')!='')? 'is-invalid' : '' ; ?>">
                        </div>
                        <?=form_error('email');?>
                        <div class="input-group mt-4 mb-3">
                            <input type="tel" name="phone"  placeholder="Contact No." value="<?=set_value('phone')?>" class="form-control <?=(form_error('phone')!='')? 'is-invalid' : '' ; ?>">
                        </div>
                        <?=form_error('phone');?>

                        <div class="row  mb-3">
                            <div class="input-group col-sm-6 mb-3">
                                <input type="password" name="password" placeholder="Password" class="form-control">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <em class="fas fa-lock"></em>
                                    </div>
                                </div>
                                <?=form_error('password');?>
                            </div>
                            <div class="input-group col-sm-6">
                                <input type="password" name="cpassword" placeholder="Confirm Password" class="form-control">
                                <?=form_error('cpassword');?>
                            </div>
                            <span class="col-sm-12 text-muted" style="font-size:12px;">Prefer to Use 8 or more characters with a mix of letters, numbers & symbols</span>
                        </div>
                        <div class="row mt-5">
                            <div class="col-md-6 mb-4">
                                <a href="<?= base_url().'login/index'?>" >Log in instead</a>
                            </div>

                            <div class="col-md-5 float-right ">
                                <button type="submit" class="btn btn-success btn-block mb-2">Register</button>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
        </div>
    </div>
<?php $this->load->view('footer.php'); ?>

