<!doctype html>
<html>
<head>
<style type="text/css" >
.input
 {
 width:60%;
 height:30px;
 border:none;
  border-bottom:solid 2px;
 }
#d
{
background-color:#a8a8a8;

}
#logo{
     width:80%;
	 height:60px;
	 
}
</style>
</head>
<body bgcolor="#e8e8e8">
 <center><h3 style="margin-top:10%;">PLEASE LOG IN </h3></center>
<form action="userlogin_db.php" method="post" >
 <div id="d" style="border-radius:10px;border:solid 2px;border-color:#800000;width:35%;height:380px;margin-top:2%;margin-left:33%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
<center>
  <div id="logo" ><img src="imgs/mail_log01.png" width="80%" height="100%" ></div>
 <?php 
  if(isset($_GET['id']) && $_GET['id']==2)
    {
       echo"<p style='color:red;font-size:16px;font-family:monospace;'>"."invalid username or password"."</p>";
    }
  if(isset($_GET['id']) && $_GET['id']==3)
	 {
	    echo"<p style='color:red;font-size:16px;font-family:monospace;'><B>"."YOUR ACCOUNT HAVE BEEN BLOCK FOR 7 DAYS"."</B></p>";
	 }
   else 
     {
     }
     ?> 
<div style="margin-top:30px;">


<br>
<input type="text" class="input" name="username" placeholder="username"/>
<br>
<br>

<br>
<input type="password" class="input"  name="password" placeholder="Password"/>
<br>
<br>
<input style="border:none;width:60%;height:30px;background-color:#3dff3d;" type="submit" value="LOG IN"/><br><br>
<a  style="color:grey;font-family:monospace;font-size:14px;" href="">Reset password</a><br><br>
<a  style="color:grey;font-family:monospace;font-size:14px;" href="create_user.php">Don't have an account? creatone</a>
</div>

</center>
</div>
</form>
</body>
</html>