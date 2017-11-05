<?php
namespace Application\Controllers;

use Application\Src\Abstracts\Action;

/**
 * Controler Index
 * @author Gabriel de Figueiredo Corrêa
 * @since 30/09/2017
 *
 */
class IndexController extends Action
{
	/**
	 * Action: index
	 */
	public function index() {
	    
		$this->render('index');
	}
	
	/**
	 * Action: home
	 */
	/*public function home()
	{
		$nomes = array();
		$nomes[] = 'Gabriel';
		$nomes[] = 'Luara';
		
		$this->view->nomes = $nomes;
		$this->render('home');
	}*/
}