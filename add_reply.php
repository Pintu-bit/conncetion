<?php
session_start();
$id=$_SESSION['id'];
include "connect_db.php";
$rep_com=new database();
$cmt_id=$_POST['cmnt'];
$reply_comments=$_POST['fetch_data'];
$rep_com->insert("reply_comments",['comment_id'=>$cmt_id,'reply_comment'=>$reply_comments,'reply_by'=>$id]);
echo sizeof($rep_com->show());
?>