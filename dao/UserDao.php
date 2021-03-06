<?php

require_once '../database/Connection.php';
require_once 'DAO.php';

abstract class UserDao implements DAO
{
	protected $tableDB;

	public function __construct($typeUser){
		$this->tableDB = $typeUser;
	}

	public function dbPrepare($sql)
	{
		return Connection::prepare($sql);
	}

	public function setTableDB($typeUser)
	{
		$this->tableDB = $typeUser;
	}

	public function getTableDB(){
		return $this->tableDB;
	}

	public function FindUnit($id)
	{
		$sql = "SELECT * FROM " . $this->tableDB . " WHERE id = :id";
		$stm = $this->dbPrepare($sql);
		$stm->bindParam(':id', $id, PDO::PARAM_INT);
		$stm->execute();
		return $stm->fetch();
	}

	public function FindName($cod_usuario)
	{
		$sql = "SELECT  nome FROM " . $this->tableDB . " WHERE cod_usuario = :cod_usuario";
		$stm = $this->dbPrepare($sql);
		$stm->bindParam(':cod_usuario', $cod_usuario);
		$stm->execute();
		$nameUser = $stm->fetch(PDO::FETCH_OBJ);
		return $nameUser;
	}

	public function FindAll()
	{
		$sql = "SELECT * FROM  $this->tableDB";
		$stm = $this->dbPrepare($sql);
		$stm->execute();
		$result = $stm->fetchAll(PDO::FETCH_OBJ);
		return $result;
	}

	public function InsertStudent($user)
	{
		$sql = "INSERT INTO $this->tableDB 
				(cod_usuario, email, nome, celular, endereco, bairro, cidade, estado, cep, setor, curso) 
				VALUES
				(:cod_usuario, :email, :nome, :celular, :endereco, :bairro, :cidade, :estado, :cep, :setor, :curso )";
		$stm = $this->dbPrepare($sql);
		foreach ($user as $key => &$value) {
			$stm->bindParam($key, $value);
		}
		return $stm->execute();
	}

	public function Insert($user)
	{
		$sql = "INSERT INTO $this->tableDB
				(cod_usuario, email, nome, celular, endereco, bairro, cidade, estado, cep, setor) 
				VALUES
				(:cod_usuario, :email, :nome, :celular, :endereco, :bairro, :cidade, :estado, :cep, :setor )";
		$stm = $this->dbPrepare($sql);
		foreach ($user as $key => &$value) {
				$stm->bindParam($key, $value);
		}
		return $stm->execute();
	}

	public function Update($id)
	{
		$sql = "UPDATE $this->tableDB SET nome = :nome WHERE id = :id";
		$stm = $this->dbPrepare($sql);
		$stm->bindParam(':id', $id, PDO::PARAM_INT);
		$stm->bindParam(':nome', $id);
		return $stm->execute();
	}

	public function UpdateStudent($id)
	{
		$sql = "UPDATE $this->tableDB SET nome = :nome WHERE id = :id";
		$stm = $this->dbPrepare($sql);
		$stm->bindParam(':id', $id, PDO::PARAM_INT);
		$stm->bindParam(':nome', $id);
		return $stm->execute();
	}

	public function Delete($id)
	{
		$sql = "DELETE FROM $this->tableDB WHERE id = :id";
		$stm = $this->dbPrepare($sql);
		$stm->bindParam(':id', $id, PDO::PARAM_INT);
		return $stm->execute();
	}

}