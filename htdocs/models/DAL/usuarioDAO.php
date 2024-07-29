<?php
    require_once 'conexao.php';

    class usuarioDAO {
        public function buscarUsuarioPorEmailESenha(usuarioModel $usuario) {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT * FROM usuario WHERE email = :email AND senha = :senha;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':email', $usuario->email);
            $stmt->bindParam(':senha', $usuario->senha);
            $stmt->execute();
            $retorno = $stmt->fetch(PDO::FETCH_ASSOC);

            return $retorno;
        }

        public function inserirUsuario(usuarioModel $usuario) {
            $conexao = (new conexao())->getConexao();

            $sql = "INSERT INTO usuario VALUES(null, :id_tipo_usuario, :nome, :email, :senha);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':id_tipo_usuario', $usuario->idTipoUsuario);
            $stmt->bindParam(':nome', $usuario->nome);
            $stmt->bindParam(':email', $usuario->email);
            $stmt->bindParam('senha', $usuario->senha);
            $retorno = $stmt->execute();

            return $retorno;
        }
        public function buscarUsuarios() {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT * FROM usuario";

            $stmt = $conexao->prepare($sql);
            $retorno = $stmt->execute();
            $retorno = $stmt->fetchAll(PDO::FETCH_ASSOC);

            return $retorno;
    } 
    }
?>