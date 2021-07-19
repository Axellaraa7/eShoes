<?php
	session_start();

	include("MODELS/db.php");

	$message = '';
	$result = $_GET['result'];
	if(isset($_SESSION['idUser'])){
		$querySearch = mysqli_prepare($conn, "SELECT * FROM user WHERE idUser = ?");
		mysqli_stmt_bind_param($querySearch, "i", $_SESSION['idUser']);
		mysqli_stmt_execute($querySearch);
		$userData = mysqli_fetch_assoc(mysqli_stmt_get_result($querySearch));

		if($userData != null && $result == true){
			$queryDelete = mysqli_prepare($conn, "DELETE FROM user WHERE idUser = ?");
			mysqli_stmt_bind_param($queryDelete, "i", $_SESSION['idUser']);
			if(mysqli_stmt_execute($queryDelete)){
				header("Location: logout.php");
			}
		}else{
			header("Location: index.php");
		}
	}
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>ELIMINAR CUENTA</title>
</head>
<body>
</body>
</html>

