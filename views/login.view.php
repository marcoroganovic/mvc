<?php
  include "./views/partials/header.php";
?>

<div class="login-form">
  <h3>Login</h3>

  <form method="POST" action"/login">
    <label for="email">Your email</label>
    <input name="email" class="u-full-width" type="email" placeholder="test@mailbox.com" id="email">

    <label for="password">Your password</label>
    <input name="password" class="u-full-width" type="password" id="password" placeholder="Password">

    <input class="button-primary" type="submit" value="Login">
  </form>
</div>

<?php
  include  "./views/partials/footer.php";
?>
