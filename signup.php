<!DOCTYPE html>
<html>

<head>
     <title>SIGN UP</title>
     <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
     <form action="signup-check.php" method="post">
          <h2>SIGN UP</h2>
          <?php if (isset($_GET['error'])) { ?>
               <p class="error"><?php echo $_GET['error']; ?></p>
          <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

          <label>Name</label>
          <?php if (isset($_GET['name'])) { ?>
               <input type="text" name="name" placeholder="Name" value="<?php echo $_GET['name']; ?>"><br>
          <?php } else { ?>
               <input type="text" name="name" placeholder="Name"><br>
          <?php } ?>

          <label>Email</label>
          <input type="email" name="email" placeholder="email"><br>

          <label>Password</label>
          <input type="password" name="password" placeholder="Password"><br>

          <label>Confirm Password</label>
          <input type="cpassword" name="cpassword" placeholder="cPassword"><br>


          <label>Registration Key</label>
          <input type="text" name="registration_key" placeholder="Registration Key"><br>

          <button type="submit">Sign Up</button>
          <a href="index.php" class="ca">Already have an account?</a>
     </form>
</body>

</html>