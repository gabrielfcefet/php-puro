<?php
namespace Application\Src\BusinessRules;

use Application\Models\UsuarioModel;

/**
 * Classe das regras de negócio dos Usuários.
 *
 * @author gabriel
 * @since 01/10/2017
 */
class UsuarioRules
{

    /**
     * Verifica se as credenciais do usuário foram informadas.
     *
     * @param UsuarioModel $usuario            
     * @throws \Exception
     */
    public function autenticarLogin(UsuarioModel $usuario)
    {
        if (empty($usuario->getUser())) {
            throw new \Exception("Informe o nome de usuário!");
        }
        
        if (empty($usuario->getPassword())) {
            throw new \Exception("Informe a senha do usuário");
        }
    }
}