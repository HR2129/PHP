<?php
    $submit=false;
    if(isset($_POST['name']))
    {
        $server= "localhost";
        $username="root";
        $password="";

        $con= mysqli_connect($server,$username,$password);

        if(!$con){
            die("Connection Failed".mysqli_connect_error());
        }


        $Name = $_POST['name'];
        $Email = $_POST['email'];
        //$PhoneNumber = $_POST['mobile'];
        $Message = $_POST['msg'];
        $sql="INSERT INTO `data`.`data` (`Name`, `E_mail`, `Message`, `dt`) VALUES ('$Name', '$Email', '$Message', current_timestamp());";
        // $sql="INSERT INTO `data`.`data` (`Name`, `E_mail`, `Phone_Number`, `Message`, `dt`) VALUES ('$Name', '$Email', '$PhoneNumber', '$Message', current_timestamp());";
        //echo $sql;


        if($con->query($sql) == true){
            //echo "Successfully inserted";}
            $submit=true;
        }
        else{
            echo "ERROR: $sql <br> $con->error";
        }
        $con->close();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="bg.png" alt="IIT Kharagpur">
    <div class="container">
        <h1>Get in Touch</h3>
        <?php
        if ($submit==true){
        echo ("<p class='submitMsg'>Infromation Collected </p>");
        }
        ?>
        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Name*">
            <input type="text" name="email" id="email" placeholder="EmailAddress*">
            <!-- <input type="text" name="mobile" id="mobile" placeholder="PhoneNumber*"> -->
            <textarea name="msg" id="msg" cols="10" rows="10" placeholder="Message"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
    
</body>
</html>