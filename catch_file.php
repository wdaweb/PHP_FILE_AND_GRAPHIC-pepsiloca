<?php

echo "<pre>";
print_r($_FILES);
echo "</pre>";

echo $_FILES['upload']['name'];
date_default_timezone_set("Asia/Taipei");

//if(!empty([$_FILES'upload']['tmp_name'])) 判斷檔案是否上傳成功
if($_FILES['upload']['error']==0){
    //更改上傳檔案的檔名做管理
    switch($_FILES['upload']['type']){
        case "image/jpeg";
            $sub='.jpg';
        break;
        case "image/png";
            $sub='.png';
        break;
        case "image/gif";
            $sub='.gif';            
        break;
    }
    //$sub=explode('.',$_FILES['upload']['name']);
    //sub[1];->副檔名
    $name=date("Ymdhis").$sub;


    move_uploaded_file($_FILES['upload']['tmp_name'],"img/".$name); 
 
    header("location:upload.php?filename=$name");
}
?>









