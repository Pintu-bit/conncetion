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
background-color:#545059;
background-image: linear-gradient(325deg, #545059 1%, #380036 78%);
}
#logo{
     width:80%;
	 height:60px;
	 
}
</style>
</head>
<body bgcolor="#545059">
 <center><h3 style="margin-top:10%;">PLEASE LOG IN </h3></center>
<form action="" method="post" >
 <div id="d" style="border-radius:10px;border:solid 2px;border-color:#800000;width:35%;height:350px;margin-top:2%;margin-left:33%;box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
<center>
  <div id="logo" ><img src="image/logo1.png" width="100%" height="100%" ></div>
 <?php 
  if(isset($_GET['id']))
    {
       echo"<p style='color:red;'>"."invalid username or password"."</p>";
    }
     ?> 
<div style="margin-top:30px;">
<lebal style="margin-left:-40%;font-size:20px;color:#cfcfcf;">username</lebal>

<br>
<input type="text" class="input" name="username"/>
<br>
<br>
<lebal style="margin-left:-40%;font-size:20px;color:#cfcfcf;">password</lebal>
<br>
<input type="password" class="input"  name="password"/>
<br>
<br>
<input style="border:none;width:60%;height:30px;background-color:#3dff3d;" type="submit" value="LOG IN"/><br><br>
<a  style="color:#00FF00;" href="">Reset password</a>
</div>

</center>
</div>
</form>
</body>
</html>
