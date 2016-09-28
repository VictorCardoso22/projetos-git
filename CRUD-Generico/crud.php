<?php
require("config.php");

function abrirConexao(){
	$conexao = @mysqli_connect(SERVIDOR, USUARIO, SENHA, BANCO) or die(mysqli_connect_error());
	mysqli_set_charset($conexao, CHARSET);

	return $conexao;
}

function fecharConexao($conexao){
	@mysqli_close($conexao) or die(mysqli_error($conexao));
}

function executar($sql){
	$conexao = abrirConexao();
	$qry = @mysqli_query($conexao, $sql) or die(mysqli_error($conexao));

	fecharConexao($conexao);
	return $qry;
}

function consultar($tabela, $condicao = null, $campos = "*"){
	$sql = "SELECT {$campos} FROM {$tabela} {$condicao} ";
	$qry = executar($sql);

	if (!mysqli_num_rows($qry)) {
		return false;
	}else{
		while ($linha = mysqli_fetch_assoc($qry)) {
			$dados[] = $linha;
		}

		return $dados;
	}
	
}

function inserir($tabela, array $dados){
	$chaves = implode(", ", array_keys($dados));
	$valores = "'".implode("','", $dados) ."'";
	$sql = "INSERT INTO {$tabela} ({$chaves}) VALUES ({$valores})";

	return executar($sql);
}

function alterar($tabela, array $dados, $condicao){

	foreach ($dados as $chave => $valor) {
		$campos[] = "{$chave} = '{$valor}'";
	}
	$campos = implode(', ', $campos);
	$sql = "UPDATE {$tabela} SET {$campos}  WHERE {$condicao} ";
	
	return executar($sql);
}


function deletar($tabela,$condicao){
	$sql = "DELETE FROM {$tabela} WHERE {$condicao}";

	return executar($sql);
}


?>