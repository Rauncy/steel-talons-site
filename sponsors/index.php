<?php $dir = ".."; include($dir . "/header.php"); ?>
<link rel="stylesheet" type = "text/css" href=<?php echo $dir . "/css/sponsors.css" ?>>
<h2 class = "title">Building a new robot every year and competing costs a lot of money.  Each regional competition costs the team $5,000 for first one and $4,000 for each additional one.  We are very thankful for all the organizations who have sponsored Tompkins Robotics in the past.</h2>
<script defer>

$("h3").hover(function(){
    alert("function");
    $('#rockwell').classList.toggle("show");
},function(){
  $('#rockwell').classList.toggle("show");
});


// When the user clicks on <div>, open the popup
function pop(id) {
    var popup = document.getElementById(id);
    popup.classList.toggle("show");
}
</script>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


<h2 class="title"><u><strong>2018 Season Sponsors:</strong></u></h2>
<div class = "sponsor_list">
  <h3 class = "sponsor  first" id = "rock" onclick="pop('rockwell')">Rockwell Automation<span class="popuptext" id="rockwell">
    <div class="card">
      <img src=<?php echo $dir . "/imagess/rockwell.png" ?> alt="Rockwell Logo"  height="150px"style="width:100%">
      <h1 class = "name">Rockwell Automation</h1>
      <p class="info">Rockwell Automation, Inc., is an American provider of industrial automation and titlermation products. Brands include Allen-Bradley and Rockwell Software.</p>
      <br>
      <a href="https://www.rockwellautomation.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
      <a href="https://twitter.com/ROKAutomation" target="_blank"><i class="fa fa-twitter"></i></a>
      <a href="https://www.linkedin.com/company/rockwell-automation" target="_blank"><i class="fa fa-linkedin"></i></a>
      <a href="https://www.facebook.com/ROKAutomation/" target="_blank"><i class="fa fa-facebook"></i></a>
    </div>
  </span></h3>
  <h3 class = "sponsor" onclick="pop('workforce')">Texas Workforce Commission
    <span class="popuptext" id="workforce">
      <div class="card">
        <img src=<?php echo $dir . "/images/workforce.jpg" ?> alt="Texas Workforce Logo"  height="250px"style="width:100%">
        <h1 class = "name">Texas Workforce Commision</h1>
        <p class="info">The Texas Workforce Commission is a governmental agency in the U.S. state of Texas that provides unemployment benefits and services related to employment to eligible individuals and businesses.</p>
        <br>
        <a href="https://www.twc.state.tx.us/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/TXWorkforce" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/texas-workforce-commission" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/texasworkforcecommission/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span></h3>
  <h3 class = "sponsor " onclick="pop('finn')">Finn Family & Philips66 Matching Fund
    <span class="popuptext" id="finn">
      <div class="card">
        <img src=<?php echo $dir . "/images/finn.png" ?> alt="Finn Logo"  height="180px"style="width:100%">
        <h1 class = "name">Finn Family & Philips 66</h1>
        <p class="info">Much gratitude to the Finn Family for securing a sponsorship with Philips 66. The Phillips 66 Company is an American multinational energy company headquartered in Westchase, Houston, Texas. It debuted as an independent energy company when ConocoPhillips executed a spin-off of its downstream and midstream assets.</p>
        <br>
        <a href="https://www.rockwellautomation.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/ROKAutomation" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/rockwell-automation" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/ROKAutomation/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span></h3>
  <h3 class = "sponsor" onclick="pop('dupont')">Dupont Family
    <span class="popuptext" id="dupont">
      <div class="card">
        <img src=<?php echo $dir . "/images/dupont.png" ?> alt="Dupont Family"  height="150px"style="width:100%">
        <h1 class = "name">Dupont Family</h1>
        <p class="info">Rockwell Automation, Inc., is an American provider of industrial automation and titlermation products. Brands include Allen-Bradley and Rockwell Software.</p>
        <br>
        <a href="https://www.rockwellautomation.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/ROKAutomation" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/rockwell-automation" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/ROKAutomation/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span></h3>
  <h3 class = "sponsor " onclick="pop('hydro')">The Hydrographic Society of America- HC
    <span class="popuptext" id="hydro">
      <div class="card">
        <img src=<?php echo $dir . "/images/hydro.jpg" ?> alt="Hydro Logo"  height="200px"style="width:100%">
        <h1 class = "name">The Hydrographic Society of America</h1>
        <p class="info">The mission of The Hydrographic Society of America (THSOA) is to promote education in hydrography. THSOA-HC serves as the focal point for several volunteer activities in the Houston Area.</p>
        <br>
        <a href="https://houston.thsoa.org/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/hashtag/thsoa" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/the-hydrographic-society-of-america" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/thsoahc/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
     </span></h3>
  <h3 class = "sponsor" onclick="pop('best')">Best in Class Education Center
    <span class="popuptext" id="best">
      <div class="card">
        <img src=<?php echo $dir . "/images/best.png" ?> alt="Best Logo"  height="150px"style="width:100%">
        <h1 class = "name">Best in Class Education Center</h1>
        <p class="info">Best In Class help students develop the skills and knowledge they need for a bright future. Students benefit from individual attention, active instruction in small groups, and engaging course material aligned with common standards.</p>
        <br>
        <a href="https://www.bestinclasseducation.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://www.linkedin.com/company/best-in-class-education" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/BestInClassEducationCenter/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span></h3>
  <h3 class = "sponsor " onclick="pop('espinosa')">  Espinosa Family & ExxonMobil Matching
    <span class="popuptext" id="espinosa">
      <div class="card">
        <img src=<?php echo $dir . "/images/espinosa.png" ?> alt="Exxon Logo"  height="150px"style="width:100%">
        <h1 class = "name">Espinosa Family & ExxonMobile</h1>
        <p class="info">Much gratitude to the Espinosa Family for securing a sponsorship with ExxonMobile. Exxon Mobil Corporation is an American multinational oil and gas corporation headquartered in Irving, Texas.</p>
        <br>
        <a href="https://corporate.exxonmobil.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/exxonmobil" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/exxonmobil" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/ExxonMobil/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
     </span></h3>
  <h3 class = "sponsor" onclick="pop('marco')"> Marco's Pizza
    <span class="popuptext" id="marco">
      <div class="card">
        <img src=<?php echo $dir . "/images/marco.png" ?> alt="Marco Logo"  height="150px"style="width:100%">
        <h1 class = "name">Marco's Pizza</h1>
        <p class="info">Marco’s Pizza, operated by Marco's Franchising, LLC, is a restaurant chain and interstate franchise based in Toledo, Ohio, that specializes in Italian-American cuisine. The first store is in Oregon, Ohio, at Starr Avenue and Wheeling Street.</p>
        <br>
        <a href="https://www.marcos.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/MarcoPizza" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/marco%27s-pizza" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/MarcosPizza/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span></h3>
  <h3 class = "sponsor " onclick="pop('forrest')">Forrest Orthodontics
    <span class="popuptext" id="forrest">
      <div class="card">
        <img src=<?php echo $dir . "/images/rockwell.png" ?> alt="Rockwell Logo"  height="150px"style="width:100%">
        <h1 class = "name">Rockwell Automation</h1>
        <p class="info">Rockwell Automation, Inc., is an American provider of industrial automation and titlermation products. Brands include Allen-Bradley and Rockwell Software.</p>
        <br>
        <a href="https://www.rockwellautomation.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/ROKAutomation" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/rockwell-automation" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/ROKAutomation/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span></h3>
