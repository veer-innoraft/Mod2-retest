<?php
  namespace App\controller;

  if (!isset($_SESSION))
    session_start();


  // If already loggedin redirect to Home page.
  if (!isset($_SESSION['loggedIn'])) {
    header("Location:local-StockKeeper.com");
  }

  // If the session loggedIn is set then route pages.
  if (isset($_SESSION['loggedIn'])) {
    switch ($_SERVER['REQUEST_URI']) {
      case "/home":
        include("view/home.php");
        break;
      case "/AddStock":
        include("View/AddStock.php");
        break;
      default:
        include('view/home.php');
        break;
    }
  }
  // If session is not set then show error.
  else {
    echo 'Not logged in';
  }
?>
