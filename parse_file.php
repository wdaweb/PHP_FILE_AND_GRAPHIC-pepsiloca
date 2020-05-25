<?php

include_once "base.php";

if(!empty($_FILES['doc']['tmp_name'])){
    /* 
    echo "上傳的暫存檔名及路徑:".$_FILES['doc']['tmp_name']."<br>";
    echo "檔案類型:".$_FILES['doc']['type']."<br>";
    echo "檔案原始名稱:".$_FILES['doc']['name']."<br>";
    move_uploaded_file($_FILES['doc']['tmp_name'],"doc/".$_FILES['doc']['name']);
    echo "檔案搬移位置在"."doc/".$_FILES['doc']['name']; */


    if($_FILES['doc']['type']=='text/plain'){
        move_uploaded_file($_FILES['doc']['tmp_name'],'doc/'.$_FILES['doc']['name']);

        $path='doc/'.$_FILES['doc']['name'];

        $file=fopen($path,"r+");

        while(!feof($file)){
            $txt=fgets($file);
            $font_size=rand(12,24)."px";
            echo "<div style='margin:10px;font-size:$font_size'>".$txt."</div>";
        }

        

    }else{
        echo "檔案類型錯誤!";
    }


}else{
    echo "上傳錯誤:".$_FILES['doc']['error'];
}


?>