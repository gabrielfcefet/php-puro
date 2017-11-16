<?php
namespace Application\Src\DataAccess;

use Application\Src\Abstracts\BaseDataAccess;
use Application\Models\EmailModel;

/**
 * Classe de acesso ao banco de dados.
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 16/11/2017
 *       
 */
class EmailAccess extends BaseDataAccess
{

    /**
     * Método de inserção de emails
     *
     * @param EmailModel $emailModel            
     * @return \Application\Src\Abstracts\statement
     */
    public function insert(EmailModel $emailModel)
    {
        $params = [
            'email' => $emailModel->getEmail(),
            'contatoId' => $emailModel->getContatoId(),
            'tipoEmailId' => $emailModel->getTipoEmailId()
        ];
        
        return $this->executeQuery('insert into email (email, contato_id, tipos_email_id)
                                               values (:email, :contatoId, :tipoEmailId)', $params);
    }
}