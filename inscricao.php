	<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Inscrição | Conferência Missionária 2016</title>
<link rel="icon" type="image/gif" href="img/ico.gif">
<link href="css/cssinscri.css" rel="stylesheet" type="text/css">


<script type="text/javascript">
/* Máscaras ER */
function mascara(o,f){
v_obj=o
v_fun=f
setTimeout("execmascara()",1)
}
function execmascara(){
v_obj.value=v_fun(v_obj.value)
}
function mtel(v){
v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
return v;
}
function id( el ){
return document.getElementById( el );
}
window.onload = function(){
id('telfix').onkeypress = function(){
mascara( this, mtel );
};
id('telmov').onkeypress = function(){
mascara( this, mtel );
}
}
</script>
</head>

<body>

<?php

// define variables and set to empty values
$nameErr = $snameErr = $emailErr = $genderErr = $enderecoErr = $numeroErr = $bairroErr = $cepErr = $comoErr = $seiErr = $datadiaErr = $datamesErr = $dataanoErr = "";



$nome = "";
$snome = "";
$datadia = "";
$datames = "";
$dataano = "";
$ckmasc = "";
$ckfemi = "";
$representa = "";
$endereco = "";
$numero = "";
$complemento= "";
$bairro = "";
$cep = "";
$estado = "";
$cidade = "";
$email = "";
$telfix = "";
$telmov = "";
$face = "";
$insta = "";
$skype = "";
$twi = "";
$workum = "";
$workdois = "";
$ckpernoite = "";
$bdpernoite = -1;
$criancas = "";
$ckface = "";
$ckaviso = "";
$ckwhats = "";
$ckemail = "";
$ckoutro = "";
$outro = "";
$cksei = "";
$bdsei = -1;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
$nome = $_POST["nome"];
$snome = $_POST["snome"];
$datadia = $_POST["datadia"];
$datames = $_POST["datames"];
$dataano = $_POST["dataano"];
$representa = $_POST["representa"];
$endereco = $_POST["endereco"];
$numero = $_POST["numero"];
$complemento= $_POST["complemento"];
$bairro = $_POST["bairro"];
$cep = $_POST["cep"];
$estado = $_POST["estado"];
$cidade = $_POST["cidade"];
$email = $_POST["email"];
$telfix = $_POST["telfix"];
$telmov = $_POST["telmov"];
$face = $_POST["face"];
$insta = $_POST["insta"];
$skype = $_POST["skype"];
$twi = $_POST["twi"];
$workum = $_POST["workum"];
$workdois = $_POST["workdois"];
$outro = $_POST["outro"];

if (isset($_POST['pernoitar']) && $_POST['pernoitar'] == "on") {
$ckpernoite = "checked";
$bdpernoite = 1;
}
if (isset($_POST['sei']) && $_POST['sei'] == "on") {
$cksei = "checked";
$bdsei = 1;
}

if ("1"!=($bdsei)) {
$seiErr = "Você precisa concordar com os termos acima";
}
if (isset($_POST['sexo'])) {
if ($_POST['sexo']=="M") {
$ckmasc = " checked";
} elseif ($_POST['sexo']=="F") {
$ckfemi = " checked";
}
}

if (isset($_POST['como'])) {
if ($_POST['como']=="FB") {
$ckface = " checked";
} elseif ($_POST['como']=="AI") {
$ckaviso = " checked";
} elseif ($_POST['como']=="WA") {
$ckwhats = " checked";
} elseif ($_POST['como']=="EM") {
$ckemail = " checked";
} elseif ($_POST['como']=="OT") {
$ckoutro = " checked";
}
}

// Consistências
if (empty($_POST["nome"])) {
$nameErr = "Nome necessário";
} else {
$name = test_input($_POST["nome"]);

}

if (empty($_POST["snome"])) {
$snameErr = "Sobrenome necessário";
} else {
$sname = test_input($_POST["snome"]);

}

if (empty($_POST["endereco"])) {
$enderecoErr = "Endereço necessário";
} else {
$endereco = test_input($_POST["endereco"]);

}

if (empty($_POST["numero"])) {
$numeroErr = "Número necessário";
} else {
$numero = test_input($_POST["numero"]);
}


