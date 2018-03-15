<?php $dir = ".."; include($dir . "/header.php"); ?>
<link rel = "stylesheet" href = "/css/login.css">
<script src = "/js/account.js"></script>
<h1 class="title">Register</h1>
<?php
if(isset($_GET["err"])){
  echo "<h2 class = 'postNotif'><center>";
  switch(htmlspecialchars($_GET["err"])){
    case 0: echo "An account with that username or email already exists."; break;
    case 1: echo "Could not connect to authentication server. Please try again later."; break;
    default: echo "An unknown error occured.";
  }
  echo "</center></h2>";
}
?>
<form class="infoForm" onsubmit="return registerCheck();" action="/account/login.php" method="post">
  <center>
    <table>
      <tr>
        <td class = "formLabel">First Name:</td>
        <td><input type="text" id="registerFirstName" name="registerFirstName" placeholder="Johnny" required></td>
      </tr>
      <tr>
        <td class = "formLabel">Last Name:</td>
        <td><input type="text"  id="registerLastName" name="registerLastName" placeholder="Appleseed" required></td>
      </tr>
      <tr>
        <td class = "formLabel">Phone Number:</td>
        <td>
          (<input type="text" name="phone-1" style = "width: 30px" maxlength="3" required>) <input type="text" style = "width: 30px" name="phone-2" maxlength="3" required> - <input type="text" name="phone-3" style = "width: 40px" maxlength="4" required>
        </td>
      </tr>
      <tr>
        <td class = "formLabel">Grade:</td>
        <td>
          <!-- <input type="text" id="registerGrade" name="registerGrade" placeholder="9"> -->
          <input type="radio" name="registerGrade" value="9" required>9
          <input type="radio" name="registerGrade" value="10" required>10
          <input type="radio" name="registerGrade" value="11" required>11
          <input type="radio" name="registerGrade" value="12" required>12
        </td>
      </tr>
      <tr>
        <td class = "formLabel">Role: </td>
        <td>

          <select id="registerRole" name="registerRole" style= "height:35px; margin-bottom: 2em;">
            <optgroup label="Adult">
              <option value="Mentor">Mentor</option>
              <option value="Parent">Parent</option>
              <option value="Sponsor">Sponsor</option>
            </optgroup>
            <optgroup label="Student">
              <option value="Programming">Programming</option>
              <option value="Build">Build</option>
              <option value="Marketing">Marketing</option>
              <option value="CAD">CAD</option>
              <option value="Scouting">Scouting</option>
            </optgroup>
          </select>

        </td>
      </tr>
      <tr>
        <td class = "formLabel">Username:</td>
        <td><input type = "text" id = "registerUsername" name = "registerUsername" placeholder="johnnyappleseed" required></td>
      </tr>
      <tr>
        <td class = "formLabel">Email:</td>
        <td><input type = "text" id = "registerEmail" name = "registerEmail" placeholder="johnnyappleseed@gmail.com" required></td>
      </tr>
      <tr>
        <td class = "formLabel">Password:</td>
        <td><input type="password" id= "registerPassword" name = "registerPassword" placeholder="******" required></td>
      </tr>
      <tr>
        <td class = "formLabel">Confirm Password:</td>
        <td><input type="password" id="confirmPassword" name="confirmPassword" placeholder="******" required></td>
      </tr>

    </table>
    <input type="submit" value = "Register" name="submit"></input>
  </center>
  <br>
  <br>

</form>
<?php include($dir . "/footer.php") ?>
