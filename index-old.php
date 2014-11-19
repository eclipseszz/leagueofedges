<?php
	include("connection.php");
	session_start();
	include("sairPagina.php");
	sairPagina();
?>
<html>
	<head>
		<title>League Of Edge</title>
		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" href="styles/style_index.css" type="text/css" media="all" />

	</head>
	<body>
		<div id="div_Container">
			<div id="div_Topo">
				<img id="imageTOPO" src="images/LOE.png" alt="Imagem Togo" />
			</div>
			<div id="div_Menu"> 
					<ul>
						<?php
							if(isset($_SESSION["Usuario"])) { ?>
						<li> <a href="index.php"> Início </a> </li>
						<li> <a href="contato.php"> Contato </a> </li>
						<li> <a href="panel.php"> Painel </a> </li>				
						<li> <a href="index.php?func=sairPagina"> Sair ( <?php echo $_SESSION["Usuario"]; ?> ) </a> </li>
						<?php	} else { ?>
						<li> <a href="index.php"> Início </a> </li>
						<li> <a href="contato.php"> Contato </a> </li>	
						<li> <a href="pag_register.php"> Registro </a> </li>
						<li> <a href="pag_login.php"> Login </a> </li>
						<?php } ?>
					</ul>
				</div>
				<div id="div_Construcao">
					<h1> <b>HUE Generator</b> <br /> </h1>
				</div>
				<div id="div_Conteudo">
					<div id="div_Postagem">
						<div id="div_System">
							<form action="" method="post" id="auto">
								<select name="campeao">
									<option value="0">Escolha o Campeão</option>
									<?php
										$sql = "SELECT * FROM tbl_campeao";
										$query = $mysqli->query($sql);
										while($ln = mysqli_fetch_array($query)){
											echo '<option value="'.$ln['id'].'">'.$ln['campeao'].'</option>';
										}
									?>		   
								</select>
								<select name="skin">
									<option value="0" selected="selected">Aguardando Skin...</option>
								</select>
							</form>
						</div>
					</div>
				</div>
				<div id="div_Rodape">		
					<span> League Of Edges - 2014. </span>
				</div>
		</div>
		
	<script type="text/javascript">
   
      $(document).ready(function(){
        // Evento change no campo campeao  
         $("select[name=campeao]").change(function(){
            // Exibimos no campo skin antes de concluirmos
			$("select[name=skin]").html('<option value="">Carregando...</option>');
            // Exibimos no campo skin antes de selecionamos a skin, serve também em caso
			// do usuario ja ter selecionado o campeao e resolveu trocar, com isso limpamos a
			// seleção antiga caso tenha feito.
			$("select[name=modelo]").html('<option value="">Aguardando skin...</option>');
			// Passando campeao por parametro para a pagina ajax-skin.php
            $.post("ajax-skin.php",
                  {campeao:$(this).val()},
                  // Carregamos o resultado acima para o campo skin
				  function(valor){
                     $("select[name=skin]").html(valor);
                  }
                  )
         })
     	// Evento change no campo skin 
	 	$("select[name=skin]").change(function(){
            // Exibimos no campo modelo antes de concluirmos
			$("select[name=modelo]").html('<option value="">Carregando...</option>');
            // Passando skin por parametro para a pagina ajax-modelo.php
            $.post("ajax-modelo.php",
                  {skin:$(this).val()},
                  // Carregamos o resultado acima para o campo modelo
				  function(valor){
                     $("select[name=modelo]").html(valor);
                  }
                  )
            
         })
	 
	  })
      
</script>
	</body>
</html>
