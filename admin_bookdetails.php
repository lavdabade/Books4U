<?php 
session_start();
include("includes/connect.php"); 
if($_SESSION['username'] == true){
  $rollno = $_SESSION['username'];
  if($rollno != "admin"){
    header('location: viewbooks.php');
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
        <title>admin_bookdetails</title>
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
            color: red;
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
                    echo "Hello, Admin ";
                ?>    
                <b><a href="logout.php" class="px-1"><i class="material-icons" >account_circle</i><span>Log Out</span></a></b>
            </div>
        </header>
        <div class="s-content">
            <ul>
                <li><a href="admin_availablebooks.php">Available Books</a></li> style="color:white;"
                <li><a href="admin_soldbooks.php">Sold Books</a></li>
                <li><a href="admin_requestedbooks.php">Requsted Books</a></li>
                <li><a href="admin_deletedbooks.php">Deleted Books</a></li>
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
                        <td rowspan = "9"><div class="booking"><?php echo '<img src = "uploads/'.$row['Image'].'" alt="book" height="500px" width="475px">'?></div></td>
                    </tr>
                    
                    <tr>
                        <td colspan="2"><h2 style="color:red; margin-left: 40px;"><?php echo $row['BookName'] ?></h2></td>
                    </tr>
                    <tr>
                        <td>Auther Name</td>
                        <td><?php echo $row['AuthName'] ?></td>
                    </tr>
                    <tr>
                        <td>Seller Name</td>
                        <?php
                        $seller = $row['RollNo'];
                        $query2 = "SELECT * FROM user WHERE RollNo = '$seller'";
                        $query2_run = mysqli_query($conn,$query2);
                        $row2 = mysqli_fetch_assoc($query2_run);
                        ?>
                        <td><?php echo " " . $row2["FN"]. " " . $row2["LN"]. " (" . $row2["RollNo"]. ") "?></td>
                    </tr>
                    <tr>
                        <?php
                        if($row['BuyStatus'] == "OPEN")
                        {
                        ?>
                            <td>Buyer Name</td>
                            <td><?php echo "-"?></td>
                        <?php
                        }
                        else if($row['BuyStatus'] == "REQ"){
                            $buyer = $row['Buyer'];
                            $query2 = "SELECT * FROM user WHERE RollNo = '$buyer'";
                            $query2_run = mysqli_query($conn,$query2);
                            $row2 = mysqli_fetch_assoc($query2_run);
                            ?>
                            <td>Requested by</td>
                            <td><?php echo " " . $row2["FN"]. " " . $row2["LN"]. " (" . $row2["RollNo"]. ") "?></td>
                        <?php
                        }
                        else if($row['BuyStatus'] == "CLOSE"){
                            $buyer = $row['Buyer'];
                            $query2 = "SELECT * FROM user WHERE RollNo = '$buyer'";
                            $query2_run = mysqli_query($conn,$query2);
                            $row2 = mysqli_fetch_assoc($query2_run);
                            ?>
                            <td>Buyer Name</td>
                            <td><?php echo " " . $row2["FN"]. " " . $row2["LN"]. " (" . $row2["RollNo"]. ") "?></td>
                        <?php
                        }else{
                        ?>
                            <td>Buyer Name</td>
                            <td><?php echo "-"; ?></td>
                        <?php
                        }
                        ?>
                        
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
                        <td colspan="2">
                            <?php
                                if($row['BuyStatus'] == "OPEN" ||  $row['BuyStatus'] == "DELETE"){
                            ?>
                                    <div style="float:right;"><a href="admin_delete.php?ID=<?php echo $row['BookId']?>" class= "button button1">DELETE</a></div>
                            <?php
                                }
                                else{
                                    echo "Connot be Modify";
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
