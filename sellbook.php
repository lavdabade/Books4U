<?php 
session_start();
include("includes/connect.php"); 
if($_SESSION['username'] == true){
  $rollno = $_SESSION['username'];
  if($rollno == "admin"){
    header('location: admin_availablebooks.php');
}
?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css2?family=Barriecito&family=Bigshot+One&family=Flavors&family=Kavoon&family=Michroma&family=Trade+Winds&family=Unlock&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel = "icon" href = "images/logo.png" type = "image/x-icon">
        <title>home</title>
        <style>
            body{
                margin: 0;
                padding: 0;background: url(images/login4.jpeg);
    background-repeat: no-repeat;
    background-size: cover;
                box-sizing: border-box;
                
            }

            /* navbar-style */

            header {
                background-color: rgb(231, 180, 13);
                padding: 10px;
                height:90px;
            }
 
            .s-content ul {
                list-style-type: none;
                margin: 0;
                padding: 0;
                overflow: hidden;
                background-color: rgb(41, 2, 73);
                height: 50px;
            }
            
            .s-content ul li {
                float: left;
            }
            
            .s-content ul li a {
                display: block;
                color: white;
                text-align: center;
                padding: 10px;
                text-decoration: none;
                margin-left:30px;
                font-size:20px;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            }
            
            .s-content ul li a:hover {
                background-color: rgb(182, 172, 172);
            }
            .books{
                float:left;
                font-size:50px;
                color:rgb(25, 5, 70);
                font-family: 'Michroma', sans-serif;
                margin-left:20px;
            }
            .carlog{
                float:right;
                margin-top:38px;
                color:black;
                font-size:27px;
                font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
                margin-right:20px;
            }

            /* content-style */

            .content-box{
                width: 1200px;
                height: auto;
                background: #00daf7;
                background: rgba(0, 0, 0, 0.7);
                color: #ffffff;
                top: 52%;
                left: 50%;
                
                position: absolute;
                transform: translate(-50%, -50%);
                box-sizing: border-box;
                padding: 20px 20px 20px 20px;
                margin: 70px 0px 0px 30px;
                border: solid 7px rgb(231, 180, 13);
            }
            
            
            h1{
                margin: 0;
                padding: 0 0 20px;
                text-align: center;
                
            }
            
            .content-box p{
                margin: 0;
                padding: 0;
                font-weight: bold;
                font-size: 20px;
                font-family: Sans-serif;
            }
            
            .content-box input{
                width: 100%;
                margin-bottom: 20px;
            }
            
            .content-box input[type="text"]{
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
                font-size: 20px;
                width: 200px;
            }

            .content-box input[type="submit"]:hover{
                cursor: pointer;
                background-color: #ffc107;
                color: #000;
            }
            .abc ul {
    width: 100%;
}
.abc ul li {
    width: 44%;
    margin-right: 40px;
    display: inline-block;
}

.abc ul li > * {
    width: 100%;
}

            
        </style>
    </head>
    <body>
        <header>
            <div class="info">
                <div class="books">
                <b>Books4U</b>
                </div>
                <div class="carlog">
                    <?php
                        $queryN = "SELECT FN, LN FROM user WHERE RollNo = '$rollno'";
                        $queryN_run = mysqli_query($conn, $queryN);
                        $rowN = mysqli_fetch_assoc($queryN_run);
                        echo "Hello, " . $rowN["FN"]. " " . $rowN["LN"]. " ";
                    ?>
                    <b><a href="logout.php" class="px-1"><i class="material-icons" >account_circle</i><span>Log Out</span></a></b>
                </div> 
            </div>  
        </header>
        <div class="s-content">
            <ul>
                <li><a href="viewbooks.php">View Books</a></li>
                <li><a style="color:rgb(41, 2, 73); background-color: rgb(231, 180, 13);" href="#">Sell Books</a></li>
                <li><a href="yourbooks.php">Your Books</a></li>
                <li><a href="yourrequests.php">Your Requests</a></li>
                <li><a href="yourorders.php">Your Orders</a></li>
            </ul>
        </div>
        <div class="content-box">
            <h1>Sell Book</h1>
            <form action="" method="post" enctype="multipart/form-data">
            <div class="abc">
            <ul>
            <li>
                <p><br>Book Name</p>
                <input type="text" name="bname" placeholder="Enter Book Name" required></li>
            <li>
                <p><br>Author Name</p>
                <input type="text" name="aname" placeholder="Enter Author Name" required>
            </li>
            <li>
                <p><br>Price</p>
                <input type="text" name="price" placeholder="Enter Price" required>
            </li>
            <li>
                <p><br>Description</p>
                <input type="text" name="description" placeholder="Enter Description" required>
            </li>
               <li>
                    <p><br>Condition</p>
                    <input list="browsers" name="bookcondition" required>
                    <datalist id="browsers">
                       <option value="New">
                       <option value="Used-New Like">
                       <option value="Used-Good">
                       <option value="Readable">
                   </datalist>
                </li>
            <li>
            <p><br>Image</p>
            <input type="file" id="image" name="image" accept=".jpg, .jpeg, .png" required/></li>
            </ul></div>
            <p><br></p>
            <center><input type="submit" name="submit" value="submit"></center>
            </form>
        </div>
    </body>
<?php 
}

else{
    header('location: login.php');
}

if(isset($_POST['submit'])){
    $bname = $_POST['bname'];
    $aname = $_POST['aname'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $buystatus = "OPEN";
    $bookcondition = $_POST['bookcondition'];
    $image = $_FILES['image'];
    $upload_image = $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'],"uploads/".$_FILES['image']['name']);
    $query = mysqli_query($conn,"INSERT INTO addbook(BookName, AuthName, Price, Description, BookCondition, Image, RollNo, BuyStatus)values('$bname', '$aname', '$price', '$description', '$bookcondition', '".$upload_image."' , '$rollno', '$buystatus')");
    if($query){
        echo "<script type='text/javascript'>alert('Book is uploaded for selling!!!');window.location='yourbooks.php';</script>";
    }
    else{
      echo mysqli_error($conn);
    }
}
?>
