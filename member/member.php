<?php session_start() ?>
<!DOCTYPE html>
<html>
<head>
	<title>Member</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="../css/allweb.css">
	<link rel="stylesheet" type="text/css" href="../css/logreg.css">
</head>
<body class="p" style="background-image: url('../highlighted-grey-background.jpg')">
	<?php 
			if(isset($_SESSION['username'])){ ?>
			<div align="center" class="info" >
				<div align="right" style="color: white;width: 1200px;">
					<div>
							<?php
								echo "<a href='member.php' style='padding:5px 5px;text-decoration:none;color:white'>"."<b>".$_SESSION['fullName']."</b>"."&nbsp"."<a>";
							?>
							<?php
								echo "&nbsp"."<a href='logout.php' style='padding:5px 5px;text-decoration: none;color:red'>  Đăng xuất</a>";
							?>
					</div>
				</div>
			</div>
		<?php 	} ?>
	<div align="center">
		<div class="div1" >
			<div class="divlo" align="left">
				<div class="logo">
					<!-- logo của trang web --> 
					<a  href="../BTL.php"> <img src="../logo.png" width="150px" > </a>
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
					<a href="../BTL.php" onmouseenter="this.style.backgroundColor='gray'" onmouseleave="this.style.backgroundColor='#333'"">HOME</a>
				</li>
				<li>
					<a href="#" onmouseenter="this.style.backgroundColor='gray'" onmouseleave="this.style.backgroundColor='#333'">NATURE</a>
				</li>
				<li>
					<a href="#" onmouseenter="this.style.backgroundColor='gray'" onmouseleave="this.style.backgroundColor='#333'">FOOTBALL</a>
				</li>
				<li>
					<a href="#" onmouseenter="this.style.backgroundColor='gray'" onmouseleave="this.style.backgroundColor='#333'">COUNTRY</a>
				</li>
				<li>
					<a href="#" onmouseenter="this.style.backgroundColor='gray'" onmouseleave="this.style.backgroundColor='#333'">PLANET</a>
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
	
	
</body>
</html>