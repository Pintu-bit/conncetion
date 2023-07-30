<?php
session_start();
include "connect_db.php";
$user=$_SESSION['user'];
$file=$_FILES['file_to_upload'];
$obj_pro=new database();
if(($file["type"]=="image/jpg") || ($file["type"]=="image/png") || ($file["type"]=="image/jpeg"))
{
	if($file['size']<=5000000)
	{
	
     $obj_pro->update("users",['profile_img'=>$file['name']],"username='$user'");
      if(sizeof($obj_pro->show()))
      {
		  echo move_uploaded_file($_FILES['file_to_upload']['tmp_name'],"web_image/".$file['name']);
        header('location:profile.php');
      }
     else
      {
        header('location:profile.php?id=2');
      }
	 }
	 else
	 {
		 	//echo $file['size'];
  		header('location:profile.php?id=size');
	 }

}
else
{
	header('location:profile.php?id=type');
}
?>
