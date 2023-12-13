<?php
  require_once '../Controller/nudes.php';
  require_once '../model/User.php';

    $pass=$_SESSION['Password'];
    $register=null;
    $lc= new registerC;
    $email=$_SESSION['Email'];
    $name=$_SESSION['Username'];
    $img=$_SESSION['img'];
    if (isset($_POST["password"])&&(!empty($_POST["password"]))&& isset($_POST["confirmPassword"])&&(!empty($_POST["confirmPassword"]))){
      $password=($_POST["password"]);
      $cpassword=($_POST["confirmPassword"]);
      if(($password!=$pass)&&($cpassword==$password))
      {
        $register = new register(
          $name,
          $email,
          $password,
          $img
        );
        $lc->UpdateUser($register);

        echo '<meta
        http-equiv="refresh"
        content="0;
        url=http://localhost/shit/view/login.php"
        />'; 
      }
    }

   echo ' <div class="mainDiv">
        <link rel="stylesheet" href="reset.css">
        <script src="../controller/verif.js"></script>
        <div class="cardStyle">
          <form action="http://localhost/shit/view/resetpass.php" method="post" name="signupForm" id="signupForm">
            
            <img src="" id="signupLogo"/>
            
            <h2 class="formTitle">
              Reset your password
            </h2>
            
          <div class="inputDiv">
            <label class="inputLabel" for="password">New Password</label>
            <input type="password" id="password" name="password" required>
          </div>
            
          <div class="inputDiv">
            <label class="inputLabel" for="confirmPassword">Confirm Password</label>
            <input type="password" id="confirmPassword" name="confirmPassword">
          </div>
          
          <div class="buttonWrapper">
            <button type="submit" id="submitButton" class="submitButton pure-button pure-button-primary">
              <span>Continue</span>
              <span id="loader"></span>
            </button>
          </div>
            
            </form>
        </div>
      </div>';