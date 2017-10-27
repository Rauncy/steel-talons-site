<?php $dir = ".."; include($dir . "/header.php"); ?>
<link rel = "stylesheet"  href = "../css/settings.css">
<script src="../js/settings.js" charset="utf-8"></script>


<h2><u>Settings</u></h2>
<!-- <h2><u>Settibn</u></h2> -->

<div id="profilePic">
  <!-- TODO: get specific settings for user's profile-->
  <img src="https://www.javacodegeeks.com/wp-content/uploads/2014/05/Must-read-articles-for-Programmers-and-Software-Developers.jpg" id = "profPic"class="img" width="250" height="250" alt="Profile Picture">
  <b class = "imgText">Click to Change</b>

  <input type="file" id = "fileSelector" class="imgText" accept="image/gif, image/jpeg, image/png" onchange="changeProfileImage(this)">

</div>
<?php include($dir . "/footer.php") ?>
