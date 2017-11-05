<?php
namespace Application\Src\Abstracts;

use Application\Src\AppClass\Session;

/**
 * Classe Action
 * @author Gabriel de Figueiredo Corrêa
 * @since 30/09/2017
 * @package Application/Src
 *
 */
abstract class Action extends TemplateParser
{
    private $view;
	private $action;
	private $masterPagePath;
	
	/**
	 * Método construtor
	 */
	public function __construct()
	{
		$this->view = new \stdClass();
		$this->masterPagePath = GLOBAL_VARS['MASTER_PAGE'];
	}
	
	/**
	 * Método de renderização
	 * @param string $action
	 * @param string $layout
	 */
	protected function render($action, $layout=true)
	{
		$this->action = $action;
		
		if ($layout == true && file_exists($this->masterPagePath)) {
		
		    // Valida se existe uma sessão ativa
		    Session::validate();
		    
		    // Carregando a masterpage
		    $this->setMasterPageContent($this->masterPagePath);
		    
		    // Injetando o valores na masterpage
		    $this->parser('CONTENT', $this->content());
		    
		    // Faz o parser das constantes GLOBAL_VARS
		    foreach (GLOBAL_VARS as $keyGlobal => $valueGlobal){
		        $this->parser($keyGlobal, $valueGlobal);
		    }
		     
		    // Faz o parser das contantes ASSETS
		    foreach (ASSETS as $keyAssets => $valueAssets){
		        $this->parser($keyAssets, $valueAssets);
		    }
		    
		    $this->parser('ANO_ATUAL', date('Y'));
		    
		    echo $this->getMasterPageContent();
		    	
		}else {
		    echo $this->content();
		}
	}
	
	/**
	 * Método de recuperação do conteúdo
	 */
	protected function content() 
	{
		$atualClass = get_class($this);
		$singleClassName = str_replace('controller', '', strtolower(str_replace("Application\\Controllers\\", "", $atualClass)));
		$filePath = 'application/Views/' . $singleClassName . DIRECTORY_SEPARATOR . $this->action . '.phtml';
		
		$this->setCoreContent($filePath);
		return $this->getCoreContent();
	}
}
?>