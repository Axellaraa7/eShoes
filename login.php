<?php
include("MODELS/db.php");
include("MODELS/headerForms.php");

session_start();

if(isset($_SESSION['idUser'])){
	header("Location: index.php");
}

$message = '';

if(!empty($_POST['email']) && !empty($_POST['psw'])){

	$email = $_POST["email"];
	$psw = $_POST["psw"];

	$querySearch = mysqli_prepare($conn, "SELECT idUser, userName,userPsw FROM user WHERE userEmail = ?");
	mysqli_stmt_bind_param($querySearch, "s", $email);
	mysqli_stmt_execute($querySearch);
	$userData = mysqli_fetch_assoc(mysqli_stmt_get_result($querySearch));
	if($userData!=null && password_verify($psw, $userData['userPsw'])){
		$_SESSION['idUser'] = $userData['idUser'];
		header("Location: index.php");
	}else{
		$message = "El usuario o la contraseña son incorrectas";
	}
	
}
?>
<link rel="stylesheet" href="CSS/loginStyle.css">
	<section class="login">
		<div class="container">
			<h1 style="margin:0px ;font-family: 'Big Shoulders Stencil Display'; font-size: 2.4rem; ">INICIAR SESION</h1><br>
			<?php if(!empty($message)):?>
				<p><?= $message ?></p>
			<?php endif; ?>
			<form action="login.php" method="POST">
				<label for="email"> Escriba su email </label><br>
				<input type="email" id="email" class="data" name="email"placeholder="Escriba su email" name="email">
				<label for="psw"> Digite su contrasenia </label><br>
				<input type="password" id="psw" name="psw" class="data" placeholder="Ingrese su contasenia" name="contrasenia">
				<br>
				<input type="submit" class="btnsub" value="¡Iniciar!"> 
			</form>
			<div class="registro">
				<h5 style="margin:0px; font-family: 'Big Shoulders Stencil Display'; font-size: 1.0rem;">
					<hr style="float:left;">¿Eres nuevo?<hr style="float: right;">
				</h5>
				<a href="register.php">
					<button class="register">
						¡REGISTRATE!
					</button>
				</a>
			</div>
		</div>
	</section>
	<footer>
		&copy2021 eshoes.com, Todos los derechos reservados.
	</footer>
</body>
</html>