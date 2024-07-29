<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tipo Usuário</title>
</head>
<?php
    require_once '../models/tipoUsuarioModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] !=1) {
        header('location: login.php');
        exit();
    }

    $idUsuario = $_GET['idUsuario'];

    $tipoUsuarioModel = new tipoUsuarioModel();

    $Usuario = $UsuarioModel->buscarTipoUsuarioPorId();
?>
<body>
    <header>
        <?php require_once '../public/html/menuAdmin.html'; ?>
        <h1>Editar Usuário</h1>
    </header>
    <main>
        <form action="../routers/tipoUsuarioRouter.php" method="post">
            <label for="descricao">Descrição</label>
            <br>
            <input type="text" name= "descricao" id= "descricao" value="<?= $tipoUsuario->descricaoTipoUsuario; ?>">
            <br>
            <br>
            <input type="hidden" name="idTipoUsuario" id="idTipoUsuario" value="<?= $tipoUsuario->idTipoUsuario; ?>">
            <input type="hidden" name="rota" id="rota" value="salvar">
            <input type="submit" value="Salvar">
        </from>
    </main>
</body>
</html>