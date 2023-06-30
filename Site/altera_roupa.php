<?php 
	session_start ();
?>
<!DOCTYPE html>
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
					<h1> ALTERAÇÃO DE ROUPAS </h1>
				</div>
				<div class="div_esquerda menu_local">					
					<?php

						include "menu_local.php";
					
					?>
				</div>		
				<div id="funcionalidade" class="div_direita">
					<?php
						$conectar = mysqli_connect ("localhost", "root", "", "lojaderoupas");
						
						$cod = $_GET["codigo"];
										
						$sql_pesquisa = "SELECT  cod_roupa, tipo , marca ,tamanho , categoria , preco
										FROM roupa
										 WHERE cod_roupa = '$cod'";
						$resultado_pesquisa = mysqli_query ($conectar, $sql_pesquisa);	
						
						$registro = mysqli_fetch_row($resultado_pesquisa);
					?>
					<form method="post" action="processa_altera_roupa.php">
						<input type="hidden" name="codigo" value="<?php echo "$cod"; ?>">
						<table class="centralizar">	
							<tr>
								<td>
									<p> Tipo: </p>
								</td>
								<td>
									<p> <input type="text" name="tipo" required value="<?php echo "$registro[1]"; ?>" > </p>
								</td>
							</tr>
							<tr>
								<td>
									<p> Marca: </p>
								</td>
								<td> 
									<p> <input type="text" name="marca" required value="<?php echo "$registro[2]"; ?>"> </p>
								</td>								
							</tr>
							<tr>
								<td>
									<p> Tamanho: </p>
								</td>
								<td> 
									<p> <input type="text" name="tamanho" required value="<?php echo "$registro[2]"; ?>"> </p>
								</td>								
							</tr>
							<tr>
								<td>
									<p> Categoria: </p>
								</td>
								<td> 
									<p> <input type="text" name="categoria" required value="<?php echo "$registro[2]"; ?>"> </p>
								</td>								
							</tr>
							<tr>
								<td> 
									<p> Preço: </p>
								</td>
								<td>
									<p> <input type="text" name="preco" required value="<?php echo "$registro[4]"; ?>"> </p>
								</td>
							</tr>
							<tr>
								<td> 
									<p> Foto: </p>
								</td>
								<td>
									<p> <input type="file" name = "foto"> </p>
								</td>
							</tr>
							<tr>
								<td>
									<p> Tipo:  </p>
								</td>
								<td>
									<p>
										<select name="tipo">
											<option value="regata"
												<?php
														if ($registro[3] == "regata") {
															echo "selected";
														}
													?>
												>Blusa </option>
											<option value="blusa"
												<?php
														if ($registro[3] == "blusa") {
															echo "selected";
														}
													?>
											> Blusa </option>
											<option value="blusa"
												<?php
														if ($registro[3] == "blusa") {
															echo "selected";
														}
													?> 
											> Violão </option>
										</select>
									</p>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									<p> <input type="submit" value="Alterar Roupa"> </p>
								</td>
							</tr>
						</table>
					</form>
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