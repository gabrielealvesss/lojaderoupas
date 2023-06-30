<?php
	if ($_SESSION["funcao"] == "administrador") {
?>
<ul>
	<li><a href="administracao.php" class="active">Administração</a></li>
	<li><a href="lista_fun.php" class="active">Funcionários</a></li>
	<li><a href="lista_roupa.php">Roupas</a></li>
	<li><a href="vendas.php">Vendas</a></li>    
	<li><a href="relatorios.php">Relatorios</a></li>  						
</ul> 

<?php
	}
	elseif ($_SESSION["funcao"] == "estoquista") {
?>
<ul>
	<li><a href="administracao.php" class="active">Administração</a></li>
	<li><a href="lista_roupa.php">Roupas</a></li>					
</ul> 
<?php		
	}
	elseif ($_SESSION["funcao"] == "vendedor") {
?>
<ul>
	<li><a href="administracao.php" class="active">Administração</a></li>
	<li><a href="vendas.php">Vendas</a></li>    			
</ul> 
<?php		
	}
?>