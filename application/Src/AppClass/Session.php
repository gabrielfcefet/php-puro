<?php
namespace Application\Src\AppClass;

use Application\Models\Usuario;

/**
 * Classe de gerenciamento de sessão
 * 
 * @author Gabriel de Figueiredo Corrêa
 * @since 01/10/2017
 *       
 */
class Session
{
    /**
     * Criar a sessão do usuário.
     * 
     * @param Usuario $usuario            
     */
    public static function criar(Usuario $usuario)
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            
            session_start();
            
            $_SESSION['ID'] = $usuario->getId();
            $_SESSION['NOME'] = $usuario->getUser();
        }
    }

    /**
     * Encerra a sessão do usuário.
     */
    public static function encerrar()
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
            session_destroy();
        }
    }
    
    /**
     * Valida se a sessão está ativa
     */
    public static function validate()
    {
        session_start();
        
        if (!isset($_SESSION['ID'])) {
            header("Location:/");
        }
    }
}