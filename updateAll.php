<?php
include "connect_db.php";
session_start();
$id=$_SESSION['id'];
$name=$_POST['name'];
$updat=new database();
if($name!="")
{
$updat->update("users",['name'=>$name],"user_id=$id");
 if(sizeof($updat->show()))
 {
	 echo 1;
 }
 else
 {
	 echo 0;
 }
}
?>