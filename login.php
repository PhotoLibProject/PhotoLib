<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="../logincss/login.css">
</head>
<body style="background-image: url('../highlighted-grey-background.jpg')">
	<div align="center">
		<div >
			<!-- logo của trang web --> 
			<a  href="../BTL.php" title="Trở về trang chủ"> <img alt="Trở về trang chủ" src="../logo.png" width="150px" /> </a>
		</div>
	</div>
	<div align = "center">
		<p style="color: white;font-size: 23px"><b>SAI TÊN ĐĂNG NHẬP HOĂC MẬT KHẨU<b></p>
	</div>
	<div class = "modal">
		<form class="modal-content" method="post" action="checklogin.php">
			<div class="container">
				<label><b>Tên Đăng Nhập</b></label>
				<input type="text" name="username" placeholder="Đăng nhập..." value="">
				<label><b>Mật khẩu</b></label>
				<input type="password" name="password" placeholder="Mật khẩu..." value="">
				<div align="center">
					<button type="submit">Đăng nhập</button>
				</div>
				
			</div>
		</form>
	</div>
	<?php
		unset($_SESSION['email']);
		unset($_SESSION['password']);
		unset($_SESSION['username_a']);
		unset($_SESSION['avaiuser']);
		unset($_SESSION['avaiemail']);
		$_SESSION['check']= 1;
	?>
	<div align="center">
		<a href="registration.php"><button>Đăng ký</button></a>
	</div> <br>
	<div align="center">
		<a href="../BTL.php"><button>Quay lại trang chủ</button></a>
	</div>
</body>
</html>
