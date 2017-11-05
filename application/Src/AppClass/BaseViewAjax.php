<?php

namespace Application\Src\AppClass;

/**
 * Classe de gerenciamento dos retornos via ajax
 * 
 * @author Gabriel de Figueiredo Corrêa
 * @since 01/10/2017
 */
class BaseViewAjax
{
	private $arrRetorno;
	
	/**
	 * Construtor padrão da classe
	 *
	 * @param Boolean $verificarSeguranca
	 */
	function __construct($verificarSeguranca = false)
	{
		$this->arrRetorno = array ();
		$this->arrRetorno ['MensagemErro'] = '';
		$this->arrRetorno ['Redirect'] = '';
	
		/*if ($verificarSeguranca) {
			$acessoRecurso = new AcessoRecurso ();
			$result = $acessoRecurso->ValidarPermissao ( $_SESSION ['RECURSO_ATIVO'] );
			if (! $result [0]) {
				 if ($result [1] == TipoRestricaoRecurso::SESSAO_EXPIRADA) {
					 $this->_arrRetorno ['Redirect'] = $_SESSION ['HTTP_HOST'] . '/sistema/logout.php';
					 $this->_arrRetorno ['MensagemErro'] = 'Sessão expirada. Efetue novo login.';
				 } else {
					 $this->_arrRetorno ['Redirect'] = $_SESSION ['HTTP_HOST'] . '/sistema/login/welcome.php';
					 $this->_arrRetorno ['MensagemErro'] = 'Acesso negado!';
				 }
			}
		}*/
	}

	/**
	 * Define uma mensagem de erro
	 *
	 * @param String $error
	 */
	public function setError($error)
	{
		$this->arrRetorno ['MensagemErro'] = $error;
	}

	/**
	 * Retorna a mensagem de erro indicada através do método SetError
	 *
	 * @return String
	 */
	public function getError()
	{
		return $this->arrRetorno ['MensagemErro'];
	}

	/**
	 * Define um redirecionamento de página que será realizado após a conclusão
	 * do processamento ajax
	 *
	 * @param String $url
	 */
	public function setRedirect($url)
	{
		$this->arrRetorno ['Redirect'] = $url;
	}

	/**
	 * Define uma nova propriedade e seu valor, para utilização no retorno do
	 	* ajax
	 	*
	 	* @param String $key
	 	* @param Variant $data
	 	*/
	 public function setDataKey($key, $data)
	 {
	 	$this->arrRetorno [$key] = $data;
	 }

	 /**
	  * Retorna o valor da propriedade indicada
	  *
	  * @param String $key
	  */
	 public function getDataKey($key)
	 {
	 	return $this->arrRetorno [$key];
	 }

	 /**
	  * Retorna os dados padrões junto com possíveis novas propriedades
	  * definidas, para utilização no retorno do ajax
	  *
	  * @return Object
	  */
	 public function getData()
	 {
	 	return $this->arrRetorno;
	 }
}
?>