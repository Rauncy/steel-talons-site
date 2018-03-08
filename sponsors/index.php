<?php $dir = ".."; include($dir . "/header.php"); ?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type = "text/css" href=<?php echo $dir . "/css/sponsors.css" ?>>
<h2 class = "title">Building a new robot every year and competing costs a lot of money.  Each regional competition costs the team $5,000 for first one and $4,000 for each additional one.  We are very thankful for all the organizations who have sponsored Tompkins Robotics in the past.</h2>



<script>
$(document).ready(function(){
  var arr = document.getElementsByClassName('sponsor')
  for (var i = 0; i < arr.length; i++) {
    if(arr[i].firstElementChild != undefined){
        // console.log(arr[i].firstElementChild.offsetLeft+"  left");
      if (arr[i].firstElementChild.offsetLeft+300 > window.innerWidth) {
        arr[i].firstElementChild.style.left = "79.7%";
      }

      // alert(arr[i].firstElementChild.id +" " + (arr[i].firstElementChild.offsetTop+ arr[i].firstElementChild.offsetHeight)+" "+$(document).height());
      if((arr[i].firstElementChild.offsetTop+arr[i].firstElementChild.offsetHeight) >= $(document).height()){
          arr[i].firstElementChild.style.bottom = "-120%";
      }
      $(arr[i]).hover(function(){
        var span = this.firstElementChild;
        span.classList.toggle("show");
        },function(){
          var span = this.firstElementChild;
          span.classList.toggle("show");
      });
    }
  }

});

</script>



