<?php
  namespace App\Model\Classes;
  if(!isset($_SESSION))
  session_start();
  require_once('vendor/autoload.php');

  // If already loggedin redirect to Home page.
  if (isset($_SESSION['loggedIn']))
  header("Location:local-StockKeeper.com");

  /**
   * Provides Login functionality to the user.
   * 
   *  @var $userData
   *    Stores users credentials fetched from POST method.
   **/
  class Login extends DbHelper{
    // Stores success or wrror messages.
    public $message;
    // Stores User data coming from POST method.
    protected $userData=[];
    /**
     *  Calling EnvHandler constructor through this class constructor to load credentials.
     */
    public function __construct(array $Credentials){
      parent::__construct();
      if(isset($Credentials)) {
        $this->userData=$Credentials;
      }
    }
    /**
     * Check validations and login User if credentials are valid.
     * 
     *  @return bool 
     *    Returns TRUE if login success else FALSE.
     */
    public function loginUser() {
      if (isset($this->userData['userId']) && isset($this->userData['pass']) 
      && $this->existsUserId($this->userData['userId']) 
      && $this->getPass($this->userData['userId'])==$this->userData['pass']) {
        $_SESSION['loggedIn']=1;
        $_SESSION['userId']=$this->userData['userId'];
        $this->message= ["status"=>"success","text"=>"Logged In Successfully"];
        return TRUE;
      }
      else if (isset($this->userData['userId']) && isset($this->userData['pass']) && ($this->userData['userId']=="" || $this->userData['pass']=="")) {
        $this->message= ["status"=>"error","text"=>"Fill all fields"];
        return FALSE;
      }
      else if (isset($this->userData['userId']) && $this->existsUserId($this->userData['userId'])) {
        $this->message= ["status"=>"error","text"=>"Invalid Password"];
        print_r( $this->getPass($this->userData['userId']));

        return FALSE;
      }
      else if ( isset($this->userData['userId']) && !$this->existsUserId($this->userData['userId']) ) {
        $this->message= ["status"=>"error","text"=>"UserId not registered"];
        return FALSE;
      }
      else {
        return FALSE;
      }
    }
  }

?>
