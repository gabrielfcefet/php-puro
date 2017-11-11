<?php
namespace Application\Controllers;

use Application\Src\Abstracts\ActionPopUp;

/**
 * Controler ContactPopUpController
 * 
 * @author Gabriel de Figueiredo Corrêa
 * @since 10/11/2017
 *       
 */
class ContactPopUpController extends ActionPopUp
{

    /**
     * Action: contactRegister
     */
    public function contactRegister()
    {
        echo $this->render('contact');
    }
}