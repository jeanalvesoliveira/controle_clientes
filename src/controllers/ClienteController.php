<?php
namespace Jean\ControleClientes\Controllers;

use PDO, PDOException;
use Jean\ControleClientes\Database\Database;
use Jean\ControleClientes\Models\Cliente;

class ClienteController{
    private const TABLE = 'tb_clientes';
    private $conn = null;

    public function __construct(){
        Database::setConn();
        $this->conn = Database::getConn();
    }


    public function insert(Cliente $cliente){
        var_dump($this->conn);
        $dadosInsert = [
            "nome"      =>$cliente->getNome(),
            "cpf"       =>$cliente->getCpf(),
            "endereco"  =>$cliente->getEndereco(),
            "telefone"  =>$cliente->getTelefone(),
            "email"     =>$cliente->getEmail()            
        ];

        $query = "INSERT INTO ".self::TABLE." (nome, cpf, endereco, telefone, email) VALUES (:nome, :cpf, :endereco, :telefone, :email)";

        // realizando o insert na tabela
        try {
            // prepara a query através do método prepare(), que retorna um objeto do tipo Prepared Statement
            $stmt = $this->conn->prepare($query);

            // utilizando o método bindParam() para informar valores dinamicamente para uma requisição SQL.
            $stmt->bindParam(":nome"        ,$dadosInsert["nome"]);
            $stmt->bindParam(":cpf"         ,$dadosInsert["cpf"]);
            $stmt->bindParam(":endereco"    ,$dadosInsert["endereco"]);
            $stmt->bindParam(":telefone"    ,$dadosInsert["telefone"]);
            $stmt->bindParam(":email"       ,$dadosInsert["email"]);

            // executa o insert
            $stmt->execute();

            echo "Dados inseridos com sucesso!<br>";
        } catch (PDOException $e) {
            echo "Erro no insert dos dados: {$e->getMessage()}<br>";
        }
        $stmt = null;
    }


    public function findById($id){
        $query = "SELECT id, nome, cpf, endereco, telefone, email FROM ".self::TABLE." WHERE id = :id";

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();            
        } catch (PDOException $e) {
            echo "Erro ao consultar o Cliente: {$e->getMessage()}";
            return null;
        }
        $queryResult = $stmt->fetch(PDO::FETCH_ASSOC);
        if(!$queryResult) {
            return "Cliente não encontrado";
        }
        return new Cliente(
            $queryResult['id'],
            $queryResult['nome'],
            $queryResult['cpf'],
            $queryResult['endereco'],
            $queryResult['telefone'],
            $queryResult['email']
        );
        $stmt = null;
    }

    
    public function findAll(){
        $query = "SELECT * FROM ".self::TABLE;

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro ao consultar os Clientes: {$e->getMessage()}";
            return null;
        }
        $clientes = [];        
        foreach($stmt->fetchAll(PDO::FETCH_ASSOC) as $row){
            array_push($clientes, new Cliente(
                $row['id'],
                $row['nome'],
                $row['cpf'],
                $row['endereco'],
                $row['telefone'],
                $row['email'])
            );
        }
        return $clientes;
        $stmt = null;     
    }


    public function update(Cliente $cliente){
        $dadosUpdate = [
            "id"        =>$cliente->getId(),
            "nome"      =>$cliente->getNome(),
            "cpf"       =>$cliente->getCpf(),
            "endereco"  =>$cliente->getEndereco(),
            "telefone"  =>$cliente->getTelefone(),
            "email"     =>$cliente->getEmail()            
        ];

        $query = "UPDATE ".self::TABLE." SET nome = :nome, cpf = :cpf, endereco = :endereco, telefone = :telefone, email = :email WHERE id = :id";

        try {
            $stmt = $this->conn->prepare($query);

            $stmt->bindParam(":nome"        ,$dadosUpdate["nome"]);
            $stmt->bindParam(":cpf"         ,$dadosUpdate["cpf"]);
            $stmt->bindParam(":endereco"    ,$dadosUpdate["endereco"]);
            $stmt->bindParam(":telefone"    ,$dadosUpdate["telefone"]);
            $stmt->bindParam(":email"       ,$dadosUpdate["email"]);
            $stmt->bindParam(":id"          ,$dadosUpdate["id"]);

            $stmt->execute();
            echo "Dados atualizados com sucesso!";
        } catch (PDOException $e) {
            echo "Erro na atualização dos dados: {$e->getMessage()}";
        }
        return $stmt->rowCount();
        $stmt = null;      
    }


    public function delete($id) {
        if($this->findById($id) == "Cliente não encontrado"){
            echo "Cliente não encontrado";
            return;
        }
        $query = "DELETE FROM ".self::TABLE." WHERE id = :id";

        try {
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(":id", $id);
            $stmt->execute();
            echo "Registro excluído com sucesso!";            
        } catch (PDOException $e) {
            echo "Erro ao excluir o registro: {$e->getMessage()}";
        }
    }    
}