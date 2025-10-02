<?php
  session_start();
  $login_error = isset($_SESSION['login_error']) ? $_SESSION['login_error'] : '';
  unset($_SESSION['login_error']); // Clear the error after displaying
?>

    <div class="main-wrapper account-wrapper">
      <div class="account-page">
        <div class="account-center">
          <div class="account-box">
            <form
              action="src/auth/authenticate.php"
              method="POST"
              class="form-signin"
            >
              <div class="account-logo">
                <a href="../../"
                  ><img src="assets/img/logo-dark.png" alt=""
                /></a>
              </div>
              
              <?php if ($login_error): ?>
                <div class="alert alert-danger" role="alert">
                  <?php echo htmlspecialchars($login_error); ?>
                </div>
              <?php endif; ?>
              
              <div class="form-group">
                <label>Email</label>
                <input type="email" name="email" autofocus="" class="form-control" required />
              </div>
              <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required />
              </div>
              
              <div class="form-group text-right">
                <a href="?page=auth&forgot_password">Forgot your password?</a>
              </div>
              <div class="form-group text-center">
                <button type="submit" class="btn btn-primary account-btn">
                  Login
                </button>
              </div>
              <div class="text-center register-link">
                Don't have an account? <a href="?page=auth&register">Register Now</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>