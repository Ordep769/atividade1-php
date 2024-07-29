<?php 

    require_once 'conexao.php';

class materiaDAO {

 public function buscarmateriasPorId(int $idMateria) {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT * FROM materia WHERE idMateria = :idMateria;";

            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':idMateria', $idMateria);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); 
            
            }

 public function buscarMaterias() {
            $conexao = (new conexao())->getConexao();

            $sql = "SELECT * FROM materia;";

            $stmt = $conexao->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
    }
?>