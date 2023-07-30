<?php
include "connect_db.php";
$rmv_obj=new database();
$id=$_POST['id'];
$rmv_obj->update("friend",['accept_sts'=>0],"follow_to=$id");
echo sizeof($rmv_obj->show());
?>