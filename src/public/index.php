<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Jean\ControleClientes\Controllers\ClienteController;
use Jean\ControleClientes\Models\Cliente;

$controller = new ClienteController();

$cliente = new Cliente(null, 'Jean', '45645678933', 'Rua tal', '31920052323', 'email@gmail.com');

$controller->insert($cliente);