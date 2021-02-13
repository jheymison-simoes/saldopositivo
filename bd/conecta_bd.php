<?php

// Definir fuso Horário
date_default_timezone_set("America/Sao_Paulo");

// $conecta_bd = new mysqli("127.0.0.1", "root" ,"" , "bd_saldo_positivo");

$conecta_bd = new mysqli("mysqlserver.cep7bv39nwo1.sa-east-1.rds.amazonaws.com", "admin" ,"saldo20212021positivo" , "bd_saldo_positivo");

if ($conecta_bd-> connect_error ) {
	die('Erro na conexao :' . $conecta_bd-> connect_error);
}

?>