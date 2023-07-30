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

#remv_bar::-webkit-scrollbar {
    display: none;
}

/* Hide scrollbar for IE, Edge and Firefox */
#remv_bar {
  -ms-overflow-style: none;  /* IE and Edge */
  scrollbar-width: none;  /* Firefox */

}
</style>
<link rel="stylesheet" type="text/css" href="https://cdn.tutorialjinni.com/emojionearea/3.4.1/emojionearea.min.css" />
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
	
?>	
<div id="profile_div1" >
 <div style="width:100%;height:auto;margin-top:10px;">
<a href="profile.php" class="link" ><div class="profile_list">
<div class="icon_img" >
<img src="image/user.png" width="90%" height="100%" >
</div>
<h3 class="inner_content" >PROFILE</h3>
</div><br></a>
<a href="message.php"  class="link"><div class="profile_list">
<div class="icon_img">
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
<a href="add_friend.php"  class="link">
<div class="profile_list">
<div class="icon_img">
<img src="image/friends.png" width="90%" height="100%" >
</div>
<h3 class="inner_content" >ADD FRIENDS</h3>
</div><br></a>
<div id="ntf" class="profile_list">
<div class="icon_img">
<img src="image/notification-bell.png" width="90%" height="100%" >
</div>
<h3 class="inner_content" >NOTIFICATION</h3>
</div><br>
<a href="log_out.php"  class="link"><div class="profile_list">
<div class="icon_img">
<img src="image/logout.png" width="90%" height="100%" >
</div>
<h3 class="inner_content" >LOGOUT</h3>
</div></a>
</div>
</div>
<div  style="width:33%;height:650px;float:right;position:relative;top:100px;float:left;left:30%;">
<b><span style="margin-left:10px;margin-top:10px;font-family:monospace;font-size:16px;">RECENTLY YOU HAVE MESSAGED <span></b>
<div id="recent_data"></div>
<div id="rece"></div>
</div>
<div id="remv_bar" style="width:270px;height:630px;float:left;position:fixed;top:120px;overflow-y:scroll;left:65%;overflow-x:hidden;">
<b><span style="margin-left:10px;margin-top:10px;font-family:monospace;font-size:16px;">YOUR FRIENDS<span></b>
<?php
$user_id=$_SESSION['id'];
$followers=new database();
$followers_user=new database();
$followers->sql_high("friend","follow_by,follow_to",null,"(follow_to=$user_id and accept_sts=1) or (follow_by=$user_id and accept_sts=1)");
$follow_result=$followers->show();
for($i=0;$i<sizeof($follow_result);$i++)
{  
   $val_1=$follow_result[$i]['follow_by']; 
   if($user_id==$val_1)
	   $val_1=$follow_result[$i]['follow_to'];
	$followers_user->sql_high("users","*",null,"user_id=$val_1");
	$followers_userResult=$followers_user->show();
	if(sizeof($followers_userResult))
	  {
	 ?>
<div style="width:99%;height:40px;margin-top:15px;margin-left:px;">
<a href="">
<div style="width:25px;height:70%;border-radius:50%;float:left;margin-left:px;">
<?php
$image=""; 
 if($followers_userResult[0]['profile_img']!=null)
	 $image=$followers_userResult[0]['profile_img'];
  else
	  $image="user.png";

?>
<img src="web_image/<?php echo $image; ?>" width="100%" height="100%" style="border-radius:50%;" >
</div>
<span style="margin-left:10px;margin-top:10px;font-family:monospace;font-size:12px;float:left;"><b><?php print_r($followers_userResult[0]['name']);?></b><span>
</a>
<div class="make_chat" style="float:left;width:25px;height:25px;margin-left:35%;margin-top:4px;cursor:pointer;" data-sender="<?php print_r($followers_userResult[0]['user_id']);?>" data-sender1="<?php print_r($followers_userResult[0]['name']);?>">
<img src="image/comments.png" width="100%" height="100%" >
</div>
</div>
<?php 
	}
	else
	{}
 }
 ?>
</div>
</body>
<script src="jquery.js" type="text/javascript"></script>
 <script src="jqueryui/jquery-ui.js" type="text/javascript"></script>
<script src="https://cdn.tutorialjinni.com/emojionearea/3.4.1/emojionearea.min.js"></script>
<script>

