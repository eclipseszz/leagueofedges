<?php
	include("connection.php");
	session_start();
	include("sairPagina.php");
	sairPagina();
?>

<?php
$nome = $_POST['nome'];
		$query = $mysqli->query("SELECT * FROM tbl_campeao WHERE campeao='$nome'");
		$row = $query->num_rows;
		if($row > 0) {
			echo "<script> alert('Champion já existente no Banco de Dados!'); location.href='panel.php?func=champion'</script>";
		} else {
			$query2 = $mysqli->query("INSERT INTO tbl_campeao (id, campeao) VALUES ('','$nome')");
			if($query2) {
				echo "<script> alert('Usuário registrado com sucesso!'); location.href='panel.php?func=champion' </script>";
			} else {
				echo "<script> alert('Erro ao adicionar usuário!'); </script>";
			}
		}
	


?>




