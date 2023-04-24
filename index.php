<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8" />
    <title>Stock Keeper</title>
</head>
<?php require('view/header.php'); ?>
<body>
  <?php 
    if(!isset($_SESSION['loggedIn'])) {
      require('view/loginForm.php');
    } 
    else {
      require('controller/route.php');
    }
    ?>
</body>
</html>
