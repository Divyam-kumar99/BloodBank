   <!-- footer  -->
   <footer class="bg-light py-4 mb-0">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-5">
            <img src="<?=base_url('public/images/logo.png')?>" width="200" height="100" alt="">
            <small class="text-muted"><br>
              Khandagiri Square <br>
              Bhubaneswar-751003 <br>
              support@Bloodbank.com <br>
              Phone: +91 123 456 7890
            </small>
          </div>
          <div class="col-sm-12 col-12 col-md-4 pt-4">
            <h5>Important Links</h5>
            <ul class="list-unstyled text-small pt-3">
              <li><a href="https://mail.google.com/mail/?view=cm&fs=1&to=support@Bloodbank.com" target="_blank" class="text-muted">Support</a></li>
              <li><a href="<?=base_url('home/services')?>" class="text-muted">Services </a></li>
              <li><a href="<?=base_url('home/index')?>" class="text-muted">All Blood Samples</a></li>
            </ul>
          
          </div>
          <div class="col-sm-12 col-md-3 pt-4">
            <h5>My Accounts</h5>
              <ul class="list-unstyled text-small pt-3">
                <li><a href="<?=base_url('login')?>" class="text-muted">Login</a></li>
                <li><a href="<?=base_url('login/register_hospital')?>" class="text-muted">Register Hospital</a></li>
              </ul>
          </div>
          
        </div>
      </div>
    </footer>
    <script src="<?=base_url('assets/js/jquery.js')?>"></script>
    <script src="<?=base_url('assets/js/bootstrap.min.js')?>"></script>
    
<script language="JavaScript" type="text/javascript">
  $(document).ready(function(){
    $('.carousel').carousel({
      interval: 2000
    })
  }); 
  function deleterequest(id){
    // console.log(id);
    if(confirm("Are you sure you want to delete this Request")){
      window.location.href='<?=base_url('hospital/reject_request/')?>'+id;
    }
  }   
</script>
  </body>
</html>
