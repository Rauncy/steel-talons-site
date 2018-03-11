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
    <title>Tompkins Robotics</title>
  </head>
  <body>
    <header role = "banner">
      <a id="header-title" class ="horizm" style="float:left; padding-top:5px; padding-left:10px; font-size: 3em;" href="/">Tompkins&nbsp;Robotics</a>
    </header>

    <nav id = "tabs">
      <ul id="list">
      	<li class ="horizm"><a href = "/officers">Officers</a></li>
      	<li class ="horizm"><a href = "/teams?search=&page=1">Teams</a></li>
        <li class ="horizm"><a href = "/schedule">Schedule</a></li>
      	<li class ="horizm"><a href = "/sponsors">Sponsors</a></li>
        <?php
        if(session_status()===2){
          echo '<li class ="horizm"><a href = "/scouting/2018.php">Scouting</a></li>';
          if($_SESSION["perm"]>=2)
          echo '<li class ="horizm"><a href = "/members/index.php?search=">Members</a></li>';
          echo '<li class ="horizm"><a href = "/admin">Administration</a></li>';
          echo '<div class ="account-dropdown">
            <li class ="horizm dropbtn" style="padding:0; padding-right:10px; padding-left:10px;">
              <a>'. $_SESSION["name"] .'</a>
            </li>
            <center>
              <div class ="dropdown horizm">
                <a>Filler</a>
                <a href = "/account/logout">Logout</a>
              </div>
            </center>
          </div>';
        }else{
          echo '<li class ="horizm" style="float:right; padding:0; margin-right:6px"><a href = "/account/login">Login</a></li>';
        }
        ?>
      </ul>
    </nav>
    <main>
