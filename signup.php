<!-- <!DOCTYPE html>
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
          <a href="index.html" class="ca">Already have an account?</a>
     </form>
</body>

</html> -->

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
     <link rel="stylesheet" type="text/css" href="signup.css">

    <title>Signup | Maxed Tray</title>
  </head>
  <body>
    <!-- <nav>
      <h2>WWW.IMAGESPLITTER.COM</h2>
    </nav> -->
    <main class="signup">
     <h1>Think Bigger, Go Large with the <br> Maxed Tray</h1>
      <section class="form-section">
        <h2>Create new account</h2>
        <p class="signup-subtitle">
          Please create your new account to continue.
        </p>
        <form class="signup-form">
          
            <input type="text" placeholder="Full Name" />
          
            <input type="email" placeholder="Email Address" />
          
            <input type="password" placeholder="Password" />
          
            <input type="password" placeholder="Confirm password" />

            <p>
              <input type="checkbox">
              <small>By Continuing you agree to our  <a href="#">Terms of conditions</a> &<a href="#"> Privacy policy</a></small>
            </p>
          <button>Sign up</button>
        </form>
        <p class="signup-link">
          Already have an account? <a href="./index.php">Log in</a>
        </p>
      </section>
    </main>
  </body>
</html>
