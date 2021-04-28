<?php
session_start();
if(!isset($_SESSION["logged"])){
    echo "401 Unauthorized";
    die();
}
//echo htmlspecialchars($_POST["wmd-input"]);
require("../login/connection.php");

$username = $_SESSION["username"];
$content = $_POST["wmd-input"];
$created_at = date("Y-m-d");
$title = $_POST["title"];

if(!empty($title)){
    if($result = $MysqlConnection->query("insert into posts (author_username,content,created_at,title) values ('$username','$content','$created_at','$title')") == FALSE){
        echo "500 query";
    }
    else{
        header("location:../");
    }
}
else{
    header("location:../testerrorpage.html");
}


