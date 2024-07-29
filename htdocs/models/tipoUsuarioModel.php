<?php
    require_once 'DAL/tipoUsuarioDAO.php';

    class tipoUsuarioModel {
        public ?int $idTipoUsuario;
        public ?string $descricao;

        public function __construct(?int $idTipoUsuario = null, ?string $descricao = null) {
            $this->idTipoUsuario = $idTipoUsuario;
            $this->descricao = $descricao;
        }
        public function buscarTipoUsuarioPorId() {
            $conexao = (new Conexao())->getConexao(); 

        $sql = "SELECT * FROM tipo_usuario WHERE id_tipo_usuario = :id_tipo_usuario"; 

        $stmt = $conexao->prepare($sql);
        $stmt->bindValue(':id_tipo_usuario', $this->idTipoUsuario); 
        $stmt->execute();
        $retorno = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return $retorno;
    }
}
?>
