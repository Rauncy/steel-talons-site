<?php $dir = ".."; include($dir . "/header.php"); ?>
<style>
#tabox{
  width:24em;
  height: 10em;
}
form{
  background-color:#E0E0E0;
  max-width:97.75%;
  margin-left: auto;
  margin-right:auto;
}
</style>

      <div id="content">
        <h1>
          Contact Us
        </h1>
        <p> Thank you for contacting Obra D. Tompkins Team 5427- The Steel Talons.
           Please fill out a valid email address
           and leave a message below.<br><br>
          <!-- we need a text box for contact information -->



          </div>
          <div>
<center>
            <form action ="mailto:varma.adityadev@gmail.com" method = "post" enctype = "text/plain">
                <i>Enter a first and last name.</i><br>
                <input type = "text" placeholder ="lastName, firstName"><br>
              </input>
                <i>Enter a valid email address.</i><br>
              <input type = "email" placeholder="email_address">
            <br> <i> Enter comment here.</i><br>
              <input type ="text" role = "textbox" style = "width:25em;height:8em;"><br><br>
              <input type = "submit" value = "Send message:">
              <input type = "reset" value = "Reset info">
              <br>

              </form>



            </center>
                  </div>
<?php include($dir . "/footer.php") ?>
