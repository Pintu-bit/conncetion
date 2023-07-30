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
.flw_list
{
	position:relative;
	top:10px;
	width:99%;
	height:50px;
	background-color:;
	float:left;
	margin-top:8px;
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
.flw:hover
{
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	cursor:pointer;
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
else
{
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
<a href="followers.php"  class="link"><div class="profile_list">
<div class="icon_img">
<img src="image/followers.png" width="90%" height="100%" >
</div>
<h3  class="inner_content" >FOLLOWERS</h3>
</div><br></a>
<a href="following.php"  class="link"><div class="profile_list">
<div class="icon_img">
<img src="image/follow.png" width="90%" height="100%" >
</div>
<h3 class="inner_content" >FOLLOWING</h3>
</div><br></a>
<div id="ntf" class="profile_list">
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
<a href="log_out.php"   class="link"><div class="profile_list">
<div class="icon_img">
<img src="image/logout.png" width="90%" height="100%" >
</div>
<h3 class="inner_content" >LOGOUT</h3>
</div></a>
</div>
</div>

<div  style="width:30%;height:640px;float:right;margin-top:30px;overflow-y:scroll;float:left;margin-left:1%;">

<div  style="width:99%;height:40px;">
<center><b><span style="position:relative;top:7px;font-family:monospace;font-size:17px;text-decoration:none;">Followers</spna></center></b>
</div>
</div>


<div    style="width:30%;height:640px;float:right;margin-top:30px;overflow-y:scroll;float:left;margin-left:3%;">
<div style="width:99%;height:40px;background-color:#02abf1;">
<center><b><span style="position:relative;top:7px;font-family:monospace;font-size:17px;text-decoration:none;">Following</spna></center></b>
</div>
<?php 
for($i=0;$i<4;$i++)
{
	?>
	<div style="height:80px;margin-top:5px;border-radius:10px;background-color:#d4d4d4;">
<div class="flw_list">
<div style="width:50px;height:100%;border-radius:50px;">
<a href="">
<img src="image/profile.png" width="100%" height="100%" >
</a>
</div>
</div>
<a href="">
<span style="float:left;margin-left:70px;margin-top:-30px;font-family:monospace;font-size:14px;">Pintu Gorai</span>
</a>
<div class="flw" style="cursor:pointer;float:right;width:100px;height:25px;background-color:cyan;margin-top:-30px;margin-right:20px;border-radius:5px;">
<center><b><p style="position:relative;top:-10px;font-family:monospace;font-size:14px;text-decoration:none;">Following</p></center></b>
</div>
</div>
<?php
}
?>
</div>


</body>
<script src="jquery.js" type="text/javascript"></script>
 <script src="jqueryui/jquery-ui.js" type="text/javascript"></script>

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
</script>
<?php 
}
?>