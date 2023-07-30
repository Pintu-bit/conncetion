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
	//box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
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
 $search_data=$_POST['data'];	
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
<a href=""  class="link"><div class="profile_list">
<div class="icon_img">
<img src="image/logout.png" width="90%" height="100%" >
</div>
<h3 class="inner_content" >LOGOUT</h3>
</div></a>
</div>
</div>
<center>
<div  style="width:60%;height:auto;position:relative;top:100px;left:10%;">
<div  style="width:99%;height:40px;">
<center><b><span style="position:relative;top:7px;font-family:monospace;font-size:17px;text-decoration:none;">SEARCHING RESULT:<?php echo $search_data; ?></span></center></b>
<hr></hr>
</div>
<?php 
$main_user_id=$_SESSION['id'];
if($search_data!="")
{
$search=new database();
$search->sql_high("users","user_id,name,profile_img",null,"name like '%$search_data%'");
$searching_result=$search->show();
if(sizeof($searching_result))
{
	//print_r($search->sql()); 
for($i=0;$i<sizeof($searching_result);$i++)
{
	//print_r($search->sql()); 
	?>
<div  style="width:48%;height:80px;margin-top:5px;margin-left:1.5%;border-radius:10px;background-color:#d4d4d4;float:left;">
<div class="flw_list">

<div style="width:50px;height:100%;border-radius:50px;margin-left:-85%;">
<a href="profile.php?id=<?php print_r($searching_result[$i]['user_id']);?>"><img src="web_image/
<?php
if($searching_result[$i]['profile_img'])
{
 print_r($searching_result[$i]['profile_img']);
}
else
{
    echo "user.png";
}
?>"width="100%" height="100%" style="border-radius:50%;"></a>
</div>

</div>
<?php
if($searching_result[$i]['user_id']==$main_user_id)
      echo'<script>location.replace("profile.php")</script>';
$userId=$searching_result[$i]['user_id'];
$friend_obj=new database();
$friend_obj->sql_high("friend","*",null,"((follow_to=$main_user_id and follow_by=$userId) or (follow_to=$userId and follow_by=$main_user_id)) and accept_sts=1");
if(sizeof($friend_obj->show()))
{
?>
<a href=""><span style="float:left;margin-left:70px;margin-top:-30px;font-family:monospace;font-size:14px;"><?php print_r($searching_result[$i]['name']);?></span></a>
<div data-sender="<?php print_r($searching_result[$i]['user_id']);?>" data-sts="1" class="flw" style="width:40px;height:40px;position:relative;top:-39px;left:33%;">
<img src="image/chat.png" width="100%" height="100%"/>
</div>
<?php
}else{
   $addF_obj=new database();
   $addF_obj->sql_high("friend","*",null,"(follow_to=$main_user_id and follow_by=$userId) or (follow_to=$userId and follow_by=$main_user_id)");
   if(sizeof($addF_obj->show()))
   {
?>
<a href=""><span style="float:left;margin-left:70px;margin-top:-30px;font-family:monospace;font-size:14px;"><?php print_r($searching_result[$i]['name']);?></span></a>
<div data-sender="<?php print_r($searching_result[$i]['user_id']);?>" data-sts="0" class="flw" style="width:40px;height:40px;position:relative;top:-39px;left:33%;">
<img src="image/remove-friend.png" width="100%" height="100%" style="border-radius:50%;"/>
</div>
<?php
}else
{
?>
<a href=""><span style="float:left;margin-left:70px;margin-top:-30px;font-family:monospace;font-size:14px;"><?php print_r($searching_result[$i]['name']);?></span></a>
<div data-sender="<?php print_r($searching_result[$i]['user_id']);?>" data-sts="0" class="flw" style="width:40px;height:40px;position:relative;top:-39px;left:33%;">
<img src="image/add-user.png" width="100%" height="100%" style="border-radius:50%;"/>
</div>
<?php
}
}
?>
</div>
<?php 
}
}
else
{
?>
<center><b><span style="position:relative;top:70px;font-family:monospace;font-size:17px;text-decoration:none;">SORRY, NO SUCH RESULT FOUND!!! :)</span></center></b>
<?php 
}
}
//else
?>

</div>
</center>
<!--<div    style="width:30%;height:640px;float:right;margin-top:30px;overflow-y:scroll;float:left;margin-left:3%;">
<div style="width:99%;height:40px;">
<center><b><span style="position:relative;top:7px;font-family:monospace;font-size:17px;text-decoration:none;">Matual Friend's</spna></center></b>
<hr></hr>
</div>
style="float:right;width:40px;height:40px;margin-top:-30px;margin-right:20px;border-radius:5px;">
<img src="image/add-user.png" width="100%" height="100%" style="border-radius:5px;"/>
</div>
</div>-->


</body>
<script src="jquery.js" type="text/javascript"></script>
 <script src="jqueryui/jquery-ui.js" type="text/javascript"></script>

<script>
function create_notification(){
	var model_content="";
  model_content+='<div id="noti" style="overflow-x: hidden;border-radius:10px;position:relative;left:23%;top:30px;width:400px;height:600px;z-index:999;border:;background-color:#d6d6d6;overflow-y:scroll;">';
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
	 $(document).on('click','.flw',function(){
		   		var id=$(this).data('sender');
				var status=$(this).data('sts');
				//alert(status);
				if(status==1)
				{
					window.location.replace("message.php");
				}
				else
				{
					//alert();
					$.ajax({
					url:"add_friendTO_db.php",
					type:"POST",
 					data:{name_id:id},
                 success:function(data)
				   {
                      if(data==1)
                       window.location.reload();
					  //console.log(data); 
				   }				   
               });
				}
			     //                                                                                                                              alert(id);
				
	      });
	});
</script>
<?php
}
?>