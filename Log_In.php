<?php
  include('Database.php')
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styleguide.css" />
    <link rel="stylesheet" href="style.css" />
    <title>Login Page</title>
  </head>
  <body>
    <div class="login-page">
      <div class="overlap-wrapper">
        <div class="overlap">
          <div class="rectangle"></div>
          <div class="navigation-footer">
            <div class="items">
              <div class="frame"><div class="text-wrapper">About Us</div></div>
              <div class="div">Store</div>
              <div class="div">Blog</div>
              <div class="div">Help</div>
            </div>
            <div class="items-2">
              <div class="text-wrapper-2">Privacy Policy</div>
              <div class="div">Complaints Policy</div>
              <div class="div">Order Policy</div>
              <div class="div">Return Policy</div>
            </div>
            <div class="items-3">
              <div class="text-wrapper-2">Terms &amp; Conditions</div>
              <div class="div">Terms of Service</div>
              <div class="div">Partner Policy</div>
              <div class="div">Become an Affiliate</div>
            </div>
            <div class="text-wrapper-3">&copy; Drone Dine</div>
          </div>
          <div class="overlap-group-wrapper">
            <div class="overlap-group">
              <p class="p">Description Bada Bing Bada Bong</p>
              <div class="text-wrapper-4">Drone Dine</div>
            </div>
          </div>
          <div class="right"> <!-- Login Form -->
            <form action="login.php" method="POST" class="frame-2">
              <div class="text-wrapper-5"><a href="forgot_password.php">Forgot Password?</a></div>
              <div class="overlap-2">
                <input
                  type="password"
                  name="password"
                  class="rectangle-3"
                  placeholder="Password"
                  required
                />
              </div>
              <div class="overlap-3">
                <input
                  type="text"
                  name="email"
                  class="rectangle-4"
                  placeholder="Email"
                  required
                />
              </div>
              <button type="submit" class="overlap-group-2">
                <div class="rectangle-2"></div>
                <div class="text-wrapper-6">LOG IN</div>
              </button>
              <div class="text-wrapper-9">Log in</div>
            </form>
          </div>
          <div class="text-wrapper-10"><a href="sign_up.php">Sign up</a></div>
        </div>
      </div>
    </div>
  </body>
</html>
