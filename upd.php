<?php
include_once("inc/model.php");
$data = $user->getRecord($user->treat($_GET['id']))[0];
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
    <div class="form2" >
        <h1>Update Record</h1>
        <div class="">
            <?php echo Model::message() ?> 
        </div>
       
        <form action="inc/ctrl.php?ac=edit&id=<?php echo $user->id ?>" method="post">
            <input type="text" required name="fname" value="<?php echo $data['firstname'] ?>" placeholder="Enter Firstname" class="input">
            <input type="text" required name="lname" value="<?php echo $data['lastname'] ?>" placeholder="Enter Lastname" class="input">
            <input type="email" required value="<?php echo $data['email'] ?>" name="email" placeholder="Enter Email Address" class="input">
            <input type="submit" name="submit" class="submit" value="Update Record">
        </form>
    </div>
</body>
</html>
<script src="script.js"></script>
