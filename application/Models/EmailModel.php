<?php
namespace Application\Models;

/**
 * Classe model da tabela email
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 11/11/2017
 *       
 */
class EmailModel
{

    private $id;

    private $email;

    private $contatoId;

    private $tipoEmailId;

    /**
     * Método construtor
     *
     * @param int $id            
     * @param string $email            
     * @param int $contatoId            
     * @param int $tipoEmailId            
     */
    public function __construct(int $id = null, string $email = null, int $contatoId = null, int $tipoEmailId = null)
    {
        $this->id = $id;
        $this->email = $email;
        $this->contatoId = $contatoId;
        $this->tipoEmailId = $tipoEmailId;
    }
    
    //
    // GET METHODS
    //
    
    /**
     * Retorna o ID
     * 
     * @return \Application\Models\int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Retorna o email
     * 
     * @return \Application\Models\string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Retorna o ID do contato
     * 
     * @return \Application\Models\int
     */
    public function getContatoId()
    {
        return $this->contatoId;
    }
    
    /**
     * Retorna o ID do tipo do Email
     * @return \Application\Models\int
     */
    public function getTipoEmailId()
    {
        return $this->tipoEmailId;
    }
    
    //
    // SET METHODS
    //
    
    /**
     * Atribui o ID
     *
     * @param int $id
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }
    
    /**
     * Atribui o email
     *
     * @param string $email
     */
    public function setEmail(string $email)
    {
        $this->email = $email;
    }
    
    /**
     * Atribui o ID do contato
     *
     * @param int $contatoId
     */
    public function setContatoId(int $contatoId)
    {
        $this->contatoId = $contatoId;
    }
    
    /**
     * Atribui o ID do tipo do Email
     * @param int $tipoEmailId
     */
    public function setTipoEmailId(int $tipoEmailId)
    {
        $this->tipoEmailId = $tipoEmailId;
    }
}