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
class FormContatoController extends Form
{
    /**
     * Action que monta os formulários de contato 
     */
    public function formsContact() 
    {
        try {
            $form = $_POST['option'];
            
            $baseViewAjax = new BaseViewAjax();
            
            switch ($form) {
                case 'btnRegister':{ 
                    $this->setButton(50, 100, 'btnRegister', 'btnRegister', 'Cadastrar'); 
                    break;
                }
                case 'btnSave':{
                    $this->setButton(50, 100, 'btnSave', 'btnSave', 'Salvar');
                    break;
                }
                case 'btnClean':{
                    $this->setButton(50, 100, 'btnClean', 'btnClean', 'Limpar');
                    break;
                }
                case 'contactForm':{ 
                    // Campos do formulário
                    $this->setInput('text', 'name', 'name', 'Nome para cadastro', 50, 300, 'Nome');
                    break;
                }
                case 'telephoneForm':{ 
                    // Campos do formulário
                    $this->setInput('text', 'telephoneNumber', 'telephoneNumber', 'Número de telefone', 50, 110, 'Telefone', 'telefone');
                    $this->setButton(50, 35, 'btnAddTelephone', 'btnAddTelephone', '+');
                    $this->setButton(50, 35, 'btnDelTelephone', 'btnDelTelephone', '-');
                    break;
                }
                case 'emailForm':{ 
                    // Campos do formulário
                    $this->setInput('email', 'dscEmail', 'dscEmail', 'Email', 50, 200, 'Email');
                    $this->setButton(50, 35, 'btnAddEmail', 'btnAddEmail', '+');
                    $this->setButton(50, 35, 'btnDelEmail', 'btnDelEmail', '-');
                    break;
                }
                case 'searchForm':{ 
                    // Campos do formulário
                    $this->setInput('text', 'contatoId', 'contatoId', 'Id do contato', 50, 50, 'ID');
                    $this->setInput('text', 'name', 'name', 'Nome para cadastro', 50, 300, 'Nome');
                    $this->setInput('text', 'telephoneNumber', 'telephoneNumber', 'Número de telefone', 50, 300, 'Telefone', 'telefone');
                    $this->setInput('email', 'dscEmail', 'dscEmail', 'Email', 50, 300, 'Email');
                    $this->setButton(50, 100, 'btnSearch', 'btnSearch', 'Pesquisar');
                    $this->setButton(50, 100, 'btnClean', 'btnClean', 'Limpar');
                    break;
                }
            }
            
            $baseViewAjax->setDataKey('form', $this->getContentForm());
            
        } catch (Exception $e) {
            $baseViewAjax->setError($e->getMessage());
        }
        
        echo json_encode($baseViewAjax->getData());
    }
}