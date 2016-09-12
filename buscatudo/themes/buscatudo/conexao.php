<?php

function conectar(){
	define('HOST', 'localhost');
	define('USER', 'root');
	define('PASS', '221493');

		try {
			$con = new pdo("mysql:host=".HOST."; dbname=carrinho'", USER , PASS);
		} catch (PDOException $e) {
			echo $e->getMenssage();
		}
		return $con;
}