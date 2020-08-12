<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<title>Shrexy Server</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}
</style>
<body>

<!-- Navbar -->
<div class="w3-top">
  <div class="w3-bar w3-black w3-card">
    <a class="w3-bar-item w3-button w3-padding-large w3-hide-medium w3-hide-large w3-right" href="javascript:void(0)" onclick="myFunction()" title="Toggle Navigation Menu"><i class="fa fa-bars"></i></a>
    <a href="http://shrexy.tk" class="w3-bar-item w3-button w3-padding-large">HOME</a>
    <a href="http://map.shrexy.tk:2052" class="w3-bar-item w3-button w3-padding-large w3-hide-small">MAP</a>
    <a href="http://shrexy.tk/stats" class="w3-bar-item w3-button w3-padding-large w3-hide-small">STATS</a>
    <a href="http://shrexy.tk/admin" class="w3-bar-item w3-button w3-padding-large w3-hide-small">ADMIN</a>
    <div class="w3-dropdown-hover w3-hide-small">
      <button class="w3-padding-large w3-button" title="More">CONTACT <i class="fa fa-caret-down"></i></button>     
      <div class="w3-dropdown-content w3-bar-block w3-card-4">
        <a href="https://discord.gg/X2avkyM" class="w3-bar-item w3-button">Discord</a>
        <a href="#" class="w3-bar-item w3-button">Extras</a>
        <a href="#" class="w3-bar-item w3-button">Media</a>
      </div>
    </div>
  </div>
</div>

<!-- Navbar on small screens (remove the onclick attribute if you want the navbar to always show on top of the content when clicking on the links) -->
<div id="navDemo" class="w3-bar-block w3-black w3-hide w3-hide-large w3-hide-medium w3-top" style="margin-top:46px">
  <a href="http://map.shrexy.tk:2052" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">MAP</a>
  <a href="http://shrexy.tk/stats" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">STATS</a>
  <a href="http://hrexy.tk/admin" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">ADMIN</a>
  <a href="https://discord.gg/X2avkyM" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">DISCORD</a>
</div>

<!-- Page content -->
<div id="spacer">
  
  <h2>=</h2>

</div>
<div>
  
    <fieldset>
        <legend>User Stats</legend>
        <p>
          <form action="/admin/playerinfo/index.php" method="post" target="_self">
          playerid: <input type="text" name="playerid"><br>
        </p>
        <p>
            <input type="submit" value="Submit">
        </p>
     </fieldset>
     <fieldset>
       <a href="http://shrexy.tk:8804" target="_blank"><h3>See More</h3></a>


     </fieldset>
</form>

</div>




<script>
// Automatic Slideshow - change image every 4 seconds
var myIndex = 0;
carousel();

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";  
  }
  myIndex++;
  if (myIndex > x.length) {myIndex = 1}    
  x[myIndex-1].style.display = "block";  
  setTimeout(carousel, 4000);    
}

// Used to toggle the menu on small screens when clicking on the menu button
function myFunction() {
  var x = document.getElementById("navDemo");
  if (x.className.indexOf("w3-show") == -1) {
    x.className += " w3-show";
  } else { 
    x.className = x.className.replace(" w3-show", "");
  }
}

// When the user clicks anywhere outside of the modal, close it
var modal = document.getElementById('ticketModal');
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "none";
  }
}
</script>

</body>
</html>