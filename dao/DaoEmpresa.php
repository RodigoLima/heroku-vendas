<?php 
require_once(__DIR__ . '/../model/Empresa.php');
require_once(__DIR__ . '/../db/Db.php');

// Classe para persistencia de Empresa 
// DAO - Data Access Object
class DaoEmpresa {
    
  private $connection;

  public function __construct(Db $connection) {
      $this->connection = $connection;
  }
  
  public function porId(int $id): ?Empresa {
    $sql = "SELECT nome,cnpj,endereco,numero,bairro,cidade,estado,cep,telefone,email FROM empresas where empresa_id = ?";
    $stmt = $this->connection->prepare($sql);
    $emp = null;
    if ($stmt) {
      $stmt->bind_param('i',$id);
      if ($stmt->execute()) {
        $stmt->bind_result($nome,$cnpj,$endereco,$numero,$bairro,$cidade,$estado,$cep,$telefone,$email);
        $stmt->store_result();
        if ($stmt->num_rows == 1 && $stmt->fetch()) {
          $emp = new Empresa($nome,$cnpj,$endereco,$numero,$bairro,$cidade,$estado,$cep,$telefone,$email,$id);
        }
      }
      $stmt->close();
    }
    return $emp;
  }

  public function inserir(Empresa $empresa): bool {
    $sql = "INSERT INTO empresas (nome,cnpj,endereco,numero,bairro,cidade,estado,cep,telefone,email) VALUES(?,?,?,?,?,?,?,?,?,?)";
    $stmt = $this->connection->prepare($sql);
    $res = false;
    if ($stmt) {
    $nome = $empresa->getNome();
	  $cnpj = $empresa->getCnpj();
    $endereco = $empresa->getEndereco();
	  $numero = $empresa->getNumero();
	  $bairro = $empresa->getBairro();
	  $cidade = $empresa->getCidade();
    $estado = $empresa->getEstado();
    $cep = $empresa->getCep();
	  $telefone = $empresa->getTelefone();
	  $email =$empresa->getEmail();
	  $stmt->bind_param('ssssssssss', $nome,$cnpj,$endereco,$numero,$bairro,$cidade,$estado,$cep,$telefone,$email);
      if ($stmt->execute()) {
          $id = $this->connection->getLastID();
          $empresa->setId($id);
          $res = true;
      }
      $stmt->close();
    }
    return $res;
  }

  public function remover(Empresa $empresa): bool {
    $sql = "DELETE FROM empresas where empresa_id=?";
    $id = $empresa->getId(); 
    $stmt = $this->connection->prepare($sql);
    $ret = false;
    if ($stmt) {
      $stmt->bind_param('i',$id);
      $ret = $stmt->execute();
      $stmt->close();
    }
    return $ret;
  }

  public function atualizar(Empresa $empresa): bool {
    $sql = "UPDATE empresas SET nome = ?,cnpj = ? ,endereco = ? ,numero = ?,bairro = ?,cidade = ?,estado = ?,cep = ?,telefone = ?,email = ?  WHERE empresa_id = ?";
    $stmt = $this->connection->prepare($sql);
    $ret = false;      
    if ($stmt) {
      $id   = $empresa->getId();
      $nome = $empresa->getNome();
      $cnpj = $empresa->getCnpj();
      $endereco = $empresa->getEndereco();
      $numero = $empresa->getNumero();
      $bairro = $empresa->getBairro();
      $cidade = $empresa->getCidade();
      $cep = $empresa->getCep();
      $estado = $empresa->getEstado();
      $telefone = $empresa->getTelefone();
      $email =$empresa->getEmail();
      $stmt->bind_param('ssssssssssi', $nome,$cnpj,$endereco,$numero,$bairro,$cidade,$estado,$cep,$telefone,$email,$id);
      $ret = $stmt->execute();
      $stmt->close();
    }
    return $ret;
  }

  
  public function todos(): array {
    $sql = "SELECT empresa_id,nome,cnpj,endereco,numero,bairro,cidade,estado,cep,telefone,email from empresas";
    $stmt = $this->connection->prepare($sql);
    $empresas = [];
    if ($stmt) {
      if ($stmt->execute()) {
        $id = 0; $nome; 
        $stmt->bind_result($id, $nome,$cnpj,$endereco,$numero,$bairro,$cidade,$estado,$cep,$telefone,$email);
        $stmt->store_result();
        while($stmt->fetch()) {
          $empresas[] = new Empresa($nome,$cnpj,$endereco,$numero,$bairro,$cidade,$estado,$cep,$telefone,$email,$id);
        }
      }
      $stmt->close();
    }
    return $empresas;
  }

};

