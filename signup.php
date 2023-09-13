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

        <?php if (isset($_GET['error'])) { ?>
               <p class="error"><?php echo $_GET['error']; ?></p>
          <?php } ?>

          <?php if (isset($_GET['success'])) { ?>
               <p class="success"><?php echo $_GET['success']; ?></p>
          <?php } ?>

        <form class="signup-form" action="signup-backend.php" method="post">
          
            <input type="text" placeholder="Full Name"  name="name" />
          
            <input type="email" placeholder="Email Address"  name="email" />
          
            
            <input type="password" placeholder="Password"   name="password" />
            
            <input type="password" placeholder="Confirm password"   name="cpassword"/>
            
            <input type="text"  name="registration_key" placeholder="Registration Key"   name="cpassword"/>

            <p>
              <input type="checkbox">
              <small>By Continuing you agree to our  <a href="#">Terms of conditions</a> &<a href="#"> Privacy policy</a></small>
            </p>
            <button type="submit" >Sign Up</button>
        </form>
        <p class="signup-link">
          Already have an account? <a href="./index.php">Log in</a>
        </p>
      </section>
    </main>
  </body>
</html>
