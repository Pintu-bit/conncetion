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
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	cursor:pointer;
}
#txt{
   margin-top:-0.5px;
   margin-left:15px;
   font-family:monospace;
   
}
.txt{
	color:#676363;
   font-family:monospace; 
    position:relative;
	left:19px;
}
.abt_div
{

width:25%;
height:30px;
margin-left:19px;
border-radius:10px;
background-color:#d4d4d4;
float:left;
}
.inner_cont
{
 width:100%;
 height:30px;

 margin-top:10px;
 position:relative;
 top:80px;
 border-radius:10px;
 background-color:#d4d4d4;
 cursor:pointer;
}
.inner_cont:hover
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
<?php 
$userId=0;
if(isset($_GET['id']) && $_GET['id']>0)
{
 $userId=$_GET['id'];
    $user_id=$_GET['id'];
 	$Uprofile_obj=new database();
	$Uprofile_obj->sql_high("users","profile_img,name",null,"user_id=$user_id",null,null);
	//print_r($Uprofile_obj->show());
	if(sizeof($Uprofile_obj->show()))
	{
		$result=$Uprofile_obj->show();
	}
}
	?>
<div  style="width:60%;height:auto;position:relative;top:100px;left:30%;">
<center>
<div style="width:100px;height:100px;border-radius:50%;">
 <img src="web_image/<?php if($result[0]['profile_img'])print_r($result[0]['profile_img']);
    else
		echo "user.png";
 ?>" width="100%" height="100%" style="border-radius:50%;">
</div>
<h3 style="font-family:monospace;margin-left:px;"><?php print_r($result[0]['name']);?></h3>
</center>
<div style="position:relative;top:00px;height:420px;width:30%;float:left;">
<div class="inner_cont" class="abt" data-innerdata="Overview" data-number="1"> 
      <center><h3 class="abt" data-innerdata="Overview" data-userid="<?php echo $userId; ?>" data-number="1" style="position:relative;top:5px;font-family:monospace;">Overview</h3></center>	   
</div>
<br>
<div class="inner_cont" class="abt">
      <center><h3 class="abt" data-innerdata="Work and education" data-userid="<?php echo $userId; ?>" data-number="2" style="position:relative;top:5px;font-family:monospace;">Work and education</h3></center>	   
</div>
<br>
<div class="inner_cont" class="abt">
      <center><h3 class="abt" data-innerdata="Place lived" data-userid="<?php echo $userId; ?>" data-number="3" style="position:relative;top:5px;font-family:monospace;">Place lived</h3></center>	   
</div>
<br>
<div class="inner_cont" class="abt">
      <center><h3 class="abt" data-innerdata="Contact and basic info" data-userid="<?php echo $userId; ?>" data-number="4" style="position:relative;top:5px;font-family:monospace;">Contact and basic info</h3></center>	   
</div>
<br>
<div class="inner_cont" class="abt">
      <center><h3 class="abt"  data-innerdata="Family and relationship" data-userid="<?php echo $userId; ?>" data-number="5" style="position:relative;top:5px;font-family:monospace;">Family and relationships</h3></center>	   
</div>
<br>

</div>

<div id="acc_result"style="margin-left:10px;width:60%;height:auto;float:left;position:relative;top:50px;">
<div style="width:400px;height:30px;background-color:#d4d4d4;margin-left:15px;margin-top:-15px;">
<h3 id="show_details" style="font-family:monospace;margin-left:15px;">Overview</h3>
</div><br>
<div id="inner_data" style="height:auto;width:100%;">

</div>
</div>
</div>


<!--<div    style="width:30%;height:640px;float:right;margin-top:30px;overflow-y:scroll;float:left;margin-left:3%;">
<div style="width:99%;height:40px;">
<center><b><span style="position:relative;top:7px;font-family:monospace;font-size:17px;text-decoration:none;">Matual Friend's</spna></center></b>
<hr></hr>
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
				alert(id);
            });
    $(document).on('click','.abt',function(){
	         var name=$(this).data('innerdata');
			 var num=$(this).data('number');
			 var userId=$(this).data('userid');
			 //alert(userId);
		    document.getElementById('show_details').innerHTML=name;
			 var result_con="";
			$.ajax({
			    url:"fetch_about.php",
				type:"POST",
				data:{data_type:name,num:num,user_id:userId},
				success:function(data)
				{
					//alert(data);
			     if(data!=null)
				 {				 
		           document.getElementById('inner_data').innerHTML=data;
				 }
				}
				
			});
		 
		  
	   });		
	});
</script>
<?php
}
?>