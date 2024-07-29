<?php
    require_once '../models/usuarioModel.php';

    class usuarioController {
        public function validarUsuario(string $email, string $senha) {
            $email = str_replace(' ','', $email);
            $senha = md5(str_replace(' ','', $senha));

            $usuarioModel = new usuarioModel();
            $usuario = new usuarioModel(null, null, null, $email, $senha);
            $retorno = $usuarioModel->buscarUsuarioPorEmailESenha($usuario);

            session_start();

            if ($retorno) {
                $_SESSION['esta_logado'] = true;
                $_SESSION['id_tipo_usuario'] = $retorno['id_tipo_usuario'];

                header('location: ../views/Principal.php');
            }
            else {
                header('location: ../views/telaLogin.php');
            }

            exit();
        }

        public function cadastarUsuario(string $nome, string $email, string $senha) {
            $email = str_replace(' ','', $email);
            $senha = md5(str_replace(' ', '', $senha));

            $usuarioModel = new usuarioModel();
            $usuario = new usuarioModel(null, null, $nome, $email, $senha);
            $retorno = $usuarioModel->inserirUsuario($usuario);

            if ($retorno === true) {
                header('location: ../views/telaLogin.php');
            }
            else {
                header('location: ../views/cadastro.php');
            }

            exit();
        }        
    }
?>