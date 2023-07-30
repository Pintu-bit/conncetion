<?php 
include "connect_db.php";
$returnItem="";
$comment_id=$_POST['comment_id'];
  $reply_comment_view=new database();
  $reply_comment_view->sql_high("reply_comments","*",null,"comment_id=$comment_id");
   if(sizeof($reply_comment_view->show()))
   {
	   
	      $fetch_userObj=new database();
	   $fetch_message=$reply_comment_view->show();
	   for($i=0;$i<sizeof($fetch_message);$i++)
	   {
		$user_id=$fetch_message[$i]['reply_by'];
	     $repCmt_id=$fetch_message[$i]['repCmt_id'];
	   $fetch_userObj->sql_high("users","name,profile_img",null,"user_id=$user_id");
	   $data=$fetch_userObj->show();
		$returnItem.='<div style="border-radius:50px;width:30px;height:30px;position:relative;top:12px;margin-top:-10px;">';
		$returnItem.='<img src="web_image/'.$data[0]['profile_img'].'" width="100%" height="100%" style="border-radius:50px;"/>';
		$returnItem.='</div>';
	    $returnItem.='<div style="position:relative;top:17px;border-radius:10px;margin-left:40px;margin-top:-46px;width:160px;height:40px;background-color:#d4d4d4;">';
		$returnItem.='<b><p style="font-size:12px;position:relative;top:3px;margin-left:10px;">'.$data[0]['name'].'</p></b>';
	    $returnItem.='<p style="font-family:monospace;font-size:14px;margin-left:10px;margin-top:-10px;">'.$fetch_message[$i]['reply_comment'].'</p>';
	    $returnItem.='</div>';
	   $returnItem.='<div style="cursor:pointer;position:relative;left:65%;top:-16px;width:20px;height:20px;">';
	    $returnItem.='<img src="image/delete.png" width="100%" height="100%" class="del_cmt1" id="del_cmt'.$comment_id.'" data-sender="'.$repCmt_id.'">';
		$returnItem.='</div>';
		
	   }
   }  		   
   print_r($returnItem);
?>