if (empty($_POST["bairro"])) {
$bairroErr = "Bairro necessário";
} else {
$bairro = test_input($_POST["bairro"]);
}

if (empty($_POST["cep"])) {
$cepErr = "CEP necessário";
} else {
$cep = test_input($_POST["cep"]);
}

if ("--"==($_POST["estado"])) {
$estadoErr = "Expecifique seu estado";
} else {
$estado = test_input($_POST["estado"]);
}


if ("--"==($_POST["datadia"])) {
$datadiaErr = "Dia inválido";
} else {
$datadia = test_input($_POST["datadia"]);
}

if ("--"==($_POST["datames"])) {
$datamesErr = "Mês inválido";
} else {
$datames = test_input($_POST["datames"]);
}

if ("--"==($_POST["dataano"])) {
$dataanoErr = "Ano inválidoo";
} else {
$dataano = test_input($_POST["dataano"]);
}


if (empty($_POST["cidade"])) {
$cidadeErr = "Expecifique sua cidade";
} else {
$cidade = test_input($_POST["cidade"]);
}

if (empty($_POST["telfix"])) {
$telfixErr = "Telefone necessário";
} else {
$telfix = test_input($_POST["telfix"]);
}


if (empty($_POST["como"])) {
$comoErr = "Selecione uma opção";
} else {
$como = test_input($_POST["como"]);
}

if ("OT"==($_POST["como"]) && ""==$_POST["outro"]) {
$comoErr = "Descreva como";
}
if ("OT"!=($_POST["como"])) {
empty($_POST["outro"] );
}

if (empty($_POST["email"])) {
$emailErr = "Email necessário";
} else {
$email = test_input($_POST["email"]);
// check if e-mail address is well-formed
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
$emailErr = "Email inválido";
}
}
if (empty($_POST["sexo"])) {
$genderErr = "Expecifique seu genero";
} else {
$gender = test_input($_POST["sexo"]);
}

if ($nameErr == '' && $emailErr == '' && $genderErr == '' && $datadiaErr == '' && $datamesErr == '' && $dataanoErr == '' && $enderecoErr == '' && $seiErr == '' && $numeroErr == '' && $bairroErr == '' && $cepErr == '' && $comoErr == '') {

include("config.php");

$sql = "INSERT INTO cadastroconf (`nome`, `snome`, `datadia`, `datames`, `dataano`, `sexo`, `representa`, `endereco`, `numero`, `complemento`, `bairro`, `cep`, `estado`, `cidade`, `email`, `telfix`, `telmov`
, `face`, `insta`, `skype`, `twi`, `workum`, `workdois`, `pernoitar`, `criancas`, `como`, `outro`, `sei`) ". " VALUES (
'" . $_POST["nome"] . "', '" . $_POST["snome"] . "', '" . $_POST["datadia"] . "', '" . $_POST["datames"] . "', '" . $_POST["dataano"] . "', '" . $_POST["sexo"] . "', '" . $_POST["representa"] . "', '" . $_POST["endereco"] . "', '" . $_POST["numero"] . "', '" . $_POST["complemento"] . "', '" . $_POST["bairro"] . "', '" . $_POST["cep"] . "', '" . $_POST["estado"] . "', '" . $_POST["cidade"] . "', '" . $_POST["email"] . "', '" . $_POST["telfix"] . "', '" . $_POST["telmov"] . "', '" . $_POST["face"] . "', '" . $_POST["insta"] . "', '" . $_POST["skype"] . "', '" . $_POST["twi"] . "', '" . $_POST["workum"] . "', '" . $_POST["workdois"] . "', '$bdpernoite', '" . $_POST["criancas"] . "', '" . $_POST["como"] . "', '" . $_POST["outro"] . "', '$bdsei')";

