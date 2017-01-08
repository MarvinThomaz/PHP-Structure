<?php

interface IDao
{
	function Cadastrar($entidade);
	function Atualizar($entidade);
	function Deletar($chave);
	function Listar();
	function BuscarPorChave($chave);
}

?>