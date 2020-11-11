<?php 
    include("includes/connect.php"); 
    session_start();
    if($_SESSION['username'] == true){
        $rollno = $_SESSION['username'];
        if($rollno == "admin"){
          header('location: admin_availablebooks.php');
      }
        $id = $_GET['ID'];
        $delete = 'DELETE';
        header('location: yourbooks.php');
        $query = "UPDATE addbook SET BuyStatus ='$delete'WHERE BookId = '$id'";
        $query_run = mysqli_query($conn, $query);
        if($query_run){
          header('location: yourbooks.php');
        }
        else{
          echo mysqli_error($conn);
        }
    }
    else{
        header('location: login.php');
    }
?>