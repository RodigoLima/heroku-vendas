<?php

require_once(__DIR__ . '/../../templates/template-html.php');

require_once(__DIR__ . '/../../db/Db.php');
require_once(__DIR__ . '/../../model/Empresa.php');
require_once(__DIR__ . '/../../dao/DaoEmpresa.php');
require_once(__DIR__ . '/../../config/config.php');

$conn = Db::getInstance();

if (! $conn->connect()) {
    die();
}

$daoEmpresa = new DaoEmpresa($conn);
$empresa = $daoEmpresa->porId( $_POST['id'] );
    
if ( $empresa )
{  
  $empresa->setNome( $_POST['nome'] );
  $empresa->setCnpj( $_POST['cnpj'] );
  $empresa->setEndereco( $_POST['endereco'] );
  $empresa->setNumero( $_POST['numero'] );
  $empresa->setBairro( $_POST['bairro'] );
  $empresa->setCidade( $_POST['cidade'] );
  $empresa->setEstado( $_POST['estado'] );
  $empresa->setCep( $_POST['Cep'] );
  $empresa->setTelefone( $_POST['telefone'] );
  $empresa->setEmail( $_POST['email'] );
  $daoEmpresa->atualizar( $empresa );
}

header('Location: ./index.php');