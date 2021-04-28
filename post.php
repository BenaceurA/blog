<?php
require "header.php";
$MysqlConnection = mysqli_connect("127.0.0.1","root","","blog","3306");
$id =  $_GET["id"];
if(isset($_GET["t"])){
    $uri = str_replace("-"," ",$_GET["t"]);
}
else{
    $result = $MysqlConnection->query("select title from posts where id ='$id'");
    $result = $result->fetch_array();
    $result = str_replace(" ","-",$result["title"]);
    header("location:/blog/$id/$result");
}
if(($result = $MysqlConnection->query("Select * from posts where id ='$id'")) == FALSE){
    echo "500 internal server error (query failure)";
    die();
}
$result = $result->fetch_array();
?>
<div id = 'main'>
    <h1 id = 'title'>
    <?php    
        echo $result["title"];
    ?>
    </h1>
    <br>
    <div id="content">
        <?php
        echo $result["content"];
        ?>
    </div>
    <form method="post" action="/blog/comment.php">
        <input placeholder="Add a comment" name="comment" id="comment" autocomplete="off" ></input>
        <input type="hidden" id="postid" name="postid" value="<?php echo $id ?>">
        <input class="button" type="submit" value="COMMENT">
        <input class="button" type="button" value="CANCEL">
    </form>
    <div id="comments">
        <?php
        $s = "select * from comments where post_id='$id'";
        $result = $MysqlConnection->query($s);
        while ($row = $result->fetch_array()): ?>
            <div class="comment">
                <?php echo $row["comment"]; ?>
            </div>
            <hr>
        <?php endwhile ?>
        
    </div>
</div>

