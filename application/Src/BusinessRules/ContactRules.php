<?php
namespace Application\Src\BusinessRules;

use Application\Models\ContactModel;

/**
 * Classe das regras de negócio dos contatos.
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 13/11/2017
 */
class ContactRules
{

    /**
     * Aplica as regras de inserção de contatos na base
     *
     * @param ContactModel $contatoModel            
     * @throws \Exception
     */
    public function insertContactRules(ContactModel $contactModel)
    {
        if (empty($contactModel->getNome())) {
            throw new \Exception('Informe o nome do contato!');
        }
        
        if (strlen($contactModel->getNome()) < 2) {
            throw new \Exception('O nome do contato ter no mínimo 2 caracteres!');
        }
        
        if (!is_string($contactModel->getNome())) {
            throw new \Exception('O nome do contato não pode ser numérico!');
        }
    }
}