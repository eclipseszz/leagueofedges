<?php
	include("connection.php");
	session_start();
	include("sairPagina.php");
	sairPagina();
?>


<?php
$skin = $_POST['skin'];
$ID = $_POST['id'];
$campeao = $_POST['campeao'];
		$query = $mysqli->query("SELECT * FROM tbl_skin WHERE id='$ID', campeao='$campeao', skin='$skin'");
		$row = $query->num_rows;
		if($row > 0) {
			echo "<script> alert('Champion já existente no Banco de Dados!'); location.href='panel.php?func=skin'</script>";
		} else {
			$query2 = $mysqli->query("INSERT INTO tbl_skin (id, campeao, skin) VALUES ('$ID','$campeao','$skin')");
			if($query2) {
				echo "<script> alert('Usuário registrado com sucesso!'); location.href='panel.php?func=skin' </script>";
			} else {
				echo "<script> alert('Erro ao adicionar usuário!'); </script>";
			}
		}
	


?>




