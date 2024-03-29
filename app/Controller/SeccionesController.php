<!-- File: /app/Controller/SeccionesController.php -->

<?php
    class SeccionesController extends AppController {
        public $uses = array("Seccion", "Curso", "Docente");
        
        public function beforeFilter() {
            parent::beforeFilter();
            $this->Auth->allow('getByGrado', "getSeccionesByCurso");
        }

        public function index() {
            $this->layout = "admin";
            $this->set("secciones", $this->Seccion->find("all", array(
                'conditions' => array('Seccion.estado' => '1')
            )));
        }     
        
        public function view($id = null) {
            $this->layout = "admin";
            
            if (!$id) {
                throw new NotFoundException(__("Sección inválida"));
            }
            $seccion = $this->Seccion->findByIdseccion($id);
            if (!$seccion) {
                throw new NotFoundException(__("Sección inválida"));
            } 
            $this->set("seccion", $seccion);
        }
       
        public function add() {
            $this->layout = "admin";
            $this->set("grados", $this->Seccion->Grado->find("list", array(
                "fields" => array("Grado.idGrado", "Grado.descripcion_general"),
                'conditions' => array('Grado.estado' => '1')
            )));
         
            if ($this->request->is("post")) {
                $this->Seccion->create();
                if ($this->Seccion->saveAssociated($this->request->data)) {
                    $this->Session->setFlash(__("La sección ha sido registrada correctamente."), "flash_bootstrap");
                    return $this->redirect(array("action" => "index"));
                }
                $this->Session->setFlash(__("No fue posible registrar la sección."), "flash_bootstrap");
            }
        }
         
        public function edit($id = null) {
            $this->layout = "admin";
            $this->set("grados", $this->Seccion->Grado->find("list", array(
                "fields" => array("Grado.idGrado", "Grado.descripcion_general"),
                'conditions' => array('Grado.estado' => '1')
            )));
            
            if (!$id) {
                throw new NotFoundException(__("Seccion inválido"));
            }
            $seccion = $this->Seccion->findByIdseccion($id);
            if (!$seccion) {
                throw new NotFoundException(__("Seccion inválido"));
            }
            if ($this->request->is(array("post", "put"))) {
                $this->Seccion->id = $id;
                if ($this->Seccion->saveAssociated($this->request->data)) {
                    $this->Session->setFlash(__("La sección ha sido actualizada."), "flash_bootstrap");
                    return $this->redirect(array("action" => "index"));
                }
                $this->Session->setFlash(__("No es posible actualizar la sección."), "flash_bootstrap");
            }
            if (!$this->request->data) {
                $this->request->data = $seccion;
            }
        }
           
        public function delete($id) {
            if ($this->request->is("get")) {
                throw new MethodNotAllowedException();
            }
            $this->Seccion->id = $id;
            if ($this->Seccion->saveField("estado", 2)) {
                $this->Session->setFlash(__("La sección de código: %s ha sido eliminada", h($id)), "flash_bootstrap");
                return $this->redirect(array("action" => "index"));
            }
        }
        
        public function getByGrado() {
            $idGrado = $this->request->data['Periodo']['idGrado'];

            $this->set("secciones", $this->Seccion->find("list", array(
                "fields" => array("Seccion.idSeccion", "Seccion.descripcion"),
                'conditions' => array('Seccion.estado' => '1', "Seccion.idGrado" => $idGrado)
            )));
            
            $this->layout = 'ajax';
	}
        
        public function getSeccionesByCurso() {
            $this->layout = "ajax";
            
            $idCurso = $this->request->data["idCurso"];
            
            $user = $this->Auth->user();
            $docente = $this->Docente->findByIduser($user["idUser"]);
           
            $curso = $this->Curso->findByIdcurso($idCurso);
            $grado = $this->Curso->Grado->findByidgrado($curso["Grado"]["idGrado"]);
            
            
            /*$secciones = $this->Curso->Grado->Seccion->find("list", array(
                "fields" => array("Seccion.idSeccion", "Seccion.descripcion"),
                "conditions" => array("Seccion.idGrado" => $grado["Grado"]["idGrado"])
            ));
            
            $this->set("secciones", $secciones); 
             * 
             */
            
            $horarios = $this->Docente->Horario->find("all", array(
                "fields" => array("DISTINCT Horario.idSeccion"),
                "conditions" => array("Horario.idDocente" => $docente["Docente"]["idDocente"], "Horario.idCurso" => $idCurso)
            ));
            
            foreach ($horarios as $horario) {
                $seccion = $this->Docente->Horario->Seccion->find("first", array(
                    "fields" => array("Seccion.idSeccion", "Seccion.descripcion"),
                    "conditions" => array("Seccion.idSeccion" => $horario["Horario"]["idSeccion"])
                ));
                $secciones[$seccion["Seccion"]["idSeccion"]] = $seccion["Seccion"]["descripcion"];
            }
            
            $this->set("secciones", $secciones);
        
        }
}