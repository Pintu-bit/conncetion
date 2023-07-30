<?php
session_start();
include "connect_db.php";
$username=$_SESSION['user'];
$obj_del=new database();
$obj_del->sql_high("users","profile_img",null,"username='$username'");
	 $image=$obj_del->show();
      $del_image=$image[0]['profile_img'];
if(unlink("web_image/$del_image"))
{
	$obj_del->update("users",['profile_img'=>NULL],"username='$username'");
if(sizeof($obj_del->show()))
    {
     echo 1;
	 }
	 else
	 {
	  echo 0;
	  }
}	  
?>
	  