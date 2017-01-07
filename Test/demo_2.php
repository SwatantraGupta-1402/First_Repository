<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<CENTER>
  <FORM>
     <input type="button" VALUE="click me!" onClick="goNewWin()">
  </FORM>
</CENTER>
</body>
<script type="text/javascript">
	// Set height and width
function goNewWin() {

// Set height and width
var NewWinHeight=400;
var NewWinWidth=400;

// Place the window
var NewWinPutX=100;
var NewWinPutY=100;

//Get what is below onto one line

TheNewWin =window.open("demo.php",'TheNewpop',
'fullscreen=yes,toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=no'); 

//Get what is above onto one line

TheNewWin.resizeTo(NewWinHeight,NewWinWidth);
TheNewWin.moveTo(NewWinPutX,NewWinPutY);
}
</script>
</html>