<?php
include_once("inc/model.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    
    <div class="text-center">
        <h1>Welcome to CRUD Arena</h1>
        <p>Feel free to create new user information or update and delete existing record</p>
    </div>
    <div class="form">
        
        <a href="new.php" class="btn btn-succ">Create New Record</a>   
        <div class="out">
            <?php echo Model::message() ?>
        </div>
        
        <div class="">
            <table class="table" style="width:100%">
              <thead>
                <tr>
                    <th>S/N</th>
                    <th>First Name</th>
                    <th>Last name</th>
                    <th>Email</th>
                    <th>Date Added</th>
                    <th colspan="2">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                $data = $user->getRecord();
                $x = 1;
                if(is_array($data)){
                  foreach($data as $key => $val){
                ?>
                <tr>
                    <td><?php echo $x++ ?></td>
                    <td><?php echo $val['firstname'] ?></td>
                    <td><?php echo $val['lastname'] ?></td>
                    <td><?php echo $val['email'] ?></td>
                    <td><?php echo $val['xdate'] ?></td>
                    <td>
                        <a href="upd.php?id=<?php echo $val['id'] ?>" class="btn btn-pri">Edit</a>
                        <a href="inc/ctrl.php?ac=del&id=<?php echo $val['id'] ?>" onclick="return confirm('Are You Sure You Want to Delete this Record')" class="btn btn-red">Delete</a>
                    </td>
                </tr>
                <?php
                  }
                }else{
                  ?>
                  <tr>
                    <td colspan="5">No Record Found</td>
                  </tr>
                  <?php
                }
                ?>
                
              </tbody>
            </table>
          </div>
        
    </div>
</body>
</html>
<script src="script.js"></script>
