<?php 
	session_start();
	$db = mysqli_connect('localhost', 'root', '', 'crud');

	// initialize variables
	$evename = "";
	$evedate = "";
	$evetime = "";
	$location = "";
	$remarks = "";
	$update = false;

	if (isset($_POST['save'])) {
		$id = $_POST['id'];
		$evename = $_POST['evename'];
		$evedate = $_POST['evedate'];
		$evetime = $_POST['evetime'];
		$location = $_POST['location'];
		$remarks = $_POST['remarks'];
		mysqli_query($db, "INSERT INTO info (evename, evedate, evetime, location, remarks) VALUES ('$evename', '$evedate','$evetime', '$location', '$remarks')"); 
 
		header('location: index.php');
	}


	if (isset($_POST['update'])) {
		$id = $_POST['id'];
		$evename = $_POST['evename'];
		$evedate = $_POST['evedate'];
		$evedtime = $_POST['evetime'];
		$location = $_POST['location'];
		$remarks = $_POST['remarks'];
		mysqli_query($db, "UPDATE info SET evename='$evename', evedate='$evedate', evetime='$evetime', location='$location', remarks='$remarks' WHERE id=$id"); 
		header('location: index.php');
	}

	if (isset($_GET['del'])) {
		$id = $_GET['del'];
		mysqli_query($db, "DELETE FROM info WHERE id=$id");
		header('location: index.php');
	}


	$results = mysqli_query($db, "SELECT * FROM info");


?>