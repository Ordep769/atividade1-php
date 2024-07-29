<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Matéria</title>
</head>
<?php
    require_once '../models/usurioModel.php';

    session_start();

    if ($_SESSION['esta_logado'] !== true || $_SESSION['id_tipo_usuario'] != 1) {
        header('Location: login.php');
        exit();
    }

    $materiaModel = new materiaModel();
    $materiaModel = new materiaModel();

    $idAutor = intval($_GET['idNoticia']);

    $Autor = $materiaModel->buscarMateriasPorId($idUsuario);
    $autores = $autorModel->buscarMaterias();

?>
<body>
    <header>
        <?php require_once '../public/html/menuAdmin.html'; ?>
        <h1>Editar Materia</h1>
    </header>
    <main>
    <form action="../routers/Router.php" method="post" onsubmit="return validarCamposCadastrarUsuario(event);">
            <label for="idMateria">Materia</label>
            <br>
            <select name="idMateria" id="idMateria">
                <option value="0">Selecione</option>
                <?php foreach ($materias as $materia) :?>
                    <?php if($materia->idMateria == $usuario->idMateria) :?>
                        <option value="<?= $materia->idmateria; ?>"selected><?= $materia->nomeMateria; ?></option>
                  <?php else:?>
                    <option value="<?= $materia->idMateria; ?>"><?= $materia->nomeMateria; ?></option>
                        <?php endif; ?>
                <?php endforeach; ?>
            </select>
            <br>
            <label for="titulo">Título</label>
            <br>
            <input type="text" name="titulo" id="titulo" value="<?= $usuario->tituloUsuario; ?>" required>
            <br>
            <label for="conteudo">Conteúdo</label>
            <br>
            <textarea name="conteudo" id="conteudo" cols="30" rows="10" required><?= $usuario->conteudoUsuario; ?></textarea>
            <br>
            <label for="imagem">Imagem</label>
            <br>
            <input type="text" name="imagem" id="imagem" value="<?= $usuario->imagemUsuario; ?>">
            <br>
            <br>
            <input type="hidden" name="idUsuario" id="idUsuario" value='<?=$idUsuario; ?>'> 
            <input type="hidden" name="rota" id="rota" value="salvar">
            <input type="submit" value="Salvar">
        </form>
    </main>
</body>
</html>