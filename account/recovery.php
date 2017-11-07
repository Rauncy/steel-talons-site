<?php
function recover(){
	if(isset($_POST["recoveryEmail"]))
	{
		$servername = "localhost";
		$username = "root";
		$password = "admin";

		$conn = new mysqli($servername, $username, $password, "robotics");
		if($conn->connect_error)
		{
			die();
		}
		$result = $conn->query("select * from members where Email = \"" . $_POST["recoveryEmail"] . "\";");
		if($result->num_rows > 0)
		{
			//TODO Send an email to user asking to reset password.
			$to = $_POST["recoveryEmail"];
			$subject = "Password Reset for Tompkins Robotics";
			$message = "
			<html>
			<head>
				<title>Password Reset for Tompkins Robotics</title>
			</head>
			<body>
				<p>It seems you have forgotten your password for your account on the Tompkins Robotics website.</p>
				<br>
				<p>Please go to the link below to reset your password:</p>
				<p>         google.com</p>
				<br>
				<p>If you did not request a password reset, please ignore this message.</p>
			</body>
			</html>
			";

			$headers[] = 'MIME-Version: 1.0';
			$headers[] = 'Content-type: text/html; charset=iso-8859-1';

			mail($to, $subject, $message, implode("\r\n", $headers));
		}
	}
}
if(isset($_POST["recoveryEmail"])){
  switch($_POST["submit"]){
    case "Send Recovery Email": recover(); break;
    default: $message = $_POST["submit"]; break;
  }
}
?>
<?php $dir = ".."; include($dir . "/header.php"); ?>

<div id="content" style="padding:0px">
  <form class="logIn" onsubmit="recover();" action="/account/recovery.php" method="post" style="padding:0px">
	  <center>
		  <h1 style = "color: #27292d;font-size:70px;padding-top:20px;padding-bottom:0px;margin-top:0px;margin-bottom:0px">Account Recovery</h1>
      <p class = "labelLog"; style="font-size:25px">Email: <input type = "text" id = "recoveryEmail" name = "recoveryEmail" placeholder="johnappleseed@gmail.com" style = "font-size:23px;padding-bottom:0px">
		  <input type="submit" value = "Send Recovery Email" name="submit"></input></p>
      <!-- <button id = "submit">
        <img src = "https://openclipart.org/image/800px/svg_to_png/191072/Blue-Robot.png" height = "50"; width="50" style="float:left;margin-right:0.5em">
      </button> -->

  </center>
      <br>
      <br>
  </form>
</div>
<?php include($dir . "/footer.php") ?>
