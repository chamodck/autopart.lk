<?php
$detail = $_GET["detail"];
$detailarray = explode(",", $detail);
include '../database/dbconnect.php';

if($detailarray[0]=='user')
{
	
	
	$sql2="DELETE FROM user WHERE userID=$detailarray[1]";
	$result2 = mysqli_query($conn, $sql2);
	
	header("location:/autopart/admin/user.php");
}
else if($detailarray[0]=='forum')
{
	$sql1="DELETE FROM fanswer WHERE question_id=$detailarray[1]";
	$result1 = mysqli_query($conn, $sql1);
	
	$sql2="DELETE FROM fquestions WHERE id=$detailarray[1]";
	$result2 = mysqli_query($conn, $sql2);
	
	header("location:/autopart/admin/forumremove.php");
}


mysqli_close($conn);

?>