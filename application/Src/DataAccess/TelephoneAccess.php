<?php
namespace Application\Src\DataAccess;

use Application\Src\Abstracts\BaseDataAccess;
use Application\Models\TelephoneModel;

/**
 * Classe de acesso ao banco de dados.
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 15/11/2017
 *       
 */
class TelephoneAccess extends BaseDataAccess
{

    /**
     * Método de inserção de telefones
     * 
     * @param TelephoneModel $telephoneModel            
     * @return \Application\Src\Abstracts\statement
     */
    public function insert(TelephoneModel $telephoneModel)
    {
        $params = [
            'telefone' => $telephoneModel->getTelephone(),
            'contatoId' => $telephoneModel->getContatoId(),
            'tiposTelephoneId' => $telephoneModel->getTipoTelephoneId()
        ];
        
        return $this->executeQuery('insert into telefone (telefone, contato_id, tipos_telefone_id)
                                                  values (:telefone, :contatoId, :tiposTelephoneId)', $params);
    }
}