<?php
use App\Model\Classes\DbHelper;
require('../../vendor/autoload.php');
// Creating Obj of Database helper class.
$db= new DbHelper();
  if(isset($_REQUEST['add'])) {
    $db->setStock($data);
  }

?>