<h2 class="title"><u><strong>2018 Season Sponsors:</strong></u></h2>
<div class = "sponsor_list">
  <h3 class = "sponsor  first" id = "rock">Rockwell Automation
    <span class="popuptext" id="rockwell">
    <div class="card">
      <img src=<?php echo $dir . "/images/rockwell.png" ?> alt="Rockwell Logo"  height="150px" style="width:100%;border-radius: 15%;">
      <h1 class = "name">Rockwell Automation</h1>
      <p class="info">Rockwell Automation, Inc., is an American provider of industrial automation and titlermation products. Brands include Allen-Bradley and Rockwell Software.</p>
      <br>
      <a href="https://www.rockwellautomation.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
      <a href="https://twitter.com/ROKAutomation" target="_blank"><i class="fa fa-twitter"></i></a>
      <a href="https://www.linkedin.com/company/rockwell-automation" target="_blank"><i class="fa fa-linkedin"></i></a>
      <a href="https://www.facebook.com/ROKAutomation/" target="_blank"><i class="fa fa-facebook"></i></a>
    </div>
  </span></h3>
  <h3 class = "sponsor" >Texas Workforce Commission
    <span class="popuptext" id="workforce">
      <div class="card">
        <img src=<?php echo $dir . "/images/workforce.jpg" ?> alt="Texas Workforce Logo"  height="250px" style="width:100%;border-radius: 15%;">
        <h1 class = "name">Texas Workforce Commision</h1>
        <p class="info">The Texas Workforce Commission is a governmental agency in the U.S. state of Texas that provides unemployment benefits and services related to employment to eligible individuals and businesses.</p>
        <br>
        <a href="https://www.twc.state.tx.us/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/TXWorkforce" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/texas-workforce-commission" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/texasworkforcecommission/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span></h3>
  <h3 class = "sponsor ">Finn Family & Philips66 Matching Fund
    <span class="popuptext" id="finn">
      <div class="card">
        <img src=<?php echo $dir . "/images/finn.png" ?> alt="Finn Logo"  height="180px" style="width:100%;border-radius: 15%;">
        <h1 class = "name">Finn Family & Philips 66</h1>
        <p class="info">Much gratitude to the Finn Family for securing a sponsorship with Philips 66. The Phillips 66 Company is an American multinational energy company headquartered in Westchase, Houston, Texas. It debuted as an independent energy company when ConocoPhillips executed a spin-off of its downstream and midstream assets.</p>
        <br>
        <a href="https://www.rockwellautomation.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/ROKAutomation" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/rockwell-automation" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/ROKAutomation/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span></h3>
  <h3 class = "sponsor">DuPont Family
    <span class="popuptext" id="dupont">
      <div class="card">
        <!-- <img src=<?php echo $dir . "/images/rockwell.png" ?> alt="Dupont Family"  height="150px"style="width:100%"> -->
        <h1 class = "name">DuPont Family</h1>
        <p class="info">Much thanks to the DuPont family! Phillip DuPont has been an integrated member for the past three years and is currently the Vice President of the club. The DuPonts decided to donate becuase of the immense impact that robotics has had on Phillip's life.</p>
        </p>
        <br>
        <a href="https://www.instagram.com/phillipdupont/" target="_blank"><i class="fa fa-instagram"></i></a>
        <!-- <a href="https://twitter.com/ROKAutomation" target="_blank"><i class="fa fa-twitter"></i></a> -->
        <!-- <a href="https://www.linkedin.com/company/rockwell-automation" target="_blank"><i class="fa fa-linkedin"></i></a> -->
        <!-- <a href="https://www.facebook.com/ROKAutomation/" target="_blank"><i class="fa fa-facebook"></i></a> -->
      </div>
    </span></h3>
  <h3 class = "sponsor ">The Hydrographic Society of America- HC
    <span class="popuptext" id="hydro">
      <div class="card">
        <img src=<?php echo $dir . "/images/hydro.jpg" ?> alt="Hydro Logo"  height="200px" style="width:100%;border-radius: 15%;">
        <h1 class = "name">The Hydrographic Society of America</h1>
        <p class="info">The mission of The Hydrographic Society of America (THSOA) is to promote education in hydrography. THSOA-HC serves as the focal point for several volunteer activities in the Houston Area.</p>
        <br>
        <a href="https://houston.thsoa.org/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/hashtag/thsoa" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/the-hydrographic-society-of-america" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/thsoahc/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
     </span></h3>
  <h3 class = "sponsor">Best in Class Education Center
    <span class="popuptext" id="best">
      <div class="card">
        <img src=<?php echo $dir . "/images/best.png" ?> alt="Best Logo"  height="150px" style="width:100%;border-radius: 15%;">
        <h1 class = "name">Best in Class Education Center</h1>
        <p class="info">Best In Class help students develop the skills and knowledge they need for a bright future. Students benefit from individual attention, active instruction in small groups, and engaging course material aligned with common standards.</p>
        <br>
        <a href="https://www.bestinclasseducation.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://www.linkedin.com/company/best-in-class-education" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/BestInClassEducationCenter/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span></h3>
  <h3 class = "sponsor ">  Espinosa Family & ExxonMobil Matching
    <span class="popuptext" id="espinosa">
      <div class="card">
        <img src=<?php echo $dir . "/images/espinosa.png" ?> alt="Exxon Logo"  height="150px" style="width:100%;border-radius: 15%;">
        <h1 class = "name">Espinosa Family & ExxonMobile</h1>
        <p class="info">Much gratitude to the Espinosa Family for securing a sponsorship with ExxonMobile. Exxon Mobil Corporation is an American multinational oil and gas corporation headquartered in Irving, Texas.</p>
        <br>
        <a href="https://corporate.exxonmobil.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/exxonmobil" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/exxonmobil" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/ExxonMobil/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
     </span></h3>
  <h3 class = "sponsor"> Marco's Pizza
    <span class="popuptext" id="marco">
      <div class="card">
        <img src=<?php echo $dir . "/images/marco.png" ?> alt="Marco Logo"  height="150px" style="width:100%;border-radius: 15%;">
        <h1 class = "name">Marco's Pizza</h1>
        <p class="info">Marco’s Pizza, operated by Marco's Franchising, LLC, is a restaurant chain and interstate franchise based in Toledo, Ohio, that specializes in Italian-American cuisine. The first store is in Oregon, Ohio, at Starr Avenue and Wheeling Street.</p>
        <br>
        <a href="https://www.marcos.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/MarcoPizza" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/marco%27s-pizza" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/MarcosPizza/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span></h3>
  <h3 class = "sponsor ">Forrest Orthodontics
    <span class="popuptext" id="forrest">
      <div class="card">
        <img src=<?php echo $dir . "/images/forrest.jpg" ?> alt="Forrest Logo"  height="150px"style="width:100%">
        <h1 class = "name">Forrest Orthodontics</h1>
        <p class="info">At Forrest, you can look forward to a relaxed environment, a personable staff, and a care plan that suits your individual needs. Drs. Kim Forrest, Sam Winkelmann, Aaron Laird, and their team of experienced professionals dedicate themselves to excellence in orthodontic care for all patients. Forrest looks forward to working with you to help you achieve a healthy, beautiful smile.</p>
        <br>
        <a href="https://www.forrestortho.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/forrest_ortho" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.facebook.com/ForrestOrtho/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span></h3>
