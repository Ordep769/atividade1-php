<?php
    require_once 'DAL/usuarioDAO.php';
    require_once 'tipoUsuarioModel.php';

    class usuarioModel {
        public ?int $idUsuario;
        public ?int $idTipoUsuario;
        public ?string $nome;
        public ?string $email;
        public ?string $senha;
        public ?tipoUsuarioModel $tipoUsuario;

        public function __construct(?int $idUsuario = null, ?int $idTipoUsuario = null, ?string $nome = null, ?string $email = null, ?string $senha = null) {
            $this->idUsuario = $idUsuario;
            $this->idTipoUsuario = $idTipoUsuario;
            $this->nome = $nome;
            $this->email = $email;
            $this->senha = $senha;
        }

        public function buscarUsuarioPorEmailESenha(usuarioModel $usuario) {
            $usuarioDAO = new usuarioDAO();
            $retorno = $usuarioDAO->buscarUsuarioPorEmailESenha($usuario);

            return $retorno;
        }

        public function inserirUsuario(usuarioModel $usuario) {
            $usuarioDAO = new usuarioDAO();
            $retorno = $usuarioDAO->inserirUsuario($usuario);

            return $retorno;
        }
        
        public function buscarUsuarios() {
            $usuarioDAO = new usuarioDAO();
            $tipoUsuarioModel = new tipoUsuarioModel();

            $Usuarios = $usuarioDAO->buscarUsuarios();
        
            foreach ($Usuarios as $chave => $usuario) {
                $Usuarios[$chave] = new usuarioModel(
                    $usuario['id_usuario'],
                    $usuario['id_tipo_usuario'],
                    $usuario['nome'],
                    $usuario['email'],
                    $usuario['senha'],
                    $tipoUsuarioModel->buscarTipoUsuarioPorId($usuario['id_tipo_usuario'])
                );
            }

            return $Usuarios;

        }    

    }
?>