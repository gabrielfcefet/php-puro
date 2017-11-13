<?php
namespace Application\Src\BusinessRules;

use Application\Models\ContatoModel;

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
     * @param ContatoModel $contatoModel            
     * @throws \Exception
     */
    public function insertContactRules(ContatoModel $contatoModel)
    {
        if (empty($contatoModel->getNome())) {
            throw new \Exception('Informe o nome do contato!');
        }
    }
}