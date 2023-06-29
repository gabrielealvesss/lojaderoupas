<?php	
	$conectar = mysqli_connect ("localhost", "root", "", "lojaderoupas");
				
	
	$cod = $_GET["codigo"];	
	
	$sql_altera = "UPDATE Roupa 		
				   SET 		fila_compra_roupa = 'N'
				   WHERE 	cod_roupa = '$cod'";
	$sql_resultado_alteracao = mysqli_query ($conectar, $sql_altera);

	if ($sql_resultado_alteracao == true)
	{
		echo "<script>
				alert ('Roupa retirado da fila de compra com sucesso') 
			  </script>";
		echo "<script> 
				 location.href = ('vendas.php') 
			  </script>";
		exit();
	}  
	else
	{    
		echo "<script> 
				alert ('Ocorreu um erro no servidor. A roupa n�o foi retirado da fila de compras. Tente de novo') 
			</script>";
		echo "<script> 
				location.href ('vendas.php') 
			 </script>";
	}
?>
