<?php 
session_start();
include "connect_db.php";
$add_like=new database();
$post_id=$_POST['like_add_id'];
$cur_user_id=$_SESSION['id'];
$add_like->sql_high("likes","*",null,"like_by=$cur_user_id and post_id=$post_id");
 $likeCountResult=$add_like->show();
if(isset($likeCountResult[0]['like_count']) && $likeCountResult[0]['like_count'])
 {
   $likeCount=$likeCountResult[0]['like_count']-1;
   $add_like->delete("likes","like_by=$cur_user_id and post_id=$post_id"); 
	//print_r($add_like->sql());
 } 
/*else if(isset($likeCountResult[0]['like_count']) && $likeCountResult[0]['like_count']==0)
 { 
   $add_like->update("likes",['post_id'=>$post_id,'like_by'=>$cur_user_id,'like_count'=>1],"like_by=$cur_user_id"); 
	print_r($add_like->sql());
 } */
else
 {
  $add_like->insert("likes",['post_id'=>$post_id,'like_by'=>$cur_user_id,'like_count'=>1]);
  // print_r($add_like->sql());
 }
?>