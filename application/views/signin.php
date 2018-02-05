<body class="page-loading">
  <!-- page loading spinner -->
  <div class="pageload">
    <div class="pageload-inner">
      <div class="sk-rotating-plane"></div>
    </div>
  </div>
  <!-- /page loading spinner -->
  <div class="app signin usersession">
    <div class="session-wrapper">
      <div class="page-height-o row-equal align-middle">
        <div class="column">
          <div class="card bg-white no-border">
            <div class="card-block">
              <form role="form" class="form-layout" action="<?php echo base_url('verify_login');?>" method="post">
                <div class="text-center m-b">
                  <h4 class="text-uppercase">Welcome back</h4>
                  <p>Please sign in to your account</p>
                </div>
                <div class="form-inputs">
                  <label class="text-uppercase">Your email address</label>
                  <input type="email" class="form-control input-lg" name="email" placeholder="Email Address" required>
                  <label class="text-uppercase">Password</label>
                  <input type="password" class="form-control input-lg" name="password" placeholder="Password" required>
                </div>
                <button class="btn btn-primary btn-block btn-lg m-b" type="submit">Login</button>
                <div class="divider">
                  <span>OR</span>
                </div>
                <a class="btn btn-block no-bg btn-lg m-b" href="<?php echo base_url('signin/register');?>">Signup</a>
                <div class="divider">
                  <span style="color: red;"><?php echo validation_errors();?></span>
                </div>                 
                <p class="text-center">
                  <small>
                  <em>By clicking Log in you agree to our <a href="#">terms and conditions</a></em>
                  </small>
                </p>
              </form>
            </div>
            <a ui-sref="user.forgot" class="bottom-link">Forgotten password?</a>
          </div>
        </div>
      </div>
    </div>
    <!-- bottom footer -->