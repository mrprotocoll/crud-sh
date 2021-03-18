<?php
include_once("inc/model.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="style.css">
   
</head>
<body>
    <div class="form2">
        <h1>Create New Record</h1>
        <div class="out">
            <?php echo Model::message() ?> 
        </div>
       
        <form action="inc/ctrl.php?ac=new" method="post">
            <input type="text" required name="fname" placeholder="Enter Firstname" class="input">
            <input type="text" required name="lname" placeholder="Enter Lastname" class="input">
            <input type="email" required name="email" placeholder="Enter Email Address" class="input">
            <input type="submit" name="submit" class="submit" value="Create">
        </form>
    </div>
</body>
</html>
<script src="script.js"></script>
