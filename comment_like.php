<?php 
session_Start();
include "connect_db.php";
$id=$_SESSION['id'];
$comment_id=$_POST['comment_id'];
$addLike=new database();
$addLike->update("comments",['comment_like'=>+1,'like_by'=>$id],"comment_id=$comment_id");
$addlike_result=$addLike->show();
print_r(sizeof($addLike_result)); 
?>