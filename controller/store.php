<?php
                  
      session_start();

      echo "Helo world!";

      include('../env/db_connect.php');

      function createPost($title, $description, $author, $attach, $conn){
            // we will work with attach later  '$attach'
          $query = "INSERT INTO posts (title, description, author) VALUES ('$title', '$description', '$author' )";
          if(mysqli_query($conn, $query)){
              return "Your post has been created successfully";
          } else {
              return mysqli_error($conn);
          }
      }

      if (isset($_POST["submit"])){
         $title = $_POST["title"];
         $description = $_POST["description"];
         $author =  $_SESSION['current_user'];
         $attach = $_POST["attach"];


         $_SESSION['err_title'] =  empty($title) ?  "A title is required" : "";
         $_SESSION['err_description']=  empty($description) ?  "A description is required" : (
                  strlen($description) > 500 ? "Description should be less than 500 char" : ""
         );
         $_SESSION['err_author']=  empty($author) ?  "An author name is required" : "";
         $_SESSION['err_attach']=  empty($attach) ?  "An attachment is required" : "";
          

         /*
            echo $_SESSION['err_title'];
            echo $_SESSION['err_description'];
            echo $_SESSION['err_author'];
            echo $_SESSION['err_attach'];
         */

         if (  $_SESSION['err_title'] or  
               $_SESSION['err_description'] or 
               $_SESSION['err_author'] or  
               $_SESSION['err_attach']){
               header("Location: ../new_article.php");
         } else {
               $res  = createPost($title,  $description, $author, $attach, $conn);
               $_SESSION['post_added'] = $res;
               header("Location: ../newsfeed.php");
         }
         

      }
?>