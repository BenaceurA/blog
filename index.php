<?php
require "header.php";
if(($MysqlConnection = mysqli_connect("127.0.0.1","root","","blog","3306")) == FALSE){
    echo "500 internal server error (connection failure)";
    die();
};

if(($result = $MysqlConnection->query("Select * from posts")) == FALSE){
    echo "500 internal server error (query failure)";
    die();
}
?>
<div id="main">
    <?php
    while ($CurrentRow = $result->fetch_array()) {
        echo "<div class='content'>";
        echo "<a href='$CurrentRow[id]/".str_replace(" ","-",$CurrentRow["title"])."'><h1 id = 'title'> ".$CurrentRow["title"]."</h1></a><span id='info'>by ".$CurrentRow["author_username"]."</span>";
        $content = substr($CurrentRow["content"],0,250);
        echo "<p id = 'text'>".$content."<span>...</span></p>";
        echo "</div>";
        echo "<hr>";
    }   
    ?>
</div>
<?php
require "footer.php";
