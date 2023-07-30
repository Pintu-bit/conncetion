<?php
include "connect_db.php";
session_start();
$id=$_SESSION['id'];
if(isset($_POST['phone']) and $_POST['phone']=='on')
{
   $add_details=new database();
    $phone=1;
  $add_details->update("about",['phone_sts'=>$phone],"profile_id=$id");
   header('location:setting.php');
}
if(isset($_POST['view_email']) and $_POST['view_email']=='on')
{
   $add_details=new database();
    $view_email=1;
  $add_details->update("about",['email_sts'=>$view_email],"profile_id=$id");
   header('location:setting.php');
}
if(isset($_POST['password']) and isset($_POST['con_password']))
{
  $password=$_POST['password'];
  $con_password=$_POST['con_password'];
if(($password==$con_password) && $password!="")
 {
  $add_details=new database();
  $password=htmlentities(md5($password),ENT_QUOTES);
  $add_details->update("users",['password'=>$password],"user_id=$id");
   header('location:setting.php');
  }
}
if(isset($_POST['email']) && isset($_POST['mob']))
 {
  $mob=$_POST['mob'];
  $email=$_POST['email'];
  $add_details=new database();
  $add_details->update("users",['email'=>$email,'phone'=>$mob],"user_id=$id");
  header('location:setting.php');
 }
?>