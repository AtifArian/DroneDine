<?php
  include('Database.php');
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
    <section class="signup-page">
        <form class="info" action="resetpass.php" method="POST">
          <h1 class="text4" >Reset Password</h1><br>
          <label class="text3" for="password">New Password</label><br>
          <input class="inputs" id="password" type="password" name="newpass" placeholder="@1Ab" required><br><br>
          <button type="submit" name="create">Sign Up</button>
        </form>
    </section>
  </body>
</html>
