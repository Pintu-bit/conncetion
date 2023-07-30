<?php 
//include "header.php";
?>
<!doctype html>
<html>
<head>
  <link href="mystyle.css" rel="stylesheet" type="text/css" >
   <style>
   body {
       box
      }
   
#profile_div1
{
	width:25%;
	border:solid 1px;
	height:600px;
	margin-left:30px;
	
}
.inner_content
{
	position:relative;
	/*left:120px;*/
	 top:-7px;
	 font-family:monospace;
	 color:#676363;
}
.int{
  margin-left:2%;
margin-top:0%;

width:40%;
 }
.int1
 {
   width:90%;
  height:20px; 
}
.pro{
	width:100%;
	height:50%;
	border-bottom:solid 1px white;
	
	background-color:#a8a8a8;
}
.link{
	 text-decoration:none;
	  font-family:monospace;
}
.txt{
	 position:relative;
	 top:10px;
	 font-size:22px;
}
#fle{
	
    border: 1px solid #ccc;
    display: inline-block;
    padding: 6px 12px;
    cursor: pointer;
	width:100%;
}
.innerdv
{
	width:18%;
	height:50px;
	float:left;
	margin-left:10px;
	position:relative;
	top:5px;
    background-color:#d4d4d4;
	border-radius:10px;
}
.link
{
	text-decoration:none;
	position:relative;
	 top:10px;
	 font-size:14px;
}
.edt_msg{
	font-family:monospace;
	font-size:16px;
	margin-top:5px;
}
.post{
	width:20%;
	height:150px;
	border:solid 1px;
	float:left;
	margin-left:4%;
	margin-top:10px;
	z-index:-188;
}
.dv{
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
#remv_profile{
	position:relative;
	top:8px;
	font-family:monospace;
	font-size:14px;
}
#rmv_profile
{
	cursor:pointer;
}
.edit_image
{
	box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
	border-radius:15px;
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
</head>
<body bgcolor="#e8e8e8">
<?php 
 include "common.php";
 //include "connect_db.php";
 
 if(!isset($_SESSION['user']))
 {
	 header('location:login.php');
 }
 else
 {
	 if(isset($_GET['id']) && $_GET['id']=='type')
	 {
		 echo "<script>alert('FILE TYPE IS NOT PROPER');</script>";
	 }
	 if(isset($_GET['id']) && $_GET['id']=='size')
	 {
		 echo "<script>alert('FILE SIZE MUST BE IN 5MB');</script>";
	 }
    $id_user=$_SESSION['id'];	 
	if(isset($_GET['id']) && $_GET['id'])
	{
		$id=$_GET['id'];
		$profile_obj->sql_high("users","*",null,"user_id=$id",null,null);
	   if(sizeof($profile_obj->show()))
	   {
		   $fetch_about=new database();
		   $fetch_about->sql_high("about","work",null,"profile_id=$id");
		   $fetch_data=$fetch_about->show();
		   
		   $result=$profile_obj->show();
		   $id_user=$result[0]['user_id'];
	   }
	}

 ?>
 <a href="home.php">
  <div style="width:40px;height:40px;position:fixed;top:20px;right:20px;">
 <img src="image/home.png" width="100%" height="100%" >
 </div></a>
<div class="div_Scroll" style="width:55%;height:670px;position:fixed;top:100px;left:2%;float:left;overflow-y:scroll;">

<br>
<br>
<br><br><br>
<div  style="width:100px;height:15%;border-radius:100%;margin-top:-10%;margin-left:20px;">
<?php 
 if($result[0]['profile_img']) 
	 $image=$result[0]['profile_img'];
 else
	 $image="user.png";
 
?>
 <img src="web_image/<?php echo $image;?>" width="100%" height="100%" style="position:relative;top:px;z-index:-10;border-radius:50%;">
<?php 
if(!isset($_GET['id']) )
	{
		?>
<div id="profile_change"  style="width:40px;height:40px;border-radius:20px;margin-top:-35px;margin-left:60px;cursor:pointer;z-index:999;">
<img src="image/camera.png" width="100%" height="100%" >
</div>
<?php
	}
	?>
</div>

<div id="profile_"></div>
<!--<div id="result" style="position:relative;left:0%;height:20px;width:30%;top:10px;"></div>-->
<h3 style="color:#4169E1; font-family:monospace;margin-left:20px;float:left;"><?php print_r($result[0]['name']);?></h3>
<h3 style="color:#9169E0; font-family:monospace;position:relative;top:30px;left:-12%;">
<?php

 if(sizeof($fetch_data)==1)
 {
	  print_r($fetch_data[0]['work']);
 }
 else
 {
   echo "<span style='margin-left:60px;'>"."Profile not Update yet!!!"."</span>";
 }
 
 ?>
</h3>
<?php 
if(!isset($_GET['id']) )
	
	{
		//if(!$_GET['id'])
		//{
		?>
<a href="editProfile.php"><div style="position:relative;top:-25px;width:15%;height:30px;position:relative;left:53%;float:left;">
<center><b><span class="edt_msg" style="position:relative;top:5px;">Edit</span></b></center>
</div></a>


<div style="width:20%;height:40px;position:relative;left:70%;position:relative;top:-25px;">
<center><a href="message.php"><img src="image/chat.png" width="40px" height="100%" style="position:relative;top:-48px;"></a></center>
</div>
<?php 
	$id=$_SESSION['id'];
	}
	//} 
    else{$id=$_GET['id'];}
	$fetch_post=new database();
	$fetch_post->sql_high("post","count(*)",null,"user_id=$id");
	$fetch_result=$fetch_post->show();
	?>
<br>

<div style="position:relative;width:95%;height:100px;top:0px;">
<a href="#post"><div class="innerdv"><center><b class="link"><span style="font-family:monospace;">Post<br><?php print_r($fetch_result[0]['count(*)']); ?></span></b></center></div></a>
<?php
if(isset($_GET['id']) && $_GET['id'])
	{
		?>
<a href="friends.php?id=<?php if(isset($_GET['id'])) echo $_GET['id'] ;?>" ><div class="innerdv"><center><b class="link"><span style="font-family:monospace;">All Friends<br>10</span></b></center></div></a>
<?php 
	}
	else{
		?>
<a href="friends.php" ><div class="innerdv"><center><b class="link"><span style="font-family:monospace;">All Friends<br>10</span></b></center></div></a>
<?php
	}
if(isset($_GET['id']) && $_GET['id'])
	{
		?>
<a href="friends.php" ><div class="innerdv"><center><b class="link"><span style="font-family:monospace;">Mutual Friends<br>18</span></b></center></div></a>
<a href="about.php?id=<?php if(isset($_GET['id'])) echo $_GET['id'] ;?>" ><div class="innerdv" data-sender=""><center><b class="link"><span style="font-family:monospace;">About<br></span></b></center></div></a> 
 <?php 
	}else{
	?>
<a href="about.php" ><div class="innerdv" data-sender=""><center><b class="link"><span style="font-family:monospace;">About<br></span></b></center></div></a>
 <a href="setting.php" ><div class="innerdv" data-sender=""><center><b class="link"><span style="font-family:monospace;">Settings<br></span></b></center></div></a>
 
<?php 
	}?>
</div>

<br>
<br>



<h3 style="color:#4169E1; font-family:monospace;margin-left:20px;">STORIES</h3>
<div class="div_Scroll" style="margin-left:20px;width:90%;height:100px;overflow-x:scroll;">
<?php 
for($i=0;$i<2;$i++)
{
	?>
<div style="width:10%;height:80%;float:left;margin-left:2px;margin-top:5px;"></div>
<?php 
}?>
</div>

<h3 style="color:#4169E1; font-family:monospace;margin-left:20px;">POST</h3>
<div style="margin-left:20px;width:90%;height:200px;" id="post">
<?php 
$user_post=new database();
$user_post->sql_high("post","*",null,"user_id=$id_user");
$result_post=$user_post->show();
for($i=0;$i<sizeof($result_post);$i++)
{
	
	?>
<div class="post"  style="">

<img src="web_image/<?php print_r($result_post[$i]['post_image']);?>" width="100%;" height="100%" style="position:relative;top:px;z-index:-100;">
<div class="edit_image" id="edit_image<?php print_r($result_post[$i]['post_id']);?>" data-sender='<?php print_r($result_post[$i]['post_id']);?>' style="width:33px;height:33px;cursor:pointer;z-index:999;position:relative;top:-39px;">
<img src="image/edit.png" width="100%" height="100%" >
</div>
</div>
<?php 
}
?>
</div>

</div>


<div style="width:35%;height:auto;float:right;margin-top:100px;margin-right:2%;">
<?php 
$user_data=new database();
$user_data->sql_high("post","*",null,"user_id=$id_user");
if(sizeof($user_data->show()))
 {
	 $user_fetch=$user_data->show();
for($i=0;$i<sizeof($user_data->show());$i++)
  {	
	?>
<div class="dv" style="margin-left:0px;width:90%;height:auto;margin-top:15px;background-color:#ebebeb;border-radius:5px;">
<div style="margin-left:20px;margin-top:5px;width:15%;height:60px;float:left;">
<a href="profile.php?id=<?php echo $id_user; ?>" >
<?php 
 if($result[0]['profile_img']) 
	 $image=$result[0]['profile_img'];
 else
	 $image="user.png";
?>
<img src="web_image/<?php echo $image;?>" width="100%" height="100%" style="border-radius:100%;">
</a>
</div>
<div style="margin-left:25%;position:relative;top:15px;width:60%;height:50px;">
<b><span style="margin-left:10px;font-family:monospace;"><?php print_r($result[0]['name']);?></span></b><br>
<span style="margin-left:10px;"><?php print_r($user_fetch[$i]['post_date']); ?></span>
</div><br>
<div style="margin-left:20px;width:90%;height:auto;">
<i><b><span><?php print_r($user_fetch[$i]['post_description']); ?></span></b></i>
</div>
<div style="margin-left:20px;margin-top:3px;width:90%;height:200px;">

<img src="web_image/<?php print_r($user_fetch[$i]['post_image']);?>" width="100%" height="100%"> 
</div>
<?php 
$post_id=0;
$post_id=$user_fetch[$i]['post_id'];
?>
<div style="margin-left:5%;margin-top:10px;width:29%;height:25px;float:left;">
  <img src="like.png"  width="25%" height="100%" class="dlk"  data-sender=<?php print_r($user_fetch[$i]['post_id']); ?> data-res='dlike' style="cursor:pointer;">
  <?php
  $like_counter=0;
   $likeViewPro=new database();
   $likeViewPro->sql_high("likes","like_count",null,"post_id=$post_id");
    $likeCounter=$likeViewPro->show();
	//print_r($likeViewPro->sql());
   if(sizeof($likeCounter))
   {
	  $like_counter=sizeof($likeCounter);
   }
   
  ?>
  <span style="position:relative;top:-10px;margin-left:5px;font-family:monospace;"><?php echo $like_counter;?></span>
<center><p class="like_count" style="margin-top:7px;">
<?php

?>
</p></center>  
</div>
<div style="margin-left:40%;margin-top:10px;width:55%;height:25px;">
<img src="image/comment.png"  width="30px" height="100%" class="dlk"  data-sender="<?php print_r( $user_fetch[$i]['post_id']);?>" data-res='dlike' style="cursor:pointer;">
<span class="cmt"  data-sender="<?php echo $i; ?>" style="text-decoration:none;font-family:monospace;font-size:16px;margin-left:3%;position:relative;top:-10px;cursor:pointer;">

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
 }
 }
else
{
 echo '<center><h3 style="font-family:monospace;position:relative;top:100px;">'.'NOT POST YET !'.'</h3></center>';
 
}
?>


</div>
 <!--<div id="profile_div1" >
  <div style="height:8%;border:solid 1px;width:40px;float:right;margin-right:65%;margin-top:10px;border-radius:100%;">  
	 <img src="imgs/profile.png" width="100%" height="100%">
     <div id="prof_list" style="left:5%;width:100%;z-index:3;margin-top:0px;">
	  <center> <span style="font-family:monospace;"><b>Manooj</b></span> </center>
     </div>
  </div>
 <br>
<div style="width:100%;height:480px;border:solid 1px;margin-top:100px;">
<div class="profile_list"><center><h3 class="inner_content" >DOCTOR'S</h3></center></div><br>
<div class="profile_list"><center><h3 class="inner_content" >PROFILE</h3></center></div><br>
<div class="profile_list"><center><h3 class="inner_content" >SEND PROBLEM</h3></center></div><br>
<div class="profile_list"><center><h3 class="inner_content" >VIEW RESULT</h3></center></div><br>
<div class="profile_list"><center><h3 class="inner_content" >PREVIOUS RECORD</h3></center></div><br>
<div class="profile_list"><center><h3 class="inner_content" >TAKE APPOINMENT</h3></center></div><br>
<div class="profile_list"><center><h3 class="inner_content" >CHATS</h3></center></div><br>
<div class="profile_list"><center><h3 class="inner_content" >LOGOUT</h3></center></div>
</div>
</div>-->
<br>
<br>
<br>
<br>
<br>
<?php 
 //include "footer.php";
  ?>
</body>
</html>
 <script src="jquery.js" type="text/javascript"></script>
<script>
var cmt_id;
$(document).ready(function(){

	$(document).on('click','#photo',function(){
		var change_id=document.getElementById("photo");
		 change_id.id="up";
		var div=document.createElement("div");
        div.id="upload"; 
         div.style="position:relative;width:100%;height:50px;z-index:66;border-radius:10px;"
         div.innerHTML="<a class='link' href=''><div class='pro'><center><span class='txt' >REMOVE PHOTO</span></center></div></a><div class='pro'><input id='fle' type='file' name='file_to_upload' ></div>";
            $('#result').html(div);   
	});
	$(document).on('click','#up',function(){
	  var cd=document.getElementById('upload');
	    cd.remove();
		var re_change_id=document.getElementById("up");
		 re_change_id.id="photo";
	});
	function make_comment_box()
	{
		var comment_box="";
		<?php 
		 if(!isset($post_id)){
		 $post_id=0;}
		 //echo $post_id;
		$comment_obj=new database();
		$comment_obj->sql_high("comments","*",null,"post_id=$post_id");
		$comment_result=$comment_obj->show();
		//print_r($comment_obj->sql());
		if(sizeof($comment_result))
		  {
	    ?>
		
		
		
		comment_box+='<span style="font-family:monospace;font-size:16px;"><b style="cursor:pointer;">View more comments</b></spna><br><br>';
		<?php
		
		for($i=0;$i<sizeof($comment_result);$i++)
		 {			
	     $user_id=$comment_result[$i]['comment_by'];
	      
            $comment_user=new database();
		    $comment_user->sql_high("users","user_id,name,profile_img",null,"user_id=$user_id");
			$comment_user_result=$comment_user->show();
			if(isset($comment_user_result[0]['name']) & sizeof($comment_user_result))		
            {				
	    ?>
		 comment_box+='<hr></hr>';
		comment_box+='<div style="height:auto;margin-top:3px;">';
		comment_box+='<div style="width:30px;height:30px;border-radius:40px;float:left;">';
		comment_box+='<a href="profile.php?id=<?php print_r($comment_user_result[0]['user_id']);?>" ><img src="web_image/<?php print_r($comment_user_result[0]['profile_img']);?>" width="100%" height="100%" style="border-radius:50%;"></a></div>';
		comment_box+='<div style="margin-left:45px;width:70%;height:auto;border-radius:10px;background-color:#d4d4d4;">';
		comment_box+='<b><span style="margin-left:10px;font-family:monospace;"><?php  print_r($comment_user_result[0]['name']);?></span></b><br>';
		comment_box+='<span style="margin-left:10px;font-family:monospace;margin-top:5px;"><?php print_r($comment_result[$i]['comments']);?></span>';
		comment_box+='</div>';
		comment_box+='<span style="margin-left:16%;margin-top:2px;cursor:pointer;font-size:14px;">Like 45 </span>';
		<?php 
		 $count=0;
		 $comment_id=$comment_result[$i]['comment_id'];
		 $reply_count=new database();
		 $reply_count->sql_high("reply_comments","*",null,"comment_id=$comment_id");
		 if(sizeof($reply_count->show()))
		 $count=sizeof($reply_count->show());
	 // print_r($reply_count->show());
		 ?>
		comment_box+='<span style="margin-left:2%;margin-top:2px;cursor:pointer;font-size:14px;" class="reply" data-sender="<?php print_r($comment_result[$i]['comment_id']);?>">reply <?php echo $count;?></span>';
		comment_box+='<span style="margin-left:2%;color:grey;margin-top:2px;font-size:14px;"><?php print_r($comment_result[$i]['comment_date']);?></span><br>';
		comment_box+='<div id="cmt_app<?php print_r($comment_result[$i]['comment_id']);?>"></div>';
        comment_box+='</div>';
		 <?php } }?>
		comment_box+='<form action="add_comments.php?post_id=<?php print_r($post_id);?>" method="post"><div id="cmt" style="margin-left:px;width:100%;height:50px;">';
		comment_box+='<div style="margin-top:8px;width:40px;height:80%;border-radius:30px;float:left;">';
		comment_box+='<a href=""><img src="image/profile.png" width="100%" height="100%" ></a></div>';
		comment_box+='<textarea style="margin-left:10px;margin-top:15px;width:60%;height:28px;border-radius:5px;" placeholder="write a Comment..." name="comments"></textarea>';
		comment_box+='<button style="position:relative;top:-12px;height:30px;left:3px;">Send</button></from>';
		
		comment_box+='</div>';
		<?php 
		  }
		  else
		  {
		  ?>
		  comment_box+='<h3 style="font-family:monospace;">No more comments</h3>';
		  comment_box+='<form action="add_comments.php?post_id=<?php print_r($post_id);?>" method="post"><div id="cmt" style="margin-left:px;width:100%;height:50px;">';
		  comment_box+='<div style="margin-top:8px;width:40px;height:80%;border-radius:30px;float:left;">';
		  comment_box+='<a href=""><img src="image/profile.png" width="100%" height="100%" ></a></div>';
		  comment_box+='<textarea style="margin-left:10px;margin-top:15px;width:60%;height:28px;border-radius:5px;" placeholder="write a Comment..." name="comments"></textarea>';
		  comment_box+='<button style="position:relative;top:-12px;height:30px;left:3px;">Send</button></form>';
		  <?php 
		  }
		  ?>
		return comment_box;
	}
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

	$(document).on('click','#profile_change',function(){
		if(document.getElementById('profile_'))
		{
		var profile_box="";
		profile_box+='<form action="upload_profile.php" method="post" enctype="multipart/form-data"><div id="remo" style="position:relative;top:-50px;left:125px;width:200px;height:100px;">';
	profile_box+='<div style="margin-top:5px;width:95%;height:40%;border-radius:5px;background-color:#d4d4d4;">';
	 profile_box+='<input  type="file" style="height:100%;" name="file_to_upload"></div>';
		profile_box+='<div id="rmv_profile" style="background-color:#d4d4d4;margin-top:5px;width:95%;height:40%;border-radius:5px;">';
		profile_box+='<center><span id="remv_profile" >REMOVE PROFILE</span></center></div>';
		profile_box+='<br>';
		profile_box+='<button style="cursor:pointer;width:95%;height:40px;background-color:#d4d4d4;;font-family:monospace;border:none;border-radius:5px;">SAVE</button>';
		profile_box+='</div></form>';
		$('#profile_').append(profile_box);
		var change_id=document.getElementById('profile_');
		change_id.id='non_prof';
		}
		else
		{
			var rechange_id=document.getElementById('non_prof');
			$('#non_prof').empty(profile_box);
			rechange_id.id='profile_';
		}
		
	});
	$(document).on('click','#rmv_profile',function(){
		$.ajax({
			url:"remove_profile.php",
			type:"POST",
		    success:function(data)
			{
				if(data==1)
				{
				  alert("  REMOVE SUCCESSFULLY :)");
			    location.reload();
			    //console.log(data);
				}
				else
				{
					//console.log(data);
					alert(" PROCESS IS UNSUCCESSFULL !");
				}
				
			}
		});
	});
	$(document).on('click','.edit_image',function(){
	  
	  var id=$(this).data('sender');
	  var temp_id;
	  if(temp_id=document.getElementById('edit_image'+id))
	  {
	  var edit_profile="";
	  edit_profile+='<div style="width:80px;height:30px;background-color:#ebebeb;border-radius:5px;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">';
	  edit_profile+='<div style="width:40%;height:100%;float:left;" class="upd_post" data-sender='+id+'>';
	  edit_profile+='<img src="image/edit.png" width="100%" height="100%" >';
	  edit_profile+='</div>';
	  edit_profile+='<div style="width:40%;height:100%;float:left;margin-left:5px;" class="upd_post" data-sender='+id+'>';
	  edit_profile+='<img src="image/delete.png" width="100%" height="95%" >';
	  edit_profile+='</div>';
	  //edit_profile+='<img src="image/
	  edit_profile+='</div>';
	  $('#edit_image'+id).append(edit_profile);
	  temp_id.id="remove";
	  }
	  else
	  {
		  
		 window.location.reload();
		   
	  }
	  
	 });
	 $(document).on('click','#show_details',function(){
	      var show_profile="";
		  show_profile+='<div style="border:solid 1px;width:70%;height:200px;position:relative;left:-270px;top:40px;">';
		  show_profile+='</div>';
		  $('#show_details').append(show_profile);
	   	 });
    $(document).on('click','.upd_post',function(){
	     var id=$(this).data('sender');
		
	     $.ajax({
		    url:"del_edit_post.php",
            type:"POST",
            data:{id:id},
            success:function(data)
			{
				
			  if(data)
			  {
                 window.location.reload();
			  }				
			}		
		 });
	   });
	   $(document).on('click','.dlk',function(){
	      var like_add_id=$(this).data('sender');
		  alert(like_add_id);
		  $.ajax({
		    url:"add_like.php",
			type:"POST",
			data:{like_add_id:like_add_id},
			success:function(data){
				//if(data==1)
				//{
				  //window.location.reload();
				//}
				console.log(data);
			}
		  });
	   
	   });
	   $(document).on('click','.reply',function()
	   {
		   //var id=document.getElementById('cmt_app');
		   
		   cmt_id=$(this).data('sender');
		  var reply_comt="";
		  $.ajax({
		     url:"fetch_reply_message.php",
			 type:"POST",
			 data:{comment_id:cmt_id},
			 success:function(data)
			 {
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
		   
		  reply_comt+='<div style="margin-left:80px;width:250px;height:30px;border-radius:5px;margin-top:-30px;">';
		
		  reply_comt+='<input id="fetch_data'+cmt_id+'" type="text\number" name="comment" placeholder="Write reply...." style="width:70%;height:80%;float:left;border-radius:5px;border:none;border-bottom:solid 2px; "/>';
		  reply_comt+='<button style="margin-left:5px;margin-top:5px;" class="send">send</button>';
		
		  reply_comt+='</div>';		
          if(document.getElementById('cmt_app'+cmt_id)!=4){
		  $('#cmt_app'+cmt_id).append(reply_comt);    
           document.getElementById('cmt_app'+cmt_id).id=4;
		  }
           /*else {
  	            document.getElementById('cmt_app'+cmt_id).remove();
				document.getElementById('cmt_app'+cmt_id).id='cmt_app'+cmt_id;
		   }*/
	   }); 
     $(document).on('click','.send',function()
	 {
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
	 
	 
});
</script>
<!--<div id="photo" style="align:butttom;position:relative;top:-40px;left:60px;width:30px;height:30px;z-index:99;">
<img style="cursor:pointer;"src="image/camera.png" width="100%" height="100%" >
</div>-->
<?php
 }
 ?>