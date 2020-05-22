<style>
*{
    box-sizing:border-box;
    padding:0;
    margin:0;
}

img{
   width:100%; 
   border:3px solid blue;
   
}

.frame{
    display:inline-flex;
    width:150px;
    border:2px solid #5ee;
    margin:10px;
    box-shadow:1px 1px 5px #990;
    height:150px;
    vertical-align:middle;
    align-items:center;
    padding:0 10px;
}
</style>


<a href="?album=1">美食</a>
<a href="?album=2">旅遊</a>
<a href="?album=3">寵物</a>
<hr>
<?php
include_once "base.php";

if(!empty($_GET['album'])){
    $album=['album'=>$_GET['album']];
}else{
    $album=[];
}


$images=all("file_info",$album);

foreach($images as $img){
    echo "<div class='frame'><img src='".$img['path']."'></div>";
}


?>