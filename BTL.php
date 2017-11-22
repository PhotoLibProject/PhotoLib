
<?php session_start(); ?>
<html>
	<head>
		<title> </title>
		<meta charset="utf-8">
		<link rel="stylesheet" type="text/css" href="css/slide.css">
		<link rel="stylesheet" type="text/css" href="css/allweb.css">
		<link rel="stylesheet" type="text/css" href="css/logreg.css">
		<link rel="stylesheet" type="text/css" href="css/register.css">
		<link rel="icon" type="image/gif/png" href="anonymous_mask1600.png">
	</head>
	<body class="p" style="background-image: url('highlighted-grey-background.jpg')">
	<!--Phần đăng nhập và đăng ký -->
		<?php 
			if(isset($_SESSION['username'])){ ?>
			<div align="center" class="info" >
				<div align="right" style="color: white;width: 1200px;">
					<div>
							<?php
								echo "<a href='member/member.php' style='padding:5px 5px;text-decoration:none;color:white'>"."<b>".$_SESSION['fullName']."</b>"."&nbsp"."<a>";
							?>
							<?php
								echo "&nbsp"."<a href='member/logout.php' style='padding:5px 5px;text-decoration: none;color:red'>  Đăng xuất</a>";
							?>
					</div>
				</div>
			</div>
		<?php 	} ?>
	<?php if(!isset($_SESSION['username'])){ ?>
	<div class="allform" align="center" >
		<div class = "form1" align="right" style="width: 1200px">
			<form method="post" action="member/checklogin.php">
				<table>
					<tr>
						<td >
							<input type="text" name="username" placeholder="Đăng nhập...">
						</td>
						<td >
							<input type="password" name="password" placeholder="Mật khẩu...">
						</td>
						<td>
							<button type="submit">Đăng nhập</button>
						</td>
						<td>
							<p style="color: gray"> or </p>
						</td>
						<td align="center">
							<p style="cursor: pointer;color: red" onclick="document.getElementById('id01').style.display='block'"><strong>Đăng ký</strong></p>
						</td>
					</tr>
				</table>
			</form>
		</div>
	</div>
	<?php } ?>

	<div align="center">
		<div class="div1" >
			<div class="divlo" align="left">
				<div class="logo">
					<!-- logo của trang web --> 
					<a  href="BTL.php"> <img src="logo.png" width="150px" > </a>
				</div>
			</div>
		</div>
	</div>
	
	<div align="center">
		<!-- Các thanh menu điều hướng -->
		<div id="menubar">
			<ul>
				<li>
					<p> <pre>                         </pre>    </p>
				</li>
				<li>
					<a href="BTL.php" onmouseenter="this.style.backgroundColor='gray'" onmouseleave="this.style.backgroundColor='#333'"">HOME</a>
				</li>
				<li>
					<a href="gallery.php?id=1&au=1" onmouseenter="this.style.backgroundColor='gray'" onmouseleave="this.style.backgroundColor='#333'">NATURE</a>
				</li>
				<li>
					<a href="gallery.php?id=2&au=1" onmouseenter="this.style.backgroundColor='gray'" onmouseleave="this.style.backgroundColor='#333'">FOOTBALL</a>
				</li>
				<li>
					<a href="gallery.php?id=3&au=1" onmouseenter="this.style.backgroundColor='gray'" onmouseleave="this.style.backgroundColor='#333'">COUNTRY</a>
				</li>
				<li>
					<a href="gallery.php?id=4&au=1" onmouseenter="this.style.backgroundColor='gray'" onmouseleave="this.style.backgroundColor='#333'">PLANET</a>
				</li>
				<li>
					<a href="#" onmouseenter="this.style.backgroundColor='gray'" onmouseleave="this.style.backgroundColor='#333'">OTHER</a>
				</li>

				<li>
					<p><pre>            </pre></p>
				</li>
				<li>
					<div align="center" class="search1">
						<!-- Mục tìm kiếm -->
						<div align="center" class="searchbar" >
      						<input type="search" id="search" placeholder="Search..." />
      						<span class="icon"> <input type="image" src="http://www.iconarchive.com/download/i12388/gakuseisean/ivista-2/Start-Menu-Search.ico" width="30px" alt="SEARCH" name=""> </span>
						</div>
					</div>
				</li>
			</ul>
		</div>
	</div>
	
	<!-- Phần slide ảnh demo -->
	<div class="slideshowall">
		<?php 
		include 'connect.php';
		//khoi tao bien file anh slide
		$sql = "SELECT * FROM album";
		$result = mysql_query($sql);

		while($row = mysql_fetch_assoc($result)){
			$name = $row['image'];
			$pid = $row['aid'];

		?>
		<div class="mySlides fade">
			<?php
				//au = 1: lựa chọn album của admin
				//au = 2: lựa chọn album của users
				echo "<a href='gallery.php?id=$pid&au=1'><img src='p_album/$name' style='width:100%'/></a>";
			?>
		</div>

		<?php } ?>
		<!-- Chuyển ảnh -->
		<a class="prev" onclick="plusSlides(-1)">&#10094;</a>
		<a class="next" onclick="plusSlides(1)">&#10095;</a>

		
	}
	</div>
		<!-- Chọn slide ảnh -->
		<div style="text-align:center">
 		<span class="dot" onclick="currentSlide(1)"></span> 
  		<span class="dot" onclick="currentSlide(2)"></span> 
  		<span class="dot" onclick="currentSlide(3)"></span> 
  		<span class="dot" onclick="currentSlide(4)"></span> 
	</div>
	<!--form đăng ký -->
	<div id='id01' class="modal">

		<form action="member/checkreg.php" class="modal-content animate" method="post">
			<div align="right">
			<span  onclick="document.getElementById('id01').style.display='none'" class="close" title="Close">×</span>
			</div>
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
	</div>
	<div>
		<div style="position: fixed;bottom:0;right: 0">
			<a href="admin/admin.php" style="text-decoration: none;color: white" alt="For admin">Admin</a>
		</div>
	</div>
	<script src="js/slidejs.js"></script>
	<script src="js/reg.js"></script>
	</body>

</html>