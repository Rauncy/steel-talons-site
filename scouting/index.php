<?php $dir = ".."; include($dir . "/header.php"); include($dir . "/globals.php");?>
<link rel = "stylesheet" href = "/css/scouting.css">
<h1 class="title">Scouting</h1>
<h1 class="subtitle">Root Menu</h1>
<center>
  <a href="/scouting/<?php echo $currentYear?>" class = "dirLink"><?php echo $currentYear?>'s scouting form</a>
  <?php if(isset($_SESSION["perm"]) && $_SESSION["perm"]<3):?>
    <a href="/scouting/list" class = "dirLink">Scouting Form Entries</a>
    <a href = "/scouting/teamScouting" class = "dirLink">Team Scouting</a>
  <?php endif;?>
</center>
<?php include($dir . "/footer.php");?>
