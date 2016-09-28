<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>CRUD GENERICO</title>
</head>
<body>
	<?php

		// require("crud.php");

		//Abre conexão com o banco
		// $conexao = abrirConexao();


		// Faz consulta do banco de dados ## consultar($tabela, $condicao = null, $campos = "*") ##

		// $Consulta = consultar("categoria");		
		
		// Fim da consulta


		// Insere dados no Banco # inserir($tabela, array $dados) #
		//$dados = dados de exemplo

		// $dados= array( 
		// 	"categoria"=>"SEO",
		// 	 "ativo_categoria" => "U"
		// 	 );

		// $insere = inserir("categoria", $dados);
		
		// Fim Insere

		// Altera dados no Banco # alterar($tabela, array $dados, $condicao) #
		//$dados = dados de exemplo

		// $dados= array( 
		// 	"categoria"=>"SEO",
		// 	 "ativo_categoria" => "U"
		// 	 );

		// $Altera = alterar("categoria", $dados, "id_produto = 3");
		
		// Fim Alterar


		// Exclui dados no Banco # deletar($tabela,$condicao) #
		// $exclui = excluir("categoria", "id_produto = 3");
		
		//fim excluir
	?>
	


		 require("crud.php");<br><br>

		//Abre conexão com o banco<br><br>
		
		 $conexao = abrirConexao();<br><br>


		// Faz consulta do banco de dados ## consultar($tabela, $condicao = null, $campos = "*") ##<br><br>

		 $Consulta = consultar("categoria");		<br><br>
		
		// Fim da consulta<br><br>


		// Insere dados no Banco # inserir($tabela, array $dados) #<br>
		//$dados = dados de exemplo<br><br>

		$dados= array( <br>
			"categoria"=>"SEO",<br>
		 	 "ativo_categoria" => "U"<br>
		);<br><br>

		 $insere = inserir("categoria", $dados);<br><br>
		
		// Fim Insere<br><br>

		// Altera dados no Banco # alterar($tabela, array $dados, $condicao) #<br>
		//$dados = dados de exemplo<br><br>

		 $dados= array( <br>
		 	"categoria"=>"SEO",<br>
		 	 "ativo_categoria" => "U"<br>
		 );<br>

		 $Altera = alterar("categoria", $dados, "id_produto = 3");<br><br>
		
		// Fim Alterar<br><br>


		// Exclui dados no Banco # deletar($tabela,$condicao) #<br>
		$exclui = excluir("categoria", "id_produto = 3");<br><br>
		
		//fim excluir<br>



</body>
</html>