<?php 
session_start(); 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="md\demo\browser\demo.css">
    <script type="text/javascript" src="md/Markdown.Converter.js"></script>
    <script type="text/javascript" src="md/Markdown.Sanitizer.js"></script>
    <script type="text/javascript" src="md/Markdown.Editor.js"></script>
    
</head>
<body>
<?php
    if(!isset($_SESSION["logged"])):
        header("location:../index.php");
        die();
?> 
<?php
    endif
?>
<?php
    if(isset($_SESSION["logged"]) && $_SESSION["logged"]==true):
?>

<div id = "header">   
    <div>
        <a id = "login" href="/blog"><?php echo $_SESSION["username"] ?></a>
        <a id = "login" href="/blog/login/logout.php">LOGOUT</a>
    </div>   
</div>

<?php
    endif
?>