<?php 
include "connect_db.php";
session_start();
$id=$_SESSION['id'];
$rctMsg=new database();
$recentMsg_user=new database();
$resultData="";
$rctMsg->sql_high("message","DISTINCT message_to",null,"message_by=$id or message_to=$id ","by mesag_id DESC");
 //print_r($rctMsg->sql());
for($i=0;$i<sizeof($rctMsg->show());$i++)
{
	$msgUser_id=$rctMsg->show();
	$msgUser=$msgUser_id[$i]['message_to'];
	
	if($id!=$msgUser)
	{
		//print_r($msgUser_id[$i]['message_to']);
	$recentMsg_user->sql_high("users","user_id,profile_img,name",null,"user_id=$msgUser");
	$result_user=$recentMsg_user->show();
	  $retMsg=new database();
	  $retMsg->sql_high("message","message",null,"(message_to=$id and message_by=$msgUser) or (message_to=$msgUser and message_by=$id) "," by mesag_id DESC ","1");
	  $messageData=$retMsg->show();
	 // print_r($retMsg->sql());
	  //print_r($result_user[0]['profile_img']);
	  if($result_user[0]['profile_img']!="")
	     $profileImg=$result_user[0]['profile_img'];
      else
		  $profileImg="user.png";
	
 $resultData.='<div style="width:99%;height:60px;margin-top:15px;margin-left:px;">';
 $resultData.='<a href="">';
$resultData.='<div style="width:39px;height:70%;border-radius:50%;float:left;margin-left:px;margin-top:5px;">';
$resultData.='<img src="web_image/'.$profileImg.'" width="100%" height="100%" style="border-radius:50%;" >';
$resultData.='</div>';
$resultData.='<span style="margin-left:10px;margin-top:10px;font-family:monospace;font-size:14px;float:left;"><b>';
$resultData.=$result_user[0]['name'];
$resultData.='</b><span></a>';
$resultData.='<div style="float:left;width:50%;height:35px;margin-left:5%;margin-top:8px;cursor:pointer;">';
$resultData.='<textarea class="make_chat" style="width:100%;cursor:pointer;" data-sender1="'.$result_user[0]['name'].'" data-sender="'.$result_user[0]['user_id'].'">';
$resultData.=$messageData[0]['message'];
$resultData.='</textarea>';
$resultData.='</div></div>'; 
	}
  }
  echo $resultData;
?>