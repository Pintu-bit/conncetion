<head>
<style>
.dv{
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
#profile_div1
{
	width:25%;
	
	height:600px;
	margin-left:30px;
	float:left;
	position:relative;
	top:30px;

	position:fixed;
	top:100px;
	
}
.inner_content
{
	position:relative;
	/*left:120px;*/
	 top:-7px;
	 font-family:monospace;
	 color:#676363;
	 align:left;
	 left:10px;
	 top:10px;
}
.profile_list
{
	width:100%;
	height:40px;
	position:relative;
	top:00px;
	
     border-radius:5px;
	margin-top:20px;
	
	
}
.profile_list:hover{
	 background-color:#ababab;
}
.link{
text-decoration:none;
}
.icon_img
{
width:40px;
height:80%;
float:left;
margin-left:40px;
margin-top:5px
}
#ntf{
	cursor:pointer;
}
#tak{
	border:solid 1px;
	z-index:99;
	height:10px;
}
.notification-bell
{
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
#remove_ntf
{
	cursor:pointer;
}
#upload
{
 cursor:pointer; 
}
.div_Scroll::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
.div_Scroll {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */

}
</style>
<link rel="stylesheet" href="jqueryui/jquery-ui.css">
 <link rel="stylesheet" href="jqueryui/jquery-ui.structure.css">
 <link rel="stylesheet" href="jqueryui/jquery-ui.theme.css">
</head>
<body bgcolor="#e8e8e8">
<?php 
include "common.php";
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}
else{
	if(isset($_GET['rec_id']) && $_GET['rec_id']==1)
	{
		echo '<script>alert("Upload Successfully!");</script>';
	}
?>
<div id="profile_div1" >
 <div style="width:100%;height:auto;margin-top:10px;">
 <div class="profile_list" id="upload">
<div class="icon_img" >
<img src="image/upload.png" width="90%" height="100%" >
</div>
<h3 class="inner_content" >CREATE POST</h3>
</div>
<br>
<a href="profile.php" class="link" ><div class="profile_list">
<div class="icon_img" >
<img src="image/user.png" width="90%" height="100%" >
</div>
<h3 class="inner_content" >PROFILE</h3>
</div><br></a>	
<a href="message.php"  class="link"><div class="profile_list">
<div class="icon_img" id="chatbox">
<img src="image/comments.png" width="90%" height="100%" >
</div>
<h3 class="inner_content" >MESSAGE</h3>
</div><br></a>
<a href="home.php"  class="link"><div class="profile_list">
<div class="icon_img">
<img src="image/home.png" width="90%" height="100%" >
</div>
<h3 class="inner_content" >HOME</h3>
</div><br></a>
<a href="friends.php"  class="link"><div class="profile_list">
<div class="icon_img">
<img src="image/followers.png" width="90%" height="100%" >
</div>
<h3  class="inner_content" >FRIENDS</h3>
</div><br></a>

<div id="ntf"  class="profile_list">
<div class="icon_img">
<img src="image/notification-bell.png" width="90%" height="100%" >
</div>
<h3 class="inner_content" >NOTIFICATION</h3>
</div><br>
<a href="add_friend.php"  class="link">
<div class="profile_list">
<div class="icon_img">
<img src="image/friends.png" width="90%" height="100%" >
</div>
<h3 class="inner_content" >ADD FRIENDS</h3>
</div><br></a>
<a href="log_out.php"  class="link"><div class="profile_list">
<div class="icon_img">
<img src="image/logout.png" width="90%" height="100%" >
</div>
<h3 class="inner_content" >LOGOUT</h3>
</div></a>
</div>
</div>

<div style="width:40%;height:650px;float:right;position:relative;top:100px;left:30%;float:left;">
<?php 
 $post_fetch=new database();
 $post_fetch->select("post","select *from post");
 $post_result=$post_fetch->show();
  for($i=0;$i<sizeof($post_result);$i++)
   {
	 $id=$post_result[$i]['user_id'];
	if($id!=0)
	{
     $post_user=new database();	 
	 $post_user->sql_high("users","name,profile_img,user_id",null,"user_id=$id");
	 $user_result=$post_user->show();
	  
	?>
<div class="dv" style="margin-left:20px;width:90%;height:auto;margin-top:15px;background-color:#ebebeb;border-radius:5px;">
<div class="report_view" data-sender="<?php print_r($post_result[$i]['post_id']);?>" style="float:right;margin-right:10px;cursor:pointer;width:30px;height:30px;margin-top:5px;">
<img src="image/more.png" width="100%" height="100%">
</div>
<div id="result_report<?php print_r($post_result[$i]['post_id']);?>" data-sender="<?php print_r($post_result[$i]['post_id']);?>" style="float:right;margin-top:5px;"></div>
<a href=""> 
 <div style="margin-left:20px;margin-top:5px;width:12%;height:60px;float:left;">
 <a href="profile.php?id=<?php print_r($user_result[0]['user_id']);?>">
<img src="web_image/<?php 
if($user_result[0]['profile_img'])
{
  print_r($user_result[0]['profile_img']);
}
else
{
	echo "user.png";
}
  ?>" width="100%" height="90%" style="border-radius:50%;">
  </a>
</div>
</a>
<div style="margin-left:25%;position:relative;top:15px;width:60%;height:50px;">
<b><span style="margin-left:10px;font-size:18px;font-family:monospace;"><?php print_r($user_result[0]['name']);?></span></b><br>
<span style="margin-left:10px;"><?php print_r($post_result[$i]['post_date']);?></span>
</div><br>
<div style="margin-left:20px;width:90%;height:auto;">
<i><b><span><?php print_r($post_result[$i]['post_description']);?></span></i></b>
</div>
<?php 
 if($post_result[$i]['post_image']=="")
 {
	 
 }else{
	 ?>
<div style="margin-left:20px;margin-top:5px;width:90%;height:200px;">
<center><img src="web_image/<?php print_r($post_result[$i]['post_image']);?>" width="auto" height="100%" ></center>
</div>
<?php 
 }
 ?>
<div style="margin-left:5%;margin-top:10px;width:27%;height:25px;float:left;">
  <img src="like.png"  width="25%" height="100%" class="dlk"  data-sender="<?php print_r($post_result[$i]['post_id']); ?>" data-res='dlike' style="cursor:pointer;">
  
<?php
$post_id="";
$post_id=$post_result[$i]['post_id']; 
  $like_counter=0;
   $likeViewPro=new database();
   $likeViewPro->sql_high("likes","like_count",null,"post_id=$post_id and like_count=1");
    $likeCounter=$likeViewPro->show();
   if(sizeof($likeCounter))
   {
	  $like_counter=sizeof($likeCounter);
   }
?>
  
  <span style="position:relative;top:-10px;margin-left:5px;font-family:monospace;"><?php echo $like_counter;?></span>
<center><p class="like_count" style="margin-top:7px;">
<?php

$post_id="";
$post_id=$post_result[$i]['post_id']; 

?>
</p></center>  
</div>
<div style="margin-left:40%;margin-top:10px;width:55%;height:25px;">
<img src="image/comment.png"  width="30px" height="100%" style="">
<span class="cmt"  data-sender="<?php echo $i; ?>" data-comment="<?php print_r($post_result[$i]['post_id']);?>" style="text-decoration:none;font-family:monospace;font-size:16px;margin-left:3%;position:relative;top:-10px;cursor:pointer;">

<span><u>Comments</u></span>
<?php 
$cmtR=0;
$cmt_count=new database();
$cmt_count->sql_high("comments","comments",null,"post_id=$post_id");
$cmtR=sizeof($cmt_count->show());
?>
 <span style="margin-left:5px;font-family:monospace;"><?php echo $cmtR; ?></span>
</span>
</div>

<div id="res<?php echo $i;?>" style="height:auto;width:90%;margin-top:5px;margin-left:15px;">

</div>
<br>
</div>

<?php 
   }else
   {
	   ?>
	   
<div class="dv" style="margin-left:20px;width:90%;height:auto;margin-top:15px;background-color:#ebebeb;border-radius:5px;">

 <div style="margin-left:20px;margin-top:5px;width:12%;height:60px;float:left;">

<img src="web_image/avatar.gif" width="100%" height="90%" style="border-radius:50%;">
 
</div>

<div style="margin-left:25%;position:relative;top:15px;width:60%;height:50px;">
<b><span style="margin-left:10px;font-family:monospace;color:red;font-size:16px;"> CONNECTION </span></b><br>
<span style="margin-left:10px;"><?php print_r($post_result[$i]['post_date']);?></span>
</div><br>
<div style="margin-left:20px;width:90%;height:auto;">
<i><b><span><?php print_r($post_result[$i]['post_description']);?></span></i></b>
</div>
<?php 
 if($post_result[$i]['post_image']=="")
 {
	 
 }else{
	 ?>
<div style="margin-left:20px;margin-top:5px;width:90%;height:200px;">
<center><img src="web_image/<?php print_r($post_result[$i]['post_image']);?>" width="auto" height="100%" ></center>
</div>
<?php 
 }
 ?>
<br>
</div>
 <?php
 }   
}
?>


</div>

<div id="result" class="div_Scroll" style="width:24%;height:86%;float:left;position:fixed;top:130px;left:70%;overflow-y:scroll;">
<b><span style="margin-left:10px;margin-top:-8px;font-family:monospace;font-size:16px;">Recent Contacts<span></b>
<?php 
$rec_id=$_SESSION['id'];
$recent_C=new database();
$recent_C->sql_high("message","DISTINCT message_to",null,"message_by=$rec_id");
$recent_data_size=sizeof($recent_C->show());
$recent_data=$recent_C->show();
//print_r($recent_C->sql());
 for($i=0;$i<$recent_data_size;$i++)
 {
	 $cur_id=$recent_data[$i]['message_to'];
	 $user_fetch=new database();
	 $user_fetch->sql_high("users","*",null,"user_id=$cur_id");
	 $fetch_result=$user_fetch->show();
	 ?>
<div style="width:250px;height:40px;margin-top:5px;margin-left:15px;">
<a href="">
<div style="width:32px;height:80%;border-radius:50%;float:left;margin-left:px;">
<img src="web_image/
<?php 
if($fetch_result[0]['profile_img']=="")
   echo "user.png";
else	
 print_r($fetch_result[0]['profile_img']); 
?>
" width="100%" height="100%" style="border-radius:50%;" >
</div>
<span style="margin-left:10px;margin-top:10px;font-family:monospace;font-size:12px;float:left;"><b><?php print_r($fetch_result[0]['name']); ?></b><span>
</a>
<div class="make_chat" style="float:left;width:25px;height:25px;margin-left:20%;margin-top:4px;cursor:pointer;" data-user="<?php print_r($fetch_result[0]['name']);?>" data-sender="<?php print_r($fetch_result[0]['user_id']);?>">
<img src="image/comments.png" width="100%" height="100%" >
</div>
</div>
<?php 
 }
 ?>
</div>
<div id="rece"></div>
</body>
<script src="jquery.js" type="text/javascript"></script>
 <script src="jqueryui/jquery-ui.js" type="text/javascript"></script>
<script>
var append_data;
var cmt_id;
function create_notification(){
	var model_content="";
  model_content+='<div id="noti" class="div_Scroll" style="overflow-x: hidden;position:relative;left:23%;top:30px;width:400px;height:600px;z-index:999;border:;background-color:#d6d6d6;overflow-y:scroll;">';
  model_content+='<div style="width:98%;height:40px;border:;" title="t" >';
  model_content+='<span style="font-size:16px;position:relative;font-family:monospace;position:relative;top:5px;"><center><b><i>'+'NOTIFICATIONS'+'</i></b></center></span>'
   model_content+='</div>';
   <?php 
    for($i=0;$i<5;$i++)
	{
		?>
   model_content+='<div class="notification-bell"  style="border-radius:5px;background-color:#ababab;word-wrap:break-word;width:98%;height:auto;border:;position:relative;top:5px;left:3px;margin-top:10px;">';
   model_content+='<img src="image/profile.png" width="7%" height="5%">';
	model_content+='<p style="font-size:14px;font-family:monospace;position:relative;top:-5px;left:20px;">'+'pintu fghgn hfgjkghm jggfhkfg , you have a suggetions , as <a href="">angel priya</a>.'+'</p>';
   model_content+='</div>';
	<?php
	}
	?>
  model_content+='</div>';
 return model_content;
}

	$(document).ready(function(){
	 $(document).on('click','#ntf',function(){
	   var id=document.getElementById('ntf');
	   if(id){
		$('#tak').append(create_notification());
	   id.id='remove_ntf';
	   }
	 });
	   $(document).on('click','#remove_ntf',function(){
	    $('#noti').remove();
		var change_id=document.getElementById('remove_ntf');
		change_id.id='ntf'; 
	 });
	 $(document).click(function(e){
		   //alert();		
            });
	});

 function fetch_user_message(receiver)
     {
   
       $.ajax({
        url:"add_message.php",
        type:"POST",
        data:{receiver:receiver},
        success:function(data) 
         {
           $("#chat_history_"+receiver).html(data);
         }
         });
    }
	$(document).ready(function(){
	
    $(document).on('click','.cmt',function(){
		 var dataFetch=$(this).data('sender');
		 var com=$(this).data('comment');
		 //var point='#res'+data;
		 //alert(com);
		var div_id=document.getElementById('res'+dataFetch);
		if(div_id)
		{	
	      //// var append_data=make_comment_box(com);
	      // alert(com);
		 
		$.ajax({
			url:"just_test.php",
			type:"POST",
			data:{id:com},
			success:function(data)
			{
			
			  $('#res'+dataFetch).append(data);
			  div_id.id='res1'+dataFetch;
			  //console.log(data);
			}			
		  });
		 //console.log(append_data);
		//$('#res'+data).append(append_data);
		//div_id.id='res1'+dataFetch;
		}
	    else
		{
			$('#res1'+dataFetch).empty(append_data);   
		var div_id=document.getElementById('res1'+dataFetch);
		
		div_id.id='res'+dataFetch;
		}
	   }); 
	   function make_chat_box(to_user,user_name)
	  {
       var modal_content= '<div style="" id="user_dialog_'+to_user+'" class="user_dialog" title="you have chat with  '+user_name+'" style="z-index:990">';
        modal_content+='<div style="height:400px; border:1px solid #ccc; overflow-y:scroll; margin-bottom:24px;padding:16px;" class="chat_history" data-touserid="'+to_user+'" id="chat_history_'+to_user+'">';
        fetch_user_message(to_user);
        modal_content +='</div>';
        modal_content +='<div class="form-group">';
        modal_content +='<textarea name="chat_message_'+to_user+'"id="chat_message_'+to_user+'" class="form-control chat_message"  class="c"></textarea>';
        modal_content +='</div><div class="form-group" align="right">';
        modal_content +='<button type="button" name="send_chat" id="'+to_user+'"  data-sender="'+to_user+'" class="send_chat">Send</button></div></div>';
        $('#rece').html(modal_content);
   }  
	   $(document).on('click','.make_chat',function()
	   {
		 var id=$(this).data('sender');
		 var username=$(this).data('user');
		 make_chat_box(id,username);
		   $("#user_dialog_"+id).dialog({
              autoOpen:false,
               width:400,
			   top:200			   
             });
	$('#user_dialog_'+id).dialog('open');
	 });
	 $(document).on('click','#upload',function(){
		 var upload_content="";
		 upload_content+='<form action="upload_post.php" method="post" enctype="multipart/form-data">';
		upload_content+='<center><div style="border-radius:5px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);background-color:#ffff;position:relative;top:100px;width:50%;height:300px;border:solid 1px;z-index:999;">';
		upload_content+='<p style="font-family:monospace;font-size:16px;"><b>'+'CREATE POST'+'</b></p>';
		upload_content+='<div onclick="remove_up()" style="cursor:pointer;width:20px;height:25px;float:left;position:relative;top:-45px;left:10px;">';
		upload_content+='<img src="image/x.png"  width="100%" height="100%"></div>';
		upload_content+='<hr style="height:2px;position:relative;left:-10px;background-color:black;"></hr>';
		upload_content+='<input type="file" style="position:relative;left:-10px;border-radius:5px;width:80%;height:40px;border:solid 1px;background-color:#ebebeb;" name="file_to_upload1" >';
		upload_content+='<br><br><textarea name="des" style="width:80%;height:100px;"></textarea><br><br>';
		upload_content+='<button style="float:left;width:150px;height:30px;position:relative;left:27%;">Upload</button></form>';
		upload_content+='<div onclick="remove_up()" style="cursor:pointer;background-color:#ebebeb;margin-left:10px;float:left;width:150px;height:28px;position:relative;left:27%;border:solid 1px;">';
		upload_content+='<span style="position:relative;top:5px;font-family:monospace;font-size:16px;">Remove</span></div>';
		upload_content+='</div></center>';
		document.body.innerHTML=upload_content;
	 });
	
});
  $(document).on('click','.dlk',function()
       {
	      var like_add_id=$(this).data('sender');
		  //alert(like_add_id);
		  $.ajax({
		    url:"add_like.php",
			type:"POST",
			data:{like_add_id:like_add_id},
			success:function(data){
				//if(data==1)
				//{
				  window.location.reload();
				//}
				//console.log(data);
			}
		  });
	   
	   });
$(document).ready(function()
{
	 $(document).on('click','.reply',function()
	   {
		   //alert();
		   //var id=document.getElementById('cmt_app');
		   
		   cmt_id=$(this).data("sender");
		   //alert(cmt_id);
		  var reply_comt="";
		  $.ajax({
		     url:"fetch_reply_message.php",
			 type:"POST",
			 data:{comment_id:cmt_id},
			 success:function(data)
			 {
				 //alert(data);
			       if(document.getElementById('fetch'+cmt_id)!=4)
				   {
				    $('#fetch'+cmt_id).append(data);
				    document.getElementById('fetch'+cmt_id).id=4;
				   }
				  /* else
				   {
					   $('#fetch'+cmt_id).remove();
				        document.getElementById('fetch'+cmt_id).id='fetch'+cmt_id;
				   }*/
			  }
		  });
		  reply_comt+='<div id="fetch'+cmt_id+'" style="margin-left:70px;"></div>';
		  reply_comt+='<div style="margin-left:40px;margin-top:px;width:30px;height:30px;border-radius:50px;">';
		  reply_comt+='<img src="web_image/<?php print_r($result[0]['profile_img']);?>" style="border-radius:50%;" width="100%" height="100%" />';
		  reply_comt+='</div>';
		   
		  reply_comt+='<div style="margin-left:80px;width:250px;height:30px;border-radius:5px;margin-top:-20px;">';
		
		  reply_comt+='<input id="fetch_data'+cmt_id+'" type="text\number" name="comment" placeholder="Write reply...." style="width:70%;height:80%;float:left;border-radius:5px;border:none;border-bottom:solid 2px; "/>';
		  reply_comt+='<button style="margin-left:5px;margin-top:3px;" class="send">send</button>';
		
		  reply_comt+='</div>';	
		   
            //$('#cmt_app'+cmt_id).append(reply_comt);		  
          if(document.getElementById('cmt_app'+cmt_id)!=4){
		  $('#cmt_app'+cmt_id).append(reply_comt);    
           document.getElementById('cmt_app'+cmt_id).id=4;
		  }
           /*else {
  	            document.getElementById('cmt_app'+cmt_id).remove();
				document.getElementById('cmt_app'+cmt_id).id='cmt_app'+cmt_id;
		   }*/
             
              		  
	   }); 
	     //}); 
     $(document).on('click','.send',function()
	 {
		 //alert(cmt_id);
		 var reply_data=document.getElementById('fetch_data'+cmt_id).value;
		 $.ajax({
			url:"add_reply.php",
		 type:"POST",
		 data:{cmnt:cmt_id,fetch_data:reply_data},
		 success:function(data)
		 {
		  if(data==1)
			  window.location.reload();
		 }
		 });
	 }); 
	 $(document).on('click','.del_cmt',function()
	 {
		 cmt_id=$(this).data('sender');
		 if(confirm("Do you want to delete ?"))
		 {
		 $.ajax({
		    url:"delete_comment.php",
			type:"POST",
			data:{comment_id:cmt_id},
			success:function(data)
			{
				//alert(data);
				if(data)
			    window.location.reload();
			}
		 });
		 }
		 
	 });
	  $(document).on('click','.del_cmt1',function()
	 {
		 cmt_id=$(this).data('sender');
		 if(confirm("Do you want to delete ?"))
		 {
		 $.ajax({
		    url:"delete_comment.php",
			type:"POST",
			data:{comment_id:cmt_id,rep:1},
			success:function(data)
			{
				//console.log(data);
				if(data)
			     window.location.reload();
			}
		 });
		 }
		 
	 });
	 $(document).on('click','.comment_like',function()
	 {
	   var cmt_id=$(this).data('sender');
	   $.ajax({
	     url:"add_commentLike.php",
		 type:"POST",
		 data:{comment_id:cmt_id},
		 success:function(data)
		 {
		  if(data)
		  {
		    window.location.reload();
		  }
		  //alert(data);
		 }
	   });
	 });
	 
	  $(document).on('click','.send_chat',function()
	  {
	   var id=$(this).data('sender');
	    var message=$('#chat_message_'+id).val();
		//alert(id);
		$('#chat_message_'+id).val("");
		var action="send_msg";
		$.ajax({
		  url:"add_message.php",
		  type:"POST",
		  data:{action:action,message:message,user_id:id},
		  success:function(data)
		   {
		    fetch_user_message(id);
			
			var e=$('#chat_message_'+id).emojioneArea();
            e[0].emojioneArea.setText(' ');
		   }
		});
	  });
	$(document).on('click','.reprt',function()
	{
      	var id=$(this).data('sender');
	});	
$(document).on('click','.report_view',function()
	{
		var id=$(this).data('sender');
		//console.log(document.getElementById('result_report'+id));
		if(document.getElementById('result_report'+id))
		{
      	var content="";
		content+='<button  id="report_id'+id+'" style="width:70px;height:px;cursor:pointer;">report';
		
		content+='</button>';
		$('#result_report'+id).append(content);
		document.getElementById('result_report'+id).id='result_change'+id;
		}
		else
		{
			$('#result_change'+id).empty();
		    document.getElementById('result_change'+id).id='result_report'+id;
		}
		$(document).on('click','#report_id'+id,function()
		{
			$.ajax({
			  url:"add_report.php",
			  type:"post",
			  data:{post_id:id},
			  success:function(data)
			  {
			     if(data==1)
					 alert('Report Successfully');
			  }
			});
		});
	});		
});	
	   
function remove_up()
	{
		window.location.reload();
	}
</script>
<?php
}
?>