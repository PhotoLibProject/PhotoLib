<?php session_start();
$aid=$_REQUEST['id'];
$au = $_REQUEST['au'] ?>
<!DOCTYPE html>
<html>
<head>
	<title>Member</title>
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css/allweb.css">
	<link rel="stylesheet" type="text/css" href="css/logreg.css">
	<link rel="stylesheet" type="text/css" href="css/register.css">
	<link rel="stylesheet" type="text/css" href="css/style.css" />

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
	<br> <br>
	<div align = "center">
		<?php include 'connect.php'; 
			$sql = "SELECT * FROM album WHERE albumID=$aid";
			$result = mysql_query($sql);
			$row = mysql_fetch_assoc($result);
			echo "<span style='font-size:30px;color:white'><b>".$row['albumName']."</b></span>";
		?>
	</div>
	<br>
	<div>
		<div align="center" style="text-align: center">	
			<?php
				
				if($au == 1){
					$sql="SELECT * FROM photo WHERE albumID=$aid";
					$result = mysql_query($sql);
					$i = 1;
					$num = mysql_num_rows($result);
					?><section>
						<ul class="lb-album"><?

						while($row = mysql_fetch_assoc($result)){
							$photoName = $row['photoName'];
							$o = $i;
							$p = $i-1;
							$n = $i+1;
							if($p < 1) {$p=$num;}
							if($n > $num) {$n = 1;}
								echo "<li>";
								echo "<a href='#$o' > <img src='admin/Gallery/$photoName' style='max-width:150px;max-height:130px' ></a>";
								if(isset($_SESSION['username'])){
								echo "<div class='lb-overlay' id='$o' align='center'>";
									echo "<a href='#page' class='lb-close'>x Close</a>";
									echo "<img src='admin/Gallery/$photoName' >";
									echo "<div align='center'>";
										echo "<a href='#$p' class='lb-pn'>Prev</a>";
										echo "<br><br><br>";
										echo "<a href='#$n' class='lb-pn'>Next</a>";
									echo "</div>";
								echo "</div>";
								}else{
									echo "<div class='lb-overlay' id='$o'>";
									echo "<a href='#page' class='lb-close'>x Close</a>";
									echo "<p style='text-align:center;font-size:30px'><b>Bạn phải đăng nhập để xem được ảnh gốc</b></p>";
									echo "</div>";
								}
								echo "</li>";
								$i++;
								
								
							}
						}?>
							
						</ul>
					</section>
		</div>
	</div>
	<div>
		<div style="position: fixed;bottom:0;right: 0">
			<a href="admin/admin.php" style="text-decoration: none;color: white" alt="For admin">Admin</a>
		</div>
	</div>

</body>
</html>