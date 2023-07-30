<?php 
include"connect_db.php";
session_start();
$id=$_SESSION['id'];
$accept_id=$_POST['accept_id'];
$add_accept=new database();
$add_accept->update("friend",['accept_sts'=>1],"follow_to=$id and follow_by=$accept_id");
if(sizeof($add_accept->show()))
{
  echo 1;
 }
 else
  {
   echo 0; 
   }
   ?>