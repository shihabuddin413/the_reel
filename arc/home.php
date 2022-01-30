<?php
session_start();
?>

<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>CRUD</title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-warning bg-secondary">
        <div class="container">
            <a class="navbar-brand text-warning" href="#">CRUD Pro Max</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon text-warning"><i class="fas fa-info"></i></span>
            </button>
            <div class="collapse navbar-collapse text-uppercase" id="navbarSupportedContent">
                <ul class="navbar-nav m-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning me-5 text-uppercase" aria-current="page" href="#">Add page</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-warning me-5 text-uppercase" aria-current="page" href="#">All post</a>
                    </li>
                </ul>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-warning me-md-2 text-uppercase" type="button">contact</button>
                    <button class="btn btn-warning me-md-2 text-uppercase" type="button">user login</button>
                </div>
            </div>
        </div>
    </nav>
    <div class="container my-4">
        <div class="card text-center border border-success">
            <div class="card-header text-uppercase text-warning bg-success">
                add post page
            </div>
            <div class="card-body">
                <form class="text-uppercase" action="./controller/store.php" method="POST">
                    <div class="mb-3">
                        <label for="inputTitle">Post title or name here</label>
                        <input type="text" class="form-control my-2" id="inputTitle" placeholder="Please Write Post Ttle here" name="post_title" value="">

                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['error_name'])) {
                                echo $_SESSION['error_name'];
                            }
                            ?>
                        </span>
                    </div>
                    <div class="form-floating my-4">
                        <textarea class="form-control" placeholder="Leave a comment here" id="inputDetail" style="height: 100px" name="post_detail" value=""></textarea>
                        <span class="text-danger">
                            <?php
                            if (isset($_SESSION['error_detail'])) {
                                echo $_SESSION['error_detail'];
                            }
                            ?>
                        </span>
                        <label for="inputDetail">Post Details</label>
                    </div>
                    <div class="row">
                        <div class="col-md-8 mb-3">
                            <label for="inputAuthor">Author Name</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="inputGroupPrepend2">@</span>
                                </div>
                                <input type="text" class="form-control" id="inputAuthor" placeholder="Author Name here" aria-describedby="inputGroupPrepend2" name="author_name" value="">
                            </div>
                            <span class="text-danger">
                                <?php
                                if (isset($_SESSION['error_author'])) {
                                    echo $_SESSION['error_author'];
                                }
                                ?>
                            </span>
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="inputPicture">Input picture here</label>
                            <input class="form-control" type="date" id="inputPicture" name="post_date">
                            <span class="text-danger">
                                <?php
                                if (isset($_SESSION['error_date'])) {
                                    echo $_SESSION['error_date'];
                                }
                                ?>
                            </span>
                        </div>
                    </div>
                    <!-- <div class="col-md-4 mb-3">
                            <label for="inputPicture">Input picture here</label>
                            <input class="form-control" type="file" id="inputPicture" name="post_picture">
                        </div> -->
                    <div class="my-4">
                        <button class="btn btn-warning text-uppercase" type="submit" name="submit">Submit</button>
                    </div>
                </form>
            </div>
            <div class="card-footer text-uppercase text-warning bg-success">
                upload time here with date
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/2f46a1c839.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>

<?php
session_unset();
?>