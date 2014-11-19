<html>
<head>
	<link rel="stylesheet" href="styles/style-panel.css" type="text/css" media="all" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<body>
<center><h1> Me Ajude a Registrar</h1></center>
<center><div id="div_Skin">
<form method="post" action="skins.php" enctype="multipart/form-data">Skin: <input type="text" name="skin" /> <br>
<form method="post" action="skins.php" enctype="multipart/form-data">ID: <input type="text" name="id" /> <br>
<form method="post" action="skins.php" enctype="multipart/form-data">ID do Campeao: <input type="text" name="campeao" /> <br>
<input type="hidden" name="acao" value="enviado"/>
<input type="submit" value="Enviar Informações"/>
<?php
// Get all the data from the "example" table
$result = $mysqli->query("SELECT * FROM tbl_skin") 
or die(mysqli_error());  

echo "<table border='1'>";
echo "<tr> <th>ID Skin</th> <th>Nome SKIN</th> <th>ID Campeao</th> </tr>";
// keeps getting the next row until there are no more to get
while($row = mysqli_fetch_array( $result )) {
	// Print out the contents of each row into a table
	echo "<tr><td>"; 
	echo $row['id'];
	echo "</td><td>"; 
	echo $row['skin'];
	echo "</td><td>"; 
	echo $row['campeao'];	
} 

echo "</table>";
?>

</form>
</div></center>
</body>
</html>