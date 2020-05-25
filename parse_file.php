<?php

include_once "base.php";

if(!empty($_FILES['doc']['tmp_name'])){
    /* 
    echo "上傳的暫存檔名及路徑:".$_FILES['doc']['tmp_name']."<br>";
    echo "檔案類型:".$_FILES['doc']['type']."<br>";
    echo "檔案原始名稱:".$_FILES['doc']['name']."<br>";
    move_uploaded_file($_FILES['doc']['tmp_name'],"doc/".$_FILES['doc']['name']);
    echo "檔案搬移位置在"."doc/".$_FILES['doc']['name']; */


    if($_FILES['doc']['type']=='text/plain'){ //文字格式才接受
        move_uploaded_file($_FILES['doc']['tmp_name'],'doc/'.$_FILES['doc']['name']);

        $path='doc/'.$_FILES['doc']['name'];

        $file=fopen($path,"r+");

        //$txt=fgets($file);
        $num=1;
        while(!feof($file)){
            $txt=fgets($file);
            $tmp=explode(",",$txt);
            if(count($tmp)==4){
                $content['subject']=$tmp[0];
                $content['description']=$tmp[1];
                $content['create_date']=$tmp[2];
                $content['due_date']=$tmp[3];
                //print_r($tmp);
                save("todo_list",$content);
                //echo "已儲存".$num."筆資料";
                
                $num++;
            }
        }

        to("text-import.php");
        

    }else{
        echo "檔案類型錯誤!";
    }


}else{
    echo "上傳錯誤:".$_FILES['doc']['error'];
}






?>