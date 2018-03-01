<?php
if(isset($_POST["registerUsername"])){
  switch($_POST["submit"]){
    case "Register": register(); break;
    default: $message = $_POST["submit"]; break;
  }
}
?>
<?php $dir = ".."; include($dir . "/header.php"); ?>
<link rel = "stylesheet" href = "/css/login.css">
<script src = "/js/account.js"></script>
<h1 class="title">Register</h1>
<form class="infoForm" onsubmit="register();" action="/account/login.php" method="post">
  <center>
    <table>
      <tr>
        <td class = "formLabel">First Name:</td>
        <td><input type="text" id="registerFirstName" name="registerFirstName" placeholder="Johnny"></td>
      </tr>
      <tr>
        <td class = "formLabel">Last Name:</td>
        <td><input type="text"  id="registerLastName" name="registerLastName" placeholder="Appleseed"></td>
      </tr>
      <tr>
        <td class = "formLabel">Phone Number:</td>
        <td>
          (<input type="text" name="phone-1" style = "width: 30px" maxlength="3">) <input type="text" style = "width: 30px" name="phone-2" maxlength="3"> - <input type="text" name="phone-3" style = "width: 40px" maxlength="4">
        </td>
      </tr>
      <tr>
        <td class = "formLabel">Grade:</td>
        <td>
          <!-- <input type="text" id="registerGrade" name="registerGrade" placeholder="9"> -->
          <input type="radio" name="registerGrade" value="9">9
          <input type="radio" name="registerGrade" value="10">10
          <input type="radio" name="registerGrade" value="11">11
          <input type="radio" name="registerGrade" value="12">12
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
        <td><input type = "text" id = "registerUsername" name = "registerUsername" placeholder="johnnyappleseed"></td>
      </tr>
      <tr>
        <td class = "formLabel">Email:</td>
        <td><input type = "text" id = "registerEmail" name = "registerEmail" placeholder="johnnyappleseed@gmail.com"></td>
      </tr>
      <tr>
        <td class = "formLabel">Password:</td>
        <td><input type="password" id= "registerPassword" name = "registerPassword" placeholder="******"></td>
      </tr>
      <tr>
        <td class = "formLabel">Confirm Password:</td>
        <td><input type="password" id="confirmPassword" name="confirmPassword" placeholder="******"></td>
      </tr>

    </table>
    <input type="submit" value = "Register" name="submit"></input>
  </center>
  <br>
  <br>

</form>
<?php include($dir . "/footer.php") ?>
