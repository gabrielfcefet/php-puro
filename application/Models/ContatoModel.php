<?php
namespace Application\Models;

/**
 * Classe model da tabela contato
 *
 * @author Gabriel de Figueiredo Corrêa
 * @since 10/11/2017
 *       
 */
class ContatoModel
{

    private $id;

    private $nome;

    /**
     * Método construtor
     *
     * @param int $id            
     * @param string $nome            
     */
    public function __construct(int $id = null, string $nome = null)
    {
        $this->id = $id;
        $this->nome = $nome;
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
     * Retorna o nome
     *
     * @return \Application\Models\string
     */
    public function getNome()
    {
        return $this->nome;
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
     * Atribui o nome
     *
     * @param string $nome
     */
    public function setNome(string $nome)
    {
        $this->nome = $nome;
    }
}