<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | Mahakali Web Technology</title>

    <!-- Bootstrap -->
    <link href="<?php echo base_url(); ?>public/specialadmin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="<?php echo base_url(); ?>public/specialadmin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="<?php echo base_url(); ?>public/specialadmin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="<?php echo base_url(); ?>public/specialadmin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="<?php echo base_url(); ?>public/specialadmin/build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

 


      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
		  
          <?php  echo $this->session->flashdata('error'); ?>
          <?php echo validation_errors('<div class="alert alert-danger" style="color:#FFF">','</div>'); ?>
           <?php echo form_open('specialadmin/login/index'); ?>
              <h1>Mahakali Web Technology</h1>
              <div>
                <input type="email" name="emailid" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
				
                <input type="password" name="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
				<button type="submit" class="btn btn-default submit">LOGIN</button>
              
                
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                

               
                <br />

                <div>
                  <p>©2018 All Rights Reserved Mahakali Web Technology.</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2017 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
	