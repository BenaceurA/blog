<?php
if(($MysqlConnection = mysqli_connect("127.0.0.1","root","","blog","3306")) == FALSE){
    echo "500 internal server error (connection)";
    die();
};