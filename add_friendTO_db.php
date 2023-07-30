<?php 
include "connect_db.php";
session_start();
$session_id=$_SESSION['id'];
$addTODb=new database();
$flwTO_id=$_POST['name_id'];
$addTODb->sql_high("friend","*",null,"follow_to=$flwTO_id and follow_by=$session_id");
if(sizeof($addTODb->show()))
{
	$addTODb->delete("friend","follow_to=$flwTO_id and follow_by=$session_id");
	print_r(1);
}
else
{
$addTODb->insert("friend",['user_id'=>$session_id,'follow_by'=>$session_id,'follow_to'=>$flwTO_id,'accept_sts'=>0]);
print_r(sizeof($addTODb->show()));
}
?>
