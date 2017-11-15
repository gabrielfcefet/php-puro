<?php
namespace Application\Controllers;

use Application\Src\AppClass\BaseViewAjax;
use Application\Models\ContactModel;
use Application\Models\TelephoneModel;
use Application\Src\Abstracts\BaseDataAccess;
use Application\Src\BusinessRules\ContactRules;
use Application\Src\DataAccess\ContactAccess;
use Application\Src\AppClass\Common;
use Application\Src\BusinessRules\TelephoneRules;
use Application\Src\DataAccess\TelephoneAccess;

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
            $contactModel = new ContactModel(null, $_POST['name']);
            
            // Valida os dados do contato
            $contactRules = new ContactRules();
            $contactRules->insertContactRules($contactModel);
            
            // Insere o contato na base
            $contactAccess = new ContactAccess();
            $contactAccess->insert($contactModel);
            
            // Capturando o ID do contato inserido
            $contactModel->setId(BaseDataAccess::getLastInsertId());
            
            /* Telefone do contato */
            foreach ($_POST['telephoneNumber'] as $key => $value){
                // Verifica se um telefone foi informado
                if (!empty($value)) {
                    // Monta o objeto do telefone
                    $telephoneModel = new TelephoneModel(null, $value, $contactModel->getId(), $_POST['telephoneType'][$key]);
                    
                    // Valida o telefone informado
                    $telephoneRules = new TelephoneRules();
                    $telephoneRules->insertContactTelephoneRules($telephoneModel);
                    
                    // Retira os caracteres especiais do número de telefone
                    $telephoneModel->setTelephone(Common::RemoveSpecialCharacters($value));
                    
                    // Insere o telefone do contato na base de dados
                    $telephoneAccess = new TelephoneAccess();
                    $telephoneAccess->insert($telephoneModel);
                }
            }
            
            /* Email do contato */
                
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