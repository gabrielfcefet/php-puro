<?php
namespace Application\Src\BusinessRules;

use Application\Models\EmailModel;
use Application\Src\AppClass\Common;

/**
 * Classe de regras de negócio para Email
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 16/11/2017
 *       
 */
class EmailRules
{

    /**
     * Aplica as regras de negócio para o email do contato
     * 
     * @param EmailModel $emailModel            
     * @throws \Exception
     */
    public function insertContactEmailRules(EmailModel $emailModel)
    {
        
        // Valida se o email foi informado
        if (empty($emailModel->getEmail())) {
            throw new \Exception('Informe do email do contato!');
        }
        
        // Valida o formato do email
        if (! Common::EmailValidate($emailModel->getEmail())) {
            throw new \Exception("O email {$emailModel->getEmail()} é inválido!");
        }
        
        // Valida se o id do contato foi informado
        if (empty($emailModel->getContatoId())) {
            throw new \Exception('Informe o id do contato!');
        }
        
        // Verifica se o id do tipo de email foi informado
        if (empty($emailModel->getTipoEmailId())) {
            throw new \Exception('Informe o id do tipo de email!');
        }
    }
}