<?php 
    session_start();

    include('./env/db_connect.php');

    $query = "SELECT * FROM posts" ;
    $resuts = mysqli_query($conn,  $query);
    $Posts = mysqli_fetch_all($resuts , 1);


    
    //     echo "<pre>";
    //     print_r($allUsers);
    //     echo "</pre>";

?>


<!DOCTYPE html>
<html lang="en">

<?php include('./template/head.php'); ?>

    <!-- post -->

    <?php if(isset($_SESSION["user_added"])): ?>
        <div class="toast_parent">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                <div class="toast-header">
                <strong class="me-auto">The Reel</strong>
                <small> Just now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body">
                    <?=  $_SESSION["user_added"]; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(isset($_SESSION["user_logged_in"])): ?>
        <div class="toast_parent">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                <div class="toast-header">
                <strong class="me-auto">The Reel</strong>
                <small> Just now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-success">
                    <?=  $_SESSION["user_logged_in"]; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if(isset($_SESSION["post_added"])): ?>
        <div class="toast_parent">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                <div class="toast-header">
                <strong class="me-auto">The Reel</strong>
                <small> Just now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-success">
                    <?= $_SESSION["post_added"]; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>


    <?php foreach ($Posts as $key => $value) : ?>

      <div id="<?php ?>" class="container mt-5 mb-5 article_container ">
        <div class="row d-flex align-items-center justify-content-center ">
            <div class="col-md-6 article">
                <div class="card">
                    <div class="d-flex justify-content-between p-2 px-3">
                        <div class="d-flex flex-row align-items-center">
                            <img src="<?= $value['attachment']; ?>" width="50" class="rounded-circle mr-2">
                            <div class="d-flex flex-column ml-2 pl-2"> 
                                <span class="font-weight-bold mr-2">&nbsp; <?= $value['author']; ?> </span> 
                                <small class="text-danger mr-2">&nbsp; The reel </small> 
                            </div>
                        </div>
                        <div class="d-flex flex-row mt-1 ellipsis">
                             <small class="mr-2 text-warning"> <?= $value['created_at']; ?> </small> 
                        </div>
                    </div> 
                    <?php if ($value['attachment'] != 'default_post.jpg') : ?>
                        <img src="./logo/bg1.jpg" class="img-fluid">
                    <?php endif; ?>
                    <div class="p-2">
                        <h4 class="text-info" >
                            <?= $value['title'];  ?>
                        </h4>
                        <p class="text-justify">
                            <?= $value['description']; ?>
                        </p>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-row icons d-flex align-items-center"> 
                                <i class="fa fa-heart"></i> 
                            </div>
                            <div class="d-flex flex-row muted-color">
                                 <span class="text-info" >0 comments</span>
                                 &nbsp;&middot;&nbsp; 
                                 <span class="ml-2">Share</span> 
                            </div>
                        </div>
                        <hr>
                        <div class="comments">
                            <div class="comment-input"> <input type="text" class="form-control">
                                <div class="fonts"> <i class="fa fa-camera"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>    

    <?php endforeach;  ?>


    <?php include('./template/foot.php'); ?>

    <script>
            var toastTrigger = document.getElementById('liveToastBtn');
            var toastLiveExample = document.getElementById('liveToast');
            var toast = new bootstrap.Toast(toastLiveExample);
            toast.show();
    </script>

   

</html>


<?php 

    unset( $_SESSION['user_logged_in'] );
    unset($_SESSION['post_added']);
    unset($_SESSION ["user_added"]);
    $_SESSION["user"]=true;
   

    // session_unset();

    /*

    <div class="container mt-5 mb-5">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-6 article">
                <div class="card">
                    <div class="d-flex justify-content-between p-2 px-3">
                        <div class="d-flex flex-row align-items-center">
                            <img src="https://scontent.fcgp7-1.fna.fbcdn.net/v/t39.30808-6/257998929_1305825396547301_411253619649346642_n.jpg?_nc_cat=100&ccb=1-5&_nc_sid=09cbfe&_nc_eui2=AeGRV8VrTaX9Oes3qdKhiery8M-2J221Q9Lwz7YnbbVD0jBzXf4AaqU5pfI-07_MfVaZBMUp1EmD4ITlAbcRlEWB&_nc_ohc=3RBOmNuvVWQAX8BNIY0&_nc_ht=scontent.fcgp7-1.fna&oh=00_AT9AviATqjzQwGfexn87ldYG3G59faV0cA7QPexFu9a3uA&oe=61FBAA8B" width="50" class="rounded-circle mr-2">
                            <div class="d-flex flex-column ml-2 pl-2"> 
                                <span class="font-weight-bold mr-2">&nbsp; Shihab shangvi</span> 
                                <small class="text-danger mr-2">&nbsp; Data analyst</small> 
                            </div>
                        </div>
                        <div class="d-flex flex-row mt-1 ellipsis">
                             <small class="mr-2 text-warning">20 mins</small> 
                             <!-- <i class="fa fa-ellipsis-h"></i>  -->
                        </div>
                    </div> <img src="./logo/bg1.jpg" class="img-fluid">
                    <div class="p-2">
                        <h4>Hello world</h4>
                        <!-- text_description -->
                        <p class="text-justify">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.

                        </p>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-row icons d-flex align-items-center"> 
                                <i class="fa fa-heart"></i> 
                            </div>
                            <div class="d-flex flex-row muted-color">
                                 <span class="text-info" >0 comments</span>
                                 &nbsp;&middot;&nbsp; 
                                 <span class="ml-2">Share</span> 
                            </div>
                        </div>
                        <hr>
                        <div class="comments">
                            <!-- <div class="d-flex flex-row mb-2"> <img src="https://i.imgur.com/9AZ2QX1.jpg" width="40" class="rounded-image">
                                <div class="d-flex flex-column ml-2"> <span class="name">Daniel Frozer</span> <small class="comment-text">I like this alot! thanks alot</small>
                                    <div class="d-flex flex-row align-items-center status"> <small>Like</small> <small>Reply</small> <small>Translate</small> <small>18 mins</small> </div>
                                </div>
                            </div>
                            <div class="d-flex flex-row mb-2"> <img src="https://i.imgur.com/1YrCKa1.jpg" width="40" class="rounded-image">
                                <div class="d-flex flex-column ml-2"> <span class="name">Elizabeth goodmen</span> <small class="comment-text">Thanks for sharing!</small>
                                    <div class="d-flex flex-row align-items-center status"> <small>Like</small> <small>Reply</small> <small>Translate</small> <small>8 mins</small> </div>
                                </div>
                            </div> -->
                            <div class="comment-input"> <input type="text" class="form-control">
                                <div class="fonts"> <i class="fa fa-camera"></i> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>     

    */

?>
