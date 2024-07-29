<?php
    require_once 'DAL/materiaDAO.php';

    class materiaModel {
        public ?int $idMateria;
        public ?string $descricao;

        public function __construct(?int $idMateria = null, ?string $descricao = null) {
            $this->idMateria = $idMateria;
            $this->descricao = $descricao;
        }
        public function buscarmateriasPorId(int $idMateria) {
              $materiaDAO = new materiaDAO();
    
                $materia = $materiaDAO->buscarMateriasPorId($idMateria);
    
                $materia= new materiaModel($materia['idMateria'], $materia['nomeMateria']);
    
                return $materia;
        }

        public function buscarMaterias() {
            $materiaDAO = new materiaDAO();

            $materias = $materiaDAO->buscarMaterias();

            foreach ($materias as $chave => $materia) {
                $materias[$chave] = new materiaModel($materia['idMateria'], $materia['nomeMateria']);
            }

            return $materias;
        }
    }
?>