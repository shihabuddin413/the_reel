<?php

      include('../env/db_connect.php');
                  
      session_start();
 

      function LoginAuth($email, $password, $conn)
      {
          $isExist= false;
          $username= "";
          $query = "SELECT * FROM users" ;
          $resuts = mysqli_query($conn,  $query);
          $allUsers = mysqli_fetch_all($resuts , 1);

      //     echo "<pre>";
      //     print_r($allUsers);
      //     echo "</pre>";
          
          foreach ($allUsers as $key => $value) {
             if ($value['email'] == $email and  $value['password'] == $password){
                  $isExist = true;
                  $username = $value['username'] ;
                  break;
             } 
          }
          return [$isExist, $username];
      }

      if (isset($_POST["submit"])){
         $email = $_POST["email"];
         $password = $_POST["password"];

         $_SESSION['err_email'] =  empty($email) ?  "A email is required" : "";
         $_SESSION['err_password']=  empty($password) ?  "A password is required" : "";

         if (  $_SESSION['err_email'] or  $_SESSION['err_password'] ){
               header("Location: ../index.php");
         } else {
            $result = LoginAuth($email, $password, $conn);
            if ( $result[0] ) { 
                  $_SESSION["user_logged_in"]="$result[1] you're logged in successfully";
                  $_SESSION['current_user'] =  $result[1];
                  header("Location: ../newsfeed.php");
            }
            else {
                  $_SESSION["email_or_password_err"] = "Sorry! Email or password is not correct";
                  header("Location: ../index.php");
            }
            
         }
      }
?>