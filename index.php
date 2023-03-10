<!DOCTYPE html>
<html>
<head>
<title>W3.CSS Template</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>

body,h1,h2,h3,h4,h5,h6 {font-family: "Raleway", Arial, Helvetica, sans-serif}
.myLink {display: none}
</style>
</head>
<body class="w3-light-grey">

<!-- Navigation Bar -->
<div class="w3-bar w3-white w3-border-bottom w3-xlarge">
  <a href="#" class="w3-bar-item w3-button w3-text-red w3-hover-red"><b><i href=""></i>ParcelPortal</b></a>
  <a href="#" class="w3-bar-item w3-button w3-right w3-hover-red w3-text-grbley"><i class="fa fa-search"></i></a>
</div>

<!-- Header -->
<header class="w3-display-container w3-content w3-hide-small" style="max-width:1500px">
    <img class="w3-image" src="/BG_w.jpg" alt="Background" width="1500" height="700">
  <div class="w3-display-middle" style="width:65%">
    <div class="w3-bar w3-black">
      <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'investor');"><i class="fa fa-map-marker w3-margin-right"></i>Invest</button>
      <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'owner');"><i class="fa fa-bed w3-margin-right"></i>Evaluate your House</button>
      <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'buyer');"><i class="fa fa-car w3-margin-right"></i>Buy your first House</button>
      <button class="w3-bar-item w3-button tablink" onclick="openLink(event, 'city');"><i class="fa fa-car w3-margin-right"></i>City Staff</button>
    </div>

    <!-- Tabs -->
    <div id="investor" class="w3-container w3-white w3-padding-16 myLink">
      <h3>Invest with us</h3>
          <label>County (Optional)</label>
          <input class="w3-input w3-border" type="text" placeholder="King, Pierce, etc">
        <p><a class="w3-button w3-dark-grey"  href="investor.php">Search investment opportunities</a></p>
      </div>


    <div id="buyer" class="w3-container w3-white w3-padding-16 myLink">
      <h3>Find the best houses in a city!</h3>
      <p><button class="w3-button w3-dark-grey">Search Houses</button></p>
    </div>

    <div id="owner" class="w3-container w3-white w3-padding-16 myLink">
      <h3>Find information about your house!</h3>
      <input class="w3-input w3-border" type="text" placeholder="The number of your house (optional)">
        <p><a class="w3-button w3-dark-grey"  href="investor.php">Proceed to the database</a></p>
      </div>

     <div id="city" class="w3-container w3-white w3-padding-16 myLink">
      <h3>Find the information about your city!</h3>
        <p><a class="w3-button w3-dark-grey"  href="investor.php">Update the information about your city</a></p>
      </div>
    </div>
</header>

<!-- Page content -->
<div class="w3-content" style="max-width:1100px;">

  <!-- Good offers -->
  <div class="w3-container w3-margin-top">
    <h3>Good Offers Right Now</h3>
    <h6><strong>Best</strong> Houses in Washington.</h6>
  </div>
  <div class="w3-row-padding w3-text-white w3-large">
    <div class="w3-half w3-margin-bottom">
      <div class="w3-display-container">
        <img src="/k1.jpg" alt="Cinque Terre" style="width:100%">
        <span class="w3-display-bottomleft w3-padding">King County</span>
      </div>
    </div>
    <div class="w3-half">
      <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-half w3-margin-bottom">
          <div class="w3-display-container">
            <img src="/land_p.jpg" alt="New York" style="width:100%">
            <span class="w3-display-bottomleft w3-padding">Pierce County</span>
          </div>
        </div>
        <div class="w3-half w3-margin-bottom">
          <div class="w3-display-container">
            <img src="/p2.jpg" alt="San Francisco" style="width:100%">
            <span class="w3-display-bottomleft w3-padding">Pierce County</span>
          </div>
        </div>
      </div>
      <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-half w3-margin-bottom">
          <div class="w3-display-container">
              <img src="/land_k.jpg" alt="Pisa" style="width:100%">
            <span class="w3-display-bottomleft w3-padding">King County</span>
          </div>
        </div>
        <div class="w3-half w3-margin-bottom">
          <div class="w3-display-container">
            <img src="/p3.jpg" alt="Paris" style="width:100%">
            <span class="w3-display-bottomleft w3-padding">Pierce County</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Explore Nature -->
  <div class="w3-container">
    <h3>Explore Washington Housing Market </h3>
    <p> Look at these amazing opportunities.</p>
  </div>
  <div class="w3-row-padding">
    <div class="w3-half w3-margin-bottom">
      <img src="/se1.jpg" alt="King County House" style="width:100%">
      <div class="w3-container w3-white">
        <h3>Seattle, King </h3>
        <p class="w3-opacity">Evaluated at 1.2 million dollars</p>
        <p>Beautiful house outside of Seattle.</p>
        <button class="w3-button w3-margin-bottom">Get Report</button>
      </div>
    </div>
    <div class="w3-half w3-margin-bottom">
      <img src="/tacoma_land.jpg" alt="Austria" style="width:100%">
      <div class="w3-container w3-white">
        <h3>Tacoma, Pierce</h3>
        <p class="w3-opacity">Evaluated at 250000 dollars</p>
        <p>Piece of land perfectly fitted for the first house for a young family in Tacoma metro.</p>
        <button class="w3-button w3-margin-bottom">Get Report</button>
      </div>
    </div>
  </div>

  <!-- Contact -->
  <div class="w3-container">
    <h2>Contact</h2>
    <p>Let us find your next home!</p>
    <i class="fa fa-map-marker" style="width:30px"></i> Seattle, WA<br>
    <i class="fa fa-phone" style="width:30px"></i> Phone: +00 151515<br>
    <i class="fa fa-envelope" style="width:30px"> </i> Email: mail@mail.com<br>
    <form action="/action_page.php" target="_blank">
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Name" required name="Name"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Email" required name="Email"></p>
      <p><input class="w3-input w3-padding-16 w3-border" type="text" placeholder="Message" required name="Message"></p>
      <p><button class="w3-button w3-black w3-padding-large" type="submit">SEND MESSAGE</button></p>
    </form>
  </div>
  
<!-- End page content -->
</div>

<!-- Footer -->
<footer class="w3-container w3-center w3-opacity w3-margin-bottom">
  <h5>Find Us On</h5>
  <div class="w3-xlarge w3-padding-16">
    <i class="fa fa-facebook-official w3-hover-opacity"></i>
    <i class="fa fa-instagram w3-hover-opacity"></i>
    <i class="fa fa-snapchat w3-hover-opacity"></i>
    <i class="fa fa-pinterest-p w3-hover-opacity"></i>
    <i class="fa fa-twitter w3-hover-opacity"></i>
    <i class="fa fa-linkedin w3-hover-opacity"></i>
  </div>
  <p>Powered by <a href="https://www.w3schools.com/w3css/default.asp" target="_blank" class="w3-hover-text-green">w3.css</a></p>
</footer>

<script>
// Tabs
function openLink(evt, linkName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("myLink");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(linkName).style.display = "block";
  evt.currentTarget.className += " w3-red";
}

// Click on the first tablink on load
document.getElementsByClassName("tablink")[0].click();
</script>

</body>
</html>
