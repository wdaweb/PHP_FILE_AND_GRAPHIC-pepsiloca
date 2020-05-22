<?php
include_once "base.php";
?>


<?php

$id=$_GET['id'];

$file=find("file_info",$id);


//設定刪掉硬碟裡的資料unlink
unlink($file['path']);

del("file_info",$id);

to("manage.php");





?>