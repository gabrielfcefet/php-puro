<?php
namespace Application\Src\BusinessRules;

use Application\Models\TelephoneModel;
use Application\Src\AppClass\Common;

/**
 * Classe das regras de negócios para telefone
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 15/11/2017
 *       
 */
class TelephoneRules
{

    /**
     * Valida o número de telefone do contato
     *
     * @param TelephoneModel $telephoneModel            
     * @throws \Exception
     */
    public function insertContactTelephoneRules(TelephoneModel $telephoneModel)
    {
        // Valida se o telefone foi informado
        if (empty($telephoneModel->getTelephone())) {
            throw new \Exception('Informe o número de telefone do contato!');
        }
        
        // Valida o formato do telefone
        if (!Common::TelephoneValidate($telephoneModel->getTelephone())) {
            throw new \Exception("O número de telefone {$telephoneModel->getTelephone()} é inválido!");
        }
        
        // Valida se o id do contato foi informado
        if (empty($telephoneModel->getContatoId())) {
            throw new \Exception('Informe o código do contato!');
        }
        
        // Valida se o id do tipo do telefone foi informado
        if (empty($telephoneModel->getTipoTelephoneId())) {
            throw new \Exception('Informe o tipo de telefone!');
        }
    }
}