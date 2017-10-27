<?php $dir = ""; include($dir . "/header.php"); ?>
<div id="content">
  <head>
  <style>
    table {
    font-family: arial, sans-serif;
    border-collapse: collapse;
    width: 100%;

    }

    td,th {
      border: 1px solid #dddddd;
      text-align: right;
      padding: 8px;
    }

    tr:nth-child(even) {
      background-color: #dddddd;
    }
  </style>
  <link rel="stylesheet" href="<css/officers.css">
  </head>
  <body>

  <table>
    <tr>
      <th>Picture</th>
      <th>First Name</th>
      <th>Last Name</th>
      <th>Position</th>
      <th>Years in Robotics</th>
      <th>Grade</th>

    </tr>
    <tr>
      <th><img src="/think.png" class = "officerPic" alt="Broken Robot" style="width:100px;height:100px;"></th>
  <center><td>Varsha</td>
      <td>Kumar</td>
      <td>President</td>
      <td>4 years</td>
      <td>12th</td><center>
    </tr>
    <tr>
      <th><img src="/think.png" alt="Broken Robot"  class = "officerPic" style="width:100px;height:100px;"></th>
      <center><td>Philip</td>
      <td>DuPont</td>
      <td>Vice President</td>
      <td>3 years</td>
      <td>11th</td></center>
    </tr>
    <tr>
      <th><img src="/think.png" alt="Broken Robot"  class = "officerPic" style="width:100px;height:100px;"></th>
      <center><td>Rahul</td>
      <td>Modi</td>
      <td>Vice President</td>
      <td>3 years</td>
      <td>11th</td></center>
    </tr>
    <tr>
      <th><img src="/think.png" alt="Broken Robot"  class = "officerPic" style="width:100px;height:100px;"></th>
      <center><td>Fiona</td></center>
      <td>Devlin</td>
      <td>Secretary</td>
      <td>3 years</td>
      <td>11th</td></center>
    </tr>
    <tr>
      <th><img src="/think.png" alt="Broken Robot"  class = "officerPic" style="width:100px;height:100px;"></th>
      <center><td>Cole</td>
      <td>Thompson</td>
      <td>Sergeant in Arms</td>
      <td>4 years</td>
      <td>12th</td></center>
    </tr>
    <tr>
      <th><img src="/think.png" alt="Broken Robot"  class = "officerPic" style="width:100px;height:100px;"></th>
      <center><td>Taha</td>
      <td>Junejo</td>
      <td>Sergeant in Arms</td>
      <td>4 years</td>
      <td>12th</td></center>
    </tr>
    <tr>
      <th><img src="/think.png" alt="Broken Robot"  class = "officerPic" style="width:100px;height:100px;"></th>
      <center><td>Colin</td>
      <td>Weil</td>
      <td>Head of Marketing</td>
      <td>3 years</td>
      <td>11th</td>
    </center>
    </tr>

  </table>

</div>
<?php include($dir . "/footer.php") ?>
