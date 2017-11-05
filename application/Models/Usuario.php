<?php
namespace Application\Models;

/**
 * Classe de usuário
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 01/10/2017
 */
class Usuario
{

    private $id;

    private $user;

    private $password;

    /**
     * Método construtor
     *
     * @param int $id            
     * @param string $user            
     * @param string $password            
     */
    public function __construct(int $id = null, string $user = null, string $password = null)
    {
        $this->id = $id;
        $this->user = $user;
        $this->password = $password;
    }
    
    //
    // GET METHODS
    //
    
    /**
     * Retorna o ID do usuário.
     *
     * @return \Application\Models\int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Retorna o nome do usuário.
     *
     * @return \Application\Models\string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Retorna a senha do usuário.
     *
     * @return \Application\Models\string
     */
    public function getPassword()
    {
        return $this->password;
    }
    
    //
    // SET METHODS
    //
    
    /**
     * Atribui o ID do usuário.
     * 
     * @param int $id            
     */
    public function setId(int $id)
    {
        $this->id = $id;
    }

    /**
     * Atribui o nome do usuário.
     * 
     * @param string $user            
     */
    public function setUser(string $user)
    {
        $this->user = $user;
    }

    /**
     * Atribui a senha do usuário.
     * 
     * @param string $password            
     */
    public function setPassword(string $password)
    {
        $this->password = $password;
    }
}