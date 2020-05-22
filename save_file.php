<?php
include_once "base.php";
//if(!empty($_FILES['upload']['tmp_name']))  判斷檔案上傳是否成功
if($_FILES['upload']['name']==0){
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
    //$sub[1];->副檔名

    $name='loca'.date("Ymdhis").$sub;
   move_uploaded_file($_FILES['upload']['tmp_name'],"img/".$name); 

   $data=[
       'filename'=>$name,
       'type'=>$_FILES['upload']['type'],
       'note'=>$_POST['note'],
       'album'=>$_POST['album'],
       'path'=>'img/'.$name

   ];
   echo "<pre>";
   print_r($data);
   echo "</pre>";
   save('file_info',$data);

   header("location:manage.php");
}
?>









