<?php

namespace App\Model;

use App\Database\Database;

class ClienteRepository{
    
    private $conexao;

    public function __construct(){
        $this->conexao = Database::getInstance();
    }

    public function Cadastrar($cliente){

        $query = "INSERT INTO clientes (nome, email, cidade, estado) VALUES (?, ?, ?, ?)";
        $params = [$cliente->getNome(), $cliente->getEmail(), $cliente->getCidade(), $cliente->getEstado()];
        $this->conexao->execute($query, $params);
    }

    public function Listar(){
        $query = "SELECT * FROM clientes";
        return $this->conexao->fetchAll($query);
    }

    public function LerPorID($cliente_id){
        $query = "SELECT * FROM clientes WHERE cliente_id = ?";
        $params = [$cliente_id];
        return $this->conexao->fetch($query, $params);
    }

    public function Atualizar($cliente){
        $query = "UPDATE clientes SET nome = ?, email = ?, cidade = ?, estado = ? WHERE cliente_id = ?";
        $params = [$cliente->getNome(), $cliente->getEmail(), $cliente->getCidade(), $cliente->getEstado(), $cliente->getClienteID()];
        $this->conexao->execute($query, $params);
    }

    public function Remover($cliente_id){
        $query = "DELETE FROM clientes WHERE cliente_id = ?";
        $params = [$cliente_id];
        $this->conexao->execute($query, $params);
    }
}
