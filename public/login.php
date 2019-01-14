<?php 
require_once SRC_PATH.DIRECTORY_SEPARATOR.'HandleLogin.php';

if(isset($errors) && count($errors)): ?>
  <div class="alert alert-danger" role="alert">
    <?php foreach($errors as $error): ?>
      <p><?php echo $error; ?></p> 
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<form method="post" action="index.php">
  <div class="form-group">
    <label for="exampleInputEmail1">Username</label>
    <input type="text" class="form-control" name="username" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" name="password" class="form-control" required>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
