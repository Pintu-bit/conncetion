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
<div style="width:47%;height:630px;float:left;position:fixed;top:120px;left:35%;">
<form action="add.php" method="post">
<h3 style="font-size:18px;font-family:monospace;position:relative;left:40px;">Account Setting</h3>
<div id="password_change" style="border-radius:5px;cursor:pointer;background-color:#ababab;width:80%;height:30px;margin-left:20px;margin-top:10px;">
<span style="margin-left:40px;font-family:monospace;font-size:16px;">password change</span>
</div>
<div id="result_pass"></div>
<div id="action" style="border-radius:5px;cursor:pointer;background-color:#ababab;width:80%;height:30px;margin-left:20px;margin-top:10px;">
<span style="margin-left:40px;font-family:monospace;font-size:16px;">hide details </span>
</div>
<div id="result"></div>
<div id="update_contact"style="border-radius:5px;cursor:pointer;background-color:#ababab;width:80%;height:30px;margin-left:20px;margin-top:10px;">
<span style="margin-left:40px;font-family:monospace;font-size:16px;">update contact </span>
</div>
<div id="result_pass1"></div>
<div style="border-radius:5px;cursor:pointer;background-color:#ababab;width:80%;height:30px;margin-left:20px;margin-top:10px;">
<span style="margin-left:40px;font-family:monospace;font-size:16px;">turn into a private account</span>
</div>
<center><input type="submit" value="Save" style="background-color:#ababab;width:200px;height:30px;margin-top:10%;border-radius:5px;border:none;cursor:pointer;"></center>
</form>
</div>
<script src="jquery.js" type="text/javascript"></script>
 <script src="jqueryui/jquery-ui.js" type="text/javascript"></script>
<script>
$(document).ready(function(){
 $(document).on('click','#action',function()
 { 
	 if(document.getElementById("result"))
	 {
	  var result_content="";
      result_content+='<div style="margin-top:5px;margin-left:40px;width:80%;height:auto;">';
      result_content+='<span style="font-family:monospace;font-size:16px;position:relative;top:-10px;">hide your phone number</span><input style="width:20px;height:20px;margin-left:60px;margin-top:10px;" type="checkbox" name="phone"><br>';
      result_content+='<span style="font-family:monospace;font-size:16px;position:relative;top:-10px;">hide your email ID</span><input style="width:20px;height:20px;margin-left:60px;margin-top:10px;" type="checkbox" name="view_email">';
      result_content+='</div>';
      $('#result').append(result_content);
	  document.getElementById("result").id="nan";
	 }
     else
	 {
	    document.getElementById("nan").id="result";
	    $('#result').empty();
	 }
 });
 $(document).on('click','#password_change',function()
 { 
      
	 if(document.getElementById("result_pass"))
	 {
	  var password=prompt("Enter your current password");
	   $.ajax({
	       url:"check_user.php",
		   type:"POST",
		   data:{password:password},
		   success:function(data)
		   {
			  // console.log(data);
		     if(data>=1)
			 {
	           var result_content="";
	           result_content+='<span style="margin-left:30px;font-size:16px;font-family:monospace;">New Password</span><br>';
	           result_content+='<input name="password" style="border:none;border-bottom:1px;margin-left:30px;width:70%;height:30px;" type="text" required><br>';
               result_content+='<span style="margin-left:30px;font-size:16px;font-family:monospace;">Confirm Password</span><br>';
	           result_content+='<input name="con_password" style="border:none;border-bottom:1px;margin-left:30px;width:70%;height:30px;" type="text" required>';
               $('#result_pass').append(result_content);
	           document.getElementById("result_pass").id="nan1";
		      }
	       }
	    });
	 }
     else{
	    document.getElementById("nan1").id="result_pass";
	    $('#result_pass').empty();
	 }
 });
 
  $(document).on('click','#update_contact',function()
 { 
      
	 if(document.getElementById("result_pass1"))
	 {
	 var password=prompt("Enter your current password");
	 $.ajax({
	       url:"check_user.php",
		   type:"POST",
		   data:{password:password},
		   success:function(data)
		   {
			  // console.log(data);
		     if(data>=1)
			 {
			   var result_content="";
	           result_content+='<span style="margin-left:30px;font-size:16px;font-family:monospace;">Mobile Number </span><br>';
	           result_content+='<input name="mob" style="border:none;border-bottom:1px;margin-left:30px;width:70%;height:30px;" type="number" required><br>';
               result_content+='<span style="margin-left:30px;font-size:16px;font-family:monospace;">Email</span><br>';
	           result_content+='<input name="email" style="border:none;border-bottom:1px;margin-left:30px;width:70%;height:30px;" type="text" required>';    
               $('#result_pass1').append(result_content);
	           document.getElementById("result_pass1").id="nan2"; 
			 }
		   }
	    });
	 
	 }
     else{
	    document.getElementById("nan2").id="result_pass1";
	    $('#result_pass1').empty();
	 }
 });
});
</script>

<?php 
}
?>