function create_notification(){
	var model_content="";
  model_content+='<div id="noti" style="overflow-x: hidden;position:relative;left:23%;top:30px;width:400px;height:600px;z-index:999;border:;background-color:#d6d6d6;overflow-y:scroll;">';
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
	
	function make_comment_box()
	{
		<?php 
			$name=array('pintu');
	    ?>
		var name="<?=$name[0]?>";
		var comment_box="";
		comment_box+='<span style="font-family:monospace;font-size:16px;"><b style="cursor:pointer;">View more comments</b></spna><br><br>';
		<?php 
		
		 for($i=0;$i<2;$i++)
		 {
			$name=array('pintu');
		
	    ?>
		
		comment_box+='<div style="height:auto;margin-top:3px;">';
		comment_box+='<div style="width:30px;height:4.5%;border-radius:40px;float:left;">';
		comment_box+='<a href=""><img src="image/profile.png" width="100%" height="100%" ></a></div>';
		comment_box+='<div style="margin-left:55px;width:70%;height:auto;border-radius:10px;background-color:#d4d4d4;">';
		comment_box+='<b><span style="margin-left:10px;font-family:monospace;">'+name+'</span></b><br>';
		comment_box+='<span style="margin-left:10px;font-family:monospace;">gggggggggg</span>';
		comment_box+='</div>';
		comment_box+='<span style="margin-left:10%;margin-top:2px;cursor:pointer;">Like 45 . </span>';
		comment_box+='<span style="margin-left:2%;color:grey;margin-top:2px;">01 Oct 2021 at 6:30pm</span><br>';
		
        comment_box+='</div>';
		 <?php }?>
		comment_box+='<div id="cmt" style="margin-left:px;width:100%;height:50px;">';
		comment_box+='<div style="margin-top:8px;width:40px;height:80%;border-radius:30px;float:left;">';
		comment_box+='<a href=""><img src="image/profile.png" width="100%" height="100%" ></a></div>';
		comment_box+='<textarea style="margin-left:10px;margin-top:15px;width:60%;height:28px;border-radius:5px;" placeholder="write a Comment..."></textarea>';
		comment_box+='<button style="position:relative;top:-12px;height:30px;left:3px;">Send</button>';
		
		comment_box+='</div>';
		return comment_box;
	}
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
  
	function make_chat_box(to_user,rece)
	{
       var modal_content= '<div id="user_dialog_'+to_user+'" class="user_dialog"  title=" You Chat With  '+rece+'">';
	
       modal_content+='<div style="height:400px; border:1px solid #ccc; overflow-y:scroll; margin-bottom:24px;padding:16px;" class="chat_history" data-touserid="'+to_user+'" id="chat_history_'+to_user+'">';
        fetch_user_message(to_user);
       modal_content +='</div>';
      modal_content +='<div class="form-group">';
     modal_content +='<textarea  name="chat_message_'+to_user+'" id="chat_message_'+to_user+'" class="form-control chat_message"  class="c"></textarea>';
    modal_content +='</div><div class="form-group" align="right">';
    modal_content +='<button type="button" name="send_chat" id="'+to_user+'"  data-sender="'+to_user+'" class="send_chat">Send</button></div></div>';
   $('#rece').html(modal_content);
   }  
	
	$(document).ready(function(){
    $(document).on('click','.cmt',function(){
		 var data=$(this).data('sender');
		 
		var div_id=document.getElementById('res'+data);
		if(div_id)
		{
	    var append_data=make_comment_box();
		$('#res'+data).append(append_data);
		div_id.id='res1'+data;
		}
	    else
		{
			$('#res1'+data).empty(append_data);   
		var div_id=document.getElementById('res1'+data);
		
		div_id.id='res'+data;
		}
	   }); 
     $(document).on('click','.make_chat',function()
	 {
		 var id=$(this).data('sender');
		 var data_rece=$(this).data('sender1');
		   make_chat_box(id,data_rece);
		   $("#user_dialog_"+id).dialog({
              autoOpen:false,
               width:400
             });
	   $('#user_dialog_'+id).dialog('open');
	     $('#chat_message_'+id).emojioneArea({
           pickerPosition:"top",
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
	 /*setInterval(function(){
		 var id;
		 $(document).on('click','.send_chat',function()
		 {
			id=$(this).data('sender');
		 });
        fetch_user_message(id);
      
     }, 2000);*/
	 setInterval(function(){
		$.ajax({
		  url:"fetch_recentData.php",
		  type:"POST",
		  success:function(data)
		  {
		    $('#recent_data').html(data);
		  }
		});
     }, 2000);
	});
</script>
<?php
}
?>