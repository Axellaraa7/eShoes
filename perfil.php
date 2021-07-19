<?php

	session_start();

	include("MODELS/db.php");
	include("MODELS/headerForms.php");

	$message='';

	if(isset($_SESSION['idUser'])){
		$querySearch = mysqli_prepare($conn, "SELECT userName,userEmail FROM user WHERE idUser = ?");
		mysqli_stmt_bind_param($querySearch, "i", $_SESSION['idUser']);
		mysqli_stmt_execute($querySearch);
		$userData = mysqli_fetch_assoc(mysqli_stmt_get_result($querySearch));

		if($userData != null){
			$name = $userData['userName'];
			$email = $userData['userEmail'];
		}
	}

	if(!empty($_POST['name']) && !empty($_POST['email']) && !empty($_POST['psw']) && !empty($_POST['pswConf']) && !empty($_POST['accept'])){

		$name = $_POST['name'];
		$email = $_POST['email'];
		$psw = $_POST['psw'];
		$pswConf = $_POST['pswConf'];

		$querySearch = mysqli_prepare($conn, "SELECT * FROM user WHERE userEmail = ?");
		mysqli_stmt_bind_param($querySearch, "s", $email);
		mysqli_stmt_execute($querySearch);
		$userData = mysqli_fetch_assoc(mysqli_stmt_get_result($querySearch));

		if( ($userData === null || $userData['idUser'] === $_SESSION['idUser']) && $psw === $pswConf && $_POST['accept'] == true){
			$pswCipher = password_hash($psw,PASSWORD_BCRYPT);
			$queryUpdate = mysqli_prepare($conn, "UPDATE user SET userName = ?, userEmail = ?, userPsw = ? WHERE idUser = ?");
			mysqli_stmt_bind_param($queryUpdate, "ssss", $name, $email, $pswCipher , $_SESSION["idUser"]);
			if(mysqli_stmt_execute($queryUpdate)){
				header("Location: index.php");
			}
		}elseif($psw != $pswConf ){
			$message = "Las contraseñas no coinciden";
		}else{
			$message = "El correo ya está siendo usado o hay datos incompletos";
		}
	}

?>
<link rel="stylesheet" href="CSS/registerStyle.css">
	<section class="login">
		<div class="container">
			<h1 style="margin:0px ;font-family: 'Big Shoulders Stencil Display'; font-size: 2.4rem; ">Actualizar Datos</h1><br>
			<?php if(!empty($message)):?>
				<p><?= $message ?></p>
			<?php endif; ?>
			<form action="perfil.php" method="POST">
				<label for="name"> Escriba su nombre completo </label><br>
				<input type="text" id="name" name="name" class="data" placeholder="Escriba su nombre" value="<?php echo $name; ?>">
				<label for="email"> Escriba su email </label><br>
				<input type="email" id="email" class="data" name="email" placeholder="Escriba su email" value="<?php echo $email; ?>">
				<label for="psw"> Digite una contrasenia </label><br>
				<input type="password" id="psw" name="psw" class="data" placeholder="Ingrese una contasenia">
				<label for="pswConf"> Digite de nuevo su contrasenia </label><br>
				<input type="password" id="pswConf" name="pswConf" class="data" placeholder="Ingrese de nuevo su contrasenia">
				<input type="checkbox" id="accept" name="accept" class="accept"><label for="accept" style="font-size: .8rem;">Al seleccionar el campo, acepta los términos y condiciones
				</label>
				<br>
				<input type="submit" name="btnsub" class="btnsub" value="¡Actualizar!">
			</form>
			<a href="login.php"><button> Iniciar Sesion </button></a>
		</div>
	</section>
	<footer>
		&copy2021 eshoes.com, Todos los derechos reservados.
	</footer>
</body>
</html>