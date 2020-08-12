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

<head>
  <?php

    file_put_contents("info.json", '');

    require_once('query.php');

    $server = new Query('localhost');
    //or new Query('some.minecraftserver.com', $port, $timeout);

    if ($server->connect())
    {
    $info = $server->get_info();
    $json_data = json_encode($info);
    file_put_contents("info.json", $json_data);
    }
    else{
    $json_data = "{\"status\":\"offline\"}";
    file_put_contents("info.json", $json_data);
    }

    ?>
</head>

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
  <a href="http:shrexy.tk/stats" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">STATS</a>
  <a href="http:shrexy.tk/admin" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">ADMIN</a>
  <a href="https://discord.gg/X2avkyM" class="w3-bar-item w3-button w3-padding-large" onclick="myFunction()">DISCORD</a>
</div>

<!-- Page content -->
<div id="spacer">
    <h2>=</h2>
</div>


<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'basicStats')">Server Stats</button>
  <button class="tablinks" onclick="openCity(event, 'playerSearch')">Player Search</button>
</div>

<div id="basicStats" class="tabcontent">
    <?php


        $hostname_prev = "Shrexy Server";
        $version_prev = "1.16.1";
        $players_prev = "0";
        $maxplayers_prev = "20";


        $file = file_get_contents('C:\xampp\htdocs\stats\info.json');

            

        if($file != '{"status":"offline"}'){
            
            $data_array = json_decode($file);

            #$hostname_prev = $data_array->hostname;
            #$version_prev = $data_array->version;
            #$players_prev = $data_array->numplayers;
            #$maxplayers_prev = $data_array->maxplayers;


            $hostname = $data_array->hostname;;
            $version = $data_array->version;
            $players = $data_array->numplayers;
            $maxplayers = $data_array->maxplayers;



            echo "<h1 font-size='14'>Name:  ", $hostname, "</h1>";
            echo "<h1 font-size='14'>Status:  online</h1>";
            echo "<h1 font-size='14'>IP:  shrexy.tk</h1>";
            echo "<h1 font-size='14'>Server Version:  ", $version, "</h1>";
            echo "<h1 font-size='14'>Players:  ", $players, "/", $maxplayers, "</h1>";
            $msg = "";
                foreach($data_array->players as $player){  
                    $msg .= $player;
                    $msg .= ", ";                      
                    }
                    $msg = substr($msg, 0,-2);;
                    if($msg == ""){
                        $msg = "No one is online";
                        
                    }
            echo "<h1 font-size='14'>Player List:  ", $msg, "</h1>";

        }
        else{
            echo "<h1 font-size='14'>Name:  ", $hostname_prev, "</h1>";
            echo "<h1 font-size='14'>Status:  offline</h1>";
            echo "<h1 font-size='14'>IP:  shrexy.tk</h1>";
            echo "<h1 font-size='14'>Server Version:  ", $version_prev, "</h1>";
            echo "<h1 font-size='14'>Players:  ", $players_prev, "/", $maxplayers_prev, "</h1>";
            echo "<h1 font-size='14'>Player list:  no players online</h1>";
        }

    ?>
</div>

<div id="playerSearch" class="tabcontent">
    <fieldset>
        <legend>User Stats</legend>
        <p>
          <form action="/stats/playerinfo/index.php" method="post" target="_self">
          playerid: <input type="text" name="playerid"><br>
        </p>
        <p>
            <input type="submit" value="Submit">
        </p>
     </fieldset>
     
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