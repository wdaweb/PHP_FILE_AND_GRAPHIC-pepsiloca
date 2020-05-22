<?php

include_once "base.php";

if(!empty($_GET['id'])){

    $row=find("file_info",$_GET['id']);
}

if(!empty($_POST['submit'])){
    $id=$_POST['id'];
    $source=find("file_info",$id);

    if(!empty($_FILES['upload']['tmp_name'])){
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

        unlink($source['path']);
        
        $name="loca".date("YmdHis").$sub;

        $source['filename']=$name;
        $source['type']=$_FILES['upload']['type'];
        $source['path']="img/".$name;

        move_uploaded_file($_FILES['upload']['tmp_name'],"img/$name");
    }

    $note=$_POST['note'];

    $source['note']=$note;

    save("file_info",$source);

    to("manage.php");

}
?>
<img src="<?=$row['path'];?>" style="width:200px;">

<form action="update_file.php" method="post" enctype="multipart/form-data">
    <input type="file" name="upload"><br>
    <input type="text" name="note" value="<?=$row['note'];?>"><br>
    <input type="hidden" name="id" value="<?=$row['id'];?>">
    <input type="submit" name="submit" value="更新">
</form>