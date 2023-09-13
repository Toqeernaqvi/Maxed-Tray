<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" type="text/css" href="./login.css">

  <title>Login | Maxed Tray</title>
</head>

<body>
  <main class="login">
    <!-- Show Request Response -->
    <?php if (isset($_GET['success'])) { ?> <p class="success"><?php echo $_GET['success']; ?></p> <?php } ?>
    <?php if (isset($_GET['error'])) { ?> <p class="error" style="color: red;"><?php echo $_GET['error']; ?></p> <?php } ?>

    <section class="form-section">
      <h1>Login</h1>
      <p class="login-subtitle">Login with your credential information</p>
      <form class="login-form" action="login.php" method="post">
        <label>
          <p>Email</p>
          <input type="email" name="email" placeholder="Enter your email" />
        </label>
        <label>
          <p>Password</p>
          <input type="password" name="password" placeholder="Create a password" />
        </label>
        <button type="submit">Login</button>
      </form>
      <p class="signup-link">
        Don't have an account? <a href="#">Sign up</a>
      </p>
    </section>
  </main>
</body>

</html>