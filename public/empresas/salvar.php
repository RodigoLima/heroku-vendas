<?php

require_once(__DIR__ . '/../../db/Db.php');
require_once(__DIR__ . '/../../model/Empresa.php');
require_once(__DIR__ . '/../../dao/DaoEmpresa.php');
require_once(__DIR__ . '/../../config/config.php');

$conn = Db::getInstance();

if (! $conn->connect()) {
    die();
}

$daoEmpresa = new DaoEmpresa($conn);
$daoEmpresa->inserir(new Empresa($_POST['nome'],$_POST['cnpj'],$_POST['endereco'],$_POST['numero'],$_POST['bairro'],$_POST['cidade'],$_POST['estado'],$_POST['Cep'],$_POST['telefone'],$_POST['email']));
    
header('Location: ./index.php');

?>


