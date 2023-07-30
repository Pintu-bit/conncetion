<?php 
session_start();
$id=$_SESSION['id'];
include "connect_db.php";
$add_msg=new database();
$userImg=new database();
$messageFetch="";
date_default_timezone_set('Asia/Kolkata');
if(isset($_POST['receiver']))
  {
	  $user_id=$_POST['receiver'];
     $add_msg->sql_high("message","*",null,"(message_by=$id and message_to=$user_id) or (message_by=$user_id and message_to=$id)");
     $message_data=$add_msg->show();
     for($i=0;$i<sizeof($message_data);$i++)
     {
		 $date1=date('y-m-d',strtotime($message_data[$i]['message_date']));
		 $date2=date('d-m-y');
		  if($date2>$date1)
		  {
		//$cur_date=date_diff(strtotime(date('d-m-y H:i:s')),strtotime($message_data[$i]['message_date']));
		   $cur_date='1 day ago';
		  }
		  else{
	        
		     $cur_date=date('H:i A',strtotime($message_data[$i]['message_date']));
			//$cur_date=date_diff(strtotime(date('d-m-y H:i:s')),strtotime($message_data[$i]['message_date']));
					//$cur_date=$date2>$date1;
		  }
		 if($message_data[$i]['message_by']==$id)
		 {
			
       $messageFetch.='<div style="margin-left:20%;width:80%;height:auto;margin-top:5px;border-radius:6px;background-color:#d4d4d4;">';
	   $messageFetch.='<span style="margin-left:10px;font-size:14px;font-family:monospace;">'.$message_data[$i]['message'].'</span>';
       
		
	  $messageFetch.='<br><span style="position:relative;left:77%;top:1px;font-size:12px;">'.$cur_date.'</span>';
	   $messageFetch.='</div>';
		 }
		 else
		 {
			 $temp_id=$message_data[$i]['message_by'];
			 $userImg->sql_high("users","profile_img",null,"user_id=$temp_id");
			 $dp=$userImg->show();
			 //print_r($dp);
		$messageFetch.='<div style="width:26px;height:26px;float:left;position:relative;top:5px;border-radius:50%;">';
		$messageFetch.='<img src="web_image/'.$dp[0]['profile_img'].'" width="100%" height="100%" style="border-radius:50px;">';
		$messageFetch.='</div>';
		$messageFetch.='<div style="margin-left:35px;width:80%;height:auto;margin-top:5px;border-radius:5px;background-color:#d4d4d8;">';
	    $messageFetch.='<span style="margin-left:10px;font-size:14px;font-family:monospace;">'.$message_data[$i]['message'].'</span>';
	    $messageFetch.='<br><span style="position:relative;left:77%;top:1px;font-size:12px;">'.$cur_date.'</span>';
	    $messageFetch.='</div>';
		 }
      }
      print_r($messageFetch);
  }
  else
  {
	  $message=$_POST['message'];
$action=$_POST['action'];
$user_id=$_POST['user_id'];
$add_msg->insert("message",['message'=>$message,'message_by'=>$id,'message_to'=>$user_id,'message_date'=>date('d-m-y H:i:s')]);
//sizeof($add_msg->show());
 /*$add_msg->sql_high("message","*",null,"message_by=$id and message_to=$user_id");
 $message_data=$add_msg->show();
 for($i=0;$i<sizeof($message_data);$i++)
 {
  $messageFetch.=$message_data[$i]['message'];
 }
 print_r($messageFetch);*/
 //echo sizeof($add_msg->show());
  }
?>