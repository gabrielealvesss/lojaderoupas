<?php
	$conectar = mysqli_connect ("localhost", "root", "", "lojaderoupas");
		
	$nome = $_POST["nome"];
	$login = $_POST["login"];
	$senha = $_POST["senha"];
	$funcao = $_POST["funcao"];

	$sql_consulta = "SELECT login FROM funcionarios 
					 WHERE login = '$login'";
							 
	$resultado_consulta = mysqli_query ($conectar, $sql_consulta);
		
	$linhas = mysqli_num_rows ($resultado_consulta);		
		
	if ($linhas == 1) {
	
		echo "<script> 
					alert ('Login ja cadastrado. Tente outro!') 
		      </script>";
			  
		echo "<script> 
					location.href = ('cadastra_fun.php') 
			  </script>";			
	}
	else { //Para o usuario que n�o existe	

		$sql_cadastrar = "INSERT INTO funcionarios 
				(nome, funcao, login, senha) 
						  VALUES 
				('$nome' , '$funcao', '$login' , '$senha')";
		$resultado_cadastrar = mysqli_query ($conectar, $sql_cadastrar);
		
		if ($resultado_cadastrar == true) { 		
			echo "<script> 
					alert ('$nome cadastrado com sucesso') 
				  </script>";
			
			echo "<script> 
					location.href = ('cadastra_fun.php') 
				  </script>";	
		}
		else { 		
			echo "<script> 
					alert ('Ocorreu um erro no servidor. Tente de novo') 
			     </script>";
		
			echo "<script> 
					location.href = ('cadastra_fun.php') 
				  </script>";		
		}	
	}
?>