<?php if(isset($_COOKIE["PHPSESSID"])) session_start() ?>
<!DOCTYPE HTML>
<html>
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<head>
    <meta name = "keywords" content ="Tompkins,Robotics,Obra,D,Steel,Talons">
    <meta charset = "UTF-8">
    <meta name = "description" content ="Homepage for the Tompkins Steel Talons Robotics Team">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- linking in external files-->
    <link href="https://fonts.googleapis.com/css?family=Anton|Josefin+Sans|Open+Sans|Oswald|Poppins|Princess+Sofia|Titillium+Web" rel="stylesheet">
    <link rel = "stylesheet"  href = <?php echo $dir . "/css/header-main.css"?>>
    <link rel="icon" type="image/png" sizes="16x16" href=<?php echo $dir . "/images/favicon-16x16.png"?>>
    <script src = <?php echo $dir . "/js/header-main.js"?> defer></script>
    <title><?php if(isset($title)) echo $title; else echo "Tompkins Robotics";?></title>

    <?php if(isset($headData))echo $headData;?>
  </head>
  <body>
    <header role = "banner">
      <a id="header-title" class ="horizm" style="float:left; padding-top:5px; padding-left:10px; font-size: 3em;" href="/">Tompkins&nbsp;Robotics</a>
			<?php
        echo '<div class = "dropdown">
			          <button class = "dropbtn">Tabs</button>
		            <div class = "dropdown-content">
		              <a href = "/officers">Officers</a>
		              <a href = "/teams?search=&page=1">Teams</a>
		              <a href = "/schedule">Schedule</a>
		              <a href = "/sponsors">Sponsors</a>';
        if(session_status()===2){
          echo '<a href = "/scouting/2018">Scouting</a>
                <a href = "/forum/index">Forums</a>';
          if($_SESSION["perm"]<2){
            echo '<a href = "/members/index.php?search=">Members</a>
                  <a href = "/admin">Administration</a>';
          }
          if($_SESSION["perm"]<1){
            echo '<a href = "/dev">Dev</a>';
          }
          echo '<a href = "/account/settings">Settings</a>
                <a href = "/account/logout">Logout</a>';
        }
        else{
          echo '<a href = "/account/login">Login</a>';
        }
        echo '</div>
							</div>';
      ?>
    </header>
  <main>
