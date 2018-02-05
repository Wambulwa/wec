<!doctype html>
<html class="no-js" lang="">

<body class="page-loading">
  <!-- page loading spinner -->
  <div class="pageload">
    <div class="pageload-inner">
      <div class="sk-rotating-plane"></div>
    </div>
  </div>
  <!-- /page loading spinner -->
  <div class="app signup usersession">
    <div class="session-wrapper">
      <div class="page-height-o row-equal align-middle">
        <div class="column">
          <div class="card bg-white no-border">
            <div class="card-block">
              <form role="form" class="form-layout" method="post" action="<?php echo base_url('signin/register');?>">
                <div class="text-center m-b">
                  <h4 class="text-uppercase">Register Now</h4>
                  <p>Join a growing community</p>
                </div>
                <div class="form-inputs">
                  <div class="name">
                    <label class="text-uppercase">Name</label>
                    <input type="text" class="form-control input-lg first" placeholder="First" name="fname" required>
                    <input type="text" class="form-control input-lg" placeholder="Last" name="lname" required>
                  </div>
                  <label class="text-uppercase">Your willfreight email address</label>
                  <input type="email" class="form-control input-lg" placeholder="yourname@willfreight.co.ke" name="email" required>
<!--                   <label class="text-uppercase">Choose your username</label>
                  <input type="text" class="form-control input-lg" placeholder="Your email will be used here" required disabled=""> -->
                  <label class="text-uppercase">Create a password</label>
                  <input type="password" class="form-control input-lg" name="password" placeholder="Password" required>
<!--                   <label class="text-uppercase">Confirm your password</label>
                  <input type="password" class="form-control input-lg" placeholder="Confirm password" required> -->
                </div>
                <button class="btn btn-primary btn-block btn-lg m-b" type="submit">Create Account</button>
                <p class="text-center"><small><em>By clicking Create account you agree to our <a href="#">terms and conditions</a></em></small>
                </p>
               <a href="<?php echo base_url('signin');?>"><p class="text-left" ><small><em><strong><-</strong>Back to login</em></small></p></a>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- bottom footer -->
    <footer class="session-footer">
      <nav class="footer-right">
        <ul class="nav">
          <li>
            <a href="javascript:;">Feedback</a>
          </li>
          <li>
            <a href="javascript:;" class="scroll-up">
              <i class="fa fa-angle-up"></i>
            </a>
          </li>
        </ul>
      </nav>
      <nav class="footer-left hidden-xs">
        <ul class="nav">
          <li>
            <a href="javascript:;"><span>About</span> Reactor</a>
          </li>
          <li>
            <a href="javascript:;">Privacy</a>
          </li>
          <li>
            <a href="javascript:;">Terms</a>
          </li>
          <li>
            <a href="javascript:;">Help</a>
          </li>
        </ul>
      </nav>
    </footer>
    <!-- /bottom footer -->
  </div>