</div>

<br><br>

<h2 class="title"><u><strong>2017 Season Sponsors:</strong></u></h2>
<div class = "sponsor_list">
  <h3 class = "sponsor first">Katy Economic Development Council
    <span class="popuptext" id="economic">
      <div class="card">
        <img src=<?php echo $dir . "/images/economic.jpg" ?> alt="Katy Economic Development Council Logo"  height="250px"style="width:100%">
        <h1 class = "name">Katy Economic Development Council</h1>
        <p class="info">Founded in 2003, the Katy Area Economic Development Council’s (Katy Area EDC) mission is to lead the economic development efforts of the Katy area to recruit, retain and expand new high quality, high impact companies, jobs and talent to improve the quality of life and place of Katy area residents. Since its inception, the Katy Area EDC has grown to over 200 members, has a budget of $800,000 and has assisted in the creation of jobs and more than $2.5 billion in capital investment. Katy Area EDC is a full-service private, non-profit, 501 (c) 6 economic development corporation.</p>
        <br>
        <a href="https://www.katyedc.org/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/KatyEDC" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/katy-area-economic-development-council" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/katyedc/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span>
  </h3>
  <h3 class = "sponsor ">Manimala Family/Chevron Matching Fund
    <span class="popuptext" id="chev">
      <div class="card">
        <img src=<?php echo $dir . "/images/chev.jpg" ?> alt="Chevron Logo"  height="250px"style="width:100%">
        <h1 class = "name">Manimala Family/Chevron</h1>
        <p class="info">Much thanks to the Manimala Family for securing a sponsorship with Chevron. Corporation is an American multinational energy corporation. One of the successor companies of Standard Oil, it is headquartered in San Ramon, California, and active in more than 180 countries.</p>
        <br>
        <a href="https://www.chevron.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/Chevron" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/chevron" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/Chevron/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span>
  </h3>
  <h3 class = "sponsor">Texas Workforce Commission
    <span class="popuptext" id="workforce1">
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
    </span>
  </h3>
  <h3 class = "sponsor ">Upstream LLC
    <span class="popuptext" id="upstream">
      <div class="card">
        <img src=<?php echo $dir . "/images/upstream.png" ?> alt="Upstream Logo"  height="250px"style="width:100%">
        <h1 class = "name">Upstream LLC</h1>
        <p class="info">Upstream International can make your next project a success. It is comprised of seasoned oilfield veterans who have spent their careers making things happen.  With one call, they can apply their operational know-how to providing your company with the right people for the job.  And their hassle-free process will make you Upstream's newest source of referrals.</p>
        <br>
        <a href="https://www.http://upstintl.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <!-- <a href="https://twitter.com/TXWorkforce" target="_blank"><i class="fa fa-twitter"></i></a> -->
        <a href="https://www.linkedin.com/company/working-upstream-llc" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/pages/Upstream-International-LLC/100987019942504" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span>
  </h3>
  <h3 class = "sponsor">Corman Family & ConocoPhillips
    <span class="popuptext" id="conoco">
      <div class="card">
        <img src=<?php echo $dir . "/images/conoco.png" ?> alt="ConocoPhillips Logo"  height="150"style="width:100%">
        <h1 class = "name">ConocoPhillips</h1>
        <p class="info">ConocoPhillips is committed to the efficient and effective exploration and production of oil and natural gas. Producing oil and natural gas and getting them to market takes ingenuity, technology and investment.​</p>
        <br>
        <a href="https://www.conocophillips.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/conocophillips" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/conocophillips" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/conocophillips/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span>
  </h3>
  <h3 class = "sponsor ">Perez Family
    <span class="popuptext" id="Perez">
      <div class="card">
        <img src=<?php echo $dir . "/images/perez.jpg" ?> alt="Perez Picture"  height="250px" style="width:100%;border-radius: 15%;">
        <h1 class = "name">Perez Family</h1>
        <p class="info">Tompkins Robotics thanks the Perez Family, and Caitlyn Perez, now a freshman attending A&M University, but formerly the Marketing Student Head, for sponsoring Tompkins Robotics for the 2017 school year. Our robot could not have built without this generous local donation</p>
        <br>
        <!-- <a href="https://twitter.com/TXWorkforce" target="_blank"><i class="fa fa-twitter"></i></a> -->
        <!-- <a href="https://www.twc.state.tx.us/" target="_blank"><i class="fa fa-dribbble"></i></a> -->
        <!-- <a href="https://www.linkedin.com/company/texas-workforce-commission" target="_blank"><i class="fa fa-linkedin"></i></a> -->
        <!-- <a href="https://www.facebook.com/texasworkforcecommission/" target="_blank"><i class="fa fa-facebook"></i></a> -->
      </div>
    </span>
  </h3>
  <h3 class = "sponsor">Lowe's
    <span class="popuptext" id="lowe">
      <div class="card">
        <img src=<?php echo $dir . "/images/lowe.png" ?> alt="Lowe's Logo"  height="250px"style="width:100%">
        <h1 class = "name">Lowe's</h1>
        <p class="info">Lowe's Companies, Inc. is a Fortune 500 American company that operates a chain of retail home improvement and appliance stores in the United States, Canada, and Mexico.</p>
        <br>
        <a href="https://www.lowes.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/Lowes" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/lowe%27s-home-improvement" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/lowes/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span></h3>
