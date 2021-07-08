<?php $this->load->view('header',$user); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper mt-5" style="min-height: 48vh;">
    
    <!-- Main content -->
    <div class="content">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header bg bg-primary">Add Blood Group</div>
            <form action="<?= base_url('hospital/add_blood/').$user_id;?>"  method="post" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="form-group">
                        <label for="bloodgroup">Select Available BloodGroup</label>
                        <select name="bloodgroup" id="bloodgroup" placeholder="Select Your Bloodgroup" class="form-control <?=(form_error('bloodgroup')!='')? 'is-invalid' : '' ; ?>">
                        <option value="" disabled selected>-- Bloodgroup Type --</option> 
                        <option value="A+" <?=set_select('bloodgroup','A+',false)?>>A+</option>
                        <option value="A-" <?=set_select('bloodgroup','A-',false)?>>A-</option>
                        <option value="B+" <?=set_select('bloodgroup','B+',false)?>>B+<option>
                        <option value="B-" <?=set_select('bloodgroup','B-',false)?>>B-</option>
                        <option value="AB+" <?=set_select('bloodgroup','AB+',false)?>>AB+</option>
                        <option value="AB-" <?=set_select('bloodgroup','AB-',false)?>>AB-</option>
                        <option value="O+"<?=set_select('bloodgroup','O+',false)?> >O+<option>
                        <option value="0-" <?=set_select('bloodgroup','O-',false)?>>O-<option>          
                        </select> 
                        <?= form_error('bloodgroup');?>
                    </div>
                    <div class="form-group">
                        <label for="units">No. of Units Available</label>
                        <input type="number" name="units" min="1" max="500" id="units" value="<?=set_value('units')?>" placeholder="Enter no. of available Units" value="" class="form-control <?=(form_error('units')!= "" ) ?'is-invalid' :'';?>">
                        <?= form_error('units');?>
                    </div>
                    <div class="form-row mt-3">
                        <div class="form-group mr-3">
                        <button type="submit" class="btn btn-primary">Submit</a>
                        </div>
                    </div>
                </div>
            </form>
            </div>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
  <!-- /.content-wrapper -->


<?php $this->load->view('footer'); ?>
