<?php
namespace Application\Src\AppClass;

/**
 * Classe com métodos comuns
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 15/11/2017
 *       
 */
class Common
{

    /**
     * Retira os caracteres especiais de uma string
     *
     * @param string $value            
     * @return string
     */
    public static function RemoveSpecialCharacters(string $value)
    {
        $especialCharacters = [
            '(' => '',
            ')' => '',
            '-' => ''
        ];
        
        return strtr($value, $especialCharacters);
    }

    /**
     * Valida o formato do telefone
     *
     * @param string $telephone            
     * @return boolean
     */
    public static function TelephoneValidate(string $telephone)
    {
        return preg_match('^\(+[0-9]{2,3}\) [0-9]{4,5}-[0-9]{4}$^', $telephone);
    }

    /**
     * Valida o formato do email
     * 
     * @param string $email            
     * @return boolean
     */
    public static function EmailValidate(string $email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }
}