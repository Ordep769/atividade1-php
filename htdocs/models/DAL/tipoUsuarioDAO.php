<?php
    require_once 'conexao.php';

    class tipoUsuarioDAO {
        public function cadastrarTipoUsuario(tipoUsuarioModel $tipoUsuario) {
            $conexao = (new conexao)->getConexao();

            $sql = "INSERT INTO tipo_usuario VALUES(null, :descricao);";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':descricao', $tipoUsuario->descricao);
            
            return $stmt->execute();
        }

        public function buscarTiposUsuario() {
            $conexao = (new conexao)->getConexao();

            $sql = "SELECT * FROM tipo_usuario";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function excluirTipoUsuario(int $idTipoUsuario) {
            $conexao = (new conexao)->getConexao();

            $sql = "DELETE FROM tipo_usuario WHERE IdTipoUsuario = :idTipoUsuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':idTipoUsuario', $idTipoUsuario);

            return $stmt->execute();
        }

        public function buscarTiposUsuarioPorId(int $idTipoUsuario) {
            $conexao = (new conexao)->getConexao();

            $sql = "SELECT * FROM tipo_usuario WHERE idTipoUsuario = :idTipoUsuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':idTipoUsuario', $idTipoUsuario);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
         }

         public function atualizarTipousuario(tipoUsuarioModel $tipoUsuario) {
            $conexao = (new conexao)->getConexao();

            $sql = "UPDATE tipo_usuario SET descricao= :descricao WHERE idTipoUsuario = :idTipoUsuario;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindValue(':idTipoUsuario', $tipoUsuario->idTipoUsuario);
            $stmt->bindValue(':descricao', $tipoUsuario->descricao);

            return $stmt->execute();
         }
            
        
    }
?>