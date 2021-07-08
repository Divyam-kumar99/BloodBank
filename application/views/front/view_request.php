<?php $this->load->view('header',$user); ?>

<!-- Content Wrapper. Contains page content -->
<?php
      $success=$this->session->flashdata('success');
      if($success!=""){?>
      <div class="alert alert-success alert-dismissible fade show text-center"><?= $this->session->flashdata('success');?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
    <?php } ?>
      <!-- Main content -->
    <div class="content my-5 py-5">
      <div class="container">
        <div class="row">
          <div class="col-lg-12 ">
            <div class="card ">  
                <div class="card-body">
                    <table class="table table-bordered">
                        <tr>
                            <th scope="col">Sl no.</th>
                            <th scope="col">Receiver Name</th>
                            <th scope="col">Aadhar No.</th>
                            <th scope="col">Contact No.</th>
                            <th scope="col">Email</th>
                            <th scope="col">BloodGroup</th>
                            <th scope="col" class="text-center">Action</th>
                        </tr>
                        <?php if (!empty($receivers)){ 
                          $no=1;?>
                          <?php foreach($receivers as $receiver){ ?>
                            <tr>
                                <td><?=$no?></td>
                                <td><?=$receiver['receiver_name']?></td>
                                <td><?=$receiver['receiver_aadhar']?></td>
                                <td><?=$receiver['receiver_phone']?></td>
                                <td><?=$receiver['receiver_email']?></td>
                                <td><?=$receiver['receiver_bloodgroup']?></td>
                                <td class="text-center">
                                    <a href="<?=base_url('hospital/accept_request/').$receiver['id']?>" class="btn btn-primary mr-2 btn-sm"> 
                                      Accept
                                    </a>
                                    <a href="javascript:void(0);" onclick="deleterequest(<?= $receiver['id']?>)" class="btn btn-danger btn-sm"> 
                                      Reject
                                    </a>
                                </td>
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
  </div>
  <!-- /.content-wrapper -->


<?php $this->load->view('footer'); ?>
