<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="./login.css">
  <script src="./src/login.js" defer></script>

  <title>Reset Password | Maxed Tray</title>
</head>

<body>
  <main class="pf">
    <!-- Show Request Response -->
    <?php if (isset($_GET['success'])) { ?> <p class="success"><?php echo $_GET['success']; ?></p> <?php } ?>
    <?php if (isset($_GET['error'])) { ?> <p class="error-msg" style="color: red;"><?php echo $_GET['error']; ?></p> <?php } ?>

    <section class="fp-form-section">
      <h1>Reset password</h1>
      <!-- <p class="login-subtitle">Login with your credential information</p> -->
      <p class="error-msg"></p>
      <form class="fp-form" action="reset_password.php" method="post">
        <label>
          <p>Email</p>
          <input type="email" name="email" placeholder="Enter your email" required/>
        </label>
        <label>
          <p>Registration Key</p>
          <input type="text" name="registration_key" placeholder="Enter your key" required/>
        </label>
        <label class="fp-pass-container">
          <p>New Password</p>
          <input type="password" name="password" placeholder="Enter new password" required/>
          <img src="./assets/icons/eye.svg" alt="eye icon" class="open-eye">
          <img src="./assets/icons/close-eye.svg" alt="close eye icon" class="close-eye hidden">  
          </div>
        </label>
        <button type="submit">Reset</button>
      </form>
    </section>
  </main>
</body>

</html>