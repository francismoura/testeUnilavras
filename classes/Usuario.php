<?php


class Usuario extends CrudUser {

	public $nome;


	public function __construct()
    {
        $this->nome = $nome;
    }

    /**
	 * @return mixed
	 */
	public function getNome() {
		return $this->nome;
	}

	/**
	 * @param mixed $nome
	 */
	public function setNome($nome) {
		$this->nome = $nome;
	}

	

}