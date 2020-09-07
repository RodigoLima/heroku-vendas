<?php
require_once(__DIR__ . "/../db/Db.php");
require_once(__DIR__ . "/../model/Departamento.php");
require_once(__DIR__ . "/../model/Marca.php");
require_once(__DIR__ . "/../model/Produto.php");
require_once(__DIR__ . "/../model/Empresa.php");
require_once(__DIR__ . "/../dao/DaoDepartamento.php");
require_once(__DIR__ . "/../dao/DaoMarca.php");
require_once(__DIR__ . "/../dao/DaoProduto.php");
require_once(__DIR__ . "/../dao/DaoEmpresa.php");

$db = Db::getInstance();
if ($db->connect()) {
  $daoMarca = new DaoMarca($db);
  $daoProd = new DaoProduto($db);
  $daoDep  = new DaoDepartamento($db);
  $daoEmp  = new DaoEmpresa($db);

  $deps[]   = new Departamento("Eletrônicos");
  $deps[]   = new Departamento("Roupas");
  $deps[]   = new Departamento("Informática");
  $deps[]   = new Departamento("Som e imagem");
  $deps[]   = new Departamento("Gamers");
  $deps[]   = new Departamento("Alimentos");
  $deps[]   = new Departamento("Bebidas");
  $deps[]   = new Departamento("Acessórios automotivos");
  foreach($deps as $dep) $daoDep->inserir($dep);
  
  $emps[]   = new Empresa("ROBRACON RONDONOPOLIS BRASIL MATERIAIS P/ CONSTRUCAO LTDA", "06.937.383/0001-05","Avenida Josefa Machado de Rezende","2999","PARQUE SAGRADA FAMILIA","RONDONOPOLIS ","Mato Grosso","78735-000","(66) 3422-8878","vendasroo.robracon@grupovocical.com.br");
  $emps[]   = new Empresa("SANTA CASA DE MISERICORDIA E MATERNIDADE DE RONDONOPOLIS", "03.099.157/0001-04","Rua Acyr Rezende S. Silva","100","VILA BIRIGUI","RONDONOPOLIS ","Mato Grosso","78710-129","(66) 3410-2700","");
  $emps[]   = new Empresa("ATACADO CENTRAL COMERCIO E DISTRIBUICAO LTDA", "00.793.249/0001-00","Rua Joaquim Amancio Filho","163","DISTRITO INDUSTRIAL","RONDONOPOLIS ","Mato Grosso","78745-720","(66) 3422-5048","dep.fiscal@atacadocentralmt.com.br");
  foreach($emps as $emps) $daoEmp->inserir($emps);

  $marcas[] = new Marca("Sony");
  $marcas[] = new Marca("LG");
  $marcas[] = new Marca("Samsung");
  $marcas[] = new Marca("Asus");
  $marcas[] = new Marca("Acer");
  $marcas[] = new Marca("AOC");
  $marcas[] = new Marca("Xiaomi");
  $marcas[] = new Marca("Multilaser");
  foreach($marcas as $marca) $daoMarca->inserir($marca);

  $prods[] = new Produto("Monitor AOC 21.5", 500.55, 5, $marcas[5]);
  $prods[] = new Produto("Notebook Acer Aspire", 5000, 2, $marcas[4]);
  $prods[] = new Produto("Tablet Multilaser 10p", 200, 20, $marcas[7]);
  foreach($prods as $prod) $daoProd->inserir($prod);

  $daoProd->sincronizarDepartamentos($prods[0], [
    $deps[0]->getId(), $deps[2]->getId(), $deps[3]->getId()
  ]);
  $daoProd->sincronizarDepartamentos($prods[1], [
    $deps[0]->getId(), $deps[2]->getId(), $deps[3]->getId(), $deps[4]->getId()
  ]);
  $daoProd->sincronizarDepartamentos($prods[2], [
    $deps[0]->getId(), $deps[3]->getId()
  ]);
}
exit;