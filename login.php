<?php 
include("includes/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel = "icon" href = "images/logo.png" type = "image/x-icon">
    <title>login</title>
    <style>
        body{
    margin: 0;
    padding: 0;
    background: url(images/login4.jpeg);
    background-repeat: no-repeat;
    background-size: cover;
}

.content-box{
    width: 300px;
    height: auto;
    background: #00daf7;
    background: rgba(0, 0, 0, 0.7);
    color: #ffffff;
    top: 50%;
    left: 50%;
    position: absolute;
    transform: translate(-50%, -50%);
    box-sizing: border-box;
    padding: 70px 30px 50px 30px;
    margin: 40px 0px 0px 0px;
    border-radius: 10px;
}

.avatar{
    width: 100px;
    height: 100px;
    border-radius: 50%;
    position: absolute;
    top: -50px;
    left: 50%;
}

h1{
    margin: 0;
    padding: 0 0 20px;
    text-align: center;
    font-size: 22px;
}

.content-box p{
    margin: 0;
    padding: 0;
    font-weight: bold;
}

.content-box input{
    width: 100%;
    margin-bottom: 20px;
}

.content-box input[type="text"], input[type="password"]{
    border: none;
    border-bottom: 1px solid #ffffff;
    background: transparent;
    outline: none;
    height: 40px;
    color: #ffffff;
    font-size: 16px;
}

.content-box input[type="submit"]{
    border: none;
    border-radius: 20px;
    color: #ffffff;
    background-color: red;
    outline: none;
    height: 40px;
    font-size: 18px;
}

.content-box input[type="submit"]:hover{
    cursor: pointer;
    background-color: #ffc107;
    color: #000;
}
    </style>
</head>
<body>
<?php 
?>
    <div class="content-box">
        <img src="images/login.png" class="avatar">
        <h1 style="color:white;"> Login Here<br><br></h1>
        <form action="" method="post">
            <!-- <p>Username</p> -->
            <input type="text" name="username" placeholder="Enter Username" required>
            <!-- <p>Password</p> -->
            <input type="password" name="password" placeholder="Enter Password" required>
            <P><br></P>
            <input type="submit" name="submit" value="submit">
        </form>
    </div>
</body>
</html>
<?php
if(isset($_POST['submit'])){
    $user = $_POST['username'];
    $pass = $_POST['password'];
    $query = "SELECT * FROM user WHERE RollNo='$user' && password='$pass'";
    $data = mysqli_query($conn, $query);
    $total = mysqli_num_rows($data);
    if($total == 1){
        session_start();
        $_SESSION['username'] = $user;
        header('location: viewbooks.php');
    }
    else{
        $Aquery = "SELECT * FROM admin WHERE AdminName='$user' && AdminPass='$pass'";
        $Adata = mysqli_query($conn, $Aquery);
        $Atotal = mysqli_num_rows($Adata);
        if($Atotal == 1){
            session_start();
            $_SESSION['username'] = $user;
            header('location: admin_availablebooks.php');
        }
        else{
            echo "<script>alert('Invalid Password!')</script>";
        }
    }
}
?>
