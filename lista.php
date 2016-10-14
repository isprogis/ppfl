<html>
<head>
<title>Inscritos | Conferência Missionária 2016</title>
<link rel="icon" type="image/gif" href="img/ico.gif">
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link href="css/cssinscri.css" rel="stylesheet" type="text/css">
<script src="script/sorttable.js"></script>

</head>
<body>



<?php

$servername = "confmiss2016.mysql.uhserver.com";
$username = $_POST["user"];
$password = $_POST["pass"];
$dbname = "confmiss2016";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die(" Connection failed: " . $conn->connect_error);
	
}


$sql = "SELECT id, nome,  snome,  datadia,  datames,  dataano,  sexo,  representa,  endereco,  numero,  complemento,  bairro,  cep,  estado,  cidade,  email,  telfix,  telmov,  face,  insta,  skype,  twi,  workum,  workdois,  pernoitar,  criancas,  como,  outro,  sei FROM cadastroconf";
$result = $conn->query($sql);

?>

<div class="suportelista"> 
	<div align="left" class="logo" style="margin-left:145px">
    		<img src="img/logoanima.gif" width="200px" id="logoimg"></div>
	<h2 id="direita">Inscritos | Conferência Missionária 2016</h2>
    	<br>
        
        <table class="sortable">
   <tr> 
       <th class="cel">Cadastro</th>
       <th class="cel">Nome</th>
       <th class="cel">Data de Nascimento</th>
       <th class="cel">Gênero</th>
       <th class="cel">Representa alguma igreja</th>
       <th class="cel">Endereço</th>
       <th class="cel">Número</th>
       <th class="cel">Complemento</th>
       <th class="cel">Bairro</th>
       <th class="cel">CEP</th>
       <th class="cel">Estado</th>
       <th class="cel">Cidade</th>
       <th class="cel">Email</th>
       <th class="cel">Telefône Fixo</th>
       <th class="cel">Telefône Móvel</th>
       <th class="cel">Facebook</th>
       <th class="cel">Instagram</th>
       <th class="cel">Skype</th>
       <th class="cel">Twitter</th>
       <th class="cel">1° Escolha de Workshop</th>
       <th class="cel">2° Escolha de Workshop</th>
       <th class="cel">Pernoitar</th>
       <th class="cel">Quantas crianças</th>
       <th class="cel">Como ficou sabendo da conferência</th>
       <th class="cel">Se ficou sabendo de outra forma</th>
   </tr>

<?php

