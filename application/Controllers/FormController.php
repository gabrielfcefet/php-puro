<?php
namespace Application\Controllers;

use Application\Src\Abstracts\Form;
use Application\Src\AppClass\BaseViewAjax;

/**
 * Controller Form
 * @author Gabriel de Figueiredo Corrêa
 * @since 02/11/2017
 *
 */
class FormController extends Form
{
    /**
     * Action: contactRegister
     */
    public function contactRegister() {
        
        try {
            $baseViewAjax = new BaseViewAjax();
            
            // CONTINUAR
            
            $baseViewAjax->setDataKey('form', $this->getContentForm());
            
        } catch (Exception $ex) {
            $baseViewAjax->setError($ex->getMessage());
        }
        
        echo json_encode($baseViewAjax->getData());
    }
    
    /**
     * Action: contactSearch
     */
    public function contactSearch() {
        try {
            $baseViewAjax = new BaseViewAjax();
        
            // CONTINUAR
        
            $baseViewAjax->setDataKey('form', $this->getContentForm());
        
        } catch (Exception $ex) {
            $baseViewAjax->setError($ex->getMessage());
        }
        
        echo json_encode($baseViewAjax->getData());
    }
}