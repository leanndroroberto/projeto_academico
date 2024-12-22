<?php

$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodedados = "usuarios_db";

$conexao = new mysqli($servidor, $usuario, $senha, $bancodedados);

$nome = "";
$email = "";
$senha = "";

$mensagem_erro = "";
$adicionado = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    do {
        if (empty($nome) || empty($email) || empty($senha) ) {
           $mensagem_erro = "Preencha todos os campos";
           break;
        }

      $sql = "INSERT INTO usuarios (nome, email, senha)" . 
             "VALUES ('$nome', '$email', '$senha')";
             $resultado = $conexao->query($sql);

             if (!$resultado) {
                $mensagem_erro = "Erro na consulta: " . $conexao->error;
                break;
             }


        $nome = "";
        $email = "";
        $senha = "";
        
        $adicionado = "Usuário adicionado";

        header("location: /portfolio_crud/index.php");
        exit;


    } while (false);

}

?>


<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adicionar novo usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h3>Adicionar novo usuário</h3>

        <?php 
        if ( !empty($mensagem_erro) ) {

            echo "
            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
            <strong>$mensagem_erro</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'> </button>
            </div>
            
            ";
        }
        
        ?>


        <form method="post">

            <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Nome</label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="nome" value="<?php echo $nome; ?>">
                  </div>
             </div>

             <div class="row mb-3">
                <label class="col-sm-3 col-form-label">E-mail</label>
                <div class="col-sm-6">
                    <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                  </div>
             </div>

             <div class="row mb-3">
                <label class="col-sm-3 col-form-label">Senha</label>
                <div class="col-sm-6">
                    <input type="password" class="form-control" name="senha" value="<?php echo $senha; ?>">
                  </div>
             </div>

             <?php 
        if ( !empty($adicionado) ) {

            echo "
            <div class='row mb-3'>
            <div class='offset-sm-3 col-sm-6'>
            <div class='alert alert-success alert-dismissible fade show' role='alert'>
            <strong>$adicionado</strong>
            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'> </button>
            </div>
            </div>
            </div>
            
            ";
        }
        
        ?>

             <div class="row mb-3">
                <div class="offset-sm-3 col-sm-3 d-grid">
                    <button type="submit" class="btn btn-success">Enviar</button>
                </div>
                <div class="col-sm-3 d-grid">
                    <a class="btn btn-outline-primary" href="/portfolio_crud/index.php" role="button">Cancelar</a>
                  </div>
             </div>

        </form>


    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    
</body>
</html>