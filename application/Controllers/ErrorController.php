<?php
namespace Application\Controllers;

use Application\Src\Abstracts\Action;
use Application\Src\Enum\HttpStatusCode;

/**
 * Controler Error
 * @author Gabriel de Figueiredo Corrêa
 * @since 02/11/2017
 *
 */
class ErrorController extends Action
{
    /**
     * Action: error
     */
    public function error() {
        
        $this->parser('CODE', HttpStatusCode::NOT_FOUND);
        $this->parser('MESSAGE', "Não foi possível encontrar a rota informada!");
        $this->render('error');
    }
}