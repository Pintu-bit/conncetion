<?php
if($type == 'doctor')
{
$sid = $row['sid'];
$med_check = 0;
$query1 = "Select med_check FROM sessions Where sid = '$sid'";
$result1 = mysqli_query($con, $query1);
while($r = mysqli_fetch_array($result1)){
$med_check = $r['med_check'];
}
if($med_check==1){
echo '<label><a href="session_format.php?&type='.$type.'" class="btn btn-success mt-3" value="Create Session">'.'Accept Session'.'</a></label>';
}
else{

echo '<label><a href="session_format.php?&type='.$type.'" class="btn btn-success mt-3" style="pointer-events: none;cursor: not allowed;" value="Create Session">'.'Accept Session'.'</a></label>';

}
}

?>