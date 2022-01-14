<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="<?php echo base_url(); ?>assets/css/styleLogin.css" rel="stylesheet">

    <title>Login</title>
  </head>
  <body>
    <div class="container ">
      <div class="card login-form shadow bg-body rounded">
        <div class="card-body">
          <h2 class="card-title text-center fw-bold">LOGIN</h2>
          <?php 
            $message = $this->session->flashdata('message'); 
            if (isset($message)) { 
              echo '<div class="alert alert-danger" role="alert">'.$message.'</div>';
              $this->session->unset_userdata('message');
            } ?>
            <form role="form" action="<?php base_url();?>login/doLogin" method="post" class="user">
              <div class="mb-3 mt-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" name="username" class="form-control" id="username" placeholder="Your Username">
              </div>
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" id="password" placeholder="Min 5 Character">
              </div>
              <div class="d-grid mx-5 mt-5">
                  <input type="submit" class="btn btn-success btn-login" name="submit" value="Login">
              </div>
            </form>
        </div>
      </div>
    </div>
  </body>
</html>
