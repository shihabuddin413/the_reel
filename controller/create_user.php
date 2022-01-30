<?php

      session_start();
      include('../env/db_connect.php');

      function RegAuth ($username, $email, $password, $conn){

         // Function check the user exist or not? search for email;


          $query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";


          if(mysqli_query($conn, $query)){
              return "Your account have been registered successfully";
          } else {
              return mysqli_error($conn);
          }
      }


      if (isset($_POST["submit"])){
         $username = $_POST["username"];
         $email = $_POST["email"];
         $password = $_POST["password"];
        

         $_SESSION['err_username'] =  empty($username) ?  "A username is required" : "";
         $_SESSION['err_email'] =  empty($email) ?  "A email is required" : "";
         $_SESSION['err_password']=  empty($password) ?  "A password is required" : "";

         if ( $_SESSION['err_username'] or $_SESSION['err_email'] or  $_SESSION['err_password']  ){
               header("Location: ../reg.php");
         } else {
               $result = RegAuth ($username, $email, $password, $conn);
               $_SESSION ["user_added"] = $result;
               $_SESSION["user"] = $username;
               $_SESSION['current_user'] =  $username;
               header("Location: ../newsfeed.php");
         }
      }
?>
