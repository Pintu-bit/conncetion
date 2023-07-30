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
.flw_to:hover
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
<a href="friends.php"  class="link"><div class="profile_list">
<div class="icon_img">
<img src="image/followers.png" width="90%" height="100%" >
</div>
<h3  class="inner_content" >FRIENDS</h3>
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

<div  style="width:27%;height:auto;float:right;position:relative;top:100px;float:left;left:32%;">

<div  style="width:99%;height:40px;">
<center><b><span style="position:relative;top:7px;font-family:monospace;font-size:17px;text-decoration:none;">Add Friend</span></center></b>
</div>
<?php
$from_users=array();
$from_friend=array();
$temp=array();
$user_curr_id=$_SESSION['id']; 
$add_friend=new database();
$fetch_from_friend=new database();
$add_friend->sql_high("users","user_id",null,"users.user_id!=$user_curr_id");
$add_friend_result=$add_friend->show();

$fetch_from_friend->sql_high("friend","follow_by",null,"follow_to=$user_curr_id");
$accept_arr=$fetch_from_friend->show();

for($i=0;$i<sizeof($accept_arr);$i++)
{
 array_push($from_friend,$accept_arr[$i]['follow_by']);
}

for($i=0;$i<sizeof($add_friend_result);$i++)
{
 array_push($from_users,$add_friend_result[$i]['user_id']);
}

/*foreach($from_friend as $val)
{
 echo $val."friend"."<br>";
}
echo "-----<br>";
foreach($from_users as $val)
{
 echo $val."user"."<br>";
}

echo "-----<br>";*/
//print_r($accept_arr);
$temp=array_diff($from_users,$from_friend);
$newObj=new database();
$accept_friend=array();
$newObj->sql_high("friend","follow_to",null,"user_id=$user_curr_id and accept_sts=1");
$temp_Re=$newObj->show();
if(sizeof($temp_Re))
{
	//print_r($temp_2);
	for($j=0;$j<sizeof($temp_Re);$j++)
	{
		array_push($accept_friend,$temp_Re[$j]['follow_to']);
	}
}
//print_r($temp);
//echo "<br>";
//print_r($accept_friend);
//echo "<br>";
$temp=array_diff($temp,$accept_friend);
//print_r($temp);
$temp_friend=new database();

 foreach($temp as $val)
 { 
	   $temp_friend->sql_high("users","user_id,name,profile_img",null,"users.user_id=$val");
       $temp_friend_result=$temp_friend->show(); 
   ?>
<div style="height:80px;margin-top:5px;border-radius:10px;background-color:#d4d4d4;">
<div class="flw_list">
<div style="width:50px;height:100%;border-radius:50px;">
<a href="profile.php?id=<?php print_r($temp_friend_result[0]['user_id']);?>">
<img src="web_image/<?php
 if($temp_friend_result[0]['profile_img']) 
 print_r($temp_friend_result[0]['profile_img']);
 else
   echo "user.png";
?>" width="100%" height="100%" style="border-radius:50%;">
</a>
</a>
</div>
</div>
<a href="">
<span style="float:left;margin-left:70px;margin-top:-30px;font-family:monospace;font-size:14px;"><?php print_r($temp_friend_result[0]['name']);?></span>
</a>
<div class="flw" data-sender="<?php print_r($temp_friend_result[0]['user_id']);?>" style="background-color:cyan;float:right;width:100px;height:25px;margin-top:-30px;margin-right:20px;border-radius:5px;">
<center><b><p  style="position:relative;top:-10px;font-family:monospace;font-size:14px;text-decoration:none;" id="snd_rq<?php print_r($temp_friend_result[0]['user_id']);?>">
<?php 
$user_match_id=$temp_friend_result[0]['user_id'];
$fetch_from_friend->sql_high("friend","*",null,"follow_to=$user_match_id and user_id=$user_curr_id");
if(sizeof($fetch_from_friend->show()))
{
	echo"Sending...";
}
else
{
	echo"Send";
}
?>
</p></center></b>
</div>
</div>
<?php 
//}
}
?>
 </div>


<div style="width:27%;height:auto;float:right;position:relative;top:100px;float:left;left:33%;">
<div style="width:99%;height:40px;">
<center><b><span style="position:relative;top:7px;font-family:monospace;font-size:17px;text-decoration:none;">Friend Request</span></center></b>
</div>
<?php 
$add_friend=new database();
$add_friend->sql_high("friend","*",null,"accept_sts!=1");
$add_friend_result=$add_friend->show();
for($i=0;$i<sizeof($add_friend_result);$i++)
{
	if($_SESSION['id']==$add_friend_result[$i]['follow_to'])
	{
		$fetchUSER=new database();
		$idF=$add_friend_result[$i]['user_id'];
		$fetchUSER->sql_high("users","*",null,"user_id=$idF");
		$fetchUSER_result=$fetchUSER->show();
		
         
	?>
<div style="height:80px;margin-top:5px;border-radius:10px;background-color:#d4d4d4;">
<div class="flw_list">
<div style="width:50px;height:100%;border-radius:50px;">
<a href="">
<img src="web_image/<?php
 if($fetchUSER_result[0]['profile_img']) 
 print_r($fetchUSER_result[0]['profile_img']);
 else
   echo "user.png";
?>" width="100%" height="100%" style="border-radius:50%;">
</a>
</div>
</div>
<a href="">
<span style="float:left;margin-left:70px;margin-top:-30px;font-family:monospace;font-size:14px;"><?php print_r($fetchUSER_result[0]['name']);?></span>
</a>
<div class="flw_to" data-sender="<?php print_r($fetchUSER_result[0]['user_id']);?>" style="background-color:cyan;float:right;width:100px;height:25px;margin-top:-30px;margin-right:20px;border-radius:5px;">
<center><b><p style="position:relative;top:-10px;font-family:monospace;font-size:14px;text-decoration:none;">Accept</p></center></b>
</div>
</div>
<?php
}
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
	 $(document).on('click','.flw',function()
	 {
		
	    var name=$(this).data('sender');
		
		$.ajax({
			url:"add_friendTO_db.php",
			type:"POST",
			data:{name_id:name},
			success:function(data)
			{
				if(data==1){
				window.location.reload();
				}
		      
			}
		});
		
	 });
	 $(document).on('click','.flw_to',function()
	        {
		  	 var id=$(this).data('sender');
			 $.ajax({
			 url:"add_friendAcept.php",
			 type:"POST",
			 data:{accept_id:id},
			 success:function(data)
			  {
			    if(data==1)
				{
				  window.location.reload();
				}
				
			  }
			 });
            });
	});
	
</script>
<?php 
}
?>