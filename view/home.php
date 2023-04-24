<head>
  <link rel="stylesheet" href="../src/stylesheet/style.css">
  
</head>
<?php
  // Use App\Model\Classes\DbHelper;
  use App\Model\Classes\DbHelper;
  require("vendor/autoload.php");

  if (!isset($_SESSION))
    session_start();

  // If not loggedIn then redirect to login page.
  if (!isset($_SESSION['loggedIn'])) {
    header('Location:http://local-stockkeeper.com');
  }
  
  // If user is loggedIn show stocks.
  else {
    $db = new DbHelper;
?>
    <ul class="fd-col">


      <?php 
      foreach ($db->getStocks() as $row) {
        ?>
          <li class="fd-row">
            <span class="name">
              <?php echo $row['name'] ?>
            </span>
      
            <span class="name">
              <?php echo $row['price'] ?>
            </span>
       
            <span class="name">
              <?php echo $row['modified'] ?>
            </span>
      
            <span class="name">
              <?php echo $row['created'] ?>
            </span>
          </li>
        <?php
    if($row['user_id']==$_SESSION['userId']) {?>
      <button class="btn edit-btn">Edit</button>
    <?php } 
    }
  }
?>
</ul>