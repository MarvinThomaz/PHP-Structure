<?php

require_once("iConexao.php");

class Conexao implements IConexao
{
	public function Conexao($host, $usuario, $senha, $banco)
	{
		$this -> Host = $host;
		$this -> Usuario = $usuario;
		$this -> Senha = $senha;
		$this -> Banco = $banco;
	}

	private $Host;
	private $Usuario;
	private $Senha;
	private $Banco;

	public function Conectar()
	{
		try 
		{
			$conexao = new PDO("mysql:host=$this->Host;dbname=$this->Banco", $this -> Usuario, $this -> Senha);
			
			$conexao -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			return $conexao;
		}
		catch(PDOException $ex) 
		{
			echo "Falha de conexão: " . $ex -> getMessage();
		}
	}

	public function ExecutarQuery($query, $parametros, $return = true, $list = true)
	{
		$conexao = $this -> Conectar();

		try
		{
			if($parametros != null)
			{
				$sql = $conexao -> prepare($query);

				$sql -> execute($parametros);

				if($list && $return)
				{
					return $sql -> fetchAll(PDO::FETCH_ASSOC);
				}
				else if($return)
				{
					return $sql -> fetch(PDO::FETCH_ASSOC);
				}
			}
			else
			{
				return $conexao -> query($query);
			}
		}
		catch(PDOException $ex)
		{
			echo "Erro: " . $ex -> getMessage();
		}
		finally
		{
			$this -> Desconectar($conexao);
		}
	}

	public function Desconectar($conexao)
	{
		$conexao = null;
	}
}

?>