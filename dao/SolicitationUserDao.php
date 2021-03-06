<?php

require_once '../database/Connection.php';
require_once 'DAO.php';

abstract class SolicitationUserDao implements DAO
{
	protected $tableDB;

	abstract public function __construct(User $user);

	public function dbPrepare($sql)
	{
		return Connection::prepare($sql);
	}

	public function setTableDB(string $typeUser)
	{
		$this->tableDB = $typeUser;
	}

	public function FindUnit($cod_usuario)
	{
		$sql = "SELECT * FROM " . $this->tableDB . " WHERE cod_usuario = :cod_usuario";
		$stm = $this->dbPrepare($sql);
		$stm->bindValue(':cod_usuario', $cod_usuario, PDO::PARAM_INT);
		$stm->execute();
		return $stm->fetch();
	}

	public function FindAll()
	{
		$sql = "SELECT * FROM  $this->tableDB";
		$stm = $this->dbPrepare($sql);
		$stm->execute();
		return $stm->fetchAll(PDO::FETCH_OBJ);
	}

	public function Insert($solicitation)
	{
		$sql = "INSERT INTO $this->tableDB (cod_usuario, servico, dataSolicitacao, num_solicitacao) 
				VALUES (:cod_usuario, :servico, :dataSolicitacao, :num_solicitacao )";
		$date = date("Y-m-d H:i:s", strtotime($solicitation['dataSolicitacao']));
		$stm = $this->dbPrepare($sql);
		$stm->bindParam(':cod_usuario', $solicitation['cod_usuario']);
		$stm->bindParam(':servico', $solicitation['servico']);
		$stm->bindParam(':dataSolicitacao', $date);
		$stm->bindParam(':num_solicitacao', $solicitation['num_solicitacao']);
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

	public function Delete($id)
	{
		$sql = "DELETE FROM $this->tableDB WHERE id = :id";
		$stm = $this->dbPrepare($sql);
		$stm->bindParam(':id', $id, PDO::PARAM_INT);
		return $stm->execute();
	}

}