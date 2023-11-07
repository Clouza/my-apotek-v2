<?php
require_once '../koneksi.php';

if (isset($_SESSION['userlogin'])) {
	return header("Location: ../dashboard/index.php");
}

require_once './templates/header.php';
?>

<img class="wave" src="img/wave.png">
<div class="container">
	<div class="img">
		<img src="img/foto3.svg">
	</div>
	<div class="login-content">
		<form action="auth.php" method="post">
			<img src="img/avatar.svg">
			<h2 class="title">Welcome</h2>
			<div class="input-div one">
				<div class="i">
					<i class="fas fa-user"></i>
				</div>
				<div class="div">
					<h5>Username</h5>
					<input type="text" class="input" name="username">
				</div>
			</div>
			<div class="input-div pass">
				<div class="i">
					<i class="fas fa-lock"></i>
				</div>
				<div class="div">
					<h5>Password</h5>
					<input type="password" class="input" name="password">
				</div>
			</div>
			<a href="register.php" id="daftarLink">Daftar</a>
			<input type="submit" class="btn" value="Sign in" name="masuk" id="masukBtn">
		</form>
	</div>
</div>


<?php
require_once './templates/footer.php';
?>