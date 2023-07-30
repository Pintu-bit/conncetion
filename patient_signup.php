<?php 
if(isset($_GET['id']) && $_GET['id']==1)
{
	echo "<script>alert('this username already eists '); </script>";
}
include "connection.php"; 
session_start();
  ?>
<!doctype html>
<html>
<head>
<style type="text/css">
.input
{
width:300px;
border-radius:10px;
padding:5px;
margin:20px;
background-color:cyan;
}
#log
  {
 width:200px;
 border-radius:10px;
background-color:cyan;
position:relative;
 left:270px;
  }
#log:hover{
 background:grey;
color:white;
 }
.div1
 {
width:100%;
height:70px;
background-color:cyan;
}
#img{
	margin-left:5%;
	border:solid 1px white;
	width:30%;
	height:300px;
	
}
#tbl{
	position:relative;
	left:39%;
	width:10%;
	top:00px;
}
.adj{
	position:relative;
	top:50px;
}
.txt{
	width:40%;
	height:30px;
	border:none;
}
#logo{
     width:80%;
	 height:60px;
	 
}
#top{
	position:relative;
	left:20%;
	font-family:monospace;
	color:grey;
}
#des_p{
	position:relative;
	font-family:monospace;
	font-size:14px;
	left:4%;
}
</style>
</head>
<body bgcolor="#e8e8e8">
   
  <br>
  <br>

  
  
<div id="tbl" style="border:solid 1px white; width:25%;height:550px;background-color:#a8a8a8;">
<h3 style="margin-left:20px;font-family:monospace;color:white;">PLEASE SIGN UP </h3>
<p id="top" >-For see Photos and videos </p>
<hr></hr>

<center>
<form action="" method="post" >
<div id="logo" ><img src="image/logo1.png" width="100%" height="100%" ></div>
<input class="adj" style="border:none;height:30px;width:80%;" type="text" placeholder="Name" name="name" required ><br><br>
<input class="adj" style="border:none;height:30px;width:80%;" type="email" placeholder="Email" name="email" required><br><br>
<input class="adj" class="txt" type="number" style="border:none;height:30px;width:80%;" placeholder="Phone" name="phone" required><br><br>
<input class="adj" style="border:none;height:30px;width:80%;" type="text" placeholder="Userame" name="username" required><br><br>
<input class="adj" style="border:none;height:30px;width:80%;" type="password" placeholder="Password" name="password" required><br><br>
<input class="adj" class="txt" type="submit" style="border:none;height:30px;width:45%;font-family:monospace;" value="Sign up">
<br><br>
<br><br><br><br>
<a  style="color:#00FF00;font-family:monospace;font-size:14px;" href="login.php">Have an account? Log in </a>
</center>

</div>
<?php
if(isset($_POST['email']) && isset($_POST['name']))
  {
	if($_POST['email']!="" && $_POST['name']!="")
    {
       $first_name=htmlentities($_POST['name'],ENT_QUOTES);
       $email=htmlentities($_POST['email'],ENT_QUOTES);
       $username=htmlentities($_POST['username'],ENT_QUOTES);
       $password=htmlentities(md5($_POST['password']),ENT_QUOTES);
       $phone=htmlentities($_POST['phone'],ENT_QUOTES);
	   $_SESSION['user']=$first_name;
        $sql1="select *from users where username='$username' ";
        $result=mysqli_query($con,$sql1);
             if($num=mysqli_num_rows($result))
                  {
                    header('location:create_user.php?id=1');
                  }
               else
              {
         $sql="insert into users(name,username,password,email,phone)values('$first_name','$username','$password',' $email','$phone')";
            $result1=mysqli_query($con,$sql);
           if( $result1 > 0)
              {
				  $for_id="select user_id from users where username='$username'";
				  $for_result=mysqli_query($con,$for_id);
				  if($row=mysqli_fetch_assoc($for_result))
				  {					  
			         $_SESSION['id']=$row['user_id'];
                    header('location:profile.php');
				  }		 
              }
             else 
             {
                echo "<script>alert('failed'); </script>";
             } 
           }
  }  
}
?>
</form>

</div>

</body>

</html>