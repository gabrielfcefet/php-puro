<?php
namespace Application\Src\DataAccess;

use Application\Src\Abstracts\BaseDataAccess;
use Application\Models\ContactModel;

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
     * @param ContactModel $contactModel            
     * @return \Application\Src\Abstracts\statement
     */
    public function insert(ContactModel $contactModel)
    {
        $params = [
            'nome' => $contactModel->getNome()
        ];
        
        return $this->executeQuery('insert into contato (nome)
                                                 values (:nome)', $params);
    }

    /**
     * Retorna os contatos cadastrados
     * 
     * @return \Application\Src\Abstracts\statement
     */
    public function list()
    {
        return $this->executeQuery('select id,
                                           nome
                                      from contato
                                  order by id');
    }
}