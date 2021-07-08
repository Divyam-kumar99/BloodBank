<?php $this->load->view('header',$user); ?>
<!-- carousel  -->
<div class="container">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    
    <div class="carousel-inner">
        <div class="carousel-item active" style="height: 500px;">
        <img src="<?= base_url('public/images/slide3.jpg');?>" class="d-block w-100 h-100 img-fluid" alt="...">
        </div>
        <div class="carousel-item" style="height: 500px;">
        <img src="<?= base_url('public/images/slide2.jpg');?>" class="d-block w-100 h-100 img-fluid" alt="...">
        </div>
        <div class="carousel-item" style="height: 500px;">
        <img src="<?= base_url('public/images/slide1.jpg');?>" class="d-block w-100 h-100 img-fluid" alt="...">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only"></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only"></span>
    </a>
    </div>
</div> <!--end of carousel-->
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
      <!-- Main content -->
    <div class="content my-5 py-5">
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
        <div class="row">
          <div class="col-sm-12 ">
            <div class="card ">
                <div class="card-header">
                    <div class="card-title">
                        <span class="text-center"><h5>All Available Blood Samples</h5></span> 
                    </div>
                </div>  
                <div class="card-body">
                    <table class="table table-bordered col-sm-12">
                        <tr>
                            <th scope="col">Sl no.</th>
                            <th scope="col">Hospital Name</th>
                            <th scope="col">Address</th>
                            <th scope="col">Contact No.</th>
                            <th scope="col">Email</th>
                            <th scope="col">Available Blood Group</th>
                            <th scope="col">Units</th>
                            <?php if(!empty($user)&& $user['role']=='Receiver'){?>
                              <th scope="col">Action</th>
                            <?php } ?>
                        </tr>
                        <?php if (!empty($availables)){ 
                          $no=1;?>
                          <?php foreach($availables as $available){ ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$available['hospital_name']?></td>
                                <td><?=$available['hospital_address'],',',$available['hospital_city'];?></td>
                                <td><?=$available['hospital_phone']?></td>
                                <td><?=$available['hospital_email']?></td>
                                <td><?=$available['bloodgroup']?></td>
                                <td><?=$available['units']?></td>
                                
                               <?php if(empty($user)){?>
                                <td class="text-center">
                                    <a href="<?=base_url('login')?>" class="btn btn-primary btn-sm">
                                   
                                    Request Blood
                                    </a>
                                </td>
                              <?php }else{?>
                                <?php if(!empty($receiver) && $receiver['request_status']==0 && $receiver['receiver_bloodgroup']==$available['bloodgroup']){?>
                                  <td>
                                    <a href="<?=base_url('home/request_blood/').$available['hospital_id']?>" class="btn btn-primary btn-sm">Request Blood</a>
                                  </td>
                                <?php } else if($user['role']=="Hospital"){?>

                                <?php }else{?>
                                  <td>
                                    <a href="<?=base_url('home/request_blood/').$available['hospital_id']?>" class="btn btn-primary disabled btn-sm">Request Blood</a>  
                                  </td>
                                <?php } 
                              }?>
                            </tr>
                            <?php $no=$no +1; 
                          }
                            
                        }else { ?>
                          <td colspan='8' class="text-center alert alert-danger">No Record found</td>
                        <?php } ?>
                    
                    </table>
                   
                
                </div><!-- end of table body-->
            </div><!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

<?php $this->load->view('footer'); ?>

