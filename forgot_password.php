<?php
    include "Database.php";
    session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="globals.css" />
    <link rel="stylesheet" href="styleguide.css" />
    <link rel="stylesheet" href="s.css" />
    <title>Sign Up Page</title>
  </head>
  <body>
    <section class="rectangle">
      <div class="desc">
        <div class="text1">Drone Dine</div>
        <div class="text2">More Description</div>
      </div>
    </section>
    <section class="signup-page">
        <form class="info" action="forgot.php" method="POST">
          <h1 class="text4" >Reset Password</h1><br>
          <label class="text3" for="Full Name">Full Name</label><br>
          <input class="inputs" id="Full Name" type="text" name="name" placeholder="Full Name" required><br><br>
          <label class="text3" for="email">Email</label><br>
          <input class="inputs" id="email" type="text" name="email" placeholder="E-mail" required><br><br>
          <label class="text3" for="phone">Phone</label><br>
          <input class="inputs" id="phone" type="text" name="phone" placeholder="Enter Phone No." required><br><br>
          <button type="submit" name="create">Show Password</button>
        </form>
    </section>

  </body>
</html>
