<?php
include_once "base.php";


//if(!empty($_FILES['upload']['tmp_name']))  判斷檔案上傳是否成功
if($_FILES['pic']['error']==0){
    switch($_FILES['pic']['type']){
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
   move_uploaded_file($_FILES['pic']['tmp_name'],"img/".$name); 

   $data=[
       'filename'=>$name,
       'type'=>$_FILES['pic']['type'],
       'note'=>$_POST['note'],
       'album'=>$_POST['album'],
       'path'=>'img/'.$name

   ];
   
   save('file_info',$data);

   $thumb_path="thumb/".$name;
   $source_path="img/".$name;
   
   $img_info=getimagesize($source_path);

   //print_r($img_info);
   
   //縮放比例
   $rate=0.2;

   $img_w=$img_info[0]*$rate;
   $img_h=$img_info[1]*$rate;

   $thumb_img=imagecreatetruecolor($img_w,$img_h);


   switch($img_info['mime']){
    case "image/jpeg";
        $source_img=imagecreatefromjpeg($source_path);
    break;
    case "image/png";
        $source_img=imagecreatefrompng($source_path);
    break;
    case "image/gif";
        $source_img=imagecreatefromgif($source_path);
    break;
    }

    imagecopyresampled($thumb_img,$source_img,0,0,0,0,$img_w,$img_h,$img_info[0],$img_info[1]);

    switch($img_info['mime']){
        case "image/jpeg";
            imagejpeg($thumb_img,$thumb_path);
        break;
        case "image/png";
            imagepng($thumb_img,$thumb_path);
        break;
        case "image/gif";
            imagegif($thumb_img,$thumb_path);
        break;
        }






//    header("location:image.php");
}




?>