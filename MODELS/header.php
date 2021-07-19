<?php

  	header("Cache-Control: no-cache, must-revalidate");
  	header("Expires: Sat, 1 Jul 2000 05:00:00 GMT");

	session_start();

	include("db.php");

	$message='';

	if(isset($_SESSION['idUser'])){
		$querySearch = mysqli_prepare($conn, "SELECT userName,userEmail FROM user WHERE idUser = ?");
		mysqli_stmt_bind_param($querySearch, "i", $_SESSION['idUser']);
		mysqli_stmt_execute($querySearch);
		$userData = mysqli_fetch_assoc(mysqli_stmt_get_result($querySearch));

		if($userData != null){
			$name = $userData['userName'];
			$email = $userData['userEmail'];
			$message = "Hola " . $name;
		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>E-Shoes</title>
	<link rel="shortcut icon" href="IMG/eshoes_logo.png">
	<link rel="stylesheet" href="CSS/IndexStyle.css">
	<link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Stencil+Display:wght@100;300&display=swap" rel="stylesheet"> 
	<link href="https://fonts.googleapis.com/css2?family=Yellowtail&display=swap" rel="stylesheet">
	<script src="JS/index.js"></script>
</head>
<body>
	<section class="sticky">
		<section class="header">
			<div>
				<a href="index.php"><img src="IMG/eshoes_logo.png" height="75px" ></a>
				<?php if(empty($message)){ ?>
					<a class="btnLogin" href="login.php"><button>Iniciar Sesion</button></a>
				<?php }else{ ?>
					<ul>
						<li>
							<button><img src="IMG/iconos/userIcon.png" style="display:inline;"><?= $message ?></button>
							<ul>
								<li>
									<a href="perfil.php"><button id="btnLogout">Actualizar Perfil</button></a>
								</li>
								<li>
									<a href="logout.php"><button id="btnLogout">Cerrar sesion</button></a>
								</li>
								<li>
									<a onclick="deleteAccount()"><button id="btnLogout">Eliminar Cuenta</button></a>
								</li>
							</ul>
						</li>
					</ul>
				<?php } ?>
			</div>
		</section>
		<nav class="rooter">
			<div class="column">
				<img src="IMG/iconos/manIcon.png" width="32px"/> <a href="man.php">Calzado hombres</a>
			</div>
			<div class="column">
				<img src="IMG/iconos/womanIcon.png" width="32px"/> <a href="woman.php">Calzado mujeres</a>
			</div>
			<div class="column">
				<img src="IMG/iconos/childrenIcon.png" width="32px"/> <a href="child.php">Calzado infantil</a>
			</div>
			<div class="column">
				<img src="IMG/iconos/contactIcon.png" width="32px"/> <a href="contact.php">Contactanos</a>
			</div>
			<div class="column">
				<img src="IMG/iconos/misvisIcon.png" /> <a href="misvis.php">Mision y vision</a>
			</div>
		</nav>
	</section>