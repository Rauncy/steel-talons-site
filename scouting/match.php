<?php $dir = ".."; include($dir . "/header.php"); include($dir . "/globals.php");?>
<link rel = "stylesheet" href = "/css/scouting.css">
<center>
  <h1 class="title">Match View</h1>
  <?php if(isset($_GET["match"])):?>
    <h1 class="formTitle">Match <?php echo $_GET["match"];?></h1>
    <table>
      <thead>
        <tr>
          <td><span class="formTitle roboticsRed">Red Alliance</span></td>
          <td><span class="formTitle roboticsBlue">Blue Alliance</span></td>
        </tr>
      </thead>
      <!--Need to implement blue alliance call for the correct match-->
      <tbody>
        <tr>
          <td>TODO</td>
          <td>TODO</td>
        </tr>
        <tr>
          <td>TODO</td>
          <td>TODO</td>
        </tr>
        <tr>
          <td>TODO</td>
          <td>TODO</td>
        </tr>
      </tbody>
    </table>
  <?php else:?>
    <h2 class="postNotif">Please select a match to view</h2>
  <?php endif;?>
</center>
<?php include($dir . "/footer.php") ?>
