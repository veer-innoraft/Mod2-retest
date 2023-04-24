<?php
namespace App\Model\Classes;
use \PDO;

/**
 * Provide more functionality for database interactions.
 * 
 */
class DbHelper extends DbConnect
{
  /**
   * Checks if user's user_id exists. 
   * 
   *  @param string $userId
   *    Stores the user Id string.
   *  
   *  @return bool
   *    Returns TRUE if user exists ,else FALSE.
   */
  public function existsUserId(string $userId):bool
  {
    $queryStirng = "select user_id from `stock_users` where `user_id`='{$userId}'";
    $sql = $this->conn->prepare($queryStirng);
    $sql->execute();
    return $sql->fetchAll();
  }

  /**
   * Returns the password of userId. 
   * 
   *  @param string $userId
   *    Stores the user Id string.
   *  
   *  @return string
   *    Returns TRUE if user exists ,else FALSE.
   */
  public function getPass(string $userId):string
  {
    $queryStirng = "select pass from `stock_users` where `user_id`='{$userId}'";
    $sql = $this->conn->prepare($queryStirng);
    $sql->execute();
    return $sql->fetch(PDO::FETCH_ASSOC)['pass'];
  }

  /**
   * Set user by provided data. 
   * 
   *  @param array $userData
   *    Stores the user data array.

   */
  public function setUser(array $userData):void
  {
    if ($this->validUserId($userData['userId']) && $this->onlyAlpha($userData['name'])) {
      $queryStirng = "INSERT INTO `stock_users` (`user_id`,`name`,`pass`) 
      VALUES ('{$userData['userId']}','{$userData['name']}','Passw0rd@')";
      $sql = $this->conn->prepare($queryStirng);
      $sql->execute();
    }
    else {
      echo "Fill the form properly";
    }
  }

    /**
   * Set stock by provided data. 
   * 
   *  @param array $postData
   *    Stores the user data array.

   */
  public function setStock(array $postData):void
  {
      $queryStirng = "INSERT INTO `stocks` (`user_id`,`name`,`pass`) 
      VALUES ('{$postData['userId']}','{$postData['name']}','Passw0rd@')";
      $sql = $this->conn->prepare($queryStirng);
      $sql->execute();
  }

  /**
   * Returns the password of userId. 
   * 
   *  @param string $userId
   *    Stores the user Id string.
   *  
   *  @return object
   *    Returns TRUE if user exists ,else FALSE.
   */
  public function getStocks():object
  {
    $queryStirng = "select * from `stocks`";
    $sql = $this->conn->prepare($queryStirng);
    $sql->execute();
    return $sql->fetchALL(PDO::FETCH_ASSOC);
  }

  /** 
   * Checks if a string only contains alphabets and whitespaces.
   * 
   *  @param string $str
   *    Stores the string to varify.
   * 
   *  @return bool
   *    return true is string contains only alphabet else false. 
   * 
   **/
  public function onlyAlpha(string $str):bool
  {
    if (preg_match("/^[a-zA-Z-' ]*$/", $str)) {
      return TRUE;
    }
    return FALSE;
  }

  /** 
   * Fucntion to check the string only has digits.
   * 
   *  @param string $str
   *    Stores the string to varify. 
   *  
   *  @return bool
   *    Return true is string contains only digits else false. 
   *
   **/
  public function onlyDigit(string $str):bool
  {
    if (preg_match("/^[1-9][0-9]{0,15}$/", $str)) {
      return TRUE;
    }
    return FALSE;
  }

  /**
   * Checks if Mail Id is valid or not using RegEx.
   * 
   *  @param string $mailId
   *    Stores the Mail Id of the user. 
   * 
   *  @return bool
   *    Return true is mail id is valid  else false. 
   * 
   **/
  public function validMailId(string $mailId):bool
  {
    if (preg_match('/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix', $mailId)) {
      return TRUE;
    }
    return FALSE;
  }

  /**
   * Checks if user Id is valid or not using RegEx.
   * 
   *  @param string $userId
   *    Stores the Mail Id of the user. 
   * 
   *  @return bool
   *    Return true is user id is valid  else false. 
   * 
   **/
  public function validUserId(string $userId):bool
  {
    if (preg_match('/^[a-zA-Z0-9\s]+$/', $userId)) {
      return TRUE;
    }
    return FALSE;
  }
}
?>
