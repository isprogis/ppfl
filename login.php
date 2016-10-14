<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Login | Conferência Missionária 2016</title>
<link rel="icon" type="image/gif" href="img/ico.gif">
<link href="css/cssinscri.css" rel="stylesheet" type="text/css"></head>
	<script src="http://www.google.com/jsapi" type="text/javascript"></script>
    <script type="text/javascript">
        google.load("jquery", "1.3.2");
    </script>
	<script type="text/javascript" src="scripts/jQuery.dPassword.js"></script>
    <script type="text/javascript" src="scripts/iPhonePassword.js"></script>

<body>
<?php

// define variables and set to empty values
$userErr = $passErr = "";

$user 		= "";
$pass 		= "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
	$user     	= $_POST["user"];
	$pass     	= $_POST["pass"];

	if (empty($_POST["user"])) {
     	$userErr = "Usuário necessário";
   	} elseif ("confmiss2016"!=($_POST["user"])) {
     	$userErr = "Usuário inválido";
   	} else {
     	$user = test_input($_POST["user"]);		
	}
	
	if (empty($_POST["pass"])) {
     	$passErr = "Senha necessária";
   	} elseif ("@JesusReina2016"!=($_POST["pass"])) {
     	$passErr = "Senha inválida";
   	} else {
     	$pass = test_input($_POST["pass"]);
			
   	}
   	if ($userErr == '' && $passErr == '') {
   
		include("lista.php");
		
    } else {
		corpomain();
	} 
} else {
	corpomain();
}

?>
</body>
</html>

<?php
function test_input($data) {
   $data = trim($data);
   $data = stripslashes($data);
   $data = htmlspecialchars($data);
   return $data;
   
}


function corpomain() {
	global $user;
	global $pass;
	global $userErr;	
	global $passErr;

	?>
    
    
<div class="suporte" style="margin-top:150px">
<div align="center" class="logo">
    		<img src="img/logoanima.gif" width="200px" id="logoimg"></div>
<h2>Login | Conferência Missionária 2016</h2>

<form name="formlogin" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post"><br />
 <fieldset class="grupo">
            <div class="campo">
                <label for="nome">Login</label> 
				<input type="text" style="width: 10em" name="user">
                                <span class="error"><?php echo $userErr;?></span>

</div>
            <div class="campo">
            
                <label for="nome">Senha</label> 
				<input type="password" id="pass" style="width: 15em" name="pass">
                                                <span class="error"><?php echo $passErr;?></span>

			</div>
</fieldset>

<input class="botao" type="submit" value="Login" name="submit">
</form>
<?php
}

