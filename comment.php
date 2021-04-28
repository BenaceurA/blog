<?php
session_start();
require("login/connection.php");
$author = $_SESSION["username"];
$comment = $_POST["comment"];
$created_at = date("Y-m-d");
$post_id = $_POST["postid"];
$s = "insert into comments values ('$author','$comment','$created_at',$post_id);";

if(!$MysqlConnection->query($s)){
    header("location:/blog/testerrorpage.html");
}
else{
    header("location:/blog/$post_id");
}
?>