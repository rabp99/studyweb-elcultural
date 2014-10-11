<!-- File: /app/Controller/MatriculasController.php -->

<?php
    class MatriculasController extends AppController {
        public $helpers = array('Js');
        public $uses = array("Periodo", "Grado", "Seccion");
        
        public function index() {
            $this->layout = "admin";
            
            $this->set("periodos", $this->Periodo->find("list", array(
                "fields" => array("Periodo.idPeriodo", "Periodo.descripcion"),
                'conditions' => array('Periodo.estado' => '1')
            )));
                 
            $this->set("grados", $this->Grado->find("list", array(
                "fields" => array("Grado.idGrado", "Grado.descripcion_general"),
                'conditions' => array('Grado.estado' => '1')
            )));
        }
}