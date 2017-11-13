<?php
namespace Application\Src\DataAccess;

use Application\Src\Abstracts\BaseDataAccess;

/**
 * Classe de acesso ao banco de dados.
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 13/11/2017
 */
class TiposEmailAccess extends BaseDataAccess
{

    /**
     * Retorna os tipos de email
     * 
     * @return \Application\Src\Abstracts\statement
     */
    public function list()
    {
        return $this->executeQuery('select id,
                                    	   tipo_email
                                      from tipos_email');
    }
}