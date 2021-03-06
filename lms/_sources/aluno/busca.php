<?php
// ===================================================================
class Busca {
	// ===============================================================
	private $system = null;
	private $redir = '';
	// ===============================================================
	public function __construct(&$system) {
		$this->system = $system;
	}
	// ===============================================================
	public function autoRun() {
		if (!eregi('redirecionar=', $_SERVER['QUERY_STRING']) && !$this->system->input['redirecionar'])
    		$this->redir = base64_encode('index.php?'.$_SERVER['QUERY_STRING']);
		else
    		$this->redir = stripslashes($this->system->input['redirecionar']);
		
		switch($this->system->input['do']) {
			case 'buscar': 	$this->doBuscar(); break;
			default: 		$this->doBuscar(); break;
		}
	}
	// ===============================================================
	private function doBuscar() {
		$tipo = $this->system->input['tipo'];
		$palavra = $this->system->input['palavra'];
		if ($palavra) 
			$this->system->session->addItem('palavra_busca', $palavra);
		
		switch($tipo) {
			case 1:
				session_write_close();
				header('Location:' .  $this->system->getUrlSite() .'lms/aluno/cursos/buscar/');
				exit();
				break;
			case 2:
				session_write_close();
				header('Location:' .  $this->system->getUrlSite() .'lms/aluno/duvidas/buscar/');
				exit();
				break;
			case 3:
				session_write_close();
				header('Location:' .  $this->system->getUrlSite() .'lms/aluno/assinaturas/buscar/');
				exit();
				break;
			case 5:
				session_write_close();
				header('Location:' .  $this->system->getUrlSite() .'lms/aluno/certificados/buscar/');
				exit();
				break;
			case 6:
				session_write_close();
				header('Location:' .  $this->system->getUrlSite() .'lms/aluno/estatisticas/buscar/');
				exit();
				break;
		}
		exit();
	}
	
}
// ===================================================================