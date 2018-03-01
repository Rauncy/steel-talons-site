<?php $dir = ""; include($dir . "/header.php"); ?>
<div style="overflow: hidden">
  <center>
  <iframe src="https://calendar.google.com/calendar/embed?src=blake.romero724%40gmail.com&ctz=America%2FChicago" style="border: 0; position: relative; top: -20px" width = "800px" height="600px" frameborder="0" scrolling="no"></iframe>
  <center>
</div>




<div id = "background"><img class = "stretch" src=<?php echo $dir . "/images/scheduleBackground.jpg"?> alt="image"></div>
<style media="screen">
/*  to span image above across page, background image*/
#background {
    width: 100%;
    height: 100%;
    position: fixed;
    left: 0px;
    top: 0px;
    z-index: -999;
}

.stretch {
    width:100%;
    height:100%;
}
</style>

<?php include($dir . "/footer.php") ?>
