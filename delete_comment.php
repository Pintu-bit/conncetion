<?php 
include "connect_db.php";
$cmt_id=$_POST['comment_id'];
$del=new database();
if(isset($_POST['rep']))
{
	
	$del->delete("reply_comments","repCmt_id=$cmt_id");
	print_r($del->sql());
}
else
{

$del->delete("comments","comment_id=$cmt_id");
//if(sizeof($del->show()))
	$del->delete("reply_comments","comment_id=$cmt_id");
   print_r($del->sql());
}
?>