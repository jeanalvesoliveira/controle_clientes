<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Jean\ControleClientes\Controllers\ClienteController;
use Jean\ControleClientes\Models\Cliente;

$controller = new ClienteController();

// $cliente0 = new Cliente(null, "Outro teste doido parte II", "01543279984", "Rua Abdo Zaharam", "31920064545", "alessandrafariacosta@gmail.com");
// $controller->insert($cliente0);

//$cliente = ClienteController::findById(1);

//var_dump($cliente);

/*
foreach(ClienteController::findAll() as $cliente){
    var_dump($cliente);
}
*/

// retornando um cliente
// $cliente = $controller->findById(4);
// var_dump($cliente);

//fazendo algumas modificações para depois atualizar o registro no banco
// $cliente->setNome('Jean Alves de Oliveira3');
// $cliente->setEmail('jeanalvesoliveira@yahoo.com.br');

// echo "novo objeto<br>";
// var_dump($cliente);

// $controller->update($cliente);

// $cliente2 = $controller->findById(4);
// var_dump($cliente2);

// $controller->delete(21);