<?php
namespace App\Classes;

use App\Model\Classes\DbHelper;

require("../vendor/autoload.php");

// If already loggedIn then redirect to homepage
if (isset($_SESSION['loggedIn']))
  Header("Location:http://local-stockkeeper.com/view/home.php");

class Register extends DbHelper
{
  public $message = "";
  protected $userData = [];

  function __construct(array $credentials)
  {
    parent::__construct();
    $this->userData = $credentials;
    $message = "Registrattion object created";
  }

  function registerUser()
  {
    // Add the user to the database
    if (isset($this->userData["name"]) && isset($this->userData["mailId"]) && isset($this->userData["userId"]) && isset($this->userData["pass"])) {
      $this->setUser($this->userData);
    }
    return FALSE;
  }
}
?>