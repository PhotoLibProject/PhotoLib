<?php
	$con = new mysqli('localhost','root','anchoino1','photolibrary');
	if($con->connect_error){
		die("Kết nối thất bại: ". $con->connect_error);
	}

	session_start();
	if(isset($_SESSION['email']) || isset($_SESSION['password']) || isset($_SESSION['username_a']) || isset($_SESSION['avaiuser']) || isset($_SESSION['avaiemail'])){
		unset($_SESSION['email']);
		unset($_SESSION['password']);
		unset($_SESSION['username_a']);
		unset($_SESSION['avaiuser']);
		unset($_SESSION['avaiemail']);
	}
	
	$username="";
	$password="";
	$fullname="";
	$email="";
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if(isset($_POST['username'])){
			$username=$_POST['username'];
			$password=$_POST['password'];
			$email=$_POST['email'];
		}
		if(isset($_POST['fullname'])){
			//Chuẩn hóa họ tên
			$fullname=$_POST['fullname'];
			$regex = "/\s+/";
					// xóa kí tự khoảng trắng thừa
    				$str = preg_replace($regex," ", $fullname);
    				$str = trim($str," ");
    				// chuyển tất cả chữ cái thành chữ thường
    				$str1 = strtolower($str);
    				$length = strlen($str1);
    				//chữ cái đầu viết hoa
    				$str1{0} = strtoupper($str1{0});
    				for($i=1;$i<$length;$i++){
				    	if($str{$i}==" "){
				    		$i++;
				    		$str1{$i} = strtoupper($str1{$i});
				    	}
   					}
		}
	}
	//Kiểm tra username, password và email xem có hợp lệ không
	$result = mysqli_query($con,"SELECT * FROM user WHERE email = '$email'");
	$row = mysqli_fetch_array($result);
	$count = mysqli_num_rows($result);
	if($count > 0){
		$_SESSION['avaiemail']=$email;
	}
	else{
		if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
			//Lưu biến SESSION['email'] để thông báo
			$_SESSION['email']=$email;
		}
	}
	//password
	$varp =  "/^([\w_\.!@#$%^&*()]+){5,31}$/";
	if(!preg_match($varp,$password,$match)){
		//Lưu biến SESSION['password'] để thông báo
		$_SESSION['password']=$password;
	}

	//username
	//kiểm tra xem username đã tồn tại hay chưa
	$result = mysqli_query($con,"SELECT * FROM user WHERE username = '$username'");
	$row = mysqli_fetch_array($result);
	$count = mysqli_num_rows($result);
	if($count > 0){
		$_SESSION['avaiuser']=$username;
	}
	else{
		$varu = '#^[A-z][\w\.]{5,31}$#';
		if(!preg_match($varu, $username,$match)){
			//Lưu biến SESSION['username'] để thông báo
			$_SESSION['username_a']=$username;
		}
	}
	if(isset($_SESSION['email']) || isset($_SESSION['password']) || isset($_SESSION['username_a']) || isset($_SESSION['avaiuser']) || isset($_SESSION['avaiemail'])) {
		header("location:registration.php");
	}
	else{
		unset($_SESSION['email']);
		unset($_SESSION['password']);
		unset($_SESSION['username_a']);
		unset($_SESSION['avaiuser']);
		unset($_SESSION['avaiemail']);
		unset($_SESSION['check']);
		$sql = "INSERT INTO user (username,password,fullName,bornedDate,email) VALUES ('$username','$password','$str1',now(),'$email')";
		if($con->query($sql) === TRUE){
			
			header("location:registration.php");
		}
	}


?>
