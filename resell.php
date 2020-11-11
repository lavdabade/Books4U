<?php 
  session_start();
  include("includes/connect.php"); 
  if($_SESSION['username'] == true){
    $rollno = $_SESSION['username'];
    if($rollno == "admin"){
      header('location: admin_availablebooks.php');
  }
    $id = $_GET['ID'];
    $status = "OPEN";
    $query = "UPDATE addbook SET BuyStatus = '$status' WHERE BookId = '$id'";
    $query_run = mysqli_query($conn,$query);
    if($query_run){
        echo "<script type='text/javascript'>alert('Book is added for selling!!!');window.location='yourbooks.php';</script>";
    }
    else{
      echo mysqli_error($conn);
    }
  }
  else{
    header('location: login.php');
  }
?>