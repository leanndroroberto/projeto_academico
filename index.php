<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atividade - CRUD (ler)</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container my-5">
        <h3>Usuários</h3>
        <a class="btn btn-success" href="/portfolio_crud/criar.php" role="button">Adicionar novo usuário</a> 

        <br>

        <table class="table">
            <thead>
                <tr> <th>ID</th> <th>Nome</th> <th>E-mail</th> <th>Senha</th> <th>Data de criação</th> <th>Opções</th> </tr>
            </thead>

            <tbody>

            <?php
$servidor = "localhost";
$usuario = "root";
$senha = "";
$bancodedados = "usuarios_db";

$conexao = new mysqli($servidor, $usuario, $senha, $bancodedados);

if ($conexao->connect_error) {
    die("A conexão falhou: " . $conexao->connect_error);
}

$sql = "SELECT * FROM usuarios";
$resultado = $conexao->query($sql);

if(!$resultado) {
    die("Erro na consulta: " . $conexao->error);
}

while($linha = $resultado->fetch_assoc()) {
    echo "
    <tr> <td>$linha[id]</td> <td>$linha[nome]</td> <td>$linha[email]</td> <td>$linha[senha]</td> <td>$linha[data_criacao]</td> 
                <td> <a class='btn btn-success btn-sm' href='/portfolio_crud/editar.php?id=$linha[id]'>Editar</a>
                     <a class='btn btn-danger btn-sm' href='/portfolio_crud/deletar.php?id=$linha[id]'>Deletar</a> </td>
                </tr>
         ";
}

?>

        </tbody>

        </table>


    </div>
    
</body>
</html>