<?php
namespace Application\Src\DataAccess;

use Application\Src\Abstracts\BaseDataAccess;
use Application\Models\ContatoModel;

/**
 * Classe de acesso ao banco de dados.
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 13/11/2017
 */
class ContactAccess extends BaseDataAccess
{

    /**
     * Insere o contato na base
     * 
     * @param ContatoModel $contactModel            
     * @return \Application\Src\Abstracts\statement
     */
    public function insert(ContatoModel $contactModel)
    {
        $params = [
            'nome' => $contactModel->getNome()
        ];
        
        return $this->executeQuery('insert into contato (nome)
                                                 values (:nome)', $params);
    }
}