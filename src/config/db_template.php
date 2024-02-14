<?php
/*
    COPIE E COLE ESTE ARQUIVO NESTA PASTA COM O NOME db.php
    E ADICIONE SUAS CONFIGURAÇÕES DE ACESSO AO BANCO DE DADOS
*/

$config = [
    "host"      => "",
    "port"      => "",
    "database"  => "",
    "user"      => "",
    "password"  => "",
    "options"   => [
        PDO::ATTR_TIMEOUT => 5,
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_EMULATE_PREPARES   => false,
        PDO::MYSQL_ATTR_FOUND_ROWS   => true,
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,

    ]
];
