<?php 
  session_start();
  include("includes/connect.php"); 
  if($_SESSION['username'] == true){
    $rollno = $_SESSION['username'];
    if($rollno == "admin"){
      header('location: admin_availablebooks.php');
  }
    $id = $_GET['ID'];
    $status = "CLOSE";
    $query = "UPDATE addbook SET BuyStatus = '$status' WHERE BookId = '$id'";
    $query_run = mysqli_query($conn,$query);
    if($query_run){
        echo "<script type='text/javascript'>alert('Updated book data as sold!!!');window.location='yourbooks.php';</script>";
    }
    else{
      echo mysqli_error($conn);
    }
  }
  else{
    header('location: login.php');
  }
?>