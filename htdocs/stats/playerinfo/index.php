<!DOCTYPE html>
<html lang="en">
<title>Shrexy Server</title>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="http://shrexy.tk/admin/playerinfo/styles.css">
<?php error_reporting(0); ?>
<style>
body {font-family: "Lato", sans-serif}
.mySlides {display: none}


/* Style the tab */
.tab {
  overflow: hidden;
  border: 1px solid #ccc;
  background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
.tab button {
  background-color: inherit;
  float: left;
  border: none;
  outline: none;
  cursor: pointer;
  padding: 14px 16px;
  transition: 0.3s;
  font-size: 17px;
}

/* Change background color of buttons on hover */
.tab button:hover {
  background-color: #ddd;
}

/* Create an active/current tablink class */
.tab button.active {
  background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
  display: none;
  padding: 6px 12px;
  border: 1px solid #ccc;
  border-top: none;
}
</style>
</head>
<body>

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
<div id="playerinfo">

  <h2>=</h2>

  <?php


      $playerid = $_POST["playerid"];
      $url = 'http://localhost:8804/v1/player?player=' . $playerid;


?>
<?php if (file_get_contents($url)!=false) {

 echo '<h2>Player stats for ',$playerid, ':</h2>';
}
else{
  echo '<h2>Player: ' , $playerid, ' not found. :(</h2>';
}
?>

     <!-- Tab links -->
<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'playerInfo')">Player Info</button>
  <button class="tablinks" onclick="openCity(event, 'activity')">Activity</button>
  <button class="tablinks" onclick="openCity(event, 'stats')">Stats</button>
  <button class="tablinks" onclick="openCity(event, 'connection')">Connection</button>
  <button class="tablinks" onclick="openCity(event, 'permissions')">Permissions</button>
</div>

<!-- Tab content -->
<div id="playerInfo" class="tabcontent">
  <h2>Player info:</h2>
  <p>
    <?php

      if (file_get_contents($url)!=false) {
        # code...
      $file = file_get_contents($url);
      $database = json_decode($file);

      echo "<h3>Player name:    ", $database->nicknames[0]->nickname, "</h3>";
            
      $player_uuid = $database->sessions[0]->player_uuid;
      $playermodel = "https://crafatar.com/renders/body/" . $player_uuid;
      #echo '<img src="',$playermodel,'">';
      #$playermodel = "https://minotar.net/body/" . $player_uuid;
      #echo '<img src="',$playermodel,'/100">';
      $playeravatar = "https://minotar.net/avatar/" . $player_uuid;
      echo '<img src="',$playeravatar,'" posistion:absolute; left:100px; top:200px style="float:right">';
    }
    else{
      echo "Error getting info, player not found";
    }

    ?>
  </p>
</div>

<div id="activity" class="tabcontent">
  <h2>Activity:</h2>
  <p>
    <?php
if (file_get_contents($url)!=false) {
    echo "<h3>Total Playtime:    ", $database->info->playtime, "</h3>";
    echo "<h3>Playtime (last 30d):    ", $database->online_activity->playtime_30d, "</h3>";
    echo "<h3>Playtime (last 7d):    ", $database->online_activity->playtime_7d, "</h3>";
    echo "<h3>Last seen:    ", $database->info->last_seen, "</h3>";
    echo "<h3>First Connection:    ", $database->info->registered, "</h3>";
    echo "<h3>Activity Index:    ", $database->info->activity_index_group, "</h3>";
    echo "<h3>Session Count:    ", $database->info->session_count, "</h3>";
    echo "<h3>Avg. Session Length (30d):    ", $database->online_activity->average_session_length_30d, "</h3>";
}
    else{
      echo "Error getting info, player not found";
    }
    ?>
  </p>
</div>

<div id="stats" class="tabcontent">
  <h1>Stats:</h1>
  <p>
    
    <?php
if (file_get_contents($url)!=false) {
    echo "<h1>Kills/Deaths:</h1>";
    echo "<h2>PvP</h2>";
    echo "<h3>Total Kills:    ", $database->kill_data->player_kills_total, "</h3>";
    echo "<h3>Kills (last 30d):    ", $database->kill_data->player_kills_30d, "</h3>";
    echo "<h3>Kills (last 7d):    ", $database->kill_data->player_kills_7d, "</h3>";
    echo "<h3>K/D:    ", $database->kill_data->player_kdr_total, "</h3>";
    echo "<h3>Total Deaths:    ", $database->kill_data->player_deaths_total, "</h3>";
    echo "<h3>Deaths (last 30d):    ", $database->kill_data->player_deaths_30d, "</h3>";
    echo "<h3>Deaths (last 7dd):    ", $database->kill_data->player_deaths_7d, "</h3>";
    echo "<h2>Mobs</h2>";
    echo "<h3>Total Kills:    ", $database->kill_data->mob_kills_total, "</h3>";
    echo "<h3>Kills (last 30d):    ", $database->kill_data->mob_kills_total, "</h3>";
    echo "<h3>Total (last 7d):    ", $database->kill_data->mob_kills_total, "</h3>";
    echo "<h3>Total Deaths:    ", $database->kill_data->mob_kills_total, "</h3>";
    echo "<h3>Deaths (last 30d):    ", $database->kill_data->mob_kills_30d, "</h3>";
    echo "<h3>Deaths (last 7dd):    ", $database->kill_data->mob_kills_7d, "</h3>";
}
    else{
      echo "Error getting info, player not found";
    }
    ?>
  </p>
</div> 





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

function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
   
</body>
</html> 