$pwork = "";
$swork = "";
$gen = "";
$est = "";
$pern = "";
$swork = "";

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
		
		
		if ($row["sexo"]=="M")		{ $gen = "Masculino"; }
		if ($row["sexo"]=="F")		{ $gen = "Feminino"; }

		if ($row["estado"]=="EXT")		{ $est = "Moro no exterior"; }
		if ($row["estado"]=="AC")		{ $est = "AC"; }
		if ($row["estado"]=="AL")		{ $est = "AL"; }
		if ($row["estado"]=="AM")		{ $est = "AM"; }
		if ($row["estado"]=="BA")		{ $est = "BA"; }
		if ($row["estado"]=="CE")		{ $est = "CE"; }
		if ($row["estado"]=="DF")		{ $est = "DF"; }
		if ($row["estado"]=="ES")		{ $est = "ES"; }
		if ($row["estado"]=="GO")		{ $est = "GO"; }
		if ($row["estado"]=="MA")		{ $est = "MA"; }
		if ($row["estado"]=="MT")		{ $est = "MT"; }
		if ($row["estado"]=="MS")		{ $est = "MS"; }
		if ($row["estado"]=="MG")		{ $est = "MG"; }
		if ($row["estado"]=="PA")		{ $est = "PA"; }
		if ($row["estado"]=="PB")		{ $est = "PB"; }
		if ($row["estado"]=="PR")		{ $est = "PR"; }
		if ($row["estado"]=="PE")		{ $est = "PE"; }
		if ($row["estado"]=="PI")		{ $est = "PI"; }
		if ($row["estado"]=="RJ")		{ $est = "RJ"; }
		if ($row["estado"]=="RN")		{ $est = "RN"; }
		if ($row["estado"]=="RS")		{ $est = "RS"; }
		if ($row["estado"]=="RO")		{ $est = "RO"; }
		if ($row["estado"]=="RR")		{ $est = "RR"; }
		if ($row["estado"]=="SC")		{ $est = "SC"; }
		if ($row["estado"]=="SP")		{ $est = "SP"; }
		if ($row["estado"]=="SE")		{ $est = "SE"; }
		if ($row["estado"]=="TO")		{ $est = "TO"; }
		
		if ($row["workum"]=="SP")		{ $pwork = "Sem Preferência"; }
		if ($row["workum"]=="MN") 		{ $pwork = "Transcultural"; }
		if ($row["workum"]=="TRANS") 	{ $pwork = "Missões e Negócios"; }
		if ($row["workum"]=="MC") 		{ $pwork = "Mídia e Comunicação"; }
		if ($row["workum"]=="AS") 		{ $pwork = "Ação Social"; }
		if ($row["workum"]=="ED") 		{ $pwork = "Educaçao"; }		
		
		if ($row["workdois"]=="SP")		{ $swork = "Sem Preferência"; }
		if ($row["workdois"]=="MN") 	{ $swork = "Transcultural"; }
		if ($row["workdois"]=="TRANS")  { $swork = "Missões e Negócios"; }
		if ($row["workdois"]=="MC") 	{ $swork = "Mídia e Comunicação"; }
		if ($row["workdois"]=="AS")		{ $swork = "Ação Social"; }
		if ($row["workdois"]=="ED") 	{ $swork = "Educaçao"; }

		if ($row["pernoitar"]=="-1")	{ $pern = "Não"; }
		if ($row["pernoitar"]=="1")		{ $pern = "Sim"; }
		
		if ($row["como"]=="FB")			{ $cm = "Facebook"; }
		if ($row["como"]=="AI") 		{ $cm = "Aviso na Igreja"; }
		if ($row["como"]=="WA") 		{ $cm = "WhatsApp"; }
		if ($row["como"]=="EM") 		{ $cm = "Email"; }
		if ($row["como"]=="OT") 		{ $cm = "Outro"; }		
		
			
        echo "<tr>
				  <td class='celula '>" . $row["id"]. "</td>
				  <td class='celula '>" . $row["nome"]. " " . $row["snome"]. "</td>
				  <td class='celula '>" . $row["dataano"]. "/" . $row["datames"]. "/" . $row["datadia"]. "</td>
				  <td class='celula '>" . $gen. "</td>
				  <td class='celula '>" . $row["representa"]. "</td>
				  <td class='celula '>" . $row["endereco"]. "</td>
				  <td class='celula '>" . $row["numero"]. "</td>
				  <td class='celula '>" . $row["complemento"]. "</td>
				  <td class='celula '>" . $row["bairro"]. "</td>
				  <td class='celula '>" . $row["cep"]. "</td>
				  <td class='celula '>" . $est. "</td>
				  <td class='celula '>" . $row["cidade"]. "</td>
				  <td class='celula '>" . $row["email"]. "</td>
				  <td class='celula '>" . $row["telfix"]. "</td>
				  <td class='celula '>" . $row["telmov"]. "</td>
				  <td class='celula '>" . $row["face"]. "</td>
				  <td class='celula '>" . $row["insta"]. "</td>
				  <td class='celula '>" . $row["skype"]. "</td>
				  <td class='celula '>" . $row["twi"]. "</td>
				  <td class='celula '>" . $pwork. "</td>
				  <td class='celula '>" . $swork. "</td>
				  <td class='celula '>" . $pern. "</td>
				  <td class='celula '>" . $row["criancas"]. "</td>
				  <td class='celula '>" . $cm. "</td>
				  <td class='celula '>" . $row["outro"]. "</td>
			 </tr>";
		}
} else {
    echo "0 results";
}
$conn->close();
?> 

</table>
</div>

</body>
</html>
