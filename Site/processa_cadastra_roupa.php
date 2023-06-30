<?php
	session_start();

	$conectar = mysqli_connect ("localhost", "root", "", "sistema_modelo");
	
	$tipo = $_POST["tipo"];
	$marca = $_POST["marca"];
	$tamanho = $_POST ["tamanho"];
	$categoria = $_POST["categoria"];	
	$preco = $_POST ["preco"];
	$foto = $_FILES["foto"];
	
	$foto_nome = "img/".$foto["name"];
	move_uploaded_file($foto["tmp_name"], $foto_nome);
	
	$sql_cadastrar = "INSERT INTO roupas (tipo, 
											marca, 
											tamanho, 
											categoria, 
											preco) 
					  VALUES 			   ('$tipo',
											'$marca', 
											'$tamanho',
											'$categoria',
											'$preco',
											'$foto_nome')";
											
	$sql_resultado_cadastrar = mysqli_query ($conectar, $sql_cadastrar);
	
	if ($sql_resultado_cadastrar == true) { 	
		echo "<script>
				alert ('$categoria cadastrado com sucesso') 
			  </script>";
		echo "<script>
				location.href = ('cadastra_roupa.php') 
			  </script>";		
	}
	else { 	
		echo "<script> 
				alert ('ocorreu um erro no servidor ao 
											tentar cadastrar') 
			  </script>";
		
		echo "<script> 
				location.href = ('cadastra_roupa.php') 
			  </script>";
	
	}
?>