<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Usuario</title>
</head>
<?php
    require_once '../models/usuarioModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
        header('Location: login.php');
        exit();
    }

    $usuarioModel = new usuarioModel();

    $Usuarios = $usuarioModel->buscarUsuarios();
    ?>  
</body>
    <header>
        <?php require_once '../public/html/menuAdmin.html' ?>
        <h1>Listar Usuario</h1>
    </header>
    <main>
        <table>
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($Usuarios as $Usuario) :?>
                    <tr>
                        <td><?= $Usuario->nome; ?></td>
                        <td>
                            <a href="editarusuario.php?idAutor=<? $Usuario->idUsuario; ?>">Editar</a>
                            <form action="../routers/autorRouter.php" method="post">
                                <input type="hidden" name="idUsuario" id="idUsuario" value="<?= $Usuario->idUsuario; ?>">
                                <input type="hidden" name="rota" id="rota" value="excluir">
                                <input type="submit" value="excluir">
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </main>
</body>
</html>
