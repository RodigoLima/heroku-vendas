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
$empresa = $daoEmpresa->porId( $_GET['id'] );
    
if (! $empresa )
    header('Location: ./index.php');

else {  
    ob_start();

?>
    <div class="container">
        <div class="py-5 text-center">
            <h2>Cadastro de Empresas</h2>
        </div>
        <div class="row">
          <div class="col-md-12" >
           
            <form action="atualizar.php"  method="POST">

                <div class="form-group">
                
                <input type="hidden" name="id" 
                          value="<?php echo $empresa->getId(); ?>">      
                
				  <label for="nome">Nome da Empresa</label>
                      <input type="text" placeholder="Nome da Empresa" 
                      value="<?php echo $empresa->getNome(); ?>"
                      class="form-control" name="nome" required>
                         
				  <label for="nome">CNPJ</label>
					  <input type="text" placeholder="CNPJ" 
                      value="<?php echo $empresa->getCnpj(); ?>"
                      class="form-control" name="cnpj" required>
                         
				<label for="nome">Endereço</label>
					  <input type="text" placeholder="Endereço" 
                      value="<?php echo $empresa->getEndereco(); ?>"
                      class="form-control" name="endereco" required>
                         	  
				<label for="nome">Número</label>
					  <input type="text" placeholder="Número" 
                      value="<?php echo $empresa->getNumero(); ?>"
                      class="form-control" name="numero" required>	 
                        
		        <label for="nome">Bairro</label>
					  <input type="text" placeholder="Bairro" 
                      value="<?php echo $empresa->getBairro(); ?>"
                      class="form-control" name="bairro" required> 
                            
				<label for="nome">Cidade</label>
					  <input type="text" placeholder="Cidade" 
                      value="<?php echo $empresa->getCidade(); ?>"
                      class="form-control" name="cidade" required>	
                         
                <label for="nome">Estado</label>
					  <input type="text" placeholder="Estado" 
                      value="<?php echo $empresa->getEstado(); ?>"
                      class="form-control" name="estado" required> 
                         		
                <label for="nome">Cep</label>
					  <input type="text" placeholder="Cep" 
                      value="<?php echo $empresa->getCep(); ?>"
                      class="form-control" name="Cep" required>	
                          	
                <label for="nome">Telefone</label>
					  <input type="text" placeholder="Telefone" 
                      value="<?php echo $empresa->getTelefone(); ?>"
                      class="form-control" name="telefone" >
                   		
				<label for="nome">E-mail</label>
					  <input type="email" placeholder="Email" 
                      value="<?php echo $empresa->getEmail(); ?>"
                      class="form-control" name="email" >
                         
                </div>
			  <button type="submit" class="btn btn-primary">Salvar</button>
              <a href="index.php" class="btn btn-secondary ml-1" role="button" aria-pressed="true">Cancelar</a>
              </form>  
        </div>
    </div>
<?php

    $content = ob_get_clean();
    echo html( $content );
} // else-if

?>
