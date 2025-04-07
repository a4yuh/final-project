<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up - Wolves Games</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-5">
    <h2 class="text-center">Create an Account</h2>
    <?php if(isset($validation)): ?>
      <div class="alert alert-danger">
        <?= $validation->listErrors() ?>
      </div>
    <?php endif; ?>
    <form action="<?= base_url('/user/register') ?>" method="POST">
      <div class="mb-3">
        <label for="username" class="form-label">Full Name</label>
        <input type="text" class="form-control" id="username" name="username" required>
      </div>
      <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" class="form-control" id="email" name="email" required>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password" required>
      </div>
      <div class="mb-3">
        <label for="password_confirm" class="form-label">Confirm Password</label>
        <input type="password" class="form-control" id="password_confirm" name="password_confirm" required>
      </div>
      <button type="submit" class="btn btn-success w-100">Sign Up</button>
    </form>
    <p class="text-center mt-3">Already have an account? <a href="<?= base_url('/login') ?>">Login here</a></p>
  </div>
</body>
</html>
