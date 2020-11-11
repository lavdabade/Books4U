<?php 
include("includes/connect.php"); 
session_start();
if($_SESSION['username'] == true){
    $rollno = $_SESSION['username'];
    if($rollno != "admin"){
        header('location: viewbooks.php');
    }
    $id = $_GET['ID'];
    $query = "DELETE FROM addbook WHERE BookId = '$id'";
    $query_run = mysqli_query($conn, $query);
    if($query_run){
        echo "<script type='text/javascript'>alert('DELETED!!!');window.location='admin_availablebooks.php';</script>";
    }
    else{
        echo mysqli_error($conn);
    }
}
else{
    header('location: login.php');
}
?>