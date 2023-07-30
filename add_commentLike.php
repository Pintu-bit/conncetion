<?php 
session_Start();
include "connect_db.php";
//$addlike_result=0;
$id=$_SESSION['id'];
$comment_id=$_POST['comment_id'];
$addLike=new database();
$addLike->sql_high("comment_like","comment_like,like_by",null,"comment_id=$comment_id");
//print_r($addLike->show());
//if(sizeof($addLike->show()))
//{
	$cmtBy=$addLike->show();
	if(isset($cmtBy[0]['like_by']) and $cmtBy[0]['like_by']==$id)
	{
		//$temp=$cmtBy[0]['comment_like'];
		//$temp-=1;
        $addLike->delete("comment_like","comment_id=$comment_id");
		//echo 0;
	}
	else
	{
		//$temp=$cmtBy[0]['comment_like'];
		//$temp+=1;
		$addLike->insert("comment_like",['comment_id'=>$comment_id,'comment_like'=>1,'like_by'=>$id]);
		// echo 0;
	}
	
//}
$addLike_result=$addLike->show();
echo sizeof($addLike_result); 

?>