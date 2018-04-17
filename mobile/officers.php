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
  border: 1px dashed #aaa;
  text-align: center;
  padding: 5px;
  position: relative;
  }
  th{
    max-width: 7.5em;

  }

  tr:nth-child(even) {
  background-color: #dddddd;
  }

  .officerPic{
    float: center;
    border-radius: 30%;
    width: 120px;
    height: 120px;
    -ms-transform: rotate(90deg);
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
  }

  </style>

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
      <th><img src="/think.png" class = "officerPic" alt="Broken Robot" ></th>
  <center><td>Varsha</td>
      <td>Kumar</td>
      <td>President</td>
      <td>4 years</td>
      <td>12th</td><center>
    </tr>
    <tr>
      <th><img src="images/philip.jpg" alt="Philip's Picture"  class = "officerPic"></th>
      <center><td>Philip</td>
      <td>DuPont</td>
      <td>Vice President</td>
      <td>3 years</td>
      <td>11th</td></center>
    </tr>
    <tr>
      <th><img src="images/rahul.jpg" alt="Rahul's Picture"  class = "officerPic"></th>
      <center><td>Rahul</td>
      <td>Modi</td>
      <td>Vice President</td>
      <td>3 years</td>
      <td>11th</td></center>
    </tr>
    <tr>
      <th><img src="images/fiona.jpg" alt="Fiona's Picture"  class = "officerPic"></th>
      <center><td>Fiona</td></center>
      <td>Devlin</td>
      <td>Secretary</td>
      <td>3 years</td>
      <td>11th</td></center>
    </tr>
    <tr>
      <th><img src="/think.png" alt="Broken Robot"  class = "officerPic"></th>
      <center><td>Cole</td>
      <td>Thompson</td>
      <td>Sergeant in Arms</td>
      <td>4 years</td>
      <td>12th</td></center>
    </tr>
    <tr>
      <th><img src="images/taha.jpg" alt="Taha's Picture"  class = "officerPic"></th>
      <center><td>Taha</td>
      <td>Junejo</td>
      <td>Sergeant in Arms</td>
      <td>4 years</td>
      <td>12th</td></center>
    </tr>
    <tr>
      <th><img src="images/colin1.jpg" alt="Colin's Picture"  class = "officerPic"></th>
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
