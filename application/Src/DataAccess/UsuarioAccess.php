<?php
namespace Application\Src\DataAccess;

use Application\Src\Abstracts\BaseDataAccess;
use Application\Models\Usuario;

/**
 * Classe de acesso ao banco de dados. 
 * @author Gabriel de Figueiredo Corrêa
 * @since 01/10/2017
 */
class UsuarioAccess extends BaseDataAccess
{
    /**
     * Validação das credenciais do usuário.
     * @param Usuario $usuario
     * @return \Application\Src\Abstracts\string
     */
    public function autenticar(Usuario $usuario) {
        $params = [
            'USER' => $usuario->getUser(),
            'PASSWORD' => $usuario->getPassword()
        ];
        
        return $this->getOne('select id 
                                from usuario
                               where nome = :USER
                                 and senha = :PASSWORD
                                 and status = 1', $params);
    }
    
    /**
     * Busca por um usuárui específico.
     * @param int $id
     * @return \Application\Src\Abstracts\statement
     */
    public function buscar(int $id) {
        $params = ['ID' => $id];
        
        return $this->executeQuery('select id,
                                    	   nome,
                                    	   senha,
                                           status
                                      from usuario
                                     where id = :ID', $params);
    }
}