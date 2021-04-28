<?php
session_start();
require("connection.php");
$stmt = $MysqlConnection->prepare("select username from authors where username = ?;");
$stmt->bind_param('s',$_POST['username']);
$stmt->execute();
$result = $stmt->get_result();

if($result->num_rows > 0){
    $result = $result->fetch_array();
    $stmt = $MysqlConnection->prepare("select password from authors where username = ?;");
    $stmt->bind_param('s',$result[0]);
    $stmt->execute();
    $result = $stmt->get_result();
    $result = $result->fetch_array();
    if($result[0] == $_POST["password"]){
        session_regenerate_id(true);
        $_SESSION["logged"] = true;
        $_SESSION["username"] = $_POST["username"];
        header("location:/blog");
    }
    else{
        header("location:login.html?error=password");
    }
}
else{
    header("location:login.html?error=username");
}