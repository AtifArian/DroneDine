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
    <link rel="stylesheet" href="reset.css" />
    <title>Sign Up Page</title>
    </style>
  </head>
  <body>
    <section class="reset-page">
        <form class="info" action="resetpass.php" method="POST">
          <h1 class="text4" >Reset Password</h1><br>
          <label class="text3" for="password">New Password</label><br>
          <input class="inputs" id="password" type="password" name="newpass" placeholder="@1Ab" required><br><br>
          <button type="submit" name="create">Change Password</button>
        </form>
    </section>
  </body>
</html>