if ($conn->query($sql) === TRUE) {
echo "Cadastro bem sucedido !";
} else {
echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
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
global $nome;
global $snome;
global $datadia;
global $datames;
global $dataano;
global $ckmasc;
global $ckfemi;
global $representa;
global $endereco;
global $numero;
global $complemento;
global $bairro;
global $cep;
global $estado;
global $cidade;
global $email;
global $telfix;
global $telmov;
global $face;
global $insta;
global $skype;
global $twi;
global $workum;
global $workdois;
global $ckpernoite;
global $criancas;
global $ckface;
global $ckaviso;
global $ckwhats;
global $ckemail;
global $ckoutro;
global $outro;
global $cksei;
global $sei;
global $nameErr;
global $snameErr;
global $datadiaErr;
global $datamesErr;
global $dataanoErr;
global $genderErr;
global $enderecoErr;
global $numeroErr;
global $complementoErr;
global $bairroErr;
global $cepErr;
global $estadoErr;
global $cidadeErr;
global $emailErr;
global $telfixErr;
global $workErr;
global $comoErr;
global $seiErr;

$aruf = array("--" => "--",
"EXT" => "Moro no exterior",
"AC" => "AC",
"AL" => "AL",
"AM" => "AM",
"BA" => "BA",
"CE" => "CE",
"DF" => "DF",
"ES" => "ES",
"GO" => "GO",
"MA" => "MA",
"MT" => "MT",
"MS" => "MS",
"MG" => "MG",
"PA" => "PA",
"PB" => "PB",
"PR" => "PR",
"PE" => "PE",
"PI" => "PI",
"RJ" => "RJ",
"RN" => "RN",
"RS" => "RS",
"RO" => "RO",
"RR" => "RR",
"SC" => "SC",
"SP" => "SP",
"SE" => "SE",
"TO" => "TO");

$workum = array("SP" => "Sem Preferência",
"TRANS" => "Transcultural",
"MN" => "Missões e Negócios",
"MC" => "Mídia e Comunicação",
"AS" => "Ação Social",
"ED" => "Educaçao");

$workdois = array("SP" => "Sem Preferência",
"TRANS" => "Transcultural",
"MN" => "Missões e Negócios",
"MC" => "Mídia e Comunicação",
"AS" => "Ação Social",
"ED" => "Educaçao");


?>


<div class="suporte">
<div align="center" class="logo">
<img src="img/logoanima.gif" width="200px" id="logoimg"></div>
<h2>Ficha de inscrição | Conferência Missionária 2016</h2>
<form name="formcad" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<fieldset>
<fieldset class="grupo">
<div class="campo">
<label for="nome">Nome</label>
<input type="text" id="nome" name="nome" style="width: 10em" value="<?php echo $nome;?>" />
<span class="error"><?php echo $nameErr;?></span>

</div>
<div class="campo">
<label for="snome">Sobrenome</label>
<input type="text" id="snome" name="snome" style="width: 10em" value="<?php echo $snome;?>" />
<span class="error"><?php echo $snameErr;?></span>
</div>
</fieldset>
<fieldset class="grupo">
<div class="campo">
<label for="datanasci">Data de Nascimento:</label><br>
<div class="campo">

<label for="datanasci">Dia</label>

<select name="datadia" id="datadia">
<option >--</option>
<?php
for ($i = 1; $i <= 31; $i++) {
$sel = "";
if ($criancas == $i) {
$sel = " selected";
}
echo '<option value="' . $i . '" '. $sel . '>' . $i . '</option>';
}
?>
</select>
</div>
<div class="campo">

<label for="datanasci">Mês</label>
<select name="datames" id="datames">
<option >--</option>

<?php
for ($i = 1; $i <= 12; $i++) {
$sel = "";
if ($criancas == $i) {
$sel = " selected";
}
echo '<option value="' . $i . '" '. $sel . '>' . $i . '</option>';
}
?>
</select>
</div>
<div class="campo">

<label for="datanasci">Ano</label>
<select name="dataano" id="dataano">
<option >--</option>

<?php
for ($i = 1916; $i <= 2016; $i++) {
$sel = "";
if ($criancas == $i) {
$sel = " selected";
}
echo '<option value="' . $i . '" '. $sel . '>' . $i . '</option>';
}
?>
</select>


</div>
<span class="error"><?php echo $datadiaErr;?></span>
<span class="error"><?php echo $datamesErr;?></span>
<span class="error"><?php echo $dataanoErr;?></span>
</fieldset>



<div class="campo">
<label>Gênero</label>
<label>
<input type="radio" name="sexo" value="M" <?php echo $ckmasc;?>> Masculino
</label>
<label>
<input type="radio" name="sexo" value="F" <?php echo $ckfemi;?>> Feminino
</label>
<span class="error"> <?php echo $genderErr;?></span>
</div>

<div class="campo">
<label for="representa">Que Igreja você representa?</label>
<input type="text" id="representa" name="representa" style="width: 25em" value="<?php echo $representa;?>" />
</div>
<br>
<label for="dados">Seus Dados:<br>
</label>

<fieldset class="grupo">

<div class="campo">
<label for="endereco">Endereço</label>
<input type="text" id="endereco" name="endereco" style="width: 20em" value="<?php echo $endereco;?>" />
<span class="error"><?php echo $enderecoErr;?></span>
</div>
<div class="campo">
<label for="numero">N°</label>
<input type="text" id="numero" name="numero" style="width: 2.5em" value="<?php echo $numero;?>" />
<span class="error"><?php echo $numeroErr;?></span>
</div>
<div class="campo">
<label for="complemento">Complemento</label>
<input type="text" id="complemento" name="complemento" style="width: 8.5em" value="<?php echo $complemento;?>" />
</div>
</fieldset>

<fieldset class="grupo">

<div class="campo">
<label for="bairro">Bairro</label>
<input type="text" id="bairro" name="bairro" style="width: 15em" value="<?php echo $bairro;?>" />
<span class="error"><?php echo $bairroErr;?></span>
</div>
<div class="campo">
<label for="cep">CEP</label>
<input type="text" id="cep" name="cep" style="width: 10em" value="<?php echo $cep;?>" />
<span class="error"><?php echo $cepErr;?></span>
</div>

</fieldset>

<fieldset class="grupo">

<div class="campo">
<label for="estado">Estado</label>
<select name="estado" id="estado">
<?php
foreach ($aruf as $i => $value) {
$sel = "";
if ($estado == $i) {
$sel = " selected";
}
echo '<option value="' .$i. '"' .$sel. '>'. $value . '</option>';
}
?>
</select>
<span class="error"><?php echo $estadoErr;?></span>
</div>
<div class="campo">
<label for="cidade">Cidade</label>
<input type="text" id="cidade" name="cidade" style="width: 10em" value="<?php echo $cidade;?>" />
<span class="error"><?php echo $cidadeErr;?></span>
</div>

</fieldset>

<div class="campo">
<label for="email">E-mail</label>
<input type="text" id="email" name="email" style="width: 20em" value="<?php echo $email;?>" />
<span class="error"><?php echo $emailErr;?></span>

</div>

<div class="campo">
<label for="telefone">Telefone Fixo</label>
<input type="text" id="telfix" name="telfix" style="width: 10em" value="<?php echo $telfix;?>" maxlength="15" />
<span class="error"><?php echo $telfixErr;?></span>
</div>
<div class="campo">
<label for="telefone">Telefone Móvel</label>
<input type="text" id="telmov" name="telmov" style="width: 10em" value="<?php echo $telmov;?>" maxlength="16" />
</div>
<br>


<label for="social">Redes Sociais:</label>

<div class="campo">
<br>
<label for="face">Facebok</label>
<input type="text" id="face" name="face" style="width: 10em" value="<?php echo $face;?>"/>
</div>

<div class="campo">
<label for="insta">Instagram</label>
<input type="text" id="insta" name="insta" style="width: 10em" value="<?php echo $insta;?>"/>
</div>

<div class="campo">
<label for="skype">Skype</label>
<input type="text" id="skype" name="skype" style="width: 10em" value="<?php echo $skype;?>"/>
</div>

<div class="campo">
<label for="twi">Twitter</label>
<input type="text" id="twi" name="twi" style="width: 10em" value="<?php echo $twi;?>"/>
</div>
<br>
<label>Workshops:</label>
<fieldset class="grupo">

<div class="campo">
<label>Primeira Opção:</label>

<select name="workum" id="workum">
<?php
foreach ($workum as $i => $value) {
$sel = "";
if ($workum == $i) {
$sel = " selected";
}
echo '<option value="' .$i. '"' .$sel. '>'. $value . '</option>';
}
?>
</select>
</div>
<div class="campo">
<label>Segunda Opção:</label>

<select name="workdois" id="workdois">
<?php
foreach ($workdois as $i => $value) {
$sel = "";
if ($workdois == $i) {
$sel = " selected";
}
echo '<option value="' .$i. '"' .$sel. '>'. $value . '</option>';
}
?>
</select>

</div>
</fieldset>
<fieldset class="grupo">
<br>
<div class="campo">
<label>
<input type="checkbox" name="pernoitar" <?php echo $ckpernoite;?>> Necessitarei de um local para passar a noite entre sexta e sábado
</label>

</div>
</fieldset>

<fieldset class="grupo">
<div class="campo">
<label for="criancas">Levarei comigo</label>
</div>
<div class="campo">
<select name="criancas" id="criancas">
<?php
for ($i = 0; $i <= 10; $i++) {
$sel = "";
if ($criancas == $i) {
$sel = " selected";
}
echo '<option value="' . $i . '" '. $sel . '>' . $i . '</option>';
}
?>
</select>
</div>
<div class="campo">
<label for="criancas">crianças com 9 anos ou menos</label>
</div>
</fieldset>

<div class="campo">
<label>Como ficou sabendo da conferência?</label>
<label>
<input type="radio" id="como" name="como" value="FB" <?php echo $ckface;?>> Facebook
</label>
<label>
<input type="radio" id="como" name="como" value="AI" <?php echo $ckaviso;?>> Aviso na Igreja
</label>
<label>
<input type="radio" id="como" name="como" value="WA" <?php echo $ckwhats;?>> WhatsApp
</label>
<label>
<input type="radio" id="como" name="como" value="EM" <?php echo $ckemail;?>> Email
</label>
<label>
<input type="radio" id="como" name="como" value="OT" <?php echo $ckoutro;?>> Outro:
</label>
<span class="error"> <?php echo $comoErr;?></span>
</div>
<div class="campo">
<input type="text" id="outro" name="outro" style="width: 30em" value="<?php echo $outro;?>"/>
</div>

<div class="campo">
Leia as informações a seguir:
</div>

<div class="campo pagamento">

Obrigado! A Igreja Aliança Cristã e Miss. agradece a sua participação em nosso evento. Constaremos aqui algumas informações de como deverá ser efetuado o pagamento referente a sua inscrição:<br>

<h3>Valores para Inscrição:</h3>
Adulto - R$ 90,00<br>
Criança a partir de 10 anos – R$ 60,00 <br>
<b>Crianças entre 0 e 9 anos não pagam </b> <br>
Os valores contemplam a alimentação e kit de participante<br><br>

Os seus dados que foram inseridos acima serão guardados no nosso banco da dados. Quando você fizer o depósito na conta a seguir, deverá encaminhar um email e/ou uma mensagem por WhatsApp com uma foto ou digitalização do comprovante de pagamento. Assim que recebermos seu email com o comprovante sua inscrição será efetivada!<br>

<h3>Dados para o Depósito</h3>

<b>IGREJA ALIANÇA CRISTÃ E MISS DO AEROPORTO</b><br>
CNPJ - 64.711.401/0001-32<br>
Banco BRADESCO<br>
AG: 451 | CONTA POUPANÇA 1004108-2<br>

<h3>Dados para o envio do comprovante</h3>
Se você deseja enviar por Email: <b>iacmaero.m@gmail.com</b><br>
Se você deseja enviar por WhatsApp: <b>(11) 94960.0474</b><br><br>

Quando for recebido o email/mensagem em nossos sistemas, logo você receberá um outro email/mensagem em resposta confirmando sua participação.<br><br>

ATENÇÃO<br>
Caso não haja o reebimento do email, a inscrição será anulada!<br><br>

<h3>Para mais informações</h3>
Telefone: (11) 5093.9176<br>
Celular: (11) 94960.0474 (Tim)<br><br>

IMPORTANTE<br>
<b>Todo participante com 10 anos ou mais deverá fazer esta inscrição!</b>

</div>

<div class="campo">
<label>
<input type="checkbox" name="sei" <?php echo $cksei;?>> Li e estou ciente de que o meu valor do depósito deverá ser condizente com a data do mesmo que será enviado por email e/ou WhatsApp
</label>
<span class="error"><?php echo $seiErr;?></span>


</div>

<button class="botao" type="submit" name="submit">Cadastrar</button>

</fieldset>
</form>
</div>
<?php
}
