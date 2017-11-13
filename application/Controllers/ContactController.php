<?php
namespace Application\Controllers;

use Application\Src\AppClass\BaseViewAjax;
use Application\Models\ContatoModel;
use Application\Models\TelefoneModel;
use Application\Src\Abstracts\BaseDataAccess;
use Application\Src\BusinessRules\ContactRules;
use Application\Src\DataAccess\ContactAccess;

/**
 * Classe controller de gerenciamento de contatos
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 13/11/2017
 */
class ContactController
{
    /**
     * Action: Insere contatos
     */
    public function insert() {
        try {
            $baseViewAjax = new BaseViewAjax();
            
            // Iniciando a transação
            BaseDataAccess::startTransaction();
            
            // Criando o objeto de um usuário
            $contatoModel = new ContatoModel();
            $contatoModel->setNome($_POST['name']);
            
            // Valida os dados do contato
            $contactRules = new ContactRules();
            $contactRules->insertContactRules($contatoModel);
            
            // Insere o contato na base
            $contactAccess = new ContactAccess();
            $contactAccess->insert($contactModel);
            
            // Capturando o ID do contato inserido
            $contatoModel->setId(BaseDataAccess::getLastInsertId());
            
            foreach ($_POST['telephoneNumber'] as $key => $value){
                $telefoneModel = new TelefoneModel(null, $value, $contatoModel->getId(), $_POST['telephoneType'][$key]);
                // CONTINUAR
            }
                
            $telefoneModel = new TelefoneModel();
            
            // Cria o retorno json
            $baseViewAjax->setDataKey('SUCESSO', true);
            
            BaseDataAccess::commitTransaction();
            
        } catch (Exception $e) {
            $baseViewAjax->setError($e->getMessage());
            BaseDataAccess::rollbackTransaction();
        }
        
        // Retorna json
        echo json_encode($baseViewAjax->getData());
    }
}