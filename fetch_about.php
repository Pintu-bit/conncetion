<?php 
include "connect_db.php";
session_start();
$id=$_SESSION['id'];
$fetch_obj=new database();
$name=$_POST['data_type'];
$userId=$_POST['user_id'];
if($userId)
{
	$id=$userId;
	
}

$fect_able="";
$num=$_POST['num'];
if($num==1)
	$fect_able="work,education,place_live,from_live,contact,email,btd,family,relationship";
if($num==2)
	$fect_able="work,education";
if($num==3)
	$fect_able="place_live,from_live";
if($num==4)
	$fect_able="contact,email,btd";
if($num==5)
	$fect_able="family,relationship";
if($userId>0)
{
$fetch_obj->sql_high("about",$fect_able,null,"profile_id=$id and phone_sts!=1 and email_sts!=1");
}
else
{
	$fetch_obj->sql_high("about",$fect_able,null,"profile_id=$id");
}
$fetch_result=$fetch_obj->show();
$resultent_data=array();
$index=0;
foreach($fetch_result as $key=>$value)
{
  
  foreach($value as $new_value)
  {    
	$resultent_data[$index]=$new_value;
	$index++;
  }
}
//PRINT_R($fetch_obj->sql());
$result="";
if($userId>0)
{
	//echo $_POST['user_id'];
$result.='<div style="margin-left:15px;width:100%;height:100px;">';

for($i=0;$i<$index;$i++)
{
	//echo $resultent_data['phone_sts'];
$result.='<h3 style="font-family:monospace;margin-top:-5px;margin-left:5px;">'.$resultent_data[$i].'</h3>';
}

}
else
{
 $result.='<div style="margin-left:15px;width:100%;height:100px;">';

for($i=0;$i<$index;$i++)
{
$result.='<h3 style="font-family:monospace;margin-top:-5px;margin-left:5px;">'.$resultent_data[$i].'<a style="text-decoration:none;" href="editProfile.php">  Edit</a></h3>';
}
}
$result.='</div>';

echo $result;
?>