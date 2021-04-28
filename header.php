<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="/blog/style.css">
</head>
<body>
<?php
    if(!isset($_SESSION["logged"])):
?>

<div id = "header">   
    <div>
        <a id = "login" href="login/login.html">LOGIN</a>
        <a id = "login" href="login/register.html">REGISTER</a>
    </div>   
</div>
  
<?php
    endif
?>
<?php
    if(isset($_SESSION["logged"]) && $_SESSION["logged"]==true):
?>

<div id = "header">   
    <div>
        <a id = "login" href="/blog"><?php echo $_SESSION["username"] ?></a>
        <a id = "login" href="new">CREATE</a>
        <a id = "login" href="login/logout.php">LOGOUT</a>
    </div>   
</div>

<?php
    endif
?>