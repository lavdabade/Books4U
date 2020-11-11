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
        <title>bookdetails</title>
        <style>
            body{
                margin: 0;
                padding: 0;
                background: url(images/home.jpg);
                background-size: cover;
                background-position: center;
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

            .bookdetails{
                width: 87%;
                height: auto;
                background: white;
                /* background: rgba(0, 0, 0, 0.5); */
                color: black;
                
                /* align: center; */
                box-sizing: border-box;
                padding: 30px 30px 20px 30px;
                margin: 50px 110px 0px 110px;
                font-family: Sans-serif;
                border: solid 7px rgb(231, 180, 13);
                
            }

           .bookimg {
               width: 40%;
               float:left;
                height:95%;
               border: 2px solid gray; 
           }

           .bookimg img{
            width: 100%;
            height: 100%;
           }

            .button {
                border: none;
                color: white;
                padding: 10px 30px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 25px;
                margin-top: 47px;
                transition-duration: 0.4s;
                cursor: pointer;
                border-radius: 7px;
            }

            .button1 {
            background-color: rgb(240, 188, 17); 
            color: black; 
            border: 2px solid #363636;
            }

            .button1:hover {
            background-color: #fce305;
            color: white;
            }

            .information{
                margin-left: 560px;
                height: 95%;
                
                width:54%
                
            }

            .information h1{
                font-size: 50px;
                color: rgb(177, 24, 24);
            }

            table {
            font-family: sans-serif;
            border-collapse: collapse;
            width: 95%;
            font-size: 19px;
            }

            td, th {
            height:45px;
            text-align: left;
            padding: 8px;
            }

            tr:nth-child(even) {
            background-color: #dddddd;
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
        </header>
        <div class="s-content">
            <ul>
                <li><a class="active" href="viewbooks.php">View Books</a></li>
                <li><a href="sellbook.php">Sell Books</a></li>
                <li><a href="yourbooks.php">Your Books</a></li>
                <li><a href="yourrequests.php">Your Requests</a></li>
                <li><a href="yourorders.php">Your Orders</a></li>
            </ul>
        </div>
            <?php 
                $id = $_GET['ID'];
                $query = "SELECT * FROM addbook WHERE BookId = '$id'";
                $query_run = mysqli_query($conn, $query);
                foreach($query_run as $row){
            ?>
             <div class=" bookdetails">
                <table>
                    <tr>
                        <td rowspan = "8"><div class="booking"><?php echo '<img src = "uploads/'.$row['Image'].'" alt="book" height="500px" width="475px">'?></div></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2"><h1 style="color:red; margin-left: 40px;"><?php echo $row['BookName'] ?></h1></td>
                    </tr>
                    <tr>
                        <td>Auther Name</td>
                        <td><?php echo $row['AuthName'] ?></td>
                    </tr>
                    <tr>
                        <td>Price</td>
                        <td><?php echo $row['Price'] ?>
                    <tr>
                        <td>Description</td>
                        <td><?php echo $row['Description'] ?></td>
                    </tr>
                    <tr>
                        <td>Condition</td>
                        <td><?php echo $row['BookCondition'] ?></td>
                    </tr>
                    <tr>
                        <td>
                            <?php
                                if($row['RollNo'] == $rollno)
                                {
                            ?>
                                    <a href="edit.php?ID=<?php echo $id?>" class= "button button1">EDIT</a>
                            <?php
                                }
                                else
                                {
                            ?>
                                    <a href="request.php?ID=<?php echo $row['BookId']?>" class= "button button1">Send Request</a>
                                    <!-- <a href="request.php?ID=<?php //echo $row['BookId']?>" class= "button button1">Send Request</a> -->
                                    
                            <?php
                                }
                            ?>
                        </td>
                    </tr>
                </table>                
            </div>
            <?php
                }
            ?>
    </body>
<?php 
}

else{
    header('location: login.php');
}
