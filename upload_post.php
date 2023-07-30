<?php 
/*if(!isset($_SESSION['user']))
{
	header('location:login.php');

else{*/	
include "connect_db.php";
session_start();
$post_obj=new database();
$user=$_SESSION[''];

$description=htmlentities($_POST['des'],ENT_QUOTES);
$image=$_FILES['file_to_upload1'];

 if($image!="" && ($image['type']=='image/jpeg' || $image['type']=='image/png' || $image['type']=='image/jpg' || $image['type']=='image/gif'))
 {
 $image_name=$image['name'];
$user_id=$_SESSION['id'];
date_default_timezone_set('Asia/Kolkata');
$date_time=date('Y-m-d H:i:s');
$post_obj->insert("post",['post_description'=>$description,'post_date'=>$date_time,'post_image'=>$image_name,'user_id'=>$user_id]);
if(sizeof($post_obj->show()) && (move_uploaded_file($image['tmp_name'],"web_image/".$image['name'])))
{
	echo "<script>alert('Post Uploaded Successfully!!!!');</script>";
	header('location:home.php');
}
else
 {
  header('location:home.php?rec_id=2');
 }
}else
{
	$user_id=$_SESSION['id'];
date_default_timezone_set('Asia/Kolkata');
//$image_name='logo3.png';
$date_time=date('Y-m-d H:i:s');
$post_obj->insert("post",['post_description'=>$description,'post_date'=>$date_time,'user_id'=>$user_id]);
if(sizeof($post_obj->show()) )
{
	echo "<script>alert('Post Uploaded Successfully!!!!');</script>";
	header('location:home.php');
}
else
 {
  header('location:home.php?rec_id=2');
 }
}
?>