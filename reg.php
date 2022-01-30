<?php 
    session_start();
    unset($_SESSION["user"]);
?>


<!DOCTYPE html>
<html lang="en">

<?php include('./template/head.php'); ?>

    <!-- post -->
    <div class="col-lg-6 m-auto mt-2 mobile-flex" >

        <h1 class="display-4 moto mb-3">
            <svg viewbox="0 0 10 2">
            <text font-family="Lobster" x="5" y="1.7" text-anchor="middle" font-size="1.1" fill="none" stroke-width=".050" stroke="rgba(255,255,255,0.5)" > Life The Search!</text>
            </svg>
        </h1>
          
        <div class="card">
            <div class="card-header">
                <h2 class="text-white"> Create your account</h2>
            </div>
            <div class="card-body">
                <form action="./controller/create_user.php" method="POST" class="new_article">
                    <input type="text" 
                        name="username"
                        class="form-control login mt-2" 
                        placeholder="Username" />
                    <span class="text-danger"> 
                        <?= isset($_SESSION['err_username']) ? $_SESSION['err_username'] : ""   ?> 
                    </span>
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
                    
                    <p class="text-white">Already have an account ?<a class="text-info" href="index.php"> Login now!</a></p>

                
                    <div>
                        <button type="submit" name="submit" value="submit" class="btn btn-primary mt-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>




    <?php include('./template/foot.php'); ?>

</html>


<?php 

    unset($_SESSION["err_password"]);
    unset($_SESSION["err_email"]);
    unset($_SESSION['err_username']);

    // session_unset();

?>
