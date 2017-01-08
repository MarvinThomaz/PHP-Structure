<?php

interface IConexao
{
	function Conectar();
	function ExecutarQuery($query, $parametros, $list = true);
	function Desconectar($conexao);
}

?>