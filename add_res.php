<?php
    include "Database.php";
    session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <link rel="stylesheet" href="admin.css">
    <title>Sign Up Page</title>
  </head>
  <body>
  <div class="sidebar">
        <h2>Restaurant Admin</h2>
        <ul>
            <li><a href="My_Restaurants.php">My Restaurants</a></li>
            <li><a href="menu.php">Manage Menu</a></li>
            <li><a href="branches.php">Manage Branches</a></li>
        </ul>
    </div>
    <section class="res_signup">
        <form class="info" action="add_res_backend.php" method="POST">
          <h1 class="text4" >Add a Restaurant</h1><br>
          <label class="text3" for="rName">Restaurant Name</label><br>
          <input class="inputs" id="rName" type="text" name="name" placeholder="Restaurant Name" required><br><br>
          <label class="text3" for="email">Email</label><br>
          <input class="inputs" id="email" type="text" name="email" placeholder="E-mail" required><br><br>
          <label class="text3" for="phone">Phone</label><br>
          <input class="inputs" id="phone" type="text" name="phone" placeholder="Enter Phone No." required><br><br>
          <button type="submit" name="create">Sign Up</button>
        </form>
    </section>

  </body>
</html>
