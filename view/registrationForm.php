<?php
  use App\classes\Register;

  // Adding registration services 
  require('../model/classes/register.php');

  // If already loggedIn then redirect to homepage
  if (isset($_SESSION['loggedIn']) || (isset($isLoggedIn) && $isLoggedIn)) {
    Header("Location:http://note.it");
  }

  // If form submitted then validate and register the user.
  if(isset($_POST)) {
    $registerObject = new Register($_POST);
    $isRegistered = $registerObject->registerUser();
    // If registered successfully then redirect to login page in 3 seconds.
    if($isRegistered) {
      Header("Refresh:3; url=http://note.it/pages/loginForm.php");
    }
  }
?>

<html>
  <head>
    <link rel="stylesheet" href="../src/stylesheet/style.css">
    <title>Register</title>
    <script src="../src/scripts/validation.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
  </head>

  <body>
    <form class="form-div" method="POST" onsubmit="return validate()">
      <h3>Register Yourself</h2>
      <span class="error-div" name="registerErr"><?php if(isset($registerObject->message)) echo $registerObject->message ; ?></span>
       <span>

         Name: <span class="error " name="nameerr">*
           </span> <input type="text" name="name" value=<?php if (isset($_POST['name']))
          echo $_POST['name']; ?>>
          </span>
       <span>
         Email: <span class="error " name="mailerr">*
           </span><input type="text" name="mailId" value=<?php if (isset($_POST['mailId']))
          echo $_POST['mailId']; ?>>
          </span> 
       
          <span>
          User Id: <span class="error " name="usererr">*
            </span><input type="text" name="userId" value=<?php if (isset($_POST['userId']))
          echo $_POST['userId']; ?>>
          </span>
        <span>

          Password: <span class="error " name="passerr">*
            </span><input type="password" name="pass" id="pass" value=<?php if (isset($_POST['pass']))
          echo $_POST['pass']; ?>><i class="bi bi-eye-slash " id="togglePassword"></i>
          </span>
        <div class="sp-bw ">
          <input type="submit" class="hover-eff click-eff btn" name="register" value="Regiser User">
          <a class="link-btn grow" href="http://note.it/pages/loginForm.php">Already have account.</a>
        </div>
    </form>
  </body>
</html>
<script src="src/scripts/register.js"></script> 
