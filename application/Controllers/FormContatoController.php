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
                    // Botão do formulário
                    $this->setButton(50, 100, 'btnRegister', 'btnRegister', 'Cadastrar', 'btnRegister'); 
                    break;
                }
                case 'btnSave':{
                    // Botão do formulário
                    $this->setButton(50, 100, 'btnSave', 'btnSave', 'Salvar', 'btnSave');
                    break;
                }
                case 'btnClean':{
                    // Botão do formulário
                    $this->setButton(50, 100, 'btnClean', 'btnClean', 'Limpar', 'btnClean');
                    break;
                }
                case 'contactForm':{ 
                    // Campos do formulário
                    $this->setInput('text', 'name', 'name', 'Nome para cadastro', 50, 220, 'Nome', 'name');
                    break;
                }
                case 'telephoneForm':{ 
                    // Campos do formulário
                    $this->setInput('text', 'telephoneNumber', 'telephoneNumber[]', 'Número de telefone', 50, 110, 'Telefone', 'telefone telephoneNumber');
                    $this->setSelect(['Selecione'], 'telephoneType', 'telephoneType[]', 50, 109, 'Tipo de telefone');
                    $this->setButton(50, 35, 'btnAddTelephone', 'btnAddTelephone', '+', 'btnAddTelephone btn btn-success');
                    $this->setButton(50, 35, 'btnDelTelephone', 'btnDelTelephone', '-', 'btnDelTelephone btn btn-danger');
                    break;
                }
                case 'emailForm':{ 
                    // Campos do formulário
                    $this->setInput('email', 'dscEmail', 'dscEmail[]', 'Email', 50, 180, 'Email');
                    $this->setSelect(['Selecione'], 'emailType', 'emailType[]', 50, 109, 'Tipo de email');
                    $this->setButton(50, 35, 'btnAddEmail', 'btnAddEmail', '+', 'btnAddEmail btn btn-success');
                    $this->setButton(50, 35, 'btnDelEmail', 'btnDelEmail', '-', 'btnDelEmail btn btn-danger');
                    break;
                }
                case 'searchForm':{ 
                    // Campos do formulário
                    $this->setInput('text', 'contatoId', 'contatoId', 'Id do contato', 50, 50, 'ID');
                    $this->setInput('text', 'name', 'name', 'Nome para cadastro', 50, 300, 'Nome');
                    $this->setInput('text', 'telephoneNumber', 'telephoneNumber', 'Número de telefone', 50, 300, 'Telefone', 'telefone');
                    $this->setInput('email', 'dscEmail', 'dscEmail', 'Email', 50, 300, 'Email');
                    $this->setButton(50, 100, 'btnSearch', 'btnSearch', 'Pesquisar', 'btnSearch');
                    $this->setButton(50, 100, 'btnClean', 'btnClean', 'Limpar', 'btnClean');
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