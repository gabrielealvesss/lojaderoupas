﻿<?php 
	session_start ();
?><!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Home</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/layout.css">
		<link rel="stylesheet" type="text/css" href="css/menu.css">
        <link href="https://fonts.googleapis.com/css?family=PT+Serif" rel="stylesheet">
    </head>
    <body>
        <div id="principal">
			<div id="topo">
				<div id="logo">
					<h1> LIZZ </h1>
					<h4> Venda de roupas masculinas e femininas </h4>
				</div>
				<div class="menu_global">
					<ul>
						<li> Olá <?php include "valida_login.php";?></li>
                        <li><a href="logout.php" class="active">Sair</a></li>                        
                    </ul>                
				</div>
			</div>
			<div id="conteudo_especifico">
				<div class="div_central centralizar">
					<h1> EXIBIÇÃO DE ROUPAS </h1>
				</div>
				<div class="div_esquerda menu_local">					
					<?php

						include "menu_local.php";
					
					?>
				</div>		
				<div id="funcionalidade" class="div_direita">					
					<?php		
						$conectar = mysqli_connect ("localhost", "root", "", "sistema_modelo");
					$codigo_amp = $_GET["codigo"];
					$sql_pesquisa_amp = "SELECT marca_amp, modelo_amp, tipo_amp, preco_amp, foto_amp
											  FROM amplificadores
											  WHERE cod_amp = '$codigo_amp'";
					$resultado_pesquisa_amp = mysqli_query ($conectar, $sql_pesquisa_amp);

					$registro_amp = mysqli_fetch_row($resultado_pesquisa_amp);
					?>
					<table class="esquerda">
						<tr>
							<td colspan="2">
								<img src="<?php echo "$registro_amp[4]"; ?>">
							</td>							
						<tr>
						<tr>
							<td>
								<?php
									echo "<p> Marca: $registro_amp[0] </p>";
									echo "<p> Modelo: $registro_amp[1]</p>";						
								?>
								
							</td>
							<td>
								<?php
									echo "<p> Tipo: $registro_amp[2] </p>";
									echo "<p> Preço: $registro_amp[3]</p>";
								?>
							</td>
						</tr>
					</table>							
				</div>		
				
			</div>	
			<div id="rodape">
				<div id="texto_institucional">
					<div id="texto_institucional">
						<h6> LIZZ - CONTROL </h6> 
						<h6> Rua 324, CJ 788 -- E-mail: contato@lizzroupas.com.br -- Fone: (61) 9966 - 6677 </h6> 
					</div> 
				</div>
		</div>
    </body>
</html>