<?php
    session_start();
    if(!isset($_SESSION['name']) || !isset($_SESSION['id']) || !isset($_SESSION['role']) || $_SESSION['role'] != 1){
        header("Location: contactadmin.php");
    }else{
        include "config/config.php";
        if(empty($_GET['id']) || !is_numeric($_GET['id'])){
            header("Location: contactadmin.php");
        }else{
            $id = mysqli_real_escape_string($conn,$_GET['id']);
            $query = mysqli_query($conn,"DELETE FROM contact_us WHERE id = $id");
            if($err = mysqli_error($conn)){die($err);}
            if($query){
                header("Location: contactadmin.php");
            }else{
                die("something is wrong.");
            }
        }
    }
?>