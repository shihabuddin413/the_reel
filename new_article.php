<?php 
    session_start();
?>


<!DOCTYPE html>
<html lang="en">

<?php include('./template/head.php'); ?>



<!-- post -->
<div class="col-lg-6 m-auto mt-5 mobile-flex">
    <form action="./controller/store.php" method="POST" class="new_article">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h2 class="text-light">New Article</h2>
            <button type="submit" name="submit" value="submit" class="btn btn-warning px-5">Post</button>
        </div>
        <div class="card-body">
           
                <div class="d-flex justify-content-between align-items-center px-2">
                    <label class="text-warning"> <?=  $_SESSION['current_user']; ?>  </label>
                    <small class="text-light"> <?= date('d F Y, h:i:s A'); ?> </small>
                </div>
                
                <input type="text" 
                       name="title"
                       class="form-control mt-2 text-input" 
                       placeholder="Title" />
                <?php if(isset($_SESSION['err_title'])) :  ?>
                    <span class="text-danger pad_left"> <?= $_SESSION['err_title'] ?> </span>
                <?php endif; ?>
              
                <textarea
                        name="description" 
                        class="form-control mt-2 desc" 
                        placeholder="Description"
                ></textarea>
                <?php if(isset($_SESSION['err_description'])) :  ?>
                    <span class="text-danger pad_left"> <?= $_SESSION['err_description'] ?> </span>
                <?php endif; ?>
               
                <!-- <input type="text" 
                       name="author" 
                       class="form-control mt-2 text-input" 
                       placeholder="Author Name" 
                       />
                <?php if(isset($_SESSION['err_author'])) :  ?>
                    <span class="text-danger pl-2"> <?= $_SESSION['err_author'] ?> </span>
                <?php endif; ?> -->
               
                <div class="fn-input">

                    <p>Add photos/videos</p>
                    <label for="file-upload-1" class="custom-file-upload">+</label>
                    <input id="file-upload-1" type="file" name="attach" />

                    <label for="file-upload" class="custom-file-upload">+ </label>
                    <input id="file-upload" type="file" name="attach1" />

                    <label for="file-upload" class="custom-file-upload">+ </label>
                    <input id="file-upload" type="file" name="attach2" />

                    <br/>
                    <?php if(isset($_SESSION['err_attach'])) :  ?>
                        <span class="text-danger"> <?= $_SESSION['err_attach'] ?> </span>
                    <?php endif; ?>
                </div>
                
                
            </form>
        </div>
    </div>
</div>

<?php include('./template/foot.php'); ?>

<script>

        let attach_btn = document.querySelector('.custom-file-upload');
        let file_input = document.getElementById('file-upload-1');

        console.log(attach_btn);
        console.log(file_input);

        file_input.addEventListener('change', ()=>{
            attach_btn.innerHTML = `
                    <svg    fill= "lime"
                            width="15.002px" height="15.002px" viewBox="0 0 305.002 305.002" style="enable-background:new 0 0 305.002 305.002;"
                            xml:space="preserve">
                    <g>
                        <g>
                            <path d="M152.502,0.001C68.412,0.001,0,68.412,0,152.501s68.412,152.5,152.502,152.5c84.089,0,152.5-68.411,152.5-152.5
                                S236.591,0.001,152.502,0.001z M152.502,280.001C82.197,280.001,25,222.806,25,152.501c0-70.304,57.197-127.5,127.502-127.5
                                c70.304,0,127.5,57.196,127.5,127.5C280.002,222.806,222.806,280.001,152.502,280.001z"/>
                            <path d="M218.473,93.97l-90.546,90.547l-41.398-41.398c-4.882-4.881-12.796-4.881-17.678,0c-4.881,4.882-4.881,12.796,0,17.678
                                l50.237,50.237c2.441,2.44,5.64,3.661,8.839,3.661c3.199,0,6.398-1.221,8.839-3.661l99.385-99.385
                                c4.881-4.882,4.881-12.796,0-17.678C231.269,89.089,223.354,89.089,218.473,93.97z"/>
                        </g>
                    </g>
                    </svg>`;
        })

</script>

</html>


<?php 

    unset($_SESSION['err_title']);
    unset($_SESSION['err_description']);
    unset($_SESSION['err_author']);
    unset($_SESSION['err_attach']);

    //session_unset();

    /*

      <span class="text-danger"> 
         <?= isset($_SESSION['err_title']) ? $_SESSION['err_title'] : ""   ?> 
      </span>

      <span class="text-danger"> 
        <?= isset($_SESSION['err_description']) ? $_SESSION['err_description'] : ""   ?> 
      </span>

      <span class="text-danger">
        <?= isset($_SESSION['err_author']) ? $_SESSION['err_author'] : ""   ?> 
      </span>

      <span class="text-danger">
            <?= isset($_SESSION['err_attach']) ? $_SESSION['err_attach'] : ""   ?>
      </span>
    */

?>
