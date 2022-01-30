<?php
  date_default_timezone_set('Asia/Dhaka');
?>



<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet"> 
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.4/css/fontawesome.min.css" integrity="sha384-jLKHWM3JRmfMU0A5x5AkjWkw/EYfGUAGagvnfryNV3F9VqM98XiIH7VBGVoxVSc7" crossorigin="anonymous">
    <link rel="stylesheet" href="./controller/article.css">
    <?php 
        if (isset($_SESSION['theme'])) {
           if ($_SESSION['theme']== 1){
              echo '<link rel="stylesheet" href="./controller/style.css">';
           }
           else {
              echo '<link rel="stylesheet" href="./controller/black.css">';
           }
        }
        else {
          echo '<link rel="stylesheet" href="./controller/style.css">';
        }
    ?>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light">
  <div class="container">
    <a class="navbar-brand text-primary" href="index.php">
          <span class="text-white d-flex align-items-center justify-content-center">
            <span><img src="./logo/logo1.png" class="img-logo"><span>
            <span class="pl-4 "><u>The Reel</u><span>
          </span>
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse mobile-bar" id="navbarSupportedContent">
        
        <?php if(isset($_SESSION["user_logged_in"]) or isset($_SESSION["user"])): ?>
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">
                <img src="./logo/logout.png" alt="">
                Logout
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="newsfeed.php">
                <img src="./logo/feed.png" alt="">
                Newsfeed
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="new_article.php">
                <img src="./logo/add_post.png" alt="">
                What's your story to up!
              </a>
            </li>
        </ul>
        <form class="d-flex">
            <input class="form-control me-2 search" type="search" placeholder="The lost angel..." aria-label="Search">
            <button class="btn btn-outline-light" type="submit">Search</button>
        </form>
        <?php else: ?>
          <div class="d-flex m-auto justify-content-end">  
              <span style="color:transparent">Lorem ipsum dolor sit amet consectetur adipisicing elit. Modi adipisci autem nostrum ducimus corrupti distinctio </span>
              <button class=" btn btn-outline-light me-2" type="submit">Need help?</button>
              <form action="./controller/change_theme.php" method="POST">
                <div class="form-check form-switch theme mt-1">
                  <input class="form-check-input" type="submit" value="" checked>
                  <label class="form-check-label pl-2 text-warning d-flex align-items-center th_name" for="flexSwitchCheckChecked">
                    <?php 
                        if (isset($_SESSION['theme'])) {
                          if ( $_SESSION['theme'] ) { 
                            echo '&nbsp;Dark&nbsp;&nbsp;&nbsp;&nbsp;'; 
                          } else {  
                            echo '&nbsp;Rainbow'; 
                          }
                        }
                        else {
                          echo '&nbsp;Colorful'; 
                        }
                     ?> 
                  </label>
                </div>
              </form>
          </div>  
        <?php endif ?>
    </div>
  </div>
</nav>

