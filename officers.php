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
    <table>
      <tr>
        <th><img src="images/philip.jpg" alt="Philip DuPont"  class = "officerPic"></th>
        <center>
          <td>Philip</td>
          <td>DuPont</td>
          <td>Co-President</td>
          <td>4 years</td>
          <td>12th</td>
        </center>
      </tr>
      <tr>
        <th><img src="images/rahul.jpg" alt="Rahul Modi"  class = "officerPic"></th>
        <center>
          <td>Rahul</td>
          <td>Modi</td>
          <td>Co-President</td>
          <td>4 years</td>
          <td>12th</td>
        </center>
      </tr>
      <tr>
        <th><img src="think.png" alt="Blake Cohee"  class = "officerPic"></th>
        <center>
          <td>Blake</td>
          <td>Cohee</td>
          <td>Vice President</td>
          <td>3 years</td>
          <td>11th</td>
        </center>
      </tr>
      <tr>
        <th><img src="think.png" alt="Matthew Finn"  class = "officerPic"></th>
        <center>
          <td>Matthew</td>
          <td>Finn</td>
          <td>Vice-President of Build</td>
          <td>3 years</td>
          <td>11th</td>
        </center>
      </tr>
      <tr>
        <th><img src="think.png" alt="Hannah Nguyen"  class = "officerPic"></th>
        <center>
          <td>Hannah</td>
          <td>Nguyen</td>
          <td>Vice-President of Marketing</td>
          <td>3 years</td>
          <td>12th</td>
        </center>
      </tr>
      <tr>
        <th><img src="think.png" alt="Chris Zeller"  class = "officerPic"></th>
        <center>
          <td>Chris</td>
          <td>Zeller</td>
          <td>Vice-President of FIRST Programs</td>
          <td>4 years</td>
          <td>12th</td>
        </center>
      </tr>
      <tr>
        <th><img src="think.png" alt="Zayan Ali"  class = "officerPic"></th>
        <center>
          <td>Zayan</td>
          <td>Ali</td>
          <td>Vice-President of Outreach</td>
          <td>3 years</td>
          <td>12th</td>
        </center>
      </tr>
      <tr>
        <th><img src="think.png" alt="Blake Romero"  class = "officerPic"></th>
        <center>
          <td>Blake</td>
          <td>Romero</td>
          <td>Vice-President of Programming</td>
          <td>3 years</td>
          <td>12th</td>
        </center>
      </tr>
      <tr>
        <th><img src="images/fiona.jpg" alt="Fiona Devlin"  class = "officerPic"></th>
        <center>
          <td>Fiona</td>
          <td>Devlin</td>
          <td>Secretery</td>
          <td>4 years</td>
          <td>12th</td>
        </center>
      </tr>
    </table>
</div>
<?php include($dir . "/footer.php") ?>
