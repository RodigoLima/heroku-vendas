<?php 

class Empresa {

  private $id;
  private $nome;
  private $cnpj;
  private $endereco;
  private $numero;
  private $bairro;
  private $cidade;
  private $estado;
  private $cep;
  private $telefone;
  private $email;

  public function __construct(string $nome='', string $cnpj='',string $endereco='',string $numero='',string $bairro='',string $cidade='',string $estado='',string $cep='',string $telefone='',string $email='', int $id=-1) {
    $this->id = $id;
    $this->nome = $nome;
	$this->cnpj = $cnpj;
    $this->endereco = $endereco;
	$this->numero =  $numero;
	$this->bairro = $bairro;
	$this->cidade = $cidade;
    $this->estado = $estado;
    $this->cep = $cep;
	$this->telefone = $telefone; 
	$this->email = $email;
  }

  public function setId(int $id) {
      $this->id = $id;
  }

  public function getId() {
      return $this->id;
  }

  public function setNome(string $nome) {
      $this->nome = $nome;
  }
  
   public function setCnpj(string $cnpj) {
       $this->cnpj = $cnpj;
  }
  
    public function setEndereco(string $endereco) {
       $this->endereco = $endereco;
  }
  
    public function setNumero(string $numero) {
       $this->numero = $numero;
  }
  
    public function setBairro(string $bairro) {
       $this->bairro = $bairro;
  }
  
    public function setCidade(string $cidade) {
       $this->cidade = $cidade;
  }

  public function setCep(string $cep) {
    $this->cep = $cep;
}

  
    public function setEstado(string $estado) {
       $this->estado = $estado;
  }
  
    public function setTelefone(string $telefone) {
       $this->telefone = $telefone;
  }
  
      public function setEmail(string $email) {
       $this->email = $email;
  }
  

  public function getNome() {
      return $this->nome;
  }
  
   public function getCnpj() {
      return $this->cnpj;
  }
  
    public function getEndereco() {
      return $this->endereco;
  }
  
    public function getNumero() {
      return $this->numero;
  }
  
    public function getBairro() {
      return $this->bairro;
  }
  
    public function getCidade() {
      return $this->cidade;
  }
  
    public function getEstado() {
      return $this->estado;
  }

  public function getCep() {
    return $this->cep;
}

  
    public function getTelefone() {
      return $this->telefone;
  }
  
      public function getEmail() {
      return $this->email;
  }
  
  
};