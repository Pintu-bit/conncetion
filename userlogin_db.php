<?php 
include 'connect_db.php';
session_start();
$username=htmlentities($_POST['username'],ENT_QUOTES);
$password=htmlentities(md5($_POST['password']),ENT_QUOTES);
$log=new database();
$log->sql_high("users","*",null,"username='$username' and password='$password'",null,null);
$result=$log->show();
if(sizeof($log->show()))
{
	if($result[0]['user_sts']==0)
	{
	$result=$log->show();
	$_SESSION['user']=$username;
	$_SESSION['id']=$result[0]['user_id'];
	header('location:profile.php');
	}
	else
	{
		header('location:login.php?id=3');
	}
}
else
{
	header('location:login.php?id=2');
}

?>
