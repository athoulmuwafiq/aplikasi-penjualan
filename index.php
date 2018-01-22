<?php
include "root.php";
session_start();
if (isset($_SESSION['username'])) {
	$root->redirect("home.php");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login | Aplikasi Penjualan</title>
	<style type="text/css">
	@font-face{
	font-family: titillium;
	src:url(assets/TitilliumWeb-SemiBold.ttf);
}
		*{margin: 0;padding: 0;font-family: titillium;}
		@keyframes muncul{
	0%{opacity: 0;}
	100%{opacity: 1;}
}
		body{overflow: hidden;animation-name: muncul;animation-duration: 2s}
		.both{clear: both;}
		.loginpage{position: fixed;background:url("assets/img/wp.jpg");height: 100%;width: 100%;background-size: 100%;}
			.padding{padding:80px 25px;}
			.login{float: right;width: 400px;background:#fff;height: 100%;}
			.login input,.login select,.login button{width: 100%;box-sizing: border-box;margin-bottom: 20px;border: 0px;padding: 10px;border-bottom: 1px solid #e4e7ea;outline: 0;color: #565656;font-size: 14px;}
			.login input:focus,.login select:focus{border-bottom: 1px solid #707cd2;transition: 0.2s}
			.login select{cursor: pointer;}
			.login button{cursor: pointer;background: #41b3f9;color: #fff;font-size: 20px;border-radius: 3px;}
			.login button:hover{background: #5bc0de}
			form{margin-top: 70px;}
			h3{text-align: center;}
			#status{width: 100%;color: #565656;font-size: 15px;display: none;box-sizing: border-box;border-radius: 3px}
			.red{color: #c7254e;background: #f9f2f4;padding: 10px;border-radius: 3px;}
			.green{color: rgb(1,186,56);background: rgb(230,255,230);padding: 10px;border-radius: 3px;}
			.link-forgot{color: #565656;padding: 0px 0px 20px 0px;display: inline-block;}
		}
	</style>
		<link rel="stylesheet" type="text/css" href="assets/awesome/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="assets/wow/animate.css">
	<script type="text/javascript" src="assets/jquery.js"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#loginapp").submit(function(){
			$.ajax({
				type:'POST',
				url:'handler.php?action=login',
				data:$(this).serialize(),
				success:function(data){
					$("#status").fadeIn(100);
					$("#status").html(data);
					window.setTimeout(function(){$('#status').fadeOut(100)},3000);

				}
			})
			return false;
		});
	});
</script>
</head>
<body>
	<div class="loginpage">
		<div class="login">
		
		<div class="padding">
			<h3>Login Aplikasi Penjualan</h3>
		<form id="loginapp">
			<input type="text" name="username" placeholder="Username">
			<input type="password" name="pass" placeholder="Password">
			
			<select name="loginas" required="required">
				<option value="1">Admin</option>
				<option value="2">Kasir</option>
			</select>
			<button type="submit"><i class="fa fa-sign-in"></i> Login</button>
			<div class="both"></div>
		</form>
		<div id="status">
			
		</div>
		</div>
		</div>
		</div>	
</body>
</html>
