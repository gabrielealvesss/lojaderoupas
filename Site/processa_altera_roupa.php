<?php	
	$conectar = mysqli_connect ("localhost", "root", "", "lojaderoupas");
				
	

	$tipo = $_POST["tipo"];
	$marca = $_POST["marca"];
	$tamanho = $_POST ["tamanho"];
	$categoria = $_POST["categoria"];	
	$preco = $_POST ["preco"];
	$foto = $_FILES["foto"];
	
	
	if ($foto["name"] <> "") {
		$foto_nome = "img/".$foto["name"];		
		move_uploaded_file($foto["tmp_name"], $foto_nome);
	}
	
	$sql_altera = "UPDATE roupas		
				   SET 		tipo='$tipo', 
							marca = '$marca',
							tamanho ='$tamanho', 
							categoria = '$categoria',
							preco= '$preco'
				   WHERE 	cod_roupa = '$cod'";
	$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);

	if ($sql_resultado_alteracao == true)
	{
		echo "<script>
				alert ('$categoria alterado com sucesso') 
			  </script>";
		echo "<script> 
				 location.href = ('lista_roupa.php') 
			  </script>";
		exit();
	}  
	else
	{    
		echo "<script> 
				alert ('Ocorreu um erro no servidor. Os dados da roupa n�o foram alterados. Tente novamente!') 
			</script>";
		echo "<script> 
				location.href ('lista_roupa.php') 
			 </script>";
	}
?>