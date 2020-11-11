<?php 
    session_start();
    unset($_SESSION['username']);
    if(session_destroy()){
        echo "<script type='text/javascript'>alert('Logged Out!!!');window.location='login.php';</script>";
    }
?>