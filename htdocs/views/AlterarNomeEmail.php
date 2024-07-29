<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Alterar Dados do Cadastro</title>
</head>
<body>
    <h2>Alterar Dados do Cadastro</h2>
    <form action="processar_alteracao_dados.php" method="post">
        <label for="nome">Novo Nome:</label>
        <input type="text" id="nome" name="nome"><br><br>
        <input type="text" name= "descricao" id= "descricao" value="<?= $tipoUsuario->descricaoTipoUsuario; ?>">
            <br>
            <br>
            <input type="hidden" name="idTipoUsuario" id="idTipoUsuario" value="<?= $tipoUsuario->idTipoUsuario; ?>">
            <input type="hidden" name="rota" id="rota" value="salvar">
            <input type="submit" value="Salvar">
        <label for="email">Novo E-mail:</label>

        <input type="email" id="email" name="email"><br><br>
        <input type="text" name= "descricao" id= "descricao" value="<?= $tipoUsuario->descricaoTipoUsuario; ?>">
            <br>
            <br>
            <input type="hidden" name="idTipoUsuario" id="idTipoUsuario" value="<?= $tipoUsuario->idTipoUsuario; ?>">
            <input type="hidden" name="rota" id="rota" value="salvar">
            <input type="submit" value="Salvar">
        <input type="submit" value="Salvar Alterações">
    </form>for
</body>
</html>


