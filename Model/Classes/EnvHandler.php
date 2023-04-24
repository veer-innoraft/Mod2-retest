<?php
  namespace App\Model\Classes;
  use Dotenv\Dotenv;
  /**
   * Handles secret credentials using PHP-DOTENV.
   */
  class EnvHandler {
    /**
     * @var array
     *  Stores the credentials from enviromental variables using DotEnv 
     * */  
    protected $credential;

    /**
     * Loads the secret credentials to the global variable $credential.
     */
    public function __construct()
    {
      // Loading .env credentials.
      $dotEnv = Dotenv::createImmutable(__DIR__);
      $dotEnv->safeLoad();
      $this->credential=$_ENV;
    }
  }
?> 