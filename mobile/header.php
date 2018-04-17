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
        echo 'div class = "mobile-dropdown">
          <li class = "horizm dropbtn" style = "padding:0; padding-right:10px; padding-left:10px;">
            <a>Tabs</a>
          </li>
          <center>
            <div class = "dropdown horizm">
              <a href = "/mobile/officers">Officers</a>
              <a href = "/mobile/teams?search=&page=1">Teams</a>
              <a href = "/mobile/schedule">Schedule</a>
              <a href = "/mobile/sponsors">Sponsors</a>
              ';
        if(session_status()===2){
          echo '<a href = "/mobile/scouting/2018">Scouting</a>
                <a href = "/mobile/forum/index">Forums</a>
                ';
          if($_SESSION["perm"]<2){
            echo '<a href = "/mobile/members/index.php?search=">Members</a>
                  <a href = "/mobile/admin">Administration</a>
                  ';
          }
          if($_SESSION["perm"]<1){
            echo '<a href = "/mobile/dev">Dev</a>
                  ';
          }
          echo '<a href = "/mobile/account/settings">Settings</a>
                <a href = "/mobile/account/logout">Logout</a>';
        }
        else{
          echo '<a href = "/mobile/account/login">Login</a>';
        }
        echo '</div>
              </center>';
      ?>
    </header>
  <main>
