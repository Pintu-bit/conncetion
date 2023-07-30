<!doctype html>
<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<title>CONNECTION</title>
</head>
<body>
<?php 
session_start();
if(isset($_SESSION['user']))
{
	include "connect_db.php";
	$username=$_SESSION['user'];
	$user_id=$_SESSION['id'];
	$profile_obj=new database();
	$profile_obj->sql_high("users","*",null,"user_id=$user_id",null,null);
	if(sizeof($profile_obj->show()))
	{
		$fetch_about=new database();
		$fetch_about->sql_high("about","work",null,"profile_id=$user_id");
		$fetch_data=$fetch_about->show();
		$result=$profile_obj->show();
?>
 <div id="tak" style="position:fixed;height:90px;width:90%;top:1px;margin-left:30px;background-color:#d4d4d4;z-index:999;">  
	<div style="float:left;width:20%;height:40px;margin-top:30px;">
	<img src="image/logo1.png" width="100%" height="100%" >
	</div>
	<a href="">
	 <div style="width:50px;height:50%;margin-left:10px;border-radius:50%;margin-top:25px;float:left;">
	 <?php 
 if($result[0]['profile_img']) 
	 $image=$result[0]['profile_img'];
 else
	 $image="user.png";
 
?>
	 <img src="web_image/<?php echo $image;?>" width="100%" height="100%" style="border-radius:50%;">
	</div>
	 </a>
	<div style="width:15%;height:70px;float:left;margin-left:10px;margin-top:20px;">
	<b><span style="font-family:monospace;margin-left:10px;position:relative;top:20px;font-size:16px;"><?php print_r($result[0]['name']);?></span></b>
	</div>
	<form action="search.php" method="post">
    <input  name="data" type="text/number" style="background-color:#d4d4d4;float:left;font-family:monospace;border:none;border-bottom:solid 1px;width:35%;height:40px;margin-left:6%;margin-top:35px;" placeholder="Type here to Search...">
	
	<div  id="search" style="margin-right:0%;width:40px;height:40px;float:left;margin-top:40px;cursor:pointer;margin-left:2%;">
	<button style="height:40px;width:40px;border:none;background-color:#d4d4d4;cursor:pointer;"><img src="image/search.png" width="100%" height="100%" ></button>
	</div>
	</form>
  </div>
  <?php
	}
}
?>
</body>
</html>