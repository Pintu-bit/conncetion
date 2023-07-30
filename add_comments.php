<?php 
session_start();
include "connect_db.php";
$user_id=$_SESSION['id'];
$post_id=$_GET['post_id'];
$comments=$_POST['comments'];
date_default_timezone_set('Asia/Kolkata');
$date_time=date('Y-m-d H:i:s');
$add_comment=new database();
$add_comment->insert("comments",['post_id'=>$post_id,'comment_by'=>$user_id,'comments'=>$comments,'comment_date'=>$date_time]);
 if(sizeof($add_comment->show()))
  {
	  if(isset($_GET['add']))
         header('location:profile.php');
	   //print_r($add_comment->show());
       else 
		 header('location:home.php');
	   // print_r($add_comment->show());
  }
   else
  header('location:profile.php?cmt_id=0');
   
   //echo $post_id;
?>