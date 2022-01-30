<?php

    session_start();

    if ($_SESSION['theme'] == 1){
        $_SESSION['theme'] = 0;
        header("Location: ../index.php");
        echo $_SESSION['theme'];
    }
    else {
        $_SESSION['theme'] = 1;
        echo $_SESSION['theme'];
        header("Location: ../index.php");
    }

?>