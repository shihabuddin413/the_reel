<?php 
    session_start();
    unset($_SESSION["user"]);

    if (!isset($_SESSION['theme'])) {
       $_SESSION['theme']=1;
    }
?>


<!DOCTYPE html>
<html lang="en">

    <?php include('./template/head.php'); ?>

    <?php if(isset($_SESSION["email_or_password_err"])): ?>
        <div class="toast_parent">
            <div id="liveToast" class="toast" role="alert" aria-live="assertive" aria-atomic="true" data-bs-autohide="false">
                <div class="toast-header">
                <strong class="me-auto"><h5>The Reel</h5></strong>
                <small class="text-success" > Just now</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
                </div>
                <div class="toast-body text-danger">
                    <?=  $_SESSION["email_or_password_err"]; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>

    <!-- post -->
    <div class="col-lg-6 m-auto mt-3 mobile-flex " >

        <h1 class="display-4 moto mb-3 ">
            <svg viewbox="0 0 10 2">
            <text font-family="Lobster" x="5" y="1.7" text-anchor="middle" font-size="1.1" fill="none" stroke-width=".050" stroke="rgba(255,255,255,0.5)" > Life The Search!</text>
            </svg>
        </h1>
          
        <div class="card">
            <div class="card-header">
                <h2 class="text-white">Log in to your account</h2>
            </div>
            <div class="card-body">
                <form action="./controller/login.php" method="POST" class="new_article">
                    <input type="text" 
                        name="email"
                        class="form-control login mt-2" 
                        placeholder="Email" />
                    <span class="text-danger"> 
                        <?= isset($_SESSION['err_email']) ? $_SESSION['err_email'] : ""   ?> 
                    </span>
                    <input type="password" 
                        name="password" 
                        class="form-control login mt-2" 
                        placeholder="password" 
                        />
                    <span class="text-danger">
                        <?= isset($_SESSION['err_password']) ? $_SESSION['err_password'] : ""   ?> 
                    </span>
                    
                    <p class="text-white"><a class="text-warning" href="#">
                        Forget password. click here to reset</a> or ,<br/>
                        Do not have an account ?<a class="text-info" href="reg.php"> create a new one</a>
                    </p>
                    <div>
                        <button type="submit" name="submit" value="submit" class="btn btn-primary mt-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <?php include('./template/foot.php'); ?>

    <script>
            var toastTrigger = document.getElementById('liveToastBtn');
            var toastLiveExample = document.getElementById('liveToast');
            var toast = new bootstrap.Toast(toastLiveExample);
            toast.show();
    </script>


</html>


<?php 

    unset($_SESSION["err_password"]);
    unset($_SESSION["err_email"]);
    unset($_SESSION["email_or_password_err"]);

    // session_unset();

?>
