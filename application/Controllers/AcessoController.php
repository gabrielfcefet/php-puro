<?php
namespace Application\Controllers;

use Application\Models\UsuarioModel;
use Application\Src\BusinessRules\UsuarioRules;
use Application\Src\DataAccess\UsuarioAccess;
use Application\Src\AppClass\BaseViewAjax;
use Application\Src\AppClass\Session;

/**
 * Classe de autenticação
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 30/09/2017
 */
class AcessoController
{

    /**
     * Action: autenticar
     * 
     * Valida o usuário informado pelo usuário.
     */
    public function autenticar()
    {
        try {
            $baseViewAjax = new BaseViewAjax();
            $usuario = new UsuarioModel(null, $_POST['username'], $_POST['password']);
            
            // Verifica se as credenciais foram informadas.
            $usuarioRules = new UsuarioRules();
            $usuarioRules->autenticarLogin($usuario);
            
            // Verifica se o usuário existe no banco de dados.
            $usuarioAccess = new UsuarioAccess();
            $autenticarUsuario = $usuarioAccess->autenticar($usuario);
            
            if (! empty($autenticarUsuario)) {
                
                // Cria a sessão do usuário
                $result = $usuarioAccess->buscar($autenticarUsuario);
                $rows = $result->fetchAll();
                
                foreach ($rows as $row) {
                    $objUsuario = new UsuarioModel($row['id'], $row['nome'], null);
                }
                
                Session::criar($objUsuario);
                
                // Cria o retorno json
                $baseViewAjax->setDataKey('SUCESSO', true);
                $baseViewAjax->setRedirect('/admin');
            } else {
                $baseViewAjax->setDataKey('SUCESSO', false);
                $baseViewAjax->setError('Credenciais inválidas!');
            }
        } catch (\Exception $e) {
            $baseViewAjax->setError($e->getMessage());
        }
        
        // Retorna json
        echo json_encode($baseViewAjax->getData());
    }

    /**
     * Action: logout
     * 
     * Realiza o logout do usuário. 
     */
    public function logout()
    {
        Session::encerrar();
        header("Location: /");
    }
}