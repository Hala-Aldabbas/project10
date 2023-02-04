<?php
include("./class/users.php");
extract($_POST);
$category = new users;
$id = $_POST['id'];
if ($category->delete_category($id)) {
    $category->url("exams.php?msg_del=run");
}
?>