</div>

<br><br>

<h2 class="title"><u><strong>2017 Season Sponsors:</strong></u></h2>
<div class = "sponsor_list">
  <h3 class = "sponsor  first">Rockwell Automation</h3>
  <h3 class = "sponsor">Rockwell Automation</h3>
  <h3 class = "sponsor ">Rockwell Automation</h3>
  <h3 class = "sponsor">Rockwell Automation</h3>
  <h3 class = "sponsor ">Rockwell Automation</h3>
  <h3 class = "sponsor">Rockwell Automation</h3>
  <h3 class = "sponsor ">Rockwell Automation</h3>
  <h3 class = "sponsor">Rockwell Automation</h3>
</div>

<br><br>

<h2 class="title"><u><strong>2016 Season Sponsors:</strong></u></h2>
<div class = "sponsor_list">
  <h3 class = "sponsor  first">Rockwell Automation</h3>
  <h3 class = "sponsor">Rockwell Automation</h3>
  <h3 class = "sponsor ">Rockwell Automation</h3>
  <h3 class = "sponsor">Rockwell Automation</h3>
  <h3 class = "sponsor ">Rockwell Automation</h3>
  <h3 class = "sponsor">Rockwell Automation</h3>
  <h3 class = "sponsor ">Rockwell Automation</h3>
</div>

<br><br>

<h2 class="title"><u><strong>2015 Season Sponsors:</strong></u></h2>
<div class = "sponsor_list">
  <h3 class = "sponsor  first">Rockwell Automation</h3>
  <h3 class = "sponsor">Rockwell Automation</h3>
  <h3 class = "sponsor ">Rockwell Automation</h3>
  <h3 class = "sponsor">Rockwell Automation</h3>
  <h3 class = "sponsor ">Rockwell Automation</h3>
  <h3 class = "sponsor">Rockwell Automation</h3>
</div>

<?php $dir = ".."; include($dir . "/footer.php"); ?>
