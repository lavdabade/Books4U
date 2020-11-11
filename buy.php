<?php 
    include("includes/connect.php"); 
    session_start();
    if($_SESSION['username'] == true){
        $rollno = $_SESSION['username'];
        if($rollno == "admin"){
          header('location: admin_availablebooks.php');
      }
        $id = $_GET['ID'];
        $query = "UPDATE addbook SET BuyStatus = 'YES', Buyer = '$rollno' WHERE BookId = '$id'";
        $query_run = mysqli_query($conn, $query);
        header('location: yourorders.php');
        if($query_run){
            echo "<script>alert('successfull!')</script>";
          }
          else{
            echo mysqli_error($conn);
          }
    }
    else{
        header('location: login.php');
    }
?>