<?php
  include('Database.php')
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
        <form class="info" action="signup.php" method="POST">
          <h1 class="text4" >Create Your Account</h1><br>
          <label class="text3" for="Full Name">Full Name</label><br>
          <input class="inputs" id="Full Name" type="text" name="name" placeholder="Full Name" required><br><br>
          <label class="text3" for="email">Email</label><br>
          <input class="inputs" id="email" type="text" name="email" placeholder="E-mail" required><br><br>
          <label class="text3" for="password">Password</label><br>
          <input class="inputs" id="password" type="password" name="pass" placeholder="@1Ab" required><br><br>
          <label class="text3" for="phone">Phone</label><br>
          <input class="inputs" id="phone" type="text" name="phone" placeholder="Enter Phone No." required><br><br>
          <label class="text3" for="area">Area</label><br>
          <input class="inputs" id="area" type="text" name="area" placeholder="Area" required><br><br>
          <label class="text3" for="city">City</label><br>
          <input class="inputs" id="city" type="text" name="city" placeholder="City" required><br><br>
          <label class="text3"  for="street">Street</label><br>
          <input class="inputs" id="street" type="text" name="street" placeholder="Street" required><br><br>
          <label class="text3" for="type">Type</label><br>
          <select class="inputs" id="type" name="admin">
            <option value=1>Admin</option>
            <option value=0>Customer</option>
          </select><br><br>
          <button type="submit" name="create">Sign Up</button>
        </form>
    </section>

  </body>
</html>
