<?php
$post_id=$_POST['id'];
include "connect_db.php";
session_start();
$id=$_SESSION['id'];

$comment_box=""; 
$comment_type="";
$comment_viewer="";
        $post_id=$_POST['id'];
		$comment_obj=new database();
        $user=new database();
		$post=new database();
		$cmt_rep=new database();
		$post->sql_high("post","user_id",null,"post_id=$post_id");
		
		$user->sql_high("users","*",null,"user_id=$id");
		$result=$user->show();
		
		$comment_obj->sql_high("comments","*",null,"post_id=$post_id");
		$comment_result=$comment_obj->show();
		
		if(sizeof($comment_result))
		  {	
	       $check_post_id=$post->show();
		 // print_r($check_post_id[0]['user_id']);
		$comment_viewer.='<span style="font-family:monospace;font-size:16px;"><b style="cursor:pointer;">View more comments</b></spna><br><br>';
		//echo $comment_viewer;
		$count=0;
		for($i=0;$i<sizeof($comment_result);$i++)
		 {
		//$comment_result);
	     $user_id=$comment_result[$i]['comment_by'];
	      
            $comment_user=new database();
		    $comment_user->sql_high("users","user_id,name,profile_img",null,"user_id=$user_id");
			$comment_user_result=$comment_user->show();
            if(isset($comment_user_result[0]['name']) & sizeof($comment_user_result))		
            {	
            $comment_id=$comment_result[$i]['comment_id'];	
              	$cmt_rep->sql_high("comment_like","comment_like",null,"comment_id=$comment_id");
				
	  $comment_box.='<hr></hr>';
      $comment_box.='<div style="height:auto;margin-top:3px;">';
      $comment_box.='<div style="width:30px;height:5%;border-radius:40px;float:left;">';
      $comment_box.='<a href="profile.php?id='.$comment_user_result[0]['user_id'].'"><img src="web_image/'.$comment_user_result[0]['profile_img'].'" width="100%" height="100%" style="border-radius:50%;"></a></div>';
      $comment_box.='<div style="margin-left:40px;width:70%;height:auto;border-radius:10px;background-color:#d4d4d4;">';
      $comment_box.='<b><span style="font-size:16px;margin-left:10px;font-family:monospace;">'.$comment_user_result[0]['name'].'</span></b><br>';
      $comment_box.='<span style="margin-left:10px;font-family:monospace;margin-top:5px;">'.$comment_result[$i]['comments'].'</span>';
       
	  $comment_box.='</div>';
	 if($check_post_id[0]['user_id']==$id || $comment_result[$i]['comment_by']==$id)
	 {
	  $comment_box.='<div style="cursor:pointer;position:relative;left:85%;top:-28px;width:20px;height:20px;">';
	  $comment_box.='<img src="image/delete.png" width="100%" height="100%" class="del_cmt" id="del_cmt'.$comment_result[$i]['comment_id'].'" data-sender="'.$comment_result[$i]['comment_id'].'">';
		$comment_box.='</div>';
	 }
	 $cmt_rep->sql_high("reply_comments","*",null,"comment_id=$comment_id");
                 	if(sizeof($cmt_rep->show())){
		                  $count=sizeof($cmt_rep->show());	
                           //echo sizeof($cmt_rep->show());
					}						  
      $comment_box.='<span data-sender="'.$comment_result[$i]['comment_id'].'" class="comment_like" style="font-size:14px;margin-left:15%;margin-top:-2px;cursor:pointer;font-family:monospace;">Like '.sizeof($cmt_rep->show()).' </span>';
	  $comment_box.='<span style="font-size:14px;margin-left:5%;margin-top:-2px;cursor:pointer;font-family:monospace;" class="reply" data-sender="'.$comment_id.'">reply '.$count.'</span>';
      $comment_box.='<span style="font-size:14px;margin-left:4%;color:grey;margin-top:-2px;">'.$comment_result[$i]['comment_date'].'</span><br>';
	  $comment_box.='<div id="cmt_app'.$comment_result[$i]['comment_id'].'"></div>';
	 
      $comment_box.='</div>';
			}
		
		 }
		 $comment_type.='<form action="add_comments.php?post_id='.$post_id.'" method="post"><div id="cmt" style="margin-left:px;width:100%;height:50px;">';
		$comment_type.='<div style="margin-top:8px;width:40px;height:80%;border-radius:30px;float:left;">';
		
		 $hImage="";
		 if($result[0]['profile_img']!=null)
		 {
			 $hImage=$result[0]['profile_img'];
		 }
		 else
		 {
		    $hImage='user.png';
     	  }
		
		$comment_type.='<a href=""><img src="web_image/'.$hImage.'" width="100%" height="100%" style="border-radius:50%;"></a></div>';
		$comment_type.='<textarea style="margin-left:10px;margin-top:15px;width:60%;height:28px;border-radius:5px;" placeholder="write a Comment..." name="comments"></textarea>';
		$comment_type.='<button style="position:relative;top:-12px;height:30px;left:3px;">Send</button></from>';
		
		$comment_type.='</div>';
		  }
		   else
		  {
	
		  $comment_type.='<h3 style="font-family:monospace;">'.'No more comments'.'</h3>';
		  $comment_type.='<form action="add_comments.php?post_id='.$post_id.'"method="post"><div id="cmt" style="margin-left:px;width:100%;height:50px;">';
		  
		 $hImage="";
		 if($result[0]['profile_img']!=null)
		 {
			 $hImage=$result[0]['profile_img'];
		 }
		 else
		 {
		    $hImage='user.png';
     	  }
		  $comment_type.='<div style="margin-top:8px;width:40px;height:80%;border-radius:30px;float:left;">';
		  $comment_type.='<a href=""><img src="web_image/'.$hImage.'" width="100%" height="100%" style="border-radius:50%;"></a></div>';
		  $comment_type.='<textarea style="margin-left:10px;margin-top:15px;width:60%;height:28px;border-radius:5px;" placeholder="write a Comment..." name="comments"></textarea>';
		  $comment_type.='<button style="position:relative;top:-12px;height:30px;left:3px;">Send</button></form>';
	
		  }
		  	echo $comment_box;
          echo $comment_type;

?>