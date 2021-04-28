<?php
$url =  str_replace("/blog/","",$_SERVER["REQUEST_URI"]) ;
$request = explode("/", $url);
$request = array_filter($request);

if (empty($request)) {
    require("./index.php");
}
else{
    $safe_pages=["post"];
    if(in_array($request[0],$safe_pages)){
        
    }
    else{
        
    }
}   
?>