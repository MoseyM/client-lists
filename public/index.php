<?php
session_start();
//set src application path
define("SRC_PATH", dirname(__DIR__).DIRECTORY_SEPARATOR.'src');

//set the public application path
define("PUBLIC_PATH",  dirname(__DIR__).DIRECTORY_SEPARATOR.'public');

  //include the routing file
  require SRC_PATH.DIRECTORY_SEPARATOR."Routing.php";
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="theme-color" content="#000000">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Clientele</title>
  </head>
  <body>
    <div class="container">
      <nav class="navbar justify-content-between">
        <a class="navbar-brand">Clientele</a>
        <ul class="nav justify-content-end">
          <?php if(isset($_SESSION['user'])): ?>
            <li class="nav-item">
              <span class="navbar-text">Hello, <?php echo ucwords($_SESSION['user']['username']) ?>!</span>
            </li> 
            <li class="nav-item">
              <a class="nav-link" href="logout.php">Logout</a>
            </li>  
          <?php endif; ?>
        </ul>
      </nav>
      <div class="row">
        <div class="col text-center">
          <?php 
            if (isset($_SESSION['user'])){
                getClientListPage();
            } else {
                getLogin();
            }
          ?>
        </div>
      </div>
    </div>
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>
    <?php if(isset($_SESSION['user'])): ?>
      <script src="js/client.js"></script>
    <?php endif; ?>
  </body>
</html>
