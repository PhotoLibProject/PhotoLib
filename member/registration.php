<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="../logincss/login.css">
</head>
<body style="background-image: url('../highlighted-grey-background.jpg')">
	<?php
		session_start();
		if(isset($_SESSION['username_a'])){ 
			echo "<p align='center' style='color: white;font-size: 23px'><b>USERNAME KHÔNG HỢP LỆ<b></p>";
		}
		if(isset($_SESSION['password'])){ 
			echo "<p align='center' style='color: white;font-size: 23px'><b>PASSWORD KHÔNG HỢP LỆ<b></p>";
		}
		if(isset($_SESSION['email'])){ 
			echo "<p align='center' style='color: white;font-size: 23px'><b>EMAIL KHÔNG HỢP LỆ<b></p>";
		}
		if(isset($_SESSION['avaiuser'])){
			echo "<p align='center' style='color: white;font-size: 23px'><b>USERNAME ĐÃ CÓ NGƯỜI SỬ DỤNG<b></p>";
		}
		if(isset($_SESSION['avaiemail'])){
			echo "<p align='center' style='color: white;font-size: 23px'><b>EMAIL ĐÃ CÓ NGƯỜI SỬ DỤNG<b></p>";
		}
	?>
	<?php
	if(!isset($_SESSION['check'])) 
	if(!isset($_SESSION['email']) && !isset($_SESSION['password']) && !isset($_SESSION['username']) && !isset($_SESSION['avaiuser']) && !isset($_SESSION['avaiemail'])){ 
		echo "<p align='center' style='color: white;font-size: 23px'><b>ĐĂNG KÝ THÀNH CÔNG<b></p>"; 
	} ?>
		<div align="center">
			<div >
				<!-- logo của trang web --> 
				<a  href="../BTL.php" title="Trở về trang chủ"> <img alt="Trở về trang chủ" src="../logo.png" width="150px" /> </a>
			</div>
		</div>
		<div class = "modal">
			<form class="modal-content" method="post" action="checkreg.php">
				<div class="container">
					<label for='username'><b>Username</b></label>
					<input id='username' type="text" placeholder="Username" name="username" required />
					<label for='password'><b>Password</b></label>
					<input id='password' type="Password" placeholder="Password" name="password" required>
					<label for='name'><b>Họ và tên</b></label>
					<input id='name' type="text" placeholder="Họ và tên" name="fullname" required>
					<label for='email'><b>Email</b></label>
					<input id='email' type="text" placeholder="email" name="email" required>
					<div class ="buttonsgu" align="center">
						<button type="submit" class="signupbtn">Đăng ký</button>
					</div>
				</div>
			</form>
		</div>
		<div align="center">
			<a href="../BTL.php"><button>Quay lại trang chủ</button></a>
		</div>
	
</body>
</html>