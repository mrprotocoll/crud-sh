<?php
include_once "model.php";

$state = $user->treat($_GET['ac']);
switch ($state){
    case "new":
        foreach ($_POST as $key => $val) {
            if (empty($val)) {
               $_SESSION['error'] = "all fields are required";
               header("Location:../new.php");
               exit;
            } 
        }
        if (!filter_var($mail,FILTER_VALIDATE_EMAIL)){
            $_SESSION['error'] = "Invalid Email";
            header("Location:../new.php");
            exit;
        }
        if($user->emailExists()){
            $_SESSION['error'] = "Record Already Exist";
            header("Location:../new.php");
            exit;
        }
        if($user->create()){
            $_SESSION['success'] = "Record Created Successfully";
            header("Location:../");
            exit;
        }else{
            $_SESSION['error'] = "Failed, Try Again";
            header("Location:../new.php");
            exit;
        }
    break;
    case "edit":
        foreach ($_POST as $key => $val) {
            if (empty($val)) {
               $_SESSION['error'] = "all fields are required";
               header("Location:../upd.php?id=".$user->id);
               exit;
            } 
        }
        if (!filter_var($mail,FILTER_VALIDATE_EMAIL)){
            $_SESSION['error'] = "Invalid Email";
            header("Location:../upd.php?id=".$user->id);
            exit;
        }
        if($user->update()){
            $_SESSION['success'] = "Record Updated Successfully";
            header("Location:../");
            exit;
        }else{
            $_SESSION['error'] = "Failed to Update Record, Try Again";
            header("Location:../upd.php?id=".$user->id);
            exit;
        }
    break;
    case "del":
        if($user->delRecord()){
            $_SESSION['success'] = "Record Deleted Successfully";
            header("Location:../");
            exit;
        }else{
            $_SESSION['error'] = "Failed to Delete Record, Try Again";
            header("Location:../");
            exit;
        }
    break;
    default: break;
}