</div>

<br><br>

<h2 class="title"><u><strong>2016 Season Sponsors:</strong></u></h2>
<div class = "sponsor_list">
  <h3 class = "sponsor  first">2015 FRC Rookie Grant
    <span class="popuptext" id="frc">
      <div class="card">
        <img src=<?php echo $dir . "/images/frc.png" ?> alt="FRC Logo"  height="150"style="width:100%">
        <h1 class = "name">FIRST Robotics</h1>
        <p class="info">FIRST Robotics Competition is an international high school robotics competition. Each year, teams of high school students, coaches, and mentors work during a six-week period to build game-playing robots. ​</p>
        <br>
        <a href="https://www.firstinspires.org/robotics/frc" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/FRCTeams" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/frc" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/FIRSTRoboticsCompetition/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span>
  </h3>
  <h3 class = "sponsor">Lennon Family</h3>
  <h3 class = "sponsor ">Manimala Family/Chevron Matching Funds
    <span class="popuptext" id="chev">
      <div class="card">
        <img src=<?php echo $dir . "/images/chev.jpg" ?> alt="Chevron Logo"  height="200px"style="width:100%">
        <h1 class = "name">Manimala Family/Chevron</h1>
        <p class="info">Much thanks to the Manimala Family for securing a sponsorship with Chevron. Corporation is an American multinational energy corporation. One of the successor companies of Standard Oil, it is headquartered in San Ramon, California, and active in more than 180 countries.</p>
        <br>
        <a href="https://www.chevron.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/Chevron" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/chevron" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/Chevron/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span>
  </h3>
  <h3 class = "sponsor">Oceaneering
    <span class="popuptext" id="ocean">
      <div class="card">
        <img src=<?php echo $dir . "/images/ocean.png" ?> alt="Ocean Logo"  height="150px"style="width:100%">
        <h1 class = "name">Oceaneering</h1>
        <p class="info">Oceaneering International, Inc. is a subsea engineering and applied technology company based in Houston, Texas, U.S. that provides engineered services and hardware to customers who operate in marine, space, and other environments. </p>
        <br>
        <a href="https://www.oceaneering.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/Oceaneering" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/oceaneering" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/oceaneering/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span>
  </h3>
  <h3 class = "sponsor ">Corman Family & ConocoPhillips
    <span class="popuptext" id="conoco">
      <div class="card">
        <img src=<?php echo $dir . "/images/conoco.png" ?> alt="ConocoPhillips Logo"  height="150"style="width:100%">
        <h1 class = "name">ConocoPhillips</h1>
        <p class="info">ConocoPhillips is committed to the efficient and effective exploration and production of oil and natural gas. Producing oil and natural gas and getting them to market takes ingenuity, technology and investment.​</p>
        <br>
        <a href="https://www.conocophillips.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/conocophillips" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/conocophillips" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/conocophillips/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span>
  </h3>
  <h3 class = "sponsor">Texas Workforce Commision
    <span class="popuptext" id="workforce3">
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
    </span>
  </h3>
  <h3 class = "sponsor ">Society for Information Management
    <span class="popuptext" id="socim">
      <div class="card">
        <img src=<?php echo $dir . "/images/socim.jpg" ?> alt="Society for Information Management Logo"  height="150"style="width:100%">
        <h1 class = "name">Society for Information Logo</h1>
        <p class="info">Society for Information Management is a professional organization of nearly 5,000 senior information technology executives, Chief Information Officers, prominent academicians, selected consultants, and others. ​</p>
        <br>
        <a href="https://www.simnet.org/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/SIMInt" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/society-for-information-management" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/society-for-information-management/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span>
  </h3>
