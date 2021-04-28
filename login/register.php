<?php
require("connection.php");
if(($result = $MysqlConnection->query("Select * from authors where username = '$_POST[username]'")) == FALSE){
    echo "500 internal server error (query failure)";
    die();
}
if(($result->num_rows)>0){
    header("location:register.html?error=username-taken");
}
else if(empty($_POST["username"])){
    header("location:register.html?error=empty-username");
}
else if(empty($_POST["password"])){
    header("location:register.html?error=empty-password");
}
else if(empty($_POST["password2"])){
    header("location:register.html?error=empty-password");
}
else if($_POST["password"] != $_POST["password2"]){
    header("location:register.html?error=confirm-password");
}
else{
    $MysqlConnection->query("insert into authors values ('$_POST[username]','$_POST[password]');");
    header("location:../index.php");
}
