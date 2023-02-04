<?php
include("./class/users.php");
extract($_POST);
$exam = new users;
$qid = $_POST['qid'];
if ($exam->delete_category1($qid)) {
    $exam->url("questions.php?msg_del=run");
}
?>