<!doctype html>
<html lang='en'>
  <head>
    <!-- Required meta tags -->
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1, shrink-to-fit=no'>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="<?=base_url('assets/fontawesome-free/css/all.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/bootstrap.min.css')?>">
    <title> Blood Bank </title>
    <style>
        .invalid-feedback{
            display:block;
        }
    </style>
  </head>
  <body>
    <div class="container-fluid themer" >
    <header>
      <div class="container-fluid">
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <img src="<?=base_url('public/images/logo.png')?>" width="200" height="100" class="mt-3 ml-3" alt="">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
      
          <div class="collapse navbar-collapse right-align" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item mr-3 <?= (!empty($nav) && $nav=='home')? 'active' : '';?>">
                <a class="nav-link" href="<?=base_url('home/index');?>">Home</a>
              </li>
              <li class="nav-item mr-3 <?= (!empty($nav) && $nav=='services')? 'active' : '';?>">
                <a class="nav-link" href="<?=base_url('home/services')?>"> Services </a>
              </li>
              <?php if(empty($user)){?>
                <li class="nav-item mr-3 <?= (!empty($nav) && $nav=='login')? 'active' : '';?>">
                  <a class="nav-link" href="<?=base_url('login')?>" > Sign-in </a>
                </li>
              <?php }else{
                if($user['role']=="Hospital"){?>
                <li class="nav-item mr-3 <?= (!empty($nav) && $nav=='addblood')? 'active' : '';?>">
                  <a class="nav-link" href="<?=base_url('hospital/add_blood/').$user['user_id']?>" > Add Blood Sample </a>
                </li> 
                <li class="nav-item mr-3 <?= (!empty($nav) && $nav=='viewrequest')? 'active' : '';?>">
                  <a class="nav-link" href="<?=base_url('hospital/view_request/').$user['user_id']?>" > View Request </a>
                </li> 
              <?php }?>
                <li class="nav-item mr-3">
                  <a class="nav-link" href="<?=base_url('logout')?>" > Logout </a>
                </li>
              <?php }?>
            
            </ul>
          </div>
        </nav>
      </div> <!-- end of container   -->
    </header>