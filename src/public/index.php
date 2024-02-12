<?php

require_once __DIR__ . '/../../vendor/autoload.php';

use Jean\ControleClientes\Database\Database;

echo "Arquivo Index<br>";
echo __DIR__;
echo "<br>";

Database::setConn();