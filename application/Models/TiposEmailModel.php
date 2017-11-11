<?php
namespace Application\Models;

/**
 * Classe Model da tabela tipos_email
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 10/11/2017
 */
class TiposEmailModel
{

    private $id;

    private $tipoEmail;

    /**
     * Método construtor
     *
     * @param int $id            
     * @param string $tipoEmail            
     */
    public function __construct(int $id = null, string $tipoEmail = null)
    {
        $this->id = $id;
        $this->tipoEmail = $tipoEmail;
    }
    
    //
    // GET METHODS
    //
    
    /**
     * Retorna o ID
     *
     * @return \Application\Models\int
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * Retorna o tipo de email
     *
     * @return \Application\Models\string
     */
    function getTipoEmail()
    {
        return $this->tipoEmail;
    }
    
    //
    // SET METHODS
    //
    
    /**
     * Atribui o ID
     * 
     * @param int $id            
     */
    function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * Atribui o tipo do email
     * 
     * @param string $tipoEmail            
     */
    function setTipoEmail(string $tipoEmail)
    {
        $this->tipoEmail = $tipoEmail;
    }
}