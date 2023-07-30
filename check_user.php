<?php 
include "connect_db.php";
session_start();
$id=$_SESSION['id'];
$password=htmlentities(md5($_POST['password']),ENT_QUOTES);
$new_obj=new database();
$new_obj->sql_high("users","name",null,"password='$password' and user_id=$id");
$new_obj->show();
//print_r($new_obj->show());
echo sizeof($new_obj->show());
?>