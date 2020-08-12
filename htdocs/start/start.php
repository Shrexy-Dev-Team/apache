<!DOCTYPE html>
<html>
<head>
	<title>Shrexy Server</title>
</head>
<body>


<?php
	if(isset($_GET["pass"])){
		$pass = $_GET["pass"];

		if ($pass == "ctdbgsy1u0"){
			// $str = exec('start /B C:\Users\Alec\AppData\Roaming\.minecraft\servers\1.16.1Paper\paper-134.jar');  // <== put the path to batch file here
			exec('c:\WINDOWS\system32\cmd.exe /c START start.bat');
			// exec('start /B C:\Users\Alec\AppData\Roaming\.minecraft\servers\1.16.1Paper\serverstart.bat')
			 echo "Correct";
		}
	}
?>

</body>
</html>