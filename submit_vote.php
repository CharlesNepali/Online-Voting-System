<?php
	include("admin/dbcon.php");
	session_start();
	session_destroy();
	 	$conn->query("INSERT INTO votes(candidate_id,voters_id) VALUES('$_SESSION[pres_id]', '$_SESSION[voters_id]')") or die(mysqli_error($conn));
		$conn->query("INSERT INTO votes(candidate_id,voters_id) VALUES( '$_SESSION[vpinternal_id]', '$_SESSION[voters_id]')") or die(mysqli_error($conn));
		$conn->query("INSERT INTO votes(candidate_id,voters_id) VALUES( '$_SESSION[vpexternal_id]', '$_SESSION[voters_id]')") or die(mysqli_error($conn));
		$conn->query("INSERT INTO votes(candidate_id,voters_id) VALUES( '$_SESSION[secretary_id]', '$_SESSION[voters_id]')") or die(mysqli_error($conn));
		$conn->query("INSERT INTO votes(candidate_id,voters_id) VALUES( '$_SESSION[auditor_id]', '$_SESSION[voters_id]')") or die(mysqli_error($conn));
		$conn->query("INSERT INTO votes(candidate_id,voters_id) VALUES( '$_SESSION[treasurer_id]', '$_SESSION[voters_id]')") or die(mysqli_error($conn));
		$conn->query("INSERT INTO votes(candidate_id,voters_id) VALUES( '$_SESSION[pio_id]', '$_SESSION[voters_id]')") or die(mysqli_error($conn));
		$conn->query("INSERT INTO votes(candidate_id,voters_id) VALUES( '$_SESSION[busman_id]', '$_SESSION[voters_id]')") or die(mysqli_error($conn));
		$conn->query("INSERT INTO votes(candidate_id,voters_id) VALUES( '$_SESSION[sgtarm_id]', '$_SESSION[voters_id]')") or die(mysqli_error($conn));
		$conn->query("INSERT INTO votes(candidate_id,voters_id) VALUES( '$_SESSION[muse_id]', '$_SESSION[voters_id]')") or die(mysqli_error($conn));
		$conn->query("INSERT INTO votes(candidate_id,voters_id) VALUES( '$_SESSION[escort_id]', '$_SESSION[voters_id]')") or die(mysqli_error($conn));
		$conn->query("UPDATE `voters` SET `status` = 'Voted' WHERE `voters_id` = '$_SESSION[voters_id]'") or die(mysqli_error($conn));




		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[pres_id]', '$_SESSION[voters_id]')") or die(mysqli_error($conn));
		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[vpinternal_id]', '$_SESSION[voters_id]')") or die("mysqli_error($conn)");
		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[vpexternal_id]', '$_SESSION[voters_id]')") or die("mysqli_error($conn)");
		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[secretary_id]', '$_SESSION[voters_id]')") or die("mysqli_error($conn)");
		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[auditor_id]', '$_SESSION[voters_id]')") or die("mysqli_error($conn)");
		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[treasurer_id]', '$_SESSION[voters_id]')") or die("mysqli_error($conn)");
		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[pio_id]', '$_SESSION[voters_id]')") or die("mysqli_error($conn)");
		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[busman_id]', '$_SESSION[voters_id]')") or die("mysqli_error($conn)");
		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[sgtarm_id]', '$_SESSION[voters_id]')") or die("mysqli_error($conn)");
		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[muse_id]', '$_SESSION[voters_id]')") or die("mysqli_error($conn)");
		// $conn->query("INSERT INTO `votes` VALUES('', '$_SESSION[escort_id]', '$_SESSION[voters_id]')") or die("mysqli_error($conn)");
		// $conn->query("UPDATE `voters` SET `status` = 'Voted' WHERE `voters_id` = '$_SESSION[voters_id]'") or die("mysqli_error($conn)");
		header("location:index.php");
		
?> 