</div>

<br><br>

<h2 class="title"><u><strong>2015 Season Sponsors:</strong></u></h2>
<div class = "sponsor_list">
  <h3 class = "sponsor  first">Oceaneering
    <span class="popuptext" id="ocean">
      <div class="card">
        <img src=<?php echo $dir . "/images/ocean.png" ?> alt="Ocean Logo"  height="150px"style="width:100%">
        <h1 class = "name">Oceaneering</h1>
        <p class="info">Oceaneering International, Inc. is a subsea engineering and applied technology company based in Houston, Texas, U.S. that provides engineered services and hardware to customers who operate in marine, space, and other environments. </p>
        <br>
        <a href="https://www.oceaneering.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/Oceaneering" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/oceaneering" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/oceaneering/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span>
  </h3>
  <h3 class = "sponsor">ConocoPhillips
    <span class="popuptext" id="conoco">
      <div class="card">
        <img src=<?php echo $dir . "/images/conoco.png" ?> alt="ConocoPhillips Logo"  height="150"style="width:100%">
        <h1 class = "name">ConocoPhillips</h1>
        <p class="info">ConocoPhillips is committed to the efficient and effective exploration and production of oil and natural gas. Producing oil and natural gas and getting them to market takes ingenuity, technology and investment.​</p>
        <br>
        <a href="https://www.conocophillips.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/conocophillips" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/conocophillips" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/conocophillips/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span>
  </h3>
  <h3 class = "sponsor ">2015 FRC Rookie Grant
    <span class="popuptext" id="frc">
      <div class="card">
        <img src=<?php echo $dir . "/images/frc.png" ?> alt="FRC Logo"  height="150"style="width:100%">
        <h1 class = "name">FIRST Robotics</h1>
        <p class="info">FIRST Robotics Competition is an international high school robotics competition. Each year, teams of high school students, coaches, and mentors work during a six-week period to build game-playing robots. ​</p>
        <br>
        <a href="https://www.firstinspires.org/robotics/frc" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/FRCTeams" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/frc" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/FIRSTRoboticsCompetition/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span>
  </h3>
  <h3 class = "sponsor">Texas Workforce Commision
    <span class="popuptext" id="workforce2">
      <div class="card">
        <img src=<?php echo $dir . "/images/workforce.jpg" ?> alt="Texas Workforce Logo"  height="150px"style="width:100%">
        <h1 class = "name">Texas Workforce Commision</h1>
        <p class="info">The Texas Workforce Commission is a governmental agency in the U.S. state of Texas that provides unemployment benefits and services related to employment to eligible individuals and businesses.</p>
        <br>
        <a href="https://www.twc.state.tx.us/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <a href="https://twitter.com/TXWorkforce" target="_blank"><i class="fa fa-twitter"></i></a>
        <a href="https://www.linkedin.com/company/texas-workforce-commission" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/texasworkforcecommission/" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span>
  </h3>
  <h3 class = "sponsor ">CSE W-Industries, Inc.
    <span class="popuptext" id="cse">
      <div class="card">
        <img src=<?php echo $dir . "/images/cse.jpg" ?> alt="CSE Logo"  height="150px"style="width:100%">
        <h1 class = "name">CSE W-Industries, Inc.</h1>
        <p class="info">CSE is a wholly-owned subsidiary of CSE Global Limited (CSES.SI) a global technologies company with an international presence spanning the Americas, Asia Pacific, Europe, Africa, and the Middle East</p>
        <br>
        <a href="http://www.w-industries.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <!-- <a href="" target="_blank"><i class="fa fa-twitter"></i></a> -->
        <a href="https://www.linkedin.com/company/w-industries" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/pages/CSE-W-Industries/147714958772009" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span>
  </h3>
  <h3 class = "sponsor">Upstream Engineering, LLC
    <span class="popuptext" id="upstream1">
      <div class="card">
        <img src=<?php echo $dir . "/images/upstream.png" ?> alt="Upstream Logo"  height="150px"style="width:100%">
        <h1 class = "name">Upstream LLC</h1>
        <p class="info">Upstream International can make your next project a success. Their company is comprised of seasoned oilfield veterans who have spent their careers making things happen. </p>
        <br>
        <a href="https://www.http://upstintl.com/" target="_blank"><i class="fa fa-dribbble"></i></a>
        <!-- <a href="https://twitter.com/TXWorkforce" target="_blank"><i class="fa fa-twitter"></i></a> -->
        <a href="https://www.linkedin.com/company/working-upstream-llc" target="_blank"><i class="fa fa-linkedin"></i></a>
        <a href="https://www.facebook.com/pages/Upstream-International-LLC/100987019942504" target="_blank"><i class="fa fa-facebook"></i></a>
      </div>
    </span>
  </h3>
</div>
<hr>
<br>
<p><center><i>**Tompkins Robotics thanks all their sponsors throughout the years for helping students build a functioning robot and expose them to professional engineering practices. All information about the sponsors was either paraphrased from the sponsor's wikipedia page or accured from the sponsor's website's "about" page**</i></center><p>



  <div id = "background"><img class = "stretch" src=<?php echo $dir . "/images/sponsorsBackground.jpg"?> alt="image"></div>
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
<?php$dir = ".."; include($dir . "/footer.php"); ?>
