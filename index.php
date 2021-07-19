<?php include("MODELS/header.php"); ?>
	<section class="carousel">
		<div class="previous">
			<button onclick="changeImg(-1)">
				<img src="IMG/iconos/previousIcon.png">
			</button>
		</div>
		<a href="moda.php">
			<div class="slide transition">
				<img src="IMG/carousel/zapatos1.jpg" alt="">
			</div>
			<div class="slide transition">
				<img src="IMG/carousel/zapatos2.jpg">
			</div>
			<div class="slide transition">
				<img src="IMG/carousel/zapatos3.jpg">
			</div>
		</a>
		<div class="next">
			<button onclick="changeImg(1)">
				<img src="IMG/iconos/nextIcon.png">
			</button>
		</div>
	</section>
	<div class="divisor"></div>
	<div class="lema">
		EN LAS BUENAS Y EN LAS MALAS, CAMINANDO CONTIGO
	</div>
	<div class="divisor"></div>
	<section class="opinions">
		<div class="column">
			<img src="IMG/iconos/womanOpIcon.png"><br>
			Username
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
		<div class="column">
			<img src="IMG/iconos/manOpIcon.png"><br>
			Username
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
		</div>
		<div class="column">
			<img src="IMG/iconos/womanOpIcon2.png"><br>
			Username
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
			tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
			quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
			consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
			cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
			proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>	
		</div>
	</section>
<?php include("MODELS/footer.php"); ?>	