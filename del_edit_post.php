<?php
session_start();
$cur_id=$_SESSION['id'];
include "connect_db.php";
$del_edit=new database();
$id=$_POST['id'];

  $del_edit->delete("post","post_id=$id");
  $del_edit_result=$del_edit->show();
  echo sizeof($del_edit_result);
  
 ?>