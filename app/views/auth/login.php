<div class="container">
  <h1>Login</h1>
  <form method="POST" action="<?php echo URLROOT; ?>/users/login">
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
      <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>
    </div>
    <div class="form-group">
      <label for="password">Password</label>
      <input type="password" name="password" id="password" class="form-control <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
      <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>
    </div>
    <div class="form-group">
      <input type="submit" value="Login" class="btn btn-primary">
    </div>
  </form>
</div>
