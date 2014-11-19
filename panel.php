<?php
	include("connection.php");
	session_start();
	include("sairPagina.php");
	sairPagina();
?>

<!DOCTYPE html>
<html>
	<head>
		<title> BornToPlay - Painel </title>
		<link rel="stylesheet" href="styles/style-panel.css" type="text/css" media="all" />
	</head>
	<body>
		<div id="div_Container">
			<div id="div_Topo"> 
				<img id="imageTOPO" src="images/topo.png" alt="Imagem Togo" />
			</div>
			<div id="div_Menu"> 
				<ul>
					<li> <a href="index.php"> Início </a> </li>
					<li> <a href="panel.php"> Painel </a> </li>
					<li> <a href="panel.php?func=champion"> Add Champion </a> </li>
					<li> <a href="panel.php?func=skin"> Add Skin </a> </li>
					<li> <a href="panel.php?func=ajuda"> Skins/IDs </a> </li>
				</ul>
			</div>
			<div id="div_Conteudo"> 
				<?php
					error_reporting(false);
					$page = $_GET["func"];
					if(isset($page)) {
						include("$page.php");
					} else {
						$usuario = $_SESSION["Usuario"];
						$check = $mysqli->query("SELECT * FROM usuarios");
						$row = $check->num-rows;
						$_SESSION["usuarios"] = $row;
						
						$check2 = $mysqli->query("SELECT * FROM postagens");
						$row2 = $check2->num-rows;
						$_SESSION["postagens"] = $row2;
						?>
						
						<h4> Bem vindo ao Painel de Controle <?php echo $usuario; ?> </h4>
						
											
					<?php
					}
				?>
			</div>
			<div id="div_Rodape"> 
				<span> BornToPlay 2014 - Todos os direitos reservados. </span>
			</div>
		</div>
	</body>
</html>