<?php
namespace Application\Controllers;

use Application\Src\Abstracts\Action;

/**
 * Classe de controle de login
 * @author Gabriel de Figueiredo Corrêa
 * @since 30/09/2017
 */
class LoginController extends Action
{
	/**
	 * Action: login
	 */
	public function login()
	{
	    // Faz o parser das constantes GLOBAL_VARS 
	    foreach (GLOBAL_VARS as $keyGlobal => $valueGlobal){
	        $this->parser($keyGlobal, $valueGlobal);
	    }
	    
	    // Faz o parser das contantes ASSETS
	    foreach (ASSETS as $keyAssets => $valueAssets){
	        $this->parser($keyAssets, $valueAssets);
	    }
	    
		$this->render('login', false);
	}
}
?>