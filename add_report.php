<?php 
include "connect_db.php";
$post_id=$_POST['post_id'];
$add_report=new database();
$add_report->insert("report",['post_id'=>$post_id,'report_sts'=>1]);
print_r(sizeof($add_report->show()));
?>