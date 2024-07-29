<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listar Materia</title>
</head>
<?php
    require_once '../models/materiaModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
        header('Location: login.php');
        exit();
    }

    $materiaModel = new materiaModel();

    $materias = $materiaModel->buscarMaterias();
    ?>  
</body>
    <header>
        <?php require_once '../public/html/menuAdmin.html' ?>
        <h1>Listar Materia</h1>
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
                <?php foreach($materias as $materia) :?>
                    <tr>
                        <td><?= $materia->tituloMateria; ?></td>
                        <td>
                            <a href="editarMateria.php?idMateria=<? $materia->idMateria; ?>">Editar</a>
                            <form action="../routers/autorRouter.php" method="post">
                                <input type="hidden" name="idMateria" id="idmateria" value="<?= $materia->idMateria; ?>">
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
