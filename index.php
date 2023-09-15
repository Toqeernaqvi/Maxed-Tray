<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="./login.css">
  <script src="./src/login.js" defer></script>

  <title>Login | Maxed Tray</title>
</head>

<body>
  <main class="login">
    <!-- Show Request Response
    <?php if (isset($_GET['success'])) { ?> <p class="success"><?php echo $_GET['success']; ?></p> <?php } ?>
    <?php if (isset($_GET['error'])) { ?> <p class="error-msg" style="color: red;"><?php echo $_GET['error']; ?></p> <?php } ?> -->

    <section class="form-section">
      <h1>Login</h1>
      <p class="login-subtitle">Login with your credential information</p>
      <p class="error-msg"></p>
      <form class="login-form" action="login.php" method="post">
        <label>
          <p>Email</p>
          <input type="email" name="email" placeholder="Enter your email" required/>
        </label>
        <label class="pass-container">
          <p>Password</p>
          <input type="password" name="password" placeholder="Create a password" required/>
          <img src="./assets/icons/eye.svg" alt="eye icon" class="open-eye">
          <img src="./assets/icons/close-eye.svg" alt="close eye icon" class="close-eye hidden">  
          </div>
        </label>
        <button type="submit">Login</button>
      </form>
      <p class="signup-link">
        Don't have an account? <a href="signup.php">Sign up</a>
      </p>
    </section>
  </main>
</body>

</html>