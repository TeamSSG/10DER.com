<?php
if(!isset($_SESSION)) 
    { 
        session_start(); 
    } 
		
include("connection.php");

if(isset($_POST['title'])&&isset($_SESSION['user'])&&($_SESSION['user']!='none'))
{
	$title=$_POST['title'];
	$aoi=substr($_POST['categ'],0,3);
	$start=$_POST['start'];
	$end=$_POST['end'];
	$status=0;
	$creator=$_SESSION['user'];
	$description=$_POST['description'];
	if($start==""||$start=="0000-00-00")
	{
		;
	}
	else
	{
	$sql = "INSERT INTO tender (title, aoi, start, end, status, creator, description) VALUES ('".$title."','".$aoi."','".$start."','".$end."',".$status.",'".$creator."','".$description."')";
	echo $sql;
	if ($conn->query($sql) === TRUE) 
		echo "yes";
	else 
		echo "Error: " . $sql . "<br>" . $conn->error;
	}
	
}
?>