<?php
	
	/**
	 * essa classe pertence  seção 13 - aula 64
	 * criação de lista de usuários e parâmetros de busca
	 */
	class usuario
	{
		private $idusuario;
		private $deslogin;
		private $dessenha;
		private $dtcadastro;

		public function getIdusuario(){
			return $this->idusuario;	
		}

		public function setIdusuario($value){
			$this->idusuario = $value;
		}

		public function getDeslogin(){
			return $this->deslogin;	
		}

		public function setDeslogin($value){
			$this->deslogin = $value;
		}

		public function getDessenha(){
			return $this->dessenha;	
		}

		public function setDessenha($value){
			$this->dessenha = $value;
		}

		public function getDtcadastro(){
			return $this->dtcadastro;	
		}

		public function setDtcadastro($value){
			$this->dtcadastro = $value;
		}

		public function loadById($id){
			$sql = new Sql();

			$results = $sql->select("SELECT * FROM tb_usuarios WHERE idusuario = :ID", array(":ID"=>$id));

			if (count($results) > 0) {
				$row = $results[0];

				$this->setIdusuario($row['idusuario']);
				$this->setDeslogin($row['deslogin']);
				$this->setDessenha($row['dessenha']);
				$this->setDtcadastro($row['dtcadastro']);
				$this->setDtcadastro(new DateTime($row['dtcadastro']));
			}
		}


		//trazer uma lista com todos os usuários da tabela tb_usuarios
		/*
		* a diferença do LoadById é que nesta ele só traz um registro enquando que no getlist vai trazer uma lista de acordo com os parâmetros de busca.
		*/

		/*
		 a vantagem do método ser static é que não precisa ser instanciado em outras páginas. Pode chamar direto, colocando o nome da classe, dois pontos, dois pontos (::) e o nome do método da classe que se deseja utilizar.
		$lista = usuario::getlist();
		*/
		public static function getlist(){

			$sql = new Sql();

			return $sql-> select("SELECT * FROM tb_usuarios ORDER BY deslogin;");
		}


		public static function search($login){

			$sql = new Sql();

			return $sql->select("SELECT * FROM tb_usuarios WHERE deslogin LIKE :SEARCH ORDER BY deslogin", array(':SEARCH'=>"%".$login."%"));

		}

		public function login($login,$password){

			$sql = new Sql();
			$results = $sql->select("SELECT * FROM tb_usuarios WHERE deslogin= :LOGIN AND dessenha= :PASSWORD", array(
				":LOGIN"=>$login,
				":PASSWORD"=>$password
			));

			//se existir registro preenche com os SET do usuário.

			if (count($results) > 0) {
				$row = $results[0];

				$this->setIdusuario($row['idusuario']);
				$this->setDeslogin($row['deslogin']);
				$this->setDessenha($row['dessenha']);
				$this->setDtcadastro($row['dtcadastro']);
				$this->setDtcadastro(new DateTime($row['dtcadastro']));
				//caso não exista, tratar com exceção de erro
			}else{
				throw new Exception("Login e ou senha inválidos");
				
			}


		}


		public function __toSting(){

			return json_encode(array(
				"idusuario"=>$this->getIdusuario(),
				"deslogin"=>$this->getDeslogin(),
				"dessenha"=>$this->getDessenha(),
				"dtcadastro"=>$this->getDtcadastro()->format("d/m/y H:i:s")
			));
		}
	}

?>