<?php
namespace Application\Controllers;

use Application\Src\Abstracts\Form;
use Application\Src\AppClass\BaseViewAjax;

/**
 * Controller Form
 * 
 * @author Gabriel de Figueiredo Corrêa
 * @since 02/11/2017
 *       
 */
class FormController extends Form
{

    /**
     * Action: contactRegister
     */
    public function contactRegister()
    {
        try {
            $baseViewAjax = new BaseViewAjax();
            
            // Campos do formulário
            $this->setInput('text', 'name', 'name', 'Nome para cadastro', 50, 300, 'Nome');
            $this->setButton(50, 100, 'btnRegister', 'btnRegister', 'Cadastrar');
            $this->setButton(50, 100, 'btnClean', 'btnClean', 'Limpar');
            
            $baseViewAjax->setDataKey('form', $this->getContentForm());
        } catch (Exception $ex) {
            $baseViewAjax->setError($ex->getMessage());
        }
        
        echo json_encode($baseViewAjax->getData());
    }
    
    /**
     * Action: Formulário de telefone
     */
    public function telephoneForm()
    {
        try {
            $baseViewAjax = new BaseViewAjax();
            
            // Campos do formulário
            //$this->setInput('text', 'ddd', 'ddd', 'ddd do telefone', 50, 30, 'DDD');
            $this->setInput('text', 'telephoneNumber', 'telephoneNumber', 'Número de telefone', 50, 200, 'Telefone', 'telefone');
            $this->setButton(50, 35, 'btnAddTelephone', 'btnAddTelephone', '+');
            $this->setButton(50, 35, 'btnDelTelephone', 'btnDelTelephone', '-');
            
            $baseViewAjax->setDataKey('form', $this->getContentForm());
            
        } catch (Exception $ex) {
            $baseViewAjax->setError($ex->getMessage());
        }
        
        echo json_encode($baseViewAjax->getData());
    }
    
    public function emailForm()
    {
        try {
            $baseViewAjax = new BaseViewAjax();
        
            // Campos do formulário
            $this->setInput('email', 'dscEmail', 'dscEmail', 'Email', 50, 200, 'Email');
            $this->setButton(50, 35, 'btnAddEmail', 'btnAddEmail', '+');
            $this->setButton(50, 35, 'btnDelEmail', 'btnDelEmail', '-');
        
            $baseViewAjax->setDataKey('form', $this->getContentForm());
        
        } catch (Exception $ex) {
            $baseViewAjax->setError($ex->getMessage());
        }
        
        echo json_encode($baseViewAjax->getData());
    }

    /**
     * Action: contactSearch
     */
    public function contactSearch()
    {
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